<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\StoreDetail;
use App\Models\Domaindetail;

class MerchantDomain_DetailController extends Controller
{
    public function domainDetail(){

      $store_detail_id = StoreDetail::select('id')
                    ->where('user_id', Auth::id())
                    ->first();

      $domainname = Domaindetail::select('*')
                    ->where('store_detail_id', $store_detail_id->id)
                    ->first();
         
      return view('merchant-dashboard.domain_details',compact('domainname'));   
    }           

 
}
