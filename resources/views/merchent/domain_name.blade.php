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
    width: 40%;
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
.setRow{
    display: flex;
}
.setheight_label{
    height:100% !important;
}
</style>

@endsection

@section('content')
 <!-- ***** Welcome Area Start ***** -->
 <section id="home" class="section welcome-area bg-overlay overflow-hidden d-flex align-items-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12">
                    @if ($message = Session::get('success'))
                                       <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                           <strong>{{ $message }}</strong>
                                        </div>

                     @endif
                        <div class="formarea">
                            <div class="switch mb-5 ">
                                <input type="checkbox" id="checkbox1">
                                <label for="checkbox1"></label>
                                 <h4 class="">Select Your Domain Name (It's Free)</h4>
                            </div>
                            <!-- <h2 class="pb-2 hedeadrcolor mb-3">Select Your Domain Name (It's Free)</h2> -->
                            <div style="margin-top:-30px;" class="row">
                                <div class="col-md-6">
                                    <form action="/DomainName" method="POST" id="myForm">
                                    @csrf
                                        <div class="setRow"> 
                                            <div class="form-group pr-4">
                                            <input type="radio" name="domain_type" id="free" value="buy_new_domain">   
                                            <label for="free">&nbsp;Buy New Domain</label>
                                                 
                                            </div>
                                            <div class="form-group pr-4">
                                             <input type="radio" name="domain_type" id="unique" value="sub_domain">   
                                            <label for="unique">&nbsp;Unique Sub Domain</label>
                                                                                              
                                            </div>
                                            <div class="form-group">
                                            <input type="radio" name="domain_type" id="own" value="own_domain">    
                                            <label for="own">&nbsp;Own Domain</label>
                                                                                               
                                            </div>
                                        </div>
                                        <div class="form-group" >
                                            <label for="exampleFormControlInput1" class="free_box d-none">&nbsp;&nbsp;&nbsp;Enter Buy New Domain Name </label>
                                            <label for="exampleFormControlInput1" class="unique_box d-none">&nbsp;&nbsp;&nbsp;Enter  Unique Sub Domain Name </label>
                                            <label for="exampleFormControlInput1" class="own_box d-none">&nbsp;&nbsp;&nbsp;Enter Own Domain Name </label>
                                            
                                                <div class="input-group">
                                                    <input type="text" name="domain_name" id="domain_name" class="form-control"
                                                    placeholder="Enter Your Domain Name" value="{{ old('domain_name') }}">
                                                    <div class="input-group-append free_box d-none">
                                                        <span class="input-group-text setheight_label">.co.za</span>
                                                    </div>
                                                    <div class="input-group-append unique_box d-none">
                                                        <span class="input-group-text setheight_label">.dailyblogslife.com
                                                       </span>
                                                    </div>
                                                </div>
                                                <span id="msg" class="text-danger"></span>
                                                <span id="msg_sucess" class="text-success"></span>
                                                @error('domain_name')
                                                   <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            @if($errors->any())
                                                <span class="text-danger">{{$errors->first()}}</span>
                                            @endif
                                                    
                                        <div class="form-check">
                                            <input class="form-check-input" name="checkbox" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1"><b>
                                                I own a domain and will point my nameservers or
                                                create an A record <a href="#"><u>More Info</u></a> </b>
                                            </label>
                                          </div>
                                          
                                      <br><br><br><br>
                                        <div class="form-group mt-5">
                                            <a href="/store_details" class="btn btn-primary">Previous</a>
                                            @if ($plan_id = Session::get('plan_id'))
                                            <input type="number" name="plan_id" value={{ $plan_id }} hidden>
                                             <input type="hidden" name="dtype" id="dtype"  value="">
                                            @endif
                                            <button class="btn btn-primary" type="submit" id="submit">Next</button>
                                            <!-- <a href="/selectlayout" type="submit" class="btn btn-primary">Next</a> -->
                                         </div>
                                       

                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                     $("input[name=domain_type]").on( "change", function() {
                     var d_type =  $("input[name='domain_type']:checked").val();
                     $("#d_type").val(d_type);
                        if(d_type == 'buy_new_domain' ){
                                $(".free_box").removeClass('d-none');
                                $(".free_box").css('display','block');
                                $(".unique_box").addClass('d-none');
                                $(".own_box").addClass('d-none');
                        
                                $("#domain_name").blur(function(){
                                   var domain_name = $(this).val();
                                   if(domain_name == ''){
                                       $("#msg").text("Domain name is required").fadeIn('slow').fadeOut(5000);
                                   } else{
                                        var tld ="co.za";
                                        $.ajax({
                                            type: "get",
                                            dataType: "json",
                                            url: "{{route('DomainName/DomainNamecheck')}}",
                                            data: {
                                                sld:domain_name,
                                                tld:tld
                                            },
                                            beforeSend: function() {
                                              $('#preloader').css('display', 'inline-block');
                                            },
                                            error: function(xhr, textStatus) {
                                                // if (textStatus == 'timeout') {
                                                //     showMsg('warning', xhr.status + ': ' + xhr.statusText);
                                                //     $('#preloader').css('display', 'none');
                                                // } else {
                                                //     showMsg('error', xhr.status + ': ' + xhr.statusText);
                                                //     $('#preloader').css('display', 'none');
                                                // }
                                            },
                                            success: function(data) {
                                            $('#preloader').css('display', 'none');
                                                if (data.isAvailable =="true") {
                                                    $("#msg_sucess").addClass('color',"green").text("Click Next button for create your domain").fadeIn('slow').fadeOut(5000);
                                                return false
                                                } else {
                                                    $("#msg").text("Domain does exist, please try other..!").fadeIn('slow').fadeOut(5000);
                                                     return false;
                                                }
                                            }
                                        });
                                    };
                                });   
                               
                        } else if(d_type == 'sub_domain'){
                               $(".free_box").addClass('d-none');
                               $(".unique_box").removeClass('d-none');
                               $(".unique_box").css('display','block');
                               $(".own_box").addClass('d-none');
                                
                        } else if(d_type == 'own_domain' ){
                                $(".free_box").addClass('d-none');
                                $(".unique_box").addClass('d-none');
                                $(".own_box").removeClass('d-none');
                                $(".own_box").css('display','block');
                        } 
                    });
                });
            </script>
            <!-- Shape Bottom -->
            <div class="welcome-shape">
                <img src="{{ asset('assets/img/hero_shape.png') }}" alt="">
            </div>
        </section>
        <!-- ***** Welcome Area End ***** -->

@endsection
