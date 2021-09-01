<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Hash;
use Session;

class AdminController extends Controller
{
    public function index()
    {
        $merchents=User::where('role', 'merchant')->count();
        return view('admin.index', compact('merchents'));
    }

    public function login(Request $req)
    {
        $data= new User();
        $email = $req->post('email');
        $password = $req->post('password');
        if(isset($email)){
            $data = DB::select("select * from users where email='$email'");
            if($data){
                   $pass = User::where(['email'=>$email])->first();
                    if(Hash::check($password, $pass->password)){
                        $req->session()->put('admin_login',true);
                        $req->session()->put('admin_id',$pass->id);
                        $req->session()->put('admin_email',$pass->email);
                        return redirect('/admin/dashboard');
                    }else{
                        $req->session()->flash('error','Invalid your credentials information');
                        return redirect('/admin');  
                    }
            }else{
                $req->session()->flash('error','Invalid your credentials information');
                return redirect('/admin');  
            }
            
        }else{
            $req->session()->flash('error','Invalid your credentials information');
            return redirect('/admin');

        }
    }

    public function profile(Request $request)
    {   
        $email =Session()->get('admin_email');
        $profile = User::where('email',$email)->first();
        return view('admin.profile')->with(compact('profile'));
    }

    public function changepassword(Request $request)
    {   
        
        $new_pass = $request->post('password');
        $password_confirmation = $request->post('password_confirmation');

        if($new_pass == $password_confirmation ){
            $email =Session()->get('admin_email');
            $old_pass = $request->post('old_pass');
            $password = Hash::make($request->post('password'));
            $pass = User::where(['email'=>$email])->first();
            
            if(Hash::check($old_pass, $pass->password)){
                $category=User::where('email',$email)->update(['password'=>$password]);
                $request->session()->flash('success','Password Changed Done');
                return redirect('/admin/change-password');
            }else{
                $request->session()->flash('error','Old Password Not Match');
                return redirect('/admin/change-password');  
            }
        }else{
            $request->session()->flash('error','Confirm Password Not Match');
            return redirect('/admin/change-password');  
        }

        
    }

    public function logout(Request $req)
    {
            $req->session()->forget('admin_login');
            $req->session()->forget('admin_id');
            $req->session()->forget('admin_email'); 
            $req->session()->flash('success','Logout successfully done');
            return redirect('/admin');
        
    }
}
