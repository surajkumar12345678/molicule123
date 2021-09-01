@extends('layouts.web_layout')
@section('content')
<style type="text/css">
.headercss img {
float: left;
width: 50%;
height: 50%;
/* background: #555; */
}
.parent {
position: relative;
max-width: 800px;
margin: 0 auto;
}
.parent .text {
position: absolute;
bottom: 0;
background: rgb(0, 0, 0);
background: rgba(0, 0, 0, 0.5);
color: #ffffff;
width: 100%;
padding: 20px;
}
.carousel-control-next,
.carousel-control-prev /*, .carousel-indicators */ {
filter: invert(100%);
}
#preload {
display: none;
}
</style>
<header class="pink">
    <div class="navigation-filter">
        <div class="container">
            <div class="row">
                <div class="col-6 col-md-4 col-lg-4 col-xl-3 order-2 order-md-1">
                    <div class="department-menu_block down">
                        <div class="department-menu d-flex justify-content-between align-items-center"><i
                            class="fas fa-bars"></i>All departments<span><i class="arrow_carrot-up"></i></span>
                        </div>
                        <div class="department-dropdown-menu down">
                            <ul>
                                @if(!empty($categories))
                                @foreach($categories as $cate)
                                <li><a
                                href="{{ url('user/products') }}/{{$cate->category_name}}">{{$cate->category_name}}</a>
                            </li>
                            @endforeach
                            @else
                            <li>Data not available</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-8 col-lg-8 col-xl-9 order-1 order-md-2">
                <div class="row">
                    <div class="col-12 col-xl-12">
                        <div class="website-search">
                            <form action="{{url('user/product-search')}}" method="post">
                                <div class="row no-gutters">
                                    @csrf
                                    <div class="col-10 col-md-10 col-lg-6 col-xl-11">
                                        <div class="search-input">
                                            <input class="no-round-input no-border" name="name" type="text"
                                            placeholder="What do you need" id="liveSearch">
                                        </div>
                                    </div>
                                    <div class="col-2 col-md-2 col-lg-2 col-xl-1">
                                        <button class="no-round-btn "><i class="icon_search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="banner_v2">
    <div class="container">
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col-12 col-xl-9">
                <div class="banner-block">
                    <div id="carouselExampleIndicators" class="carousel slide" data-interval="false">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div style="margin-top: -80px;" class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="uploads/products/images/storeslider.png" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="uploads/products/images/storeslider.png" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="uploads/products/images/storeslider.png" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End banner v2-->
