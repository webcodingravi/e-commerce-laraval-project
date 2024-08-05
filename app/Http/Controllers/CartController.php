<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Country;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Models\DiscountCoupon;
use App\Models\ShippingCharge;
use Illuminate\Support\Carbon;
use App\Models\CustomerAddress;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function addToCart(Request $request) {
        $product = Product::with('product_images')->find($request->id);

        if($product == null) {
            return response()->json([
                'status' => false,
                'message' => 'Product Not Found',
            ]);
        }

        if(Cart::count() > 0) {
            // echo "Product already in cart";
            // Products found in cart
            // Check if this product already in the cart
            // Return as message that product already added in your cart
            // if product not found in the cart, then add product in cart

            $cartContent = Cart::content();
            $productAlreadyExist = false;

            foreach($cartContent as $item) {
                if($item->id == $product->id) {
                    $productAlreadyExist = true;
                }
            }

            if($productAlreadyExist == false) {
                Cart::add($product->id, $product->title, 1, $product->price, ['productImage' => (!empty($product->product_images) ? $product->product_images->first() : '')]);

                $status = true;
                $message = '<strong>'.$product->title.'</strong> Product added in cart';
                session()->flash('success', $message);

            }else{
                $status = false;
                $message = $product->title .' already added in cart';
            }

        }else {
          
            Cart::add($product->id, $product->title, 1, $product->price, 
            ['productImage' => (!empty($product->product_images) ? $product->product_images->first() : '')]);
            $status = true;
            $message = '<strong>'.$product->title.'</strong> Product added in cart';

            session()->flash('success', $message);

        }

            return response()->json([
                'status' => $status,
                'message' => $message
            ]);


    }

    

    public function cart() {
       $cartContent = Cart::content();
       $data['cartContent'] =  $cartContent;
       return view('front.cart',$data);
    }


    public function updateCart(Request $request) {
       $rowId = $request->rowId;
       $qty = $request->qty;
        
       $itemInfo = Cart::get($rowId);
        
       $product = Product::find($itemInfo->id);

    //    check Qty available in stock

         if($product->track_qty == 'Yes') {

            if($qty <= $product->qty) {
              Cart::update($rowId, $qty);
              $message = "Cart updated successfully";
              $status = true;
              session()->flash('success', $message);

            }else{
                $message = "Requested qty ($qty) not available in stock.";
                $status = false;
                session()->flash('error', $message);

            }
         }else{
            Cart::update($rowId,$qty);
            $message = "Cart updated successfully";
            $status = true;
            session()->flash('success', $message);



         }

       return response()->json([
        'status' => true,
        'message' => $message,
       ]);
    }



    public function deleteItem(Request $request) {
        $itemInfo = Cart::get($request->rowId);

        if($itemInfo == null) {
            $errorMessage = 'Item not found in cart';
            session()->flash('error', $errorMessage);
            return response()->json([
                'status' => false,
                'message' => $errorMessage,
               ]);
        }
        Cart::remove($request->rowId);

        $message = 'Item removed from cart successfully';
        session()->flash('success', $message);

        return response()->json([
            'status' => true,
            'message' => $message,
           ]);
}



public function checkout() {

    $discount = 0;
    // if cart is empty redirect to cart page
    if(Cart::count() == 0) {
        return redirect()->route('front.cart');
    }

    // if user is not logged in then redirect to login page
    if(Auth::check() == false) {

    if(!session()->has('url.intended')) {
        session(['url.intended' => url()->current()]);

    }
    return redirect()->route('account.login');

}

     $customerAddress = CustomerAddress::where('user_id',Auth::user()->id)->first();

        session()->forget('url.intended');

        $countries = Country::orderBy('name', 'ASC')->get();

        $subTotal = Cart::subtotal(2,'.','');

        // Apply Discount Here

        if(session()->has('code')) {
            $code = session()->get('code');
            if($code->type == 'parcent') {
            $discount = ($code->discount_amount/100)*$subTotal;
            }else{
            $discount = $code->discount_amount;
            }
        }

        //Calculate shipping here

        if($customerAddress != "") {
            $userCountry = $customerAddress->country_id;
            $shippingInfo = ShippingCharge::where('country_id', $userCountry)->first();
    
            $totalQty = 0;
            $totalShippingCharge = 0;
            $grandTotal = 0;
            foreach(Cart::content() as $item) {
                $totalQty += $item->qty;
            }
    
            $totalShippingCharge = $totalQty*$shippingInfo->amount;
            
            $grandTotal = ($subTotal-$discount)+$totalShippingCharge;

        }else{

            $grandTotal = ($subTotal-$discount);
            $totalShippingCharge = 0;

 
        }
       

        return view('front.checkout',
        compact('countries', 'customerAddress', 'totalShippingCharge', 'grandTotal', 'discount'));


}





