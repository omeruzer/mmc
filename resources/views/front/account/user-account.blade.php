@extends('front.layouts.master')
@section('title')Kullanıcı Bilgilerim | {{$set->title}}@endsection
@section('content')
<main class="bg_gray">
		
	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="{{route('homepage')}}">Anasayfa</a></li>
					<li><a href="{{route('account')}}">Hesabım</a></li>
					<li>Kullanıcı Bilgilerim</li>
				</ul>
		</div>
		<h1>Kullanıcı Bilgilerim</h1>
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
                        <h3 class="new_client">Kullanıcı Bilgilerim</h3>
                        <form action="{{route('user-account.post')}}" method="post">
                            @csrf
                            <div class="form_container">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{auth()->user()->name}}" name="name" id="email_2" placeholder="Ad Soyad">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" value="{{auth()->user()->email}}" name="email" id="email_2" placeholder="E-mail*">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{auth()->user()->phone}}" name="phone" id="email_2" placeholder="Telefon*">
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
