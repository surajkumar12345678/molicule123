<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\User;
use App\Models\Page;
use App\Models\StoreDetail;
use DB;
use Auth;
use Session;
use Mail;
use Hash;

class HomeController extends Controller
{
    public function index(Request $request){

		$alldata = StoreDetail::select('id')
                    ->where('domain_name', config('custom.host_name'))
                    ->first();

    	$store_id = $alldata->id;

    	$data = StoreDetail::where('id',$store_id)->first();
		$products=Product::where('status','1')->where('store_detail_id',$store_id)->get();
        $rated_pro = Product::where('status','1')->where('store_detail_id',$store_id)->limit(3)->get();
        $featured_pro = Product::where('status','1')->where('store_detail_id',$store_id)->limit(3)->get();
        $review_pro = Product::where('status','1')->where('store_detail_id',$store_id)->limit(3)->get();
        $categories=Category::where('status','1')->where('store_detail_id',$store_id)->get();
		$blogs=DB::table('blogs')->where('status','1')->get();
		$banners=DB::table('banner_images')->where('store_detail_id',$store_id)->limit(1)->get();
		$sliders=DB::table('cover_images')->where('store_detail_id',$store_id)->get();

		$socials=DB::table('merchant_social_option')->where('user_id',$data->user_id)->limit(1)->get();
		$pages=Page::where('status','1')->where('store_detail_id',$store_id)->get();
		$user=User::where('status','1')->where('store_detail_id',$store_id)->first();
		$layout = $data->layout_id;
		if($layout== '1')
		{
		        return view('web-layouts.index',compact('products','categories','featured_pro','rated_pro','review_pro','blogs'));
           }elseif($layout=='2')
           {

             	 return view('web-layouts.layout2.index',compact('products','categories','featured_pro','rated_pro','review_pro','blogs','banners','socials','pages','user','data','sliders'));
		    }elseif($layout=='3')
		    {
		       	 return view('web-layouts.layout3.index',compact('products','categories','featured_pro','rated_pro','review_pro','blogs'));
		    }elseif($layout=='4')
		    {
		       	 return view('web-layouts.layout4.index',compact('products','categories','featured_pro','rated_pro','review_pro','blogs'));
		    }elseif($layout=='5')
		    {
		       	 return view('web-layouts.layout5.index',compact('products','categories','featured_pro','rated_pro','review_pro','blogs'));
		    }
		    else{
		       	 return view('web-layouts.index',compact('products','categories','featured_pro','rated_pro','review_pro','blogs'));
		      	}
	}


	function more_data(Request $request){
        if($request->ajax()){
            $skip=$request->skip;
            $take=6;
            $products=Product::skip($skip)->take($take)->get();
            return response()->json($products);
        }else{
            return response()->json('Direct Access Not Allowed!!');
        }
    }


    public function singleProduct(Request $request,$id=""){

        $product=Product::where('id',$id)->first();

		$product_combination = DB::table('product_combination')->where('product_id',$id)->get()->toArray();

		$product_attribute_value_id = DB::table('product_attribute_value_id')->where('product_id',$id)->get();
		$attribute_values = DB::table('product_attribute_values')
       ->join('product_attributes', 'product_attributes.id', '=', 'product_attribute_values.product_attribute_id')
       ->select('product_attribute_values.*', 'product_attributes.attribute_name')
	   ->where('product_id',$id)
       ->get();
        $review_pro = Product::all();
        $products=Product::all();
		$review_products = DB::table('sales_details')->where('user_id',Auth::id())->where('product_name',$product->title)->count();

		$reviews = DB::table('products_review')->where('product_id',$id)->where('status','1')->get()->toArray();
        return view('web-layouts.product',compact('product','products','review_pro','attribute_values','product_combination','product_attribute_value_id','reviews','review_products'));
    }

    //find by category products

