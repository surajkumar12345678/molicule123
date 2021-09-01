<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cart;
use App\Models\StoreDetail;
use Session;
use DB;
use Hash;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('merchent.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();
        // return redirect('congratulations');
        // return redirect()->intended(RouteServiceProvider::HOME);

        return redirect()->intended(RouteServiceProvider::HOME)->with('success','Loggeds in successfully');
    }

    public function userLogin(Request $request)
    {
        $userResult = User::where('mobile_number',$request->mobile_number)->first();
      
        if($userResult){
            if(Hash::check($request->password, $userResult->password)==true){
                if($userResult->otp_verify_status !='1'){
                    
                    return response(array("error" 
                            => true,"msg" => 'OTP verification pending ! please first verify your account.', "user_verify"=>false));
                }else{
                        
                        $store_detail = StoreDetail::where('domain_name',($_SERVER['HTTP_HOST']))->first();
                        if(!$store_detail){
                                $msg = "These credentials do not match our records.";
                                return response(array("error" 
                                => true,"msg" => $msg, "user_verify"=>false));
                        }else {
                            
                            Auth::login($userResult);
                            $cartData = Session::get('cart_session');
                            if(!empty($cartData)){
                                foreach($cartData as $key=>$value){
                                    
                                    $cart = DB::table('carts')->where('id',$value['product_id'])->where('user_id',Auth::id())->first();
                                    if(!empty($cart)){
                                        Cart::where('id',$value['product_id'])->where('user_id',Auth::id())->update(
                                            ['user_id'=>Auth::id(),
                                            'product_id'=>$value['product_id'],
                                            'qty'=>$value['qty'],
                                            'attributes'=>$value['attributes']
                                        
                                        ]);
                                    }else{
                                        DB::table('carts')->insert(
                                            ['user_id'=>Auth::id(),
                                            'product_id'=>$value['product_id'],
                                            'qty'=>$value['qty'],
                                            'attributes'=>$value['attributes']
                                            ]
                                        );
                                    }
                                }
                            }
                            Session::forget('cart_session');
                            // Session::put('user', ['id'=>$userResult->id,'firstname' => $userResult->first_name, 'lastname' => $userResult->last_name, 'role'=>$userResult->role]);
                            $request->session()->put('user_login',true);
                            $request->session()->put('user_id',$userResult->id);
                            $request->session()->put('user_email',$userResult->email);
                            $request->session()->put('user_firstname',$userResult->first_name); 
                            $request->session()->put('user_lastname',$userResult->last_name);
                            $msg = "login successfully";
                            return response(array("error" 
                            => false,"msg" => $msg,"user_verify"=>true));
                        }
                }
            }else{
                return response(array("error" 
                            => true,"msg" => 'These credentials do not match our records.', "user_verify"=>false));
            }
        }else{
            return response(array("error" 
                        => true,"msg" => 'User does not exist.please try again.', "user_verify"=>false));
        }
        //return redirect()->intended(RouteServiceProvider::HOME)->with('success','Logged in successfully');
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
  
          
                $request->session()->forget('merchant_login');
                $request->session()->forget('merchant_email');
                $request->session()->forget('merchant_firstname',);
                $request->session()->forget('merchant_lastname');
          // $request->session()->invalidate();

        // $request->session()->regenerateToken();

        return redirect('/login')->with('success','logged out successfully');
    }
}
