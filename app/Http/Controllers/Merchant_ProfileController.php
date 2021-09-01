<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\StoreDetail;
use App\Models\MerchantGallery;
use Illuminate\Support\Facades\Auth;
use DB;
use Hash;

class Merchant_ProfileController extends Controller
{
    public function index()
    {
        $data = User::where('id',Auth::id())->get()->first();
        return view('merchant-dashboard.profile',compact('data'));
    }

    public function changePassword(Request $request)
	{
		$data = DB::table('users')->where('id',Auth::id())->first();
		return view('merchant-dashboard.change-password')->with(compact('data'));
    }

    public function storedetail()
	{
        $store_detail_id = StoreDetail::select('id')
                                  ->where('user_id', Auth::id())
                                  ->get()->first();
        $data = DB::table('users')->where('id',Auth::id())->first();
		$store_detail = DB::table('store_details')->where('id',$store_detail_id->id)->first();
		return view('merchant-dashboard.store-detail',compact(['data','store_detail']));
    }

    public function plandetail()
	{
		$store_detail_id = StoreDetail::select('id')
                                  ->where('user_id', Auth::id())
                                  ->get()->first();
        $data = DB::table('users')->where('id',Auth::id())->first();
		$store_detail = DB::table('store_details')->where('id',$store_detail_id->id)->first();
		return view('merchant-dashboard.plan-detail',compact(['data','store_detail']));
    }

    public function layoutdetail()
	{
		$store_detail_id = StoreDetail::select('id')
                                  ->where('user_id', Auth::id())
                                  ->get()->first();
		$data = DB::table('store_details')->where('id',$store_detail_id->id)->first();
		$store_detail = DB::table('store_details')->where('id',$store_detail_id->id)->first();
		return view('merchant-dashboard.layout-detail',compact(['data','store_detail']));
    }

    public function gallery()
    {
        $store_detail_id = StoreDetail::select('id')
                                  ->where('user_id', Auth::id())
                                  ->get()->first();
        $galleries = MerchantGallery::where('store_detail_id',$store_detail_id->id)->get();
        return view('merchant-dashboard.gallery',compact('galleries'));
    }

    public function addgallery(Request $request)
    {
        $id = null;
        if($request->id)
        {
            $id = $request->id;
        }
        return view('merchant-dashboard.addgallery',compact('id'));
    }

    public function storegallery(Request $request)
    {
        $store_detail_id = StoreDetail::select('id')
                                  ->where('user_id', Auth::id())
                                  ->get()->first();
        if($request->file('image'))
        {
            $originName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('image')->move(public_path('/uploads/galleries/'), $fileName);
            if($request->id)
            {
                DB::table('merchant_galleries')->where('id',$request->id)->update([
                    'image' => $fileName,
                    'updated_at'=>now()
                ]); 
                return redirect(route('merchant-gallery'))->with('success','Image updated successfully');
            }
            else
            {
                DB::table('merchant_galleries')->insert([
                    'image' => $fileName,
                    'user_id' => Auth::id(),
                    'store_detail_id' => $store_detail_id->id,
                    'created_at' => now()
                ]);
                return redirect(route('merchant-gallery'))->with('success','Image added successfully');
            }
        }
        
    }

    public function deletegallery(Request $request)
    {
        DB::table('merchant_galleries')->where('id',$request->id)->delete();
        return redirect(route('merchant-gallery'))->with('success','Image deleted successfully');
    }


    public function updateProfile(Request $request)
	{
		DB::table('users')->where('id',Auth::id())->update([
			'first_name'=>$request->fname,
			'last_name'=>$request->lname,
			'email'=>$request->email,
			'gender'=>$request->gender,
			'mobile_number'=>$request->mobile
			]
		);

		$request->session()->flash('success','Profile updated successfully');
		return redirect()->back();
    }

    public function updatestoredetail(Request $request)
    {
        $arr = [
            'store_name' => $request->store_name,
            'about_store' => $request->about_store,
        ];
        if($request->file('store_logo'))
        {
            $originName = $request->file('store_logo')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('store_logo')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('store_logo')->move(public_path('/uploads/storelogos/'), $fileName);
            $arr['store_logo'] = $fileName;
        }
        $store_detail_id = StoreDetail::select('id')
                                  ->where('user_id', Auth::id())
                                  ->get()->first();
        $data = DB::table('store_details')->where('id',$store_detail_id->id)->update($arr); 
        $request->session()->flash('success','store detail updated successfully');
		return redirect()->back();                         
    }

    public function updateplandetail(Request $request)
    {
        if($request->plan_id)
        {
            $store_detail_id = StoreDetail::select('id')
                                  ->where('user_id', Auth::id())
                                  ->get()->first();
            $data = DB::table('store_details')->where('id',$store_detail_id->id)->update([
                'plan_id' => $request->plan_id
            ]); 
            $request->session()->flash('success','Plan updated successfully');
            return redirect()->back();
        }
    }

    public function updatelayoutdetail(Request $request)
    {
        $store_detail_id = StoreDetail::select('id')
                                ->where('user_id', Auth::id())
                                ->get()->first();
        $arr = [];
        if($request->layout_id)
        {
            $arr['layout_id'] = $request->layout_id;
        } 
        if($request->coor)
        {
            $arr['color'] = $request->color;
        }                        
        $data = DB::table('store_details')->where('id',$store_detail_id->id)->update($arr); 
        $request->session()->flash('success','Layout updated successfully');
        return redirect()->back();
    }

    public function uploadprofileimage(Request $request)
    {
        if($request->file('profile_image'))
        {
            $originName = $request->file('profile_image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('profile_image')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('profile_image')->move(public_path('/uploads/profileimages/'), $fileName);
            DB::table('users')->where('id',Auth::id())->update([
                'profile_image' => $fileName
            ]);
        }
        return redirect()->back();
    }

	public function updatePassword(Request $request)
	{
		$new_pass = $request->password;
        $password_confirmation = $request->password_confirmation;

        if($new_pass == $password_confirmation ){
            $old_pass = $request->old_pass;
            $password = Hash::make($request->password);
            $pass = User::where('id',Auth::id())->first();

            if(Hash::check($old_pass, $pass->password)){
                $user=User::where('id',Auth::id())->update(['password'=>$password]);
                $request->session()->flash('success','Password changed done');
				return redirect()->back();
            }else{
                $request->session()->flash('error','Old password not match');
				return redirect()->back();
            }
        }else{
            $request->session()->flash('error','Confirm password not match');
            return redirect()->back();
        }
    }
}
