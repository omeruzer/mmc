@extends('admin.layouts.master')
@section('title','Yorumlar')
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
                <h3><i class="far fa-check-square"></i> {{$comment->id}} Numaralı Yorum</h3>
            </div>

            <div class="card-body">
                    <div class="form-group">
                        <label for="desc">Tarih</label>
                        <p>{{$comment->created_at}}</p>
                    </div>
                    <div class="form-group">
                        <label for="title">Ürün Resim</label>
                        <div class="">
                            <img width="20%" src="/assets/images/products/{{$comment->getProduct->img}}" alt="" srcset="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="keyw">Ürün</label>
                        <p>{{$comment->getProduct->name}}</p>
                    </div>
                    <div class="form-group">
                        <label for="desc">Ad Soyad</label>
                        <p>{{$comment->getUser->name}}</p>
                    </div>
                    <div class="form-group">
                        <label for="desc">Yorum</label>
                        <p>{{$comment->comment}}</p>
                    </div>
                    <a style="float: right;" href="{{route('admin.comment')}}"><button style="float: right" type="submit" class="btn btn-primary">Geri</button></a>
                    <a style="float: right;  margin-right: 10px" href="{{route('admin.comment.delete',$comment->id)}}"><button onclick="return confirm('Silmek İstediğinize Emin Misiniz? Bir daha Geri Alamayacaksınız!')" style="float: right" type="submit" class="btn btn-danger">Yorumu Sil</button></a>

            </div>
        </div><!-- end card-->
    </div>

</div>
@endsection