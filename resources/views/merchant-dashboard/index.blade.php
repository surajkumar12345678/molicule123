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

.table{
  font-size: 12px;
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
	<div class="row">

		<div class="col-xs-12 col-sm-3">

	        <div class="box p-a">
	          <div class="pull-left m-r">
	            <span class="w-48 rounded  accent">
	              <i class="material-icons">&#xe151;</i>
	            </span>
	          </div>
	          <div class="clear">
	            <small class="text-muted">No. of total User</small>
              <h6><b>{{$data}}</b></h6>
	            <a style="font-size: 12px;" href=""><u>view more</u></a>
	          </div>
	        </div>
	    </div>
	    <div class="col-xs-12 col-sm-3">
	        <div class="box p-a">
	          <div class="pull-left m-r">
	             <span class="w-48 rounded  accent">
                <i class="material-icons">&#xe151;</i>
              </span>
	          </div>
	          <div class="clear">
              <small class="text-muted">No. of order completed</small>
              <h6><b>{{$data1}}</b></h6>
              <a style="font-size: 12px;" href=""><u>view more</u></a>
            </div>
	        </div>
	    </div>
      <div class="col-xs-12 col-sm-3">
	        <div class="box p-a">
	          <div class="pull-left m-r">
	             <span class="w-48 rounded  accent">
                <i class="material-icons">&#xe151;</i>
              </span>
	          </div>
	          <div class="clear">
              <small class="text-muted">No. of order pending</small>
              <h6><b>{{$data2}}</b></h6>
              <a style="font-size: 12px;" href=""><u>view more</u></a>
            </div>
	        </div>
	    </div>
	    <div class="col-xs-12 col-sm-3">
	        <div class="box p-a">
	          <div class="pull-left m-r">
	             <span class="w-48 rounded  accent">
                <i class="material-icons">&#xe151;</i>
              </span>
	          </div>
	          <div class="clear">
              <small class="text-muted">Total Earnings</small>
              <h6><b>{{$sum}}</b></h6>
              <a style="font-size: 12px;" href=""><u>view more</u></a>
            </div>
	        </div>
	    </div>
</div>
<div class="row">
      <div class="col-xs-12 col-sm-3">
          <div class="box p-a">
            <div class="pull-left m-r">
               <span class="w-48 rounded  accent">
                <i class="material-icons">&#xe151;</i>
              </span>
            </div>
            <div class="clear">
              <small class="text-muted">No. of order conversation rate</small>
              <h6><b>$5612.00</b></h6>
              <a style="font-size: 12px;" href=""><u>view more</u></a>
            </div>
          </div>
      </div>

    <div class="col-xs-12 col-sm-3">
          <div class="box p-a">
            <div class="pull-left m-r">
              <span class="w-48 rounded  accent">
                <i class="material-icons">&#xe151;</i>
              </span>
            </div>
            <div class="clear">
              <small class="text-muted">No. of order cancelled</small>
              <h6><b>{{$cancel_order}}</b></h6>
              <a style="font-size: 12px;" href=""><u>view more</u></a>
            </div>
          </div>
      </div>
      <div class="col-xs-12 col-sm-3">
          <div class="box p-a">
            <div class="pull-left m-r">
               <span class="w-48 rounded  accent">
                <i class="material-icons">&#xe151;</i>
              </span>
            </div>
            <div class="clear">
              <small class="text-muted">No. of total return sub data on (exchange/refund)</small>
              <h6><b>$5612.00</b></h6>
              <a style="font-size: 12px;" href=""><u>view more</u></a>
            </div>
          </div>
      </div>
      <div class="col-xs-12 col-sm-3">
          <div class="box p-a">
            <div class="pull-left m-r">
               <span class="w-48 rounded  accent">
                <i class="material-icons">&#xe151;</i>
              </span>
            </div>
            <div class="clear">
              <small class="text-muted">No. of abandon cart</small>
              <h6><b>$5612.00</b></h6>
              <a style="font-size: 12px;" href=""><u>view more</u></a>
            </div>
          </div>
      </div>
</div>
<div class="row">
      <div class="col-xs-12 col-sm-3">
          <div class="box p-a">
            <div class="pull-left m-r">
               <span class="w-48 rounded  accent">
                <i class="material-icons">&#xe151;</i>
              </span>
            </div>
            <div class="clear">
              <small class="text-muted">Total amount of abandon cart</small>
              <h6><b>$5612.00</b></h6>
              <a style="font-size: 12px;" href=""><u>view more</u></a>
            </div>
          </div>
      </div>
      <div class="col-xs-12 col-sm-3">
          <div class="box p-a">
            <div class="pull-left m-r">
               <span class="w-48 rounded  accent">
                <i class="material-icons">&#xe151;</i>
              </span>
            </div>
            <div class="clear">
              <small class="text-muted">No. of coupons used</small>
              <h6><b>{{$coupan}}</b></h6>
              <a style="font-size: 12px;" href=""><u>view more</u></a>
            </div>
          </div>
      </div>
  </div>

	<div class="row">
		<div class="col-sm-6">
      <div class="box">
        <div class="box-header">
          <h2>Recent Orders</h2>
          <!-- <small>Add the base class .table to any &lt;table&gt;.</small> -->
        </div>
        <div class="box-divider m-0"></div>
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>E-mail</th>
              <th>Order Status</th>
              <th>Created At</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Mark</td>
             <td><label class="btn btn-sm rounded white" aria-pressed="true">New</label></td>
              <td>25-11-2021 12:17:28</td>
            </tr>
            <tr>
              <td>2</td>
              <td>Jacob</td>
              <td><label class="btn btn-sm rounded white" aria-pressed="true">New</label></td>
              <td>25-11-2021 12:17:28</td>
            </tr>
            <tr>
              <td>3</td>
              <td>Larry</td>
              <td><label class="btn btn-sm rounded white" aria-pressed="true">New</label></td>
              <td>25-11-2021 12:17:28</td>
            </tr>
            <tr>
              <td>1</td>
              <td>Mark</td>
             <td><label class="btn btn-sm rounded white" aria-pressed="true">New</label></td>
              <td>25-11-2021 12:17:28</td>
            </tr>

          </tbody>
        </table>
      </div>
    </div>
	    <div class="col-sm-6">
      <div class="box">
        <div class="box-header">
          <h2>Basic</h2>

        </div>
        <div class="box-divider m-0"></div>
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Email</th>
              <th>Name</th>
              <th>Provider</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <td>2</td>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
            </tr>
            <tr>
              <td>3</td>
              <td>Larry</td>
              <td>the Bird</td>
              <td>@twitter</td>
            </tr>
            <tr>
              <td>3</td>
              <td>Larry</td>
              <td>the Bird</td>
              <td>@twitter</td>
            </tr>
            <tr>
              <td>1</td>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
            <!-- <tr>
              <td>1</td>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr> -->

          </tbody>
        </table>
      </div>
    </div>

	</div>


<!-- ############ PAGE END-->
@endsection
