@extends('layouts.merchantdashboard')
@section('style')
<style type="text/css">
.previewimage{
    height:150px;
    weight:150px;
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
        <a href="{{ route('merchant-gallery') }}" class="btn btn-primary">Back to Gallery</a>
    </div>
    <br>
    <hr>
    <div class="container py-5">
        @if($id)
        <form action="{{ route('merchant-store-gallery',['id' => $id ]) }}" method="post" enctype="multipart/form-data">
        @else
        <form action="{{ route('merchant-store-gallery') }}" method="post" enctype="multipart/form-data">
        @endif
        @csrf
            <div class="form-group row" id="preview">
                <img class="offset-md-3 previewimage" src="" alt="">
            </div>
            <div class="form-group row">
                <label class="from-control-label col-md-3">Image</label>
                <input class="col-md-9" type="file" name="image" id="image" required>
            </div>
            <div class="form-group row">
                @if($id)
                 <button type="submit" class="btn btn-primary">Update</button>
                @else
                    <button type="submit" class="btn btn-primary">Add</button>
                @endif    
            </div>
        </form>
    </div> 
</div>
<script>
    const inpFile = document.getElementById('image');
    const preview = document.getElementById('preview');
    const previewimage = preview.querySelector('.previewimage');
    inpFile.addEventListener("change",function(){
        const file = this.files[0];
        if(file)
        {
            const reader = new FileReader();
            reader.addEventListener("load", function(){
                previewimage.setAttribute("src", this.result);
            });
            reader.readAsDataURL(file);
        }
    });
</script>  
@endsection