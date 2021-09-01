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
    <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{ asset('web-layouts/assets5/images/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('web-layouts/assets5/images/apple-touch-icon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('web-layouts/assets5/css/bootstrap.min.css')}}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('web-layouts/assets5/css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('web-layouts/assets5/css/responsive.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('web-layouts/assets5/css/custom.css')}}">

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
        background: #6dd300;
        /*box-shadow: 0 4px 10px hsl(34 100% 56% / 0.6);*/
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
        min-width: 350px;
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
        min-width: 232px;
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
</style>

<body>
    <!-- Start Main Top -->
    <nav class="navbar navbar-expand-sm bg-faded navbar-light  first-nav">





        <div class="container">
            <a class="navbar-brand " href="#">
                <p style="font-size: 30px;color: #82e023;">LOGO</p>
            </a>

            <!-- Links -->
            <ul class="navbar-nav mx-auto">
                <div class="wrapper6 ">
                    <div class="searchBar">
                        <input id="searchQueryInput" type="text" name="searchQueryInput"
                            placeholder="I am Searching for..." value="" />
                        <button id="searchQuerySubmit" type="submit" name="searchQuerySubmit">
                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                <path fill="#666666"
                                    d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="toggleable nav-item">
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

                <li>
                    <span class="custom-dropdown big">
                        <!-- <i style="color:white;font-size: 25px;" class="fa fa-list" aria-hidden="true"></i> -->
                        <a href="{{route('wishlist')}}"><i class="fa fa-heart" aria-hidden="true"></i> &nbsp;&nbsp;</a>|&nbsp;&nbsp;
                            <a href="{{route('shopping.cart')}}"><i
                                class="fa fa-shopping-cart" aria-hidden="true"></i> &nbsp;Cart : $20.00</a>
                    </span>
                </li>
            </ul>
        </div>
    </nav>



    <hr class="bg-black">



    <nav style="" class="p-3 navbar navbar-expand-sm sticky-top second-nav" id="navbarhere">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar2">
            <span class="fas fa-bars"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbar2">

            <ul class="navbar-nav mx-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('index')}}">Home</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('products')}}">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('about')}}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contact')}}">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('blogs')}}">blog</a>
                </li>

            </ul>


            <!--   <ul class="navbar-nav">
           <li style="" class="nav-item">
                <a class="nav-link" href="#"><i style="color:#b4cf10;" class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;Cart(2)</a>
            </li>
        </ul> -->

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
    <footer>
        <div class="footer">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3 col-xl-3 pt-4">
                        <div class="">
                            <h1 class="footerhead text-white">About Us</h1>
                        </div>
                        <div class="">
                            <p class="pt-2 text-white">Lorem ipsum dolor sit amet consectetur adipiscing elit magna, Lorem
                                ipsum dolor sit amet consectetur adipiscing elit magna,</p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xs-12 col-md-2 col-lg-2 col-xl-2 pt-4">
                        <div class="">
                            <h1 class="footerhead text-white">Customer Care</h1>
                        </div>
                        <div class="">
                            <div class="">
                                <ul class="footerlinks pt-2 pl-2">
                                    <li><a href="#">Projects</a></li>
                                    <li><a href="#">Contact</a></li>
                                    <li><a href="#">Innovation</a></li>
                                    <li><a href="#">Our Services</a></li>
                                    <li><a href="#">Testimonials</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xs-12 col-md-2 col-lg-2 col-xl-2 pt-4">
                        <div class="">
                            <h1 class="footerhead text-white">Information</h1>
                        </div>
                        <div class="">
                            <ul class="footerlinks pt-2 pl-2">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">DELIVERY INFORMATION</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Support</a></li>
                                <li><a href="#">Order Tracking</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xs-12 col-md-2 col-lg-2 col-xl-2 pt-4">
                        <div class="">
                            <h1 class="footerhead text-white">News</h1>
                        </div>
                        <div class="">
                            <ul class="footerlinks pt-2 pl-2">
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Press</a></li>
                                <li><a href="#">Exhibitions</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3 col-xl-3 pt-4">
                        <div class="">
                            <h1 class="footerhead text-white">Contact Information</h1>
                        </div>
                        <div class="">
                            <ul class="footerlinks pt-2 pl-2">
                                <li>291 SOUTH 21TH STREET</li>
                                <li>+1235235598</li>
                            <li>logoinfo5212@gmail.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
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
    <!-- ALL JS FILES -->
    <script src="{{ asset('web-layouts/assets5/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{ asset('web-layouts/assets5/js/popper.min.js')}}"></script>
    <script src="{{ asset('web-layouts/assets5/js/bootstrap.min.js')}}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{ asset('web-layouts/assets5/js/jquery.superslides.min.js')}}"></script>
    <script src="{{ asset('web-layouts/assets5/js/bootstrap-select.js')}}"></script>
    <script src="{{ asset('web-layouts/assets5/js/inewsticker.js')}}"></script>
    <script src="{{ asset('web-layouts/assets5/js/bootsnav.js')}}"></script>
    <script src="{{ asset('web-layouts/assets5/js/images-loded.min.js')}}"></script>
    <script src="{{ asset('web-layouts/assets5/js/isotope.min.js')}}"></script>
    <script src="{{ asset('web-layouts/assets5/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('web-layouts/assets5/js/baguetteBox.min.js')}}"></script>
    <script src="{{ asset('web-layouts/assets5/js/form-validator.min.js')}}"></script>
    <script src="{{ asset('web-layouts/assets5/js/contact-form-script.js')}}"></script>
    <script src="{{ asset('web-layouts/assets5/js/custom.js')}}"></script>
    <script type="text/javascript">
    function showMsg(type, msg) {
        if (type == 'error') {
            $('.toast-body').html('<i class="fa fa-times-circle red" style="color:red"></i> ' + msg);
        } else if (type == 'success') {
            $('.toast-body').html('<i class="fa fa-check-circle green" style="color:green"></i> ' + msg);
        } else {
            $('.toast-body').html('<i class="fa fa-exclamation-circle warning" style="color:#d0b718"></i> ' + msg);
        }

        $(".toast").toast({
            delay: 5000
        });
        $('.toast').toast('show');
    }

    $('.toast').mouseleave(function() {
        $('.toast').toast('hide');
    });

    @if(Session::has('error'))
    showMsg('error', "{{ Session::get('error') }}")
    @elseif(Session::has('success'))
    showMsg('success', "{{ Session::get('success') }}")
    @endif
    </script>
    <script>
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