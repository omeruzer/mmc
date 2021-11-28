@extends('front.layouts.master')
@section('title')Sepet | {{$set->title}}@endsection
@section('keyw'){{$set->keyw}}@endsection
@section('desc'){{$set->desc}}@endsection
@section('content')
<main class="bg_gray">
    <div class="container margin_30">
    <div class="page_header">
        <div class="breadcrumbs">
            <ul>
                <li><a href="{{ route('homepage') }}">Anasayfa</a></li>
                <li>Sepet</li>
            </ul> 
        </div>
        <h1>Sepet</h1>
        <div class="row">
            <div class="col-xl-6">
                @include('admin.layouts.partials.error')
                @include('admin.layouts.partials.alert')        
            </div>
        </div>
    </div>
    <!-- /page_header -->

    @if (count(Cart::content()) > 0)
    <div class="container">
        <div class="" style="float: right">
            <form action="{{route('cart.deleteAll')}}" class="deleteall" method="post">
                @csrf
                @method('DELETE')
                <button id="cartDeleteall" class="btn btn-xs btn-danger" type="submit">Sepeti Boşalt <i class="fa fa-trash" ></i></button>
            </form>
        </div>
    </div>
    <table class="table table-striped cart-list">
        <thead>
            <tr>
                <th style="width: 40%">
                    Ürün
                </th>
                <th>
                    Fiyat
                </th>
                <th>
                    Adet
                </th>
                <th >
                    Toplam
                </th>
                <th >
                    
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach (Cart::content() as $cartItem)
                <tr>
                    <td>
                        <div class="thumb_cart">
                            <img width="50%" src="/assets/images/products/{{$cartItem->options->img}}" class="" alt="Image">
                        </div>
                        <span class="item_cart">{{$cartItem->name}}</span>
                    </td>
                    <td style="width: 10%"  >
                        <strong>${{$cartItem->price}}</strong>
                    </td>
                    <td>
                        <div class="cart-qty" >
                            <ul>
                                <li>
                                    <form action="{{ route('cart.decrease',$cartItem->rowId) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="product" value={{$cartItem->id}}>
                                        <input class="btn btn-info btn-qty" style="color:#fff" type="submit" value="-">
                                    </form>
                                </li>
                                <li>
                                    <span name='qty'>{{$cartItem->qty}}</span>

                                </li>
                                <li>
                                    <form action="{{ route('cart.increase',$cartItem->rowId) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="product" value={{$cartItem->id}}>
                                        <input class="btn btn-xs btn-info btn-qty"  style="color:#fff" type="submit" value="+">
                                    </form>
                                </li>
                            </ul>

                        </div>
                    </td>
                    <td>
                        <strong>${{$cartItem->subtotal}}</strong>
                    </td>
                    <td class="options">
                        <form action="{{route('cart.delete',$cartItem->rowId)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button style="float: right" class="btn btn-xs btn-info" type="submit"><i class="fa fa-trash" ></i></button>
                        </form>
                    </td>
                </tr>    
            @endforeach

        </tbody>
        </table>

        <div class="box_cart">
            <div class="container">
            <div class="row justify-content-end">
                <div class="col-xl-4 col-lg-4 col-md-6">
            <ul>
                <li>
                    <span>Toplam</span> ${{Cart::subtotal()}}
                </li>
                <li>
                    <span>Kargo</span> ${{$shipp->track}}
                </li>
                <li>
                    <span>Genel Toplam</span> $ {{ str_replace(',', '', Cart::total()) + $shipp->track }}
                </li>
            </ul>
            <a href="{{route('payment')}}" class="btn_1 full-width cart">Ödeme</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /box_cart -->

    <div class="row add_top_30 flex-sm-row-reverse cart_actions">
    <div class="col-sm-4 text-right">

    {{-- </div>
        <div class="col-sm-8">
            <div class="apply-coupon">
                <div class="form-group form-inline">
                    <input type="text" name="coupon-code" value="" placeholder="Promo code" class="form-control"><button type="button" class="btn_1 outline">Apply Coupon</button>
                </div>
            </div>
        </div>
    </div> --}}
<!-- /cart_actions -->

    @else
        <div class="container" style="text-align: center">
            <h3>
                Sepetinizde hiç ürün bulunmuyor.
                <br><br>
                Alışveriş yapmak için <a href="{{route('homepage')}}">Tıklayınız</a>
            </h3>
        </div>
    @endif
    </div>
    <!-- /container -->
    

    
</main>
@endsection
@section('head')
<link href="/assets/front/css/cart.css" rel="stylesheet">
@endsection