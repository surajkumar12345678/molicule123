@foreach($blogs as $blog)
<div class="col-md-4">
    <div class="blog-img"><a href="{{url('blog')}}/{{$blog->slug}}">
        <img src="{{asset('uploads/admin/blogs')}}/{{$blog->images}}" alt="{{$blog->title}}"></a></div>
    <div class="blog-text">
        <p class="blog-tag "><a class="text-white text-decoration-none " href="{{url('blogs')}}/{{$blog->cateslug}}">{{$blog->cate_name}}</a></p>
        <a class="blog-title" href="{{url('blog')}}/{{$blog->slug}}">{{$blog->title}}</a>
        <div class="blog-credit">
            <p class="date">{{date('M', strtotime($blog->created_at))}}, {{date('d-Y', strtotime($blog->created_at))}}</p>
        </div>
    </div>
</div>
@endforeach