@extends('front.layouts.master')
@section('title')
    {{strtoupper($product->getBrand->name)}}  {{$product->name}} | {{$set->title}}
@endsection
@section('keyw'){{$product->keyw}}@endsection
@section('desc'){{$product->desc}}@endsection
@section('content')
<main>
    <div class="container margin_30">
        <div class="row">
            <div class="col-xl-6">
                @include('admin.layouts.partials.error')
                @include('admin.layouts.partials.alert')        
            </div>
        </div>
        <div class="breadcrumbs" style="margin: 10px">
            <ul>
                <li><a href="#">Главная</a></li>
                <li><a href="{{route('category',[$product->getCategory->slug,$product->getCategory->id])}}">{{$product->getCategory->title}}</a></li>
                <li>{{$product->name}}</li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="all" >
                    <div class="slider" style="width: 70%; margin: auto">
                        <div class="owl-carousel owl-theme main" style="width: 100%;">
                            <div class="item-box">
                                <a href="/assets/images/products/{{$product->img}}" data-lightbox="Galeri1"><img style="width: 100%; height: 100%;" src="/assets/images/products/{{$product->img}}" alt="{{$product->name}}" srcset=""></a>
                            </div> 
                            @foreach ($images as $img)
                                <div class="item-box">
                                    <a href="/assets/images/products/{{$img->img}}" data-lightbox="Galeri1"><img style="width: 100%; height: 100%;" src="/assets/images/products/{{$img->img}}" alt="{{$product->name}}" srcset=""></a>
                                </div>                                
                            @endforeach
                       </div>
                        <div class="left nonl"><i class="ti-angle-left"></i></div>
                        <div class="right"><i class="ti-angle-right"></i></div>
                    </div>
                    <div class="slider-two" style="width: 70%; margin: auto">
                        <div class="owl-carousel owl-theme thumbs">
                            <div style="background-image: url(/assets/front/img/products/shoes/1.jpg);" class="item active">
                                <a href="/assets/images/products/{{$product->img}}" data-lightbox="Galeri1"><img style="width: 100%; height: 100%;" src="/assets/images/products/{{$product->img}}" alt="{{$product->name}}" srcset=""></a>
                            </div>
                            @foreach ($images as $img)                                
                                <div style="background-image: url(/assets/front/img/products/shoes/1.jpg);" class="item active">
                                    <a href="/assets/images/products/{{$img->img}}" data-lightbox="Galeri1"><img style="width: 100%; height: 100%;" src="/assets/images/products/{{$img->img}}" alt="{{$product->name}}" srcset=""></a>
                                </div>
                            @endforeach

                        </div>
                        <div class="left-t nonl-t"></div>
                        <div class="right-t"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- /page_header -->
                <div class="prod_info">
                    <h1><b>{{strtoupper($product->getBrand->name)}}</b> {{mb_convert_case($product->name,MB_CASE_TITLE)}}</h1>
                    {{-- <span class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i><em>4 reviews</em></span> --}}
                    <p><small>Код : </small><b style="color: #47C78E">{{$product->code}}</b><br><br>цена за упаковку : <b style="color: #47C78E">{{$product->price*4}} ₴</b><br><br>на складе : <b style="color: #47C78E">{{$product->quantity}}</b></p>
                    @if ($product->quantity > 0)
                        <form action=" {{ route('cart.add') }} " method="post">
                            @csrf
                            <div class="prod_   ">
                                <div class="row">
                                    <label class="col-xl-5 col-lg-5  col-md-6 col-6"><strong>шт</strong></label>
                                    <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                                        <div class="numbers-row">
                                            <input type="text" value=4 id="quantity_1" class="qty2" name="qty">
                                            <div class="inc button_inc">+</div>
                                            <div class="dec button_inc">-</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-5 col-md-6">
                                    <div class="price_main"><span class="new_price">{{$product->price}} ₴</span><!--<span class="percentage">-20%</span> <span class="old_price">$160.00</span>--></div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <input type="submit" value="В Корзину" class="addCard">
                                </div>
                            </div>
                        </form>   
                    @else
                        <div class="row">
                            <div class="col-lg-5 col-md-6">
                                <div class="price_main"><span class="new_price" style="color: #c6c6c6">{{$product->price}} ₴</span></div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <input style="background-color: #c6c6c6 " type="submit" value="Нет В Наличии" disabled class="addCard">
                            </div>
                        </div>
                    @endif

                </div>
                <!-- /prod_info -->
                <div class="product_actions">
                    <ul>
                        <li>
                            <form action="{{route('favorites.add')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$product->id}}">
                                <li>
                                    <button type="submit" class="favoriteAdd" data-bs-toggle="tooltip" data-bs-placement="left" ><i class="ti-heart"></i> добавить в избранное</button>
                                </li>
                            </form>
                        </li>
                    </ul>
                </div>
                <!-- /product_actions -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
    <div class="tab_content_wrapper">
        <div class="container">
            <div class="tab-content" role="tablist">
                <div id="" class="card tab-pane fade active show" role="tabpanel" aria-labelledby="tab-A">
                    <div id="collapse-A" class="" role="tabpanel" aria-labelledby="heading-A">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col-lg-6">
                                    <h3>Описание </h3>
                                    <span>{!! $product->content !!}</span>
                                </div>
                                <div class="col-lg-5">
                                    <h3>Характеристики </h3>
                                    <div class="table-responsive">
                                        <table class="table table-sm table-striped">
                                            <tbody>
                                                <tr>
                                                    <td><strong>Бренд</strong></td>
                                                    <td>{{strtoupper($product->getBrand->name )}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Цвет</strong></td>
                                                    <td>{{$product->colors}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Состав</strong></td>
                                                    <td>{{$product->material}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Страна производитель</strong></td>
                                                    <td>{{$product->country}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Размер</strong></td>
                                                    <td>{{$product->pattern}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>количество в упаковке</strong></td>
                                                    <td>{{$product->packQty}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Размерный ряд</strong></td>
                                                    <td>{{$product->size}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /table-responsive -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /tab-content -->
        </div>
        <!-- /container -->
    </div>
    <br>
    <div class="tab_content_wrapper">
        <div class="container">
            <div class="tab-content" role="tablist">
                <div id="" class="card tab-pane fade active show" role="tabpanel" aria-labelledby="tab-A">
                    <div id="collapse-A" class="" role="tabpanel" aria-labelledby="heading-A">

                        @if (count($comments) > 0)
                            <div class="card-body">
                                <h3>Отзывы покупателей ({{count($comments)}} Отзывы )</h3>
                                <div id="collapse-B" class="" role="tabpanel" aria-labelledby="heading-B">
                                    <div class="card-body" >
                                        <div class="container">
                                            @foreach ($comments as $comment)
                                                <div class="row justify-content-between">
                                                    <div class="col-lg-12">
                                                        <div class="review_content">
                                                            <h4>"{{$comment->getUser->name}}" <span><small>({{$comment->created_at}})</small></span> @if($user == $comment->user) <small><span><a href="{{route('comment.delete',$comment->id)}}">удалить комментарий <i class="fa fa-trash"></i></a></span></small> @endif</h4>
                                                            <p>{{$comment->comment}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- /card-body -->
                                </div>
                            </div>
                        @else
                            <div class="card-body">
                                <div class="">
                                    <h6>Отзывы покупателей (0 Отзывы)</h6>
                                </div>
                                <div class="">
                                    <span>нет отзывов</span>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
            <!-- /tab-content -->
        </div>
        <!-- /container -->
    </div>
    <br>

    <div class="container" >
        <div class="col-lg-6" style="margin: auto" >
            <div class="" style="text-align: center">
                <h3>Написать отзыв</h3>
            </div>
            <div class="" >
                <form action="{{route('comment.add')}}" method="post" >
                    @csrf
                    <input type="hidden" name="product" value="{{$product->id}}">
                    <div class="container">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">имя Фамилия</label>
                                <input class="form-control" {{ Auth::user() ? '' : 'disabled'  }} value="{{ Auth::user() ? auth()->user()->name : '' }}"  autocomplete="off" name='name' type="text" placeholder="{{ Auth::user() ? 'имя Фамилия' : 'Yorum Yapmak İçin Giriş Yapmanız Gerekiyor'  }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">отзыв</label>
                                <textarea class="form-control" {{ Auth::user() ? '' : 'disabled'  }} autocomplete="off" name="comment" placeholder="{{ Auth::user() ? 'отзыв' : 'Yorum Yapmak İçin Giriş Yapmanız Gerekiyor'  }}"></textarea>
                            </div>
                        </div>
                        @if (Auth::user())
                            <div class="col-md-12" >
                                <div class="form-group" style="float: right">
                                    <input type="submit"  value="Написать отзыв"  class="addCard">
                                </div>
                            </div>
                        @else
                            <div class="col-md-12" >
                                <div class="form-group" style="float: right">
                                    <input style="background-color: #c6c6c6" disabled type="submit"  value="Yorum Yapmak İçin Giriş Yapmanız Gerekiyor"  class="addCard">
                                </div>
                            </div>
                        @endif

                    </div>
                </form>
            </div>
        
        </div>
    </div>
    
    <div class="container margin_60_35" style="margin-top: 50px">
        <div class="main_title">
            <h2>Также вас могут заинтересовать</h2>
            <span>Products</span>
            <p>Это может вас заинтересовать..</p>
        </div>
        <div class="owl-carousel owl-theme products_carousel">
            @foreach ($similarProducts as $similarProduct)
                <div class="item">
                    <div class="grid_item">
                        {{-- <span class="ribbon new">New</span> --}}
                        <figure>
                            <a href="{{ route('product',[$similarProduct->getCategory->slug,$similarProduct->slug,$similarProduct->code]) }}">
                                <img class="owl" src="/assets/images/products/{{$similarProduct->img}}" data-src="img/products/shoes/4.jpg" alt="{{$similarProduct->name}}">
                            </a>
                            @if ($similarProduct->quantity > 0)
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
                        <a href="{{ route('product',[$similarProduct->getCategory->slug,$similarProduct->slug,$similarProduct->code]) }}">
                            <h3>{{$similarProduct->name}}</h3>
                            <div class=""><span>{{$similarProduct->code}}</span></div>
                        </a>
                        <div class="price_box">
                            <span class="new_price">{{$similarProduct->price}} ₴</span>
                        </div>
                        <ul>
                            <form action="{{route('favorites.add')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$similarProduct->id}}">
                                <li><button type="submit" class="favoriteAdd" data-bs-toggle="tooltip" data-bs-placement="left"><i class="ti-heart"></i></button></li>
                            </form>
                        </ul>
                        @if ($similarProduct->quantity > 0)
                            <div class="">
                                <form action=" {{ route('cart.add') }} " method="post">
                                    @csrf
                                    <input type="hidden" name="qty" value=4>
                                    <input type="hidden" name="id" value="{{ $similarProduct->id }}">
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
                <!-- /item -->
            @endforeach


        </div>
        <!-- /products_carousel -->
    </div>
    <!-- /container -->


    <!--/feat-->

</main>
@endsection
@section('footer')
    <script src="\assets\front\photo\js\lightbox.js"></script>
    <script src="\assets\jsjquery.min.js"></script>
    <script src="/assets/front/js/main.js"></script>

    <script type="text/javascript">

        $('.addCard').click(function() {
            fbq('init', '430667125370348');
            fbq('track','Sepete Eklendi');
        });
    </script>

@endsection
@section('head')
    <link rel="stylesheet" href="\assets\front\photo\css\lightbox.css">
@endsection
