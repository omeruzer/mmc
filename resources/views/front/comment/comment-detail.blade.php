@extends('front.layouts.master')
@section('title')мои комментарии | {{$set->title}}@endsection
@section('content')
<main class="bg_gray">
		
	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="{{route('homepage')}}">Главная</a></li>
					<li><a href="{{route('account')}}">Профиль</a></li>
					<li>мои комментарии</li>
				</ul>
		</div>
		<h1>мои комментарии</h1>
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
                                <label for="">Товар:</label><br>
                                <img style="width: 20%;" src="/assets/images/products/{{$comment->getProduct->img}}" alt="" srcset="">
                            </div>
                            <div class="">
                                <label for="">Название:</label><br>
                                <p><span>{{$comment->getProduct->name}}</span></p>
                            </div>
                            <div class="">
                                <label for="">Код:</label><br>
                                <p><span>{{$comment->getProduct->code}}</span></p>
                            </div>
                            <div class="">
                                <label for="">Комментарий:</label><br>
                                <p><span>{{$comment->comment}}</span></p>
                            </div>
                            <div class="">
                                <label for="">Дата:</label><br>
                                <p><span>{{$comment->created_at}}</span></p>
                            </div>
                            <div class="" style="float: right" >
                                <a href="{{route('mycomment')}}"><button type="submit" class="btn btn-info"><span>Вернись</span></button></a>
                                <a href="{{route('comment.delete',$comment->id)}}"><button type="submit" onclick="return confirm('Вы уверены, что хотите его удалить?')" class="btn btn-danger"><span>удалить комментарий</span></button></a>
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