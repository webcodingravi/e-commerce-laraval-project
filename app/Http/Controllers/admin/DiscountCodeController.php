<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\DiscountCoupon;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DiscountCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $discountCoupon = DiscountCoupon::latest('id');

        if(!empty($request->get('keyword'))){
            $discountCoupon  = $discountCoupon ->where('code', 'like', '%'.$request->get('keyword').'%');
            $discountCoupon  = $discountCoupon ->orwhere('name', 'like', '%'.$request->get('keyword').'%');

        }


        $discountCoupon = $discountCoupon->paginate(10);

        return view('admin.coupon.coupon-list',compact('discountCoupon'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('admin.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validator = Validator::make($request->all(),[
          'code' => 'required',
          'type' =>  'required',
          'discount_amount' => 'required',
          'status' => 'required'
       ]);



       if($validator->passes()) {
          
        // starting date must be greator then current date
        if(!empty($request->starts_at)) {
          $now = Carbon::now();
          

          $startAt = Carbon::createFromFormat('Y-m-d H:i:s', $request->starts_at);
          
          if($startAt->lte($now) == true) {
            return response()->json([
                'status' => false,
                'errors' => ['starts_at' => 'Start date can not be less than current date time'],
             ]);
          }
        }
      

        // expiry date must be greator then start date
        if(!empty($request->starts_at) && !empty($request->expires_at)) {
            $expireAt = Carbon::createFromFormat('Y-m-d H:i:s', $request->expires_at);
            $startAt = Carbon::createFromFormat('Y-m-d H:i:s', $request->starts_at);
            
            if($expireAt->gt($startAt) == false) {
              return response()->json([
                  'status' => false,
                  'errors' => ['expires_at' => 'Expiry date must be greator than start date'],
               ]);
            }
          }


           $discountCode = new DiscountCoupon();
           $discountCode->code = $request->code;
           $discountCode->name = $request->name;
           $discountCode->description = $request->description;
           $discountCode->max_uses = $request->max_uses;
           $discountCode->max_uses_user = $request->max_uses_user;
           $discountCode->type = $request->type;
           $discountCode->discount_amount = $request->discount_amount;
           $discountCode->min_amount = $request->min_amount;
           $discountCode->status = $request->status;
           $discountCode->starts_at = $request->starts_at;
           $discountCode->expires_at =$request->expires_at;
           $discountCode->save();

           $messages = 'Discount coupon added Successfully.';

           session()->flash('success', $messages);

           return response()->json([
              'status' => true,
              'message' => $messages,
           ]);
       }else{
        return response()->json([
          'status' => false,
          'errors' => $validator->errors(),
        ]);
       }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      $coupon = DiscountCoupon::find($id);
      if($coupon == null) {
        session()->flash('error', 'Record Not Found');
        return redirect()->route('coupons.index');
      }

      $data['coupon'] = $coupon;
       return view('admin.coupon.edit-discount', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

      $discountCode = DiscountCoupon::find($id);


      $validator = Validator::make($request->all(),[
        'code' => 'required',
        'type' =>  'required',
        'discount_amount' => 'required',
        'status' => 'required'
     ]);



     if($validator->passes()) {
        
      // expiry date must be greator then start date
      if(!empty($request->starts_at) && !empty($request->expires_at)) {
          $expireAt = Carbon::createFromFormat('Y-m-d H:i:s', $request->expires_at);
          $startAt = Carbon::createFromFormat('Y-m-d H:i:s', $request->starts_at);
          
          if($expireAt->gt($startAt) == false) {
            return response()->json([
                'status' => false,
                'errors' => ['expires_at' => 'Expiry date must be greator than start date'],
             ]);
          }
        }


         $discountCode->code = $request->code;
         $discountCode->name = $request->name;
         $discountCode->description = $request->description;
         $discountCode->max_uses = $request->max_uses;
         $discountCode->max_uses_user = $request->max_uses_user;
         $discountCode->type = $request->type;
         $discountCode->discount_amount = $request->discount_amount;
         $discountCode->min_amount = $request->min_amount;
         $discountCode->status = $request->status;
         $discountCode->starts_at = $request->starts_at;
         $discountCode->expires_at =$request->expires_at;
         $discountCode->save();

         $messages = 'Discount coupon added Successfully.';

         session()->flash('success', $messages);

         return response()->json([
            'status' => true,
            'message' => $messages,
         ]);
     }else{
      return response()->json([
        'status' => false,
        'errors' => $validator->errors(),
      ]);
     }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $discountCode = DiscountCoupon::find($id);
      $discountCode->delete();

      session()->flash('success', 'Discount Coupon deleted successfully');
      return response()->json([
        'status' => true,
        
      ]);

    }
}
