<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function index() {
        return view('admin.Login');
    }


    public function Authentication(Request $request){
        $credentials = $request->validate([
             'email'  => 'required|email',
             'password' => 'required'
        ]);

        if(Auth::guard('admin')->attempt($credentials)) {

            $admin = Auth::guard('admin')->user();

            if($admin->role == 2) {
                return redirect()->route('admin.dashboard');
            }else{
                Auth::guard('admin')->logout();
                return back()->with('error', 'You are not authorized to access admin panel.');   
            }
         
        }else{
            return back()->with('error', 'Either Email and Password is incorract');
        }
    }

    
}
