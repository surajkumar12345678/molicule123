@extends('layouts.web_layout')

@section('content')

<div class="account">
    <div class="container">
        <div class="row" id="regform">
            <div style="padding: 20px 20px 20px 20px ; background-color: whitesmoke;" class="col-12 col-md-6 mx-auto" >
                <h1 style="color:blue;" class="title">Molecule Login</h1>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>

                @endif
                <form id="login" data-loader="load_register" action="{{route('user.login')}}"
                            class="form-signin card-body" method="post" accept-charset="utf-8">
                    <label for="user-name">Mobile number *</label>
                    <input type="tel" name="mobile_number" id="mobile" value="" class="form-control" placeholder="Mobile">
                    <label for="password">Password *</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="account-method">
                        <div class="account-save">
                            <input id="savepass" type="checkbox">
                            <label for="savepass">Remember me</label>
                        </div>
                        <div class="account-forgot"><a href="#">Forget your Password</a></div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                    
                    </form>
                    <p class="text-center">OR</p><br>
                    <div class="card-body">
                        <div class="account-function ">
                            <button id="button_load_register" class="btn btn-primary btn-block otp_send"> Get an OTP on
                                        your phone <span id="load_register" class="  load-btn"
                                            style="display:none"></span></button>
                        </div>
                        <br><br>
                        <div class="account-function">
                            Dont have an account, Register here &nbsp;&nbsp;&nbsp; &nbsp;<a class="create-account"
                                href="{{route('register')}}">create an account</a>
                        </div>
                    <br><br>
                    <div class="social-auth-links text-center mt-2 mb-3">
                            <br>
                            <p>- Or Using -</p>
                            <br>
                            <a href="#" class="btn  btn-fcbk-clr">
                                <i class="fab fa-facebook mr-2"></i>
                            </a>
                            <a href="#" class="btn btn-danger golgle">
                                <i class="fab fa-google-plus mr-2"></i>
                            </a>
                            <a href="#" class="btn btn-twitter-clr">
                                <i class="fab fa-twitter mr-2"></i>
                            </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="display:none;" id="otpsubmitform">
            <div style="padding: 20px 20px 20px 20px ; background-color: whitesmoke;" class="col-12 col-md-6 mx-auto" id="regform">
                <h1 style="color:blue;" class="title">OTP form</h1>
                
                <form id="test" data-loader="load_register" action="{{route('submitotp')}}" class="form-signin"
                    method="post" accept-charset="utf-8">
                    <div class="title_sociallogin" id=""> Please enter the OTP (one-time password) to verify your
                        account. A Code has been sent to ******<span id="last4digit"></span>
                    </div>
                    <br><br><br>
                    <div class="otp-inputs text-center" id="login-input">
                        <div class="form-group col-xl-12 p-0" id="body">
                            <input type="tel" size="1" maxlength="1" name="dig1" class="otp__input inputs"
                                maxlength="1">
                            <input type="tel" size="1" maxlength="1" name="dig2" class="otp__input inputs"
                                maxlength="1">
                            <input type="tel" size="1" maxlength="1" name="dig3" class="otp__input inputs"
                                maxlength="1">
                            <input type="tel" size="1" maxlength="1" name="dig4" class="otp__input inputs"
                                maxlength="1">
                            <input type="tel" size="1" maxlength="1" name="dig5" class="otp__input inputs"
                                maxlength="1">
                            <input type="tel" size="1" maxlength="1" name="dig6" class="otp__input inputs"
                                maxlength="1">
                        </div>
                        <p class="text-center text-muted resend-code">Not received your code?
                            <span id="timer_left">00:00</span>  </p>
                            <br>
                            <a id="button_load_register" class="otp_send btn-link otp_registration_resend"
                                style="display:none"> Resend code <span id="load_register" class="load-btn"></span></a>
                      
                    </div>
                   <div class="account-function">
                        <input type="hidden" name="submitLogin" value="1">
                        <button name="signupBtn" type="submit" value="true" id=""
                            class="button_load_register btn btn-lg btn-primary btn-block signupBtn btn-theme">
                            <span style="padding-right: 9px;"> OTP Verify </span> <span id=""
                                class=" load_register load-btn" style="display:none"></span>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<!-- ***** Welcome Area End ***** -->
@endsection
@push('custom_js')

