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
    width: 98%;
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
.settext{
    margin-left:10px;
}
</style>
@endsection
@section('content')
<!-- ***** Welcome Area Start ***** -->
<section id="home" class="section welcome-area bg-overlay overflow-hidden d-flex align-items-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12 text-center">

                        <div class="formarea bg-img">
                            
                                <div class="switch">
                                <input type="checkbox" id="checkbox1">
                                <label for="checkbox1"></label>
                                 <h4 class="">Accepting Payments</h4>
                        
                            </div>
                            <h2 class="pb-2 hedeadrcolor shadowtext">Wooray!</h2>
                            <h4 class="textstup">Your Store is Setup</h4>
                            <!-- <h1 class="text-con">Congratulations</h1> --><br><br><br><br><br><br><br><br>
                          

                                <div class="form-group mt-5 col-md-9 offset-md-2">
                                       <div  class="alert alert-success">
                                                <p>{{ $msg ?? '' }}</p>
                                            @if($subDomain->domain_type == "own_domain")
                                            <p class="d-flex justify-content-start">Please enter the bellow nameserver records to your domain provider's settings</p>
                                                <p class="d-flex justify-content-start">NS1:{{ $cp_detail->ns1  ?? '' }}</p>
                                                <p class="d-flex justify-content-start">NS2:{{ $cp_detail->ns2  ?? '' }}</p>
                                                <p class="d-flex justify-content-start">A:{{$cp_detail->record_a  ?? '' }}</p>
                                                <p>This process will take 24 to 48 hours to propogate to the server after the propogation perios please check bellow URL:</p>                        
                                           
                                            <span>Link:<a href="{{ $subDomain->domain_name }}"> {{ $subDomain->domain_name }}</a></span>
                                             @endif
                                                 <p>{{ $msg ?? '' }}</p>
                                            @if($subDomain->domain_type == "sub_domain")
                                            <p>Your store is ready within 15 Minutes, Please visit bellow link after 15 Mins.</p>
                                               
                                            <span>Link:<a href="{{ $subDomain->domain_name.'.'.'dailylifeblogs.com' }}"> {{ $subDomain->domain_name }}</a></span>
                                             @endif
                                             
                                        </div>
                                        
                                        <!-- <a href="/dashboard" id="makeSite" class="btn btn-primary">&nbsp;&nbsp;&nbsp;&nbsp;start&nbsp;&nbsp;&nbsp;&nbsp;</a> -->
                                
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