@extends('layouts.admin')
@section('content')
<!-- Container -->
<div class="padding">
    @if ($message = Session::get('msg'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
   
    <div class="row">
        <br>
    </div>
    <h3 style="color:#1F85EC">Add Subcriptions</h3>
    <div class="box">
        <div class="box-header"></div>

        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <a type="button" class="btn btn-primary text-white" href="{{ route('subscriptions')}}">
                    Subcriptions Plans Lits</a>

                    <!-- <button class="btn btn-sm white">Apply</button>                 -->
                </div>

            </div>
        </div>
        <hr>
        <div class="container table-responsive">
            <form action="{{ route('add-subscriptions') }}" method="POST" enctype="multipart/form-data"
                class="container">
                @csrf
               
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="inputEmail3" class="form-control-label"> Plan Name</label>
                    </div>
                    <div class="col-md-10">
                        <input
                            class=" form-control w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="descritpoin" type="text" placeholder="Enter plan plan here" rows="10" name="plan_name"
                            value="{{ old('plan_name') }}">
                        @error('plan_name')
                        <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="inputEmail3" class="form-control-label"> Valid For</label>
                    </div>
                    <div class="col-md-10">
                        <input
                            class="form-control w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="validity" type="number" name="validity_in_days" value="{{ old('validity_in_days') }}" />
                        @error('validity_in_days')
                        <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>


                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="inputEmail3" class="form-control-label">Valid Until</label>
                    </div>
                    <div class="col-md-10">
                        <input
                            class="form-control w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="lastName" type="date" name="end_date" value="{{ old('end_date') }}" />
                        @error('end_date')
                        <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="inputEmail3" class="form-control-label">No of product Allowed</label>
                    </div>
                    <div class="col-md-10">
                        <input
                            class="form-control w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="products" type="number" min="1" name="number_of_product_allowed"
                            value="{{ old('number_of_product_allowed') }}" />
                        @error('number_of_product_allowed')
                        <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>


                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="inputEmail3" class="form-control-label">Price</label>
                    </div>
                    <div class="col-md-10">
                        <input
                            class="form-control w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="price" type="number" min="1" name="price" value="{{ old('price') }}" />
                        @error('price')
                        <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>


                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="inputEmail3" class="form-control-label">Description</label>
                    </div>
                    <div class="col-md-10">
                        <textarea
                            class="form-control w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="description" type="textarea" placeholder="Enter plan description here" rows="10"
                            name="description">{{ old('description') }}</textarea>
                        @error('description')
                        <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>


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

@endsection