<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\StoreDetail;
use Validator;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // return view('auth.register');
        return view('merchent.register');
    }
    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        
        $validateData=$request->validate([
            'first_name' => ['required','alpha'],
            'last_name' => ['required','alpha'],
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'mobile_number' => ['required','numeric', 'digits:10'],
            'terms_conditions' => ['required'],
        ]);
       if ($validateData)
       {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'role' => "merchent",
            'password' => Hash::make($request->password),
            'mobile_number' => $request->mobile_number,
            'terms_conditions'=>$request->terms_conditions
        ]);
    }
        event(new Registered($user));

     Auth::login($user);
      
        $request->session()->put('merchant_login',true);
        $request->session()->put('merchant_email',$request->email);
        $request->session()->put('merchant_firstname',$request->first_name); 
        $request->session()->put('merchant_lastname',$request->last_name);
        return redirect('/plans')->with('success', 'Your registration is done.');
    }

    public function userStore(Request $request)
    {
        
        if($request->ajax()){
			
			$rules = [
                'first_name' => 'required',
                'last_name' => 'required',
                'email'=>'required|email|unique:users,email',
                'mobile_number'=>'required|numeric|unique:users|min:10',
                'password'=>'required',
                "password_confirmation"=>"required|same:password|min:8",
                "terms_conditions"=>"required"             
			];
			$messages = array(
				'first_name.required' => "First name is required",
                'last_name.required' => "Last name is required",
				'email.required' => "Email is required",
				'mobile_number.required' => "Mobile number is required",  
				'mobile_number.unique' => "This mobile no is already registered with us so please try another mobile no",
				'password.required' => "Password is required",
				'password_confirmation.required' => "Confirm Password is required",
				'password_confirmation.same' => "Password and confirm password must be same",
                'terms_conditions.required' => "Term and condition is required",
			);
			$validator = Validator::make($request->all(), $rules, $messages);
			
			if ($validator->fails()) {
				$message = [];
				$messages_l = json_decode(json_encode($validator->messages()), true);
				foreach ($messages_l as $msg) {
					$message= $msg[0];
					break;
				} 	
				return response(array("error" 
					=> true, "msg" => $message));
						
			}else{

				try{

                    $alldata = StoreDetail::select('id')
                            ->where('domain_name', config('custom.host_name'))
                            ->get()->first();
                           $store_id = $alldata->id;
               
               
                    $user = User::create([
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'email' => $request->email,
                        'role' => "user",
                        'password' => Hash::make($request->password),
                        'mobile_number' => $request->mobile_number,
                        'store_detail_id' => $store_id
                    ]); 
					
                    if($user){
                        $mobile = $request->mobile_number;
                        $send = app(\App\Http\Controllers\HomeController::class)->sendotp($request);
                        event(new Registered($user));
                        Auth::login($user);
                        $msg = "Registration success and Otp send Your Number.";
                        return response(['error'=>false, 'msg'=>'Registration success and Otp send Your Number']);
                        
                    }else{
                        $msg = "Something Wrong !Please Try again.";
                        return response(array("msg" =>$msg));
                    }
				}catch (\Exception $e){
					return response(array("error" 
					=> true, "msg" => $e->getMessage())); 
				}
			}
			 
		}
    }
}