public function processCheckout(Request $request) {
    // step-1 apply validation 
  $validator = Validator::make($request->all(),[
          'first_name' => 'required',
          'last_name' => 'required',
          'email' => 'required|email',
          'country' => 'required',
          'address' => 'required',
          'city' => 'required',
          'state' => 'required',
          'zip' => 'required',
          'mobile' => 'required'

  ]);

  if($validator->fails()) {
  return response()->json([
   'status' => false,
   'message' => "Please fix the errors",
   'errors' => $validator->errors(),
  ]);
}




// Step - 1 Save user address
$user = Auth::user();
 CustomerAddress::updateOrCreate(
    ['user_id' => $user->id],[

        'user_id' => $user->id,
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'mobile' => $request->mobile,
        'country_id' => $request->country,
        'address' => $request->address,
        'apartment' => $request->apartment,
        'city' => $request->city,
        'state' => $request->state,
        'zip' => $request->zip,
        
    ]);


    // step-3 store data in orders table

    if($request->payment_method == 'cod') {
        $discountCodeId = '';
         $promoCode = '';
         $shipping = 0;
        $discount = 0;
        $subTotal = Cart::subtotal(2,'.','');

        // Apply Discount Here

        if(session()->has('code')) {
            $code = session()->get('code');
            if($code->type == 'parcent') {
            $discount = ($code->discount_amount/100)*$subTotal;
            }else{
            $discount = $code->discount_amount;
            }

            $discountCodeId = $code->id;
            $promoCode = $code->code;
        }

        //calculate Shipping

        $shippingInfo = ShippingCharge::where('country_id',$request->country)->first();

        $totalQty = 0;
        foreach(Cart::content() as $item) {
            $totalQty += $item->qty;
        }


        if($shippingInfo != null) {
            $shipping = $shippingInfo->amount;
            $grandTotal = ($subTotal-$discount)+$shipping;
    
       
            
         }else{
            $shippingInfo = ShippingCharge::where('country_id','rest_of_world')->first();
            $shipping = $shippingInfo->amount;
            $grandTotal = ($subTotal-$discount)+$shipping;
        
        
             }

            $order = new Order;
            $order->subtotal = $subTotal;
            $order->shipping = $shipping;
            $order->grand_total = $grandTotal;
            $order->discount = $discount;
            $order->coupon_code_id = $discountCodeId;
            $order->coupen_code = $promoCode;
            $order->payment_status = 'not paid';
            $order->status = 'pending';
            $order->user_id = $user->id;
            $order->first_name = $request->first_name;
            $order->last_name = $request->last_name;
            $order->email = $request->email;
            $order->mobile = $request->mobile;
            $order->address = $request->address;
            $order->apartment = $request->apartment;
            $order->state = $request->state;
            $order->city = $request->city;
            $order->zip = $request->zip;
            $order->notes = $request->order_notes;
            $order->country_id = $request->country;
            $order->save();


        // step - 4 store order items in order items table
        foreach(Cart::content() as $item) {
            $orderItem = new OrderItem;

            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->name = $item->name;
            $orderItem->qty = $item->qty;
            $orderItem->price = $item->price;
            $orderItem->total = $item->price*$item->qty;
            $orderItem->save();


               //Update Product Stock
              $productData = Product::find($item->id);
              if($productData->track_qty == 'Yes') {
                $currentQty = $productData->qty;
                $updateQty = $currentQty-$item->qty;
                $productData->qty = $updateQty;
                $productData->save();
              }
              
        }

            // Send Email
            orderEmail($order->id, 'customer');
            session()->flash('success', 'You have successfully placed your order');

             

             Cart::destroy();
             session()->forget('code');
            return response()->json([
                'status' => true,
                'orderId' => $order->id,
                'message' => 'Order Saved successfully',
               ]);
            

        
    }

}

