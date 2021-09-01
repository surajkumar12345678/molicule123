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

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<style type="text/css">
    .post-content {
        /* background: none repeat scroll 0 0 #FFFFFF; */
        /* opacity: 0.5; */
        top: 35%;
        left: 65%;
        position: absolute;
        color: white;
    }

    .button1 {
        height: 50px;
        width: 78%;
        max-width: 286px;
        font-size: 25px;
        /* font-family: "Hack", monospace; */
        padding: 0px;
        line-height: 0;
        vertical-align: top;
        cursor: pointer;
        color: #fff;
        border: 0;
        border-radius: 0px 5px 5px 0px;
        background: #007bff;
        /* box-shadow: 0 4px 10px hsl(34deg 100% 56% / 60%); */
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
        /* font-family: "Hack", monospace; */
        padding: 20px;
        line-height: 0;
        vertical-align: top;
        cursor: pointer;
        color: #fff;
        border: 0;
        border-radius: 0px 5px 5px 0px;
        background: #007bff;
        /* box-shadow: 0 4px 10px hsl(34deg 100% 56% / 60%); */
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
        min-width: 270px;
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

    .input1 {
        min-width: 230px;
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
    @stack('custom_css')

<body>
    <!-- Start Main Top -->


    <nav class="navbar fixed-top navbar-expand-lg scrolling-navbar" id="mobnavhere">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                <span class="fas fa-bars"></span>
            </button>


            <!-- Links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Left -->
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a style="color:#007bff;" class="nav-link" href="https://mdbootstrap.com/bootstrap-tutorial/"
                            target="_blank">LOGO</a>
                    </li>
                </ul>
                <div class="d-block d-xs-block d-sm-block d-lg-none d-md-none d-xl-none">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home
    
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://mdbootstrap.com/material-design-for-bootstrap/"
                                target="_blank">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://mdbootstrap.com/material-design-for-bootstrap/"
                                target="_blank">Pages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://mdbootstrap.com/getting-started/" target="_blank">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://mdbootstrap.com/bootstrap-tutorial/"
                                target="_blank">Contact</a>
                        </li>
                    </ul>
                </div>

                <ul style="" class="navbar-nav ml-auto">
                    <li style="" class="nav-item">
                        <a class="nav-link" href="https://mdbootstrap.com/bootstrap-tutorial/" target="_blank"><i
                                class="fa fa-search" aria-hidden="true"></i></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="https://mdbootstrap.com/bootstrap-tutorial/" target="_blank"><i
                                class="fa fa-heart" aria-hidden="true"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://mdbootstrap.com/bootstrap-tutorial/" target="_blank"><i
                                class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                    </li>
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
   
        <script src="{{ asset('web-layouts/assets4/js/jquery-3.2.1.min.js')}}"></script>
        <script src="{{ asset('web-layouts/assets4/js/popper.min.js')}}"></script>
        <script src="{{ asset('web-layouts/assets4/js/bootstrap.min.js')}}"></script>
        <!-- ALL PLUGINS -->
        <script src="{{ asset('web-layouts/assets4/js/jquery.superslides.min.js')}}"></script>
        <script src="{{ asset('web-layouts/assets4/js/bootstrap-select.js')}}"></script>
        <script src="{{ asset('web-layouts/assets4/js/inewsticker.js')}}"></script>
        <script src="{{ asset('web-layouts/assets4/js/bootsnav.js')}}"></script>
        <script src="{{ asset('web-layouts/assets4/js/images-loded.min.js')}}"></script>
        <script src="{{ asset('web-layouts/assets4/js/isotope.min.js')}}"></script>
        <script src="{{ asset('web-layouts/assets4/js/owl.carousel.min.js')}}"></script>
        <script src="{{ asset('web-layouts/assets4/js/baguetteBox.min.js')}}"></script>
        <script src="{{ asset('web-layouts/assets4/js/form-validator.min.js')}}"></script>
        <script src="{{ asset('web-layouts/assets4/js/contact-form-script.js')}}"></script>
        <script src="{{ asset('web-layouts/assets4/js/custom.js')}}"></script>
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
    <script type="text/javascript">
    $(document).ready(function() {
    // executes when HTML-Document is loaded and DOM is ready
    // breakpoint and up
    $(window).resize(function(){
    if ($(window).width() >= 980){
    // when you hover a toggle show its dropdown menu
    $(".navbar .dropdown-toggle").hover(function () {
    $(this).parent().toggleClass("show");
    $(this).parent().find(".dropdown-menu").toggleClass("show");
    });
    // hide the menu when the mouse leaves the dropdown
    $( ".navbar .dropdown-menu" ).mouseleave(function() {
    $(this).removeClass("show");
    });
    // do something here
    }
    });
    // document ready
    });
    /* JS for demo only */
    var colors = ['1abc9c', '2c3e50', '2980b9', '7f8c8d', 'f1c40f', 'd35400', '27ae60'];
    colors.each(function (color) {
    $$('.color-picker')[0].insert(
    '<div class="square" style="background: #' + color + '"></div>'
    );
    });
    $$('.color-picker')[0].on('click', '.square', function(event, square) {
    background = square.getStyle('background');
    $$('.custom-dropdown select').each(function (dropdown) {
    dropdown.setStyle({'background' : background});
    });
    });
    /*
    * Original version at
    * http://red-team-design.com/making-html-dropdowns-not-suck
    */
    </script>
    @stack('custom_js')
</body>

</html>