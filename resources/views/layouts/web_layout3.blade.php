<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Site Metas -->
    <title>Ecommerce</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{ asset('web-layouts/assets3/images/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('web-layouts/assets3/images/apple-touch-icon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('web-layouts/assets3/css/bootstrap.min.css')}}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('web-layouts/assets3/css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('web-layouts/assets3/css/responsive.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('web-layouts/assets3/css/custom.css')}}">

    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->


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


        .first-nav {
            background: white;
        }

        .second-nav {

            color: black;
            background-color: white;
        }

        .navcss {
            margin-top: 20px;
            margin-left: auto !important;
        }

        #submitsearch {
            border: 1px solid rgb(138, 134, 134);
            margin-left: -82px;
            padding: 5px;
            border-radius: 19px;
            cursor: pointer;
            padding-left: 10px;
            padding-right: 8px;
            padding-top: 4px;

            display: none;
            box-shadow: 0 0 1px black;
            margin-right: 110px;
        }

        #searchInput {
            width: 100%;

            border: 1px solid #000;
            border-radius: 30px;
            /*font-size: 16px;*/
            background-color: white;
            background-image: url('https://cdn2.iconfinder.com/data/icons/ios-7-icons/50/search-24.png');

            background-position: 10px 7px;
            background-repeat: no-repeat;
            padding: 8px 20px 8px 40px;
            -webkit-transition: width 0.8s ease-in-out;
            transition: width 0.8s ease-in-out;
            outline: none;
            opacity: 0.9;

        }

        li {
            font-size: 20px;
            color: white;
        }

        h1 {
            color: white;
        }
    </style>

    @stack('custom_css')
</head>

<body>

     <nav class="navbar navbar-expand-sm bg-faded navbar-light  first-nav">
        <div class="container">
            <div class="row">
                <a href="#" class="navbar-brand">
                    <p style="font-size: 30px;color: #82e023; margin-top: 10px;">LOGO</p>
                </a>
                <div class="navbar-brand navcss" id="navbar1">
                    <div class='navbar-brand container'>
                        <input style="height: 40px;" type="text" id="searchInput" placeholder="Search..">
                        <div id='submitsearch' style="">
                            <span>Search</span>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <hr>
    <!-- 
           dark
           -->
    <nav style=" margin-top: -15px;" class="navbar navbar-expand-sm navbar-dark sticky-top second-nav">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar2">
                <span class="fas fa-bars"></span>
            </button>
            <!-- <a href="/" class="navbar-brand">Home</a> -->
            <div class="navbar-collapse collapse" id="navbar2">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('index')}}">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('products')}}">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('blogs')}}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('about')}}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contact')}}">Contact</a>
                    </li>

                </ul>
                <!-- <ul class="navbar-nav">

            </ul>
            <ul class="navbar-nav">

            </ul> -->

                <ul class="navbar-nav ml-auto">
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
                                       <li class="nav-item">
                                                 <a class="nav-link" href="{{route('wishlist')}}" target="_blank"><i style="color:#b4cf10;" class="fa fa-heart" aria-hidden="true"></i>&nbsp;&nbsp;</a>
                                               </li>
                                        <li style="" class="nav-item">
                                                 <a class="nav-link" href="{{route('shopping.cart')}}"><i style="color:#b4cf10;" class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;(2)</a>
                                               </li>
                </ul>

            </div>
        </div>
    </nav>

        @yield('content')
        <div id="preloader" style="display: none;">
            <div class="loader_spinner_inside"></div>
            <span class="loader_spinner_text">Please Wait...</span>
        </div>

     <footer>
        <div class="footer">
            <div class="container">
                <div class="row">


                    <div class="col-lg-2 pt-4">
                        <h1>ABOUT US</h1>
                        <p style="color: white;">Lorem ipsum dolor sit amet consectetur adipiscing elit magna, Lorem
                            ipsum dolor sit amet consectetur adipiscing elit magna,</p>
                    </div>
                    <div class="col-lg-3 pt-4">
                        <h1>CUSTOMER CARE</h1>
                        <ul class="footerlinks">

                            <li style="color:white">CONTACT</li>
                            <li style="color:white">RETURN/EXCHANGE</li>
                            <li style="color:white">GIFT VOUCHERS</li>
                            <li style="color:white">WISHLIST</li>
                            <li style="color:white">SPECIAL</li>
                            <li style="color:white">CUSTOMER SERVICE</li>
                            <li style="color:white">SITE MAPS</li>
                        </ul>
                    </div>
                    <div class="col-lg-2 pt-4">
                        <h1>INFORMATION</h1>
                        <ul class="footerlinks">
                            <li style="color:white">ABOUT US</li>
                            <li style="color:white">DELIVERY INFORMATION</li>
                            <li style="color:white">PRIVACY POLICY</li>
                            <li style="color:white">SUPPORT</li>
                            <li style="color:white">ORDER TRACKING</li>


                        </ul>
                    </div>
                    <div class="col-lg-2 pt-4">
                        <h1 style="text-align:center;">NEWS</h1>
                        <ul class="footerlinks">

                            <li style="color:white">BLOG</li>
                            <li style="color:white">PRESS</li>
                            <li style="color:white">EXHIBITIONS</li>
                        </ul>
                    </div>
                    <div class="col-lg-3 pt-4">
                        <h1 style="text-align:center;">CONTACT INFORMATION</h1>
                        <ul class="footerlinks">
                            <li style="color:white">291 SOUTH 21TH STREET</li>
                            <li style="color:white">+1235235598</li>
                            <li style="color:white">logoinfo5212@gmail.com</li>

                        </ul>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- END OF FOOTER -->
    </footer>
    <!-- End Footer  -->
    <script src="{{ asset('web-layouts/assets3/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{ asset('web-layouts/assets3/js/popper.min.js')}}"></script>
    <script src="{{ asset('web-layouts/assets3/js/bootstrap.min.js')}}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{ asset('web-layouts/assets3/js/jquery.superslides.min.js')}}"></script>
    <script src="{{ asset('web-layouts/assets3/js/bootstrap-select.js')}}"></script>
    <script src="{{ asset('web-layouts/assets3/js/inewsticker.js')}}"></script>
    <script src="{{ asset('web-layouts/assets3/js/bootsnav.js')}}"></script>
    <script src="{{ asset('web-layouts/assets3/js/images-loded.min.js')}}"></script>
    <script src="{{ asset('web-layouts/assets3/js/isotope.min.js')}}"></script>
    <script src="{{ asset('web-layouts/assets3/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('web-layouts/assets3/js/baguetteBox.min.js')}}"></script>
    <script src="{{ asset('web-layouts/assets3/js/form-validator.min.js')}}"></script>
    <script src="{{ asset('web-layouts/assets3/js/contact-form-script.js')}}"></script>
    <script src="{{ asset('web-layouts/assets3/js/custom.js')}}"></script>
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