@extends('front.layouts.master')
@section('title')Оформить заказ | {{$set->title}}@endsection
@section('content')
<main class="bg_gray">
	
		
	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="{{route('homepage')}}">Главная</a></li>
					<li><a href="{{route('cart')}}">Корзина</a></li>
					<li>Оформить заказ</li>
				</ul>
		</div>
		<h1>Оформить заказ</h1>
		<div class="row">
            <div class="col-xl-6">
                @include('admin.layouts.partials.error')
                @include('admin.layouts.partials.alert')        
            </div>
        </div>
	</div>

	<!-- /page_header -->
			<form action="{{route('toPay')}}" method="post">
				@csrf
				<div class="row">
					<div class="col-lg-4 col-md-6">
						<div class="step first">
							<h3>1. Личные данные</h3>
						<div class="tab-content checkout">
							<div class="tab-pane fade show active" id="tab_1" role="tabpanel" aria-labelledby="tab_1">
								<div class="form-group">
									<input type="email" class="form-control" name='email' value="{{auth()->user()->email}}" placeholder="Эл. почта">
								</div>
								<hr>
								<div class="row no-gutters">
									<div class="col-6 form-group pr-1">
										<input type="text" class="form-control" name='name' value="{{auth()->user()->name}}" placeholder="имя Фамилия">
									</div>
								</div>
								<!-- /row -->
								<div class="form-group">
									<input type="text" class="form-control" name='address' value="{{auth()->user()->address}}" placeholder="Адрес">
								</div>
								<div class="row no-gutters">
									<div class="col-6 form-group pr-1">
										<input type="text" class="form-control" name='city' value="{{auth()->user()->city}}" placeholder="город">
									</div>
									<div class="col-6 form-group pl-1">
										<input type="text" class="form-control" name='postCode' value="{{auth()->user()->postCode}}" placeholder="почтовый индекс">
									</div>
									<div class="col-6 form-group pl-1">
										<input type="text" class="form-control" name='country' value="{{auth()->user()->country}}" placeholder="страна">
									</div>
								</div>
								<!-- /row -->
								<div class="form-group">
									<input type="tel" class="form-control" name='phone' value="{{auth()->user()->phone}}" placeholder="телефон">
								</div>

								<hr>
							</div>
							<!-- /tab_2 -->
						</div>
						</div>
						<!-- /step -->
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="step middle payments">
							<h3>2. Оплата и доставка</h3>
								<h6 class="pb-2">Способ оплаты</h6>
								<ul>
									<li>
										<label class="container_radio">Оплата картой
											<input class="card-checked" type="radio" name="payment" value="Kredi Kartı">
											<span class="checkmark"></span>
										</label>
									</li>
									<li>
										<div class="card-info">
											<label for="">Информация об аккаунте</label>
											<p>Название банка : {{$bank->bankName}}</p>
											<p>номер счета : {{$bank->accountNumber}}</p>
										</div>
									</li>
									<li>
										<label class="container_radio">Наложенным платежом
											<input class="door" type="radio" name="payment" value="Kapıda Ödeme">
											<span class="checkmark"></span>
										</label>
									</li>
								</ul>
								<h6 class="pb-2">Тип доставки</h6>
								<ul>
									<li>
										<label class="container_radio">Новая почта
											<input type="radio" name="shipping" value="Nova Poşta">
											<span class="checkmark"></span>
										</label>
									</li>
									<li>
										<label class="container_radio">Адресная доставка
											<input type="radio" name="shipping" value="Adrese Teslim">
											<span class="checkmark"></span>
										</label>
									</li>
									<li>
										<label class="container_radio">Самовывоз
											<input type="radio" name="shipping" value="Gel Al">
											<span class="checkmark"></span>
										</label>
									</li>
									
								</ul>
							
						</div>
						<!-- /step -->
						
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="step last">
							<h3>3. Оформить заказ</h3>
						<div class="box_general summary">
							<ul>
								@foreach (Cart::content() as $cartItem)
									<li class="clearfix"><em>{{$cartItem->qty}}x {{Str::substr($cartItem->name,0,15)}}...</em>  <span>{{$cartItem->price}} ₴</span><span style="color: #47C68E">{{$cartItem->subtotal()}} ₴</span></li>
								@endforeach
							</ul>
							<ul>
								<li class="clearfix"><em><strong>Итого</strong></em>  <span>{{Cart::subtotal()}} ₴</span></li>
								<li class="clearfix"><em><strong>Стоимость доставки</strong></em> <span>{{$shipp->track}} ₴</span></li>
								
							</ul>
							<div class="total clearfix">К оплате <span>{{ str_replace(',', '', Cart::total()) + $shipp->track }} ₴</span></div>
							<input type="hidden" name="cartTotal" value="{{ str_replace(',', '', Cart::total()) + $shipp->track }}">
							
							<button type="submit" class="btn_1 full-width topay" >Оформить заказ</button>
						</div>
						<!-- /box_general -->
						</div>
						<!-- /step -->
					</div>
				</div>
			</form>
			<!-- /row -->
		</div>
		<!-- /container -->
	</main>
@endsection
@section('head')
<link href="/assets/front/css/checkout.css" rel="stylesheet">
@endsection
@section('footer')
<script>
	
    // Other address Panel
    $('#other_addr input').on("change", function (){
        if(this.checked)
            $('#other_addr_c').fadeIn('fast');
        else
            $('#other_addr_c').fadeOut('fast');
    });
</script>

<script>

	document.querySelectorAll('form').forEach((form) => {
		form.addEventListener('submit',()=>{
			var button = form.querySelector('[type=submit]');

			button.setAttribute('disabled','disabled');
		})
	});

</script>
	
<script>
	
	$('.card-info').hide();

	$('.card-checked').click(function () { 

		if($('.card-checked').prop("checked") == 'checked'){
			$('.card-info').hide();
		}else{
			$('.card-info').show();

		}
	});



</script>
@endsection