    public function products(Request $request,$slug = ""){

		if($request->ajax()){
			$store = StoreDetail::select('id')
			->where('domain_name', config('custom.host_name'))
			->first();

			$limit=$request["limit"];
			$offset=$request['offset'];
			$attributeids=$request["attributeids"];
			$atributeSearch='no';
			$cond="products.id != '0'  and products.status = '1' and products.store_detail_id = '".$store->id."'";
			if($attributeids){
				$atributeSearch='yes';
				$attributeidArray=explode(',',$attributeids);

				if(!empty($attributeidArray)){

					$attributeCond="(";
					foreach($attributeidArray as $attribute){

						$attributeCond.=" (product_combination.value_id ='".$attribute."' OR product_combination.value_id LIKE '%,".$attribute."' OR product_combination.value_id LIKE '".$attribute.",%' OR product_combination.value_id LIKE '%,".$attribute.",%') or";
					}

					$cond.=" and ".rtrim($attributeCond,'or ').")";
				}

		    }


			if(isset($request->cate_slug)){
				$cond.=" and categories.category_name ='".$request->cate_slug."'";
			}

			if($request->min_price){
				$cond.=" and products.price >='".$request->min_price."'";
			}
			if($request->max_price){
				$cond.=" and products.price <='".$request->max_price."'";
			}

			$sortOrder=$request["sort_order"];

			if($sortOrder == 'a'){
				$order = "ORDER BY products.id DESC";
			}elseif($sortOrder == 'b'){
				$order = "ORDER BY products.title DESC";
			}elseif($sortOrder == 'c'){
				$order = "ORDER BY products.price ASC";
			}elseif($sortOrder == 'd'){
				$order = "ORDER BY products.price DESC";
			}elseif($sortOrder == 'e'){
				$order = "ORDER BY products.id DESC";
			}else{
				$order = "ORDER BY products.id DESC";
			}

			if($atributeSearch=='yes'){

				$products = DB::select('SELECT products.* FROM products INNER JOIN categories ON categories.category_name=products.category INNER JOIN product_combination ON product_combination.product_id=products.id where '.$cond.' '.$order.' LIMIT '.$limit.' OFFSET '.$offset);

			}else{

				$products = DB::select('SELECT products.* FROM products INNER JOIN categories ON categories.category_name=products.category  where '.$cond.' '.$order.' LIMIT '.$limit.' OFFSET '.$offset);
			}

			 if($products){

				$json['status']=true;
				$json['total']=count($products);
				$json['html']=view('web-layouts.products_listing_render')->with('products',$products)->render();

			}else{

				$json['status']=false;
				$json['total']=0;
				$json['html']='<div class="col-md-12" style="padding-top: 200px;display: flex;align-items: center;justify-content: center;"><img style="height:150px" src="'.asset('notfound.PNG').'" /></div>';
			}

			return response($json,200);
		}

		$category=Category::where('status','1')->get();
		$product_attributes=DB::table('product_attributes')->get();
		$products_attribute = DB::table('product_attribute_value_id')
			->join('products', 'products.id', '=', 'product_attribute_value_id.product_id')
			->join('product_attributes', 'product_attributes.id', '=', 'product_attribute_value_id.product_attribute_id')
			->select('product_attribute_value_id.*')
			->where('status','1')
			->get();

		return view('web-layouts.products')->with(['category'=>$category,'slug'=>$slug,'attributes'=>$products_attribute,'product_attributes'=>$product_attributes]);

	}

	public function changeAttribute(Request $request){
		if($request->ajax()){

			if($request->value_id){

				$cond="products.id != '0'  and products.status = '1'";
				$array = array();
				$attributeCond=" (product_combination.value_id ='".$request->value_id."' OR product_combination.value_id LIKE '%,".$request->value_id."') or";
				$cond.=" and ".rtrim($attributeCond,'or ');
				$products = DB::select('SELECT product_combination.* FROM product_combination INNER JOIN products ON product_combination.product_id=products.id where '.$cond);
				foreach($products as $product){
					$price = $product->price;
				}
				$json['status']=true;
				$json['price']=$price;
				return response($json,200);
		    }

		}
	}


	public function Logout(Request $request){

       // Auth::guard('web')->logout();
			if(Session::get('user_login')){
				$request->session()->forget('user_login');
				$request->session()->forget('user_id');
				$request->session()->forget('user_email');
				$request->session()->forget('user_firstname');
				$request->session()->forget('user_lastname');
			 	$request->session()->invalidate();
        		$request->session()->regenerateToken();
				return redirect('/user/login')->with('success','logged out successfully');
			}



    }

