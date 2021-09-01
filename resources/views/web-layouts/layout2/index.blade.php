@extends('layouts.web_layout2')
@section('content')


 @if(!empty($sliders))
  @foreach($sliders as $slider)

  @php $images = explode(',',$slider->image); @endphp

   <section style="background-image: url('{{ asset('uploads/sliders/'.$images[0])}}')">
 
        <!-- Start Slider -->
        <div id="slides-shop" style="position: relative;overflow: hidden;width: 100%;" class="cover-slides">
 @endforeach
                @else
                <p>Data not available</p>
                @endif

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 style="text-align:center;" class="m-b-20"><strong><h1>EVERYTHING YOU NEED<br/>IS HERE</h1></strong>
                        </h1>
                        <!--  <p class="m-b-40">See how your users experience your website in realtime or view <br> trends to see any changes in performance over time.</p>
                            <p><a class="btn hvr-hover" href="#">Shop New</a></p> -->
                    </div>

                </div>
            </div>

            <!-- <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div> -->
        </div>
        <!-- End Slider -->
    </section>

    <!-- Start Categories  -->
    <div class="categories-shop">
        <div class="container">
            <div class="row">
                 @if(!empty($categories))
                    @foreach($categories as $cate)
                        
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                       <img class="img-fluid" src="{{ asset('web-layouts/assets2/images/veg.png')}}" alt="" />
                        <a class="btn hvr-hover" href="{{ url('user/products') }}/{{$cate->category_name}}">{{$cate->category_name}}</a>
                    </div>
                </div>

                @endforeach
                @else
                <p>Data not available</p>
                @endif
            </div>
        </div>
    </div>
    <!-- End Categories -->



    <!-- Start Products  -->
    <div style="margin-top: -80px;" class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1 style="text-align: left;">PRODUCT OVERVIEW</h1>

                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu">
                        <div class="button-group filter-button-group">
                            <button class="active" data-filter="*">All</button>
                            <button data-filter=".top-featured">Accessories</button>
                            <button data-filter=".best-seller">Motherboards</button>
                        </div>
                    </div>
                </div>
                 @csrf
            </div>

            <div class="row special-list">
            @if(count($products)>0)
            @foreach($products as $product)
                <div class="col-lg-3 col-md-6 special-grid best-seller product-box">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <a href="{{ route('product', ['id' => $product->id]) }}"></a>
                            @php $images = explode(',',$product->feature_image); @endphp
                            <img src="{{ asset('uploads/products/images/'.$images[0])}}" class="img-fluid" alt="Image">

                        </div>
                        <div class="why-text">
                            <span style="display:flex;">
                                <h4>{{$product->title}}</h4>
                                <!-- <a style="margin-left: 25px;" href=""><img src="images/wish.png"></a>
                                <a style="margin-left: 5px;" href="#"><img src="images/cart.png"></a> -->
                                <button type="button" data-product_id="{{$product->id}}" data-tip="add to wishlist"
                                        data-dir="addWishlist" id="add_to_wishlist{{$product->id}}"
                                        class="add-to-wishlist round-icon-btn pink cart-btn add_to_wishlist btntrans"><img src="{{ asset('web-layouts/assets2/images/wish.png')}}"></button>
                                <button  data-product_id="{{$product->id}}" data-tip="add to cart"
                                        class="cart-btn add_to_cart add-to-cart round-icon-btn pink btntrans"
                                        data-dir="addcart" id="add_to_cart{{$product->id}}"><img src="{{ asset('web-layouts/assets2/images/cart.png')}}"></button>
                            </span>
                            <h5>${{$product->price}}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
                                @else
                                <strong>Data not available</strong>
                                @endif


            </div>
            <div style="text-align: center;">
                <a class="load-more btn btn-dark" href="{{route('shopping.cart')}}">Load More</a>
            </div>


        </div>
    </div>

    <section>
        <div>

        </div>
    </section>

    <!-- End Products  -->

    <!-- Start Blog  -->
    <section>
        <div class="container-fluid pl-0 pr-0 ml-0 mr-0">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-12">
                    <!-- <span>
                            <img style="" src="images/offer1.png" class="imgoffer1">
                            <div class="caption post-content">
    
                                <p style="font-size:60px;">Get Latest Offers<br> News </p><br>
                                    <form method="post">
                                        <input type="text" name="useremail-id" id="useremail-id" placeholder="Your email here">
                                        <button class="button1" type="submit" id="subscribe">
                                        Get Offer
                                        </button>
                                  </form>                      
                            </div>
                        </span> -->
                     @if(!empty($banners))
                        @foreach($banners as $banner)
                            @php $images = explode(',',$banner->image); @endphp
                    <div class="offer1image" style="background-image: url('{{ asset('uploads/banners/'.$images[0])}}')">
                        <div class="container">
                            <h2 style="font-size:50px;" class="text-white">Get Latest Offers<br> News </h2>
                        </div>
                            <div class="container pt-4">
                                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-9 col-xl-8">
                                    <div class="">
                                        <form method="post">
                                            <input style="color: black;" type="text" name="useremail-id" id="useremail-id" placeholder="Your email here">
                                            <button class="button1" type="submit" id="subscribe">
                                                Get Offer
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                       @endforeach
                @else       <p>Data not available</p>
                @endif
   
                    </div>
                </div>
            </div>
        </div>



    </section>
    <!-- End Blog  -->
    @endsection
     @push('custom_js')
   <script>
    addToCart();
    function addToCart() {
    $('.add_to_cart').click(function() {
    var newData = true;
    var productId = $(this).data('product_id');
    var qtys = $("#qty" + productId).val();
    if (qtys) {
    var qtys = $("#qty" + productId).val();
    } else {
    var qtys = "1";
    }
    $.ajax({
    type: "get",
    dataType: "json",
    url: "{{route('add-to-cart.save')}}",
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
    data: {
    product_id: productId,
    qty: qtys,
    },
    beforeSend: function() {
    $('#preloader').css('display', 'inline-block');
    },
    error: function(xhr, textStatus) {
    if (textStatus == 'timeout') {
    showMsg('warning', xhr.status + ': ' + xhr.statusText);
    $('#preloader').css('display', 'none');
    } else {
    showMsg('error', xhr.status + ': ' + xhr.statusText);
    $('#preloader').css('display', 'none');
    }
    },
    success: function(data) {
    $('#preloader').css('display', 'none');
    if (data.error) {
    showMsg('error', data.msg);
    } else {
    shoppingCartData();
    showMsg('success', data.msg);
    }
    }
    });
    });
    }
    addToWishlist();
    function addToWishlist() {
    $('.add_to_wishlist').click(function() {
    var newData = true;
    var productId = $(this).data('product_id');
    $.ajax({
    type: "get",
    dataType: "json",
    url: "{{route('add-to-wishlist.save')}}",
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
    data: {
    product_id: productId
    },
    beforeSend: function() {
    $('#preloader').css('display', 'inline-block');
    },
    error: function(xhr, textStatus) {
    if (textStatus == 'timeout') {
    showMsg('warning', xhr.status + ': ' + xhr.statusText);
    $('#preloader').css('display', 'none');
    } else {
    showMsg('error', xhr.status + ': ' + xhr.statusText);
    $('#preloader').css('display', 'none');
    }
    },
    success: function(data) {
    $('#preloader').css('display', 'none');
    if (data.error) {
    showMsg('error', data.msg);
    } else {
    showMsg('success', data.msg);
    }
    }
    });
    });
    }
    </script>
  
@endpush
   