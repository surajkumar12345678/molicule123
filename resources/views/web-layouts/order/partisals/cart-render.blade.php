@php $totalAmount = "0"; @endphp
@if(Auth::id())
@forelse($carts as $cart)
<tr>
    <td class="product-iamge">
        <div class="img-wrapper">
        @php $images = explode(',',$cart->feature_image); @endphp
        <img src="{{ asset('uploads/products/images/'.$images[0])}}" alt=""></a>
        </div>
    </td>
    <td class="product-name">{{$cart->title}}</td>
    <td class="product-price">${{$cart->price}}</td>
    <td class="product-quantity">
        <input class="quantity no-round-input" id="input-quantity-{{$cart->id}}"
            onChange="change_quantity({{$cart->id}})" type="number" min="1" value="{{$cart->qty}}"  oninput="this.value = 
 !!this.value && Math.abs(this.value) >= 1 ? Math.abs(this.value) : null">
    </td>
    <td class="product-total">$
        @php
        echo $subTotal = $cart->price*$cart->qty;
        @endphp
    </td>
    <td class="product-clear">
        <button class="no-round-btn removeCartData" data-product_id="{{$cart->id}}"><i class="fa fa-trash"
                aria-hidden="true"></i></button>
    </td>
</tr>
@empty
<tr>
    <td colspan="6">
        Data not available
    </td>
</tr>
@endforelse

@elseif(!empty($carts))
@forelse($carts as $key=> $cart)
<tr>
    <td class="product-iamge">
        <div class="img-wrapper">
            
        <img src="{{ asset('/').$cart['image']}}" alt="product image"></div>
    </td>
    <td class="product-name">{{$cart['productsName']}}</td>
    <td class="product-price">${{$cart['price']}}</td>
    <td class="product-quantity">
        <input class="quantity no-round-input" id="input-quantity-{{$key}}" onChange="change_quantity({{$key}})"
            type="number" min="1" value="{{$cart['qty']}}">
    </td>
    <td class="product-total">$

        @php
        echo $subTotal = $cart['price']*$cart['qty'];
        @endphp

    </td>
    <td class="product-clear">
        <button class="no-round-btn removeCartData" data-product_id="{{$cart['product_id']}}"><i class="fa fa-trash"
                aria-hidden="true"></i></button>
    </td>
</tr>
@empty
<tr>
    <td colspan="6">
        Data not available
    </td>
</tr>
@endforelse
@else
<tr>
    <td colspan="6">
        Empty cart
    </td>
</tr>
@endif

<script>
removeCartData();

function change_quantity(cart_id) {

    //var inputQuantityElement = $("#input-quantity-" + cart_id);
    var newQuantity = $("#input-quantity-" + cart_id).val();

    save_to_cart(cart_id, newQuantity);
}
</script>