@extends('layouts.merchantdashboard')
@section('style')
<style>
    .service-area {
    z-index: 1;
}

.single-service > span {
    display: inline-block;
    height: 4.5rem;
    width: 4.5rem;
    line-height: 4.5rem;
    text-align: center;
    border-radius: 10px;
}

.single-service > span::before {
    font-size: 2.5rem;
    margin: 0;
}

.single-service > span.icon-bg-1 {
    background-color: rgba(190, 99, 249, 0.15);
}

.single-service > span.icon-bg-2 {
    background-color: rgba(38, 198, 218, 0.15);
}

.single-service > span.icon-bg-3 {
    background-color: rgba(252, 87, 59, 0.15);
}

.single-service > span.icon-bg-4 {
    background-color: rgba(52, 255, 146, 0.15);
}

.single-service > span.icon-bg-5 {
    background-color: rgba(255, 210, 0, 0.15);
}

.single-service > span.icon-bg-6 {
    background-color: rgba(255, 157, 69, 0.15);
}

.single-service h3 {
    font-size: 30px;
    font-weight: 600;
    line-height: 0.9em;
    letter-spacing: -1.6px;
}

.single-service.service-gallery {
    margin-bottom: 45px;
    border-radius: 20px;
    -webkit-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.01);
    box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.01);
    -webkit-transition: -webkit-box-shadow, -webkit-transform .4s cubic-bezier(.4, 0, .2, 1);
    transition: -webkit-box-shadow, -webkit-transform .4s cubic-bezier(.4, 0, .2, 1);
    transition: box-shadow, transform .4s cubic-bezier(.4, 0, .2, 1);
    transition: box-shadow, transform .4s cubic-bezier(.4, 0, .2, 1), -webkit-box-shadow, -webkit-transform .4s cubic-bezier(.4, 0, .2, 1);
}

.single-service.service-gallery{
    padding: 2rem;
}
.service-content{
    text-align: center;
}
.single-service.service-gallery:hover {
    -webkit-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.05);
    box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.05);
    -webkit-transform: translateY(-10px);
    transform: translateY(-10px);
}

