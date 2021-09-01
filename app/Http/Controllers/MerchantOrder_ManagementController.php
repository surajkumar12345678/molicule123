<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductAttributeValue;
use App\Models\Category;
use App\Models\StoreDetail;
use App\Models\ProductType;
use Illuminate\Support\Facades\Auth;
use App\Exports\OrderExport;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use DB;

class MerchantOrder_ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function PendingOrder(Request $request)
    {
		if ($request->ajax()) {

           $Sales = DB::table('sales')->where('user_id',Auth::id())->get();
            return DataTables::of($Sales)
			->addColumn('address', function($Sales){
				return $address = $Sales->address.', '.$Sales->city.', '.$Sales->Pincode;
            })
			->addColumn('date', function($Sales){
				return $date = date("Y-m-d", strtotime($Sales->created_at));
            })
			->addColumn('payment_type', function($Sales){
				if($Sales->payment_type == '1'){ $data="Payment Gateway"; }else{ $data="COD"; }
				return $data;
            })
            ->addColumn('status', function($Sales){
				if($Sales->status=='0'){
					$button = '<span class="btn btn-warning btn-sm">Pending</span>';
				}if($Sales->status=='1'){
                    $button = '<span class="btn btn-primary btn-sm">Procesing</span>';
                }if($Sales->status=='2'){
                    $button = '<span class="btn-info btn-sm">Shipped</span>';
                }if($Sales->status=='3'){
                    $button = '<span class="btn btn-success btn-sm">Complited</span>';
                }if($Sales->status=='4'){
                    $button = '<span class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="'.$Sales->cancel_remark.'">Cancelled</span>';
                }if($Sales->status=='5'){
                    $button = '<span class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="'.$Sales->cancel_remark.'">Cancelled</span>';
                }
				return $button;
            })
			->addColumn('action', function($Sales){
				$button = '<a class="btn-info btn-sm" href="'.url('order-details/'.$Sales->id).'">
                                        <i class="fa fa-eye" aria-hidden="true"></i></a> ';
                $button .= ' <a class="btn-success btn-sm" href="'.url('order-invoice/'.$Sales->id).'">
                <i class="fa fa-file-text-o"></i></a> ';

				return $button;
            })
            ->escapeColumns([])
            ->make(true);
        }
        $Sales = DB::table('sales')->where('user_id',Auth::id())->get();
        $SalesDetail = DB::table('sales_details')->where('user_id',Auth::id())->get();
        return view('merchant-dashboard.order-management')->with(['sales'=>$Sales, 'getOrders'=>$SalesDetail]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function orderDetails($id="")
    {
        $Sales = DB::table('sales')->where('id',$id)->where('merchant_id',Auth::id())->first();
        $SalesDetail = DB::table('sales_details')->where('merchant_id',Auth::id())->get();
        return view('merchant-dashboard.order-details')->with(['sale'=>$Sales, 'getOrders'=>$SalesDetail]);

    }
    public function orderInvoice($id="")
    {
        $Sales = DB::table('sales')->where('id',$id)->where('merchant_id',Auth::id())->first();
        $store = DB::table('store_details')->where('user_id',Auth::id())->first();
        $merchant = DB::table('users')->where('id',Auth::id())->first();
        $SalesDetail = DB::table('sales_details')->where('merchant_id',Auth::id())->get();
        return view('merchant-dashboard.order-invoice')->with(['sale'=>$Sales, 'getOrders'=>$SalesDetail, 'store'=>$store, 'merchant'=>$merchant]);

    }
    public function orderApprove(Request $request,$id="")
    {

        $sales = DB::table('sales')->where('id',$id)->where('merchant_id',Auth::id())->first();
        $salesDetails = DB::table('sales_details')->where('merchant_id',Auth::id())->where('user_id',$sales->user_id)->where('order_id',$sales->order_id)->get();
        $user = DB::table('users')->where('id',$sales->user_id)->first();

        if($sales->status == 0){
            $status_id = '1';
            DB::insert('insert into orderhistory(order_id,status) values(?,?)',[
            $sales->order_id,'1']);
            $msg = 'Order Processing successfully';
        }elseif($sales->status == 1){
            $status_id = '2';
            DB::insert('insert into orderhistory(order_id,status) values(?,?)',[
            $sales->order_id,'2']);
            $msg = 'Order shipped successfully';

        }elseif($sales->status == 2){
            $status_id = '3';
            DB::insert('insert into orderhistory(order_id,status) values(?,?)',[
            $sales->order_id,'3']);
            $msg = 'Order delivered successfully';

        }elseif($sales->status == 3){
            $status_id = '4';
            DB::insert('insert into orderhistory(order_id,status) values(?,?)',[
            $sales->order_id,'4']);
            $msg = 'Order complited';
        }
        if(isset($request->remark)){
            $remark = $request->remark;
        }else{
            $remark = "";
        }
        $status = DB::table('sales')->where('id',$id)->update([
            "status"=>$status_id,
            "cancel_remark"=>$remark
        ]);
        if($status){
            $salesDetails = DB::table('sales_details')->where('order_id',$sales->order_id)->get()->toArray();
            foreach($salesDetails as $details){

                $status = DB::table('sales_details')->where('id',$details->id)->update([
                    "order_status"=>$status_id,
                ]);
            }
        }
        $request->session()->flash('success',$msg);
        return redirect('/order-management');

    }


    public function orderCancell(Request $request)
    {

        $sales = DB::table('sales')->where('id',$request->id)->first();
        $salesDetails = DB::table('sales_details')->where('user_id',$sales->user_id)->where('order_id',$sales->order_id)->get();
        $user = DB::table('users')->where('id',$sales->user_id)->first();

        if($request->status == 4){
            $status_id = '4';
            DB::insert('insert into orderhistory(order_id,status) values(?,?)',[
            $sales->order_id,'5']);
            $msg = 'Order cancel by admin successfully';
        }
        if(isset($request->remark)){
            $remark = $request->remark;
        }else{
            $remark = "";
        }
        $status = DB::table('sales')->where('id',$request->id)->update([
            "status"=>$status_id,
            "cancel_remark"=>$remark
        ]);
        if($status){
            $salesDetails = DB::table('sales_details')->where('order_id',$sales->order_id)->get()->toArray();
            foreach($salesDetails as $details){

                $status = DB::table('sales_details')->where('id',$details->id)->update([
                    "order_status"=>$status_id,
                ]);
            }
        }
        $request->session()->flash('success',$msg);
        return redirect('/order-management');

    }

    public function orderCancellByUser(Request $request)
    {

        $sales = DB::table('sales')->where('id',$request->id)->first();
        $salesDetails = DB::table('sales_details')->where('user_id',$sales->user_id)->where('order_id',$sales->order_id)->get();
        $user = DB::table('users')->where('id',$sales->user_id)->first();

        if($request->status == 5){
            $status_id = '5';
            DB::insert('insert into orderhistory(order_id,status) values(?,?)',[
            $sales->order_id,'6']);
            $msg = 'Order cancel by user successfully';
        }
        if(isset($request->remark)){
            $remark = $request->remark;
        }else{
            $remark = "";
        }
        $status = DB::table('sales')->where('id',$request->id)->update([
            "status"=>$status_id,
            "cancel_remark"=>$remark
        ]);
        if($status){
            $salesDetails = DB::table('sales_details')->where('order_id',$sales->order_id)->get()->toArray();
            foreach($salesDetails as $details){

                $status = DB::table('sales_details')->where('id',$details->id)->update([
                    "order_status"=>$status_id,
                ]);
            }
        }
        $request->session()->flash('success',$msg);
        return redirect('/user/user-order');

    }
    public function export()
    {
        return Excel::download(new OrderExport, 'orders.xlsx');
    }





}
