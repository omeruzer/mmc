@extends('front.layouts.master')
@section('title'){{$set->title}}@endsection
@section('keyw'){{$set->keyw}}@endsection
@section('desc'){{$set->desc}}@endsection
@section('content')
<main>
    <div id="carousel-home">
        <div class="owl-carousel owl-theme">
            <div class="owl-slide cover" style="background-image: url(/assets/images/slider/slider-1.png);">
                <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                    <div class="container">
                        <div class="row justify-content-center justify-content-md-end">
                            <div class="col-lg-6 static">
                                <div class="slide-text text-end white">
                                    <h2 class="owl-slide-animated owl-slide-title">Bayan Batnik İçin<br>Büyük Fırsatlar</h2>
                                    <p class="owl-slide-animated owl-slide-subtitle">
                                        Fırsatları Kaçırmamak İçin Hemen Alışverişe Başlayın
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/owl-slide-->
            <div class="owl-slide cover" style="background-image: url(/assets/images/slider/slider-2.png);">
                <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                    <div class="container">
                        <div class="row justify-content-center justify-content-md-start">
                            <div class="col-lg-6 static">
                                <div class="slide-text white">
                                    <h2 class="owl-slide-animated owl-slide-title">Bayan Kazaklarda<br>Kaçırılmıyacak Fırsatlar</h2>
                                    <p class="owl-slide-animated owl-slide-subtitle">
                                        Fırsatları Kaçırmamak İçin Hemen Alışverişe Başlayın
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/owl-slide-->
            <div class="owl-slide cover" style="background-image: url(/assets/images/slider/slider-3.png);">
                <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                    <div class="container">
                        <div class="row justify-content-center justify-content-md-start">
                            <div class="col-lg-12 static">
                                <div class="slide-text text-center black">
                                    <h2 class="owl-slide-animated owl-slide-title" style="color: #fff">Telegram<br>Viber<br>Gruplarımız</h2>
                                    <p class="owl-slide-animated owl-slide-subtitle" style="color: #fff">
                                        Telegram ve Viber Gruplarımıza Katılarak Özel Fırsatlara Erişebilirsiniz.
                                    </p>
                                    <div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="https://t.me/{{$socialMedias->telegram}}" role="button">Telegram Grubumuz <i style="color: #fff" class="fab fa-telegram-plane"></i></a></div>
                                    <div style="margin-top: 5px" class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="{{$socialMedias->viber}}" role="button">Viber Grubumuz <i style="color: #fff" class="fab fa-viber"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/owl-slide-->
            </div>
        </div>
        <div id="icon_drag_mobile"></div>
    </div>
    <!--/carousel-->

    <ul id="banners_grid" class="clearfix">
        <li>
            <a href="#0" class="img_container">
                <img src="img/banners_cat_placeholder.jpg" data-src="/assets/images/banner/banner-1.png" alt="" class="lazy">
                <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                    <h3>Женская Бантик</h3>
                    <div><span class="btn_1">Alışverişe Başla</span></div>
                </div>
            </a>
        </li>
        <li>
            <a href="#0" class="img_container">
                <img src="img/banners_cat_placeholder.jpg" data-src="\assets\images\banner\banner-2.png" alt="" class="lazy">
                <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                    <h3>женский костюм</h3>
                    <div><span class="btn_1">Alışverişe Başla</span></div>
                </div>
            </a>
        </li>
        <li>
            <a href="#0" class="img_container">
                <img src="img/banners_cat_placeholder.jpg" data-src="/assets/images/banner/banner-3.png" alt="" class="lazy">
                <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                    <h3>Женская Свитер</h3>
                    <div><span class="btn_1">Alışverişe Başla</span></div>
                </div>
            </a>
        </li>
    </ul>

    <div class="container margin_60_35">
        <div class="main_title">
            <h2>Наши рекомендуемые товары</h2>
            <span>Featured</span>
            <p>Öne Çıkan Ürünlerle İlgili Yazı</p>
        </div>
        <div class="owl-carousel owl-theme products_carousel">
            @foreach ($featureds as $featured)
                <div class="item">
                    <div class="grid_item">
                        <span class="ribbon off">Öne Çıkan Fırsat</span>
                        <figure>
                            <a href="{{ route('product',[$featured->getProduct->getCategory->slug,$featured->getProduct->slug,$featured->getProduct->code]) }}">
                                <img style="width: 100%;  max-height: 300px" class="owl" src="/assets/images/products/{{$featured->getProduct->img}}" data-src="img/products/shoes/4.jpg" alt="{{$featured->getProduct->name}}">
                            </a>
                            @if ($featured->getProduct->quantity > 0)
                                <div class="" style="width: 100%; background-color:#47C78E; ">
                                    <h5 style="color:#fff">В Наличии</h5>
                                </div>
                            @else
                                <div class="" style="width: 100%; background-color:#c6c6c6; ">
                                    <h5 style="color:#fff">Нет В Наличии</h5>
                                </div>
                            @endif
                        </figure>
                        {{-- <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div> --}}
                        <a href="{{ route('product',[$featured->getProduct->getCategory->slug,$featured->getProduct->slug,$featured->getProduct->code]) }}">
                            <h3>{{$featured->getProduct->name}}</h3>
                            <div class=""><span>{{$featured->getProduct->code}}</span></div>
                        </a>
                        <div class="price_box">
                            <span class="new_price">₴{{$featured->getProduct->price}}</span>
                        </div>
                        <ul>
                            <form action="{{route('favorites.add')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$featured->getProduct->id}}">
                                <li><button type="submit" class="favoriteAdd" data-bs-toggle="tooltip" data-bs-placement="left" title="Favorilere Ekle"><i class="ti-heart"></i></button></li>
                            </form>
                        </ul>
                        @if ($featured->getProduct->quantity > 0)
                        <div class="">
                            <form action=" {{ route('cart.add') }} " method="post">
                                @csrf
                                <input type="hidden" name="qty" value=4>
                                <input type="hidden" name="id" value="{{ $featured->getProduct->id }}">
                                <input type="submit" value="В Корзину" class="addCard">
                            </form>
                        </div>
                        @else
                        <div class="">
                            <input style="background-color: #c6c6c6 " type="submit" disabled value="Нет В Наличии"  class="addCard">
                        </div>
                        @endif
                    </div>
                    <!-- /grid_item -->
                </div>
            @endforeach
            <!-- /item -->
        </div>
        <!-- /products_carousel -->
        
    </div>

    <div class="container margin_60_35">
        <div class="main_title">
            <h2>Горячие Новинки</h2>
            <span>New</span>
            <p>Yeni Ürünlerle İlgili Yazı</p>
        </div>
        <div class="owl-carousel owl-theme products_carousel">
            @foreach ($newProducts as $newProduct)
                <div class="item">
                    <div class="grid_item">
                        <span class="ribbon new">Новинки</span>
                        <figure>
                            <a href="{{ route('product',[$newProduct->getCategory->slug,$newProduct->slug,$newProduct->code]) }}">
                                <img style="width: 400px%;  max-height: 300px" class="owl" src="/assets/images/products/{{$newProduct->img}}" data-src="img/products/shoes/4.jpg" alt="{{$newProduct->name}}">
                            </a>
                            @if ($newProduct->quantity > 0)
                                <div class="" style="width: 100%; background-color:#47C78E; ">
                                    <h5 style="color:#fff">В Наличии</h5>
                                </div>
                            @else
                                <div class="" style="width: 100%; background-color:#c6c6c6; ">
                                    <h5 style="color:#fff">Нет В Наличии</h5>
                                </div>
                            @endif
                        </figure>
                        {{-- <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div> --}}
                        <a href="{{ route('product',[$newProduct->getCategory->slug,$newProduct->slug,$newProduct->code]) }}">
                            <h3>{{$newProduct->name}}</h3>
                            <div class=""><span>{{$newProduct->code}}</span></div>
                        </a>
                        <div class="price_box">
                            <span class="new_price">₴{{$newProduct->price}}</span>
                        </div>
                        <ul>
                            <form action="{{route('favorites.add')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$newProduct->id}}">
                                <li><button type="submit" class="favoriteAdd" data-bs-toggle="tooltip" data-bs-placement="left" ><i class="ti-heart"></i></button></li>
                            </form>
                        </ul>
 
                        @if ($newProduct->quantity > 0)
                        <div class="">
                            <form action=" {{ route('cart.add') }} " method="post">
                                @csrf
                                <input type="hidden" name="qty" value=4>
                                <input type="hidden" name="id" value="{{ $newProduct->id }}">
                                <input type="submit" value="В Корзину" class="addCard">
                            </form>
                        </div>
                        @else
                        <div class="">
                            <input style="background-color: #c6c6c6 " type="submit" disabled value="Нет В Наличии"  class="addCard">
                        </div>
                        @endif
                    </div>
                    <!-- /grid_item -->
                </div>
            @endforeach
            <!-- /item -->
        </div>
        <!-- /products_carousel -->
        
    </div>
    

    <!-- MARKALAR -->    
    {{-- <div class="bg_gray">
        <div class="container margin_30">
            <div id="brands" class="owl-carousel owl-theme">
                @foreach ($brands as $brand)
                    <div class="item">
                        <a href="#0"><img style="background-color: none" src="/assets/images/brands/{{$brand->img}}" data-src="/assets/images/brands/{{$brand->img}}" alt="" class="owl-lazy"></a>
                    </div><!-- /item -->
                @endforeach

            </div><!-- /carousel -->
        </div><!-- /container -->
    </div>
     --}}

    <div class="container margin_60_35">
        <div class="main_title">
            <h2>блог</h2>
            <span>Blog</span>
            <p>Blogla İlgili Yazı</p>
        </div>
        <div class="row">

            @foreach ($blogs as $blog)
                <div class="col-lg-6">
                    <a class="box_news" href="{{ route('blog-detail',[$blog->slug]) }}">
                        <figure>
                            <img src="/assets/images/blogs/{{$blog->img}}" alt="{{$blog->title}}" width="400" height="266" class="lazy">
                        </figure>
                        <ul>
                            <li>{{$blog->created_at}}</li>
                        </ul>
                        <h4>{{$blog->title}}</h4>
                        <p>{{ Str::substr($blog->content, 0, 100)  }}...</p>
                    </a>
                </div>
                <!-- /box_news -->
            @endforeach
                <div class="container">
                    <div class="row" style="text-align: center">
                        <a href="{{route('blog')}}"><button class="addCard blogBtn" type="submit">Просмотреть все сообщения</button></a>
                    </div>
                </div>
        </div>
        <!-- /row -->
    </div>
    
</main> 
@endsection