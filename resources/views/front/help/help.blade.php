@extends('front.layouts.master')
@section('title')Yardım | {{$set->title}}@endsection
@section('content')
<main class="bg_gray">
		
	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="{{route('homepage')}}">Anasayfa</a></li>
					<li><a href="{{route('account')}}">Hesabım</a></li>
					<li>Yardım</li>
				</ul>
		</div>
		<h1>Yardım</h1>
		<div class="row">
            <div class="col-xl-6">
                @include('admin.layouts.partials.error')
                @include('admin.layouts.partials.alert')        
            </div>
        </div>
	</div>
	<!-- /page_header -->
			<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-6 col-md-8">
				<div class="box_account">
					<h3 class="new_client">Bize Yazarak Yardım Alabilirsiniz</h3>
					<div class="form_container">
						<form action="{{route('help.send')}}" method="post">
							@csrf
							<div class="form-group">
								<input type="text" class="form-control" name="name" id="email_2" placeholder="Ad Soyad">
							</div>
							<div class="form-group">
								<input type="email" class="form-control" name="email" id="email_2" placeholder="E-mail">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="subject" id="email_2" placeholder="Konu">
							</div>
							<div class="form-group">
								<textarea class="form-control" name="content"  id="email_2" >Hangi Konuda Yardım Almak İstersiniz?</textarea>
							</div>
							<div class="text-center">
								<input type="submit" value="Gönder" class="btn_1 full-width">
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