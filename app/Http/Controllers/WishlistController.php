<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Auth;

class WishlistController extends Controller
{
    public function addToWishlist(Request $request){
        if ($request->ajax()) {

            if(Auth::check()){
                
                $wishlist = DB::table('wishlists')->where('product_id',$request->product_id)->where('user_id',Auth::id())->first();
                if(!empty($wishlist)){
                    DB::table('wishlists')->where('product_id',$request->product_id)->where('user_id',Auth::id())->update(
                        ['user_id'=>Auth::id(),
                        'product_id'=>$request->product_id]
                    );
                }else{
                    DB::table('wishlists')->insert(
                        ['user_id'=>Auth::id(),
                        'product_id'=>$request->product_id]
                    );
                }
                
                $json['error']=false;
                $json['msg']=' Added to wishlist';
                
            }else{
                
                $json['error']=true;
                $json['msg']=' You are not login!please login ';
                
            } 
        return json_encode($json);
        }
    }
    
	public function wishlistGet(Request $request){
		
		$wishlists = DB::table('products')
		->join('wishlists', 'products.id', '=', 'wishlists.product_id')
		->select('products.*')
		->where('wishlists.user_id',Auth::id())
		->get();
        return view('web-layouts.wishlist',compact('wishlists'));
    }

	public function wishlistRemove(Request $request, $id=""){
		if(Auth::check()){
			$wishlists = DB::table('wishlists')->where('product_id',$id)->where('user_id',Auth::id())->delete();
            $request->session()->flash('success','Removed form wishlist');
			return redirect()->back();

		}else{
			return redirect()->back();
		}
    }



}
