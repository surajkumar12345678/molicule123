<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Session;
use DB;

class Cart extends Model
{
    use HasFactory;

    public static function cartdData(){
        $totalItem ="0";
        if(Auth::check()){
                
            $carts = DB::table('products')
            ->join('carts', 'products.id', '=', 'carts.product_id')
            ->select('products.*', 'carts.qty')
            ->where('carts.user_id',Auth::id())
            ->get();
            
            foreach($carts as $cart){
                $totalItem += $cart->qty;
            }
            
        }else{

            $carts = Session::get('cart_session');
            if(!empty($carts)){
                foreach($carts as $key=>$data){
                    $totalItem += $data['qty'];
                }
            }
        }
        return $totalItem;
    }
}



