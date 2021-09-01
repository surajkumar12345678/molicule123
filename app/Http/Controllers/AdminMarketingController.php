<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\order_status;
use App\Models\payment_option_management;
use App\Models\admin_marketing_option;
use Auth;
use DB;
class AdminMarketingController extends Controller
{
    function index(){
      return view('admin.marketing-admin');
    }
    function paymentmanagementadmin(){
      $value = Session::get('admin_id');
      $marketing = DB::table('payment_option_management')->where('user_id',$value)->first();
      return view('admin.payment-management-admin',["payment"=>$marketing]);
    }
    function orderstatus(){
      return view('admin.order-status');
    }
    function addorder(Request $req){
    $data=new order_status;
    $data->order_name=$req->name;
    $data->slug=$req->slug;
    $data->description=$req->description;
    $data->paid=$req->paid;
    $data->report=$req->report;
    $data->type=$req->type;
    $data->save();
    return redirect()->back()->with('success','order added successfully');
    }
    function orderstatuscheck(){
      $data=order_status::paginate(5);
      return view('admin.order_status_check',["data"=>$data]);
    }
    function orderstatusupdate($id){
      $data=order_status::find($id);
      return view('admin.order-status-update',["data"=>$data]);
    }
   function orderstatusupdation(Request $req){
     $data=order_status::find($req->sid);
     $data->order_name=$req->name;
     $data->slug=$req->slug;
     $data->description=$req->description;
     $data->paid=$req->paid;
     $data->report=$req->report;
     $data->type=$req->type;
     $data->save();
     return redirect('admin/order-status-check');
   }
  function orderstatusdelete($id){
    $data=order_status::find($id);
    $data->delete();
    return redirect('admin/order-status-check');
  }
  function paymentmanagementadminaction(Request $req){
    $value = Session::get('admin_id');
    $data = DB::select('select * from payment_option_management where user_id = ?',[$value]);

    if ($data==true) {
      DB::table('payment_option_management')->where('user_id', $value)->update([
    'payment_option' => $req->payment_option,
    'payple_client_id' => $req->payple_client_id,
    'payple_secret_id'=>$req->payple_secret_id,
    'yoco_client_id'=>$req->yoco_client_id,
    'yoco_secret_id'=>$req->yoco_secret_id,
    'payfast_client_id'=>$req->payfast_client_id,
    'payfast_secret_id'=>$req->payfast_secret_id
    ]);
    return redirect()->back()->with('success','Payment Option updated Successfully');
}else {
  $data=new payment_option_management;
  $data->user_id=$value;
   $data->payment_option=$req->payment_option;
   $data->payple_client_id=$req->payple_client_id;
   $data->payple_secret_id=$req->payple_secret_id;
   $data->yoco_client_id=$req->yoco_client_id;
   $data->yoco_secret_id=$req->yoco_secret_id;
   $data->payfast_client_id=$req->payfast_client_id;
   $data->payfast_secret_id=$req->payfast_secret_id;
   $data->save();
   return redirect()->back()->with('success','payment option added successfully');
}



  }
  function marketingtools(){

  $value = Session::get('admin_id');
  $marketing = DB::table('admin_marketing_option')->where('user_id',$value)->first();

    return view('admin.marketing-tools',["value"=>$value,"marketing"=>$marketing]);
  }
  function marketingtoolsaction(Request $req){
    $data = DB::select('select * from admin_marketing_option where user_id = ?',[$req->sid]);

    if ($data==true) {
      DB::table('admin_marketing_option')->where('user_id', $req->sid)->update([
'google_nalytics' => $req->analytics,
 'facebook_pixel' => $req->facebook_pixel,
'google_shopping_feed'=>$req->google_shopping_feed,
'facebook_shop_feed'=>$req->facebook_shop_feed,
'instagram_shop_feed'=>$req->instagram_shop_feed,
'whatsApp_chat'=>$req->whatsapp,
'mailchaimp_api_key'=>$req->mail_api,
'mailchaimp_api_list'=>$req->mail_list
]);
return redirect()->back()->with('success','Marketing Option updated Successfully');


    }else{
      $data=new admin_marketing_option;
      $data->user_id=$req->sid;
      $data->google_nalytics=$req->analytics;
      $data->facebook_pixel=$req->facebook_pixel;
      $data->google_shopping_feed=$req->google_shopping_feed;
      $data->facebook_shop_feed=$req->facebook_shop_feed;
      $data->instagram_shop_feed=$req->instagram_shop_feed;
      $data->whatsApp_chat=$req->whatsapp;
      $data->mailchaimp_api_key=$req->mail_api;
      $data->mailchaimp_api_list=$req->mail_list;
      $data->save();
      return redirect()->back()->with('success','Marketing Option updated Successfully');
    }


  }
  function shippingmethod(){
    return view('admin.shipping-method');
  }
}
