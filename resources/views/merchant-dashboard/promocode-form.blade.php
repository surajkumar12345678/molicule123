@extends('layouts.merchantdashboard')
@section('style')
<style type="text/css">
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
.sb-example-1 .searchTerm:focus{
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
.productcss{
  width: 65%;
}
.imagecss{
  width: 25%;
  height: 25%;
}
</style>
@endsection
    
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
    <h3 style="color:#1F85EC">Add Product</h3>
    <div class="box">
        <div class="box-header"></div>

        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <a type="button" class="btn btn-primary text-white" href="{{ route('merchant-promocode-management')}}">
                        Promocode List</a>
                </div>

            </div>
        </div>
        <hr>
            <div class="container table-responsive">
                <form action="/merchant/AddPromocode" method="POST" enctype="multipart/form-data" class="container">
                @csrf  

                <div class="form-group row">
                    <div class="col-md-2">
                        <label class="form-control-label">Promocode Name</label>
                    </div>  
                    <div class="col-md-10">
                        <input type="text" name="promocode" class="form-control" placeholder="Enter Promocode" required>
                    </div>
                                    @error('promocode')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                </div>
                <div class="form-group row">  
                    <div class="col-md-2">
                        <label class="form-control-label">Promocode Description</label>
                    </div>
                    <div class="col-md-10">
                        <textarea type="text" name="description" row="4" col="50" class="form-control" placeholder="Enter Description" ></Textarea>
                    </div>
                                    @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                </div>
                <div class=" form-group row">
                    <div class="col-md-2">
                        <label class="form-control-label">Promocode Description</label>
                    </div>
                    <div class="col-md-2 mt-2">
                        <input type="radio" onclick="discounttype()" id="discount_per" value="percentage" name="discount_type">
                        <label for="discount_per">Percentage</label>
                    </div>
                    <div class="col-md-2 mt-2">
                        <input type="radio" onclick="discounttype()" id="discount_fix" value="fixed" name="discount_type">
                        <label for="discount_fix">Fixed Amount</label>
                        <br>
                    </div>
                </div>
                <div class="form-group row" id="percentage" style="display:none;"> 
                    <div class="col-md-10 offset-md-2">
                        <input type="text" name="discount_percentage" class="form-control" placeholder="Enter percentage of discount " >
                    </div>
                                    @error('discount_percentage')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                </div>
                <div class="form-group row" id="maximum_amount" style="display:none;"> 
                    <div class="col-md-10 offset-md-2">
                        <input type="text" name="max_amount" class="form-control" placeholder="Enter maximum amount of discount " >
                    </div>
                                    @error('max_amount')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                </div>
                <div class="form-group row" id="fixed" style="display:none;">
                    <div class="col-md-10 offset-md-2">
                        <input type="text" name="fixed_rate_discount" class="form-control" placeholder="Enter fixed amount of discount " >
                    </div>
                                    @error('fixed_rate_discount')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                    <label class="form-control-label">Maximum time single User can used</label> 
                    </div>   
                    <div class="col-md-10">
                        <input type="text" name="max_time_one_user" class="form-control" placeholder="Enter maximum time a single user can used. " >
                    </div>
                                    @error('max_time_one_user')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label class="form-control-label">Select Specific Product</label>
                    </div>
                    <div class="col-md-10">
                        <select name="specific_product" class="form-control c-select">
                        <option value="" Hidden>Select Specific Product</option>
                            @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->title }}</option>
                            @endforeach 
                        </select>
                    </div>
                    </div>
                    
                <div class="form-group row">
                    <div class="col-md-2">
                        <label class="form-control-label">Enter Start Date of validity</label>
                    </div>
                    <div class="col-md-10">
                        <input type="date" name="start_date" class="form-control">
                    </div>
                                    @error('start_date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label class="form-control-label">Enter Start Date of validity</label>
                    </div>   
                    <div class="col-md-10">
                        <input type="date" name="end_date" class="form-control">
                    </div>
                                    @error('end_date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                </div>
                <div class=" form-group row">
                    <div class="col-md-2">
                        <label class="form-control-label">Is your Promocode?</label>
                    </div>
                    <div class="col-md-2 mt-2">
                        <input type="radio" onclick="myfunction()" id="no_of_time_used" value="no of time used" name="promocode_mode">
                        <label for="digital">Number of times used</label>
                    </div>
                    <div class="col-md-2 mt-2">
                        <input type="radio" onclick="myfunction()" value="unlimited" id="unlimited" name="promocode_mode">
                        <label for="unlimited">Unlimited</label>
                        <br>
                    </div>
                </div>
                <div class="form-group row" id="show" style="display:none">
                    <div class="col-md-10 offset-md-2">
                        <input type="text" name="no_of_time_used" class="form-control" placeholder="Enter how many times promocode will used " >
                    </div>
                                    @error('no_of_time_used')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                </div>
                    <div class="form-group row m-t-md">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn white">Add</button>
                    </div>
                    </div>
                </form>
        </div>
                
    </div>
</div>
<script>
 
  function myfunction() {
    if (document.getElementById('no_of_time_used').checked == true) {
      document.getElementById('show').style.display = 'block';
    }
    if (document.getElementById('unlimited').checked == true) {
      document.getElementById('show').style.display = 'none';
    }
  }
  function discounttype() {
    if (document.getElementById('discount_per').checked == true) {
      document.getElementById('percentage').style.display = 'block';
      document.getElementById('fixed').style.display = 'none';
      document.getElementById('maximum_amount').style.display = 'block';
    }
    if (document.getElementById('discount_fix').checked == true) {
      document.getElementById('fixed').style.display = 'block';
      document.getElementById('percentage').style.display = 'none';
      document.getElementById('maximum_amount').style.display = 'none';
    }
  }
</script>
@endsection