@extends('layouts.admin')
@section('title',__('Change Password'))
@section('content')
<div class="padding">
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
    <div class="row">
        <br>
    </div>
    
    <div class="box">
        <div class="box-header"></div>

        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                  <h3 style="color:#1F85EC">Change Password</h3>
                </div>

            </div>
        </div>
        <hr>
        <div class="container table-responsive">
            <form action="{{ route('admin.changepassword')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-md-6">
                    <label for="inputName">Enter Old Password</label>
                    <input required type="password" id="inputName" class="form-control" name="old_pass">
                    @error('old_pass')
                    <p class="alert" style="color:red">{{ $message }}
                    <p>
                        @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="inputName">Enter New Password</label>
                    <input required type="password" id="inputName" class="form-control" name="password">
                    @error('password')
                    <p class="alert" style="color:red">{{ $message }}
                    <p>
                        @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="inputName">Enter Confirm Password</label>
                    <input required type="password" id="inputName" class="form-control" name="password_confirmation">
                    @error('confirm')
                    <p class="alert" style="color:red">{{ $message }}
                    <p>
                        @enderror
                </div>
                <div class="form-group col-md-12">
                    <input type="submit" id="inputProjectLeader" class="btn btn-primary">
                </div>
            </form>
        </div>

    </div>
</div>
</div>

@endsection