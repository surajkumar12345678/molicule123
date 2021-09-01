<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\StoreDetail;
use Session;
use DB;
use Hash;
use Auth;

class Merchant_LoginController extends Controller
{
    public function create()
    {
        return view('merchent.login');
    }
    public function PostLogin(Request $request)
    {    
        $result = User::where('email',$request->email)->first();
        
        if($result){
            $credentials = $request->only('email', 'password');
                if (Auth::attempt($credentials)) {
                   
                            $request->session()->put('merchant_login',true);
                            $request->session()->put('merchant_id',$result->id);
                            $request->session()->put('merchant_email',$result->email);
                            $request->session()->put('merchant_firstname',$result->first_name); 
                            $request->session()->put('merchant_lastname',$result->last_name);
        
                            return redirect()->route('dashboard');
                        } else {
                            return redirect("login")->withSuccess('invalid password');
                    }
               }  else {
            return redirect("login")->withSuccess('These credentials do not match our records');
        }
    }
}
