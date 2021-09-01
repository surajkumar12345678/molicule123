@extends('layouts.merchent')

@push('custom_css')
<style type="text/css">

</style>
@endpush
@section('content')


<div class="blog-layout">
    <div class="container">
        <div class="row" id="blogsList">
            
        </div>
    </div>
</div>
<input type="hidden" id="categorySlug" value="<?php echo $slug; ?>" />


@endsection
@push('custom_js')

<script>
setSortOrder();
//page scroll ajax
	var notscrolly=true;
	var notEmptyPost=true;
	var newData=true;
	var offset=0;

	function setSortOrder(){
		offset=0;
		notEmptyPost=true;
		newData=true; 
		$('#blogsList').html('');
		getBlogsData(); 
	}


	$(document).ready(function(){

	 $(window).scroll(function(){
		var divheight = $('#blogsList').outerHeight();
		
		if(notscrolly==true && notEmptyPost==true && $(window).scrollTop() + $(window).height()/2 >= divheight){   
			getBlogsData();
		}

	 });

	});

	function getBlogsData(){ 
		var cateSlug=$('#categorySlug').val();
		$.ajax({
			url: "{{ route('ListBlogs') }}",
			dataType: 'json',
			type: 'GET',
			data: {"offset":offset,"limit":"12","cate_slug":cateSlug},
			beforeSend:function(){
				notscrolly=false;
				$('#preloader').css('display','inline-block');
			},
			error:function(xhr){
				showMsg('error',"Error: " + xhr.status + ": " + xhr.statusText); 
				$('#preloader').css('display','none');
			},
			success: function(response){
				if(response.status){
					if(response.total!='12'){
						notEmptyPost=false;
					}else{
						offset+=12;
					}

					if(newData){
						$('#blogsList').html(response.html); 
						newData=false;
					}else{
						$('#blogsList').append(response.html); 
                        
					}
					notscrolly=true;
				}
				else{
					$('#blogsList').html(response.html); 
				}
				$('#preloader').css('display','none');
			}
		});
	}


</script>
@endpush
