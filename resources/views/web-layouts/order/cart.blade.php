@extends('layouts.web_layout')

@section('content')
<style>
.shopping-cart .cart-total_block {
        margin-top: 0px;
    }
</style>
<!-- ***** Welcome Area Start ***** -->
<br><br>
<section class="section welcome-area">
    <div class="shopping-cart">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-8">
                    <div class="product-table">
                        <table class="table table-responsive">
                            <colgroup>
                                <col span="1" style="width: 15%">
                                <col span="1" style="width: 30%">
                                <col span="1" style="width: 15%">
                                <col span="1" style="width: 15%">
                                <col span="1" style="width: 15%">
                                <col span="1" style="width: 10%">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th class="product-iamge" scope="col">Image</th>
                                    <th class="product-name" scope="col">Product name</th>
                                    <th class="product-price" scope="col">Price</th>
                                    <th class="product-quantity" scope="col">Quantity</th>
                                    <th class="product-total" scope="col">Total</th>
                                    <th class="product-clear" scope="col">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="cartRender">
                               
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="col-12 col-md-4 col-lg-4">
                    
                    <div class="cart-total_block">
                       
                        <table class="table">
                            <colgroup>
                                <col span="1" style="width: 50%">
                                <col span="1" style="width: 50%">
                            </colgroup>
                            <tbody>
                                <tr>
                                    <th>SUBTOTAL(<span class="totalItem">0</span>)</th>
                                    <td>$<span class="subtotal">0.00</span></td>
                                </tr>
                                <tr>
                                    <th>SHIPPING</th>
                                    <td>
                                        <p>Free shipping</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>TOTAL</th>
                                    <td>$<span class="finalTotal">0.00</span></td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <div class="checkout-method">
                            <a  href="{{route('checkout')}}" class="normal-btn">Proceed to Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('custom_js')
<script>
shoppingCartData();


function save_to_cart(cart_id,newQuantity){ 
    var qty = newQuantity;
    if(qty != '0'){
        var qtys = newQuantity;
    }else{
        var qtys="0";
    }
    
    var loader=$('#cartLoader'+cart_id);
    $.ajax({
        type: "get",
        dataType:"json",
        url: "{{route('add-to-cart.save')}}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
        },
        data:{
            product_id: cart_id, qty:qtys,		  
        },
        beforeSend: function(){
            $('#preloader').css('display','inline-block');
        },
        error:function(xhr,textStatus){
            if (textStatus == 'timeout') {
                showMsg('warning', xhr.status + ': ' + xhr.statusText);
                $('#preloader').css('display','none');
            }else{
                showMsg('error', xhr.status + ': ' + xhr.statusText);
                $('#preloader').css('display','none');
            }
        },
        success: function(data){
            
            if(data.error){
                
                showMsg('error',data.msg);
                $('#preloader').css('display','none');
            }else{	
                
                shoppingCartData();
                $('#preloader').css('display','none');		
                showMsg('success',data.msg);
            }
            
            
            //cartList();
        }
    }); 
}

function removeCartData(){
    $('.removeCartData').click(function(){
    var productId=$(this).data('product_id');
        $.ajax({
            url: "{{route('remove.cart')}}",
            dataType: 'json',
            type: 'get',
            data:{"id":productId},
            beforeSend:function(){
                $('#preloader').css('display','inline-block');
            },
            error:function(xhr){
                showMsg('error',"Error: " + xhr.status + ": " + xhr.statusText); 
                $('#preloader').css('display','none');
            },
            success: function(data){
                if(data.error){
                    showMsg('error',data.msg);
                }else{              
                    shoppingCartData();
                    showMsg('success',data.msg);
                }
                $('#preloader').css('display','none');  
            }
        });
    });
}
</script>
@endpush