@extends('front.layouts.master')
@section('title')Giriş Yap | {{$set->title}}@endsection
@section('keyw'){{$seo->keyw}}@endsection
@section('desc'){{$seo->desc}}@endsection
<section></section>
@section('content')
<main class="bg_gray">
		
	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="{{ route('homepage') }}">Anasayfa</a></li>
					<li>Giriş Yap veya Üye Ol</li>
				</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-xl-6">
			@include('admin.layouts.partials.error')
			@include('admin.layouts.partials.alert')
		</div>
	</div>
		<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-6 col-md-8">
				<div class="box_account">
					<h3 class="client">Giriş Yap</h3>
                    <form action="{{ route('login') }}" method="post">
						@csrf
                        <div class="form_container">
                            <div class="form-group">
                                <input type="email" autocomplete="off" value="{{old('email')}}" class="form-control" name="email" id="email" placeholder="E-mail">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="password_in" value="" placeholder="Parola">
                            </div>
                            {{-- <div class="clearfix add_bottom_15">
                                <div class="float-right"><a id="forgot" style="float: right" href="javascript:void(0);">Lost Password?</a></div>
                            </div> --}}
                            <div class="text-center"><input type="submit" value="Giriş Yap" class="btn_1 full-width"></div>
                        </div>
                    </form>
					<!-- /form_container -->
				</div>
				<!-- /box_account -->
			</div>

			<div class="col-xl-6 col-lg-6 col-md-8">
				<div class="box_account">
					<h3 class="new_client">Üye Ol</h3>
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="form_container">
                            <div class="form-group">
                                <input type="text" autocomplete="off" value="{{ old('name') }}" class="form-control" name="name" placeholder="Ad Soyad">
                            </div>
                            <div class="form-group">
                                <input type="email" autocomplete="off" value="{{ old('email') }}" class="form-control" name="email"  placeholder="E-mail*">
                            </div>
                            <div class="form-group">
                                <input type="password" autocomplete="off" class="form-control" name="password" placeholder="Parola*">
                            </div>
                            <div class="form-group">
                                <input type="password" autocomplete="off" class="form-control" name="password_confirmation" placeholder="Parola (Tekrar)*">
                            </div>

                            {{-- <div class="form-group">
                                <label class="container_check">Accept <a href="#0">Şartlar ve Koşullar</a>
                                    <input type="checkbox" name="accept">
                                    <span class="checkmark"></span>
                                </label>
                            </div> --}}
                            <div class="text-center"><input type="submit" value="Üye Ol" class="btn_1 full-width"></div>
                        </div>
                    </form>
					<!-- /form_container -->
				</div>
				<!-- /box_account -->
			</div>
		</div>
		<!-- /row -->
	</main>
@endsection
@section('head')
<link href="/assets/front/css/account.css" rel="stylesheet">
@endsection