@extends('layouts.web_layout')

@push('custom_css')
<style type="text/css">

</style>
@endpush
@section('content')
  
<br><br>
<div class="blog-layout">
    <div class="container">
        <div class="row">
            <div class="col-xl-3">
                <div class="blog-sidebar">
                    <button class="no-round-btn" id="filter-sidebar--closebtn" style="display: none;">Close
                        sidebar</button>
                    <div class="blog-sidebar_search">
                        <div class="search_block">
                            <form action="" method="get">
                                <input class="no-round-input" type="text" placeholder="Search..." id="blogSearch">
                            </form>
                        </div>
                    </div>
                    <div class="blog-sidebar_categories">
                        <div class="categories_top mini-tab-title underline">
                            <h2 class="title">Categories</h2>
                        </div>
                        <div class="categories_bottom">
                            <ul>
                                @forelse($category as $cate)
                                <li> <a class="category-link"
                                        href="{{url('user/blogs')}}/{{$cate->slug}}">{{$cate->category_name}}</a></li>
                                @empty
                                <li> Data not available</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                    <div class="blog-sidebar_recent-post">
                        <div class="recent-post_top mini-tab-title underline">
                            <h2 class="title">Recent post</h2>
                        </div>
                        <div class="recent-post_bottom">
                            @forelse($blogs as $single)
                            <div class="mini-post_block">
                                <div class="mini-post_img"><a href="{{url('user/single')}}/{{$single->slug}}"><img
                                            src="{{asset('uploads/blogs')}}/{{$single->image}}"
                                            alt="{{$single->title}}"></a></div>
                                <div class="mini-post_text"><a
                                        href="{{url('user/single')}}/{{$single->slug}}">{{$single->title}}</a>
                                    <h5>{{date('M', strtotime($single->created_at))}},
                                        {{date('d-Y', strtotime($single->created_at))}}</h5>
                                </div>
                            </div>
                            @empty
                            <div class="mini-post_block">
                                Data not available
                            </div>
                            @endforelse
                        </div>
                    </div>
                    <div class="blog-sidebar_tags">
                        <div class="tags_top mini-tab-title underline">
                            <h2 class="title">Search By Tags</h2>
                        </div>
                        <div class="tags_bottom">
                            <a class="tag-btn" href="shop_grid+list_3col.html">organic</a>
                            <a class="tag-btn" href="shop_grid+list_3col.html">vegatable</a>
                            <a class="tag-btn" href="shop_grid+list_3col.html">fruits</a>
                            <a class="tag-btn" href="shop_grid+list_3col.html">fresh meat</a>
                            <a class="tag-btn" href="shop_grid+list_3col.html">fastfood</a>
                            <a class="tag-btn" href="shop_grid+list_3col.html">natural</a>
                        </div>
                    </div>
                </div>
                <div class="filter-sidebar--background" style="display: none"></div>
            </div>
            <div class="col-12 col-xl-9">
                <div class="blog-detail">
                    <div id="show-filter-sidebar" style="display: none;">
                        <h5> <i class="fas fa-bars"></i>Show sidebar</h5>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="blog-detail_block">
                                <h1 class="blog-title" href="#">{{$blog->title}}</h1>
                                <div class="blog-img">
                                    <img src="{{asset('uploads/blogs')}}/{{$blog->image}}" alt="{{$blog->title}}">
                                </div>
                                <p class="blog-describe">{!! $blog->body !!}</p>
                            </div>
                            <div class="blog-detail_footer">
                                <div class="row align-items-sm-center">
                                    <div class="col-12 col-sm-6">
                                        <div class="blog-sidebar_tags">
                                            <a class="tag-btn" href="shop_grid+list_3col.html">organic</a>
                                            <a class="tag-btn" href="shop_grid+list_3col.html">vegatable</a>
                                            <a class="tag-btn" href="shop_grid+list_3col.html">fruits</a>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 text-md-right">
                                        <div class="blog-detail_share">
                                            <h5>Share:</h5>
                                            <span>
                                            <a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo "https://molicule.dailylifeblogs.com/user/blog/".$blog->slug; ?>"><i class="fab fa-facebook-f"> </i></a>
                                                <a href=""><i class="fab fa-twitter"></i></a>
                                                <a href=""><i class="fab fa-invision"> </i></a>
                                                <a href=""><i class="fab fa-pinterest-p"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-detail_comment d-none" >
                                <div class="customer-reviews_block">
                                    <h2 class="comment-title">4 Comments</h2>
                                    <div class="customer-review">
                                        <div class="row">
                                            <div class="col-12 col-sm-3 col-lg-2">
                                                <div class="customer-review_left">
                                                    <div class="customer-review_img text-center"><img class="img-fluid"
                                                            src="assets/images/shop/reviewer_01.png"
                                                            alt="customer image"></div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-9 col-lg-10">
                                                <div class="customer-comment">
                                                    <h5 class="comment-date">27 Aug 2016</h5>
                                                    <h3 class="customer-name">Jenney Kelley</h3>
                                                    <p class="customer-commented">Lorem ipsum dolor sit amet,
                                                        consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                                        ut labore et dolore magna alation uidem dolore eu fugiat nulla
                                                        pariatur.</p>
                                                    <button class="like-comment">Like</button>
                                                    <button class="reply-comment">Reply</button>
                                                    <div class="replied-comment">
                                                        <div class="row">
                                                            <div class="col-12 col-sm-3 col-lg-2">
                                                                <div class="customer-review_left">
                                                                    <div class="customer-review_img text-center"><img
                                                                            class="img-fluid"
                                                                            src="assets/images/shop/reviewer_01.png"
                                                                            alt="customer image"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-9 col-lg-10">
                                                                <div class="customer-comment">
                                                                    <h5 class="comment-date">27 Aug 2016</h5>
                                                                    <h3 class="customer-name">Jenney Kelley</h3>
                                                                    <p class="customer-commented">Lorem ipsum dolor sit
                                                                        amet, consectetur adipisicing elit, sed do
                                                                        eiusmod tempor incididunt ut labore et dolore
                                                                        magna alation uidem dolore eu fugiat nulla
                                                                        pariatur.</p>
                                                                    <button class="like-comment">Like</button>
                                                                    <button class="reply-comment">Reply</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="customer-review">
                                        <div class="row">
                                            <div class="col-12 col-sm-3 col-lg-2">
                                                <div class="customer-review_left">
                                                    <div class="customer-review_img text-center"><img class="img-fluid"
                                                            src="assets/images/shop/reviewer_02.png"
                                                            alt="customer image"></div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-9 col-lg-10">
                                                <div class="customer-comment">
                                                    <h5 class="comment-date">27 Aug 2016</h5>
                                                    <h3 class="customer-name">Mike Phillips</h3>
                                                    <p class="customer-commented">Lorem ipsum dolor sit amet,
                                                        consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                                        ut labore et dolore magna alation uidem dolore eu fugiat nulla
                                                        pariatur.</p>
                                                    <button class="like-comment">Like</button>
                                                    <button class="reply-comment">Reply</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="leave-reviews_block">
                                    <h2 class="comment-title">Leave A Comment</h2>
                                    <form action="" method="post">
                                        <input class="no-round-input" type="text" placeholder="Name">
                                        <input class="no-round-input" type="email" placeholder="Email">
                                        <input class="no-round-input" type="text" placeholder="Website">
                                        <textarea class="textarea-form" name="" cols="30" rows="8"
                                            placeholder="Messages"></textarea>
                                        <button class="normal-btn">Send Messages</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('custom_js')

<script>

$("#blogSearch").autocomplete({
        source: "{{route('blog.search')}}",
        minLength: 1,
        select: function(event, ui) {
            var label = ui.item.value;
            if (label === "no results") {
                event.preventDefault();
            } else {
                location.href = ui.item.link;
            }
        }
    });
</script>
@endpush