@extends('front.layouts.master')
@section('title')Yardım | {{$set->title}}@endsection
@section('content')
<main class="bg_gray">
		
	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="{{route('homepage')}}">Главная</a></li>
					<li><a href="{{route('account')}}">Профиль</a></li>
					<li>Помощь</li>
				</ul>
		</div>
		<h1>Помощь</h1>
		<div class="row">
            <div class="col-xl-12">
                @include('admin.layouts.partials.error')
                @include('admin.layouts.partials.alert')        
            </div>
        </div>
	</div>
	<!-- /page_header -->
			<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-6 col-md-8">
				<div class="box_account">
					<h3 class="new_client">Вы можете получить помощь, написав нам.</h3>
					<div class="form_container">
						<form action="{{route('help.send')}}" method="post">
							@csrf
							<div class="form-group">
								<input type="text" class="form-control" name="name" id="email_2" placeholder="имя Фамилия">
							</div>
							<div class="form-group">
								<input type="email" class="form-control" name="email" id="email_2" placeholder="Эл. почта">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="subject" id="email_2" placeholder="тема">
							</div>
							<div class="form-group">
								<textarea class="form-control" name="content"  id="email_2" placeholder="Чем я могу помочь вам?"></textarea>
							</div>
							<div class="text-center">
								<input type="submit" value="отправлять" class="btn_1 full-width">
							</div>
						</form>
					</div>
					<!-- /form_container -->
				</div>
				<!-- /box_account -->
			</div>
		</div>
		<!-- /row -->
		</div>
		<!-- /container -->
	</main>
@endsection