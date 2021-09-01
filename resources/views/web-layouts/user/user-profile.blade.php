@extends('layouts.web_layout')

@section('content')
<style>
.shopping-cart .cart-total_block {
    margin-top: 0px;
}
</style>
<!-- ***** Welcome Area Start ***** -->
<br><br>
<div style="background-color: whitesmoke;" class="container">
    <div class="main-body">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('user')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->

        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h4>{{ucfirst($profile->first_name)}} {{ucfirst($profile->last_name)}}</h4>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <ul class="list-group list-group-flush">

                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <a href="{{route('user-order')}}">
                                <h6 class="mb-0"><i class="fa fa-cart-arrow-down"></i> My Order</h6>
                            </a>

                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <a href="{{route('wishlist')}}">
                                <h6 class="mb-0"><i class="fa fa-heart"></i> My WishList</h6>
                            </a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <a href="{{route('address.book')}}">
                                <h6 class="mb-0"><i class="fa fa-address-book"></i> My Address Book</h6>
                            </a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <a href="{{route('user.change.password')}}">
                                <h6 class="mb-0"><i class="fa fa-lock"></i> Change password</h6>
                            </a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <a href="{{route('user.logout')}}">
                                <h6 class="mb-0"><i class="fa fa-sign-out-alt"></i> Logout</h6>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <form action="{{route('profile.update')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <div class="form-group">
                                        <input id="form_name" value="{{$profile->first_name}}" type="text" name="fname" class="form-control" placeholder="First name *" required="required" data-error="Firstname is required.">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <div class="form-group">
                                        <input id="form_name" value="{{$profile->last_name	}}" type="text" name="lname" class="form-control" placeholder="Last name *" required="required" data-error="Lastname is required.">
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Mobile</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <div class="form-group">
                                        <input id="form_name" value="{{$profile->mobile_number}}" type="tel" name="mobile" class="form-control" placeholder="Mobile number *" required="required" data-error="mobile is required.">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <div class="form-group">
                                        <input id="form_name" value="{{$profile->email}}"  type="email" name="email" class="form-control" placeholder="Email *" required="required" data-error="email is required.">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Gender</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="radio" name="gender"  value="M" @if($profile->gender == 'M' ) checked @endif > Male
                                    <input type="radio" name="gender" value="F" @if($profile->gender == 'F' ) checked @endif> Female

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
@endsection