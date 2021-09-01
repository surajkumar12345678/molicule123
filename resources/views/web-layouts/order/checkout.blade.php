@extends('layouts.web_layout')

@section('content')
<style>
.shopping-cart .cart-total_block {
    margin-top: 0px;
}
.shop-checkout .shopping-cart .cart-total_block .table tbody th {
    padding: 15px 10px;
}
.shop-checkout .shopping-cart .cart-total_block .table tbody td {
    padding: 15px 10px;
}
</style>
<!-- ***** Welcome Area Start ***** -->
<br><br>
<div class="shop-checkout">
    <div class="container">
        <div class="row">

            <div class="col-12 col-lg-8">
                <form action="{{route('billing.address')}}" method="post">
                    @csrf
                    <h2 class="form-title">Billing details</h2>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputFirstName">First Name*</label>
                            <input class="no-round-input-bg" id="inputFirstName" name="fname" type="text" required=""
                                autocomplete="off" onkeypress="return /[A-Za-z ]/i.test(event.key)">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputLastName">Last Name*</label>
                            <input class="no-round-input-bg" id="inputLastName" name="lname" type="text" required=""
                                autocomplete="off" onkeypress="return /[A-Za-z ]/i.test(event.key)">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputCompanyName">Mobile Number</label>
                        <input type="tel" class="no-round-input-bg" name="mobile" id="inputCompanyName"
                            onkeypress="return /[0-9 ]/i.test(event.key)">
                    </div>

                    <div class="form-group">
                        <label for="inputStreet">Address*</label>
                        <input class="no-round-input-bg" id="inputStreet" name="address" type="text" required="">
                    </div>
                    <div class="form-group">
                        <label for="inputZip">Pincode</label>
                        <input class="no-round-input-bg" id="inputZip" name="zipcode" type="tel"
                            onkeypress="return /[0-9 ]/i.test(event.key)">
                    </div>
                    <div class="form-group">
                        <label for="inputCity">Town / City*</label>
                        <input class="no-round-input-bg" id="inputCity" name="city" type="text" required="">
                    </div>
                    <div style="text-align:center">
                        <button class="normal-btn submit-btn">Save Address</button>
                    </div>
                </form>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <form action="{{route('make.payment')}}" method="post" id="target">
                    @csrf
                    <h2 class="form-title">Your order</h2>
                    <div class="shopping-cart">
                        <div class="cart-total_block">
                            <table class="table">
                                <colgroup>
                                    <col span="1" style="width: 50%">
                                    <col span="1" style="width: 50%">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <th colspan="2">
                                            <div class="coupon-heading">
                                                <h6 id="showpromo1" style="cursor:pointer;">Have a promo code?</h6>
                                            </div>
                                            <p></p>
                                            <div class="row sucess-code" id="showpromo" style="display:none">
                                                <div class="col-md-8 remove-apply">
                                                    <input type="text" value="" name="coupon_code" class="form-control" placeholder="Enter promo code" id="coupon">
                                                </div>
                                                <div class="col-md-4 remove-apply">
                                                    <p class="remove-code" id=""><button type="button" id="couponApply" class="btn btn-success">Apply</button></p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @forelse($billing_address as $address)
                                    <tr>
                                        <th colspan="2">
                                            <div class=""><label for="address{{$address->id}}">
                                                <input class="address" type="radio" id="address{{$address->id}}" name="address" value="{{$address->id}}"
                                                >
                                                {{$address->address}}, {{$address->city}} {{$address->zipcode}}</label>
                                            </div>
                                        </th>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="name">Add billing address</th>
                                    </tr>
                                    @endforelse
                                    @php
                                    $totalAmount = "0";
                                    $shipping_charge = "0";
                                    $couponAmount=0;
                                    $totalqty=0;
                                    @endphp
                                    @foreach($carts as $cart)
                                    <tr>
                                        <th class="name">{{$cart->title}} × <span>{{$cart->qty}}</span></th>
                                        <td class="price black" style="border-top: 0">
                                            @php
                                            echo $data = "$".number_format(($cart->price*$cart->qty),2);
                                            $cal = $cart->price*$cart->qty;
                                            $totalAmount +=$cal;
                                            $totalqty +=$cart->qty;

                                            if(Session::has('couponAmount')){
                                                $couponAmount = Session::get('couponAmount');
                                            }
                                            $grand_total = $totalAmount - $couponAmount + $shipping_charge;
                                            @endphp
                                        </td>
                                        <input type="hidden" name="products_name[]" id="" value="{{$cart->title}}" >
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <th>SUBTOTAL</th>
                                        <td>$<span class="subtotal">{{number_format($totalAmount,2)}}</span></td>
                                    </tr>
                                    <tr>
                                        <th>SHIPPING</th>
                                        <td>
                                            <p>Free </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>DISCOUNT AMOUNT</th>
                                        <td >$<span class="discount">{{number_format($couponAmount,2)}}</span></td>
                                    </tr>
                                    <tr>
                                        <th>TOTAL</th>
                                        <td>$<span class="finalTotal">{{number_format($grand_total,2)}}</span></td>
                                        <input type="hidden" name="grand_total" id="" value="{{$grand_total}}" >
                                        <input type="hidden" name="totalqty" id="" value="{{$totalqty}}" >
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group">
                            @if($payment_option->COD == '0')
                                COD option not Enabled
                            @else
                                <input type="radio" name="payment_method" id="shipping" value="2" required>
                                <label for="shipping">Cash on delivery</label>
                            @endif
                            <br><br>
                            @if($payment_option->payment_gateway == '0')
                                Payment Gateway option not Enabled
                            @else
                                <input type="radio" name="payment_method" id="gateway" value="1"  required>
                                <label for="gateway">Payment Gateway</label>
                            @endif
                            <br><br>
                            <div class="form-group " id="payment_type" style="display:none;padding-left:10px">
                                @if($payment_option->payple_option == 1)
                                    <input type="radio" name="payment_type" id="paypal" value="1">
                                    <label for="paypal">Pay via paypal</label>
                                @endif
                                <br>
                                @if($payment_option->yoco_option == 1)
                                    <input type="radio" name="payment_type" id="YOCO" value="2" >
                                    <label for="YOCO">Pay via YOCO</label>
                                @endif
                                <br>
                                @if($payment_option->payfast_option == 1)
                                    <input type="radio" name="payment_type" id="Payfast" value="3" >
                                    <label for="Payfast">Pay via Payfast</label>
                                @endif
                                
                            </div>
                        </div>
                        <button type="submit" class="normal-btn submit-btn" id="checkout-form">Place order</button>
                    </form>
                    <button type="button" id="checkout-button" class="normal-btn submit-btn" style="display:none;">Place order</button>
                    
                </div>
            </div>
            
        </div>

    </div>
