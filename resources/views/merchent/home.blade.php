@extends('layouts.merchent')
@section('style')
<style type="text/css">
    .colorprojct1 {
     color: #137feb; 
     text-align: center !important;
     font-family: poppins;
     
}
.whitetext{
color: white;
}
.cardcss {
    border-radius: 3%;
    width: 85%;
}
.textright{
    text-align: right;
}
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
.btn-primary1 {
    color: #2086EC;
    background-color: white;
    /*border-color: #007bff;*/
}
.service-content1.layoutext1 {
    padding: 35px !important;
    color: #2085ED;
    text-align: center;
    background: white;
    !important: ;
}
</style>
@endsection

@section('content')
<!-- ***** Welcome Area Start ***** -->

<section id="home" class="section welcome-area bg-overlay overflow-hidden d-flex">
           
           <div class="container">
               <!-- <div style="text-align:center">
                   <h3  class="whitetext">Features</h3>
                   <h2 class="whitetext">All you need to get selling online</h2><br>
               </div> -->
               <div class="row">
                   <div style="margin-top: 80px;" class="col-6">
                       <h2  class="whitetext">Setup Your Online</h2>
                   <h2 class="whitetext">Store in Under 5 Minutes</h2>
                   <p class="whitetext">Create your online store without any coding. We've simplified<br> eCommerce</p><br>
                   <button class="btn btn-primary1">Start Your 14 Day Free Trial</button><br>
                   <small class="whitetext">No credit card required</small><br>
                   </div>
                   <div class="col-6">
                       <img src="{{ asset('assets/img/home1.png') }}">
                   </div>
               </div>
           </div>
           <!-- Shape Bottom -->
           <div class="welcome-shape">
               <img src="{{ asset('assets/img/hero_shape.png') }}" alt="">
           </div>


    
       </section>
       <div class="container">
           <img src="{{ asset('assets/img/bg1.jpg') }}">
       </div>
       
           <div class="welcome-shape">
               <img src="{{ asset('assets/img/hero_shape1.jpg') }}" alt="">

           </div>
           <div style="margin-top:-150px;" class="container">
               <div class="row">
                   <div class="col-12">
                       <h2 class="whitetext text-center">Multiple Methods of Payment</h2>
                       <p class="whitetext text-center">Accept Payments Online using Credit Card, Debit Card, Instant EFT and many other methods.You can also opt to accept Cash on Delivery Payments, Offering your customers full flexibility</p>

                   </div>
               </div>
           </div>
           <br><br>
           <section  style="background-color: #2085ED;" >
               <div class="container">
                   <div style="padding: 80px; margin-top: -50px;" class="row">
                               <div class="col-12 col-md-6 col-lg-3 mb-4 cat">
                                   <!-- Single Service -->
                                   <div class="single-service service-gallery m-0 overflow-hidden">
                                       <!-- Service Thumb -->
                                       <div class="service-thumb">
                                           <a href="#"><img src="{{ asset('assets/img/fig1.jpg') }}" alt=""></a>
                                       </div>
                                       <!-- Service Content -->
                                       <div class="service-content1 layoutext1">

                                           <h5>Feature Name</h5>
                                           <p>Lorem ipsum dolor sit amet consectetur</p>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-12 col-md-6 col-lg-3 mb-4 cat">
                                   <!-- Single Service -->
                                   <div class="single-service service-gallery m-0 overflow-hidden">
                                       <!-- Service Thumb -->
                                       <div class="service-thumb">
                                           <a href="#"><img src="{{ asset('assets/img/fig2.jpg') }}" alt=""></a>
                                       </div>
                                       <!-- Service Content -->
                                       <div class="service-content1 layoutext1">

                                          <h5>Feature Name</h5>
                                           <p>Lorem ipsum dolor sit amet consectetur </p>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-12 col-md-6 col-lg-3 mb-4 cat">
                                   <!-- Single Service -->
                                   <div class="single-service service-gallery m-0 overflow-hidden">
                                       <!-- Service Thumb -->
                                       <div class="service-thumb">
                                           <a href="#"><img src="{{ asset('assets/img/fig3.jpg') }}" alt=""></a>
                                       </div>
                                       <!-- Service Content -->
                                       <div class="service-content1 layoutext1">
                                           <h5>Feature Name</h5>
                                           <p>Lorem ipsum dolor sit amet consectetur</p>
                                           <!-- <a class="service-btn text-white" href="#">Preview</a> -->
                                       </div>
                                   </div>
                               </div>
                               <div class="col-12 col-md-6 col-lg-3 mb-4 cat">
                                   <!-- Single Service -->
                                   <div class="single-service service-gallery m-0 overflow-hidden">
                                       <!-- Service Thumb -->
                                       <div class="service-thumb">
                                           <a href="#"><img src="{{ asset('assets/img/fig4.jpg') }}" alt=""></a>
                                       </div>
                                       <!-- Service Content -->
                                       <div class="service-content1 layoutext1">
                                           <h4>Feature Name</h4>
                                           <p>Lorem ipsum dolor sit amet consectetur</p>
                                           <!-- <a class="service-btn text-white" href="#">Preview</a> -->
                                       </div>

                                   </div>

                               </div>

                               <div  class=" col-12 text-center; text-align:center;">
                               <h4 style="text-align: center;"  class="whitetext">Online Payments securely powered by Payfast. Transaction Fees May Apply.</h4>
                               </div><br><br><br><br><br><br>

                               <div class="container">
                                   <div class="row">
                                       <div class="col-6">
                                           <h3 class="whitetext">Zero 0% Platform Commissions</h3>
                                           <p  class="whitetext">Say No to Platform Commissions! We do not charge a percentage of soles it's your business</p><br>
<br>
                                           <a class="whitetext" href="#"><ul>[Start 14 Days Free Trial]</ul></a>
                                       </div>
                                       <div class="col-6">
                                           <h3 class="whitetext">Marketing Ready!</h3>
                                           <p  class="whitetext">We've included all the necessary marketing tools give your online store the compettitive advantage.<br>GoogleTM Shopping, WhatsAppTM Business and many more</p><br>
                                           <a class="whitetext" href="#"><ul>See Features</ul></a>

                                       </div>
                                   </div>
                               </div>
                               
                           </div>
                           

               </div>
           </section>
           <section style="background-color:#2085ed;background-image: url('{{ asset('assets/img/hero_shape2.jpg') }}');" >
               <div class="container">
                   <img src="{{ asset('assets/img/pc.png') }}">
               <!-- <div style="text-align:center">
                   <h3  class="whitetext">Features</h3>
                   <h2 class="whitetext">All you need to get selling online</h2><br>
               </div> -->
               
               </div>
           <!-- Shape Bottom -->
           

           </section>
           
           

       <div class="container">
               <div class="row justify-content-center">
                   <div class="col-12 col-md-10 col-lg-7">
                       <!-- Section Heading -->
                       
                   </div>
               </div>

               <div style="margin-bottom: 40px; "><h2 class="text-center">We Keep Pricing Simple</h2></div>
               <div style="" class="row align-items-center ">

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
                                   <li class="py-1">Marketing Tools &amp; Page Editor</li>
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
                                   <li class="py-1">Marketing Tools &amp; Page Editor</li>
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
                                   <li class="py-1">Marketing Tools &amp; Page Editor</li>
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
                                   <li class="py-1">Marketing Tools &amp; Page Editor</li>
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
               <br><br>
           </div>
       <!-- ***** Welcome Area End ***** -->
       
@endsection

@section('script')

@endsection