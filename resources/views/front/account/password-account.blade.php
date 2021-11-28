@extends('front.layouts.master')
@section('title')Şifremi Değiştir | {{$set->title}}@endsection
@section('content')
<main class="bg_gray">	
	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="{{route('homepage')}}">Anasayfa</a></li>
					<li><a href="{{route('account')}}">Hesabım</a></li>
					<li>Şifremi Değiştir</li>
				</ul>
		</div>
		<h1>Şifremi Değiştir</h1>
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
                        <h3 class="new_client">Şifremi Değiştir</h3>
                        <form action="{{route('password-account.post')}}" method="post">
                            @csrf
                            <div class="form_container">
                                <div class="form-group">
                                    <label for="">Eski Şifre :</label>
                                    <input type="password" class="form-control" name="password" id="email_2" placeholder="Eski Şifre">
                                </div>
                                <div class="form-group">
                                    <label for="">Yeni Şifre :</label>
                                    <input type="password" class="form-control"  name="newPassword" id="email_2" placeholder="Yeni Şifre">
                                </div>
                                <div class="form-group">
                                    <label for="">Yeni Şifre (Tekrar) :</label>
                                    <input type="password" class="form-control" name="newPassword_confirmation" id="email_2" placeholder="Yeni Şifre (Tekrar)">
                                </div>
                                <div class="text-center"><input type="submit" value="Güncelle" class="btn_1 full-width"></div>
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