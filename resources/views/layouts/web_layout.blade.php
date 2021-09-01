<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- SEO Meta Description -->
    <meta name="description" content="">
    <meta name="author" content="Themeland">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title  -->
    <title>Molicule</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Style css -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="{{ asset('web-layouts/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('web-layouts/assets/css/custom_bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('web-layouts/assets/css/normalize.css')}}">
    <link rel="stylesheet" href="{{ asset('web-layouts/assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{ asset('web-layouts/assets/css/elegant.css')}}">
    <link rel="stylesheet" href="{{ asset('web-layouts/assets/css/animate.css')}}">
    <!-- <link rel="stylesheet" href="assets/css/custom.scss"> -->
    <link rel="stylesheet" href="{{ asset('web-layouts/assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{ asset('web-layouts/assets/css/scroll.css')}}">
    <link rel="stylesheet" href="{{ asset('web-layouts/assets/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{ asset('web-layouts/assets/css/jquery.fancybox.min.css')}}">
    <link rel="shortcut icon" href="{{ asset('web-layouts/assets/images/shortcut_logo.png')}}">

    <!-- Responsive css -->
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
    </style>
    <style>
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



    .toast {
        position: fixed;
        padding: 5px;
        bottom: -100px;
        left: 50%;
        transition: 0.3s;
        transform: translateX(-50%);
        background: #333;
        color: #fff;
        font-size: 16px;
        padding: 16px 36px !important;
        text-align: center;
        width: auto;
        z-index: 9999;
    }

    .toast-body {
        display: flex;
        align-items: center;
    }

    .toast i {
        margin-right: 10px;
        font-size: 20px;
    }

    .toast i.green {
        color: #26bc4e;
    }

    .toast i.red {
        color: #ff4343;
    }

    .toast i.warning {
        color: #f0ad4e;
    }

    .toast.show {
        bottom: 30px;
    }

    .load-btn {
        border: 3px solid #fff;
        -webkit-animation: spin 1s linear infinite;
        animation: spin 1s linear infinite;
        border-top: 3px solid #007bff;
        border-radius: 50%;
        width: 20px;
        height: 20px;
    }


    /* Safari */

    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .load-btn-footer {
        border: 3px solid #fff;
        -webkit-animation: spinfooter 1s linear infinite;
        animation: spinfooter 1s linear infinite;
        border-top: 3px solid #007bff;
        border-radius: 50%;
        width: 12px;
        height: 12px;
    }


    /* Safari */

    @-webkit-keyframes spinfooter {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spinfooter {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .user_profile {
        position: absolute;
        right: auto;
        left: auto;
        margin-top: -23px;
    }

    #preload {
        display: none;
    }
    </style>
    @stack('custom_css')

</head>

<body>
    <div id="main">
        <header class="pink">
            <nav class="navigation d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-2"><a class="logo" href="{{route('index')}}"><img
                                    src="{{ asset('web-layouts/assets/images/logo.png')}}" alt=""></a></div>
                        <div class="col-10">
                            <div class="navgition-menu d-flex align-items-center justify-content-center">
                                <ul class="mb-0">
                                    <li class="toggleable"> <a class="menu-item active"
                                            href="{{route('index')}}">Home</a>

                                    </li>
                                    <li class="toggleable"> <a class="menu-item" href="{{route('products')}}">Shop</a>

                                    </li>
                                    <li class="toggleable"><a class="menu-item" href="{{route('blogs')}}">Blog</a>

                                    </li>
                                    <li class="toggleable"> <a class="menu-item" href="#">Pages</a>

                                    </li>
                                    <li class="toggleable"><a class="menu-item" href="{{route('about')}}">About us</a>
                                    </li>
                                    <li class="toggleable"><a href="{{route('wishlist')}}"><i class="fa fa-heart"
                                                aria-hidden="true"></i></a></li>
                                    <li class="toggleable"><a href="{{route('shopping.cart')}}"><i
                                                class="fa fa-shopping-cart" aria-hidden="true"></i>(<span
                                                class="totalItem">{{$totalItem}}</span>)</a></li>
                               
                                                @if (!(Session::get('user_id')))
                                
                                   <!-- Navbar Action Button -->
                                    <li class="toggleable">
                                        <a href="{{route('register')}}"
                                            class="btn ml-lg-auto btn-bordered-white active">
                                            Login/ Sign UP</a>
                                    </li>
                                    @else
                                    <li class="toggleable"><a href="{{route('user-profile')}}"><i class="fa fa-user"
                                                aria-hidden="true"></i>
                                                  
                                                {{ Session::get('user_firstname') }}
                                                {{ Session::get('user_lastname') }}   
                                                </a>
                                              
                                        </li>

                                    @endif
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </nav>
            <div id="mobile-menu">
                <div class="container">
                    <div class="row">
                        <div class="col-3">
                            <div class="mobile-menu_block d-flex align-items-center"><a class="mobile-menu--control"
                                    href="#"><i class="fas fa-bars"></i></a>
                                <div id="ogami-mobile-menu">
                                    <button class="no-round-btn" id="mobile-menu--closebtn">Close menu</button>
                                    <div class="mobile-menu_items">
                                        <ul class="mb-0 d-flex flex-column">
                                            <li class="toggleable"> <a class="menu-item active"
                                                    href="{{route('index')}}">Home</a><span
                                                    class="sub-menu--expander"><i class="icon_plus"></i></span>

                                            </li>
                                            <li class="toggleable"><a class="menu-item"
                                                    href="{{route('products')}}">Shop</a><span
                                                    class="sub-menu--expander"><i class="icon_plus"></i></span>

                                            </li>
                                            <li class="toggleable"> <a class="menu-item" href="{{route('blogs')}}">Blog</a>
                                                
                                            </li>
                                            <li class="toggleable"><a class="menu-item" href="#">Pages</a><span
                                                    class="sub-menu--expander"><i class="icon_plus"></i></span>

                                            </li>
                                        </ul>
                                    </div>
                                    <div class="mobile-login">
                                        <h2>My account</h2><a href="login.php">Login</a><a
                                            href="register.php">Register</a>
                                    </div>
                                    <div class="mobile-social"><a href=""><i class="fab fa-facebook-f"> </i></a><a
                                            href=""><i class="fab fa-twitter"></i></a><a href=""><i
                                                class="fab fa-invision"> </i></a><a href=""><i
                                                class="fab fa-pinterest-p"> </i></a></div>
                                </div>
                                <div class="ogamin-mobile-menu_bg"></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mobile-menu_logo text-center d-flex justify-content-center align-items-center">
                                <a href=""><img src="assets/images/logo.png" alt=""></a></div>
                        </div>
                        <div class="col-3">
                            <div class="mobile-product_function d-flex align-items-center justify-content-end"><a
                                    class="function-icon icon_heart_alt" href="wishlist.php"></a><a
                                    class="function-icon icon_bag_alt" href="shop_cart.php"></a></div>
                        </div>
                    </div>
                </div>
            </div>

        </header>





        @yield('content')

        <div class="toast" data-autohide="true" style="padding:20px;border-radius: 10px;">
            <div class="toast-body">

            </div>
        </div>
        <div id="preloader" style="display: none;">
            <div class="loader_spinner_inside"></div>
            <span class="loader_spinner_text">Please Wait...</span>
        </div>
        <footer style="background-color: #ebebeb;padding:20px 20px 20px 20px;" class="pink">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 col-lg-3 text-sm-center text-md-left">
                        <div class="footer-logo"><img src="{{ asset('web-layouts/assets/images/logo.png')}}" alt="">
                        </div>
                        <div class="footer-contact">
                            <p>Address: 60-49 Road 11378</p>
                            <p>Phone: +65 11.188.888</p>
                            <p>info.deercreative@gmail.com</p>
                        </div>

                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-lg-3 text-sm-center text-md-left">
                                <div class="footer-quicklink">
                                    <h5 style="color: blue ;">Useful Links</h5><a href="#">About us</a><a
                                        href="#">Secure Shopping</a><a href="#">Delivery Location</a><a href="#">Privacy
                                        Policy</a><a href="#">Who we are</a>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3 text-sm-center text-md-left">
                                <div class="footer-quicklink">
                                    <h5></h5><a href="#">Projects</a><a href="#">Contact</a><a href="#">Innovation</a><a
                                        href="#">Our Services</a><a href="#">Testimonials</a>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-6" style="text-align:end;">
                                <!-- Footer Items -->
                                <div class="footer-items">
                                    <!-- Footer Title -->
                                    <h3 style="color:#1f85ec;" class="footer-title text-uppercase mb-2">Join Our
                                        Newsletter Now</h3>
                                    <p class="mb-2 sub-title">Get E-mail updates about our latest shop and special
                                        offers</p>
                                    <form action="" method="post">
                                        <div class="input-group mb-3">
                                            <input style="" type="email" class="form-control"
                                                placeholder="Enter your Email">
                                            <div class="input-group-append">
                                                <div style="background-color:#1F85EC;color: white;"
                                                    class="input-group-text">
                                                    Subscribe

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="footer-social"><a class="round-icon-btn pink" href=""><i
                                                class="fab fa-facebook-f"> </i></a><a class="round-icon-btn pink"
                                            href=""><i class="fab fa-twitter"></i></a><a class="round-icon-btn pink"
                                            href=""><i class="fab fa-invision"> </i></a><a class="round-icon-btn pink"
                                            href=""><i class="fab fa-pinterest-p"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </footer>

        <!--====== Modal Responsive Menu Area End ======-->
    </div>
    <!-- ***** All jQuery Plugins ***** -->
    <!-- jQuery(necessary for all JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <!-- Bootstrap js -->
    <script src="{{ asset('web-layouts/assets/js/bootstrap/popper.min.js')}}"></script>
    <script src="{{ asset('web-layouts/assets/js/bootstrap/bootstrap.min.js')}}"></script>
    <!-- Plugins js -->
    <script src="{{ asset('web-layouts/assets/js/plugins/plugins.min.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('web-layouts/assets/js/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('web-layouts/assets/js/jquery.countdown.min.js')}}"></script>
    <script src="{{ asset('web-layouts/assets/js/slick.min.js')}}"></script>
    <script src="{{ asset('web-layouts/assets/js/jquery.easing.js')}}"></script>
    <script src="{{ asset('web-layouts/assets/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{ asset('web-layouts/assets/js/jquery.zoom.min.js')}}"></script>
    <script src="{{ asset('web-layouts/assets/js/parallax.js')}}"></script>
    <script src="{{ asset('web-layouts/assets/js/jquery.fancybox.js')}}"></script>
    <script src="{{ asset('web-layouts/assets/js/numscroller-1.0.js')}}"></script>
    <script src="{{ asset('web-layouts/assets/js/vanilla-tilt.min.js')}}"></script>
    <script src="{{ asset('web-layouts/assets/js/main.js')}}"></script>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
    //toster
    var base_path = "{{asset('public/default_product_image.png')}}";

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