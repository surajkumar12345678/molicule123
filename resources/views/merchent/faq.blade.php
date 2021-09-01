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
</style>
@endsection
@section('content')
 <!-- ***** Welcome Area Start ***** -->
 <section id="home" class="section welcome-area bg-overlay overflow-hidden d-flex">
            <div class="container">
                <div  class="row">
                    
                        <div class="col-6">
                            <img src="assets/img/faq.jpg">
                        </div>
                        <div  style="margin-top:80px;" class="col-6">

                            <h3 class=" whitetext">Frequently asked questions</h3>
                            <h1 class=" whitetext">How can we help you </h1>

                            <br><br>  <br><br>


                            <p>Our help center can instantly give you <br>answers to many frequently asked <br>questions.</p>
                        </div>


                    
                </div>
            </div>
            <!-- Shape Bottom -->
            <div class="welcome-shape">
                <img src="assets/img/hero_shape.png" alt="">
            </div>
        </section>
        <!-- ***** Welcome Area End ***** -->
@endsection
