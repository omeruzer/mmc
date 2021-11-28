@extends('front.layouts.master')
@section('title'){{$category->title}} | {{$set->title}}@endsection
@section('keyw'){{$category->keyw}}@endsection
@section('desc'){{$category->desc}}@endsection
@section('content')
<main>
    <div class="container margin_30">
        <div class="row">
            <div class="col-lg-12">
                <div class="top_banner">
                    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
                        <div class="container pl-lg-5">
                            <div class="breadcrumbs">
                                <ul>
                                    <li><a href="{{ route('homepage') }}">Anasayfa</a></li>
                                    <li>{{ $category->title }}</li>
                                </ul>
                            </div>
                            <h1>{{$category->title}}</h1>
                        </div>
                    </div>
                    <img src="/assets/images/banner/category-banner.png" class="img-fluid" alt="">
                </div>
                <!-- /top_banner -->
                <div id="stick_here"></div>
                <div class="toolbox elemento_stick add_bottom_30">
                    <div class="container">
                        @if (count($products) > 0)
                        <ul class="clearfix">
                            <li>
                                <div class="btn-group">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Sırala
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="?sortby=hits">Popülariteye Göre</a>
                                        <a class="dropdown-item" href="?sortby=cheap">Ucuzdan Pahalıya</a>
                                        <a class="dropdown-item" href="?sortby=expensive">Pahalıdan Ucuza</a>
                                        <a class="dropdown-item" href="?sortby=new">Yeniden Eskiye</a>
                                        <a class="dropdown-item" href="?sortby=old">Eskiden Yeniye</a>
                                        <a class="dropdown-item" href="?sortby=az">İsme Göre (A-Z)</a>
                                        <a class="dropdown-item" href="?sortby=za">İsme Göre (Z-A)</a>
                                    </div>
                                  </div>
                            </li>
                        </ul>

                        @else
                            
                        @endif
                    </div>
                </div>
                <!-- /toolbox -->
               <div class="row small-gutters">
                    @if (count($products) > 0)
                    @foreach ($products as $product)
                            <div class="col-12 col-md-3">
                                <div class="grid_item">
                                    {{-- <span class="ribbon off">-30%</span> --}}
                                    <figure>
                                        <a href="{{ route('product',[$product->getCategory->slug,$product->slug,$product->code]) }}">
                                            <img style="width: 400px; height: 400px;" class="img-fluid" src="/assets/images/products/{{$product->img}}" data-src="img/products/shoes/1.jpg" alt="">
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
                                        {{-- <div data-countdown="2019/05/15" class="countdown"></div> --}}
                                    </figure>
                                    <a href="{{ route('product',[$product->getCategory->slug,$product->slug,$product->code]) }}">
                                        <h3>{{$product->name}}</h3>
                                    </a>
                                    <div class="price_box">
                                        <span class="new_price">${{$product->price}}</span>
                                        {{-- <span class="old_price">$60.00</span> --}}
                                    </div>

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
                        @endforeach
                    @else
                        <div class="container">
                            <div class="col-lg-12" style="text-align: center">
                                <h1>Bu Kategoride Hiç Ürünümüz Yok</h1>
                            </div>
                        </div>
                    @endif


                    <!-- /col -->
                </div>
                <!-- /row -->
                <div class="pagination__wrapper">
                    {{  request()->has('sortby') ? $products->appends(['sortby'=>request('sortby')]) : $products->links() }}
                </div>
            </div>
            <!-- /col -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</main>
@endsection
@section('head')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endsection
@section('footer')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection