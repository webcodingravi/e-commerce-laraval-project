<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Country;
use App\Models\Wishlist;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CustomerAddress;
use App\Mail\ResetPasswordEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function login() {

        return view('front.account.login');
    }


    public function register() {

        return view('front.account.register');
    }


    public function processRegister(Request $request) {
        $Validator = Validator::make($request->all(),[
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|confirmed',
        ]);

        if($Validator->passes()) {
           $users = new User;
           $users->name = $request->name;
           $users->email = $request->email;
           $users->phone = $request->phone;
           $users->password = $request->password;
           $users->save(); 

           session()->flash('success', 'You have been registerd successfully');

           return response()->json([
             'status' => true,
           ]);

        }else{
            return response()->json([
                'status' => false,
                'errors' => $Validator->errors(),
            ]);
        }
    }

    public function authenticate(Request $request) {
        $request->validate([
           'email' => 'required|email|',
           'password' => 'required'
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            if(session()->has('url.intended')) {
                return redirect(session()->get('url.intended'));
        
            }
          return redirect()->route('account.profile')->with("success", 'Loggin successfully');
        }else{
            return redirect()->route('account.login')->with('error', 'Either email/password is incorrect');
    
        }

}


        public function profile() {

        $userId = Auth::user()->id;
        $countries = Country::orderBy('id', 'ASC')->get();
        $user = User::where('id',$userId)->first();
        $address = CustomerAddress::where('user_id', $userId)->first();

        return view('front.account.profile',compact('user', 'countries', 'address'));
        }


    public function updateProfile(Request $request) {
        $userId = Auth::user()->id;
         $validator = Validator::make($request->all(), [
          'name' => 'required',
          'email' => 'required|email|unique:users,email,'.$userId.',id',
          'phone' => 'required'
     ]);
    
     if($validator->passes()) {

        $user = User::find($userId);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();

        session()->flash('success', 'Profile Updated Successfully');

         return response()->json([
          'status' => true,
          'success' => "Profile Updated Successfully",
        ]);

     }else{
        return response()->json([
          'status' => false,
          'errors' => $validator->errors()
        ]);
     }
    }


    public function updateAddress(Request $request) {


        $validator = Validator::make($request->all(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'country_id' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'mobile' => 'required'
  
    ]);
    
     if($validator->passes()) {

        $userId = Auth::user()->id;

        CustomerAddress::updateOrCreate(
            ['user_id' =>  $userId],
            [
                'user_id' => $userId,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'country_id' => $request->country_id,
                'address' => $request->address,
                'apartment' => $request->apartment,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,
                'mobile' => $request->mobile,

                
            ]);


        session()->flash('success', 'Address updated successfully');
        return response()->json([
            'status' => true,
            'message' => 'Address updated successfully'
          ]);

     }else{
        return response()->json([
          'status' => false,
          'errors' => $validator->errors()
        ]);
     }
    }



public function logout() {
 Cart::destroy();
 Auth::logout();
 return redirect()->route('account.login')->with("success", "You successfully logout");
}

public function myorders() {
    $user = Auth::user();

    $orders = Order::where('user_id', $user->id)->orderBy('created_at', 'DESC')->get();

    $data['orders'] = $orders;
    return view('front.account.order', $data);
}



public function orderDetail($id) {
    $data = [];
    $user = Auth::user();
    $order = Order::where('user_id', $user->id)->where('id', $id)->first();
     $data['order'] = $order;

     $orderItems = OrderItem::where('order_id',$id)->get();
     $data['orderItems'] = $orderItems;

     $orderItemsCount = OrderItem::where('order_id',$id)->count();
     $data['orderItemsCount'] = $orderItemsCount;

    return view('front.account.order-detail', $data);
  
}

public function wishlist() {
   $wishlists = Wishlist::where('user_id',Auth::user()->id)->with('product')->get();


   $data['wishlists'] = $wishlists;

   return view('front.account.wishlist', $data);
}

public function removeProductFromWishList(Request $request) {
  $wishlist = Wishlist::where('user_id', Auth::user()->id)->where('product_id', $request->id)->first();

  session()->flash('error', 'Product already removed');
  if($wishlist == null) {
    return response()->json([
       'status' => true,
    ]);
  }else{
    Wishlist::where('user_id', Auth::user()->id)->where('product_id', $request->id)->delete();

    session()->flash('success', 'Product removed successfully');

    return response()->json([
        'status' => true,
     ]);

  }
}

public function showChangePasswordForm(){
    return view('front.account.change-password');


}

public function changePassword(Request $request){
    $validator = Validator::make($request->all(),[
       'old_password' => 'required',
       'new_password' => 'required',
       'confirm_password' => 'required|min:3|same:new_password'
    ]);

    if($validator->passes()) {

        $userId = Auth::user()->id;

        $user = User::select('id', 'password')->where('id', $userId)->first();

        if(!Hash::check($request->old_password, $user->password)) {
            session()->flash('error', 'Your old Password is incorrect, please try again');
            return response()->json([
                'status' => false,
               ]);
        }

        User::where('id',$user->id)->update([
           'password' => Hash::make($request->new_password)
        ]);

        session()->flash('success', 'You have successfully changed your password');
        return response()->json([
            'status' => true,
           ]);

    }else{
        return response()->json([
         'status' => false,
         'errors' => $validator->errors()
        ]);
    }
}


public function forgotPassword() {
    return view('front.account.common.forgot-password');
}


public function processForgotPassword(Request $request) {
           $validator = Validator::make($request->all(),[
            'email' => 'required|email|exists:users,email'
           ]);

           if($validator->fails()) {
              return redirect()->route('front.forgotPassword')->withInput()->withErrors($validator);
           }

           $token = Str::random(60);

           DB::table('password_reset_tokens')->where('email', $request->email)->delete();

           DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now()
           ]);


        //    Send Email here
        $user = User::where('email',$request->email)->first();
        $formData = [
            'token' => $token,
            'user' => $user,
            'mailSubject' => 'You have requested to reset your password'
        ];

        Mail::to($request->email)->send(new ResetPasswordEmail($formData));

        return redirect()->route('front.forgotPassword')->with('success', 'Please check your inbox to reset your password.');

}

public function resetPassword($token) {
    $tokenExist = DB::table('password_reset_tokens')->where('token', $token)->first();
    if($tokenExist == null) {
        return redirect()->route('front.forgotPassword')->with('error', 'Invalid Request');
    }
   return view('front.account.reset-password',[
    'token' => $token
   ]);
}

public function processResetPassword(Request $request) {
 $token = $request->token;

 $tokenObj = DB::table('password_reset_tokens')->where('token', $token)->first();
 if($tokenObj == null) {
     return redirect()->route('front.forgotPassword')->with('error', 'Invalid Request');
 }

 $user = User::where('email', $tokenObj->email)->first();

 $validator = Validator::make($request->all(),[
    'new_password' => 'required',
    'confirm_password' => 'required|same:new_password',

   ]);

   if($validator->fails()) {
      return redirect()->route('front.resetPassword',$token)->withErrors($validator);
   }

   User::where('id',$user->id)->update([
      'password' => Hash::make($request->new_password)
   ]);

   DB::table('password_reset_tokens')->where('email', $user->email)->delete();

   return redirect()->route('account.login')->with('success', 'You have successfully updated your password');



}
}