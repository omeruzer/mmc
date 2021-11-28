@extends('front.layouts.master')
@section('title')Adres Bilgilerim | {{$set->title}}@endsection

@section('content')
<main class="bg_gray">
		
	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="{{route('homepage')}}">Anasayfa</a></li>
					<li><a href="{{route('account')}}">Hesabım</a></li>
					<li>Adres Bilgilerim</li>
				</ul>
		</div>
		<h1>Adres Bilgilerim</h1>
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
                        <h3 class="new_client">Adres Bilgilerim</h3>
                        <form action="{{route('address-account.post')}}" method="post">
                            @csrf
                            <div class="form_container">
                                <div class="form-group">
                                    <input type="text" autocomplete="off" class="form-control" value="{{auth()->user()->address}}" name="address" id="email_2" placeholder="Adres">
                                </div>
                                <div class="form-group">
                                    <input type="text" autocomplete="off" class="form-control" value="{{auth()->user()->city}}" name="city" id="email_2" placeholder="Şehir">
                                </div>
                                <div class="form-group">
                                    <input type="text" autocomplete="off" class="form-control" value="{{auth()->user()->country}}" name="country" id="email_2" placeholder="Ülke">
                                </div>
                                <div class="form-group">
                                    <input type="text" autocomplete="off" class="form-control" value="{{auth()->user()->postCode}}" name="postCode" id="email_2" placeholder="Posta Kodu">
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