</div>



@endsection

@push('custom_js')

<script src="https://js.yoco.com/sdk/v1/yoco-sdk-web.js"></script>
<script src="https://www.payfast.co.za/onsite/engine.js"></script>

<script>
$('input[type=radio][name=payment_type]').change(function() {
    if (this.value == '2') {
        $('#checkout-button').show();
        $('#checkout-form').hide();
    }
    else if (this.value == '1') {
        $('#checkout-form').show();
        $('#checkout-button').hide();
    }
    else if (this.value == '3') {
        $('#checkout-form').show();
        $('#checkout-button').hide();
    }
});



  var yoco = new window.YocoSDK({
    publicKey: '{{$payment_option->yoco_client_id}}',
  });
  var checkoutButton = document.querySelector('#checkout-button');
  checkoutButton.addEventListener('click', function () {
    var address = $('input[name="address"]:checked').val();
    if(!address){
        showMsg('error',' Please select address field');
    }else{
        yoco.showPopup({
        amountInCents: "{{$grand_total}}",
        currency: 'ZAR',
        name: 'Your Store or Product',
        description: 'Awesome description',
        callback: function (result) {
            // This function returns a token that your server can use to capture a payment
            if (result.error) {
            const errorMessage = result.error.message;
            alert("error occured: " + errorMessage);
            }else {
                var token = result.id;
                if(result.id){
                    $.ajax({
                        url: "{{route('yoco.token.save')}}",
                        dataType: 'json',
                        type: 'POST',
                        data: {
                            token: token
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        error:function(xhr){
                            showMsg('error',"Error: " + xhr.status + ": " + xhr.statusText); 
                        },
                        success: function(data){
                            if(data.status){
                                $( "#target" ).submit();
                            }else{
                                showMsg('error',data.msg);
                            }
                        }
                    });
                }else{
                    showMsg('error','Something went wrong! please try again');
                }
            
            }
        }
        })
    }
  });
</script>
<script>
$('#showpromo1').click(function(){
	$('#showpromo').toggle();
});


$('input[type=radio][name=payment_method]').change(function() {
    if (this.value == '1') {
        $('#payment_type').show();
        
    }
    else if (this.value == '2') {
        $('#payment_type').hide();
    }
});

couponApply();	
function couponApply(){
	
	$('#couponApply').click(function(){
		var code = $('#coupon').val();
		$.ajax({
			url: "{{route('coupon.apply')}}",
			dataType: 'json',
			type: 'POST',
			data: {
				coupon_code: code
			},
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
			},
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
					$('#preloader').css('display','none');
				}else{
					if(data.login){
						showMsg('success',data.msg);
						location.href="/login";
					}
					showMsg('success',data.msg);
                    $('.subtotal').html(data.subtotal);
                    $('.shipping_charge').html(data.shipping_charge);
                    $('.discount').html(data.discount_amount);
                    $('.finalTotal').html(data.final_amount);
                    $('#preloader').css('display', 'none');
                }
			}
		});
	});
}

</script>
@endpush