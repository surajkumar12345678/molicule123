<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class MerchantSocialLinkController extends Controller
{
    public function socialLinkUpdate(Request $request)
    {
        $dataget = DB::table('merchant_social_option')->where('user_id',Auth::id())->first();
        if($dataget){
            $data = DB::table('merchant_social_option')->where('user_id',Auth::id())->update([
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'youtube' => $request->youtube,
                'linkedin' => $request->linkedin,
                'twitter' => $request->twitter
            ]);
            if($data)
            {
                return redirect()->back()->with('success','Social link updated successfully');
            }

        }else{
            $data = DB::table('merchant_social_option')->insert([
                'user_id' =>Auth::id(),
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'youtube' => $request->youtube,
                'linkedin' => $request->linkedin,
                'twitter' => $request->twitter
            ]);
            if($data)
            {
                return redirect()->back()->with('success','Social link added successfully');
            }
        }
    }

    public function socialLink(Request $request)
    {
        $social = DB::table('merchant_social_option')->where('user_id',Auth::id())->first();
        return view('merchant-dashboard.social-link')->with(compact('social'));
    }

}
