@extends('layouts.merchantdashboard')
@section('style')
    <style type="text/css">
      .previewimage{
    height:200px;
    weight:150px;
}
    </style>
@endsection

@section('content')

    <!-- ***** Welcome Area Start ***** -->
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
        <div class="container">
                <!-- <div class="box-divider m-a-0"></div> -->
                <div class="box-body m-5">
                    <form action="{{ url('/merchant/store-page/'.$data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf  

                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" onkeyup="myFunction()" id="title" value="{{ $data->title }}" class="form-control" placeholder="Title" required>
                            </div>
                                            @error('title')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Slug</label>
                            <div class="col-sm-10">
                                <input type="text" name="slug" id="slug" value="{{ $data->slug }}" class="form-control" placeholder="Slug" >
                            </div>
                                            @error('slug')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label mt-4">Banner Image</label>
                            <div class="col-sm-10">
                            <div id="preview">
                                <img src="{{ asset('/uploads/cms/'.$data->banner_image) }}" alt="" class="previewimage">
                            </div>
                            <div>
                                <input type="file" name="banner_image" id="banner_image" class="form-control" >
                            </div>
                            </div>
                                            @error('banner_image')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Body</label>
                            <div class="col-sm-10">
                                <textarea type="text" rows="4" cols="50" name="body" id="body" class="form-control" >{!! $data->body !!}</textarea>
                            </div>
                                            @error('body')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                        </div>
                            <div class="form-group row m-t-md">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn white">Update</button>
                            </div>
                            </div>
                        </div>    
                    </form>
                </div>
        </div>
    </div>   
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'body', {
        filebrowserUploadUrl: "{{route('upload-page', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    }
    );
</script>
<script>
    const inpFile = document.getElementById('banner_image');
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
<script>
    function myFunction() {
  
        var a = document.getElementById("title").value;
  
        var b = a.toLowerCase().replace(/ /g, '-')
            .replace(/[^\w-]+/g, '');
  
        document.getElementById("slug").value = b;
    }
</script>
@endsection
 