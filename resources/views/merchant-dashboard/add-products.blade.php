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
$id = $product->id ?? null;
$cate = $product->category ?? null;
$title = $product->title ?? null;
$description = $product->description ?? null;
$feature_image = $product->feature_image ?? null;
$type = $product->product_type ?? null;
$sku = $product->sku ?? null;
$price = $product->price ?? null;
$gtin = $product->gtin ?? null;
$product_mode = $product->product_mode ?? null;
$digital_file = $product->digital_file ?? null;
$shipping = $product->shipping ?? null;
$best_seller = $product->best_seller ?? null;
$weight = $product->weight ?? null;
$feature_home = $product->feature_home ?? null;
$feature_category = $product->feature_category ?? null;
$stock = $product->stock ?? null;

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
    <h3 style="color:#1F85EC">Add Product</h3>
    <div class="box">
        <div class="box-header"></div>

        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <a type="button" class="btn btn-primary text-white" href="{{ route('product-management')}}">
                        Products Lits</a>

                    <!-- <button class="btn btn-sm white">Apply</button>                 -->
                </div>

            </div>
        </div>
        <hr>
        <div class="container table-responsive">
            <form action="{{ url('MerchantProduct_Management/store')}}" method="POST" enctype="multipart/form-data" class="container">
                @csrf
                <input type="hidden" name="id" value="{{$id}}">
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="inputEmail3" class="form-control-label">Select Category</label>
                    </div>
                    <div class="col-md-10">
                        <select name="category" class="form-control" required> 
                          <option value="">Select category</option>
                          
                          @foreach($categories as $category)
                            <option @if($cate == $category->category_name) selected @endif value="{{ $category->category_name }} ">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="inputEmail3" class="form-control-label">Enter Title</label>
                    </div>
                    <div class="col-md-10">
                      <input type="text" value="{{$title}}"name="title" class="form-control" placeholder="Title" required >
                    </div>
                    @error('title')
                    <p class="alert" style="color:red">{{ $message }}</p>
                    @enderror
                   
                </div>
                
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="inputEmail3" class="form-control-label">Product Image</label>
                    </div>
                    <div class="col-md-10">
                        <div class="row">
                        @if(!empty($feature_image))
                            @php $images = explode(',',$feature_image);  @endphp 
                                @foreach($images as $key=>$image)
                                    <div class="col-md-2 mb-2" id="data{{$key}}"> <span data-id="data{{$key}}" class="deleteimage">x</span>
                                        <img width="100" src="{{ asset('uploads/products/images')}}/{{$image}}" class="img-sm border">
                                        <input type="hidden" name="images[]" value="{{$image}}">
                                    </div>
                                @endforeach
                        @endif
                        </div>
                        <div class="input-images"></div>
                    </div> 
                    @error('feature_image') <div class="alert alert-danger">{{ $message }}</div> @enderror
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="inputEmail3" class="form-control-label">Product Type</label>
                    </div>
                    <div class="col-md-10">
                        <select required name="product_type" onclick="select()" id="product_type" class="form-control c-select">
                            <option value="">Select product type</option>
                            @foreach($product_types as $product_type) 
                              <option @if($type == $product_type->product_type_name) selected @endif value="{{ $product_type->product_type_name }}" >{{ $product_type->product_type_name }} </option> 
                            @endforeach 
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="inputEmail3" class="form-control-label">Enter SKU</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" value="{{$sku}}" class="form-control" name="sku" placeholder="Enter SKU" required>
                    </div>
                </div>
               
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="inputEmail3" class="form-control-label">Enter Price</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" value="{{$price}}" class="form-control" name="price" placeholder="Enter Price" required onkeypress="return /[0-9 ]/i.test(event.key)">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="inputEmail3" class="form-control-label">Enter Stocks</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" value="{{$stock}}" class="form-control" name="stock" placeholder="Enter Stocks" required onkeypress="return /[0-9]/i.test(event.key)">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="inputEmail3" class="form-control-label">Enter GTIN</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" value="{{$gtin}}" class="form-control" name="gtin" placeholder="Enter GTIN Price" required onkeypress="return /[0-9 ]/i.test(event.key)">
                    </div>
                </div>
                <div class="form-group row" >
                    <div class="col-md-2">
                        <label for="inputEmail3" class="form-control-label"> Is your product? </label>
                    </div>
                  
                    <div class="col-md-2">
                       <label for="digital">
                          <input required type="radio" @if($product_mode == 'digital') checked @endif onclick="myFunction()" id="digital" value="digital" name="product_mode">
                        Digital</label>
                    </div>
                    <div class="col-md-2">
                        <label for="physical">
                          <input required type="radio" @if($product_mode == 'physical') checked @endif onclick="myFunction()" value="physical" id="physical" name="product_mode">
                        Physical</label>
                        <br>
                    </div>
                      <div class="col-md-10 offset-md-2" id="digital_item" style="@if($product_mode == 'digital')  @else display:none; @endif">
                        <input type="file"  name="digital_file" class="form-control" onchange="loadFile()" accept=".png, .jpg, .jpeg">
                        <p><img id="output" width="100" @if($digital_file)
                                        src="{{asset('/uploads/products/digital_file')}}/{{$digital_file}}" @endif></p>


                      </div>
                      <div class="col-md-10 offset-md-2" id="physical_item" style="@if($product_mode == 'physical')  @else display:none; @endif">
                          <div class="row" >
                            <div class="col-md-4">
                                <label for="inputEmail3" class="form-control-label"> Require Shipping or Not ? </label>
                            </div>
                            <div class="col-md-2" style="display: flex;align-items: center;">
                                <input  type="radio" id="Yes" value="Yes" name="shipping" @if($shipping == 'Yes') checked @endif>
                                <label for="Yes" style="margin-bottom:0; margin-left:5px"> Yes</label>
                            </div>
                            <div class="col-md-2"  style="display: flex;align-items: center;">
                                <input  type="radio" value="No" id="No" name="shipping" @if($shipping == 'No') checked @endif>
                                <label for="No"  style="margin-bottom:0; margin-left:5px"> No</label>
                              
                            </div>
                          </div>
                      </div>
                </div>
                <div class="row" >
                    <div class="col-md-2">
                        <label for="inputEmail3" class="form-control-label">  Best Seller ?  </label>
                    </div>
                    <div class="col-md-2" style="display: flex;align-items: center;">
                        <input required type="radio" id="Yes1" value="Yes" name="best_seller" @if($best_seller == 'Yes') checked @endif>
                        <label for="Yes1" style="margin-bottom:0; margin-left:5px"> Yes</label>
                    </div>
                    <div class="col-md-2"  style="display: flex;align-items: center;">
                        <input required type="radio" value="No" id="No1" name="best_seller" @if($best_seller == 'No') checked @endif>
                        <label for="No1"  style="margin-bottom:0; margin-left:5px"> No</label>
                      
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="inputEmail3" class="form-control-label">Enter Weight</label>
                    </div>
                    <div class="col-md-10">
                        <input required type="text" class="form-control" value="{{$weight}}" name="weight" placeholder="Weight">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                       
                    </div>
                    <div class="col-md-10">
                    Feature on Home page
                        <input type="checkbox" class="m-1" name="feature_home" @if($feature_home) checked @endif>
                        Feature on Category page
                    <input type="checkbox" class="m-1" name="feature_category" @if($feature_category) checked @endif>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="inputEmail3" class="form-control-label">Enter Description</label>
                    </div>
                    <div class="col-md-10">
                        <textarea required type="text" rows="4" cols="50" name="description" class="form-control">{{$description}}</textarea>
                    </div> 
                    @error('description') <div class="alert alert-danger">{{ $message }}</div> @enderror
                </div>
                 
                <div class="form-group row m-t-md">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn white">Submit</button>
                    </div>
                </div>
            </form>
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

$('.deleteimage').click(function(e) {  
		var data=$(this).data('id');
		$('#'+data).remove();
	});

    function loadFile() {
    var image = document.getElementById('output');
    image.src = URL.createObjectURL(event.target.files[0]);
}
</script>
@endsection


@push('custom_js')
<script type="text/javascript" src="{{ asset('web-layouts/dragimage/src/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('web-layouts/dragimage/dist/image-uploader.min.js')}}"></script>
<script>
$('.input-images').imageUploader();

</script>
@endpush