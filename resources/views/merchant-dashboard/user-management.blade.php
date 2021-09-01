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
</style>
@endsection
     
@section('content')
<div class="padding">
@if ($message = Session::get('success'))
   <div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
	   <strong>{{ $message }}</strong>
	</div>

@endif
  <div class="row">
   
    <br>
  </div>
   <h3 style="color:#1F85EC">Users List</h3>
  <div class="box">
    <div class="box-header">
      
    </div>
    <div class="row p-a">
      <div class="col-sm-3">
        <select class="input-sm form-control w-lg inline v-middle">
          <option value="1">ID Descending</option>
          <option value="2">ID Ascending</option>
          </select>
        <!-- <button class="btn btn-sm white">Apply</button>                 -->
      </div>
      
      <div class="col-sm-6">

      </div>
      
      <div class="col-sm-3">
        <div class="input-group input-group-sm">
          <input type="text" class="form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn b-a white" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>

    
    <hr>
    <div class="table-responsive">
      <table class="table table-striped b-t">
        <thead>
          <tr>
            <th style="width:20px;">
              <!-- <label class="ui-check m-a-0">
                <input type="checkbox" class="has-value"><i></i> 
              </label> -->
            </th>
            <th style="width: 15%;">Name</th>
            <th style="width: 15%;">Email</th>
            <th style="width: 20%;">Mobile no.</th>
            <th style="width: 15%;">Status</th>
            
            <!-- <th>Action</th> -->
            <th style="width: 20%;">Action</th>
          </tr>
        </thead>
        <tbody>
            @if(!empty($users))
              @foreach($users as $user) 
                <tr>
                    <td><label class="ui-check m-a-0"><input type="checkbox" name="post[]" class="has-value"><i class="dark-white"></i></label></td>
                    <td>{{ !empty($user->first_name) ? $user->first_name:' - '.(!empty($user->last_name) ? $user->last_name:'-') }}</td>
                    <td>{{ !empty($user->email) ? $user->email:'-' }}</td>
                    <td>{{ !empty($user->mobile_number) ? $user->mobile_number:'-' }}</td>
                    <td><label class="btn btn-sm rounded white" aria-pressed="true">Active</label></td>
                    <td>
                        <a href="" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a href="" class="active" ui-toggle-class=""><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
               </tr> 
              @endforeach
            @endif
          </tbody>
      </table>
    </div>
    <footer class="dker p-a">
       
      <div class="row">
        
        <!-- <div class="col-sm-4 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-4 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-a-0">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li class="active"><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href="">5</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div> -->
    </footer>
  </div>

  
  </div>
  </div>
  
@endsection
