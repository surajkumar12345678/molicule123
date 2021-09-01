@extends('layouts.admin')
@section('style')
<link type="text/css" rel="stylesheet" href="{{ asset('web-layouts/dragimage/dist/image-uploader.min.css')}}">
<!-- include libraries(jQuery, bootstrap) -->

<style type="text/css">
.box .dataTables_wrapper {
    /* padding-top: 10px; */
    padding-left: 20px;
    padding-right: 20px;
}

.sb-example-1 .search {
    width: 100%;
    position: relative;
    display: flex;
}

.sb-example-1 .searchTerm {
    width: 100%;
    border: none;
    padding: 10px;
    margin-left: 70px;
}

.sb-example-1 .searchTerm:focus {
    color: #00B4CC;
}

.sb-example-1 .searchButton {
    width: 40px;
    /* height: 50px; */
    border: 1px solid #ffffff;
    background: #ffffff;
    text-align: center;
    color: #10000045;
    /* border-radius: 0 5px 5px 0; */
    cursor: pointer;
    font-size: 20px;
}

.productcss {
    width: 65%;
}

.toggle-btn {
    width: 75px;
    height: 30px;
    margin: 5px;
    border-radius: 50px;
    display: inline-block;
    position: relative;
    background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAyklEQVQ4T42TaxHCQAyENw5wAhLACVUAUkABOCkSwEkdhNmbpHNckzv689L98toIAKjqGcAFwElEFr5ln6ruAMwA7iLyFBM/TPDuQSrxwf6fCKBoX2UMIYGYkg8BLOnVg2RiAEexGaQQq4w9e9klcxGLLAUwgDAcihlYAR1IvZA1sz/+AAaQjXhTQQVoe2Yo3E7UQiT2ijeQdojRtClOfVKvMVyVpU594kZK9zzySWTlcNqZY9tjCsUds00+A57z1e35xzlzJjee8xf0HYp+cOZQUQAAAABJRU5ErkJggg==") no-repeat 50px center #e74c3c;
    cursor: pointer;
    -webkit-transition: background-color 0.4s ease-in-out;
    -moz-transition: background-color 0.4s ease-in-out;
    -o-transition: background-color 0.4s ease-in-out;
    transition: background-color 0.4s ease-in-out;
    cursor: pointer;
}

.toggle-btn.active {
    background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAmUlEQVQ4T6WT0RWDMAhFeZs4ipu0mawZpaO4yevBc6hUIWLNd+4NeQDk5sE/PMkZwFvZywKSTxF5iUgH0C4JHGyF97IggFVSqyCFga0CvQSg70Mdwd8QSSr4sGBMcgavAgdvwQCtApvA2uKr1x7Pu++06ItrF5LXPB/CP4M0kKTwYRIDyRAOR9lJTuF0F0hOAJbKopVHOZN9ACS0UgowIx8ZAAAAAElFTkSuQmCC") no-repeat 10px center #2ecc71;
}

.toggle-btn.active .round-btn {
    left: 45px;
}