	Public function livesearch(Request $request){
        $term = $request->get('term');

		$data = DB::table('products')->where("title","LIKE","%$term%")->where('status','1')->get();
		if(count($data)>0){
			foreach ($data as $result)
			{
				$results[] = ['value' => $result->title, 'link' => url('/user/product').'/'.$result->id];
			}
		}else{

			$msg = 'No results';
			$results[] = ['value' => $msg, 'link' =>'#'];
		}
		return response()->json($results);
    }

	//SUBMIT OTP
	public function submitOtp(Request $request){
		$validator = \Validator::make($request->all(), [
            'dig1' => 'required|min:1',
            'dig2' => 'required|min:1',
            'dig3' => 'required|min:1',
            'dig4' => 'required|min:1',
            'dig5' => 'required|min:1',
            'dig6' => 'required|min:1',
        ]);
        if ($validator->fails())
        {
            return response(['error'=>true,'msg'=>'OTP required']);
        }
		$dig1 =$request->post('dig1');
        $dig2 =$request->post('dig2');
        $dig3 =$request->post('dig3');
        $dig4 =$request->post('dig4');
        $dig5 =$request->post('dig5');
        $dig6 =$request->post('dig6');
        $otp = $dig1.$dig2.$dig3.$dig4.$dig5.$dig6;
        $data = User::where('otp',$otp)->first();
        if(!$data){
            return response(['error' => true,'msg'=>'Invalid OTP']);
        }elseif($otp == $data->otp) {
			$id = $data->id;
			$user = User::where('id',$id)->update(['otp_verify_status'=>'1']);
			Auth::login($data);
			$cartData = Session::get('cart_session');
            if(!empty($cartData)){
                foreach($cartData as $key=>$value){

					$cart = DB::table('carts')->where('id',$value['product_id'])->where('user_id',Auth::id())->first();
					if(!empty($cart)){
						Cart::where('id',$value['product_id'])->where('user_id',Auth::id())->update(
							['user_id'=>Auth::id(),
							'product_id'=>$value['product_id'],
							'qty'=>$value['qty'],
							'attributes'=>$value['attributes']]);
					}else{
						DB::table('carts')->insert(
							['user_id'=>Auth::id(),
							'product_id'=>$value['product_id'],
							'qty'=>$value['qty'],
							'attributes'=>$value['attributes']]
						);
					}
                }
            }
            Session::forget('cart_session');
			return response(['error' => false,'msg'=>'OTP Verification Success','user_verify'=>true]);

		}
	}

	//SEND OTP
    public function sendotp(Request $request){
		$otp = mt_rand(100000,999999);
		$msg ="Dear Customer, Welcome to Molicule, your OTP is ".$otp." to login into our online portal. Thanks www.molicule.com";
        $getdata=User::where('mobile_number',$request->mobile_number)->first();
        if(!$getdata){
            return response(['error' => true,'msg'=>'Mobile no. does not exist.']);
        }else{
            $getotp=User::where('mobile_number',$request->mobile_number)->update(['otp'=>$otp]);
			//commonHelper::sendMsg($mobile,$msg);
			$to=$getdata->email;
			Mail::send('emails.send-otp',compact('msg'), function($message) use($to){
				$message->to($to)->subject
				('Account verification');
				$message->from('support@talkforce.co.uk','Molicule');
			});
            return response()->json(['error' => false,'msg'=>'OTP sent successfully on your registered mobile no.']);

		}
    }

	//BillingAddress
    public function BillingAddress(Request $request)
	{
		if(isset($request->id)){
			DB::table('billing_address')->where('id',$request->id)->where('user_id',Auth::id())->update(
				['fname'=>$request->fname,
				'lname'=>$request->lname,
				'mobile'=>$request->mobile,
				'address'=>$request->address,
				'city'=>$request->city,
				'zipcode'=>$request->zipcode
				]
			);

			$request->session()->flash('success','Address updated successfully');
			return redirect()->back();
		}else{
			DB::table('billing_address')->insert(
				['user_id'=>Auth::id(),
				'fname'=>$request->fname,
				'lname'=>$request->lname,
				'mobile'=>$request->mobile,
				'address'=>$request->address,
				'city'=>$request->city,
				'zipcode'=>$request->zipcode
				]
			);

			$request->session()->flash('success','Address added successfully');
			return redirect()->back();
		}


    }

	public function userProfile(Request $request)
	{
		$profile = DB::table('users')->where('id',Session::get('user_id'))->first();
		return view('web-layouts.user.user-profile')->with(compact('profile'));
    }

