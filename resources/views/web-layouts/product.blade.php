@extends('layouts.web_layout')

@push('custom_css')
<style type="text/css">
.btn-primaryz {
    background-color: white;

}

.btnz {
    background-color: white;
}
</style>
<link rel="stylesheet" href="{{ asset('web-layouts/assets/themes/krajee-fa/theme.css')}}" media="all" type="text/css"/>
<link rel="stylesheet" href="{{ asset('web-layouts/assets/themes/krajee-svg/theme.css')}}" media="all" type="text/css"/>
<link rel="stylesheet" href="{{ asset('web-layouts/assets/themes/krajee-uni/theme.css')}}" media="all" type="text/css"/>

<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<link href="{{ asset('web-layouts/assets/css/star-rating.css')}}" media="all" rel="stylesheet" type="text/css" />
<script src="{{ asset('web-layouts/assets/js/star-rating.js')}}" type="text/javascript"></script>
<script src="{{ asset('web-layouts/assets/themes/krajee-fa/theme.js')}}" type="text/javascript"></script>
    <script src="{{ asset('web-layouts/assets/themes/krajee-svg/theme.js')}}" type="text/javascript"></script>
    <script src="{{ asset('web-layouts/assets/themes/krajee-uni/theme.js')}}" type="text/javascript"></script>

@endpush
@section('content')

