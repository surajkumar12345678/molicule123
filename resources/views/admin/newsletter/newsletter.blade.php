@extends('layouts.admin')
@section('content')
<link type="text/css" rel="stylesheet" href="{{ asset('web-layouts/dragimage/dist/image-uploader.min.css')}}">
<!-- include libraries(jQuery, bootstrap) -->
<script src="{{ asset('assets/css/bootstrap-select.min.css') }}"></script>
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
    <h3 style="color:#1F85EC">Send Message</h3>
    <div class="box">
        <div class="box-header"></div>

        <div class="container">
            <div class="row">
                

            </div>
        </div>
        <div class="container table-responsive">
            <form action="{{ route('admin.form.newsletter')}}" method="POST" enctype="multipart/form-data" class="container">
                @csrf
                
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="inputEmail3" class="form-control-label">Select Users</label>
                    </div>
                    <div class="col-md-10">
                        
                    <select name="email[]"id="select2-button-addons-multiple-input-group-sm" class="form-control select2-multiple" multiple ui-jp="select2" ui-options="{theme: 'bootstrap'}">
                            @foreach($newsletter as $newsemail)
                                <option value="{{$newsemail->email}}">{{$newsemail->email}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="inputEmail3" class="form-control-label">Subject</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" value=""name="subject" class="form-control" placeholder="Enter Subject" required >
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="inputEmail3" class="form-control-label">Type Message</label>
                    </div>
                    <div class="col-md-10">
                        <textarea type="text" rows="4" cols="50" name="desc" id="body"
                                    class="form-control"></textarea>
                    @error('blog_desc')
                        <p class="alert" style="color:red">{{ $message }}</p>
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


@push('custom_js')

<script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace('body', {
    filebrowserUploadUrl: "{{route('upload-blog', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
</script>
<script>
const inpFile = document.getElementById('image');
const preview = document.getElementById('preview');
const previewimage = preview.querySelector('.previewimage');
inpFile.addEventListener("change", function() {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.addEventListener("load", function() {
            previewimage.setAttribute("src", this.result);
        });
        reader.readAsDataURL(file);
    }
});
</script>
@endpush

