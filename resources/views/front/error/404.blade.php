@extends('front.layouts.master')
@section('title')404 | {{$set->title}} @endsection
@section('content')
<main class="bg_gray">
    <div id="error_page">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-xl-7 col-lg-9">
                    <img src="/assets/front/img/404.svg" alt="" class="img-fluid" width="400" height="212">
                    <p>Страница, которую вы просматриваете, не существует!</p>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /error_page -->
</main>
@endsection
@section('head')
    <link href="/assets/front/css/error_track.css" rel="stylesheet">
@endsection