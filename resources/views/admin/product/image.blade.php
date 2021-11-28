@extends('admin.layouts.master')
@section('title','Ürün Ekle')
@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Ürünler</h1>
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

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="far fa-check-square"></i> Ürüne Çoklu Resim Ekleme</h3>
            </div>

            <div class="card-body">

                <form action="{{route('admin.product.img.save',$product->id)}}" class="formm" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3><i class="fas fa-download"></i> Resim Yükle</h3>
                                2 MB ve daha büyük olan dosyalar kabul edilmeyecektir
                            </div>
                            <div class="card-body">
                                <div class="col-12"></div>
                                <input type="file" name="img[]" id="filer_example1" multiple="multiple">
                            </div>
                        </div>
                    </div>
                    <div style="text-align: center">
                        <button type="submit" class="btn btn-success">Ekle</button>
                    </div>
                </form>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="far fa-file-image"></i> Ürüne Eklenen Resimler</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @if (count($images) > 0)
                                    @foreach ($images as $image)                                    
                                        <div class="card" style="width: 15%" >
                                            <img style="width: 100%" src="/assets/images/products/{{$image->img}}" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <a href="{{route('admin.product.img.del',$image->id)}}" class="btn btn-danger">Sil</a>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <h3 style="margin: auto">
                                        Daha Önce Bu Ürüne Resim Yüklemediniz.
                                    </h3>
                                @endif
                            </div>
                        </div>
                    </div><!-- end card-->
                </div>
                <div class="form-group">
                    <label for="name"> Ürün Resmi</label>
                    <p>
                        <img style="width: 15%;" src="/assets/images/products/{{$product->img}}" alt="" srcset="">
                    </p>
                </div>
                <div class="form-group">
                    <label for="name"> Ürün Adı</label>
                    <p>{{$product->name}}</p>
                </div>
            </div>
        </div><!-- end card-->
    </div>

</div>
@endsection
@section('footer')
<script>
    CKEDITOR.replace( 'editor1' );
</script>

<script>
    $('.formm').keypress(function(e){
    if ( e.which == 13 ) return false;
    //or...
    if ( e.which == 13 ) e.preventDefault();
 }); 
</script>

<script src="/assets/plugins/jquery.filer/js/jquery.filer.min.js"></script>
<script src="/assets/plugins/fancybox/jquery.fancybox.min.js"></script>

@endsection
@section('head')
<link rel="stylesheet" href="/assets/plugins/fancybox/jquery.fancybox.min.css" />
@endsection