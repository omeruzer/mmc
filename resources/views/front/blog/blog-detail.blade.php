@extends('front.layouts.master')
@section('title'){{$blog->title}} | {{$set->title}}@endsection
@section('keyw'){{$blog->keyw}}@endsection
@section('desc'){{$blog->desc}}@endsection
@section('content')
<main class="bg_gray">
    <div class="container margin_30">
        <div class="page_header">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="{{ route('homepage') }}">Anasayfa</a></li>
                    <li><a href="{{ route('blog') }}">Bloglar</a></li>
                    <li>{{$blog->title}}</li>
                </ul>
            </div>
        </div>
        <!-- /page_header -->
        <div class="row">
            <div class="col-lg-9">
                <div class="singlepost">
                    <figure><img alt="" class="img-fluid" src="/assets/images/blogs/{{$blog->img}}"></figure>
                    <h1>{{$blog->title}}</h1>
                    <div class="postmeta">
                        <ul>
                            <li><i class="ti-calendar"></i> {{$blog->created_at}}</li>
                            {{-- <li><a href="#"><i class="ti-comment"></i> (14) Comments</a></li> --}}
                        </ul>
                    </div>
                    <!-- /post meta -->
                    <div class="post-content">
                        <div class="dropcaps">
                            <p>{{$blog->content}}</p>
                        </div>

                    </div>
                    <!-- /post -->

                </div>
                <div class="container margin_60_35">
                    <div class="main_title">
                        <h2>Bazı Ürünlerimiz</h2>
                        <span>Products</span>
                        <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
                    </div>
                    <div class="owl-carousel owl-theme products_carousel">
                        @foreach ($products as $product)
                            <div class="item">
                                <div class="grid_item">
                                    {{-- <span class="ribbon new">New</span> --}}
                                    <figure>
                                        <a href="{{ route('product',[$product->getCategory->slug,$product->slug,$product->code]) }}">
                                            <img class="owl" src="/assets/images/products/{{$product->img}}" data-src="img/products/shoes/4.jpg" alt="">
                                        </a>
                                        @if ($product->quantity > 0)
                                            <div class="" style="width: 100%; background-color:#47C78E; ">
                                                <h5 style="color:#fff">Stokta Var</h5>
                                            </div>
                                        @else
                                            <div class="" style="width: 100%; background-color:#c6c6c6; ">
                                                <h5 style="color:#fff">Stokta Yok</h5>
                                            </div>
                                        @endif
                                    </figure>
                                    <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                                    <a href="{{ route('product',[$product->getCategory->slug,$product->slug,$product->code]) }}">
                                        <h3>{{$product->name}}</h3>
                                    </a>
                                    <div class="price_box">
                                        <span class="new_price">${{$product->price}}</span>
                                    </div>
                                    {{-- <ul>
                                        <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                                        <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                                        <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                                    </ul> --}}
                                    @if ($product->quantity > 0)
                                        <div class="">
                                            <form action=" {{ route('cart.add') }} " method="post">
                                                @csrf
                                                <input type="hidden" name="qty" value=4>
                                                <input type="hidden" name="id" value="{{ $product->id }}">
                                                <input type="submit" value="Sepete Ekle" class="addCard">
                                            </form>
                                        </div>
                                    @else
                                        <div class="">
                                            <input style="background-color: #c6c6c6 " type="submit" disabled value="Stokta Yok"  class="addCard">
                                        </div>
                                    @endif
                                </div>
                                <!-- /grid_item -->
                            </div>
                            <!-- /item -->
                        @endforeach
            
            
                    </div>
                    <!-- /products_carousel -->
                </div>
                <!-- /single-post -->

                <!-- YORUM YAPMA ALANI -->

                {{-- <div id="comments">
                    <h5>Comments</h5>
                    <ul>
                        <li>
                            <div class="avatar">
                                <a href="#"><img src="img/avatar1.jpg" alt="">
                                </a>
                            </div>
                            <div class="comment_right clearfix">
                                <div class="comment_info">
                                    By <a href="#">Anna Smith</a><span>|</span>25/10/2019<span>|</span><a href="#"><i class="icon-reply"></i></a>
                                </div>
                                <p>
                                    Nam cursus tellus quis magna porta adipiscing. Donec et eros leo, non pellentesque arcu. Curabitur vitae mi enim, at vestibulum magna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed sit amet sem a urna rutrumeger fringilla. Nam vel enim ipsum, et congue ante.
                                </p>
                            </div>
                            <ul class="replied-to">
                                <li>
                                    <div class="avatar">
                                        <a href="#"><img src="img/avatar2.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="comment_right clearfix">
                                        <div class="comment_info">
                                            By <a href="#">Anna Smith</a><span>|</span>25/10/2019<span>|</span><a href="#"><i class="icon-reply"></i></a>
                                        </div>
                                        <p>
                                            Nam cursus tellus quis magna porta adipiscing. Donec et eros leo, non pellentesque arcu. Curabitur vitae mi enim, at vestibulum magna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed sit amet sem a urna rutrumeger fringilla. Nam vel enim ipsum, et congue ante.
                                        </p>
                                        <p>
                                            Aenean iaculis sodales dui, non hendrerit lorem rhoncus ut. Pellentesque ullamcorper venenatis elit idaipiscingi Duis tellus neque, tincidunt eget pulvinar sit amet, rutrum nec urna. Suspendisse pretium laoreet elit vel ultricies. Maecenas ullamcorper ultricies rhoncus. Aliquam erat volutpat.
                                        </p>
                                    </div>
                                    <ul class="replied-to">
                                        <li>
                                            <div class="avatar">
                                                <a href="#"><img src="img/avatar2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="comment_right clearfix">
                                                <div class="comment_info">
                                                    By <a href="#">Anna Smith</a><span>|</span>25/10/2019<span>|</span><a href="#"><i class="icon-reply"></i></a>
                                                </div>
                                                <p>
                                                    Nam cursus tellus quis magna porta adipiscing. Donec et eros leo, non pellentesque arcu. Curabitur vitae mi enim, at vestibulum magna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed sit amet sem a urna rutrumeger fringilla. Nam vel enim ipsum, et congue ante.
                                                </p>
                                                <p>
                                                    Aenean iaculis sodales dui, non hendrerit lorem rhoncus ut. Pellentesque ullamcorper venenatis elit idaipiscingi Duis tellus neque, tincidunt eget pulvinar sit amet, rutrum nec urna. Suspendisse pretium laoreet elit vel ultricies. Maecenas ullamcorper ultricies rhoncus. Aliquam erat volutpat.
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="avatar">
                                <a href="#"><img src="img/avatar3.jpg" alt="">
                                </a>
                            </div>

                            <div class="comment_right clearfix">
                                <div class="comment_info">
                                    By <a href="#">Anna Smith</a><span>|</span>25/10/2019<span>|</span><a href="#"><i class="icon-reply"></i></a>
                                </div>
                                <p>
                                    Cursus tellus quis magna porta adipiscin
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>

                <hr>

                <h5>Leave a comment</h5>
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <input type="text" name="name" id="name2" class="form-control" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <input type="text" name="email" id="email2" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <input type="text" name="email" id="website3" class="form-control" placeholder="Website">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="comments" id="comments2" rows="6" placeholder="Comment"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" id="submit2" class="btn_1 add_bottom_15">Submit</button>
                </div> --}}
                
            </div>
            <!-- /col -->

            <aside class="col-lg-3">
                <div class="widget search_blog">
                    <div class="form-group">
                        <input type="text" name="search" id="search" class="form-control" placeholder="Search..">
                        <button type="submit"><i class="ti-search"></i><span class="sr-only"></span></button>
                    </div>
                </div>
                <!-- /widget -->
                <div class="widget">
                    <div class="widget-title">
                        <h4>Diğer Yazılarımız</h4>
                    </div>
                    <ul class="comments-list">
                        @foreach ($otherBlogs as $otherBlog)
                            <li>
                                <div class="alignleft">
                                    <a href="{{ route('blog-detail',[$otherBlog->slug]) }}"><img src="/assets/images/blogs/{{$otherBlog->img}}" alt=""></a>
                                </div>
                                {{-- <small>Category - 11.08.2016</small> --}}
                                <small>{{$otherBlog->created_at}}</small>
                                <h3><a href="{{ route('blog-detail',[$otherBlog->slug]) }}" title="">{{$otherBlog->title}}</a></h3>
                            </li>  
                        @endforeach
                    </ul>
                </div>
                <!-- /widget -->

                <!-- BLOG KATEGORİLERİ -->

                {{-- <div class="widget">
                    <div class="widget-title">
                        <h4>Categories</h4>
                    </div>
                    <ul class="cats">
                        <li><a href="#">Food <span>(12)</span></a></li>
                        <li><a href="#">Places to visit <span>(21)</span></a></li>
                        <li><a href="#">New Places <span>(44)</span></a></li>
                        <li><a href="#">Suggestions and guides <span>(31)</span></a></li>
                    </ul>
                </div> --}}
                <!-- /widget -->
            </aside>
            <!-- /aside -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</main>
<!--/main-->
@endsection
@section('head')
    	<!-- SPECIFIC CSS -->
        <link href="/assets/front/css/blog.css" rel="stylesheet">
@endsection