@extends('front.layouts.master')
@section('title')Профиль | {{$set->title}}@endsection
@section('content')
<main class="bg_gray">
	
		
	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="{{route('homepage')}}">Главная</a></li>
					<li>Профиль</li>
				</ul>
		</div>
		<h1>Профиль</h1>
	</div>
	<!-- /page_header -->
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<a class="box_topic" href="{{route('user-account')}}">
						<i class="fa fa-user"></i>
						<h3>Личные данные</h3>
						<p>Hesap Bilgilerinizi Buradan Görebilirsiniz.</p>
					</a>
				</div>
				<div class="col-lg-4 col-md-6">
					<a class="box_topic" href="{{route('password-account')}}">
						<i class="fa fa-key"></i>
						<h3>Изменить пароль</h3>
						<p>Şifrenizi Buradan Değiştirebilirsiniz.</p>
					</a>
				</div>
				<div class="col-lg-4 col-md-6">
					<a class="box_topic" href="{{route('address-account')}}">
						<i class="fa fa-map-marker-alt"></i>
						<h3>Адрес доставки</h3>
						<p>Adres Bilgilerinizi Buradan Görebilirsiniz.</p>
					</a>
				</div>
				<div class="col-lg-4 col-md-6">
					<a class="box_topic" href="{{route('favorites')}}">
						<i class="fa fa-heart"></i>
						<h3> Список желаний </h3>
						<p>Favorilerinizi Buradan Görebilirsiniz.</p>
					</a>
				</div>
				<div class="col-lg-4 col-md-6">
					<a class="box_topic" href="{{route('myOrders')}}">
						<i class="fa fa-shipping-fast"></i>
						<h3>Мои заказы</h3>
						<p>Siparişlerinizi Buradan Görebilirsiniz.</p>
					</a>
				</div>
				<div class="col-lg-4 col-md-6">
					<a class="box_topic" href="{{route('mycomment')}}">
						<i class="fa fa-comment"></i>
						<h3> Мои отзывы </h3>
						<p>Yorumlarınızı Buradan Görebilirsiniz.</p>
					</a>
				</div>
				<div class="col-lg-4 col-md-6">
					<a class="box_topic" href="{{route('order.back')}}">
						<i class="fa fa-undo"></i>
						<h3>мои возвращения</h3>
						<p>İadelerinizi Buradan Görebilirsiniz.</p>
					</a>
				</div>
                <div class="col-lg-4 col-md-6">
					<a class="box_topic" href="{{route('help')}}">
						<i class="fa fa-question"></i>
						<h3>Помощь</h3>
						<p>Bize Yazarak Yardım Alabilirsiniz.</p>
					</a>
				</div>
				<div class="col-lg-4 col-md-6">
					<a class="box_topic" href="{{ route('logout') }}">
						<i class="fa fa-sign-out-alt"></i>
						<h3>Выход</h3>
						<p>Oturumuzu Sonlandırırsınız.</p>
					</a>
				</div>
			</div>
			<!--/row-->
		</div>
		<!-- /container -->
	</main>
@endsection
@section('head')
<link href="/assets/front/css/faq.css" rel="stylesheet">
<link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/font-awesome/css/all.css" rel="stylesheet" type="text/css" />

@endsection