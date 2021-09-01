@extends('layouts.merchantdashboard')
@section('style')
  <style>
  
      .container1{
          height: 50%;
          width: 50%;
          margin-left: 5%;
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
   
         <br>
        <div class="container">
            <div class="card">
                <div class="card-body">
        <div>
       @foreach($product as $product)
       <div class="row" style="margin-top:30px;">
        <h5 class="ml-5">Add product variations</h5>
        <hr style="width:95%;height:2px;border-width:0;color:gray;background-color:gray">
        </div> 
       
       <div class="row">
          
       <div class="col-sm-3 scroll" data-flex>
          <nav class="scroll nav-light">
            
              <div class="list-group" ui-nav>
                
       
                  <a href="{{ url('/variable-product-attribute/'. $product->id)  }}" class="list-group-item list-group-item-action">
                    <span class="nav-icon">
                      <i class="material-icons">&#xe7ee;
                        
                      </i>
                    </span>
                    <span class="nav-text">Attributes</span>
                  </a>

                  <a href="{{ url('/variable-product-variation/'. $product->id)  }}" class="list-group-item list-group-item-action active" >
                    <span class="nav-icon">
                      <i class="material-icons">&#xe3e5;
                        
                      </i>
                    </span>
                    <span class="nav-text">Variations</span>
                  </a>
               
                </div>
            </nav>
        </div>
        
       <div class="container1 col-sm-9 mt-5">
          <div class="row">
            <div class="col-md-12">  
                
                <form class="row" action="{{ url('/variable-product-variation-save') }}" id="products_attribute_save"  method="POST" enctype="multipart/form-data" style="margin-top: -15px;">
                          <input type="hidden" value="{{$product->id}}" name="product_id">
                            
                      <div class="col-md-1">
                            value(s):
                      </div>         
                      
                        @foreach($attribute_values as $value) 
                            <div class="col-md-3">
                              <input type="hidden" value="{{$value->product_attribute_id}}" name="attr_id[]">
                              <select class="form-control" name="value_id[]" required>
                                  <option value="" hidden>Select {{$value->attribute_name}}</option>
                                    
                                  @foreach($attributes_value_id as $value_id)
                                      @if($value->product_attribute_id == $value_id->product_attribute_id)
                                      <option value="{{$value_id->id}}">{{$value_id->attribute_value}}</option>
                                      @endif
                                  @endforeach
                              </select>
                            </div>
                          @endforeach 
                          <div class="col-md-2"> 
                             <button type="submit" class="btn btn-primary">Go </button>
                          </div> 
                        </form>
                      
                </div>
              <br><br><br><br>
              <div id="renderForm" class="col-md-12">

              </div>
          </div>  
        </div> 
       
    </div>
    @endforeach
    </div>
</div>

@endsection

@push('custom_js')
<script>
  function loadFile() {
    var image = document.getElementById('output');
    image.src = URL.createObjectURL(event.target.files[0]);
}
	$("form#products_attribute_save").submit(function(e){
    
		e.preventDefault();
		var formId=$(this).attr('id');
		var formAction=$(this).attr('action'); 
		
		$.ajax({
			url: formAction,
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
			},
			data:  new FormData(this),
			type: 'post',
			dataType:'json',
			beforeSend: function(){
				$('#preloader').css('display','inline-block');
			},
			error:function(xhr,textStatus){ 
				$('#preloader').css('display','none');
			},
			success: function(data){ 
        $('#preloader').css('display','none');
				$('#renderForm').html(data.html);
			},
			cache:false,
			contentType:false,
			processData:false, 
		});
	});
	

</script>
@endpush