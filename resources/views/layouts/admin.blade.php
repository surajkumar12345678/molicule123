<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Admin Dashboard</title>
  <meta name="description" content="Admin, Dashboard, Bootstrap, Bootstrap 4, Angular, AngularJS" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- for ios 7 style, multi-resolution icon of 152x152 -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
  <link rel="icon" href="{{ asset('assets/images/logo.png') }}">
  <meta name="apple-mobile-web-app-title" content="Flatkit">
  <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="icon" sizes="196x196" href="{{ asset('assets/images/logo.png') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- style -->
  <link rel="stylesheet" href="{{ asset('assets/animate.css/animate.min.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('assets/glyphicons/glyphicons.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('assets/material-design-icons/material-design-icons.css') }}" type="text/css" />

  <link rel="stylesheet" href="{{ asset('assets/bootstrap/dist/css/bootstrap.min.css') }}" type="text/css" />
  <!-- build:css assets/styles/app.min.css -->
  <link rel="stylesheet" href="{{ asset('assets/styles/app.css') }}" type="text/css" />
  <!-- endbuild -->
  <link rel="stylesheet" href="{{ asset('assets/styles/font.css') }}" type="text/css" />
  @yield('style')
  <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
<!-- CSS only -->

<link rel="stylesheet" href="{{ asset('scripts/plugins1/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet"href="{{ asset('scripts/plugins1/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('scripts/plugins1/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
<link href="{{ asset('scripts/plugins/bootstrap-toggle/bootstrap-toggle.min.css')}}" rel="stylesheet" type="text/css"/>
<!-- Ajax link -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<style>
    .toast-top-right {
        top: 70px !important;
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
.show>.dropdown-menu {
    position: absolute;
    left: -133px;
    top: 45px;
}
  </style>

</head>

<body>
  <div class="app" id="app">
    @include('admin.header')
    <div ui-view class="app-body" id="view">
        @yield('content')
    </div>
      <!-- / content -->


  <!-- / -->

<!-- ############ LAYOUT END-->
</div>

<div id="preloader" style="display: none;">
  <div class="loader_spinner_inside"></div>
  <span class="loader_spinner_text">Please Wait...</span>
</div>

     <!-- build:js scripts/app.php.js -->
<!-- jQuery -->

<script src="{{ asset('libs/jquery/jquery/dist/jquery.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('libs/jquery/tether/dist/js/tether.min.js') }}"></script>
<script src="{{ asset('libs/jquery/bootstrap/dist/js/bootstrap.js') }}"></script>


<!-- core -->
<script src="{{ asset('libs/jquery/underscore/underscore-min.js') }}"></script>
<script src="{{ asset('libs/jquery/jQuery-Storage-API/jquery.storageapi.min.js') }}"></script>
<script src="{{ asset('libs/jquery/PACE/pace.min.js') }}"></script>

<script src="{{ asset('scripts/config.lazyload.js') }}"></script>

<script src="{{ asset('scripts/palette.js') }}"></script>
<script src="{{ asset('scripts/ui-load.js') }}"></script>
<script src="{{ asset('scripts/ui-jp.js') }}"></script>
<script src="{{ asset('scripts/ui-include.js') }}"></script>
<script src="{{ asset('scripts/ui-device.js') }}"></script>
<script src="{{ asset('scripts/ui-form.js') }}"></script>
<script src="{{ asset('scripts/ui-nav.js') }}"></script>
<script src="{{ asset('scripts/ui-screenfull.js') }}"></script>
<script src="{{ asset('scripts/ui-scroll-to.js') }}"></script>
<script src="{{ asset('scripts/ui-toggle-class.js') }}"></script>

<script src="{{ asset('scripts/app.js') }}"></script>


<script src="{{ asset('libs/jquery/jquery-pjax/jquery.pjax.js') }}"></script>
<script src="{{ asset('scripts/plugins1/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('scripts/plugins1/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('scripts/plugins1/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('scripts/plugins1/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('scripts/plugins1/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script src="{{ asset('scripts/plugins/bootstrap-toggle/bootstrap-toggle.min.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>

@stack('custom_js')
<script>
$(document).ready(function() {
  // show the alert
  window.setTimeout(function() {
      $(".alert").show(5, function() {
          toastr.options = {
              "closeButton": true,
              "newestOnTop": true,
              "positionClass": "toast-top-right"
          };
          
      });
  }, 10);
});

</script>

<script src="{{ asset('scripts/ajax.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</body>
</html>


