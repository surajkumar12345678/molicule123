<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use Billow\Contracts\PaymentProcessor;
use Session;
use Log;
use DB;
use App\Models\StoreDetail;

class PayPalPaymentController extends Controller
{
    function generateSignature($data, $passPhrase = null) {
        // Create parameter string
        $pfOutput = '';
        foreach( $data as $key => $val ) {
            if($val !== '') {
                $pfOutput .= $key .'='. urlencode( trim( $val ) ) .'&';
            }
        }
        // Remove last ampersand
        $getString = substr( $pfOutput, 0, -1 );
        if( $passPhrase !== null ) {
            $getString .= '&passphrase='. urlencode( trim( $passPhrase ) );
        }
        return md5( $getString );
    } 

    public function handlePayment(PaymentProcessor $payfast, Request $request)
    {   
        $validator = \Validator::make($request->all(), [
            'payment_method' => 'required',
            'address' => 'required',
        ]);
        if ($validator->fails())
        {
            $request->session()->flash('error','Address required');
            return redirect()->back();
        }
        $storid = StoreDetail::select('user_id')->where('domain_name', config('custom.host_name'))->first();
	    $payment_option = DB::table('merchant_payment_option')->where('user_id',$storid->user_id)->first();
        Session::put('payment_method',$request->payment_method);
        Session::put('address_id',$request->address);
        Session::put('order_id',uniqid());
        $price = $request->grand_total; 
        if($request->payment_method == '2'){

            Session::put('paymt_txnid',null);
            return redirect('/user/checkout-process');

        }else{
            
            if($request->payment_type == 1){

                
                $product = [];
                $product['items'] = [
                    [
                        'name' => 'products 1',
                        'price' => $price,
                        'desc'  => 'products 1',
                        'qty' => 1
                    ]
                ];
        
                $product['invoice_id'] = Session::get('order_id');
                $product['invoice_description'] = "Order #{$product['invoice_id']} Bill";
                $product['return_url'] = route('success.payment');
                $product['cancel_url'] = route('cancel.payment');
                $product['total'] = $price;
        
                $paypalModule = new ExpressCheckout;
        
                $res = $paypalModule->setExpressCheckout($product);
                $res = $paypalModule->setExpressCheckout($product, true);
            
                return redirect($res['paypal_link']);

            }elseif($request->payment_type == 2){

                // values extracted from request
                $data = [
                    'token' => Session::get('yoco_token'), // Your token for this transaction here
                    'amountInCents' => $price, // payment in cents amount here
                    'currency' => 'ZAR' // currency here
                ];

                $secret_key = $payment_option->yoco_secret_id;

                $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL,"https://online.yoco.com/v1/charges/");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POST, true);

                curl_setopt($ch, CURLOPT_USERPWD, $secret_key . ":");

                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

                // send to yoco
                $result = curl_exec($ch);
                Log::debug(curl_getinfo($ch, CURLINFO_HTTP_CODE));

                curl_close($ch);
                $response = json_decode($result);
                if($response->status == 'successful'){

                    Session::put('paymt_txnid',$response->id);
                    return redirect('/user/checkout-process');
                }
            }elseif($request->payment_type == 3){

                 // Construct variables
                 $cartTotal = $price;// This amount needs to be sourced from your application
                 $data = array(
                     // Merchant details
                     'merchant_id' => $payment_option->payfast_client_id,
                     'merchant_key' => $payment_option->payfast_secret_id,
                     'return_url' => 'http://www.yourdomain.co.za/return.php',
                     'cancel_url' => 'http://www.yourdomain.co.za/cancel.php',
                     'notify_url' => 'http://www.yourdomain.co.za/notify.php',
                     // Buyer details
                     'name_first' => 'First Name',
                     'name_last'  => 'Last Name',
                     'email_address'=> 'test@test.com',
                     // Transaction details
                     'm_payment_id' => Session::get('order_id'), //Unique payment ID to pass through to notify_url
                     'amount' => number_format( sprintf( '%.2f', $cartTotal ), 2, '.', '' ),
                     'item_name' => 'Order#'.Session::get('order_id')
                 );
                 
                 $signature = $this->generateSignature($data);
                 $data['signature'] = $signature;
                 
                 // If in testing mode make use of either sandbox.payfast.co.za or www.payfast.co.za
                 $testingMode = true;
                 $pfHost = $testingMode ? 'sandbox.payfast.co.za' : 'www.payfast.co.za';
                 $htmlForm = '<form action="https://'.$pfHost.'/eng/process" method="post" id="targetpayfast">';
                 foreach($data as $name=> $value)
                 {
                     $htmlForm .= '<input name="'.$name.'" type="hidden" value=\''.$value.'\' />';
                 }
                 $htmlForm .= '<input type="submit" value="Pay Now" class="normal-btn submit-btn " style="display:none"/></form>';
                 $htmlForm .= "<script src='".asset('libs/jquery/jquery/dist/jquery.js')."'></script><script> $( '#targetpayfast' ).submit();</script>";

                 echo $htmlForm; 

            }else{

                $request->session()->flash('error','Select any one Payment gateway method');
                return redirect()->back();
            }

            
        }
    }
   
    public function paymentCancel()
    {
        dd('Your payment has been declend. The payment cancelation page goes here!');
    }
  
    public function paymentSuccess(Request $request)
    {
        $paypalModule = new ExpressCheckout;
        $response = $paypalModule->getExpressCheckoutDetails($request->token);
        Session::put('paymt_txnid',$response['CORRELATIONID']);

        return redirect('/user/checkout-process');
        
    }

    
    public function yocoToken(Request $request)
    {
        if($request->ajax()){

			if($request->token){
                Session::put('yoco_token',$request->token);
				$json['status']=true;
				return response($json);
		    }else{
                $json['status']=false;
                $json['msg']='server error';
				return response($json);
            }

		}
    }

    
}
