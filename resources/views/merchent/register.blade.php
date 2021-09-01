@extends('layouts.merchent')
@section('content')
     <!-- ***** Welcome Area Start ***** -->
     <section id="home" class="section welcome-area bg-overlay overflow-hidden d-flex align-items-center">
            <div class="container">

                <div class="row align-items-center">
                    <div class="col-12 col-md-6 col-lg-6 offset-lg-3 res-margin">
                        <div class="card">
                            <div class="card-header text-center pt-4 pb-0">
                                <a href="" class="h2 colorprojct">Create new account</a>
                            </div>
                            <div class="card-body pt-0">
                                
                                    @if (session('msg'))
                                        <p>{{ session('msg') }}</p>
                                    @endif
                                <form action="/register" method="POST" class="formarea-conten">
                                @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="input-group mb-2">
                                                <input type="text" value="{{ old('first_name') }}" name="first_name" class="form-control" placeholder="First Name ">
                                            </div>
                                            @error('first_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group mb-2">
                                                <input type="text" value="{{ old('last_name') }}" name="last_name" class="form-control" placeholder="Last Name">
                                            </div>
                                            @error('last_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="input-group mb-2">
                                        <input type="tel" value="{{ old('mobile_number') }}" name="mobile_number" class="form-control" placeholder="Mobile Number">
                                    </div>
                                    @error('mobile_number')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="input-group mb-2">
                                        <input type="text" value="{{ old('email') }}" name="email" class="form-control" placeholder="E-mail Address">
                                    </div>
                                    @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                     @enderror
                                    <div class="input-group mb-2">
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                    @error('password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="input-group mb-2">
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                                    </div>
                                    @error('cpassword')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="icheck-primary">
                                                <input name="terms_conditions" type="checkbox" id="remember">
                                                <label for="remember">
                                                    I agree to the terms and conditions
                                                </label>
                                            </div>
                                            @error('terms_conditions')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                             @enderror
                                        </div>
                        
                                        <!-- /.col -->
                                        <div class="col-12 mt-3">
                                            <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </form>

                                <div class="social-auth-links text-center mt-2 mb-3">

                                    <p>- Or Using -</p>
                                    <br>
                                    <a href="#" class="btn  btn-fcbk-clr">
                                        <i class="fab fa-facebook mr-2"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger golgle">
                                        <i class="fab fa-google-plus mr-2"></i>
                                    </a>
                                    <a href="#" class="btn btn-twitter-clr">
                                        <i class="fab fa-twitter mr-2"></i>
                                    </a>
                                </div>
                                <!-- /.social-auth-links -->

                                <p class="mb-1 text-center">
                                    Already Have Account?<a href="/login"> Login</a>
                                </p>

                            </div>
                            <!-- /.card-body -->
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