	public function profileUpdate(Request $request)
	{
		DB::table('users')->where('id',Auth::id())->update([
			'first_name'=>$request->fname,
			'last_name'=>$request->lname,
			'email'=>$request->email,
			'gender'=>$request->gender,
			'mobile_number'=>$request->mobile
			]
		);

		$request->session()->flash('success','Profile updated successfully');
		return redirect()->back();
    }

	public function userOrder(Request $request)
	{
		$user_id = Auth::id();

        $getOrders = DB::table('sales_details')->where('user_id',$user_id)->orderBy('id','DESC')->get();
		$sales = DB::table('sales')->where('user_id',$user_id)->orderBy('id','DESC')->get();
        if(count($sales)>0) {
			return view('web-layouts.user.order')->with(compact('sales','getOrders'));
        }else {
            $request->session()->flash('error','Data not found');
			return redirect()->back();
        }
    }

	public function addressBook(Request $request)
	{
		$user_id = Auth::id();
        $address = DB::table('billing_address')->where('user_id',$user_id)->orderBy('id','DESC')->get();
		return view('web-layouts.user.address-book')->with(compact('address'));
    }

	public function addressBookDelete(Request $request, $id="")
	{
		$user_id = Auth::id();
        $address = DB::table('billing_address')->where('user_id',$user_id)->where('id',$id)->delete();
		$request->session()->flash('success','Billing address delete successfully');
		return redirect()->back();
    }