public function thankyou(string $id) {
    return view('front.Thanks',[
        'id' => $id
    ]);
}


public function getOrderSummery(Request $request) {
$subTotal = Cart::subtotal(2,'.','');
$discount = 0;
$discountString = '';

// Apply Discount Here

if(session()->has('code')) {
    $code = session()->get('code');
    if($code->type == 'parcent') {
      $discount = ($code->discount_amount/100)*$subTotal;
    }else{
      $discount = $code->discount_amount;
    }

        $discountString = '<div class="mt-4" id="discount-response">
        <span class="text-success alert alert-success">Apply Promocode <strong>'.session()->get('code')->code.'</strong> Successfully</span>
         <a class="btn btn-sm btn-danger" id="remove-discount"><i class="fa fa-times"></i></a>
        </div>';
}




 if($request->country_id > 0) {
     $shippingInfo = ShippingCharge::where('country_id',$request->country_id)->first();

     $totalQty = 0;
     foreach(Cart::content() as $item) {
         $totalQty += $item->qty;
     }


     if($shippingInfo != null) {
        $shippingCharge = $shippingInfo->amount;
        $grandTotal = ($subTotal-$discount)+$shippingCharge;

        return response()->json([
           'status' => true,
           'grandTotal' => number_format($grandTotal,2),
           'discount' => number_format($discount,2),
           'discountString' => $discountString,
           'shippingCharge' => number_format($shippingCharge,2),
          
        ]);
        
     }else{
        $shippingInfo = ShippingCharge::where('country_id','rest_of_world')->first();
    
     
            $shippingCharge = $shippingInfo->amount;
            $grandTotal = ($subTotal-$discount)+$shippingCharge;
    
            return response()->json([
               'status' => true,
               'grandTotal' => number_format($grandTotal,2),
               'discount' => number_format($discount,2),
               'discountString' => $discountString,
               'shippingCharge' => number_format($shippingCharge,2),
              
            ]);
    
         }
 
 }else{
    return response()->json([
        'status' => true,
        'grandTotal' => number_format(($subTotal-$discount),2),
        'discount' => number_format($discount,2),
        'discountString' => $discountString,
        'shippingCharge' => number_format(0,2),
       
     ]);

 }
}


public function applyDiscount(Request $request) {
 $code = DiscountCoupon::where('code', $request->code)->first();   
 
 if($code == null) {

  return response()->json([
   'status' => false,
   'message' => 'Invalid discount coupon',
  ]);

}


// Check if coupon start date is valid or not

$now = Carbon::now();

if($code->starts_at != '') {
   $startDate = Carbon::createFromFormat('Y-m-d H:i:s', $code->starts_at);

   if($now->lte($startDate)) {
    return response()->json([
        'status' => false,
        'message' => 'Invalid discount coupon'
    ]);
   }
}


if($code->expires_at != '') {
    $endDate = Carbon::createFromFormat('Y-m-d H:i:s', $code->expires_at);
 
    if($now->gt($endDate)) {
     return response()->json([
         'status' => false,
         'message' => 'Invalid discount coupon'
     ]);
    }
 }

  

 // Max Uses Check
 if($code->max_uses > 0) {
    $couponUsed = Order::where('coupon_code_id', $code->id)->count();

    if($couponUsed >= $code->max_uses) {
       return response()->json([
           'status' => false,
           'message' => 'Invalid discount coupon'
       ]);
    }

 }



 // Max Uses User Check
 if($code->max_uses_user > 0) {
    $couponUsedByUser = Order::where(['coupon_code_id' => $code->id, 'user_id' => Auth::user()->id])->count();
    if($couponUsedByUser >= $code->max_uses_user) {
       return response()->json([
           'status' => false,
           'message' => 'You already used this coupon'
       ]);
    }

 }


 $subTotal = Cart::subtotal(2,'.','');

//  Min Amount condition check
if($code->min_amount > 0) {
    if($subTotal < $code->min_amount) {
        return response()->json([
            'status' => false,
            'message' => 'You min amount must be ₹'.$code->min_amount.'.',
        ]);
    }
}
    session()->put('code', $code);

    return $this->getOrderSummery($request);
    }


public function removeCoupon(Request $request) {
    session()->forget('code');

    return $this->getOrderSummery($request);

}
}


