@extends('layouts.merchent')
@section('style')
<style type="text/css">
    .plan-features{
            font-size: 12px;
    }

    .plan-description{
        line-height: 16px;
    }

    .btn {
  margin-left: 10px;
  margin-right: 10px;
}
/* Boostrap Buttons Styling */

.btn-default {
    /*font-family: Raleway-SemiBold;*/
    font-size: 13px;
    color: white;
    letter-spacing: 1px;
    line-height: 15px;
    /* border: 2px solid rgba(108, 89, 179, 0.75); */
    border-radius: 40px;
    background: #007bff ;
    transition: all 0.3s ease 0s;
}

.btn-default:hover {
  color: #FFF;
  background: #007bff;
  /*border: 2px solid rgba(108, 89, 179, 0.75);*/
}
</style>
@endsection
@section('content')

 <!-- ***** Welcome Area Start ***** -->
 <section id="home" class="section welcome-area bg-overlay overflow-hidden d-flex align-items-center">
            <div style="margin-top:-70px;" class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-7">
                        <!-- Section Heading -->
                        <div class="section-heading text-center">
                            <h2 class="sizcolor">Simple Pricing. Select A Plan</h2>
                            <p class="d-none d-sm-block mt-4 subcontet">Flexible plans to suite your need.Get all
                                features. Cancel Anytime.</p>
                        </div>
                    </div>
                </div>
                <div style="margin-top:-60px;" class="row align-items-center">
                    <div class="col-12 col-md-3">
                        <!-- Single Price Plan -->
                        <div class="single-price-plan color-1 bg-hover hover-top text-center p-2rem">
                            <!-- Plan Title -->
                            <div class="plan-title mb-2 mb-sm-3">
                                <img src="{{ asset('assets/img/dimon.png') }}" alt="">
                                

                            </div>
                          <h4 class="mb-2">Starter</h4>
                           <h5>Just starting out.</h5> 
                       
<br>
                            <!-- Plan Description -->
                            <div class="plan-description">
                                <ul class="plan-features">

                                    <li class="py-1"> Free .co.za domain and hosting</li>
                                    <li class="py-1"><b> Up to 15 Products</b></li>
                                    <li class="py-1">Easy to use User Interface</li>
                                    <li class="py-1">0% Zero platform commissions</li>
                                    <li class="py-1">Access to support</li>
                                    <li class="py-1">Order Management</li>
                                    <li class="py-1">Manage Products</li>
                                    <li class="py-1">Marketing Tools & Page Editor</li>
                                    <li class="py-1">Multiple Payment Methods</li>
                                    <li class="py-1">And many more</li>
                                </ul>
                            </div>
                            <br>
                            <h4 style="margin-bottom: 15px;" class="mb-2">R99/ month</h4>
                            <form action="/PlanId" method="POST" >
                            @csrf
                             <input type="number" name="plan_id" value="1" hidden>
                            <button type="submit" class="btn btn-default">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                            <!-- <a href="/store_details" type="sumit" class="btn btn-default">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a> -->
                            </form>
                            <!-- Plan Button -->
                            <!-- <div class="plan-button">
                               
                                <button href="store_details.php" class="ml-lg-auto btn active btn-bordered-white">
                                    Select</button>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <!-- Single Price Plan -->
                        <div class="single-price-plan color-1 bg-hover hover-top text-center p-2rem">
                            <!-- Plan Title -->
                            <div class="plan-title mb-2 mb-sm-3">
                                <img src="{{ asset('assets/img/dimon.png') }}" alt="">
                              

                            </div>
                            
                              <h4 class="mb-2">Standard</h4>
                           <h5>Making it work.</h5> 