	public function changePassword(Request $request)
	{
		$profile = DB::table('users')->where('id',Auth::id())->first();
		return view('web-layouts.user.change-password')->with(compact('profile'));
    }
	public function changePasswordForm(Request $request)
	{
		$new_pass = $request->password;
        $password_confirmation = $request->password_confirmation;

        if($new_pass == $password_confirmation ){
            $old_pass = $request->old_pass;
            $password = Hash::make($request->password);
            $pass = User::where(['id'=>Auth::id()])->first();

            if(Hash::check($old_pass, $pass->password)){
                $user=User::where('id',Auth::id())->update(['password'=>$password]);
                $request->session()->flash('success','Password changed done');
				return redirect()->back();
            }else{
                $request->session()->flash('error','Old password not match');
				return redirect()->back();
            }
        }else{
            $request->session()->flash('error','Confirm password not match');
            return redirect()->back();
        }
    }
	public function couponApplyEnd(Request $request)
	{
		if($request->ajax()) {

			$code = $request->coupon_code;
			$current_date = date("Y-m-d");
			$data = DB::select('select * from promocodes where promocode = "'.$code.'" and start_date <= "'.$current_date.'" and end_date >= "'.$current_date.'" and status = 1');

			if(!empty($data)) {

				if($data[0]->promocode_mode == "unlimited"){
					$count_of_time_promo = DB::table('apply_coupon_user')->where('user_id',Auth::id())->where('promo_id',$data[0]->id)->first();
					if(!empty($count_of_time_promo)){
						$countData = $count_of_time_promo->coupon_times;
					}else{
						$countData = 0;
					}
					if($data[0]->max_time_one_user > $countData){
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
							}
							if($data[0]->discount_percentage != null){
								$amountPercentage = round(($data[0]->discount_percentage * $data[0]->max_amount) /100 , 2);
								Session::put('couponAmount',$amountPercentage);
							}else{
								Session::put('couponAmount',$data[0]->fixed_rate_discount);
							}
							Session::put('coupon_id',$data[0]->id);
							Session::put('coupon_code',$data[0]->promocode);

							if(Session::has('couponAmount')){
								$couponAmount = Session::get('couponAmount');
							}
							$grand_total = $totalAmount - $couponAmount + $shipping_charge;
							$json['success']=false;
							$json['msg']='Coupon applied';
							$json['shipping_charge']=$shipping_charge;
							$json['subtotal']=number_format($totalAmount,2);
							$json['discount_amount']=number_format($couponAmount,2);
							$json['final_amount']=number_format($grand_total,2);
						}
					}else{
						$json['success']=false;
						$json['msg']='Coupon already used many times ';
					}

				}else{

					$count_of_time_promo = DB::table('apply_coupon_user')->where('user_id',Auth::id())->where('promo_id',$data[0]->id)->first();
					if(!empty($count_of_time_promo)){
						$countData = $count_of_time_promo->coupon_times;
					}else{
						$countData = 0;
					}
					if($data[0]->max_time_one_user > $countData){
						if($data[0]->no_of_time_used > $countData){

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
								}
								if($data[0]->discount_percentage != null){
									$amountPercentage = round(($data[0]->discount_percentage * $data[0]->max_amount) /100 , 2);
									Session::put('couponAmount',$amountPercentage);
								}else{
									Session::put('couponAmount',$data[0]->fixed_rate_discount);
								}
								Session::put('coupon_id',$data[0]->id);
								Session::put('coupon_code',$data[0]->promocode);

								if(Session::has('couponAmount')){
									$couponAmount = Session::get('couponAmount');
								}
								$grand_total = $totalAmount - $couponAmount + $shipping_charge;
								$json['success']=false;
								$json['msg']='Coupon applied';
								$json['shipping_charge']=$shipping_charge;
								$json['subtotal']=number_format($totalAmount,2);
								$json['discount_amount']=number_format($couponAmount,2);
								$json['final_amount']=number_format($grand_total,2);
							}

						}else{
							$json['success']=false;
							$json['msg']='Coupon already used many times ';
						}
					}else{
						$json['success']=false;
						$json['msg']='Coupon already used many times ';
					}

				}
				return json_encode($json);

			}else {
				return response(['error' => true,'msg'=>'Invalid coupon code']);
			}
		}
	}

	Public function FormSearch(Request $request)
	{
        $name = $request->name;

		$data = DB::table('products')->where("title","LIKE","%$name%")->where('status','1')->first();
		if($data){
			return redirect('/user/product/'.$data->id);
		}else{

			$request->session()->flash('error','Product not found');
            return redirect()->back();
		}

    }

	public function blogDetails($url="")
	{

        $blog = DB::table('blogs')->where('slug',$url)->where('status','1')->first();
		$blogs = DB::table('blogs')->where('status','1')->limit('5')->orderBy('id','DESC')->get();
		$category = DB::table('blog_categories')->where('status','1')->get();
		return view('web-layouts.blog-details')->with(compact('blog','blogs','category'));
    }

	//blogs data
	public function Blogs(Request $request,$slug = ""){

		if($request->ajax()){

			$limit=$request["limit"];
			$offset=$request['offset'];
			$cond="blogs.id != '0'  and blogs.status = '1'";

			if(isset($request->cate_slug)){
				$cond.=" and blog_categories.slug ='".$request->cate_slug."'";
			}

			$blogs = DB::select('SELECT blogs.*, blog_categories.category_name, blog_categories.slug as cateslug FROM blogs INNER JOIN blog_categories ON blog_categories.id=blogs.blog_category_id  where '.$cond.' LIMIT '.$limit.' OFFSET '.$offset);

			if($blogs){

				$json['status']=true;
				$json['total']=count($blogs);
				$json['html']=view('web-layouts.partisals.blogs')->with('blogs',$blogs)->render();

			}else{

				$json['status']=false;
				$json['total']=0;
				$json['html']='<div class="col-md-12" style="padding-top: 200px;display: flex;align-items: center;justify-content: center;"><img style="height:150px" src="'.asset('notfound.PNG').'" /></div>';
			}
			return response($json,200);
		}
		return view('web-layouts.blogs')->with(['slug'=>$slug]);
	}

	public function BlogsSearch(Request $request){
		$term = $request->get('term');

		$data = DB::table('blogs')->where("title","LIKE","%$term%")->where('status','1')->get();
		if(count($data)>0){
			foreach ($data as $result)
			{
				$results[] = ['value' => $result->title, 'link' => url('/user/blog').'/'.$result->slug];
			}
		}else{

			$msg = 'No results';
			$results[] = ['value' => $msg, 'link' =>'#'];
		}
		return response()->json($results);
	}

	public function productReviews(Request $request){

		if(Auth::check()){

			$products_review = DB::table('products_review')->insert([
				'user_id'=>Auth::id(),
				'product_id' => $request->product_id,
				'rating' => $request->rating,
				'remark' => $request->remark

			]);
            $request->session()->flash('success',' products rate successfully');
			return redirect()->back();

		}else{
			$request->session()->flash('error','You are not login! please login');
			return redirect()->back();
		}
	}











}
