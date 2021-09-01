<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Ecommerce</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <meta name="author" content="">

    <!-- Site Icons -->
    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{ asset('web-layouts/assets2/images/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('web-layouts/assets2/images/apple-touch-icon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('web-layouts/assets2/css/bootstrap.min.css')}}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('web-layouts/assets2/css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('web-layouts/assets2/css/responsive.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('web-layouts/assets2/css/custom.css')}}">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<style type="text/css">
#preloader {
        position: fixed;
        left: 0;
        right: 0;
        top: 0;
        z-index: 99999;
        background-color: rgba(0, 0, 0, .5);
        height: 100vh;
        width: 100%;
        display: block;
        overflow-y: hidden;
    }
     .loader_spinner_inside {
        box-sizing: border-box;
        border: 8px solid #f3f3f3;
        border-top-color: #f3f3f3;
        border-top-style: solid;
        border-top-width: 8px;
        border-radius: 50%;
        border-top: 8px solid #3498db;
        width: 60px;
        height: 60px;
        position: absolute;
        left: 0;
        right: 0;
        margin: 0 auto;
        top: 42%;
        animation-name: spin;
        -webkit-animation: spin 1s linear infinite;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    .loader_spinner_text {
        display: block;
        margin-top: 60px;
        width: 100%;
        position: fixed;
        left: 0;
        right: 0;
        text-align: center;
        color: #fff;
        top: 44%;
    }


    .post-content {
        /* background: none repeat scroll 0 0 #FFFFFF; */
        /* opacity: 0.5; */
        top: 20%;
        left: 15%;
        position: absolute;
        color: white;
    }

    .button1 {
        height: 65px;
        width: 100%;
        max-width: 300px;
        font-size: 25px;
        /*font-family: "Hack", monospace;*/
        padding: 20px;
        line-height: 0;
        vertical-align: top;
        cursor: pointer;
        color: #fff;
        border: 0;
        border-radius: 0px 5px 5px 0px;
        background: #ff9d21;
        box-shadow: 0 4px 10px hsl(34 100% 56% / 0.6);
        transition: 0.1s ease-in;
    }

    .button1:hover {
        /*background: #d8932c;*/
        box-shadow: 0 4px 10px hsl(34 100% 56% / 0.2);
    }

    .button2 {
        height: 50px;
        width: 100%;
        max-width: 300px;
        font-size: 25px;
        /*font-family: "Hack", monospace;*/
        padding: 20px;
        line-height: 0;
        vertical-align: top;
        cursor: pointer;
        color: #fff;
        border: 0;
        border-radius: 0px 5px 5px 0px;
        background: #ff9d21;
        box-shadow: 0 4px 10px hsl(34 100% 56% / 0.6);
        transition: 0.1s ease-in;
    }

    .button2:hover {
        /*background: #d8932c;*/
        box-shadow: 0 4px 10px hsl(34 100% 56% / 0.2);
    }

    form {
        display: flex;
    }

    input {
        min-width: 235px;
        height: 65px;
        width: 100%;
        /* border-radius: 5px 0 0 5px; */
        /* background: transparent; */
        border: 1px solid #ffffff;
        padding: 16px;
        font-weight: normal;
        font-size: 25px;
        text-align: left;
        color: white;
        /* opacity: 0.5; */
    }

    .input1 {
        min-width: 225px;
        height: 50px;
        width: 100%;
        /* border-radius: 5px 0 0 5px; */
        /* background: transparent; */
        border: 1px solid #ffffff;
        padding: 16px;
        font-weight: normal;
        font-size: 25px;
        text-align: left;
        color: white;
        /* opacity: 0.5; */
    }
    #preload {
        display: none;
    }
</style>
    @stack('custom_css')

<body>
    <!-- Start Main Top -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
        <div class="container">
            <div class="d-block d-md-none d-lg-none d-xl-none">
                <a class="navbar-brand" href="#">Navbar</a>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Left -->
                <ul class="navbar-nav ">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('index')}}">Home

                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('products')}}" target="_blank">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('blogs')}}" target="_blank">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('about')}}" target="_blank">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contact')}}"
                            target="_blank">Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a style="color:orange;" class="nav-link" href="https://mdbootstrap.com/bootstrap-tutorial/"
                            target="_blank">LOGO</a>
                    </li>
                </ul>
                <ul style="" class="navbar-nav ml-auto">
                    <li style="" class="nav-item">
                        <a class="nav-link" href="#" id="livesearch" target="_blank"><i
                                class="fa fa-search" aria-hidden="true"></i></a>
                    </li>

                     <li class="nav-item">
            <a class="nav-link" href="{{route('wishlist')}}" target="_blank"><i class="fa fa-heart" aria-hidden="true"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('shopping.cart')}}" target="_blank"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;<span class="totalItem"></span></a>
          </li>
          @if (!(Auth::check()))
                                    <!-- Navbar Action Button -->
                                    <li class="toggleable nav-item">
                                        <a href="{{route('register')}}"
                                            class="nav-link btn ml-lg-auto btn-bordered-white active">
                                            Login/ Sign UP</a>
                                    </li>
                                    @else
                                    <li class="toggleable nav-item"><a href="{{route('user-profile')}}" class="nav-link"><i class="fa fa-user"
                                                aria-hidden="true"></i> {{ auth()->user()->first_name }}
                                            {{ auth()->user()->last_name }}</a></li>

                                    @endif
                </ul>

            </div>

        </div>
    </nav>

        @yield('content')
        <div class="toast" data-autohide="true" style="padding:20px;border-radius: 10px;">
            <div class="toast-body">

            </div>
        </div>