<div class="shop-layout">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="shop-detail">
                    <div class="row">
                        <div class="col-12">
                            <div id="show-filter-sidebar" style="display: none;">
                                <h5>
                                    <i class="fas fa-bars"></i>Show sidebar
                                </h5>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="shop-detail_img">
                                <button class="round-icon-btn" id="zoom-btn">
                                    <i class="icon_zoom-in_alt"></i>
                                </button>
                                @php $images = explode(',',$product->feature_image); @endphp
                                <div class="big-img slick-initialized slick-slider">
                                    <div class="slick-list draggable">
                                        <div class="slick-track"
                                            style="opacity: 1; width: 1659px; transform: translate3d(-553px, 0px, 0px);">
                                            @foreach($images as $img)
                                            <div class="big-img_block slick-slide" data-slick-index="0"
                                                aria-hidden="true" tabindex="-1"
                                                style="width: 553px; position: relative; overflow: hidden;">
                                                <img src="{{ asset('uploads/products/images/'. $img)}}"
                                                    alt="product image">
                                                <img role="presentation" alt=""
                                                    src="{{ asset('uploads/products/images/'. $img)}}" class="zoomImg"
                                                    style="position: absolute; top: -589.5px; left: -319.69px; opacity: 0; width: 1000px; height: 1000px; border: none; max-width: none; max-height: none;">
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="slide-img slick-initialized slick-slider">
                                    <div class="slick-list draggable">
                                        <div class="slick-track"
                                            style="opacity: 1; width: 555px; transform: translate3d(-370px, 0px, 0px);">
                                            @foreach($images as $img)
                                            <div class="slide-img_block slick-slide slick-active" data-slick-index="0"
                                                aria-hidden="false" tabindex="-1" style="width: 177px;">
                                                <img src="{{ asset('uploads/products/images/'.$img)}}"
                                                    alt="product image">
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="img_control"></div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="shop-detail_info">
                                <!-- <h5 class="product-type color-type">Oranges</h5> -->
                                <h1 style="color:blue;">{{$product->title}}</h1>
                                <br>
                                <br>
                                <p class="product-describe">{{$product->description}}</p>
                                <br>
                                <br>
                                <div class="price-rate">
                                    <h3 class="product-price"> $<span class="priceget">{{$product->price}}</span>
                                        <del>$35.00</del>
                                    </h3>
                                </div>
                                <div class="row">
                                    <div class="product-select col-md-4">
                                        <label style="color: gray;" for="quantity">Qty:</label>
                                        <input class="form-control" type="number" min="1" value="1" name="qty"
                                            id="qty{{$product->id}}" oninput="this.value = 
                        !!this.value && Math.abs(this.value) >= 1 ? Math.abs(this.value) : null">
                                    </div>
                                    @if($product_combination)
                                    <div class="col-md-8">
                                        <label style="color: gray;" for="quantity">Select product Attributes
                                            combination</label>
                                        <select class="form-control changeAttribute" name="attributes" required
                                            id="attributes{{$product->id}}">
                                            <option value="">Select Attributes</option>
                                            @foreach($product_combination as $comb)
                                            @php $value_id = explode(',',$comb->value_id);
                                            $name1 ="";
                                            @endphp
                                            @foreach($product_attribute_value_id as $attribute_value)
                                            @foreach($value_id as $value)
                                            @if($attribute_value->id == $value)
                                            @php $name1.= $attribute_value->attribute_value." + ";@endphp
                                            @endif
                                            @endforeach
                                            @endforeach
                                            @php $code = rtrim($name1," + "); @endphp
                                            <option value="{{$comb->value_id}}">{{$code}}</option>

                                            @endforeach
                                        </select>
                                    </div>
                                    @endif
                                </div>
                                <input type="hidden" value="{{$product->id}}" name="product_id" id="product_id">

                                <div class="product-select">
                                    <div class="row">
                                        <div class="col-lg-6 col-xs-12 col-sm-12">
                                            <button data-product_id="{{$product->id}}" data-tip="add to wishlist"
                                                class="btn btn-primary add_to_wishlist" data-dir="addWishlist"
                                                id="add_to_wishlist{{$product->id}}">
                                                <i class="fa fa-heart" aria-hidden="true"></i> <span> Wishlist</span>
                                            </button>

                                        </div>
                                        <div class="col-lg-6 col-xs-12 col-sm-12">
                                            <button data-product_id="{{$product->id}}" data-tip="add to cart"
                                                class="btn btn-primary add_to_cart" data-dir="addcart"
                                                id="add_to_cart{{$product->id}}">
                                                <i class="fas fa-shopping-bag" aria-hidden="true"></i> Add to Cart
                                            </button>

                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="product-share">
                                    <h5>Share link:</h5>
                                    <a href="">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="">
                                        <i class="fab fa-invision"></i>
                                    </a>
                                    <a href="">
                                        <i class="fab fa-pinterest-p"></i>
                                    </a>
                                </div>
                                <br><br>
                                <div class="product-share row">
                                    <div class="col-md-6">
                                        <h4>Ratings & Reviews</h4>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <button class="btn btn-info " data-toggle="modal" data-target="#exampleModal"><span>Rate Product</span></button>
                                    </div>
                                    
                                </div>
                                
                                  @forelse($reviews as $review)
                                  <br><br>
                                    <div class="row">
                                        <div class="col-md-2">
                                            @if($review->rating == 1)
                                            <button class="btn btn-danger btn-sm text-white"><span>{{$review->rating}} <i class="fa fa-star" aria-hidden="true"></i></span></button>
                                              @elseif($review->rating == 2)
                                              <button class="btn btn-warning btn-sm text-white"><span>{{$review->rating}} <i class="fa fa-star" aria-hidden="true"></i></span></button>
                                              @elseif($review->rating == 3)
                                              <button class="btn btn-warning btn-sm text-white"><span>{{$review->rating}} <i class="fa fa-star" aria-hidden="true"></i></span></button>
                                              @elseif($review->rating == 4)
                                              <button class="btn btn-info btn-sm text-white"><span>{{$review->rating}} <i class="fa fa-star" aria-hidden="true"></i></span></button>
                                              @elseif($review->rating == 5)
                                              <button class="btn btn-success btn-sm text-white"><span>{{$review->rating}} <i class="fa fa-star" aria-hidden="true"></i></span></button>
                                              @endif
                                        
                                        
                                        
                                        </div>
                                        <div class="col-md-10 text-left">
                                            <h5>
                                              @if($review->rating == 1)
                                                Very Poor
                                              @elseif($review->rating == 2)
                                                Poor
                                              @elseif($review->rating == 3)
                                                  Good
                                              @elseif($review->rating == 4)
                                                  Very Good
                                              @elseif($review->rating == 5)
                                                Excellent
                                              @endif
                                              
                                              
                                              

                                            </h5>
                                        </div>
                                        <div class="col-md-12 text-left">
                                        <br>
                                            <p>{{$review->remark}}</p>
                                        </div>
                                        <div class="col-md-12 text-left">
                                        <br>
                                            <span>Simpefy Customer</span> <span>{{date('d-M-Y', strtotime($review->created_at))}}</span>
                                        </div>
                                    </div>
                                  @empty
                                    <div class="row">
                                      <h5>No Ratings Yet</h5>
                                    </div>
                                  @endforelse
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ratings & Reviews</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                  @if(Auth::check())
                                        @if($review_products)
                                            <form action="{{route('products.review')}}" method="post" accept-charset="utf-8">
                                                @csrf
                                                
                                                <input class="" value="{{$product->id}}" type="hidden" name="product_id" />
                                                <input id="rating-system" type="number" class="rating" min="1" max="5" step="1" name="rating"><br>
                                                <fieldset>
                                                    <!-- Text input-->
                                                    <div class="col-md-12 form-group">
                                                        <label class="control-label">Remark :</label>
                                                        <textarea required id="remark" name="remark" rows="4" cols="10"
                                                            class="form-control"></textarea>
                                                    </div>

                                                    <div class="col-md-12 form-group user-form-group">
                                                        <div class="pull-left">
                                                            <button name="signupBtn" type="submit" value="true" id=""
                                                                class="btn btn-success btn-sm">
                                                                Rate <span id="" class="load_register load-btn" style="display:none"></span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        @else
                                            <h4>Haven't purchased this product ?</h4><br>
                                            <p>Sorry! You are not allowed to review this product since you haven't bought it on Simpefy.</p>
                                        @endif
                                    @else
                                        <h4>You are not login! Please login</h4><br>
                                    @endif
                                  </div>
                                
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h3>Other Vegetables</h3>
                <br>
            </div>
            <div class="col-lg-6"></div>
            <div class="col-lg-2">
                <button class="add-to-cart normal-btn outline">View All</button>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach($products as $product)
            <div class="col-6 col-md-3">
                <div class="product pink">
                    @php $images = explode(',',$product->feature_image); @endphp
                    <a class="" href="{{ route('product', ['id' => $product->id]) }}">
                        <img style="width: 100%;" src="{{ asset('uploads/products/images/'.$images[0])}}" alt="">
                    </a>
                    <h5 class="product-type"></h5>
                    <h3 class="product-name">{{$product->title}}</h3>
                    <h3 class="product-price">${{$product->price}} <del>$35.00</del>
                    </h3>
                    <div class="product-select">
                        <button data-product_id="{{$product->id}}" data-tip="add to wishlist" data-dir="addWishlist"
                            id="add_to_wishlist{{$product->id}}"
                            class="add-to-wishlist round-icon-btn pink cart-btn add_to_wishlist"><i
                                class="icon_heart_alt"></i></button>
                        <button data-product_id="{{$product->id}}" data-tip="add to cart"
                            class="cart-btn add_to_cart add-to-cart round-icon-btn pink" data-dir="addcart"
                            id="add_to_cart{{$product->id}}"> <i class="fa fa-shopping-cart"
                                aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>



    @endsection
    @push('custom_js')

    <script>
    addToCart();

    function addToCart() {
        $('.add_to_cart').click(function() {

            var newData = true;
            var attributes = "";
            var productId = $(this).data('product_id');
            var qtys = $("#qty" + productId).val();
            @if($product_combination)
            var attributes = $("#attributes" + productId).val();
            if (attributes == "") {
                showMsg('error', 'Please select products attributes');
                return flase;
            }
            @endif

            if (qtys) {
                var qtys = $("#qty" + productId).val();
            } else {
                var qtys = "1";
            }

            $.ajax({
                type: "get",
                dataType: "json",
                url: "{{route('add-to-cart.save')}}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: {
                    product_id: productId,
                    qty: qtys,
                    attributes: attributes,
                },
                beforeSend: function() {
                    $('#preloader').css('display', 'inline-block');

                },
                error: function(xhr, textStatus) {
                    if (textStatus == 'timeout') {
                        showMsg('warning', xhr.status + ': ' + xhr.statusText);
                        $('#preloader').css('display', 'none');
                    } else {
                        showMsg('error', xhr.status + ': ' + xhr.statusText);
                        $('#preloader').css('display', 'none');
                    }
                },
                success: function(data) {
                    $('#preloader').css('display', 'none');
                    if (data.error) {
                        showMsg('error', data.msg);
                    } else {
                        shoppingCartData();
                        showMsg('success', data.msg);
                    }
                }
            });
        });
    }

    $('.add_to_wishlist').click(function() {
        var newData = true;
        var productId = $(this).data('product_id');
        $.ajax({
            type: "get",
            dataType: "json",
            url: "{{route('add-to-wishlist.save')}}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            data: {
                product_id: productId
            },
            beforeSend: function() {
                $('#preloader').css('display', 'inline-block');

            },
            error: function(xhr, textStatus) {
                if (textStatus == 'timeout') {
                    showMsg('warning', xhr.status + ': ' + xhr.statusText);
                    $('#preloader').css('display', 'none');
                } else {
                    showMsg('error', xhr.status + ': ' + xhr.statusText);
                    $('#preloader').css('display', 'none');
                }
            },
            success: function(data) {
                $('#preloader').css('display', 'none');
                if (data.error) {
                    showMsg('error', data.msg);
                } else {
                    showMsg('success', data.msg);
                }
            }
        });
    });

    $('.changeAttribute').on('change', function() {

        var value_id = this.value;

        $.ajax({
            url: "{{ route('change.attribute')}}",
            type: "POST",
            data: {
                value_id: value_id
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            cache: false,
            error: function(xhr, textStatus) {

                sweetAlertMsg('error', xhr.responseJSON.message);
            },
            success: function(result) {
                $(".priceget").html(result.price);

            }
        });
    });
    </script>
    @endpush