<br>
                            <!-- Plan Description -->
                            <div class="plan-description">
                                <ul class="plan-features">

                                    <li class="py-1"> Free .co.za domain and hosting</li>
                                    <li class="py-1"><b> Up to 50 Products</b></li>
                                    <li class="py-1">Easy to use User Interface</li>
                                    <li class="py-1">0% Zero platform commissions</li>
                                    <li class="py-1">Access to support</li>
                                    <li class="py-1">Order Management</li>
                                    <li class="py-1">Manage Products</li>
                                    <li class="py-1">Marketing Tools & Page Editor</li>
                                    <li class="py-1">Multiple Payment Methods</li>
                                    <li class="py-1">And many more</li>
                                </ul>
                            </div>
                            <br>
                            <h4 style="margin-bottom: 15px;" class="mb-2">R149/ month</h4>
                            <!-- Plan Button -->
                            <form action="/PlanId" method="POST" >
                            @csrf
                             <input type="number" name="plan_id" value="2" hidden>
                            <button type="submit" class="btn btn-default">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                            <!-- <a href="/store_details" type="sumit" class="btn btn-default">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a> -->
                            </form>
                            <!-- <div class="plan-button">
                                
                                <a href="store_details.php" class="ml-lg-auto btn active btn-bordered-white">
                                    Select</a>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <!-- Single Price Plan -->
                        <div class="single-price-plan color-1 bg-hover hover-top text-center p-2rem">
                            <!-- Plan Title -->
                            <div class="plan-title mb-2 mb-sm-3">
                                <img src="{{ asset('assets/img/dimon.png') }}" alt="">
                               
                            </div>
                           <h4 class="mb-2">Premium</h4>
                           <h5> Ready for success.</h5> 
<br>
                            <!-- Plan Description -->
                            <div class="plan-description">
                                <ul class="plan-features">

                                    <li class="py-1"> Free .co.za domain and hosting</li>
                                    <li class="py-1"><b> Up to 100 Products</b></li>
                                    <li class="py-1">Easy to use User Interface</li>
                                    <li class="py-1">0% Zero platform commissions</li>
                                    <li class="py-1">Access to support</li>
                                    <li class="py-1">Order Management</li>
                                    <li class="py-1">Manage Products</li>
                                    <li class="py-1">Marketing Tools & Page Editor</li>
                                    <li class="py-1">Multiple Payment Methods</li>
                                    <li class="py-1">And many more</li>
                                </ul>
                            </div>
                            <br>
                            <h4 style="margin-bottom: 15px;" class="mb-2">R199/ month</h4>
                            <!-- Plan Button -->
                            <form action="/PlanId" method="POST" >
                            @csrf
                             <input type="number" name="plan_id" value="3" hidden>
                            <button type="submit" class="btn btn-default">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                            <!-- <a href="/store_details" type="sumit" class="btn btn-default">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a> -->
                            </form>

                            <!-- <div class="plan-button">
                               
                                <a href="store_details.php" class="ml-lg-auto btn active btn-bordered-white">
                                    Select</a>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <!-- Single Price Plan -->
                        <div class="single-price-plan color-1 bg-hover hover-top text-center p-2rem">
                            <!-- Plan Title -->
                            <div class="plan-title mb-2 mb-sm-3">
                                <img src="{{ asset('assets/img/dimon.png') }}" alt="">
                                

                            </div>
                          <h4 class="mb-2"> Plus</h4>
                           <h5>Grow like never before.</h5> 
                          
    <br>                       
                           
                            <!-- Plan Description -->
                            <div class="plan-description">
                                <ul class="plan-features">

                                    <li class="py-1"> Free .co.za domain and hosting</li>
                                    <li class="py-1"><b> Unlimlted Products</b></li>
                                    <li class="py-1">Easy to use User Interface</li>
                                    <li class="py-1">0% Zero platform commissions</li>
                                    <li class="py-1">Access to support</li>
                                    <li class="py-1">Order Management</li>
                                    <li class="py-1">Manage Products</li>
                                    <li class="py-1">Marketing Tools & Page Editor</li>
                                    <li class="py-1">Multiple Payment Methods</li>
                                    <li class="py-1">And many more</li>
                                </ul>
                            </div>
                            <br>
                            <h4 style="margin-bottom: 15px;" class="mb-2">R299/ month</h4>
                            <!-- Plan Button -->
                            <form action="/PlanId" method="POST" >
                            @csrf
                             <input type="number" name="plan_id" value="4" hidden>
                            <button type="submit" class="btn btn-default">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                            <!-- <a href="/store_details" type="sumit" class="btn btn-default">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a> -->
                            </form>

                            <!-- <div class="plan-button">
                                
                                <a href="store_details.php" class="ml-lg-auto btn active btn-bordered-white">
                                    Select</a>
                            </div> -->
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