<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class MerchantPaymentOptionController extends Controller
{
    public function paymentOption(Request $request)
    {
        $dataget = DB::table('merchant_payment_option')->where('user_id',Auth::id())->first();
        if($dataget){
            $data = DB::table('merchant_payment_option')->where('user_id',Auth::id())->update([
                'payple_username' => $request->payple_username,
                'payple_password' => $request->payple_password,
                'payple_signature' => $request->payple_signature,
                'yoco_client_id' => $request->yoco_client_id,
                'yoco_secret_id' => $request->yoco_secret_id,
                'payfast_client_id' => $request->payfast_client_id,
                'payfast_secret_id' => $request->payfast_secret_id
            ]);
            if($data)
            {
                return redirect()->back()->with('success','Payment option updated successfully');
            }

        }else{
            $data = DB::table('merchant_payment_option')->insert([
                'user_id' =>Auth::id(),
                'payple_username' => $request->payple_username,
                'payple_password' => $request->payple_password,
                'payple_signature' => $request->payple_signature,
                'yoco_client_id' => $request->yoco_client_id,
                'yoco_secret_id' => $request->yoco_secret_id,
                'payfast_client_id' => $request->payfast_client_id,
                'payfast_secret_id' => $request->payfast_secret_id
            ]);
            if($data)
            {
                return redirect()->back()->with('success','Payment option added successfully');
            }
        }
    }

    public function paymentGet(Request $request)
    {
        $payment = DB::table('merchant_payment_option')->where('user_id',Auth::id())->first();
        return view('merchant-dashboard.payment-management')->with(compact('payment'));
    }

    public function paymentStatus(Request $request)
    {
        $data = DB::table('merchant_payment_option')->where('user_id',Auth::id())->first();
        if($data){
            DB::table('merchant_payment_option')->where('id',$request->id)->update([
                'payment_gateway' => $request->status
            ]);
        }else{
            DB::table('merchant_payment_option')->insert([
                'payment_gateway' => $request->status,
                'user_id' => Auth::id()
            ]);
        }
        return response()->json(['success'=>'Status Change Successfully.']);
    }

    public function CODStatus(Request $request)
    {   
        $data = DB::table('merchant_payment_option')->where('user_id',Auth::id())->first();
        if($data){
            DB::table('merchant_payment_option')->where('id',$request->id)->update([
                'COD' => $request->status
            ]);
        }else{
            DB::table('merchant_payment_option')->insert([
                'COD' => $request->status,
                'user_id' => Auth::id()
            ]);
        }
       
        return response()->json(['success'=>'Status Change Successfully.']);
    }

    public function paypalStatus(Request $request)
    {
        $data = DB::table('merchant_payment_option')->where('user_id',Auth::id())->first();
        if($data){
            DB::table('merchant_payment_option')->where('id',$request->id)->update([
                'payple_option' => $request->status
            ]);
        }else{
            DB::table('merchant_payment_option')->insert([
                'payple_option' => $request->status,
                'user_id' => Auth::id()
            ]);
        }
        return response()->json(['success'=>'Status Change Successfully.','status'=>$request->status]);
    }


    public function yocoStatus(Request $request)
    {
        $data = DB::table('merchant_payment_option')->where('user_id',Auth::id())->first();
        if($data){
            DB::table('merchant_payment_option')->where('id',$request->id)->update([
                'yoco_option' => $request->status
            ]);
        }else{
            DB::table('merchant_payment_option')->insert([
                'yoco_option' => $request->status,
                'user_id' => Auth::id()
            ]);
        }
        return response()->json(['success'=>'Status Change Successfully.','status'=>$request->status]);
    }


    public function payfastStatus(Request $request)
    {
        $data = DB::table('merchant_payment_option')->where('user_id',Auth::id())->first();
        if($data){
            DB::table('merchant_payment_option')->where('id',$request->id)->update([
                'payfast_option' => $request->status
            ]);
        }else{
            DB::table('merchant_payment_option')->insert([
                'payfast_option' => $request->status,
                'user_id' => Auth::id()
            ]);
        }
        return response()->json(['success'=>'Status Change Successfully.','status'=>$request->status]);
    }

    

}
