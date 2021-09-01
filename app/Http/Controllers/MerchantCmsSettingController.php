<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cms_setting;
use App\Models\StoreDetail;
use Auth;

class MerchantCmsSettingController extends Controller
{
     public function ViewCmsSetting(){
         $store_detail_id = StoreDetail::select('id')
                    ->where('user_id', Auth::id())
                    ->first();
        return view('merchant-dashboard.cms_setting');
    }

    public function store(Request $request){
         $store_detail_id = StoreDetail::select('id')
                    ->where('user_id', Auth::id())
                    ->first();

        $dataget = cms_setting::where('store_detail_id',$store_detail_id->id)->first();
        if($dataget){
            $data = cms_setting::where('store_detail_id',$store_detail_id->id)->update([
                'font_color'=>$request->font_color,
                'font_hover_color'=>$request->font_hover_color,
                'active_color'=>$request->active_color,
                'whishlist_color'=>$request->whishlist_color,
                'cart_color'=>$request->cart_color,
                'button_color'=>$request->button_color                
            ]);
            if($data)
            {
                return redirect()->back()->with('success','Color updated successfully');
            }

        }else{
            $data = cms_setting::create([
                'font_color'=>$request->font_color,
                'font_hover_color'=>$request->font_hover_color,
                'active_color'=>$request->active_color,
                'whishlist_color'=>$request->whishlist_color,
                'cart_color'=>$request->cart_color,
                'button_color'=>$request->button_color,
                'store_detail_id'=>$store_detail_id->id
            ]);
            if($data)
            {
                return redirect()->back()->with('success','Color added successfully');
            }
        }
    }

    public function taxRateSetting(){

        return view('merchant-dashboard.tax_rate_setting');
    }

    public function tax_rate_store(){
        
    }

}
