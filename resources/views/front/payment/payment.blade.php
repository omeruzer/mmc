@extends('front.layouts.master')
@section('title')Ödeme | {{$set->title}}@endsection
@section('content')
<main class="bg_gray">
	
		
	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="{{route('homepage')}}">Anasayfa</a></li>
					<li><a href="{{route('cart')}}">Sepet</a></li>
					<li>Ödeme</li>
				</ul>
		</div>
		<h1>Ödeme</h1>
		<div class="row">
            <div class="col-xl-6">
                @include('admin.layouts.partials.error')
                @include('admin.layouts.partials.alert')        
            </div>
        </div>
	</div>

	<!-- /page_header -->
			<form action="{{route('toPay')}}" method="post">
				@csrf
				<div class="row">
					<div class="col-lg-4 col-md-6">
						<div class="step first">
							<h3>1. Kullanıcı Bilgileri</h3>
						<div class="tab-content checkout">
							<div class="tab-pane fade show active" id="tab_1" role="tabpanel" aria-labelledby="tab_1">
								<div class="form-group">
									<input type="email" class="form-control" name='email' value="{{auth()->user()->email}}" placeholder="Email">
								</div>
								<hr>
								<div class="row no-gutters">
									<div class="col-6 form-group pr-1">
										<input type="text" class="form-control" name='name' value="{{auth()->user()->name}}" placeholder="Name">
									</div>
								</div>
								<!-- /row -->
								<div class="form-group">
									<input type="text" class="form-control" name='address' value="{{auth()->user()->address}}" placeholder="Full Address">
								</div>
								<div class="row no-gutters">
									<div class="col-6 form-group pr-1">
										<input type="text" class="form-control" name='city' value="{{auth()->user()->city}}" placeholder="City">
									</div>
									<div class="col-6 form-group pl-1">
										<input type="text" class="form-control" name='postCode' value="{{auth()->user()->postCode}}" placeholder="Postal code">
									</div>
									<div class="col-6 form-group pl-1">
										<input type="text" class="form-control" name='country' value="{{auth()->user()->country}}" placeholder="Ülke">
									</div>
								</div>
								<!-- /row -->
								<div class="form-group">
									<input type="tel" class="form-control" name='phone' value="{{auth()->user()->phone}}" placeholder="Telefon">
								</div>

							{{--<hr>	<div class="form-group">
									<label class="container_check" id="other_addr">Other billing address
									<input type="checkbox">
									<span class="checkmark"></span>
									</label>
								</div>
								<div id="other_addr_c" class="pt-2">
								<div class="row no-gutters">
									<div class="col-6 form-group pr-1">
										<input type="text" class="form-control" placeholder="Name">
									</div>
									<div class="col-6 form-group pl-1">
										<input type="text" class="form-control" placeholder="Last Name">
									</div>
								</div>
								<!-- /row -->
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Full Address">
								</div>
								<div class="row no-gutters">
									<div class="col-6 form-group pr-1">
										<input type="text" class="form-control" placeholder="City">
									</div>
									<div class="col-6 form-group pl-1">
										<input type="text" class="form-control" placeholder="Postal code">
									</div>
								</div>
								<!-- /row -->
								<div class="row no-gutters">
									<div class="col-md-12 form-group">
										<div class="custom-select-form">
											<select class="wide add_bottom_15" name="country" id="country_2">
												<option value="" selected>Country</option>
												<option value="Europe">Europe</option>
												<option value="United states">United states</option>
												<option value="Asia">Asia</option>
											</select>
										</div>
									</div>
								</div>
								<!-- /row -->
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Telephone">
								</div>
								</div> --}}
								<!-- /other_addr_c -->
								<hr>
							</div>
							<!-- /tab_2 -->
						</div>
						</div>
						<!-- /step -->
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="step middle payments">
							<h3>2. Ödeme Ve Teslimat</h3>
								<h6 class="pb-2">Ödeme Yöntemi</h6>
								<ul>
									<li>
										<label class="container_radio">Karta Transfer<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
											<input type="radio" name="payment" value="Kredi Kartı" checked>
											<span class="checkmark"></span>
										</label>
									</li>
									<li>
										<label class="container_radio">Kapıda Ödeme<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
											<input type="radio" name="payment" value="Kapıda Ödeme">
											<span class="checkmark"></span>
										</label>
									</li>
								</ul>
								<h6 class="pb-2">Teslimat Türü</h6>
								<ul>
									<li>
										<label class="container_radio">Nova Poşta<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
											<input type="radio" name="shipping" value="Nova Poşta" checked>
											<span class="checkmark"></span>
										</label>
									</li>
									<li>
										<label class="container_radio">Adrese Teslim<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
											<input type="radio" name="shipping" value="Adrese Teslim">
											<span class="checkmark"></span>
										</label>
									</li>
									<li>
										<label class="container_radio">Gel Al<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
											<input type="radio" name="shipping" value="Gel Al">
											<span class="checkmark"></span>
										</label>
									</li>
									
								</ul>
							
						</div>
						<!-- /step -->
						
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="step last">
							<h3>3. Ödeme</h3>
						<div class="box_general summary">
							<ul>
								@foreach (Cart::content() as $cartItem)
									<li class="clearfix"><em>{{$cartItem->qty}}x {{Str::substr($cartItem->name,0,15)}}...</em>  <span>${{$cartItem->price}}</span><span style="color: #47C68E">${{$cartItem->subtotal()}}</span></li>
								@endforeach
							</ul>
							<ul>
								<li class="clearfix"><em><strong>Toplam</strong></em>  <span>${{Cart::subtotal()}}</span></li>
								<li class="clearfix"><em><strong>Kargo</strong></em> <span>${{$shipp->track}}</span></li>
								
							</ul>
							<div class="total clearfix">Genel Toplam <span>${{ str_replace(',', '', Cart::total()) + $shipp->track }}</span></div>
							<input type="hidden" name="cartTotal" value="{{ str_replace(',', '', Cart::total()) + $shipp->track }}">
							{{-- <div class="form-group">
								<label class="container_check">Register to the Newsletter.
									<input type="checkbox" checked>
									<span class="checkmark"></span>
								</label>
							</div> --}}
							
							<input type="submit" class="btn_1 full-width topay" value='Ödeme Yap'>
						</div>
						<!-- /box_general -->
						</div>
						<!-- /step -->
					</div>
				</div>
			</form>
			<!-- /row -->
		</div>
		<!-- /container -->
	</main>
@endsection
@section('head')
<link href="/assets/front/css/checkout.css" rel="stylesheet">
@endsection
@section('footer')
<script>
	
    // Other address Panel
    $('#other_addr input').on("change", function (){
        if(this.checked)
            $('#other_addr_c').fadeIn('fast');
        else
            $('#other_addr_c').fadeOut('fast');
    });
</script>

<script>
	$('.topay').click(()=>{
		$('.topay').prop(disabled,true);
	});
</script>
@endsection