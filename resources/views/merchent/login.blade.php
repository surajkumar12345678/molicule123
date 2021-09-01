@extends('layouts.merchent')

@section('style')
<style type="text/css">

</style>
@endsection
@section('content')
<!-- ***** Welcome Area Start ***** -->
<section id="home" class="section welcome-area bg-overlay overflow-hidden d-flex align-items-center">
            <div class="container">

                <div class="row align-items-center">
                    <div class="col-12 col-md-6 col-lg-6 offset-lg-3 res-margin">
                        <div class="card">

                        @if ($message = Session::get('error'))
                                       <div class="alert alert-danger alert-block my-4">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                           <strong>{{ $message }}</strong>
                                        </div>

                                     @endif
                                     @if ($message = Session::get('success'))
                                       <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                           <strong>{{ $message }}</strong>
                                        </div>

                                     @endif
                            <div class="card-header text-center">
                                <a href="" class="h2 colorprojct"> Molecule</a>
                            </div>
                            <div class="card-body">
                                
                                <form action="merchant/login" method="POST">  
                                @csrf
                                    <div class="input-group mb-3">
                                        <input type="email" name="email" value="{{ old('email') }}"class="form-control" placeholder="E-mail Address">
                                    </div>
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    <div class="input-group mb-3">
                                        <input type="password" name="password" class="form-control" placeholder="Password">

                                    </div>
                                            @error('password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror


                                    <div class="row">
                                        <div class="col-6">
                                            <div class="icheck-primary">

                                                <label for="remember_me" class="inline-flex items-center">
                                                   <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                                   <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                                 </label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="icheck-primary">
                                            @if (Route::has('password.request'))
                                              <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                               {{ __('Forgot your password?') }}
                                              </a>
                                            @endif
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </form>

                                <div class="social-auth-links text-center mt-2 mb-3">
                                    <br>
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
                                    Didn't Have Account? <a href="/register" class="text-center">Sign Up</a>
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
