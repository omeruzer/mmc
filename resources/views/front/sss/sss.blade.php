@extends('front.layouts.master')
@section('title')FAQ | {{$set->title}}@endsection
@section('keyw'){{$seo->keyw}}@endsection
@section('desc'){{$seo->desc}}@endsection
@section('content')
<main class="bg_gray">
		
	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="{{route('homepage')}}">Главная</a></li>
					<li>FAQ</li>
				</ul>
		</div>
		<h1>FAQ</h1>
	</div>
	<!-- /page_header -->
        <div class="row justify-content-center">
			<div class="col-xl-12 col-lg-12 col-md-12">
				<div class="box_account">
					<div class="form_container">
                        <div class="myOrdersTable">
                            <div class="questions">
								@foreach ($questions as $question)
										<div class="question"><span class="question-span">{{$question->question}}</span> <b style="float: right"><i id="arrow" class="fa fa-arrow-down"></i></b></div>
										<div class="answer"><span class="answer-span">{{$question->answer}}</span></div>
								@endforeach
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
@section('footer')
	<script>
		

		$(document).ready(function () {
			$('.answer').hide();

			$('.question').click(function (e) {

				$(this).next().slideToggle();	

			});


		});
	
		
	</script>
@endsection