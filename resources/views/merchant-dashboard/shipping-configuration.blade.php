@extends('layouts.merchantdashboard')
@section('style')
<link type="text/css" rel="stylesheet" href="{{ asset('web-layouts/dragimage/dist/image-uploader.min.css')}}">
<!-- include libraries(jQuery, bootstrap) -->

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
@endsection @section('content')
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

    <div class="box">
        <div class="box-header"></div>

        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h3 style="color:#1F85EC">Add Shipping Configuration</h3>
                    <a href="{{ route('shipping.configuration-view')}}" class="btn btn-primary">View All Configurations</a>
                </div>

            </div>
        </div>
        <hr>
        <div class="container table-responsive">
            <form action="{{ route('shipping.configuration')}}" method="POST" enctype="multipart/form-data" class="container">
                @csrf
                <div class="form-group row">
                    <div class="col-md-2">
                        <label  class="form-control-label">General*</label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label  class="form-control-label">Method Name</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" name="method" class="form-control" placeholder="Enter Method Name"  required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label  class="form-control-label">Shipping Instruction</label>
                    </div>
                    <div class="col-md-10">
                      <textarea name="shippinginstruction" class="form-control" rows="2" cols="2" placeholder="Enter Shipping Instruction" required></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label  class="form-control-label">Availability*</label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label  class="form-control-label">Status</label>
                    </div>
                    <div class="col-md-10">
                       <select class="form-control" name="status">
                         <option>Select Option</option>
                         <option>Enabled</option>
                          <option>Disabled</option>
                       </select>

                    </div>
                </div>
            <!--    <div class="form-group row">
                    <div class="col-md-2">
                        <label  class="form-control-label">Total</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" name="total" class="form-control" placeholder=" Total"  required>
                    </div>
                </div>-->
                <div class="form-group row">
                    <div class="col-md-2">
                        <label  class="form-control-label">Geo Zone</label>
                    </div>
                    <div class="col-md-10">
                       <select class="form-control" name="geozone">
                         <option>Select Zone</option>
                         <option>All Zone</option>
                       @foreach($value as $data)
                       <option>{{$data['zone']}}</option>
                       @endforeach
                       </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label  class="form-control-label">Shipping Cost*</label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label  class="form-control-label">Cost Type</label>
                    </div>
                    <div class="col-md-10">
                       <select class="form-control" name="costtype" onchange="showDiv(this)">
                         <option value="0">Select Cost Type</option>
                         <option value="Flat_Cost">Flat Cost</option>
                       <option value="Based_Cost">Total Based Cost</option>
                       <option value="Weight_Cost">Weight Based Cost</option>
                       </select>
                    </div>
                </div>
           <div class="form-group row tbdy" id="demo" style="display:none">
            <div class="col-md-2">
                <label  class="form-control-label">Flat Cost</label>
            </div>
            <div class="col-md-10 ">
                <input type="number" name="flatcost[]" placeholder="Flat Cost" value=" ">
           <button type="button" class="btn addrow" name="button">add</button>
            </div>
          </div>

          <div class="form-group row" id="demo2" style="display:none">
           <div class="col-md-2">
               <label  class="form-control-label">Cart Value From</label>
           </div>
           <div class="col-md-10">
               <input type="number" name="cardfrom[]"  placeholder="Card From">
               <input type="number" name="cardto[]"  placeholder="Card To">
               <input type="number" name="shippingcost[]"  placeholder="Shipping Cost">
                <button type="button" class="addrow2" name="button">add</button>
           </div>
          </div>
          <div class="form-group row" id="demo3" style="display:none">
           <div class="col-md-2">
               <label  class="form-control-label">Weight</label>
           </div>
           <div class="col-md-10">
               <input type="text" name="weight[]"  placeholder="Weight In Lb">
               <input type="number" name="weightcost[]"  placeholder="Weight Based Cost">
               <button type="button" class="addrow3" name="button">add</button>
           </div>
          </div>



        <!--        <div class="form-group row">
                    <div class="col-md-2">
                        <label  class="form-control-label">Total</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" name="total2" class="form-control" placeholder=" Total"  required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label  class="form-control-label">Total Based Cost</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" name="totalbasecost" class="form-control" placeholder=" Total Based Cost"  required>
                    </div>
                </div> -->
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
<script type="text/javascript">
function showDiv(select){
   if(select.value=='Flat_Cost'){
    document.getElementById('demo').style.display = "block";
    document.getElementById('demo2').style.display = "none";
    document.getElementById('demo3').style.display = "none";

  }else if (select.value=='Based_Cost') {
    document.getElementById('demo2').style.display = "block";
    document.getElementById('demo').style.display = "none";
    document.getElementById('demo3').style.display = "none";
  }
  else if (select.value=='Weight_Cost'){
    document.getElementById('demo3').style.display = "block";
      document.getElementById('demo2').style.display = "none";
      document.getElementById('demo').style.display = "none";
  }
   else{
    document.getElementById('demo').style.display = "none";
    document.getElementById('demo2').style.display = "none";
    document.getElementById('demo3').style.display = "none";
   }

}
</script>
<script type="text/javascript">
  $('.addrow').on('click', function(){
    addrow();
  });
  function addrow(){
    var tr='<div class="col-md-10">'+'<input type="number" name="flatcost[]" placeholder="Flat Cost">'+
   '<button type="button" class="btn remove" name="button">Remove</button>'+
    '</div>';
$('#demo').append(tr);
};
$('#demo').on('click','.remove',function(){
$(this).parent().remove();
});
</script>
<script type="text/javascript">
  $('.addrow2').on('click', function(){
    addrow2();
  });
  function addrow2(){
    var tr='<div class="col-md-10">'+
        '<input type="number" name="cardfrom[]"  placeholder="Card From">'+
        '<input type="number" name="cardto[]"  placeholder="Card To">'+
        '<input type="number" name="shippingcost[]"  placeholder="Shipping Cost">'+
         '<button type="button" class="remove2" name="button">remove</button>'+
    '</div>';
$('#demo2').append(tr);
};
$('#demo2').on('click','.remove2',function(){
$(this).parent().remove();
});
</script>
<script type="text/javascript">
  $('.addrow3').on('click', function(){
    addrow3();
  });
  function addrow3(){
    var tr='<div class="col-md-10">'+
        '<input type="text" name="weight[]"  placeholder="Weight In Lb">'+
        '<input type="number" name="weightcost[]"  placeholder="Weight Based Cost">'+
        '<button type="button" class="remove3" name="button">remove</button>'+
    '</div>';
$('#demo3').append(tr);
};
$('#demo3').on('click','.remove3',function(){
$(this).parent().remove();
});
</script>
@endsection


@push('custom_js')
@endpush
