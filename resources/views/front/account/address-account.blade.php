@extends('front.layouts.master')
@section('title')Адрес доставки | {{$set->title}}@endsection

@section('content')
<main class="bg_gray">
		
	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="{{route('homepage')}}">Главная</a></li>
					<li><a href="{{route('account')}}">Профиль</a></li>
					<li>Адрес доставки</li>
				</ul>
		</div>
		<h1>Адрес доставки</h1>
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
                        <h3 class="new_client">Адрес доставки</h3>
                        <form action="{{route('address-account.post')}}" method="post">
                            @csrf
                            <div class="form_container">
                                <div class="form-group">
                                    <input type="text" autocomplete="off" class="form-control" value="{{auth()->user()->address}}" name="address" id="email_2" placeholder="Адрес">
                                </div>
                                <div class="form-group">
                                    <input type="text" autocomplete="off" class="form-control" value="{{auth()->user()->city}}" name="city" id="email_2" placeholder="город">
                                </div>
                                <div class="form-group">
                                    <input type="text" autocomplete="off" class="form-control" value="{{auth()->user()->country}}" name="country" id="email_2" placeholder="страна">
                                </div>
                                <div class="form-group">
                                    <input type="text" autocomplete="off" class="form-control" value="{{auth()->user()->postCode}}" name="postCode" id="email_2" placeholder="почтовый индекс">
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