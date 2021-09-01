@extends('layouts.web_layout') 

@push('custom_css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style type="text/css">
      
      .table-wrapper {
         background: whitesmoke;
         padding: 20px 25px;
         margin: 30px auto;
     border-radius: 3px;
         box-shadow: 0 1px 1px rgba(0,0,0,.05);
     }
   .table-wrapper .btn {
     float: right;
     color: #333;
       background-color: #fff;
     border-radius: 3px;
     border: none;
     outline: none !important;
     margin-left: 10px;
   }
   .table-wrapper .btn:hover {
         color: #333;
     background: #f2f2f2;
   }
   .table-wrapper .btn.btn-primary {
     color: #fff;
     background: #03A9F4;
   }
   .table-wrapper .btn.btn-primary:hover {
     background: #03a3e7;
   }
   .table-title .btn {   
     font-size: 13px;
     border: none;
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
   .table-filter input, .table-filter select {
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
   .table-filter select, .table-filter input {
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
     table.table tr th, table.table tr td {
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
@endpush
@section('content') 
<div class="container">
    <a style="font-size: 25px;" href="{{ route('user-profile')}}"><i class="fa fa-chevron-circle-left"
            aria-hidden="true"></i>&nbsp;&nbsp;Back to Profile</a>
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-4">
                    <h2>Wishlist <b>Details</b></h2>
                </div>
                <div class="col-sm-8">
                </div>
            </div>
        </div>
        <div class="table-filter">
        <table class="table table-striped table-hover"> 
                <thead>
                  <tr>
                    <th class="product-iamge" scope="col">Image</th>
                    <th class="product-name" scope="col">Product name</th>
                    <th class="product-price" scope="col">Price</th>
                    <th class="product-quantity" scope="col">Quantity</th>
                    <th class="product-total" scope="col">Total</th>
                    <th class="product-clear" scope="col"> 
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($wishlists as $wishlist)  
                        <tr>
                            <td class="product-iamge"> 
                            @php $images = explode(',',$wishlist->feature_image); @endphp
                            <div class="img-wrapper"><img src="{{ asset('uploads/products/images/'.$images[0])}}" alt="product image" style="width:40px"></div>
                            </td>
                            <td class="product-name">{{$wishlist->title}}</td>
                            <td class="product-price">${{$wishlist->price}}</td>
                            <td class="product-quantity"> 1
                            </td>
                            <td class="product-total">$
                            @php 
                                echo $subTotal = $wishlist->price*1;
                            @endphp
                            </td>
                            <td class="product-clear"> 
                            <button class="btn btn-danger"><a  href="{{url('user/remove-wishlist')}}/{{$wishlist->id}}"><i class="fa fa-trash" aria-hidden="true"></i></a></button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6"> 
                                Data not available
                            </td>
                        </tr>
                    @endforelse
                </tbody>
              </table>
            </div>
          </div>
          
      </div>
    </div>
    <!-- End shopping cart-->

@endsection
@push('custom_js')


@endpush