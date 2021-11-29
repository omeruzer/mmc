@extends('front.layouts.master')
@section('title')Изменить пароль | {{$set->title}}@endsection
@section('content')
<main class="bg_gray">	
	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="{{route('homepage')}}">Главная</a></li>
					<li><a href="{{route('account')}}">Профиль</a></li>
					<li>Изменить пароль</li>
				</ul>
		</div>
		<h1>Изменить пароль</h1>
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
                        <h3 class="new_client">Изменить пароль</h3>
                        <form action="{{route('password-account.post')}}" method="post">
                            @csrf
                            <div class="form_container">
                                <div class="form-group">
                                    <label for="">Текущий пароль :</label>
                                    <input type="password" autocomplete="off" class="form-control" name="password" id="email_2" placeholder="Текущий пароль">
                                </div>
                                <div class="form-group">
                                    <label for="">Новый пароль :</label>
                                    <input type="password" autocomplete="off" class="form-control"  name="newPassword" id="email_2" placeholder="Новый пароль">
                                </div>
                                <div class="form-group">
                                    <label for="">Новый пароль еще раз :</label>
                                    <input type="password" autocomplete="off" class="form-control" name="newPassword_confirmation" id="email_2" placeholder="Новый пароль еще раз">
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