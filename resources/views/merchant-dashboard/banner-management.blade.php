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
   <h3 style="color:#1F85EC">Banner</h3>
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
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Add Banner </button>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Banner</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="col-md-12">
                <div class="">
                  <div class="box-header"></div>
                  <!-- <div class="box-divider m-a-0"></div> -->
                  <div class="box-body">
                    <form action="{{ url('/merchant/add-banner') }}" method="POST" enctype="multipart/form-data"> @csrf <div class="form-group row">
                        <div id="preview">
                          <img src="" alt="" class="previewimage">
                        </div>
                        <div class="from-group row">
                          <label class="col-sm-2 form-control-label">Image</label>
                          <div class="col-sm-10">
                            <input type="file" name="image" id="image" class="form-control" required>
                          </div> @error('image') <div class="alert alert-danger">{{ $message }}</div> @enderror
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
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
  </div>
 <br>
 <hr>

   <div class="table-responsive">
      <table class="table table-striped b-t">
        <thead>
          <tr>
            <th>Image</th>
            <!-- <th>Date</th> -->
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @if($banners)
            @foreach($banners as $banner)
              <tr>
                <td>
                  <img style="width:80px;" class="productcss" src="{{ asset('/uploads/banners/'.$banner->image) }}">
                </td>
                <!-- <td>{{date('d-m-Y',strtotime($banner->created_at))}}</td> -->
                <td>
                  <button class="btn-link" data-toggle="modal" data-target="#updateBanner{{ $banner->id }}">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                  </button>

                  <!-- <button class="btn-link" data-toggle="modal" data-target="#DeleteBanner{{ $banner->id }}">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                  </button> -->

                  <a href="{{ route('DeleteBanner', ['id' => $banner->id]) }}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
              </tr>
                <!--Delete Modal -->
                <div class="modal fade" id="DeleteBanner{{ $banner->id }}" tabindex="-1" role="dialog" aria-labelledby="DeleteBlogLabel{{ $banner->id }}" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-body mx-5">
                        <br>
                        Are you sure?
                        <br>
                      </div>
                      <div class="modal-footer">
                      <a href="{{ route('DeleteBanner', ['id' => $banner->id]) }}" class="btn btn-primary mx-5">yes</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        
                      </div>
                    </div>
                  </div>
                </div>

                <!--Update Image Modal -->
                <div class="modal fade" id="updateBanner{{ $banner->id }}" tabindex="-1" role="dialog" aria-labelledby="updateBlog{{ $banner->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="updateBanner{{ $banner->id }}">Update Banner</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="col-md-12">
                            <div class="">
                              <div class="box-body">
                                <form action="{{ route('UpdateBanner', ['id' => $banner->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf  
                                <img style="width:80px;margin-bottom: 15px;" class="productcss" src="{{ asset('/uploads/banners/'.$banner->image) }}">
                                <br>
                                <div class="form-group row">
                                    <label class="col-sm-2 form-control-label">Image</label>
                                    <div class="col-sm-10">
                                      <input type="file" name="image" class="form-control" placeholder="title">
                                    </div>
                                      @error('image')
                                          <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                  </div>
                                  <div class="form-group row m-t-md">
                                    <div class="col-sm-offset-2 col-sm-10">
                                      <button type="submit" class="btn white">Update</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                        </div>
                      </div>
                    </div>
                  </div>
            @endforeach
          @endif
        </tbody>
      </table>
    </div>
    <footer class="dker p-a">
    </footer>
  </div>

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