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
   <h3 style="color:#1F85EC">Blog List</h3>
  <div class="box">
    <div class="box-header">

    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <a type="button" class="btn btn-primary text-white" href="{{ route('add-blog')}}">
                    Add Blog
                </a>
                <!-- <button class="btn btn-sm white">Apply</button>                 -->
            </div>
        </div>
    </div>

 <hr>
   <div class="table-responsive container">
     <table data-order='[[ 0, "desc" ]]' class="table table-bordered data-table">
        <thead>
          <tr>
            <th>S.N.</th>
            <th>Title</th>
            <th>Image</th>
            <th>Category</th>
            <th>Posted Date</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
    @foreach($blogs as $blog)
          <!--Delete Modal -->
          <div class="modal fade" id="DeleteBlog{{ $blog->id }}" tabindex="-1" role="dialog" aria-labelledby="DeleteBlogLabel{{ $blog->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="DeleteBlogLabel{{ $blog->id }}">{{ $blog->title }}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body mx-5">
                  <br>
                  Are you sure?
                  <br>
                </div>
                <div class="modal-footer">
                <a href="{{ route('DeleteBlog', ['id' => $blog->id]) }}" class="btn btn-primary mx-5">Yes</a>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

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

toggleClass();
function toggleClass() {
    $('.toggleBlog').change(function() {

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
		"url": "{{ url('/merchant/blog-management') }}",
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
    {data: 'title', name: 'title'},
    {data: 'image', name: 'image'},
    {data: 'category', name: 'category'},
    {data: 'created_at', name: 'created_at'},
		{data: 'status', name: 'status', searchable: false},
		{data: 'action', name: 'action', searchable: false},
	],

	});
 </script>
 @endpush
