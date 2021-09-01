
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
        color: white;
        left: 20%;
        transform: translate(-50%, -50%);
        }
    </style>
@endpush  

@section('content')
@php
if($data)
{
    $id = $data->id;
    $title = $data->title;
    $slug = $data->slug;
    $banner_image = $data->banner_image;
    $body = $data->body;
}
else
{
    $id = "";
    $title = "";
    $slug = "";
    $banner_image = "";
    $body = "";
}
@endphp

    <!-- ***** Welcome Area Start ***** -->
    <section  class="section welcome-area  overflow-hidden d-flex">
        @if($banner_image)
        <img style="width:100%;height:10% !important;"  src="{{ asset('/uploads/cms/'.$banner_image)}}">
        @else
        <img style="height: 70%; " src="{{ asset('web-layouts/assets/img/about.png')}}">
        @endif
        <h1 class="centered">About Us</h1>
    </section>
    <section style="background-color:#cccccc26;" >
        <div  class="container">
            <div class="row">
                <div class="col-lg-12">
                    
                </div>
            </div>
        </div>
    </section>
    <section style="background-color: #F5F5F5;">
        <div class="container">
            <h2 style="text-align:center;padding-top: 50px;color: #1f85ec;">------------- Welcome to our Shop -------------</h2><br><br>
            @if($body)
            <div style="" class="row">
                <p>{!! $body !!}</p>
            </div> 
            @else   
            <div style="" class="row">
                <div style="" class="col-6">
                    <img style="width:100%;"  src="{{ asset('web-layouts/assets/img/veg.png')}}">
                </div>
                <div style="margin-top: 50px; " class="col-6">
                    <h2 style="text-align:center;">About Us</h2><br>
                    <p style="text-align:center;">Turpis faucibus vestibulum congue facilisis malesuada orci massa lacus mollis natoque, nunc pharetra sem arcu a interdum sociis curae aliquet praesent per, morbi felis tincidunt etiam primis habitasse donec tempor sodales. Varius rhoncus auctor aenean mollis blandit inceptos aliquet cursus id ac, enim phasellus neque sollicitudin erat tellus mi velit risus vel, dis mus curae fames himenaeos per sapien lacus sociis. Egestas elementum sociosqu turpis velit euismod urna potenti semper, vulputate sagittis dignissim lacinia aliquet dis netus aliquam ultricies, leo placerat praesent eros et duis mauris.</p>
                </div>
            </div>
            @endif
        </div>
    </section>

    <section style="padding-bottom: 50px;">
        <div class="container">
            <h2 style="text-align:center;padding-top: 50px;color: #1f85ec;">---------- Our Happy Customers ----------</h2><br><br>
            <div style="" class="row">
                
                <div style="text-align: center;" class="col-12">
                    <img src="{{ asset('web-layouts/assets/img/layout/female.png')}}" >
                </div>

                <div style=" " class="col-12">
                <br>
                    <p style="text-align:center;">Turpis faucibus vestibulum congue facilisis malesuada orci massa lacus mollis natoque, nunc pharetra sem arcu a interdum sociis curae aliquet praesent per, morbi felis tincidunt etiam primis habitasse donec tempor sodales. Varius rhoncus auctor aenean mollis blandit inceptos aliquet cursus id ac, enim phasellus neque sollicitudin erat tellus mi velit risus vel, dis mus curae fames himenaeos per sapien lacus sociis. Egestas elementum sociosqu turpis velit euismod urna potenti semper, vulputate sagittis dignissim lacinia aliquet dis netus aliquam ultricies, leo placerat praesent eros et duis mauris.</p>
                </div>
            </div>
        </div>
    </section>

    <section style="background-color: #1F85EC;padding-bottom: 40px;">
        <div class="container">
            <h2 style="text-align:center;padding-top: 50px;color: #1f85ec;">------------- Welcome to our Shop -------------</h2><br><br>
            <div style="" class="row">
                <div class="col-6">
                    <h2 style="text-align:center;color: white;">HOTLINE</h2><br>
                    <h2 style="text-align:center;color: white;">(+01) 123 789 456</h2><br><br>
                    <p style="color: white;">Turpis faucibus vestibulum congue facilisis malesuada orci massa lacus mollis natoque, nunc pharetra sem arcu a interdum sociis curae aliquet praesent per.</p>
                    
                </div>

                <div style="color: white;" class="col-6">
                    <img style="margin-top: -40px; width:100%;" src="{{ asset('web-layouts/assets/img/layout/veg.png')}}">
                </div>
            </div>
        </div>
    </section>

@endsection

@push('custom_js')
<script>

</script>
@endpush