<script>
//form submit
//form submit
$("form#login").submit(function(e) {
    e.preventDefault();

    var formId = $(this).attr('id');
    var formAction = $(this).attr('action');
    var formLoader = $(this).data('loader');

    $.ajax({
        url: formAction,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        data: new FormData(this),
        type: 'post',
        dataType: 'json',
        beforeSend: function() {
            $('#preloader').css('display', 'inline-block');
        },
        error: function(xhr, textStatus) {
            if (textStatus == 'timeout') {
                showMsg('warning', xhr.status + ': ' + xhr.statusText);

            } else {
                if (xhr.status == 422) {
                    showMsg('error', 'These credentials do not match our records.');
                } else {
                    showMsg('error', xhr.status + ': ' + xhr.statusText);
                }
            }
            $('#preloader').css('display', 'none');
        },
        success: function(data) {
            if (data.error) {
                showMsg('error', data.msg);
                $('#preloader').css('display', 'none');
            } else {

                if (data.user_verify) {
                    showMsg('success', data.msg);
                    $('#preloader').css('display', 'none');
                    location.href = "{{route('index')}}";
                } else {
                    showMsg('success', data.msg);

                    var mobile = $("input[name=mobile_number]").val();
                    $('#last4digit').html(mobile.substring(6, 10));

                    jQuery('#otpsubmitform').show();
                    $("input[name=dig1]").focus();
                    jQuery('#regform').hide();

                    var resendOtpTime = 30;
                    interval = setInterval(() => {
                        if (resendOtpTime > 0) {
                            resendOtpTime--;
                            $('#timer_left').html("00:" + ("0" + resendOtpTime).slice(-2));
                        } else {
                            $('#timer_left').css('display', 'none');
                            $('.otp_registration_resend').css('display', 'inline-block');
                            clearInterval(interval);
                        }
                    }, 1000);
                }

                $('#preloader').css('display', 'none');

            }

        },
        cache: false,
        contentType: false,
        processData: false,
    });
});

$(document).ready(function() {
    $('#body').on('keyup', 'input', function(e) {
        var inputs = $('input');
        if (e.keyCode == 8) {
            var index = inputs.index(this);
            if (index != 0)
                inputs.eq(index - 1).val('').focus();
        } else {
            if ($(this).val().length === this.size) {
                inputs.eq(inputs.index(this) + 1).focus();
            }
        }
    });
});

//form submit
$("form#test").submit(function(e) {
    e.preventDefault();

    var formId = $(this).attr('id');
    var formAction = $(this).attr('action');
    var formLoader = $(this).data('loader');

    $.ajax({
        url: formAction,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        data: new FormData(this),
        type: 'post',
        dataType: 'json',
        beforeSend: function() {
            $('#preloader').css('display', 'inline-block');
            $('.button_' + formLoader).prop('disabled', true);
        },
        error: function(xhr, textStatus) {
            if (textStatus == 'timeout') {
                showMsg('warning', xhr.status + ': ' + xhr.statusText);
            } else {
                showMsg('error', xhr.status + ': ' + xhr.statusText);

            }
            $('#preloader').css('display', 'none');
            $('.button_' + formLoader).prop('disabled', false);
        },
        success: function(data) {
            $('.button_' + formLoader).prop('disabled', false);
            $('#preloader').css('display', 'none');

            if (data.error) {
                showMsg('error', data.msg);
            } else {

                if (data.user_verify) {
                    showMsg('success', data.msg);
                    location.href = "{{route('index')}}";
                } else {
                    showMsg('success', data.msg);
                    var mobile = $("input[name=mobile]").val();
                    $('#last4digit').html(mobile.substring(6, 10));

                    jQuery('#otpsubmitform').show();
                    $("input[name=dig1]").focus();
                    jQuery('#regform').hide();
                    $('#' + formId)[0].reset();
                    var resendOtpTime = 30;
                    interval = setInterval(() => {
                        if (resendOtpTime > 0) {
                            resendOtpTime--;
                            $('#timer_left').html("00:" + ("0" + resendOtpTime).slice(-2));
                        } else {
                            $('#timer_left').css('display', 'none');
                            $('.otp_registration_resend').css('display', 'inline-block');
                            clearInterval(interval);
                        }
                    }, 1000);
                }
            }


        },
        cache: false,
        contentType: false,
        processData: false,
    });
});
</script>
@endpush