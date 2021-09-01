
<form  action="{{ url('/variable-product-variation-insert') }}" id="products_attribute_save"  method="POST" enctype="multipart/form-data" style="margin-top: -15px;">
@csrf
<div class="row " style="padding-right: 34px;">
	<input type="hidden" value="{{$product_id}}" name="product_id">
	<input type="hidden" value="{{$attr_id}}" name="attr_id">
	<input type="hidden" value="{{$value_id}}" name="value_id">
	<div class="col-md-6 mb-2">
		<input type="text" required class="form-control" value="" name="price" placeholder="Enter product price">
	</div>
	<br>
	<div class="col-md-6 mb-2">
		<input type="text" required class="form-control" value="" name="stock" placeholder="Enter product stock">
	</div>
	<br>
	<div class="col-md-6 mb-2">
		<input type="number" class="form-control" value="" name="weight" placeholder="Enter product weight">
	</div>
	<br>
	<div class="col-md-6 mb-2">
		<input type="file" required class="form-control" onchange="loadFile()" value="" name="image" placeholder="Enter product image">
	</div><br>
	<div class="col-md-12 mb-2">
		<textarea class="form-control" required name="desc" placeholder="Enter product short description"></textarea>
	</div>
	<br>
	<div class="col-md-6 mb-5">
		<button type="submit" class="btn btn-success btn-sm">Submit  </button>
	</div>


</div>
</form>

<script>

</script>
