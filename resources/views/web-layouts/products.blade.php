@extends('layouts.web_layout') 
@push('custom_css')
<style>
    /* price-range-slider */

.price-range-slider {
    padding: 10px 0px;
}

.price-range-slider h6 {
    font-weight: 600;
    margin-bottom: 15px;
}

.sidebar-container .ui-slider-horizontal .ui-slider-handle {
    top: -.3em;
    margin-left: -1px;
}

.price-range-slider .range-value {
    margin: 0;
}

.price-range-slider .range-value input {
    width: 100%;
    background: none;
    color: #000;
    font-size: 16px;
    font-weight: initial;
    box-shadow: none;
    border: none;
    margin: 20px 0 0 0;
	box-shadow:none;
	outline:non;
}

.price-range-slider .range-bar {
    border: none;
    background: #000;
    height: 3px;
    width: 96%;
    margin-left: 0px;
}

.price-range-slider .range-bar .ui-slider-range {
    background: #06b9c0;
}

.price-range-slider .range-bar .ui-slider-handle {
    border: none;
    border-radius: 25px;
    background: #fff;
    border: 2px solid #06b9c0;
    height: 17px;
    width: 17px;
    top: -0.52em;
    cursor: pointer;
}

.price-range-slider .range-bar .ui-slider-handle+span {
    background: #06b9c0;
}
.sort_order {
    visibility: hidden;
    position: absolute;
}
.relevance-items input[type=radio]:checked+span {
    color: red;
}
.relevance-items span {
    color: #626262;
    font-size: 14px;
}
.relevance-items label {
    margin-right: 10px;
}
.mini-tab-title.underline .title, .mini-tab-title.underline .title-bb {
    font-size: 15px;
}
/*--- /.price-range-slider ---*/
</style>

@endpush
@section('content') 

<div class="shop-layout">
        <div class="container">
          <div class="row">
            <div style="background-color: whitesmoke;" class="col-xl-3">
              <div class="shop-sidebar">
                <button class="no-round-btn" id="filter-sidebar--closebtn" style="display: none;">Close sidebar</button>
                <div class="shop-sidebar_department">
                    <div class="price-filter_top mini-tab-title underline">
                        <p class="title">Category</p>
                    </div>
                  <div class="department_bottom">
                      @foreach($category as $cate)
                        <a href="{{ url('user/products') }}/{{$cate->category_id}}">{{$cate->category_name}}
                        </a></br></br>
                        @endforeach
                     
                  </div>
                </div>
                <div class="shop-sidebar_price-filter">
                  <div class="price-filter_top mini-tab-title underline">
                    <p class="title">Filter By Price</p>
                  </div>
                  <div class="price-range-slider">
                        <div id="product-range-slider" class="range-bar"></div>
                        <p class="range-value">
                            <input type="text" id="product-range-amount" readonly style="border:none;">
                        </p>
                    </div>
                </div>


                <div class="shop-sidebar_price-filter">
                        @foreach($product_attributes as $pro_attr)
                        <div class="price-filter_top mini-tab-title underline">
                            <p class="title">Filter By {{$pro_attr->attribute_name}}</p>
                        </div>
                        <div class="price-range-slider">
                            @foreach($attributes as $attribute)
                                @if($pro_attr->id == $attribute->product_attribute_id)
                                    
                                <input class="attribute" type="checkbox" onchange="setSortOrder()" value="{{$attribute->id}}"  id="attribute{{ $attribute->id }}"> 
                                    <label  for="attribute{{$attribute->id}}"> &nbsp; 
                                        {{$attribute->attribute_value}}
                                        </label><br>
                                @endif
                            @endforeach<br>    
                        </div>
                    @endforeach
                </div>


              </div>
              <div class="filter-sidebar--background" style="display: none"></div>
            </div>
            <div class="col-xl-9">
              <div class="shop-grid-list">
                <div class="shop-products">
                  <div class="shop-products_top mini-tab-title underline">
                    <div class="row align-items-center">
                      <div class="col-6 col-xl-4">
                        <div class="search-input">
                            <!-- <input class="no-round-input no-border" type="text" placeholder="What do you need"> -->
                          </div>
                      </div>
                      <div class="col-6 text-right" style="display: none;">
                        <div id="show-filter-sidebar" style="display: none;">
                          <h5> <i class="fas fa-bars"></i>Show sidebar</h5>
                        </div>
                      </div>
                      <div class="col-12 col-xl-8">
                        <div class="product-option">
                          <div class="product-filter">
                          <div class="relevance-items">
                                <label><b>Sort By </b></label>
                                <label style="cursor:pointer">
                                    <input type="radio" checked class="sort_order" value="a" name="sortby" >
                                    <span>A to Z</span>
                                </label>
                                <label style="cursor:pointer">
                                    <input type="radio" class="sort_order" value="b" name="sortby">
                                    <span>Z to A</span>
                                </label>
                                <label style="cursor:pointer">
                                    <input type="radio" class="sort_order" value="c" name="sortby">
                                    <span>Low-To-High </span>
                                </label>
                                <label style="cursor:pointer">
                                    <input type="radio" class="sort_order" value="d" name="sortby">
                                    <span>High-To-Low </span>
                                </label>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                    <!--Using column-->
                  </div>
                  <div class="shop-products_bottom">
                    <div class="row no-gutters-sm " id="productScroll">
                     
                        <!-- ajax data -->
                    </div>

                  </div>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        
        <input type="hidden" id="categorySlug" value="<?php echo $slug; ?>" />
        <input type="hidden" id="min_price" value="0" />
        <input type="hidden" id="max_price" value="50000" />