<br><br>
<section style="background-color: #cccccc21;padding-bottom: 25px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 style="text-align:center;padding-top: 50px;">FEATURED PRODUCT</h2><br><br>
                <div style="background-color: #f8f8f8;" class="col-12 col-xl-12">
                    <div style="border:none;" id="tab">
                        <div class="best-seller_top  underline pink">
                            <div class="row align-items-md-center">
                                <div style="text-align: center;" class="col-12 col-md-12">
                                    <ul style="background-color:#f8f8f8;border: none;padding: none;" class="tab-control">
                                        <li style="border: none;"><a class="active" href="#all">All</a></li>
                                        @if(!empty($categories))
                                        @foreach($categories as $category)
                                        <li style="border:none;"><a href="#category{{$category->id}}">{{$category->category_name}}</a></li>
                                        @endforeach
                                        @else
                                        <li>
                                            <strong>Data not available</strong>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <div style="background-color: #f8f8f8;" class="best-seller_bottom">
                            <div id="all">
                                <div class="row no-gutters-sm">
                                    @if(!empty($products))
                                    @foreach($products as $product)
                                    <div class="col-6 col-md-3">
                                        <div class="product pink"><a class=""
                                            href="{{ route('product', ['id' => $product->id]) }}">
                                            @php $images = explode(',',$product->feature_image); @endphp
                                            <img style="width: 100%;"
                                            src="{{ asset('uploads/products/images/'.$images[0])}}"
                                        alt="{{$product->title}}"></a>
                                        <h5 class="product-type"></h5>
                                        <h3 class="product-name">{{$product->title}}</h3>
                                        <h3 class="product-price">${{$product->price}}
                                        <del>$35.00</del>
                                        </h3>
                                        <div class="product-select">
                                            <button data-product_id="{{$product->id}}" data-tip="add to wishlist"
                                            data-dir="addWishlist" id="add_to_wishlist{{$product->id}}"
                                            class="add-to-wishlist round-icon-btn pink cart-btn add_to_wishlist"><i
                                            class="icon_heart_alt"></i></button>
                                            <button data-product_id="{{$product->id}}" data-tip="add to cart"
                                            class="cart-btn add_to_cart add-to-cart round-icon-btn pink"
                                            data-dir="addcart" id="add_to_cart{{$product->id}}"> <i
                                            class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <strong>Data not available</strong>
                                @endif
                            </div>
                        </div>
                        @if(!empty($categories))
                        @foreach($categories as $category)
                        <div id="category{{$category->id}}">
                            <div class="row no-gutters-sm">
                                @foreach($products as $product)
                                @if($product->category == $category->category_name)
                                <div class="col-6 col-md-3">
                                    <div class="product pink"><a class=""
                                        href="{{ route('product', ['id' => $product->id]) }}">
                                        @php $images = explode(',',$product->feature_image); @endphp
                                        <img style="width: 100%;"
                                        src="{{ asset('uploads/products/images/'.$images[0])}}"
                                    alt="{{$product->title}}"></a>
                                    <h5 class="product-type"></h5>
                                    <h3 class="product-name">{{$product->title}}</h3>
                                    <h3 class="product-price">${{$product->price}}
                                    <del>$35.00</del>
                                    </h3>
                                    <div class="product-select">
                                        <button data-product_id="{{$product->id}}" data-tip="add to wishlist"
                                        data-dir="addWishlist" id="add_to_wishlist{{$product->id}}"
                                        class="add-to-wishlist round-icon-btn pink cart-btn add_to_wishlist"><i
                                        class="icon_heart_alt"></i></button>
                                        <button data-product_id="{{$product->id}}" data-tip="add to cart"
                                        class="cart-btn add_to_cart add-to-cart round-icon-btn pink"
                                        data-dir="addcart" id="add_to_cart{{$product->id}}"> <i
                                        class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                    @else
                    Data not available
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>
<section style="">
<div class="container">
<div style="margin-top: 28px;" class="row">
    <div style="" class="col-md-4 col-sm-12 col-xs-12">
        <div class="col-md-8 col-sm-12 col-xs-12"><br><br>
            <span style="display:inline-block;"  ><h4 style="display:fle;">Featured Product
                <!-- <div> -->
            </h4><button style="width: 30px;height: 30px;" class="carousel-control-prev-icon" href="#carouselExampleControls" data-slide="prev"><i class="fas fa-chevron-left"></i></button>&nbsp;<button style="width: 30px;height: 30px;" class="carousel-control-next-icon" href="#carouselExampleControls" data-slide="next"><i class="fas fa-chevron-right"></i></button></span>
            <br><br><br><br>
            <div id="carouselExampleControls" class="carousel slide" data-interval="false">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="headercss">
                            @if(!empty($featured_pro))
                            @foreach($featured_pro as $product)
                            <a href="{{ route('product', ['id' => $product->id]) }}">
                                @php $images = explode(',',$product->feature_image); @endphp
                                <img src="{{ asset('uploads/products/images/'.$images[0])}}">
                                <br>
                                <br>
                                <p>{{$product->title}}</p>
                                <h6>${{$product->price}}</h6>
                            </a><br><br><br><br>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="headercss">
                            @if(!empty($featured_pro))
                            @foreach($featured_pro as $product)
                            <a href="{{ route('product', ['id' => $product->id]) }}">
                                @php $images = explode(',',$product->feature_image); @endphp
                                <img src="{{ asset('uploads/products/images/'.$images[0])}}">
                                <br>
                                <br>
                                <p>{{$product->title}}</p>
                                <h6>${{$product->price}}</h6>
                            </a><br><br><br><br>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="headercss">
                            @if(!empty($featured_pro))
                            @foreach($featured_pro as $product)
                            <a href="{{ route('product', ['id' => $product->id]) }}">
                                @php $images = explode(',',$product->feature_image); @endphp
                                <img src="{{ asset('uploads/products/images/'.$images[0])}}">
                                <br>
                                <br>
                                <p>{{$product->title}}</p>
                                <h6>${{$product->price}}</h6>
                            </a><br><br><br><br>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                
            </div>
            
            <br>
        </div>
    </div>
    <div style="" class="col-md-4 col-sm-12 col-xs-12">
        <div style="display:inline-block;" class="col-md-8 col-sm-12 col-xs-12"><br><br>
            
            <span style="display:inline-block;"  > <h4 style="display:fle;">Top Rated Product
                <!-- <div> -->
            </h4><button style="width: 30px;height: 30px;" class="carousel-control-prev-icon" href="#carouselExampleControls1" data-slide="prev"><i class="fas fa-chevron-left"></i></button>&nbsp;<button style="width: 30px;height: 30px;" class="carousel-control-next-icon" href="#carouselExampleControls1" data-slide="next"><i class="fas fa-chevron-right"></i></button></span>
            <div>
                </h4>
                <br><br><br><br>
                <div id="carouselExampleControls1" class="carousel slide" data-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="headercss">
                                @if(!empty($rated_pro))
                                @foreach($rated_pro as $product)
                                <a href="{{ route('product', ['id' => $product->id]) }}">
                                    @php $images = explode(',',$product->feature_image); @endphp
                                    <img src="{{ asset('uploads/products/images/'.$images[0])}}">
                                    <br>
                                    <br>
                                    <p>{{$product->title}}</p>
                                    <h6>$ {{$product->price}}</h6>
                                </a><br><br><br><br>
                                @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="headercss">
                                @if(!empty($rated_pro))
                                @foreach($rated_pro as $product)
                                <a href="{{ route('product', ['id' => $product->id]) }}">
                                    @php $images = explode(',',$product->feature_image); @endphp
                                    <img src="{{ asset('uploads/products/images/'.$images[0])}}">
                                    <br>
                                    <br>
                                    <p>{{$product->title}}</p>
                                    <h6>$ {{$product->price}}</h6>
                                </a><br><br><br><br>
                                @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="headercss">
                                @if(!empty($rated_pro))
                                @foreach($rated_pro as $product)
                                <a href="{{ route('product', ['id' => $product->id]) }}">
                                    @php $images = explode(',',$product->feature_image); @endphp
                                    <img src="{{ asset('uploads/products/images/'.$images[0])}}">
                                    <br>
                                    <br>
                                    <p>{{$product->title}}</p>
                                    <h6>$ {{$product->price}}</h6>
                                </a><br><br><br><br>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <br>
            </div>
        </div>
    </div>

        <div style="" class="col-md-4 col-sm-12 col-xs-12">
        <div style="display:inline-block;" class="col-md-8 col-sm-12 col-xs-12"><br><br>
            
            <span style="display:inline-block;"  > <h4 style="display:fle;">Review Product
                <!-- <div> -->
            </h4><button style="width: 30px;height: 30px;" class="carousel-control-prev-icon" href="#carouselExampleControls3" data-slide="prev"><i class="fas fa-chevron-left"></i></button>&nbsp;<button style="width: 30px;height: 30px;" class="carousel-control-next-icon" href="#carouselExampleControls3" data-slide="next"><i class="fas fa-chevron-right"></i></button></span>
            <div>
                </h4>
                <br><br><br><br>
                <div id="carouselExampleControls3" class="carousel slide" data-interval="false">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="headercss">
                                        @if(!empty($review_pro))
                                        @foreach($review_pro as $product)
                                        <a href="{{ route('product', ['id' => $product->id]) }}">
                                            @php $images = explode(',',$product->feature_image); @endphp
                                            <img src="{{ asset('uploads/products/images/'.$images[0])}}">
                                            <br>
                                            <br>
                                            <p>{{$product->title}}</p>
                                            <h6>${{$product->price}}</h6>
                                        </a><br><br><br><br>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="headercss">
                                        @if(!empty($review_pro))
                                        @foreach($review_pro as $product)
                                        <a href="{{ route('product', ['id' => $product->id]) }}">
                                            @php $images = explode(',',$product->feature_image); @endphp
                                            <img src="{{ asset('uploads/products/images/'.$images[0])}}">
                                            <br>
                                            <br>
                                            <p>{{$product->title}}</p>
                                            <h6>${{$product->price}}</h6>
                                        </a><br><br><br><br>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="headercss">
                                        @if(!empty($review_pro))
                                        @foreach($review_pro as $product)
                                        <a href="{{ route('product', ['id' => $product->id]) }}">
                                            @php $images = explode(',',$product->feature_image); @endphp
                                            <img src="{{ asset('uploads/products/images/'.$images[0])}}">
                                            <br>
                                            <br>
                                            <p>{{$product->title}}</p>
                                            <h6>${{$product->price}}</h6>
                                        </a><br><br><br><br>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                        </div>
                
                <br>
            </div>
        </div>
       
    </section>
    <section style="margin-bottom: 50px;">
        <div class="container">
            <h2 style="text-align:center;margin-top: 50px;color: #1f85ec;">FROM THE BLOG</h2><br><br>
            <div class="row">
                @if(!empty($blogs))
                @foreach($blogs as $blog)
                <div class="col-md-4  col-sm-12 col-xs-12">
                    <div class="parent">
                        <a href="{{url('user/blog')}}/{{$blog->slug}}" class="text-white text-decoration-none">
                        <img src="{{asset('uploads/blogs')}}/{{$blog->image}}" alt="{{$blog->title}}" style="width:100%;"></a>
                        <div class="text">
                            <p style="font-size:10px;color: white;">{{date('M', strtotime($blog->created_at))}}, {{date('d-Y', strtotime($blog->created_at))}}</p><br>
                            <p style="color:white;">
                                <a href="{{url('user/blog')}}/{{$blog->slug}}" class="text-white text-decoration-none">{{$blog->title}}</a>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                Data not available
                @endif
            </div>
        </div>
    </section>
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