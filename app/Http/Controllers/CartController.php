<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Auth;
use App\Models\Cart;
use App\Models\StoreDetail;


class CartController extends Controller
{
    //add to cart
	public function addToCart(Request $request){
        if ($request->ajax()) {

            if(Auth::check()){
                $attributes = $request->get('attributes');
                if(isset($attributes)){
                    
                }else{
                    $attributes =null;
                }
                $cart = DB::table('carts')->where('product_id',$request->product_id)->where('user_id',Auth::id())->first();
                if($cart){
                    Cart::where('product_id',$request->product_id)->where('user_id',Auth::id())->update(
                        ['user_id'=>Auth::id(),
                        'product_id'=>$request->product_id,
                        'qty'=>$request->qty,
                        'attributes'=>$attributes]);
                }else{
                    DB::table('carts')->insert(
                        ['user_id'=>Auth::id(),
                        'product_id'=>$request->product_id,
                        'qty'=>$request->qty,
                        'attributes'=>$attributes
                        ]
                    );
                }

                $json['error']=false;
                $json['msg']=' Added to Cart';

            }else{
                $product_id=$request->product_id;
                $qtys = $request->qty;
                $attributes = $request->get('attributes');

                $Products = DB::table('products')->where('id',$product_id)->get()->toArray();

                foreach($Products as $product){

                    $image = explode(',',$product->feature_image);
                    $price = $product->price;
                    $proname = $product->title;

                }
                $cartData = Session::get('cart_session');
                if(!empty($cartData)){
                    foreach($cartData as $key=>$value){
                        if($key==$product_id){
                            $cartData[$product_id]=array(
                                'product_id' => $product_id,
                                'qty' => $qtys,
                                'image' =>'uploads/products/images/'.$image[0],
                                'price' =>$price,
                                'productsName' =>$proname,
                                'attributes' =>$attributes

                            );
                            $json['error']=false;
                            $json['msg']='Added to Cart';
                        }else{
                            $cartData[$product_id]=array(
                                'product_id' => $product_id,
                                'qty' => $qtys,
                                'image' =>'uploads/products/images/'.$image[0],
                                'price' =>$price,
                                'productsName' =>$proname,
                                'attributes' =>$attributes
                            );
                        }
                    }
                }else{
                    $cartData[$product_id]=array(
                        'product_id' => $product_id,
                        'qty' => $qtys,
                        'image' =>'uploads/products/images/'.$image[0],
                        'price' =>$price,
                        'productsName' =>$proname,
                        'attributes' =>$attributes
                    );
                }

                Session::put('cart_session',$cartData);

                $json['error']=false;
                $json['msg']=' Added to Cart';

            }
        return json_encode($json);
        }
    }

	public function CartGetData(Request $request){

        if ($request->ajax()) {
            $totalAmount ="0.00";
            $totalitem ="0";
            $couponAmount ="0.00";
            $shipping_charge = "0.00";
            if(Auth::check()){

                $carts = DB::table('products')
                ->join('carts', 'products.id', '=', 'carts.product_id')
                ->select('products.*', 'carts.qty')
                ->where('carts.user_id',Auth::id())
                ->get();

                foreach($carts as $cart){
                    $subTotal = $cart->price*$cart->qty;
                    $totalAmount += $subTotal;
                    $totalitem += $cart->qty;
                }

                $grand_total = $totalAmount - $couponAmount + $shipping_charge;
                if($carts){
                    $json['status']=true;
                    $json['totalItem']= $totalitem;
                    $json['shipping_charge']=$shipping_charge;
                    $json['subtotal']=number_format($totalAmount,2);
                    $json['discount_amount']=number_format($couponAmount,2);
                    $json['final_amount']=number_format($grand_total,2);
                    $json['html']=view('web-layouts.order.partisals.cart-render')->with('carts',$carts)->render();
                }else{
                    $json['status']=false;
                }
            }else{

                $carts = Session::get('cart_session');
                if(!empty($carts)){
                    foreach($carts as $key=>$data){
                        $subTotal = $data['price']*$data['qty'];
                        $totalAmount += $subTotal;
                        $totalitem += $data['qty'];
                    }

                    $grand_total = $totalAmount - $couponAmount + $shipping_charge;

                }else{
                    $grand_total = "0.00";
                }
                $json['status']=true;
                $json['totalItem']= $totalitem;
                $json['shipping_charge']=$shipping_charge;
                $json['subtotal']=number_format($totalAmount,2);
                $json['final_amount']=number_format($grand_total,2);
                $json['html']=view('web-layouts.order.partisals.cart-render')->with('carts',$carts)->render();
            }
            return json_encode($json);
        }
        return view('web-layouts.order.cart');
    }

    //cart item delete
    public function CartDeleteData(Request $req)
    {

        if($req->ajax())
        {
            if(Auth::check()){
                $id = $req->id;
                $cartDelete = DB::table('carts')->where('product_id',$id)->where('user_id',Auth::id())->delete();
                $json['error']=false;
                $json['msg']="Remove from cart";
                return json_encode($json);

            }else{
                $id = $req->id;
                $Cart = Session::get('cart_session');
                if(isset($Cart[$id])){
                    unset($Cart[$id]);
                    $req->session()->put('cart_session', $Cart);
                    $json['error']=false;
                    $json['msg']='Remove from Cart';
                }
                return json_encode($json);
            }
        }
    }

