@extends('layouts.merchantdashboard')
@section('style')
<style>
    .previewimage{
    height:200px;
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
    <h3 style="color:#1F85EC">Update Blog</h3>
    <div class="box">
        <div class="box-header"></div>

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a type="button" class="btn btn-primary text-white" href="{{ route('merchant-blog-management')}}">
                        Blog List</a>
                </div>

            </div>
        </div>
        <hr> 
            <div class="container table-responsive">
                    <form action="{{ route('UpdateBlog',['id' => $blog->id])}}" method="POST" enctype="multipart/form-data" class="container">
                        @csrf  

                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" id="title" value="{{ $blog->title }}" class="form-control" placeholder="Title" required>
                                            @error('title')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                            </div>
                                            
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Slug</label>
                            <div class="col-sm-10">
                                <input type="text" name="slug" id="slug" value="{{ $blog->slug }}"class="form-control" placeholder="Slug" required>
                            </div>
                                            @error('slug')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Category</label>
                            
                            <div class="col-sm-10">
                              <select name="category" class="form-control c-select" >
                                   @foreach($categories as $category) 
                                   <option value="{{ $blog_category->id }}" hidden>{{ $blog_category->category_name }}</option>
                                   <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach 
                                </select>
                            </div>
                            
                                            @error('category')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label mt-4">Image</label>
                            <div class="col-sm-10">
                            <div id="preview">
                                <img src="{{ asset('/uploads/'.$blog->image) }}" alt="" class="previewimage">
                            </div>
                            <div>
                                <input type="file" name="image" id="image" class="form-control" >
                            </div>
                            </div>
                                            @error('image')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">Body</label>
                            <div class="col-sm-10">
                                <textarea type="text" rows="4" cols="50" name="body" id="body" class="form-control" >{{ $blog->body }}</textarea>
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
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'body', {
        filebrowserUploadUrl: "{{route('upload-blog', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    }
    );
</script>
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