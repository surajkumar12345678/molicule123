@extends('layouts.web_layout')

@section('content')

<style>
.shopping-cart .cart-total_block {
    margin-top: 0px;
}
</style>
<style type="text/css">
.table-wrapper {
    background: whitesmoke;
    padding: 20px 25px;
    margin: 30px auto;
    border-radius: 3px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
}



.table-title .btn i {
    float: left;
    font-size: 21px;
    margin-right: 5px;
}

.table-title .btn span {
    float: left;
    margin-top: 2px;
}

.table-title {
    color: #fff;
    background: #4b5366;
    padding: 16px 25px;
    margin: -20px -25px 10px;
    border-radius: 3px 3px 0 0;
}

.table-title h2 {
    margin: 5px 0 0;
    font-size: 24px;
}

.show-entries select.form-control {
    width: 60px;
    margin: 0 5px;
}

.table-filter .filter-group {
    float: right;
    margin-left: 15px;
}

.table-filter input,
.table-filter select {
    height: 34px;
    border-radius: 3px;
    border-color: #ddd;
    box-shadow: none;
}

.table-filter {
    padding: 5px 0 15px;
    border-bottom: 1px solid #e9e9e9;
    margin-bottom: 5px;
}

.table-filter .btn {
    height: 34px;
}

.table-filter label {
    font-weight: normal;
    margin-left: 10px;
}

.table-filter select,
.table-filter input {
    display: inline-block;
    margin-left: 5px;
}

.table-filter input {
    width: 200px;
    display: inline-block;
}

.filter-group select.form-control {
    width: 110px;
}

.filter-icon {
    float: right;
    margin-top: 7px;
}

.filter-icon i {
    font-size: 18px;
    opacity: 0.7;
}

table.table tr th,
table.table tr td {
    border-color: #e9e9e9;
    padding: 12px 15px;
    vertical-align: middle;
}

table.table tr th:first-child {
    width: 60px;
}

table.table tr th:last-child {
    width: 80px;
}

table.table-striped tbody tr:nth-of-type(odd) {
    background-color: #fcfcfc;
}

table.table-striped.table-hover tbody tr:hover {
    background: #f5f5f5;
}

table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}

table.table td a {
    font-weight: bold;
    color: #566787;
    display: inline-block;
    text-decoration: none;
}

table.table td a:hover {
    color: #2196F3;
}

table.table td a.view {
    width: 30px;
    height: 30px;
    color: #2196F3;
    border: 2px solid;
    border-radius: 30px;
    text-align: center;
}

table.table td a.view i {
    font-size: 22px;
    margin: 2px 0 0 1px;
}

table.table .avatar {
    border-radius: 50%;
    vertical-align: middle;
    margin-right: 10px;
}

.status {
    font-size: 30px;
    margin: 2px 2px 0 0;
    display: inline-block;
    vertical-align: middle;
    line-height: 10px;
}

.text-success {
    color: #10c469;
}

.text-info {
    color: #62c9e8;
}

.text-warning {
    color: #FFC107;
}

.text-danger {
    color: #ff5b5b;
}

.pagination {
    float: right;
    margin: 0 0 5px;
}

.pagination li a {
    border: none;
    font-size: 13px;
    min-width: 30px;
    min-height: 30px;
    color: #999;
    margin: 0 2px;
    line-height: 30px;
    border-radius: 2px !important;
    text-align: center;
    padding: 0 6px;
}

.pagination li a:hover {
    color: #666;
}

.pagination li.active a {
    background: #03A9F4;
}

.pagination li.active a:hover {
    background: #0397d6;
}

.pagination li.disabled i {
    color: #ccc;
}

.pagination li i {
    font-size: 16px;
    padding-top: 6px
}