    public function CheckoutData(Request $request)
	{
        $storid = StoreDetail::select('user_id')->where('domain_name', config('custom.host_name'))->first();
	
    	$store_user_id = $storid->user_id;
        $payment_option = DB::table('merchant_payment_option')->where('user_id',$store_user_id)->first();
		$carts = DB::table('products')
                ->join('carts', 'products.id', '=', 'carts.product_id')
                ->select('products.*', 'carts.qty')
                ->where('carts.user_id',Auth::id())
                ->get();
        $billing_address = DB::table('billing_address')->where('user_id',Auth::id())->get();
        if(count($carts)>0){
           return view('web-layouts.order.checkout',compact('carts','billing_address','payment_option'));
        }else{

            return redirect()->back();

        }

    }

    //sales insert data
    public function Sales(Request $request){

		    $payment_method =Session::get('payment_method');
		    $id = Session::get('address_id');
            $paymt_txnid = Session::get('paymt_txnid');
            if($paymt_txnid != null){
                $payment_status = '1';
            }else{
                $payment_status = '0';
            }
            $order_id = Session::get('order_id');
            $user_id = Auth::id();
            $datas = DB::table('carts')
                    ->join('products', 'products.id', '=', 'carts.product_id')
                    ->select('products.*', 'carts.product_id','carts.attributes','carts.qty','products.user_id as merchant_id' )
                    ->where('carts.user_id',$user_id)
                    ->get();

		if(count($datas)>0){
			$address = DB::table('billing_address')->where(['user_id'=>$user_id, 'id'=>$id])
				->first();

			$name = $address->fname." ".$address->lname;
			$total = 0;
            $promocode_id =0;
           
			foreach ($datas as $amount) {

				$subtotal = $amount->qty*$amount->price;
				$total += $subtotal;
                $images = explode(',',$amount->feature_image);
                Session::put('merchant_id',$amount->merchant_id);
                if(!empty($amount->attributes)){
                    $attributes = $amount->attributes;
                }else{
                    $attributes =null;
                }
				$salesDetails = DB::insert('insert into sales_details(user_id,order_id,product_name,product_image,qty,sub_total,discount,net_amount,attributes,merchant_id,payment_status)
				values(?,?,?,?,?,?,?,?,?,?,?)',[$user_id,$order_id,$amount->title,$images[0],$amount->qty,$subtotal,$subtotal,$subtotal,$attributes,$amount->merchant_id,$payment_status]);
				$deleteOrder = DB::delete('DELETE FROM carts WHERE product_id='.$amount->id.' and user_id ='.$user_id);
			}

			if($total < 40){
				$shipping_charge = 40 - $total;
			}else{
				$shipping_charge = "0";
			}

			$couponAmount=0;
			if(Session::get('couponAmount') > 0 ){
				if(Session::has('couponAmount')){
                    $count = DB::table('apply_coupon_user')->where('user_id',Auth::id())->where('promo_id',Session::get('coupon_id'))->first();

                    if($count){
                        DB::table('apply_coupon_user')->where('user_id',Auth::id())->where('promo_id',Session::get('coupon_id'))->update([
                        'user_id' =>Auth::id(),
                        'promo_id' =>Session::get('coupon_id'),
                        'coupon_times'=>$count->coupon_times+1
                        ]);

                    }else{
                        DB::table('apply_coupon_user')->insert([
                            'user_id' =>Auth::id(),
                            'promo_id' =>Session::get('coupon_id'),
                            'coupon_times'=>1
                        ]);
                    }
                    $couponAmount = Session::get('couponAmount');
                    $promocode_id = Session::get('coupon_id');
                }
			}
            $merchant_id = Session::get('merchant_id');
            Session::forget('coupon_id');
            Session::forget('coupon_code');
            Session::forget('couponAmount');
			$grand_total = $total - $couponAmount+$shipping_charge;

			$sales = DB::insert('insert into sales(user_id,order_id,name,mobile,city,address,Pincode,payment_type,paymt_txnid,sub_total,net_amount,promocode_id,promocode_amount,shipping_charge,discount,merchant_id) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',[
			$user_id,$order_id,$name,$address->mobile,$address->city,$address->address,$address->zipcode,$payment_method,$paymt_txnid,$total,$grand_total,$promocode_id,$couponAmount,$shipping_charge,$couponAmount,$merchant_id]);

			$id  = DB::getPdo()->lastInsertId();
			if(isset($sales)) {
                Session::forget('payment_method');
		        Session::forget('address_id');
                Session::forget('paymt_txnid');
                Session::forget('order_id');
				$request->session()->flash('success','Order successfully');
		        return view('web-layouts.order.thankyou')->with(compact('grand_total','total'));
			}else {
				$request->session()->flash('error','Oops, something went wrong!');
		        return redirect()->back();
			}
		}else{
			$request->session()->flash('error','Cart is empty');
		    return redirect('/user/products');
		}
    }


}
