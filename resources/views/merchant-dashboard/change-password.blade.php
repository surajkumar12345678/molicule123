@extends('layouts.merchantdashboard')
@section('style')
<style>
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
    width: 20%;
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
    
.upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
}

.btnupload {
  border: 2px solid gray;
  color: gray;
  background-color: white;
  /*padding: 8px 20px;*/
  border-radius: 8px;
  font-size: 20px;
  font-weight: bold;
}

.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}
.image{
    height:100px;
    weight:100px;
} 
</style>
@endsection
@section('content')

<!-- ***** Welcome Area Start ***** -->
<br><br>
<div style="background-color: whitesmoke;" class="container">
    <div class="main-body">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Merchant</a></li>
                <li class="breadcrumb-item active" aria-current="page">Change Password</li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->

        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body m-3">
                        <div class="d-flex flex-column align-items-center text-center">
                            <form action="{{ route('merchant-upload-profile-image')}}" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="upload-btn-wrapper">
                                    <button style="border:none;" class="btnupload" id="preview1">
                                    @if($data->profile_image)
                                    <img src="{{ asset('/uploads/profileimages/'.$data->profile_image) }}" alt="Admin" class="image1 rounded-circle" width="150"></button>
                                    @else
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="image1 rounded-circle" width="150"></button>
                                    @endif
                                    <input style="padding: 50px;" type="file" name="profile_image" id="profile_image">   
                                </div>
                                <div>
                                    <button type="submit" id="show" style="display:none;">Upload</button>
                                </div>
                            </form>
                            <div class="mt-3">
                                <h4>{{ucfirst($data->first_name)}} {{ucfirst($data->last_name)}}</h4>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-4">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <a href="{{route('merchant-profile')}}">
                                <h6 class="mb-0">Profile</h6>
                            </a>

                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <a href="{{route('merchant-plan-detail')}}">
                                <h6 class="mb-0"> My Plan</h6>
                            </a>

                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <a href="{{route('merchant-store-detail')}}">
                                <h6 class="mb-0"> Store Detail</h6>
                            </a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <a href="{{route('merchant-layout-detail')}}">
                                <h6 class="mb-0"> Layout Detail</h6>
                            </a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <a href="{{route('merchant-logout')}}">
                                <h6 class="mb-0"> Logout</h6>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body container">
                    <form action="/merchant/update-password" method="post" class="container my-5">
                        @csrf
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Old password</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <div class="form-group">
                                    <input id="form_name" value="" type="text" name="old_pass" class="form-control" placeholder="Old password *" required="required" data-error="Firstname is required.">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">New Password</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <div class="form-group">
                                    <input id="form_name" value="" type="password" name="password" class="form-control" placeholder="New password *" required="required" data-error="mobile is required.">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Confirm password</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <div class="form-group">
                                    <input id="form_name" value="" type="password" name="password_confirmation" class="form-control" placeholder="Confirm password *" required="required" data-error="Lastname is required.">
                                </div>
                            </div>
                        </div>

                        <hr>
                        
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <button class="btn btn-info">Update</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<br><br>
<script>
    const inpFile1 = document.getElementById('profile_image');
    const preview1 = document.getElementById('preview1');
    const previewimage1 = preview1.querySelector('.image1');
    inpFile1.addEventListener("change",function(){
        const file1 = this.files[0];
        if(file1)
        {
            const reader1 = new FileReader();
            reader1.addEventListener("load", function(){
                previewimage1.setAttribute("src", this.result);
                document.getElementById('show').style.display = 'block';
            });
            reader1.readAsDataURL(file1);
        }
    });
</script>
@endsection