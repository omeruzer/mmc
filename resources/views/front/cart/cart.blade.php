@extends('front.layouts.master')
@section('title')Корзина | {{$set->title}}@endsection
@section('keyw'){{$set->keyw}}@endsection
@section('desc'){{$set->desc}}@endsection
@section('content')
<main class="bg_gray">
    <div class="container margin_30">
    <div class="page_header">
        <div class="breadcrumbs">
            <ul>
                <li><a href="{{ route('homepage') }}">Главная</a></li>
                <li>Корзина</li>
            </ul> 
        </div>
        <h1>Корзина</h1>
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

    </div>
    <table class="table table-striped cart-list">
        <thead>
            <tr>
                <th style="width: 40%">
                    Продукт
                </th>
                <th>
                    Цена
                </th>
                <th>
                    Количество
                </th>
                <th >
                    Сумма
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
                    <td style="width: 15%"  >
                        <strong>{{$cartItem->price}} ₴</strong>
                    </td>
                    <td>
                        <div class="cart-qty" >
                            <ul>
                                <li>
                                    <form action="{{ route('cart.decrease',$cartItem->rowId) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="product" value={{$cartItem->id}}>
                                        <button class=" btn-qty"  style="color:#fff" type="submit" >-</button>
                                    </form>
                                </li>
                                <li>
                                    <span name='qty'>{{$cartItem->qty}}</span>

                                </li>
                                <li>
                                    <form action="{{ route('cart.increase',$cartItem->rowId) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="product" value={{$cartItem->id}}>
                                        <button class=" btn-qty"  style="color:#fff" type="submit" >+</button>
                                    </form>
                                </li>
                            </ul>

                        </div>
                    </td>
                    <td style="width: 50%;">
                        <strong>{{$cartItem->subtotal}} ₴</strong>
                    </td>
                    <td class="options">
                        <form action="{{route('cart.delete',$cartItem->rowId)}}" method="POST">
                            @csrf
                            @method('DELETE')
                                <button class="deletebtn" type="submit"><i class="ti-trash " style="color: red; font-size: 20px"></i></button>
                        </form>
                    </td>
                </tr>    
            @endforeach

        </tbody>
        </table>
        <div class="row add_top_30 flex-sm-row-reverse cart_actions">
			<div class="col-sm-4 text-end">
                <form action="{{route('cart.deleteAll')}}" class="deleteall" method="post">
                    @csrf
                    @method('DELETE')
				    <button type="submit" class="btn btn-danger">Sepeti Boşalt <i class="fa fa-trash"></i></button>
                </form>
			</div>
		</div>
        <div class="box_cart">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <ul>
                            <li>
                                <span>Итого</span> {{Cart::subtotal()}} ₴
                            </li>
                            <li>
                                <span>Стоимость доставки</span> {{$shipp->track}} ₴
                            </li>
                            <li>
                                <span>К оплате</span> {{ str_replace(',', '', Cart::total()) + $shipp->track }}  ₴
                            </li>
                        </ul>
                        <a href="{{route('payment')}}" class="btn_1 full-width cart"> Оформить заказ</a>
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
                В вашей корзине нет товаров..
                <br><br>
                для покупок <a href="{{route('homepage')}}">кликните сюда</a>
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
@section('footer')
    <script src="/assets/front/js/main.js"></script>
@endsection