<div id="preloader" style="display: none;">
            <div class="loader_spinner_inside"></div>
            <span class="loader_spinner_text">Please Wait...</span>
        </div>
    <section style="padding: 40px 20px 40px 20px; background-color: whitesmoke;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <i style="font-size: 80px;" class="fa fa-archive" aria-hidden="true"></i><br>
                    <h2>Free Shipping Method</h2>
                    <p>Mango consectetur adipiscing elit, id accumsan gravida class curabitur cum. Mango consectetur
                        adipiscing elit, id accumsan gravida class curabitur cum. </p>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <i style="font-size: 80px;" class="fa fa-credit-card" aria-hidden="true"></i><br>
                    <h2>Secure Payment System</h2>
                    <p>Mango consectetur adipiscing elit, id accumsan gravida class curabitur cum. Mango consectetur
                        adipiscing elit, id accumsan gravida class curabitur cum. </p>

                </div>
                <div class="col-lg-4 col-sm-12">
                    <i style="font-size: 80px;" class="fa fa-phone-square" aria-hidden="true"></i><br>
                    <h2>Online Support</h2>
                    <p>Mango consectetur adipiscing elit, id accumsan gravida class curabitur cum. Mango consectetur
                        adipiscing elit, id accumsan gravida class curabitur cum. </p>

                </div>
            </div>
        </div>
    </section>
    <section style="background-color: #4e4d4d;">
        <div style="padding: 40px 20px 40px 20px;" class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-sm-12 ">
                    <h1 style="color:white;">LOGO</h1>
                </div>
                <div class="col-lg-4 col-sm-12 ">
                     <form action="" method="post">
                        <input class="input1" type="email" name="useremail-id" id="useremail-id"
                            placeholder="Enter your Email" style="color:black">
                        <button class="button2" type="submit" id="subscribe">
                            Subscribe
                        </button>
                    </form>
                </div>
                <div class="col-lg-2 col-sm-12 ">

                </div>
                <div style="display:flex;" class="col-lg-1 col-sm-12 pt-4">
                    <!-- <i class="fa fa-facebook-f" style="font-size:36px;"></i>
                  
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                 
                  <i class="fa fa-youtube-play" aria-hidden="true"></i> -->
                  @if(!empty($socials))
                    @foreach($socials as $social)
                    @if(!empty($social->facebook))
                    <a class="nav-link" href="{{$social->facebook}}" target="_blank"><img src="{{ asset('web-layouts/assets2/images/fb.png')}}"></a>
                    @else
                    @endif
                    @if(!empty($social->youtube))
                    <a class="nav-link" href="{{$social->youtube}}" target="_blank"><img src="{{ asset('web-layouts/assets2/images/yt.png')}}"></a>
                    @else
                    @endif
                    @if(!empty($social->instagram))
                    
                    <a class="nav-link" href="{{$social->instagram}}" target="_blank"><i src="{{ asset('web-layouts/assets2/images/in.png')}}"></a>
                    @else
                    @endif
                    @endforeach
                @else
                <p>Data not available</p>
                @endif

                    </ul>
                </div>



            </div>
        </div>
        </div>
    </section>
    <!-- Start Footer  -->
    <footer>
        <div class="footer">
            <div class="contain">
                <div class="col">
                    <h1>Useful Link</h1>
                    <ul>
                         @if(!empty($pages))
                    @foreach($pages as $page)
                 
                        <li><a style="color:gray" href="user/{{($page->slug)}}">{{$page->title}}</a></li>
                             @endforeach
                             @else
                              <p>Data not available</p>
                              @endif

                    </ul>
                </div>
               <div class="col">
                    <h1></h1>
                    <ul>
                        <li></li>
                        <li>Projects</li>
                        <li>Contact</li>
                        <li>Innovation</li>
                        <li>Our Services</li>
                        <li>Testimonials</li>
                    </ul>
                </div>
                <div class="col">
                    <h1>Contact Us</h1>
                    <ul>

                        <li>Office</li>
                        @if(!empty($data))
                        <li>{{$data->about_store}}</li>
                        @else
                        <p>No data found
                        @endif
                    </ul>
                </div>
                <div class="col">
                    <h1 style="text-align:center;">Phone</h1>
                    <ul>
                        @if(!empty($user))
                        <li>{{$user->mobile_number}}</li>
                        @else
                        <p>No data found
                        @endif
                    </ul>
                </div>
                <div class="col">
                    <h1 style="text-align:center;"> Email</h1>
                    <ul>
                        @if(!empty($user))
                        <li>{{$user->email}}</li>
                        @else
                        <p>No data found
                        @endif
                    </ul>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
        <!-- END OF FOOTER -->
    </footer>
    <!-- End Footer  -->

    <!-- Start copyright  -->

    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>
    <script type="text/javascript">
        new WOW().init();

    </script>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- ALL JS FILES -->
    <script src="{{ asset('web-layouts/assets2/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{ asset('web-layouts/assets2/js/popper.min.js')}}"></script>
    <script src="{{ asset('web-layouts/assets2/js/bootstrap.min.js')}}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{ asset('web-layouts/assets2/js/jquery.superslides.min.js')}}"></script>
    <script src="{{ asset('web-layouts/assets2/js/bootstrap-select.js')}}"></script>
    <script src="{{ asset('web-layouts/assets2/js/inewsticker.js')}}"></script>
    <script src="{{ asset('web-layouts/assets2/js/bootsnav.js')}}"></script>
    <script src="{{ asset('web-layouts/assets2/js/images-loded.min.js')}}"></script>
    <script src="{{ asset('web-layouts/assets2//isotope.min.js')}}js"></script>
    <script src="{{ asset('web-layouts/assets2/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('web-layouts/assets2/js/baguetteBox.min.js')}}"></script>
    <script src="{{ asset('web-layouts/assets2/js/form-validator.min.js')}}"></script>
    <script src="{{ asset('web-layouts/assets2/js/contact-form-script.js')}}"></script>
    <script src="{{ asset('web-layouts/assets2/js/custom.js')}}"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   

    <script type="text/javascript">
    //toster
    var base_path = "{{asset('public/default_product_image.png')}}";

  $("#liveSearch").autocomplete({
        source: "{{route('livesearch')}}",
        minLength: 1,
        select: function(event, ui) {
            var label = ui.item.value;
            if (label === "no results") {
                event.preventDefault();
            } else {
                location.href = ui.item.link;
            }
        }
    });

    //otp send 
    $(document).ready(function() {
        $(".otp_send").on("click", function() {
            var mobile = $("#mobile").val();
            var formAction = "{{route('sendotp')}}";
            var formdata = new FormData();
            formdata.append('mobile_number', mobile);
            if (mobile == '') {
                showMsg('error', 'Please Enter Mobile Number');
            } else {
                var formId = "load_register";
                var formLoader = $(this).data('loader');

                $.ajax({
                    url: formAction,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    dataType: 'json',
                    data: formdata,
                    type: 'POST',
                    beforeSend: function() {
                        $('#preloader').css('display', 'inline-block');
                    },
                    error: function(xhr, textStatus) {
                        if (textStatus == 'timeout') {
                            showMsg('warning', xhr.status + ': ' + xhr.statusText);
                        } else {
                            showMsg('error', xhr.status + ': ' + xhr.statusText);
                        }
                        $('#preloader').css('display', 'none');
                    },
                    success: function(data) {
                        if (data.error) {
                            $('#preloader').css('display', 'none');
                            showMsg('error', data.msg);

                        } else {

                            if (data.user_verify) {
                                showMsg('success', data.msg);
                                location.href = "{{route('index')}}";
                            } else {
                                showMsg('success', data.msg);

                                var mobile = $("input[name=mobile_number]").val();
                                $('#last4digit').html(mobile.substring(6, 10));

                                jQuery('#otpsubmitform').show();
                                $("input[name=dig1]").focus();
                                jQuery('#regform').hide();
                                $('#timer_left').css('display', 'inline-block');
                                $('.otp_registration_resend').css('display', 'none');
                                var resendOtpTime = 30;
                                interval = setInterval(() => {
                                    if (resendOtpTime > 0) {
                                        resendOtpTime--;
                                        $('#timer_left').html("00:" + ("0" +
                                            resendOtpTime).slice(-2));
                                    } else {
                                        $('#timer_left').css('display', 'none');
                                        $('.otp_registration_resend').css('display',
                                            'inline-block');
                                        clearInterval(interval);
                                    }
                                }, 1000);

                            }
                        }
                        $('#preloader').css('display', 'none');
                    },
                    cache: false,
                    contentType: false,
                    processData: false,
                    timeout: 1111000
                });

            }

        });
    });


    //shoppingcart order ajax
    

    function shoppingCartData() {
        $.ajax({
            url: "{{route('shopping.cart')}}",
            dataType: 'json',
            type: 'GET',
            beforeSend: function() {
                notscrolly = false;
                $('#preloader').css('display', 'inline-block');
            },
            error: function(xhr) {
                showMsg('error', "Error: " + xhr.status + ": " + xhr.statusText);
                $('#preloader').css('display', 'none');
            },
            success: function(response) {
                $('#cartRender').html(response.html);
                $('.totalItem').html(response.totalItem);
                $('.subtotal').html(response.subtotal);
                $('.shipping_charge').html(response.shipping_charge);
                $('.finalTotal').html(response.final_amount);
                $('#preloader').css('display', 'none');
            }
        });
    }
    </script>

    @stack('custom_js')
</body>

</html>