@extends('layouts.merchantdashboard')
@section('style')
<style type="text/css">
.productcss{
  width: 65%;
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
    <h3 style="color:#1F85EC">Gallery</h3>
    <div class="box">
        <div class="box-header">
        </div>
        <div class="container">
        <div class="row">
            <div style="text-align: right;" class="col-md-12">
        </div>
        </div>
    </div>
    <div class="container">
        <a href="{{ route('merchant-add-gallery') }}" class="btn btn-primary"> Add Image </a>
    </div>
    <br>
    <hr>
    <div class="table-responsive container">
      <table class="table table-striped b-t">
        <thead>
          <tr>
            <th>Image</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @if($galleries)
            @foreach($galleries as $gallery)
              <tr>
                <td>
                  <img style="width:80px;" class="productcss" src="{{ asset('/uploads/galleries/'.$gallery->image) }}">
                </td>
                <td>
                  <a class="btn-link" href="{{ route('merchant-add-gallery',['id' => $gallery->id ]) }}">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                   </a>
                  <a href="{{ route('merchant-delete-gallery',['id' => $gallery->id ]) }}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
              </tr> 
            @endforeach
          @endif
        </tbody>
       </table>
    </div>  
</div>  
@endsection