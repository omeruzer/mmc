@extends('admin.layouts.master')
@section('title','Mesajlar')
@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Mesajlar</h1>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            @include('admin.layouts.partials.error')
            @include('admin.layouts.partials.alert')        
        </div>
    </div>
    <!-- end row -->

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="far fa-check-square"></i> {{$message->id}} Numaralı Mesaj</h3>
            </div>

            <div class="card-body">
                    <div class="form-group">
                        <label for="desc">Tarih</label>
                        <p>{{$message->created_at}}</p>
                    </div>
                    <div class="form-group">
                        <label for="title">Ad Soyad</label>
                        <p>{{$message->name}}</p>
                    </div>
                    <div class="form-group">
                        <label for="keyw">E-mail</label>
                        <p>{{$message->email}}</p>
                    </div>
                    <div class="form-group">
                        <label for="desc">Başlık</label>
                        <p>{{$message->subject}}</p>
                    </div>
                    <div class="form-group">
                        <label for="desc">Mesaj</label>
                        <p>{{$message->content}}</p>
                    </div>
                    <a style="float: right" href="{{route('admin.message')}}"><button style="float: right" type="submit" class="btn btn-primary">Geri</button></a>

            </div>
        </div><!-- end card-->
    </div>

</div>
@endsection