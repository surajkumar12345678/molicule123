@foreach($products as $product)

<div class="col-6 col-md-4">
    <input type="hidden" value="{{$product->id}}" name="product_id" id="product_id">
    <div class="product grid-view">
        <div class="product-img_block"><a class="product-img" href="{{ route('product', ['id' => $product->id]) }}">
               
        @php $images = explode(',',$product->feature_image); @endphp
        <img src="{{ asset('uploads/products/images/'.$images[0])}}" alt="{{$product->title}}"></a>
            <button class="quickview no-round-btn smooth">Quick view</button>
        </div>
        <div class="product-info_block">
            <h5 class="product-type">{{$product->category}}</h5><a class="product-name"
                href="{{ route('product', ['id' => $product->id]) }}">{{$product->title}}</a>
            <h3 class="product-price">${{$product->price}}
                <del>$35.00</del>
            </h3>
        </div>
        <div class="product-select">
            <button data-product_id="{{$product->id}}" data-tip="add to wishlist"
                class="cart-btn add_to_wishlist add-to-wishlist round-icon-btn" data-dir="addWishlist"
                id="add_to_wishlist{{$product->id}}"> <i class="icon_heart_alt"></i></button>
            <button data-product_id="{{$product->id}}" data-tip="add to cart"
                class="cart-btn add_to_cart add-to-cart round-icon-btn" data-dir="addcart"
                id="add_to_cart{{$product->id}}"> <i class="fa fa-shopping-cart" aria-hidden="true"></i></button>

        </div>

    </div>
</div>
@endforeach

<script>
addToCart();
addToWishlist();
</script>