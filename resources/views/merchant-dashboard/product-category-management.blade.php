@extends('layouts.merchantdashboard') @section('style') <style type="text/css">
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
<!-- Latest compiled and minified CSS -->
 @endsection 
 @section('content') 
 <div class="padding"> 

  <div class="row">
    <br>
  </div>
  <h3 style="color:#1F85EC">Category List</h3>
  <div class="box">
    <div class="box-header"></div>
    <div class="row p-a"></div>
    <div class="container">
      <div class="row">
        <div style="text-align: left;" class="col-md-12">
          <!-- <button class="btn primary" data-toggle="modal" data-target="#m-a-a" ui-toggle-class="zoom" ui-target="#animate">Add Product</button> -->
          <!-- <button class="btn  primary">Add Product</button> -->
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Add Category </button>
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
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
                        <form action="/AddCategory" method="POST" enctype="multipart/form-data"> @csrf <div class="form-group row">
                            <label class="col-sm-5 form-control-label">Category Name</label>
                            <div class="col-sm-7">
                              <input type="text" name="category_name" class="form-control" placeholder="Category Name" required>
                            </div> @error('category_name') <div class="alert alert-danger">{{ $message }}</div> @enderror
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
                  <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div class="table-responsive">
      <table data-order='[[ 0, "desc" ]]' class="table table-bordered data-table">
        <thead>
          <tr>
            <th>S.N.</th>
            <th>Name</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div> 
	@foreach( $categories as $category )
    <!--Delete Modal -->
    
		<div class="modal fade" id="DeleteCategory{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="DeleteCategoryLabel{{ $category->id }}" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="DeleteCategoryLabel{{ $category->id }}">{{ $category->category_name }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body mx-5">
				<br> Are you sure? <br>
			  </div>
			  <div class="modal-footer">
				<a href="{{ route('DeleteCategory', ['id' => $category->id]) }}" class="btn btn-primary mx-5">yes</a>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			  </div>
			</div>
		  </div>
		</div>
		<!--Update Modal -->
		<div class="modal fade" id="updatecategory{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="updatecategory{{ $category->id }}" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="updatecategory{{ $category->id }}">Update Category</h5>
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
					  <form action="{{ route('UpdateCategory', ['id' => $category->id]) }}" method="POST" enctype="multipart/form-data"> @csrf <div class="form-group row">
						  <label class="col-md-5 form-control-label">Category Name</label>
						  <div class="col-md-5">
							<input type="text" name="category_name" value="{{ $category->category_name }}" class="form-control" placeholder="Category Name" required>
						  </div> @error('category_name') <div class="alert alert-danger">{{ $message }}</div> @enderror
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
	  </div>
	</div> 
@endforeach 

</div>
	  </div>
	</div> 
@endsection

@push('custom_js')
<script>
//$('input.cb-value').prop("checked", true);



 toggleClass();
function toggleClass() {
    $('.toggleCategory').change(function() {
        
        var mainParent = $(this).parent('.toggle-btn');
        if($(mainParent).find('input.cb-value').is(':checked')) {
          $(mainParent).addClass('active');
        } else {
          $(mainParent).removeClass('active');
        }
        var formAction=$(this).attr('action');
        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };
        var status = $(this).prop('checked') == true ? 1 : 0;
        var id = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/"+formAction,
            data: {
                'status': status,
                'id': id
            },
            success: function(data) {
                console.log(data.success)
                toastr.success(data.success);
            }
        });
    })
}


	$('.data-table').DataTable({
    
		"order": [[ 0, "desc" ]],
		dom: 'Bfrtip',
		lengthMenu: [
			[10, 25, 50, -1],
			['10 rows', '25 rows', '50 rows', 'Show all']
		],
		buttons: [
			'pageLength',
			'csv',
		],
		"processing": true,
		"serverSide": true,
		"ajax":{
		"url": "{{ url('/product-category-management') }}",
		"dataType": "json",
		"type": "GET",
	  },
    "fnRowCallback" : function(nRow, aData, iDisplayIndex){
        $("td:first", nRow).html(iDisplayIndex +1);
        return nRow;
    },
	  "fnDrawCallback": function() {
	    toggleClass();
		},

	columns: [
		{data: 'id', name: 'id'},
		{data: 'name', name: 'name'},
		{data: 'status', name: 'status', searchable: false},
		{data: 'action', name: 'action', searchable: false},
	],

	});


  </script>

@endpush