@endsection

@push('custom_js')

<script>
addToCart();
function addToCart(){ 
    $('.add_to_cart').click(function(){
        
        var newData=true;
        var productId=$(this).data('product_id');
        var qtys = $("#qty"+productId).val();
        if(qtys){
            var qtys = $("#qty"+productId).val();
        }else{
            var qtys="1";
        }

        $.ajax({
            type: "get",
            dataType:"json",
            url: "{{route('add-to-cart.save')}}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
            },
            data:{
                product_id: productId, qty:qtys,       
            },
            beforeSend: function(){
                $('#preloader').css('display','inline-block');
                
            },
            error:function(xhr,textStatus){
                if (textStatus == 'timeout') {
                    showMsg('warning', xhr.status + ': ' + xhr.statusText);
                    $('#preloader').css('display','none');
                }else{
                    showMsg('error', xhr.status + ': ' + xhr.statusText);
                    $('#preloader').css('display','none');
                }
            },
            success: function(data){
				$('#preloader').css('display','none'); 
                if(data.error){
                    showMsg('error',data.msg);
                }else{ 
                    shoppingCartData();
					showMsg('success',data.msg);
                }
            }
        }); 
    }); 
}
addToWishlist();
function addToWishlist(){ 
    $('.add_to_wishlist').click(function(){
        var newData=true;
        var productId=$(this).data('product_id');
        $.ajax({
            type: "get",
            dataType:"json",
            url: "{{route('add-to-wishlist.save')}}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
            },
            data:{
                product_id: productId       
            },
            beforeSend: function(){
                $('#preloader').css('display','inline-block');
                
            },
            error:function(xhr,textStatus){
                if (textStatus == 'timeout') {
                    showMsg('warning', xhr.status + ': ' + xhr.statusText);
                    $('#preloader').css('display','none');
                }else{
                    showMsg('error', xhr.status + ': ' + xhr.statusText);
                    $('#preloader').css('display','none');
                }
            },
            success: function(data){
                $('#preloader').css('display','none'); 
                if(data.error){
                    showMsg('error',data.msg);
                }else{ 
                    showMsg('success',data.msg);
                }
            }
        }); 
    }); 
}
</script>

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
		$('#productScroll').html('');
		getProductData(); 
	}

    //short by desc 
    $(".sort_order").click(function() {
            setSortOrder();
	});

	$(function() {
		$( "#product-range-slider" ).slider({
			range:true,
			min: 0,
			max: 50000,
			values: [ 0,50000 ],
			slide: function( event, ui ) {
				$('#min_price').val(ui.values[ 0 ]);
				$('#max_price').val(ui.values[ 1 ]);
				$( "#product-range-amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
			},
			change: function( event, ui ) {
				$('#min_price').val(ui.values[ 0 ]);
				$('#max_price').val(ui.values[ 1 ]);
				
				setSortOrder();
			},
			
		});
		$( "#product-range-amount" ).val( "$" + $( "#product-range-slider" ).slider( "values", 0 ) +
		   " - $" + $( "#product-range-slider" ).slider( "values", 1 ) );
	});

	

	$(document).ready(function(){

	 $(window).scroll(function(){
		var divheight = $('#productScroll').outerHeight();
		
		if(notscrolly==true && notEmptyPost==true && $(window).scrollTop() + $(window).height()/2 >= divheight){   
			
			getProductData();
		}

	 });

	});

	function getProductData(){ 
		var cateSlug=$('#categorySlug').val();
		var orderBy=$('.sort_order:checked').val();
		var minPrice=$('#min_price').val();
		var maxPrice=$('#max_price').val();
        var attributeids=$('.attribute:checked').map(function() {return this.value;}).get().join(',');
		$.ajax({
			url: "{{ route('products') }}",
			dataType: 'json',
			type: 'GET',
			data: {"offset":offset,"limit":"12","cate_slug":cateSlug,"sort_order":orderBy,"min_price":minPrice,"max_price":maxPrice,"attributeids":attributeids},
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
						$('#productScroll').html(response.html); 
						newData=false;
					}else{
						$('#productScroll').append(response.html); 
                        
					}
					notscrolly=true;
				}
				else{
					$('#productScroll').html(response.html); 
				}
				$('#preloader').css('display','none');
			}
		});
	}


</script>
@endpush
