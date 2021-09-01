<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class MerchantMarketingController extends Controller
{
    public function marketingUpdate(Request $request)
    {
        $dataget = DB::table('merchant_marketing_option')->where('user_id',Auth::id())->first();
        if($dataget){
            $data = DB::table('merchant_marketing_option')->where('user_id',Auth::id())->update([
                'google_nalytics' => $request->analytics,
                'facebook_pixel' => $request->facebook_pixel,
                'google_shopping_feed' => $request->google_shopping_feed,
                'facebook_shop_feed' => $request->facebook_shop_feed,
                'instagram_shop_feed' => $request->instagram_shop_feed,
                'whatsApp_chat' => $request->whatsapp
            ]);
            if($data)
            {
                return redirect()->back()->with('success','Data updated successfully');
            }

        }else{
            $data = DB::table('merchant_marketing_option')->insert([
                'user_id' =>Auth::id(),
                'google_nalytics' => $request->analytics,
                'facebook_pixel' => $request->facebook_pixel,
                'google_shopping_feed' => $request->google_shopping_feed,
                'facebook_shop_feed' => $request->facebook_shop_feed,
                'instagram_shop_feed' => $request->instagram_shop_feed,
                'whatsApp_chat' => $request->whatsapp,
                'mailchimp_api' => $request->mail_api,
                'mailchimp_list' => $request->mail_list
            ]);
            if($data)
            {
                return redirect()->back()->with('success','Data added successfully');
            }
        }
    }

    public function Marketing(Request $request)
    {
        $marketing = DB::table('merchant_marketing_option')->where('user_id',Auth::id())->first();
        return view('merchant-dashboard.marketing')->with(compact('marketing'));
    }
}
