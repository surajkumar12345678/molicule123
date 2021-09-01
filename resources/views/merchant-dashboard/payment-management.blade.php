@extends('layouts.merchantdashboard')
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
$COD = $payment->COD ?? null;
$payment_gateway = $payment->payment_gateway ?? null;
$payple_username = $payment->payple_username ?? null;
$payple_password = $payment->payple_password ?? null;
$payple_signature = $payment->payple_signature ?? null;
$yoco_client_id = $payment->yoco_client_id ?? null;
$yoco_secret_id = $payment->yoco_secret_id ?? null;
$payfast_client_id = $payment->payfast_client_id ?? null;
$payfast_secret_id = $payment->payfast_secret_id ?? null;
$payple_option = $payment->payple_option ?? null;
$yoco_option = $payment->yoco_option ?? null;
$payfast_option = $payment->payfast_option ?? null;
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
                    <h3 style="color:#1F85EC">Payment Option</h3>
                </div>

            </div>
        </div>
        <hr>
        <div class="container table-responsive">
            <form action="{{ route('payment.option.form')}}" method="POST" enctype="multipart/form-data" class="container">
                @csrf
                <input type="hidden" name="id" value="{{$id}}">

                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="inputEmail3" class="form-control-label">Payment Option</label>
                    </div>
                    <div class="col-md-5">
                        <label for="inputEmail3" class="form-control-label">COD</label>
                        <input data-size="mini" data-id="{{$id}}"  @if($COD == 0) @else checked @endif action="cod-change-status" class="cb-value togglecod" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive">
                    </div>
                    <div class="col-md-5">
                        <label for="inputEmail3" class="form-control-label">Payment Gateway</label>
                        <input data-size="mini" data-id="{{$id}}"  @if($payment_gateway == 0) @else checked @endif action="payment-change-status" class="cb-value togglepayment" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                            <label for="inputEmail3" class="form-control-label">Paypal Payment Gateway Enable</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" value="{{$payple_client_id}}"name="payple_client_id" class="form-control" placeholder="Enter Payple Client id"  >

                    </div>

                </div>
                <div id="paypal" style="@if($payple_option == 1) @else display:none @endif">
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="inputEmail3" class="form-control-label">Paypal API username</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" value="{{$payple_username}}"name="payple_username" class="form-control" placeholder="Enter Payple Client id"  >

                        </div>

                    </div>
                    <div class="col-md-10">
                        <input type="text" value="{{$payple_secret_id}}"name="payple_secret_id" class="form-control" placeholder="Enter Payple Secret id"  >

                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                            <label for="inputEmail3" class="form-control-label">YOCO Payment Gateway Enable</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" value="{{$yoco_client_id}}"name="yoco_client_id" class="form-control" placeholder="Enter YOCO Client id"  >

                    </div>

                </div>

                <div id="yoco" style="@if($yoco_option == 1) @else display:none @endif">
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="inputEmail3" class="form-control-label">YOCO Client id</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" value="{{$yoco_client_id}}"name="yoco_client_id" class="form-control" placeholder="Enter YOCO Client id"  >

                        </div>

                    </div>
                    <div class="col-md-10">
                        <input type="text" value="{{$yoco_secret_id}}"name="yoco_secret_id" class="form-control" placeholder="Enter YOCO Secret id"  >

                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                            <label for="inputEmail3" class="form-control-label">Payfast Payment Gateway Enable</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" value="{{$payfast_client_id}}"name="payfast_client_id" class="form-control" placeholder="Enter Payfast Client id"  >

                    </div>

                </div>

				<div id="payfast" style=" @if($payfast_option == 1) @else display:none @endif">
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="inputEmail3" class="form-control-label">Payfast Merchant id</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" value="{{$payfast_client_id}}"name="payfast_client_id" class="form-control" placeholder="Enter Payfast Client id"  >

                        </div>

                    </div>
                    <div class="col-md-10">
                        <input type="text" value="{{$payfast_secret_id}}"name="payfast_secret_id" class="form-control" placeholder="Enter Payfast Secret id"  >

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


<script>


toggleClass();

function toggleClass() {
    $('.togglepayment').change(function() {

        var formAction = $(this).attr('action');
        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };
        var status = $(this).prop('checked') == true ? 1 : 0;
        var id = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/" + formAction,
            data: {
                'status': status,
                'id': id
            },
            success: function(data) {
                console.log(data.success)
                toastr.success(data.success);
            }
        });
    })

    $('.togglecod').change(function() {

        var formAction = $(this).attr('action');
        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };
        var status = $(this).prop('checked') == true ? 1 : 0;
        var id = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/" + formAction,
            data: {
                'status': status,
                'id': id
            },
            success: function(data) {
                console.log(data.success)
                toastr.success(data.success);
            }
        });
    })
    $('.togglepaypal').change(function() {

        var formAction = $(this).attr('action');
        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };
        var status = $(this).prop('checked') == true ? 1 : 0;
        var id = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/" + formAction,
            data: {
                'status': status,
                'id': id
            },
            success: function(data) {
                if(data.status == '1'){
                    $('#paypal').show();
                }else{
                    $('#paypal').hide();
                }

                console.log(data.success)
                toastr.success(data.success);

            }
        });
    })

    $('.toggleyoco').change(function() {

        var formAction = $(this).attr('action');
        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };
        var status = $(this).prop('checked') == true ? 1 : 0;
        var id = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/" + formAction,
            data: {
                'status': status,
                'id': id
            },
            success: function(data) {
                if(data.status == '1'){
                    $('#yoco').show();
                }else{
                    $('#yoco').hide();
                }

                console.log(data.success)
                toastr.success(data.success);

            }
        });
    })

    $('.togglepayfast').change(function() {

        var formAction = $(this).attr('action');
        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };
        var status = $(this).prop('checked') == true ? 1 : 0;
        var id = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/" + formAction,
            data: {
                'status': status,
                'id': id
            },
            success: function(data) {
                if(data.status == '1'){
                    $('#payfast').show();
                }else{
                    $('#payfast').hide();
                }

                console.log(data.success)
                toastr.success(data.success);

            }
        });
    })


}


</script>

@endpush
