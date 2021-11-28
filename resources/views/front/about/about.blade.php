@extends('front.layouts.master')

@section('title')Hakkımızda | {{$set->title}}@endsection

@section('keyw'){{$about->keyw}}@endsection
@section('desc'){{$about->desc}}@endsection

@section('content')

<main class="bg_gray">
	<div class="container margin_30">
        <div class="container margin_10_35 add_bottom_30">
            <div class="main_title">
                <h2>By MMC Hakkında</h2>
            </div>
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