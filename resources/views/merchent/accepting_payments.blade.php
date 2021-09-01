@extends('layouts.merchent')

@section('style')
<style type="text/css">

.switch {
    position: relative;
}

.switch label {
    position: absolute;
    background-color: #1F85EC;
    border-radius: 50px;
    width: 95%;
    height: 20px;
    top: -45px;
    left: 20px;
}

.switch label:after {
    content: '';
    width: 90%;
    height: 14px;
    border-radius: 50px;
    position: absolute;
    background-color: white;
    transition: all 0.2s;
    top: 3px;
    left: 8px;
} 

.switch input[type="checkbox"] {
    visibility: hidden;
}

.switch input[type="checkbox"]:checked + label {
     background-color: #1F85EC;
}

.switch input[type="checkbox"]:checked + label:after {
     /*left: 33px;*/
}
.ptext{
    color: black;font-size:13px;
}
</style>
@endsection

@section('content')
  <!-- ***** Welcome Area Start ***** -->
  <section id="home" class="section welcome-area bg-overlay overflow-hidden d-flex align-items-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12">

                        <div class="formarea">
                            <div class="switch">
                                <input type="checkbox" id="checkbox1">
                                <label for="checkbox1"></label>
                                 <h4 class="">Accepting Payments</h4>
                            </div>
                            <br>
                            <!-- <h2 class="pb-2 hedeadrcolor">Accepting Payments</h2> -->

                            <div class="row">
                                <div class="col-md-8">
                                    <form action="/MerchantAccepting_Payments/store" method="POST">
                                    @csrf


                                        <div class="form-group row">

                                            <div class="col-sm-5"><b>I Accept Online Payments</b></div>
                                            <div class="col-sm-7">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="online" value=1 type="checkbox" id="gridCheck1">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3"><img src="{{ asset('assets/img/shipping_information/paypal.png') }}"
                                                    alt=""></div>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <input style="margin-top: 15px;" name="paypal" value=1 class="form-check-input" type="checkbox" id="gridCheck1">

                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" name="paypal_link" class="form-control" placeholder="Enter Link">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3"><img src="{{ asset('assets/img/shipping_information/payfast.png') }}"
                                                    alt=""></div>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <input  style="margin-top: 15px;" name="payfast" value=1 class="form-check-input" type="checkbox" id="gridCheck1">

                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" name="payfast_link" class="form-control" placeholder="Enter Link">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3"><img src="{{ asset('assets/img/shipping_information/yoco.png') }}"
                                                    alt=""></div>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <input  style="margin-top: 15px;" name="yoco" value=1 class="form-check-input" type="checkbox" id="gridCheck1">

                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" name="yoco_link" class="form-control" placeholder="Enter Link">
                                            </div>
                                        </div>
                                        <div class="form-group row">

                                            <div  class="col-sm-10">
                                                <p class="ptext">
                                                    <b>Don't have a (payment gateway Account Yet, for each payment gateway)
                                                    <a href="#"> <u><p style="color: black;"> Register here for free,</p></u></a></b>
                                                </p>
                                                 <p class="ptext"><b>
                                                    You wan't be able accept online payments until your account is verified.</b>
                                                </p>
                                                 <p class="ptext"><b>
                                                    NB: You can accept cash on delivery payments if you wish to your Payfast account later.</b>
                                                      
                                                </p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6"><b>I accept Cash on Delivery Payments</b></div>
                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="is_cash_on_delivery" value=1 type="checkbox" id="gridCheck1">

                                                </div>
                                            </div>
                                        </div>
                                     
                                        <div class="form-group mt-5">
                                            <a href="/shipping_information" class="btn btn-primary">Perivous</a>
                                            <button type="submit" class="btn btn-primary">Next</button>
                                        </div>


                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Shape Bottom -->
            <div class="welcome-shape">
                <img src="{{ asset('assets/img/hero_shape.png') }}" alt="">
            </div>
        </section>
        <!-- ***** Welcome Area End ***** -->
@endsection