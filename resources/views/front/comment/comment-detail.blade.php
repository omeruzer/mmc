@extends('front.layouts.master')
@section('title')Yorumlarım | {{$set->title}}@endsection
@section('content')
<main class="bg_gray">
		
	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="{{route('homepage')}}">Anasayfa</a></li>
					<li><a href="{{route('account')}}">Hesabım</a></li>
					<li>Yorumlarım</li>
				</ul>
		</div>
		<h1>Yorumlarım</h1>
	</div>
    <div class="row">
        <div class="col-xl-6">
            @include('admin.layouts.partials.error')
            @include('admin.layouts.partials.alert')        
        </div>
      </div>
	<!-- /page_header -->
			<div class="row justify-content-center">
			<div class="col-xl-12 col-lg-12 col-md-12">
				<div class="box_account">
					<div class="form_container">
                        <div class="myOrdersTable">
                            <div class="">
                                <label for="">Ürün Resmi:</label><br>
                                <img style="width: 20%;" src="/assets/images/products/{{$comment->getProduct->img}}" alt="" srcset="">
                            </div>
                            <div class="">
                                <label for="">Ürün Adı:</label><br>
                                <p><span>{{$comment->getProduct->name}}</span></p>
                            </div>
                            <div class="">
                                <label for="">Ürün Kod:</label><br>
                                <p><span>{{$comment->getProduct->code}}</span></p>
                            </div>
                            <div class="">
                                <label for="">Yorum:</label><br>
                                <p><span>{{$comment->comment}}</span></p>
                            </div>
                            <div class="">
                                <label for="">Ürün Adı:</label><br>
                                <p><span>{{$comment->created_at}}</span></p>
                            </div>
                            <div class="" style="float: right" >
                                <a href="{{route('mycomment')}}"><button type="submit" class="btn btn-info"><span>Geri</span></button></a>
                                <a href="{{route('comment.delete',$comment->id)}}"><button type="submit" onclick="return confirm('Silmek İstediğinize Emin Misiniz? Bir daha Geri Alamayacaksınız!')" class="btn btn-danger"><span>Yorumu Sil</span></button></a>
                            </div>
                        </div>
                    </div>
				</div>

			</div>

		</div>
		<!-- /row -->
		</div>
		<!-- /container -->
	</main>
@endsection
@section('head')
<link href="/assets/front/css/account.css" rel="stylesheet">
<link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/font-awesome/css/all.css" rel="stylesheet" type="text/css" />

@endsection