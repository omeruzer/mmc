@extends('front.layouts.master')
@section('title')Личные данные | {{$set->title}}@endsection
@section('content')
<main class="bg_gray">
		
	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="{{route('homepage')}}">Главная</a></li>
					<li><a href="{{route('account')}}">Профиль</a></li>
					<li>Личные данные</li>
				</ul>
		</div>
		<h1>Личные данные</h1>
	</div>
    <div class="row">
        <div class="col-xl-6">
            @include('admin.layouts.partials.error')
            @include('admin.layouts.partials.alert')        
        </div>
      </div>
	<!-- /page_header -->
			<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-6 col-md-8">
                <div class="form-container">
                    <div class="box_account">
                        <h3 class="new_client">Личные данные</h3>
                        <form action="{{route('user-account.post')}}" method="post">
                            @csrf
                            <div class="form_container">
                                <div class="form-group">
                                    <input type="text" autocomplete="off" class="form-control" value="{{auth()->user()->name}}" name="name" id="email_2" placeholder="имя Фамилия">
                                </div>
                                <div class="form-group">
                                    <input type="email" autocomplete="off" class="form-control" value="{{auth()->user()->email}}" name="email" id="email_2" placeholder="Эл. почта*">
                                </div>
                                <div class="form-group">
                                    <input type="text" autocomplete="off" class="form-control" value="{{auth()->user()->phone}}" name="phone" id="email_2" placeholder="телефон*">
                                </div>
        
                                <div class="text-center"><input type="submit" value="Сохранить" class="btn_1 full-width"></div>
                            </div>
                        </form>

                        <!-- /form_container -->
                    </div>
                </div>
				<!-- /box_account -->
			</div>
		</div>
		<!-- /row -->
		</div>
		<!-- /container -->
	</main>
@endsection
