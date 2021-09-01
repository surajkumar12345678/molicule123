@extends('layouts.merchantdashboard')
@section('style')
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
@endsection @section('content')
<div class="padding">
    <div class="box">
        <div class="container">
            <div class="row">
                <a href="#" class="btn btn-info btn-sm text-white" onClick="window.print();return false">Download</a>
            </div>
        </div>
        <hr>
        <div class="table-responsive">
            <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th colspan="4">Order Details</th>
                    </tr>
                    <tr>
                        <td colspan="1">
                           <span> <strong>{{$store->store_name}}</strong> </span><br>
                           <span> Address: {{$store->about_store}} </span><br>
                           <span> Telephone: @if($merchant->mobile_number) {{$merchant->mobile_number}} @else N/A @endif</span><br>
                           <span> Email: @if($merchant->email) {{$merchant->email}} @else N/A @endif</span><br>
                           <span> Web Site: @if($store->domain_name) {{$store->domain_name}} @else N/A @endif</span>
                        </td>
                        <td colspan="3">
                            <span> Dated Added : {{$sale->updated_at}} </span><br>
                           <span> Order ID : {{$sale->order_id}} </span><br>
                           <span> Payment Method : @if($sale->payment_type == 1) Payment Gateway @else COD @endif </span>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="1">
                           <p> Payment Address </p>
                        </th>
                        <th colspan="3">
                            <p> Shipping Address </p>
                        </th>
                    </tr>
                    <tr>
                        <td colspan="1">
                           <span> <strong>{{$sale->name}}</strong> </span><br>
                           <span> {{$sale->address}} </span><br>
                           <span> {{$sale->city}} - {{$sale->Pincode}}</span><br>
                           <span> {{$sale->mobile}}</span>
                        </td>
                        <td colspan="3">
                            <span> <strong>{{$sale->name}}</strong> </span><br>
                           <span> {{$sale->address}} </span><br>
                           <span> {{$sale->city}} - {{$sale->Pincode}}</span><br>
                           <span> {{$sale->mobile}}</span>
                        </th>
                    </tr>
                    <tr>
                        <th>Product</th>
                        <th>Variation  </th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
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
                        <th colspan="2"></th>
                        <th>Sub Total</th>
                        <th>{{number_format($total,2)}}</th>
                    </tr>
                    <tr>
                        <th colspan="2"></th>
                        <th>Shipping Charge</th>
                        <th>{{$sale->shipping_charge}}</th>
                    </tr>
                    <tr>
                        <th colspan="2"></th>
                        <th>Discount Amount</th>
                        <th>{{$sale->discount}}</th>
                    </tr>
                    <tr>
                        <th colspan="2"></th>
                        <th>Final Amount</th>
                        <th>{{ $sale->net_amount }}</th>
                    </tr>
                    <tr style="display:none">
                        <th colspan="2"></th>
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
    </div>
    </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="cancellModal{{$sale->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3>Enter Reasons for Cancellation</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('order-cancell')}}" method="post" accept-charset="utf-8" >
            @csrf
            <input class="" value="{{$sale->id}}" type="hidden"  name="id"/>
            <input class="" value="4" type="hidden"  name="status"/>
            <fieldset>
            <!-- Text input-->
            <div class="col-md-12 form-group">
                <label class="control-label">Remark :</label>
                <textarea required id="remark" name="remark" rows="4" cols="10" class="form-control"></textarea>
            </div>
            
            <div class="col-md-12 form-group user-form-group">
                <div class="pull-left">
                    <button name="signupBtn" type="submit" value="true" id=""
                        class="btn btn-success btn-sm">
                        Submit <span id="" class="load_register load-btn"
                            style="display:none"></span>
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


<script>
function myFunction() {
    if (document.getElementById('digital').checked == true) {
        document.getElementById('digital_item').style.display = 'block';
        document.getElementById('physical_item').style.display = 'none';
    }
    if (document.getElementById('physical').checked == true) {
        document.getElementById('physical_item').style.display = 'block';
        document.getElementById('digital_item').style.display = 'none';
    }
}
</script>
@endsection


@push('custom_js')
<script>
    
toggleClass();

function toggleClass() {
    $('.toggleProject').change(function() {

        var mainParent = $(this).parent('.toggle-btn');
        if ($(mainParent).find('input.cb-value').is(':checked')) {
            $(mainParent).addClass('active');
        } else {
            $(mainParent).removeClass('active');
        }
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
}

$('.data-table').DataTable({
    "order": [
        [0, "desc"]
    ],
    dom: 'Bfrtip',
    lengthMenu: [
        [10, 25, 50, -1],
        ['10 rows', '25 rows', '50 rows', 'Show all']
    ],
    buttons: [
        'pageLength',
        'csv',
    ],
    "processing": true,
    "serverSide": true,
    "ajax": {
        "url": "{{ route('order.management') }}",
        "dataType": "json",
        "type": "GET",
    },
    "fnDrawCallback": function() {

        //$('.toggle-class').bootstrapToggle();
        toggleClass();
    },

    columns: [
				{data: 'id', name: 'id'},
				{data: 'name', name: 'name'},
				{data: 'mobile', name: 'mobile'},
				{data: 'order_id', name: 'order_id'},
				{data: 'date', name: 'date'},
				{data: 'net_amount', name: 'net_amount'},
				{data: 'address', name: 'address'},
				{data: 'payment_type', name: 'payment_type'},
				{data: 'status', name: 'status'},
				{data: 'action', name: 'action'},
			]
});
</script>
@endpush