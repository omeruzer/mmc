@extends('front.layouts.master')
@section('title')Blog Yazılarımız @endsection
@section('keyw'){{$seo->keyw}}@endsection
@section('desc'){{$seo->desc}}@endsection
@section('content')
<main class="bg_gray">
    <div class="container margin_30">
        <div class="page_header">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="{{ route('homepage') }}">Anasayfa</a></li>
                    <li>Blog</li>
                </ul>
            </div>
            <h1>Blog Yazılarımız</h1>
        </div>
        <!-- /page_header -->
        <div class="row">
            <div class="col-lg-12">
                <!-- /widget -->
                <div class="row">
                    @foreach ($blogs as $blog)
                        <div class="col-md-4">
                            <article class="blog">
                                    <a href="{{ route('blog-detail',[$blog->slug]) }}">
                                        <img width="100%" src="/assets/images/blogs/{{$blog->img}}" alt="">
                                    </a>
                                <div class="post_info">
                                    {{-- <small>Category - 20 Nov. 2017</small> --}}
                                    <small>{{$blog->created_at}}</small>
                                    <h2><a href="{{ route('blog-detail',[$blog->slug]) }}">{{$blog->title}}</a></h2>
                                    <p>{{ Str::substr($blog->content, 0 , 150) }}...</p>
                                    <ul style="display: table">
                                        <li><a href="{{ route('blog-detail',[$blog->slug]) }}"><button class="blogPostRead" type="submit">Yazıyı Oku </button></a></li>
                                    </ul>
                                </div>
                            </article>
                            <!-- /article -->
                        </div>
                        <!-- /col -->
                    @endforeach
                </div>
                <!-- /row -->

                <div class="pagination__wrapper">
                    {{ $blogs->links() }}
                </div>
                <!-- /pagination -->

            </div>
            <!-- /col -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</main>
<!--/main-->
@endsection
@section('head')
<link href="/assets/front/css/blog.css" rel="stylesheet">
@endsection