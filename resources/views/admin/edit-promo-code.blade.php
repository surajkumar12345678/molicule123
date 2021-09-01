@extends('layouts.admin')
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
   <h3 style="color:#1F85EC">Add Promo Code</h3>
  <div class="box">
    <div class="box-header">

    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <a type="button" class="btn btn-primary text-white" href="{{ route('promo-code')}}">
                    Promocode List
                </a>
                <!-- <button class="btn btn-sm white">Apply</button>                 -->
            </div>
        </div>
    </div>

 <hr><div class="container table-responsive " style="padding-bottom: 25px;">
        <form action="{{ route('update-promo-code') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-body">
                    <div class="form-group row">
                      <label for="promocode" class="col-sm-4 col-form-label">Edit Promo Code</label>
                      <input type="text" class="form-control col-sm-8 border" @error('promocode') style="border: 1px solid red;" @enderror name="promocode" id="promocode" aria-describedby="emailHelp" placeholder=" @error('promocode'){{ $message }}@enderror" value="{{ $promocode->promo_code }}">
                    </div>
                    <div class="form-group row">
                        <label for="discount" class="col-sm-4 col-form-label">Discount</label>
                        <input type="number" id="discount" class="col-sm-2" name="discount" @error('discount') style="border: 1px solid red;" @enderror placeholder="@error('discount'){{ $message }}@enderror" value="{{ $promocode->actual_discount }}">
                        <div class="col-sm-1"></div>
                        <select name="discount_type" class="form-control col-sm-5" id="discount_type" @error('discount_type') style="border: 1px solid red;" @enderror value={{ old('discount_type') }}>
                            <option value="fixed_amount">Fixed Amount</option>
                            <option value="percentage">Percentage</option>
                        </select>
                        @error('discount_type')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="is_specific" class="">Is it for specific for product or Category?</label>
                        </div>
                        <div class="col-sm-1">
                            <input type="checkbox"  @if ($promocode->is_specific=="on") checked @endif class="form-control" name="is_specific" id="is_specific" aria-describedby="emailHelp" placeholder="Enter your promo code" @error('is_specific') style="border: 1px solid red;" @enderror>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="product_or_category" id="product_or_category" class="form-control" style="display: block" value="{{ old('product_or_category') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="no_of_times" class="col-sm-4 col-form-label">No of Times</label>
                      <input type="number" name="no_of_times" class="form-control col-sm-2" id="no_of_times" placeholder="@error('no_of_times'){{ $message }}@enderror" min="1" @error('no_of_times') style="border: 1px solid red;" @enderror value="{{ $promocode->no_of_times}}">
                    </div>
                    <div class="form-group row">
                        <label for="valid_until" class="col-sm-4 col-form-label">Validity</label>
                        <input type="date" name="valid_until" class="form-control col-sm-2" id="valid_until" placeholder="@error('valid_until'){{ $message }}@enderror"  @error('valid_until') style="border: 1px solid red;" @enderror value="{{ $promocode->valid_until }}">
                      </div>
            </div>
                    <input type="hidden" name="id" value="{{ $promocode->id }}">
              <button type="submit" class="btn btn-primary center">Update Promo</button>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

@endsection
