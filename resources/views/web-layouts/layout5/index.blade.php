@extends('layouts.web_layout5')
@section('content')

    <section style="background-image: url('{{ asset('web-layouts/assets5/images/slider.png')}}')">
        <!-- Start Slider -->
        <div id="slides-shop" style="position: relative;overflow: hidden; width: 100%;" class="cover-slides">


            <!-- <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 style="text-align:center;" class="m-b-20"><strong>EVERYTHING YOU NEED<br>IS HERE</strong></h1>
                            <p class="m-b-40">See how your users experience your website in realtime or view <br> trends to see any changes in performance over time.</p>
                            <p><a class="btn hvr-hover" href="#">Shop New</a></p>
                        </div>

                    </div>
                </div> -->

            <div class="texter">
                <div class="container">
                    <div style="margin-top: 20px;" class="col-lg-12">
                        <p style="font-weight:bold;  margin-top: 50px;" class="fontsize">We Believe in Quality Hardware
                            for great Usage</p>
                        <br>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit, rutrum urna habitasse erat orci
                            aliquet, inceptos faucibus ac feugiat dictumst dui. Nam egestas donec taciti ut tortor
                            litora maecenas porta nisl, vehicula semper aenean cras curabitur vitae pellentesque
                            habitasse quisque rhoncus, bibendum nullam augue dui pharetra sodales penatibus dapibus. Non
                            nibh ultricies class litora curabitur, cum bibendum vehicula nascetur.</p><br>
                        <button class="btn btn-default">Shop Now</button>
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
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="{{ asset('web-layouts/assets5/images/veg.png')}}" alt="" />
                        <a class="btn hvr-hover" href="{{ url('user/products') }}/{{$cate->category_name}}">{{$cate->category_name}}</a>
                    </div>
                </div>

                @endforeach
                @else
                <p>Data not available</p>
                @endif
                
        </div>
    </div>
    <!-- End Categories -->



    <!-- Start Products  -->
    <div style="margin-top: -80px;" class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1 style="text-align: center;">PRODUCT OVERVIEW</h1>

                    </div>
                </div>
            </div>
            <div style="text-align:center;" class="row">
                <div class="col-lg-12">
                    <div class="special-menu">
                        <div class="button-group filter-button-group">
                            <button class="active" data-filter="*">All</button>
                            <button data-filter=".top-featured">Accessories</button>
                            <button data-filter=".best-seller">Keys</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row special-list">
                @if(count($products)>0)
            @foreach($products as $product)
                <div class="col-lg-3 col-md-6 special-grid best-seller">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            @php $images = explode(',',$product->feature_image); @endphp
                            <img src="{{ asset('uploads/products/images/'.$images[0])}}" class="img-fluid" alt="Image">

                        </div>
                        <div class="why-text">
                            <span style="display:flex;">
                                <h4>{{$product->title}}</h4>
                                <!-- <a style="margin-left: 150px;" href=""><img src="images/wish.png"></a>
                                <a style="margin-left: 5px;" href="#"><img src="images/cart.png"></a> -->
                                <button type="button" data-product_id="{{$product->id}}" data-tip="add to wishlist"
                                        data-dir="addWishlist" id="add_to_wishlist{{$product->id}}"
                                        class="add-to-wishlist round-icon-btn pink cart-btn add_to_wishlist btntrans"><img src="{{ asset('web-layouts/assets5/images/wish.png')}}"></button>
                                <button   data-product_id="{{$product->id}}" data-tip="add to cart"
                                        class="cart-btn add_to_cart add-to-cart round-icon-btn pink btntrans"
                                        data-dir="addcart" id="add_to_cart{{$product->id}}"><img src="{{ asset('web-layouts/assets5/images/cart.png')}}"></button>
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
                <button style="border:1px solid gray" class="btn btn-default">Load More</button>
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
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1 style="text-align: center;">OUR PRODUCTS</h1>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <span>
                        <img style="width: 100%;" src="{{ asset('web-layouts/assets5/images/offer1.png')}}">

                    </span>

                </div>
                <div class="col-lg-6">
                    <span>
                        <img style="width: 100%;" src="{{ asset('web-layouts/assets5/images/offer1.png')}}">

                    </span>
                </div>
            </div>
        </div>

    </section>
    <br>
    <section>
        <div class="container">
            <div style="text-align:center;" class="row">
                <div class="col-lg-12">
                    <img src="{{ asset('web-layouts/assets5/images/no.png')}}">
                </div>

            </div>
        </div>
    </section>
    <!-- End Blog  -->
    <br><br>
    <section class="testimonial text-center">
        <div class="container">

            <div class="title-all text-center">
                <h1 style="text-align: center;">OUR CUSTOMER REVIEWS</h1>

            </div>
            <div id="testimonial4"
                class="carousel slide testimonial4_indicators testimonial4_control_button thumb_scroll_x swipe_x"
                data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000">

                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <div class="testimonial4_slide">
                            <img src="https://i.ibb.co/8x9xK4H/team.jpg" class="img-circle img-responsive" />
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the industry's standard dummy text ever since the 1500s, when an unknown
                                printer took a galley of type and scrambled it to make a type specimen book. </p>
                            <h4>Client 1</h4>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="testimonial4_slide">
                            <img src="https://i.ibb.co/8x9xK4H/team.jpg" class="img-circle img-responsive" />
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the industry's standard dummy text ever since the 1500s, when an unknown
                                printer took a galley of type and scrambled it to make a type specimen book. </p>
                            <h4>Client 2</h4>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="testimonial4_slide">
                            <img src="https://i.ibb.co/8x9xK4H/team.jpg" class="img-circle img-responsive" />
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the industry's standard dummy text ever since the 1500s, when an unknown
                                printer took a galley of type and scrambled it to make a type specimen book. </p>
                            <h4>Client 3</h4>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#testimonial4" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#testimonial4" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
    </section>



    <section style="background-color: whitesmoke;">
        <div style="padding: 40px 20px 40px 20px;" class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12 ">
                    <h1>Subscribe to our Newsletter</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit cubilia dapibus nostra conubia, volutpat
                        quis porta eleifend ligula egestas et massa suscipit cursus.</p>
                </div>
                <div style="margin-top: 25px;" class="col-lg-6 col-sm-12 ">
                    <form method="post">
                        <input class="input1" type="text" name="useremail-id" id="useremail-id"
                            placeholder="Enter your Email">
                        <button class="button2" type="submit" id="subscribe">
                            Subscribe
                        </button>
                    </form>
                </div>





            </div>
        </div>
        </div>
    </section>
    <!-- Start Footer  -->
    <!-- <footer>
        <div class="footer">
            <div class="container">
                <div class="row">


                    <div class="col-lg-2">
                        <h1 style="color:white;" class="mt-4">ABOUT US</h1>
                        <p style="color: white;">Lorem ipsum dolor sit amet consectetur adipiscing elit magna, Lorem
                            ipsum dolor sit amet consectetur adipiscing elit magna,</p>
                    </div>
                    <div class="col-lg-3">
                        <h1 style="color:white;" class="mt-4">CUSTOMER CARE</h1>
                        <ul class="">

                            <li style="color:white">CONTACT</li>
                            <li style="color:white">RETURN/EXCHANGE</li>
                            <li style="color:white">GIFT VOUCHERS</li>
                            <li style="color:white">WISHLIST</li>
                            <li style="color:white">SPECIAL</li>
                            <li style="color:white">CUSTOMER SERVICE</li>
                            <li style="color:white">SITE MAPS</li>
                        </ul>
                    </div>
                    <div class="col-lg-2">
                        <h1 style="color:white;" class="mt-4">INFORMATION</h1>
                        <ul>
                            <li style="color:white">ABOUT US</li>
                            <li style="color:white">DELIVERY INFORMATION</li>
                            <li style="color:white">PRIVACY POLICY</li>
                            <li style="color:white">SUPPORT</li>
                            <li style="color:white">ORDER TRACKING</li>


                        </ul>
                    </div>
                    <div class="col-lg-2">
                        <h1 style="color: white; " class="mt-4">NEWS</h1>
                        <ul>

                            <li style="color:white">BLOG</li>
                            <li style="color:white">PRESS</li>
                            <li style="color:white">EXHIBITIONS</li>
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <h1 style="color: white;" class="mt-4">CONTACT INFORMATION</h1>
                        <ul>
                            <li style="color:white">291 SOUTH 21TH STREET</li>
                            <li style="color:white">+1235235598</li>
                            <li style="color:white">logoinfo5212@gmail.com</li>

                        </ul>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </footer> -->
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
    <script type="text/javascript">
    $(document).ready(function(){
        $(".load-more").on('click',function(){
            var _totalCurrentResult=$(".product-box").length;
            // Ajax Reuqest

            $.ajax({
                url:"{{ route('more_data') }}",
                type:'get',
                dataType:'json',
                data:{
                    skip:_totalCurrentResult
                },
                beforeSend:function(){
                    $(".load-more").html('Loading...');
                },
                success:function(response){
                    var _html='';
                    var image="{{ asset('imgs') }}/";
                    $.each(response,function(index,value){
                        _html+='<div class="col-sm-4 mb-3 product-box">';
                            _html+='<div class="card">';
                                _html+='<div class="card-body">';
                                    _html+='<h5 class="card-title">'+value.id+'. '+value.title+'</h5>';
                                    _html+='Price: <span class="badge badge-secondary">'+value.price+'</span>';
                                _html+='</div>';
                            _html+='</div>';
                        _html+='</div>';
                    });
                    $(".product-list").append(_html);
                    // Change Load More When No Further result
                    var _totalCurrentResult=$(".product-box").length;
                    var _totalResult=parseInt($(".load-more").attr('data-totalResult'));
                    console.log(_totalCurrentResult);
                    console.log(_totalResult);
                    if(_totalCurrentResult==_totalResult){
                        $(".load-more").remove();
                    }else{
                        $(".load-more").html('Load More');
                    }
                }
            });
        });
    });
</script>
{{-- Ajax Script End --}}
@endpush