.homepage-6 .single-service.service-gallery {
    -webkit-box-shadow: 0 5px 10px 0px rgba(0, 0, 0, 0.08);
    box-shadow: 0 5px 10px 0px rgba(0, 0, 0, 0.08);
}
</style>
@endsection
@section('content')
    <div class="container my-5">
    @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="mb-2">
            <a style="font-size: 25px;" href="{{ route('merchant-profile')}}"><i class="fa fa-chevron-circle-left"
            aria-hidden="true"></i>&nbsp;&nbsp;Back to Profile</a>
        </div>
        <form action="{{ route('merchant-update-layout-detail') }}" method="post">
        @csrf
        <h4 class="">Select Layout</h4>
        <div style="padding: 80px; margin-top: -50px;" class="row">
            
            <div class="col-12 col-md-6 col-lg-3 mb-4 cat">
                <!-- Single Service -->
                <div class="single-service service-gallery m-0 overflow-hidden">
                    <!-- Service Thumb -->
                    <div class="service-thumb">
                        <label>
                            @if($store_detail->layout_id == '1')
                            <input type="radio" name="layout_id" value="1" checked>
                            @else
                            <input type="radio" name="layout_id" value="1">
                            @endif
                            <img style="width: 99%;" src="{{ asset('/assets/img/layout/layout1.png') }}" alt="">
                        </label>
                    </div>
                    <!-- Service Content -->
                    <div class="service-content layoutext">
                        <a class="service-btn" href="#">Preview</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-4 cat">
                <!-- Single Service -->
                <div class="single-service service-gallery m-0 overflow-hidden">
                    <!-- Service Thumb -->
                    <div class="service-thumb">
                        <label>
                            @if($store_detail->layout_id == '2')
                            <input type="radio" name="layout_id" value="2" checked>
                            @else
                            <input type="radio" name="layout_id" value="2">
                            @endif
                            <img style="width: 99%;" src="{{ asset('/assets/img/layout/layout2.png') }}"  alt="">
                        </label>
                    </div>
                    <!-- Service Content -->
                    <div class="service-content layoutext">
                        <a class="service-btn" href="#">Preview</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-4 cat">
                <!-- Single Service -->
                <div class="single-service service-gallery m-0 overflow-hidden">
                    <!-- Service Thumb -->
                    <div class="service-thumb">
                        <label>
                            @if($store_detail->layout_id == '3')
                            <input type="radio" name="layout_id" value="3" checked>
                            @else
                            <input type="radio" name="layout_id" value="3">
                            @endif
                            <img style="width: 99%;" src="{{ asset('/assets/img/layout/layout3.png') }}"  alt="">
                        </label>
                    </div>
                    <!-- Service Content -->
                    <div class="service-content layoutext">
                        <a class="service-btn" href="#">Preview</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-4 cat">
                <!-- Single Service -->
                <div class="single-service service-gallery m-0 overflow-hidden">
                    <!-- Service Thumb -->
                    <div class="service-thumb">
                        <label>
                            @if($store_detail->layout_id == '4')
                            <input type="radio" name="layout_id" value="4" checked>
                            @else
                            <input type="radio" name="layout_id" value="4">
                            @endif
                            <img style="width: 99%;" src="{{ asset('/assets/img/layout/layout4.png') }}"  alt="">
                        </label>
                    </div>
                    <!-- Service Content -->
                    <div class="service-content layoutext">
                        <a class="service-btn" href="#">Preview</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-4 cat">
                <!-- Single Service -->
                <div class="single-service service-gallery m-0 overflow-hidden">
                    <!-- Service Thumb -->
                    <div class="service-thumb">
                        <label>
                            @if($store_detail->layout_id == '5')
                            <input type="radio" name="layout_id" value="5" checked>
                            @else
                            <input type="radio" name="layout_id" value="5">
                            @endif
                            <img style="width: 99%;" src="{{ asset('/assets/img/layout/layout2.png') }}"  alt="">
                        </label>
                    </div>
                    <!-- Service Content -->
                    <div class="service-content layoutext">
                        <a class="service-btn" href="#">Preview</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-4 cat">
                <!-- Single Service -->
                <div class="single-service service-gallery m-0 overflow-hidden">
                    <!-- Service Thumb -->
                    <div class="service-thumb">
                        <label>
                            @if($store_detail->layout_id == '6')
                            <input type="radio" name="layout_id" value="6" checked>
                            @else
                            <input type="radio" name="layout_id" value="6">
                            @endif
                            <img style="width: 99%;" src="{{ asset('/assets/img/layout/layout3.png') }}"  alt="">
                        </label>
                    </div>
                    <!-- Service Content -->
                    <div class="service-content layoutext">
                        <a class="service-btn" href="#">Preview</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-4 cat">
                <!-- Single Service -->
                <div class="single-service service-gallery m-0 overflow-hidden">
                    <!-- Service Thumb -->
                    <div class="service-thumb">
                        <label>
                            @if($store_detail->layout_id == '7')
                            <input type="radio" name="layout_id" value="7" checked>
                            @else
                            <input type="radio" name="layout_id" value="7">
                            @endif
                            <img style="width: 99%;" src="{{ asset('/assets/img/layout/layout4.png') }}"  alt="">
                        </label>
                    </div>
                    <!-- Service Content -->
                    <div class="service-content layoutext">
                        <a class="service-btn" href="#">Preview</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-4 cat">
                <!-- Single Service -->
                <div class="single-service service-gallery m-0 overflow-hidden">
                    <!-- Service Thumb -->
                    <div class="service-thumb">
                        <label>
                            @if($store_detail->layout_id == '8')
                            <input type="radio" name="layout_id" value="8" checked>
                            @else
                            <input type="radio" name="layout_id" value="8">
                            @endif
                            <img style="width: 99%;" src="{{ asset('/assets/img/layout/layout1.png') }}"  alt="">
                        </label>
                    </div>
                    <!-- Service Content -->
                    <div class="service-content layoutext">
                        <a class="service-btn" href="#">Preview</a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
                <h4 class="">Set Store Color</h4>
                <!-- <h5 class="pb-2 hedeadrcolor">Set Store Color</h5> -->
            </div>
            
            <div ng-app="app">
                <!-- <color-picker color="foo"></color-picker> -->
                <input type="color" id="color" name="color" value="{{ $store_detail->color }}"><br><br>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary mb-5">Update</button>
        </form>
    </div>
@endsection