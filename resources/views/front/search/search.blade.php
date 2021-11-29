@extends('front.layouts.master')
@section('title'){{$searching}} | {{$set->title}}@endsection
@section('keyw'){{$searching}}@endsection
@section('desc'){{$searching}}@endsection
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
                                    <li>{{$searching}}</li>
                                </ul>
                            </div>
                            <h1>{{$searching}}</h1>
                        </div>
                    </div>
                    <img src="/assets/images/banner/category-banner.png" class="img-fluid" alt="">
                </div>
                <!-- /top_banner -->

                    @if (count($products) > 0)
                        <div id="stick_here"></div>
                        <div class="toolbox elemento_stick add_bottom_30">
                            <div class="container">
                                <ul class="clearfix">
                                    <li>
                                        <div class="btn-group">
                                            <h5>İlgili Ürünler</h5>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /toolbox -->
        
                        <div class="row small-gutters">
                            @foreach ($products as $product)
                                <div class="col-12 col-md-3">
                                    <div class="grid_item">
                                        {{-- <span class="ribbon off">-30%</span> --}}
                                        <figure>
                                            <a href="{{ route('product',[$product->getCategory->slug,$product->slug,$product->code]) }}">
                                                <img style="width: 400px; height: 400px;" class="img-fluid" src="/assets/images/products/{{$product->img}}" data-src="img/products/shoes/1.jpg" alt="{{$product->name}}">
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
                                        <a style="text-decoration: none" href="{{ route('product',[$product->getCategory->slug,$product->slug,$product->code]) }}">
                                            <h3>{{$product->name}}</h3>
                                            <div class=""><span style="color: #47C78E">{{$product->code}}</span></div>
                                        </a>
                                        <div class="price_box">
                                            <span class="new_price">${{$product->price}}</span>
                                            {{-- <span class="old_price">$60.00</span> --}}
                                        </div>
                                        <ul>
                                            <form action="{{route('favorites.add')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$product->id}}">
                                                <li><button type="submit" class="favoriteAdd" data-bs-toggle="tooltip" data-bs-placement="left" title="Favorilere Ekle"><i class="ti-heart"></i></button></li>
                                            </form>
                                        </ul>
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
                            <div class="pagination__wrapper">
                                {{  request()->has('sortby') ? $products->appends(['sortby' => request('sortby'),'searching'=>request('searching')]) : $products->links() }}
                            </div>
                        @else
                            <div class="container" style="margin-top:50px ">
                                <div class="col-lg-12" style="text-align: center">
                                    <h4>
                                        Aradığınız Kelimeye Ait Bir Ürün Bulamadık. <br> <span>Alışverişe Devam Etmek İçin <a href="{{route('homepage')}}">Tıklayınız</a></span>
                                    </h4>
                                </div>
                            </div>                        
                        @endif

                     <!-- /col -->
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