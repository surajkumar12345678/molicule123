@extends('layouts.web_layout') 

@push('custom_css')
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
    .card-header{
        background-color: #1f85ec;
        color: white;
    }
    .tabs .nav-tabs {
        border-bottom: 2px solid #e6e8eb;
        margin-bottom: 30px;
    }
    /*h2:after
    {
    content:' ';
    width: 30%;
    display:block;
    border:1px solid #1f85ec;
    padding: 0px 150px 0px 150px;
    }*/
   .centered {
        position: absolute;
        top: 60%;
        color: black;
        left: 80%;
        transform: translate(-50%, -50%);
    }
</style>
@endpush  
@section('content') 

    <!-- ***** Welcome Area Start ***** -->
    <section class="section welcome-area  overflow-hidden d-flex">
        <img style="height:70% !important;" src="{{ asset('web-layouts/assets/img/layout/contact.png')}}">
        <h1 class="centered">Contact Us</h1>
    </section>
    <section style="background-color:#cccccc26;">
        <div class="container">
            <div class="row">
            <div class="col-lg-12"></div>
            </div>
        </div>
    </section>
    <section style="padding-bottom: 20px;">
        <div class="container">
            <h2 style="text-align:center;padding-top: 50px;color: #1f85ec;">------------- Leave a Message here -------------</h2>
            <br>
            <div class="container">
            <div class=" text-center mt-5 "></div>
            <div class="row ">
                <div class="col-lg-7 mx-auto">
                <div class="">
                    <div class="">
                    <div class="container">
                        <form role="form">
                        <div class="controls">
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <input id="form_name" type="text" name="name" class="form-control" placeholder="Firstname *" required="required" data-error="Firstname is required.">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Lastname *" required="required" data-error="Lastname is required.">
                                </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <input id="form_email" type="email" name="email" class="form-control" placeholder="Email *" required="required" data-error="Valid email is required.">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <input id="form_subject" type="text" name="subject" class="form-control" placeholder="Subject" required="required">
                                </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <textarea id="form_message" name="message" class="form-control" placeholder="Write your message here." rows="4" required="required" data-error="Please, leave us a message."></textarea>
                                </div>
                            </div>
                            <div style="text-align:center;" class="col-md-12">
                                <a href="#" class="btn ml-lg-auto active btn-bordered-white"> Submit Now</a>
                            </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
                <!-- /.8 -->
                </div>
                <!-- /.row-->
            </div>
            </div>
        </div>
    </section>
    <section style="padding-bottom: 50px; z-index: 100;">
        <div class="container">
            <div class="row">
            <div class="col-md-4 mt-5">
                <div class="card text-center">
                <div style="background-color:#1F85EC;" class="card-footer text-muted">
                    <div class="row">
                    <h3 style="margin-left: 35%;color:white;">Address</h3>
                    </div>
                </div>
                <div style="background-color: #F7F7F7; ;" class="card-body" id="card">
                    <h2>
                    <i style="color:gray;" class='fas fa-map-marker-alt' style='font-size:36px'></i>
                    </h2>
                    <h3 style="text-align: center;color:gray;">Address</h3>
                    <br>
                    <p style="font-size: 15px;">44 New Design Street Down Town,Melbourne 005</p>
                </div>
                </div>
            </div>
            <div class="col-md-4 mt-5">
                <div class="card text-center">
                <div style="background-color:#1F85EC;" class="card-footer text-muted">
                    <div class="row">
                    <h3 style="margin-left: 35%;color:white;">Call Now</h3>
                    </div>
                </div>
                <div style="background-color: #F7F7F7; ;" class="card-body" id="card">
                    <h2>
                    <i style="color:gray;" class='fa fa-phone' style='font-size:36px'></i>
                    </h2>
                    <h3 style="text-align: center;color:gray;">Call to Us</h3>
                    <br>
                    <p style="font-size: 15px;">564-334-21-22-34</p>
                    <p style="font-size: 15px;">564-334-21-22-34</p>
                </div>
                </div>
            </div>
            <div class="col-md-4 mt-5">
                <div class="card text-center">
                <div style="background-color:#1F85EC;" class="card-footer text-muted">
                    <div class="row">
                    <h3 style="margin-left: 35%;color:white;">Email</h3>
                    </div>
                </div>
                <div style="background-color: #F7F7F7; ;" class="card-body" id="card">
                    <h2>
                    <i style="color:gray;" class='fa fa-envelope' style='font-size:36px'></i>
                    </h2>
                    <h3 style="text-align: center;color:gray;">Email Address</h3>
                    <br>
                    <p style="font-size: 15px;">simpefy@simpefy.in</p>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    <section style="margin-top:-160px;">
        <div class="container-fluid">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3520.241989142068!2d-80.60913158497625!3d28.07816058263977!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88de118cd1c39b03%3A0xc531a13d8192cdcb!2sDowntown%20Melbourne!5e0!3m2!1sen!2sin!4v1627384820266!5m2!1sen!2sin" width="1920" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>

@endsection

@push('custom_js')
<script>

</script>
@endpush