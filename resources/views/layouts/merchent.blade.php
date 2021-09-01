<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- SEO Meta Description -->
        <meta name="description" content="">
        <meta name="author" content="Themeland">

        <!-- Title  -->
        <title>Molicule</title>

        <!-- Favicon  -->
        <link rel="icon" href="{{ asset('assets/img/favicon.png') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- ***** All CSS Files ***** -->
        <!-- Style css -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <!-- Responsive css -->
        <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
        
            @yield('style')
            @stack('custom_css')
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
       </style>
    </head>
<body class="homepage-3">

    <div id="preloader" style="display: none;">
            <div class="loader_spinner_inside"></div>
            <span class="loader_spinner_text">Please Wait...</span>
    </div>
    <!--====== Scroll To Top Area Start ======-->
    <div id="scrollUp" title="Scroll To Top">
        <i class="fas fa-arrow-up"></i>
    </div>
    <!--====== Scroll To Top Area End ======-->

    <div class="main overflow-hidden">
        @include('merchent.header')
        @yield('content')
        @include('merchent.footer')
    </div>
        <!-- ***** All jQuery Plugins ***** -->

    <!-- jQuery(necessary for all JavaScript plugins) -->
    <script src="{{ asset('assets/js/jquery/jquery-3.5.1.min.js') }}"></script>

    <!-- Bootstrap js -->
    <script src="{{ asset('assets/js/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap/bootstrap.min.js') }}"></script>

    <!-- Plugins js -->
    <script src="{{ asset('assets/js/plugins/plugins.min.js') }}"></script>

    <!-- Active js -->
    <script src="{{ asset('assets/js/active.js') }}"></script>
    @yield('script')
    @stack('custom_js')
    
</body>
</html>
