@extends('front.layouts.master')
@section('title')Контакты | {{$set->title}}@endsection
@section('content')
<main class="bg_gray">
	
    <div class="container margin_60">
        <div class="main_title">
            <h2>Контакты</h2>
            <p>İletişim ile ilgili bir yazı.</p>
        </div>
        <div class="row justify-content-center">
            @foreach ($branchs as $branch)
                <div class="col-lg-3">
                    <div class="box_contacts">
                        <i class="fa fa-map-marker-alt"></i>
                        <h2>{{$branch->name}}</h2>
                        <a href="#0">{{$branch->phone}}</a>
                        <small>{{$branch->address}}</small>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- /row -->				
    </div>
    <!-- /container -->
<div class="bg_white">
    <div class="container margin_60_35">
        <h4 class="pb-3">Bize Ulaşın</h4>
        <div class="row">
            <div class="col-lg-4 col-md-6 add_bottom_25">
                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input class="form-control" name="name" type="text" placeholder="имя Фамилия">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="subject" placeholder="тема">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Эл. почта *">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" style="height: 150px;" name="content" placeholder="сообщение *"></textarea>
                    </div>
                    <div class="form-group">
                        <input class="btn_1 full-width" type="submit" value="отправлять">
                    </div>
                </form>
            </div>
            <div class="col-lg-8 col-md-6 add_bottom_25">
            <iframe class="map_contact" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d87948.28844354754!2d30.608598642655537!3d46.46090107318267!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40c6326c7a27166d%3A0x2d40e667dc29ad4a!2sMalynovsky%20Raion%2C%20Odessa%2C%20Odessa%20Oblast%C4%B1%2C%2065000!5e0!3m2!1str!2sua!4v1637064047337!5m2!1str!2sua" style="border:0;" allowfullscreen loading="lazy"></iframe>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /bg_white -->
</main>
@endsection
@section('head')
<link href="/assets/front/css/contact.css" rel="stylesheet">

@endsection