@extends('layouts.merchent')

@section('style')
<style type="text/css">
.switch {
    position: relative;
}

.switch label {
    position: absolute;
    background-color: #1F85EC;
    border-radius: 50px;
    width: 95%;
    height: 20px;
    top: -45px;
    left: 20px;
}

.switch label:after {
    content: '';
    width: 20%;
    height: 14px;
    border-radius: 50px;
    position: absolute;
    background-color: white;
    transition: all 0.2s;
    top: 3px;
    left: 8px;
} 

.switch input[type="checkbox"] {
    visibility: hidden;
}

.switch input[type="checkbox"]:checked + label {
     background-color: #1F85EC;
}

.switch input[type="checkbox"]:checked + label:after {
     /*left: 33px;*/
}
    
.upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
}

.btnupload {
  border: 2px solid gray;
  color: gray;
  background-color: white;
  /*padding: 8px 20px;*/
  border-radius: 8px;
  font-size: 20px;
  font-weight: bold;
}

.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}
.image{
    height:120px;
    weight:120px;
}
</style>
@endsection

@section('content')
<!-- ***** Welcome Area Start ***** -->
                                    
<section id="home" class="section welcome-area bg-overlay overflow-hidden d-flex align-items-center">
                    
            <div class="container">
            @if ($message = Session::get('success'))
                                       <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                           <strong>{{ $message }}</strong>
                                        </div>
        
                                     @endif 
                <div class="row align-items-center">
                    <div class="col-md-12">
                        
                        <div class="formarea">
                            <div class="switch mb-5 ">
                                <input type="checkbox" id="checkbox1">
                                <label for="checkbox1"></label>
                                 <h4 class="">Store Details</h4>
                            </div>
                            <!-- <div class="progress mb-5">
                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                              </div> -->
                           
                            <div style="margin-top:-30px;" class="row">
                                <div class="col-md-6">
                                    <form action="/StoreDetails" method="POST" enctype="multipart/form-data">
                                    @csrf
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Store Name </label>
                                            <input type="text" name="store_name" class="form-control"
                                                placeholder="Enter Your Store Name">
                                                @error('store_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                         </div>
                                         <label for="exampleFormControlFile1"><b>Upload Store Logo</b></label><br>
                                        <div class="upload-btn-wrapper">
                                            <button style="border:none;" class="btnupload" id="preview"><img src="{{ asset('/assets/img/thumb.png') }}" class="image"></button>
                                           <input style="padding: 50px;" type="file" name="store_logo" id="store_logo">
                                           @error('store_logo')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;About Store</label>
                                            <textarea placeholder="About store" name="about_store" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                            @error('about_store')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Next</button>
                                            <!-- <a href="/domain_name" class="btn btn-primary">Next</a> -->
                                         </div>
          
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                            <label for="exampleFormControlInput1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Facebook Link </label>
                                            <input type="text" name="facebook_link" class="form-control"
                                                placeholder="Enter Your Facebook Link">
                                                @error('facebook_link')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                    </div>
                                    <div class="form-group">
                                            <label for="exampleFormControlInput1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Instagram Link </label>
                                            <input type="text" name="instagram_link" class="form-control"
                                                placeholder="Enter Your Instagram Link">
                                                @error('instagram_link')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                    </div>
                                    <div class="form-group">
                                            <label for="exampleFormControlInput1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Linkedin Link </label>
                                            <input type="text" name="linkedin_link" class="form-control"
                                                placeholder="Enter Your Linkedin Link">
                                                @error('linkedin_link')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                    </div>
                                    <div class="form-group">
                                            <label for="exampleFormControlInput1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Twitter Link </label>
                                            <input type="text" name="twitter_link" class="form-control"
                                                placeholder="Enter Your Twitter Link">
                                                @error('twitter_link')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                    </div>
                                    <div class="form-group">
                                            <label for="exampleFormControlInput1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Youtube Link </label>
                                            <input type="text" name="youtube_link" class="form-control"
                                                placeholder="Enter Your Youtube Link">
                                                @error('youtube_link')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                    </div>
                              </div>
                                </form>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
            <!-- Shape Bottom -->
            <div class="welcome-shape">
                <img src="{{ asset('assets/img/hero_shape.png') }}" alt="">
            </div>
        </section>
        <!-- ***** Welcome Area End ***** -->
<script>
    const inpFile = document.getElementById('store_logo');
    const preview = document.getElementById('preview');
    const previewimage = preview.querySelector('.image');
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