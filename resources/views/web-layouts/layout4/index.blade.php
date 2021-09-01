@extends('layouts.web_layout4')
@section('content')


        <section style="background-size: cover;background-image: url('{{ asset('web-layouts/assets4/images/veg.png')}}');border-bottom: 10px solid #67bf09; ">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <p
                                        style="color:#67bf09; line-height: 85px;font-size:70px;font-weight: bolder;letter-spacing: -3px; font-family: 'Anton', sans-serif;margin-top: 100px;">
                                        WE DELIVER BEST <br>MEDICINES</p>
                                    <p style="color:#67bf09; font-size: 15px" ;>Lorem ipsum dolor sit amet consectetur
                                        adipiscing elit sodales tellus, ultricies cras quisque magna donec velit natoque
                                        leo nibh fringilla, posuere primis condimentum rhoncus accumsan nostra dignissim
                                        viverra. Himenaeos mattis vel senectus suscipit nam feugiat tempus eu vivamus
                                        potenti justo hendrerit nisi, facilisis dapibus orci ornare accumsan velit quis
                                        id faucibus ligula commodo. </p>
                                    <br>
                                    <button class="button button4">Shop Now</button>
                                </div>
                                <div class="col-lg-6">
                                    <img style="width: 105%;margin-top: 40px;" src="{{ asset('web-layouts/assets4/images/basket.png')}}">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </section>
        <br>
        <p style="color:#67bf09; text-align: center;font-size:50px;font-weight: bolder;">Browse our Honest Category</p>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <br>
                        <div class="card">

                            <img src="images/v1.png" alt="Avatar" style="width:100%">
                            <div class="container">
                                @if(!empty($categories))
                    @foreach($categories as $cate)

                                <a href="{{ url('user/products') }}/{{$cate->category_name}}"><p style="font-size:30px;" class="greencolor"><b>{{$cate->category_name}}</b></p></a><br>
                                 @endforeach
                @else
                <p>Data not available</p>
                @endif

                            </div>
                            <!-- <div style="text-align:center;z-index: 100;">
                            <a href=""><img style="" src="images/gp.png"></a>
                        </div> -->
                        </div>
                    </div>
                    

                    <!-- <div class="col-lg-3"> 
                    <br>
                    <div class="card">
                        <img src="images/v1.png" alt="Avatar" style="width:100%">
                        <div class="container">
                            <h2><b>Vegetables</b></h2>
                            
                        </div>
                    </div>
                </div> -->
                </div>
            </div>
        </section>
        <br><br>
        <div class="container">
            <p style="color:#67bf09; text-align: center;font-size:50px;font-weight: bolder;">Our Trending Organic &
                Fresh Products</p>
            <p style="font-size: 20px;text-align: center;">Lorem ipsum dolor sit amet consectetur adipiscing elit cursus
                tristique, fusce est aptent curabitur sociis conubia leo cum diam, hendrerit at maecenas ultrices class
                mattis per mi.</p>
        </div>

        <div class="products-box">
            <div class="container">

                <div style="text-align:center;" class="row">
                    <div class="col-lg-12">
                        <div class="special-menu">
                            <div class="button-group filter-button-group">
                                <button class="active" data-filter="*"><b>All</b></button>
                                <button data-filter=".top-featured" class=""><b>Top featured</b></button>
                                <button data-filter=".best-seller" class=""><b>Best seller</b></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row special-list" style="position: relative; height: 1286.59px;">
                    @if(count($products)>0)
                        @foreach($products as $product)
                     <div class="col-lg-3 col-md-6 special-grid best-seller"
                        style="position: absolute; left: 0px; top: 0px;">
                        <div style="margin:10px;" class="card">
                            @php $images = explode(',',$product->feature_image); @endphp
                            <img src="{{ asset('uploads/products/images/'.$images[0])}}" alt="Avatar" style="width:100%">
                            <div class="container">
                                 <p style="font-size:30px;" class="greencolor"><b>{{$product->title}}</b></p>
                                <p style="font-size:30px;" class="greencolor"><b>${{$product->price}} &nbsp;<p
                                            style=" text-decoration: line-through;">$25 </p></b></p>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <br><br>
                            </div>

                        </div>
                    </div>

                @endforeach
                                @else
                                <strong>Data not available</strong>
                                @endif
                    <br><br>
                   
                    <br><br>


                </div>
                <!-- <div style="text-align: center;">
        <button style="border:1px solid gray" class="btn btn-default">Load More</button>
    </div> -->
            </div>
        </div>
        <div style="text-align:center">
            <button class="button button4">More Products</button>
        </div><br>
        <section style="background-image: url('{{ asset('web-layouts/assets4/images/bg.png')}}');border-bottom: 10px solid #67bf09; ">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="parent">
                                        <img src="{{ asset('web-layouts/assets4/images/b1.png')}}" style="margin-top: 25px;" class="widthimage">
                                        <img src="{{ asset('web-layouts/assets4/images/b2.png')}}" style=" margin-top: 25px;" class="widthimage">
                                        <img src="{{ asset('web-layouts/assets4/images/b4.png')}}" style=" margin-top: 25px;" class="widthimage">
                                        <img src="{{ asset('web-layouts/assets4/images/b3.png')}}" style="margin-top: 25px;" class="widthimage">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <p style="color:#67bf09; font-size: 30px; margin-top: 50px;">Why Choose Us?</p>
                                    <p
                                        style="color:#67bf09; line-height: 85px;font-size:70px;font-weight: bolder;letter-spacing: -3px; font-family: 'Anton', sans-serif;">
                                        Our Services</p>

                                    <br>
                                    <p style="color:#67bf09; font-size: 15px" ;="">Lorem ipsum dolor sit amet
                                        consectetur adipiscing elit cras, pretium curabitur morbi venenatis tristique
                                        inceptos velit per primis, eleifend tincidunt curae neque pellentesque a sed.
                                        Sed laoreet porta est volutpat ultrices rutrum cubilia hac felis, vehicula risus
                                        urna euismod iaculis cursus sociis dis, fames accumsan augue velit ante justo
                                        tempor nascetur. </p><br><br>
                                    <p style="color:#67bf09; font-size: 15px" ;="">Lorem ipsum dolor sit amet
                                        consectetur adipiscing elit cras, pretium curabitur morbi venenatis tristique
                                        inceptos velit per primis, eleifend tincidunt curae neque pellentesque a sed.
                                        Sed laoreet porta est volutpat ultrices rutrum cubilia hac felis, vehicula risus
                                        urna euismod iaculis cursus sociis dis, fames accumsan augue velit ante justo
                                        tempor nascetur. </p>
                                    <br><br>



                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </section>
        <br>
        <section style="background-color:whitesmoke;" class="testimonial text-center">
            <p style="font-weight:bolder;font-size: 40px; text-align: center;color: green;">Testimonial</p>

            <div class="container">


                <div id="testimonial4"
                    class="carousel slide testimonial4_indicators testimonial4_control_button thumb_scroll_x swipe_x"
                    data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000">

                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <div class="testimonial4_slide">


                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                    unknown printer took a galley of type and scrambled it to make a type specimen book.
                                </p>
                                <img src="https://i.ibb.co/8x9xK4H/team.jpg" class="img-circle img-responsive" /><br>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="testimonial4_slide">

                                <img src="https://i.ibb.co/8x9xK4H/team.jpg" class="img-circle img-responsive" /><br>
                                <h4>Client 2</h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                    unknown printer took a galley of type and scrambled it to make a type specimen book.
                                </p>

                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="testimonial4_slide">

                                <img src="https://i.ibb.co/8x9xK4H/team.jpg" class="img-circle img-responsive" /><br>
                                <h4>Client 3</h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                    unknown printer took a galley of type and scrambled it to make a type specimen book.
                                </p>

                            </div>
                        </div>
                    </div>
                    <a  class="carousel-control-prev" href="#testimonial4" data-slide="prev">
                    <span style="color:black;" class="carousel-control-prev-icon"></span>
                </a>
                <a  class="carousel-control-next" href="#testimonial4" data-slide="next">
                    <span style="color:black" class="carousel-control-next-icon"></span>
                </a>
                </div>
            </div>
        </section>




        <section style="padding: 65px 0px 55px 0px;" class="bg-img text-center">


            </div>
            <div class="container">
                <div class="">

                    <h2 style="text-align:center;">
                        <strong>Subscribe to Our Newsletter</strong>
                    </h2><br>
                    <h3 style="text-align:center;" class="font-alt">Get e-mail updates about our latest shops and
                        special offers</h3>
                </div>
                <div class="signup">
                    <form>
                        <br>
                        <input type="email" id="email-signup" placeholder="Enter your email here...." required>
                        <input type="submit" value="Subscribe" id="btns">
                    </form>
                </div>
            </div>

            <br><br>

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