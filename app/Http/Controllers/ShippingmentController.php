<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipping_Country;
use App\Models\Shipping_zones;
use App\Models\Shipping_zones_mapping;
use App\Models\Shipping_Configration;
use App\Models\Shipping_label;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

use Auth;
use DB;
class ShippingmentController extends Controller
{
    function countrymanager(){
      return view('merchant-dashboard.country-manager');
    }
    function addcountrymanager(Request $req){
      $data=new Shipping_Country;
      $data->country_name=$req->country;
      $data->save();
      return redirect()->back()->with('success','country added successfully');
    }
    function countrymanagerview(){
      $data=Shipping_Country::paginate(4);
      return view('merchant-dashboard.shipping-country-view',["data"=>$data]);
    }
    function countrymanagerupdate($id){
      $data=Shipping_Country::find($id);
      return view('merchant-dashboard.shipping_country_update',["data"=>$data]);
    }
    function countrymanagerupdateedit(Request $req){
      $data=Shipping_Country::find($req->sid);
      $data->country_name=$req->country;
      $data->save();
      return redirect('/country-manager-view');
    }
    function countrymanagerupdatedelete($id){
      $data=Shipping_Country::find($id);
      $data->delete();
      return redirect()->back()->with('success','country deleted successfully');
    }
    function shippingzone(){
      $data=Shipping_Country::all();
      return view('merchant-dashboard.shipping-zone',["data"=>$data]);
    }
    function shippingzoneinsert(Request $req){
    $data=new Shipping_zones;
    $data->country_name=$req->country;
    $data->zone=$req->zone;
    $data->zone_code=$req->zone_code;
    $data->save();
    return redirect()->back()->with('success','zone added successfully');

    }
    function shippingzoneview(){
      $data=Shipping_zones::paginate(4);
      return view('merchant-dashboard.shipping-zone-view',["data"=>$data]);
    }
    function shippingzoneupdate($id){
      $value=Shipping_zones::find($id);
      $data=Shipping_Country::all();
      return view('merchant-dashboard.shipping-zone-update',["data"=>$data,"value"=>$value]);
    }
    function shippingzoneupdatedit(Request $req){
      $data=Shipping_zones::find($req->id);
      $data->country_name=$req->country;
      $data->zone=$req->zone;
      $data->zone_code=$req->zone_code;
      $data->save();
      return redirect('shipping-zone-view');
    }
    function shippingzoneupdatedelete($id){
      $data=Shipping_zones::find($id);
      $data->delete();
      return redirect('shipping-zone-view');
    }
    function shippingzonemaping(){
      $data=Shipping_Country::all();
      $value=Shipping_zones::all();
      return view('merchant-dashboard.shipping-zone-maping',["data"=>$data,"value"=>$value]);
    }
    function shippingzonemapinginsert(Request $req){
      $data=new Shipping_zones_mapping;
      $data->zone=$req->zone_name;
      $data->zone_desc=$req->zone_desc;
      $data->country_name=$req->country;
      $data->zone_type=$req->zone_type;
      $data->save();
      return redirect()->back()->with('success','zone mapping added successfully');
    }
    function shippingzonemapingview(){
      $data=Shipping_zones_mapping::paginate(4);
      return view('merchant-dashboard.shipping-zone-mapping-view',["data"=>$data]);
    }
    function shippingzonemapingupdate($id){
      $data1=Shipping_Country::all();
      $value=Shipping_zones::all();
      $data=Shipping_zones_mapping::find($id);
      return view('merchant-dashboard.shipping-zone-mapping-update',["data"=>$data,"data1"=>$data1,"value"=>$value]);
    }
    function shippingzonemapingupdatedit(Request $req){
      $data=Shipping_zones_mapping::find($req->id);
      $data->zone=$req->zone_name;
      $data->zone_desc=$req->zone_desc;
      $data->country_name=$req->country;
      $data->zone_type=$req->zone_type;
      $data->save();
      return redirect('shipping-zone-maping-view');
    }
    function shippingzonemapingdelete($id){
      $data=Shipping_zones_mapping::find($id);
      $data->delete();
      return redirect()->back()->with('success','zone mapping deleted successfully');
    }
    function shippingzonemapingconfiguration(){
      $value=Shipping_zones::all();
    return view('merchant-dashboard.shipping-configuration',["value"=>$value]);
    }
    function shippingzonemapingconfigurationadd(Request $req){
      $c=count($req->flatcost);
      $cc=count($req->cardfrom);
      $ccc=count($req->weight);
      $m=max($c,$cc,$ccc);
      if ($c>0) {
         for ($i=0; $i <$c ; $i++) {
           $data=new Shipping_Configration;
                $data->method_name=$req->method;
                $data->shipping_instruction=$req->shippinginstruction;
                $data->status=$req->status;
                $data->geozone=$req->geozone;
                $data->cost_type=$req->costtype;
                $data->flatcost=$req->flatcost[$i];
                $data->cardfrom=$req->cardfrom['0'];
                $data->cardto=$req->cardto['0'];
                $data->shippingcost=$req->shippingcost['0'];
                $data->weight=$req->weight['0'];
                $data->weightcost=$req->weightcost['0'];
                $data->save();
         }
      }
      if ($cc>0) {
         for ($i=0; $i <$cc ; $i++) {
           $data=new Shipping_Configration;
                $data->method_name=$req->method;
                $data->shipping_instruction=$req->shippinginstruction;
                $data->status=$req->status;
                $data->geozone=$req->geozone;
                $data->cost_type=$req->costtype;
                $data->flatcost=$req->flatcost['0'];
                $data->cardfrom=$req->cardfrom[$i];
                $data->cardto=$req->cardto[$i];
                $data->shippingcost=$req->shippingcost[$i];
                $data->weight=$req->weight['0'];
                $data->weightcost=$req->weightcost['0'];
                $data->save();
         }
      }
      if ($ccc>0) {
         for ($i=0; $i <$ccc ; $i++) {
           $data=new Shipping_Configration;
                $data->method_name=$req->method;
                $data->shipping_instruction=$req->shippinginstruction;
                $data->status=$req->status;
                $data->geozone=$req->geozone;
                $data->cost_type=$req->costtype;
                $data->flatcost=$req->flatcost['0'];
                $data->cardfrom=$req->cardfrom['0'];
                $data->cardto=$req->cardto['0'];
                $data->shippingcost=$req->shippingcost['0'];
                $data->weight=$req->weight[$i];
                $data->weightcost=$req->weightcost[$i];
                $data->save();
         }
      }
      return redirect()->back()->with('success','shipping configuration added successfully');
  /*   for ($i=0; $i <$m ; $i++) {

        $data=new Shipping_Configration;
             $data->method_name=$req->method;
             $data->shipping_instruction=$req->shippinginstruction;
             $data->status=$req->status;
             //$data->total=$req->total;
             $data->geozone=$req->geozone;
             $data->cost_type=$req->costtype;
             $data->flatcost=$req->flatcost[$i];
             $data->cardfrom=$req->cardfrom[$i];
             $data->cardto=$req->cardto[$i];
             $data->shippingcost=$req->shippingcost[$i];
             $data->weight=$req->weight[$i];
             $data->weightcost=$req->weightcost[$i];
           //  $data->	total1=$req->total2;
             //$data->totalbasedcost=$req->totalbasecost;

             $data->save();*/
            // return redirect()->back()->with('success','shipping configuration added successfully');


      //}
  //    return redirect()->back()->with('success','shipping configuration added successfully');

  //  return  $req->all();
/*  $cardfrom=$req->post('cardfrom');
  $cardto=$req->post('cardto');
$result=Shipping_Configration::where(['cardfrom'=>$cardfrom])->first();
if ($result) {
  $result2=Shipping_Configration::where(['cardto'=>$cardto])->first();
  if ($result2) {
    return redirect()->back()->with('success','This range already added successfully');
  }else {
    return redirect()->back()->with('success','This range already added successfully');
  }
}else {
  $data=new Shipping_Configration;
       $data->method_name=$req->method;
       $data->shipping_instruction=$req->shippinginstruction;
       $data->status=$req->status;
       //$data->total=$req->total;
       $data->geozone=$req->geozone;
       $data->cost_type=$req->costtype;
       $data->flatcost=$req->flatcost;
       $data->cardfrom=$req->cardfrom;
       $data->cardto=$req->cardto;
       $data->shippingcost=$req->shippingcost;
       $data->weight=$req->weight;
       $data->weightcost=$req->weightcost;
     //  $data->	total1=$req->total2;
       //$data->totalbasedcost=$req->totalbasecost;

       $data->save();
       return redirect()->back()->with('success','shipping configuration added successfully');

} */
/*  if ($result) {
    echo"0 to 1000 already added";
  }else {
    echo"not added";
  }*/
/*     $data=new Shipping_Configration;
      $data->method_name=$req->method;
      $data->shipping_instruction=$req->shippinginstruction;
      $data->status=$req->status;
      //$data->total=$req->total;
      $data->geozone=$req->geozone;
      $data->cost_type=$req->costtype;
      $data->flatcost=$req->flatcost;
      $data->cardfrom=$req->cardfrom;
      $data->cardto=$req->cardto;
      $data->shippingcost=$req->shippingcost;
      $data->weight=$req->weight;
      $data->weightcost=$req->weightcost;
    //  $data->	total1=$req->total2;
      //$data->totalbasedcost=$req->totalbasecost;
      $data->taxclass=$req->taxclass;
      $data->save();
      return redirect()->back()->with('success','shipping configuration added successfully');
*/
    }
    function shippingzonemapingconfigurationview(){
      $data=Shipping_Configration::paginate(4);
      return view('merchant-dashboard.shipping-configration-view',["data"=>$data]);
    }
    function shippingzonemapingconfigurationupdate($id){
        $value=Shipping_zones::all();
        $data=Shipping_Configration::find($id);
      return view('merchant-dashboard.shipping-configration-update',["value"=>$value,"data"=>$data]);
    }
    function shippingzonemapingconfigurationupdatedit(Request $req){
    $data=Shipping_Configration::find($req->id);
    $data->method_name=$req->method;
    $data->shipping_instruction=$req->shippinginstruction;
    $data->status=$req->status;
    //$data->total=$req->total;
    $data->geozone=$req->geozone;
    $data->cost_type=$req->costtype;
    $data->flatcost=$req->flatcost;
    $data->cardfrom=$req->cardfrom;
    $data->cardto=$req->cardto;
    $data->shippingcost=$req->shippingcost;
    $data->weight=$req->weight;
    $data->weightcost=$req->weightcost;
  //  $data->	total1=$req->total2;
    //$data->totalbasedcost=$req->totalbasecost;

    $data->save();
    return redirect('shipping-configuration-view');
    }
    function shippingzonemapingconfigurationupdatedelete($id){
      $data=Shipping_Configration::find($id);
      $data->delete();
        return redirect('shipping-configuration-view');
    }
    function shippinglabel(){
  return view('merchant-dashboard.shipping-label');
    }
    function shippinglabelinsert(Request $req){
   $data=new Shipping_label;
   $data->label_name=$req->label;
   $data->address=$req->address;
   $data->phoneno=$req->phone;
   $data->email=$req->email;
   if ($req->hasfile('logo')) {
     $file=$req->file('logo');
     $extension=$file->getClientOriginalExtension();
     $filename=time().'.'.$extension;
     $file->move('uploads/logo',$filename);
     $data->logo=$filename;
   }
   $data->save();
   return redirect()->back()->with('success','shipping label added successfully.');
    }
    function shippinglabelview(){
      $data=Shipping_label::paginate(4);
      return view('merchant-dashboard.shipping-label-view',["data"=>$data]);
    }
    function shippinglabelupdate($id){
      $data=Shipping_label::find($id);
      return view('merchant-dashboard.shipping-label-update',["data"=>$data]);
    }
    function shippinglabelupdateinsert(Request $req){
      $data=Shipping_label::find($req->id);
      $data->label_name=$req->label;
      $data->address=$req->address;
      $data->phoneno=$req->phone;
      $data->email=$req->email;
      if ($req->hasfile('logo')) {

        $destination='uploads/logo/'.$data->logo;
        if (File::exists($destination)) {
          File::delete($destination);
        }

        $file=$req->file('logo');
        $extension=$file->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $file->move('uploads/logo',$filename);
        $data->logo=$filename;
      }
      $data->update();
      return redirect()->back()->with('success','shipping label updated successfully.');
    }
    function shippinglabeldelete(Request $req,$id){
    $data=Shipping_label::find($id);

      $destination='uploads/logo/'.$data->logo;
      if (File::exists($destination)) {
        File::delete($destination);
      }

  $data->delete();
  return redirect()->back()->with('success','shipping label deleted successfully.');


    }
    function shippinglabeltable($id){
    //echo $email=Session::get('merchant_id');


     $data=Shipping_label::find($id);
    /*  $email=Session()->get('user_id');*/
      return view('merchant-dashboard.shipping-label-table',["data"=>$data]);

    }
    function indexload(){
      $data=DB::table('users')->count();
      $data1=DB::table('order_status')->where('type','completed')->count();
      $data2=DB::table('order_status')->where('type','pending')->count();
      $cancel_order=DB::table('sales')->where('cancel_remark','cancel')->count();
      $coupan=DB::table('promocodes')->where('no_of_time_used')->count();
     $sum=DB::table('sales')
                ->sum('sub_total');

  return view('merchant-dashboard.index',["data"=>$data,'data1'=>$data1,"data2"=>$data2,"sum"=>$sum,"cancel_order"=>$cancel_order,
    "coupan"=>$coupan
]);

    }
}