.toggle-btn .round-btn {
    width: 20px;
    height: 20px;
    background-color: #fff;
    border-radius: 50%;
    display: inline-block;
    position: absolute;
    left: 5px;
    top: 62%;
    margin-top: -15px;
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

.toggle-btn .cb-value {
    position: absolute;
    left: 0;
    right: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    z-index: 9;
    cursor: pointer;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
}

.made-with-love {
    position: fixed;
    left: 0;
    width: 100%;
    bottom: 10px;
    text-align: center;
    font-size: 10px;
    z-index: 9999;
    font-family: arial;
    color: #fff;
}

.made-with-love i {
    font-style: normal;
    color: #F50057;
    font-size: 14px;
    position: relative;
    top: 2px;
}

.made-with-love a {
    color: #fff;
    text-decoration: none;
}

.made-with-love a:hover {
    text-decoration: underline;
}
</style>

@php
$id = $payment->id ?? null;
$payment_option = $payment->payment_option ?? null;
$payple_client_id = $payment->payple_client_id ?? null;
$payple_secret_id = $payment->payple_secret_id ?? null;
$yoco_client_id = $payment->yoco_client_id ?? null;
$yoco_secret_id = $payment->yoco_secret_id ?? null;
$payfast_client_id = $payment->payfast_client_id ?? null;
$payfast_secret_id = $payment->payfast_secret_id ?? null;
@endphp
@endsection @section('content')
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
                <div class="col-sm-3">
                    <h3 style="color:#1F85EC">Payment Option </h3>
                </div>

            </div>
        </div>
        <hr>
        <div class="container table-responsive">
            <form action="{{ route('admin.payment.management.admin')}}" method="POST" enctype="multipart/form-data" class="container">
                @csrf
                <div class="form-group row">
                    <div class="col-md-2">
                        <label class="form-control-label">Payment Option</label>
                    </div>
                    @if($payment_option=='cod')
                    <div class="col-md-5">
                        <label for="inputEmail3" class="form-control-label">COD</label>
                        <input type="radio" name="payment_option" value="cod" data-size="mini"  class="cb-value togglepayment"  data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive" checked>
                    </div>
                    <div class="col-md-5">
                        <label for="inputEmail3" class="form-control-label">Payment Gateway</label>
                        <input type="radio" name="payment_option" value="payment_getway" data-size="mini"  class="cb-value togglepayment"  data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive">
                    </div>

                    @elseif($payment_option=='payment_getway')
                      <div class="col-md-5">
                          <label for="inputEmail3" class="form-control-label">COD</label>
                          <input type="radio" name="payment_option" value="cod" data-size="mini"  class="cb-value togglepayment"  data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive" >
                      </div>
                      <div class="col-md-5">
                          <label for="inputEmail3" class="form-control-label">Payment Gateway</label>
                          <input type="radio" name="payment_option" value="payment_getway" data-size="mini"  class="cb-value togglepayment"  data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive" checked>
                      </div>


                    @else
                      <div class="col-md-5">
                          <label for="inputEmail3" class="form-control-label">COD</label>
                          <input type="radio" name="payment_option" value="cod" data-size="mini"  class="cb-value togglepayment"  data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive" >
                      </div>
                      <div class="col-md-5">
                          <label for="inputEmail3" class="form-control-label">Payment Gateway</label>
                          <input type="radio" name="payment_option" value="payment_getway" data-size="mini"  class="cb-value togglepayment"  data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive">
                      </div>

                    @endif
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label class="form-control-label">Payple Client id</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" name="payple_client_id" class="form-control" placeholder="Enter Payple Client id"  value="{{$payple_client_id}}">

                    </div>

                </div>
				<div class="form-group row">
                    <div class="col-md-2">
                        <label class="form-control-label">Payple Secret id</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" name="payple_secret_id" class="form-control" placeholder="Enter Payple Secret id"  value="{{$payple_secret_id}}">

                    </div>

                </div>
				<div class="form-group row">
                    <div class="col-md-2">
                        <label class="form-control-label">YOCO Client id</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" name="yoco_client_id" class="form-control" placeholder="Enter YOCO Client id"  value="{{$yoco_client_id}}">

                    </div>

                </div>
				<div class="form-group row">
                    <div class="col-md-2">
                        <label class="form-control-label">YOCO Secret id</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" name="yoco_secret_id" class="form-control" placeholder="Enter YOCO Secret id"  value="{{$yoco_secret_id}}">

                    </div>

                </div>
				<div class="form-group row">
                    <div class="col-md-2">
                        <label class="form-control-label">Payfast Client id</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" name="payfast_client_id" class="form-control" placeholder="Enter Payfast Client id"  value="{{$payfast_client_id}}">

                    </div>

                </div>
				<div class="form-group row">
                    <div class="col-md-2">
                        <label class="form-control-label">Payfast Secret id</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" name="payfast_secret_id" class="form-control" placeholder="Enter Payfast Secret id" value="{{$payfast_secret_id}}" >

                    </div>

                </div>

                <div class="form-group row m-t-md">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn white">Update</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
</div>

@endsection
@push('custom_js')
@endpush
