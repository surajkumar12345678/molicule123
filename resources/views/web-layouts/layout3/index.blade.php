
@extends('layouts.web_layout3')
@section('content')

    <!-- End Main Top -->
    <style type="text/css">

    .btntrans {
    border: 0px;
    background: none;
    cursor: cell;
}
        /* Float four columns side by side */
        .column {
            float: left;
            width: 25%;
            padding: 0 10px;
        }

        /* Remove extra left and right margins, due to padding */
        .row {
            margin: 0 -5px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Responsive columns */
        @media screen and (max-width: 600px) {
            .column {
                width: 100%;
                display: block;
                margin-bottom: 20px;
            }
        }

        /* Style the counter cards */
        .card {
            /* box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%); */
            /* padding: 16px; */
            text-align: center;
            /* background-color: #f1f1f1; */
        }

        /* --- CSS --- */
        .background {
            height: 30em;
            margin-left: 8%;
            margin-right: 8%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-size: cover;
            background-position: center;
        }

        .background>h4 {
            color: white;
            text-align: right;
            font-family: poppins;
        }

        .box {
            position: relative;
            display: inline-block;
            color: white;
            /* Make the width of box same as image */
        }

        .box .text {
            position: absolute;
            z-index: 999;
            margin: 0 auto;
            left: 0;
            height: 80px;
            right: 0;
            text-align: center;
            top: 87%;
            background: rgb(0 0 0 / 58%);

            color: white;
            width: 97%;
        }

        .box1 {
            position: relative;
            display: inline-block;
            color: white;
            /* Make the width of box same as image */
        }

        .box1 .text {
            position: absolute;
            z-index: 999;
            margin: 0 auto;
            left: 0;
            height: 80px;
            right: 0;
            text-align: center;
            top: 87%;
            background: rgb(0 0 0 / 58%);

            color: white;
            width: 97%;
        }
    </style>
    <div class="">
        <!-- <h1> Photo Gallery </h1> -->
        <div class="grid">
            <div class="cell box" id="image1">
                <img src="{{ asset('web-layouts/assets3/images/slide1.png')}}" id="responsive-image1">
                <div class="text">
                    <div class="row">
                        <div style="margin-top: 20px;" class="col-lg-6">
                            <h1 style="color:white;">All Products</h1>
                        </div>
                        <div style="margin-top: 20px;" class="col-lg-6"><button href="{{route('products')}}" class="btn btn-default">Shop
                                Now</button></div>
                    </div>
                </div>
            </div>
            <div class="cell">
                <div id="image2">
                    <img src="{{ asset('web-layouts/assets3/images/fruits.png')}}" id="responsive-image2">
                </div>
                <br>
                <div id="image2">
                    <img src="{{ asset('web-layouts/assets3/images/sea.png')}}">
                </div>

            </div>
            <div class="cell">
                <div id="image2">
                    <img src="{{ asset('web-layouts/assets3/images/vege.png')}}">
                </div>
                <br>
                <div id="image2">
                    <img src="{{ asset('web-layouts/assets3/images/meats.png')}}">
                </div>

            </div>
        </div>

    </div>
    <br>
    <div style="margin-top: -80px;" class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <p style="font-size:40px;text-align: center;">OUR PRODUCTS</p><br>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu">
                        <div class="button-group filter-button-group">
                    @if(!empty($categories))
                    @foreach($categories as $cate)
                            <button class="active" data-filter="*">{{$cate->category_name}}</button>
                     @endforeach
                @else
                <p>Data not available</p>
                @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="row special-list" style="position: relative; height: 1246.99px;">
                 @if(count($products)>0)
            @foreach($products as $product)
               
                <div class="col-lg-3 col-md-6 special-grid best-seller"
                    style="position: absolute; left: 0px; top: 0px;">
                        <div style="    margin: 10px;" class="card">
                            <div style="margin-top:25px;margin-left: 50px;" class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-10">
                                    <button type="button" data-product_id="{{$product->id}}" data-tip="add to wishlist"
                                        data-dir="addWishlist" id="add_to_wishlist{{$product->id}}"
                                        class="add-to-wishlist round-icon-btn pink cart-btn add_to_wishlist btntrans"><i style="font-size: 25px;color: #B4CF10;" class="fa fa-heart"
                                            aria-hidden="true"></i>

                                    </button>&nbsp;&nbsp;&nbsp;
                                   <button data-product_id="{{$product->id}}" data-tip="add to cart"
                                        class="cart-btn add_to_cart add-to-cart round-icon-btn pink btntrans"
                                        data-dir="addcart" id="add_to_cart{{$product->id}}"><i style="font-size: 25px;color: #B4CF10;" class="fa fa-shopping-cart"
                                            aria-hidden="true"></i></button>
                                </div>

                            </div>
                           
                             @php $images = explode(',',$product->feature_image); @endphp
                              <a href="{{ route('product', ['id' => $product->id]) }}">

                            <img src="{{ asset('uploads/products/images/'.$images[0])}}" style="width: 100%;">
                            <h2>{{$product->title}}</h2>
                            <span style="display:inline;">
                                <h2 style="color:#B4CF10;"><b>${{$product->price}}</b></h2>
                                <p style="text-decoration: line-through;">$34.00</p>
                            </span><br>
                        </a>

                        </div>
                
                </div>
                @endforeach
                                @else
                                <strong>Data not available</strong>
                                @endif

                
                
            </div>
            <div style="text-align: center;">
                <br>
                <button style="border:1px solid gray" class="btn btn-default .load-more">Load More</button>
            </div>
        </div>
    </div>


    <section style=" background-image: url('{{ asset('web-layouts/assets3/images/cucu.png')}}');background-size: cover; width:100%;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div style="margin-top:100px;" class="col-lg-4"><b>
                            <h1 style="color: white;text-align: left;font-size: 40px;">Best Price For You</h1>
                            <br>
                            <h1 style="color: white;font-size: 50px;text-align: left;">Deal of the day</h1>
                            <p style="color:white; font-size: 20px;">Lorem ipsum dolor sit amet consectetur adipiscing,
                                elit
                                odio lectus blandit nisi nascetur, class sapien habitant phasellus molestie. </p>

                            <br>
                            <h1 style="color:white;text-align: left;">Garments</h1>
                            <h1 style="color:white;text-align: left;"><small style="color:gray;">$10</small> now $5 only
                            </h1>
                        </b>
                    </div>

                </div>
            </div>

            <br><br>
        </div>
    </section>
    <br>
    <p style="font-size:40px; text-align: center;">OUR SATISFIED CUSTOMER</p>
    <section class="testimonial text-center">
        <div class="container">

            <div id="testimonial4"
                class="carousel slide testimonial4_indicators testimonial4_control_button thumb_scroll_x swipe_x"
                data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000">

                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <div class="testimonial4_slide">
                            <img src="https://i.ibb.co/8x9xK4H/team.jpg" class="img-circle img-responsive" /><br>
                            <h4>Client 1</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the industry's standard dummy text ever since the 1500s, when an unknown
                                printer took a galley of type and scrambled it to make a type specimen book. </p>

                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="testimonial4_slide">

                            <img src="https://i.ibb.co/8x9xK4H/team.jpg" class="img-circle img-responsive" /><br>
                            <h4>Client 2</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the industry's standard dummy text ever since the 1500s, when an unknown
                                printer took a galley of type and scrambled it to make a type specimen book. </p>

                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="testimonial4_slide">

                            <img src="https://i.ibb.co/8x9xK4H/team.jpg" class="img-circle img-responsive" /><br>
                            <h4>Client 3</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the industry's standard dummy text ever since the 1500s, when an unknown
                                printer took a galley of type and scrambled it to make a type specimen book. </p>

                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#testimonial4" data-slide="prev">
                    <span style="color:black;" class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#testimonial4" data-slide="next">
                    <span style="color:black" class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
    </section>
    <section style="background-color: whitesmoke;
            padding: -20px 40px 55px 40px;" class="bg-img text-center">
        <div style="border-radius: 25px;    z-index: 100;
                width: 80%;
               
                margin-bottom: 55px;
                background-color: #B4CF10;
                " class="container">
            <div class="row">
                <div style="margin-top:25px;" class="col-12 col-md-2 col-lg-2 col-xl-2 ">
                    <p>Trusted by</p>
                </div>
                <div style="margin-top:25px;" class="col-12 col-md-2 col-lg-2 col-xl-2 ">
                    <h1>LOGO</h1>
                </div>
                <div style="margin-top:25px;" class="col-12 col-md-2 col-lg-2 col-xl-2 ">
                    <h1>LOGO</h1>
                </div>
                <div style="margin-top:25px;" class="col-12 col-md-2 col-lg-2 col-xl-2 ">
                    <h1>LOGO</h1>
                </div>
                <div style="margin-top:25px;" class="col-12 col-md-2 col-lg-2 col-xl-2 ">
                    <h1>LOGO</h1>
                </div>
                <div style="margin-top:25px;" class="col-12 col-md-2 col-lg-2 col-xl-2 ">
                    <h1>LOGO</h1>
                </div>

            </div>
        </div>
        <div class="container">
            <div class="row">
                <div style="text-align:left;" class="col-lg-8">
                    <h2 style="text-align:left">
                        <strong>Subscribe to Our Newsletter</strong>
                    </h2>
                    <h3 class="font-alt">Get e-mail updates about our latest shops and special offers</h3>
                </div>
                <div class="col-lg-4">
                    <form class="form-subscribe" action="#">
                        <div class="input-group">
                            <input type="text" class="form-control input-lg" placeholder="Your eamil address">
                            <span class="input-group-btn">
                                <button style="background-color: #B4CF10;" class="btn btn-success btn-lg"
                                    type="submit">Subscribe</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>

            <br><br>

        </div>
    </section>






    <!-- Start copyright  -->

    <!-- End copyright  -->
    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>
    <!-- ALL JS FILES -->


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
     @endpush