.hint-text {
    float: left;
    margin-top: 10px;
    font-size: 13px;
}
</style>
<!-- ***** Welcome Area Start ***** -->
<br><br>
<div class="container">
    <a style="font-size: 25px;" href="{{ route('user-profile')}}"><i class="fa fa-chevron-circle-left"
            aria-hidden="true"></i>&nbsp;&nbsp;Back to Profile</a>
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-4">
                    <h2>Order <b>Details</b></h2>
                </div>

            </div>
        </div>
        <div class="table-filter">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Location</th>
                        <th>Order Id</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Net Amount</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $count = "1"; @endphp
                    @forelse($sales as $sale)
                    <tr>
                        <td>{{$count}}</td>
                        <td>{{$sale->address}}, {{$sale->city}} {{$sale->Pincode}}</td>
                        <td>{{$sale->order_id}}</td>
                        <td>{{date('M', strtotime($sale->created_at))}}, {{date('d-Y', strtotime($sale->created_at))}}
                        </td>
                        <td>

                            @if($sale->status == '0')
                            <span class="btn btn-outline-warning btn-sm">Pending</span>
                            @elseif($sale->status == '1')
                            <span class="btn btn-outline-primary btn-sm">Procesing</span>
                            @elseif($sale->status == '2')
                            <span class="btn-outline-info btn-sm">Shipped</span>
                            @elseif($sale->status == '5')
                            <span class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="top"
                                title="">Cancelled</span>
                            @elseif($sale->status == '4')
                            <span class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="top"
                                title="">Cancelled</span>
                            @elseif($sale->status == '3')
                            <span class="btn btn-outline-success btn-sm">Complited</span>
                            @endif


                        </td>
                        <td>${{$sale->net_amount}}</td>
                        <td><a href="#" data-toggle="modal" data-target="#view{{$sale->id}}" class="view"
                                title="View Details" data-toggle="tooltip"><i class="fa fa-eye"
                                    aria-hidden="true"></i></a>
                        </td>
                        <td>
                            @if($sale->status != 3 && $sale->status != 4 && $sale->status != 5)
                            <a class="btn btn-danger btn-sm text-white" data-toggle="modal"
                                data-target="#cancellModal{{$sale->id}}"><i class="fa fa-times" aria-hidden="true"></i>
                                Cancel</a>
                            @endif

                        </td>
                    </tr>
                    @php $count++; @endphp
                    @empty
                    <tr>
                        <td colspan="6">Data not available</td>

                    </tr>

                    @endforelse

                </tbody>
            </table>
        </div>
    </div>


    <!-- Modal -->
    @foreach($sales as $sale)
    <div class="modal fade " id="view{{$sale->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3><i class="fa fa-bars m-r-5"></i> VIEW SALE DETAIL</h3>

                </div>
                <div class="modal-body">
                    <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Variation  </th>
                                <th>Quantity</th>
                                <th>Order Status</th>
                                <th>Payment Status</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $count="1";
                            $total ="0";

                            @endphp
                            @foreach($getOrders as $saledetail)
                            @if($sale->order_id == $saledetail->order_id)
                            <tr>
                                <td>{{$count}}</td>
                                <td>

                                    <img src="{{ asset('uploads/products/images/'.$saledetail->product_image)}}"
                                        alt="producats1" class="img-fluid " style="width: 62px;">

                                </td>
                                <td>{{$saledetail->product_name}}</td>
                                <td>
                                        @php 
                                        $product_attribute_value_id = DB::table('product_attribute_value_id')->get();
                                        $name1 ="";
                                        $value_id = explode(',',$saledetail->attributes); 
                                        
                                        @endphp
                                        @foreach($product_attribute_value_id as $attribute_value)
                                            @foreach($value_id as $value)
                                                @if($attribute_value->id == $value)
                                                    @php $name1.= $attribute_value->attribute_value." + "; @endphp
                                                @endif
                                            @endforeach
                                        @endforeach
                                       @php echo $cond = rtrim($name1," + "); @endphp
                                       
                                </td>
                                <td>{{$saledetail->qty}}</td>
                                <td>
                                    @php
                                    if($saledetail->order_status == '0'){
                                    $status = 'Pending';
                                    }elseif($saledetail->order_status == '1'){
                                    $status = 'Approved';
                                    }elseif($saledetail->order_status == '2'){
                                    $status = 'Order Shipped';
                                    }elseif($saledetail->order_status == '4'){
                                    $status = 'Cancel by admin';
                                    }elseif($saledetail->order_status == '5'){
                                    $status = 'Cancel by user';
                                    }elseif($saledetail->order_status == '3'){
                                    $status = 'Delivered';
                                    }

                                    @endphp
                                    {{$status}}
                                </td>
                                <td>@if($saledetail->payment_status == '0') <span
                                        class="label-warning label label-default">pending</span> @else <span
                                        class="label-custom label label-default">Approved</span> @endif</td>
                                <td>{{$saledetail->sub_total}}</td>
                            </tr>


                            @php
                            $count++;
                            $total += $saledetail->sub_total;
                            @endphp
                            @endif
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="6"></th>
                                <th>Sub Total</th>
                                <th>{{number_format($total,2)}}</th>
                            </tr>
                            <tr>
                                <th colspan="6"></th>
                                <th>Shipping Charge</th>
                                <th>{{$sale->shipping_charge}}</th>
                            </tr>
                            <tr>
                                <th colspan="6"></th>
                                <th>Discount Amount</th>
                                <th>{{$sale->discount}}</th>
                            </tr>
                            <tr>
                                <th colspan="6"></th>
                                <th>Final Amount</th>
                                <th>{{ $sale->net_amount }}</th>
                            </tr>
                            <tr style="display:none">
                                <th colspan="6"></th>
                                <th>Coupon code Applied</th>
                                <th>
                                    @php
                                    echo "NA";
                                    @endphp
                                </th>
                            </tr>

                        </tfoot>
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="cancellModal{{$sale->id}}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Enter Reasons for Cancellation</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('order-cancell-user')}}" method="post" accept-charset="utf-8">
                        @csrf
                        <input class="" value="{{$sale->id}}" type="hidden" name="id" />
                        <input class="" value="5" type="hidden" name="status" />
                        <fieldset>
                            <!-- Text input-->
                            <div class="col-md-12 form-group">
                                <label class="control-label">Remark :</label>
                                <textarea required id="remark" name="remark" rows="4" cols="10"
                                    class="form-control"></textarea>
                            </div>

                            <div class="col-md-12 form-group user-form-group">
                                <div class="pull-left">
                                    <button name="signupBtn" type="submit" value="true" id=""
                                        class="btn btn-success btn-sm">
                                        Submit <span id="" class="load_register load-btn" style="display:none"></span>
                                    </button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    @endforeach


    @endsection

    @push('custom_js')

    @endpush