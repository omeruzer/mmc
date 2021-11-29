@extends('front.layouts.master')

@section('title')O НАС | {{$set->title}}@endsection

@section('keyw'){{$about->keyw}}@endsection
@section('desc'){{$about->desc}}@endsection

@section('content')

<main class="bg_gray">
	<div class="container margin_30">
        <div class="container margin_30">
            <div class="page_header">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="{{route('homepage')}}">Главная</a></li>
                        <li>O нас</li>
                    </ul>
            </div>
            <h1>By MMC O нас</h1>
        </div>
	    <!-- /page_header -->
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="box_account">
                    <div class="form_container">
                        <div class="myOrdersTable">
                            <div class="questions">
                                <p style="padding: 2%">{{$about->about}}</p>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@section('head')
<link href="/assets/front/css/about.css" rel="stylesheet">
<link href="/assets/front/css/account.css" rel="stylesheet">
<link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/font-awesome/css/all.css" rel="stylesheet" type="text/css" />
@endsection