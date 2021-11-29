@extends('admin.layouts.master')
@section('title','Ürün Düzenle')
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
                <h3><i class="far fa-check-square"></i> Ürün Düzenle</h3>
            </div>

            <div class="card-body">

                <form action="" enctype="multipart/form-data" method="POST">
                    @csrf

                    <div class="form-group">
                        <img width="15%" src="/assets/images/products/{{$product->img}}" >
                    </div>
                    <div class="form-group">
                        <label for="img">Ürün Resim</label>
                        <input type="file" name="img" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="name">Ürün Adı</label>
                        <input type="text" name="name" value="{{$product->name}}" class="form-control" placeholder="Ürün Adı" >
                    </div>
                    <div class="form-group">
                        <label for="title">Ürün Kodu</label>
                        <input type="number" name="code"  value="{{$product->code}}" class="form-control" placeholder="Ürün Kodu" >
                    </div>
                    <div class="form-group">
                        <label for="title">Kategori</label>
                        <select class="form-control" name="category">
                            <option value="">Kategori Seçiniz</option>
                            @foreach ($categories as $category)
                                <option {{$product->brand == $category->id ? 'selected' : ''}}  value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach                        
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Marka</label>
                        <select class="form-control" name="brand">
                            <option value="">Marka Seçiniz</option>
                            @foreach ($brands as $brand)
                                <option {{$product->brand == $brand->id ? 'selected' : ''}} value="{{$brand->id}}">{{$brand->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Anahtar Kelime</label>
                        <input type="text" name="keyw" value="{{$product->keyw}}" class="form-control" placeholder="Anahtar Kelime" >
                    </div>
                    <div class="form-group">
                        <label for="title">Açıklama</label>
                        <input type="text" name="desc" value="{{$product->desc}}" class="form-control" placeholder="Açıklama" >
                    </div>
                    <div class="form-group">
                        <label for="title">Üretici Ülke</label>
                        <input type="text" name="country" class="form-control" value="{{$product->country}}" placeholder="Üretici Ülke" >
                    </div>
                    <div class="form-group">
                        <label for="title">Renkler</label>
                        <input type="text" name="colors" class="form-control" value="{{$product->colors}}" placeholder="Renkler" >
                    </div>
                    <div class="form-group">
                        <label for="title">Bedenler</label>
                        <input type="text" name="size" class="form-control" value="{{$product->size}}" placeholder="Bedenler" >
                    </div>
                    <div class="form-group">
                        <label for="title">Malzeme</label>
                        <input type="text" name="material" class="form-control" value="{{$product->material}}" placeholder="Malzeme" >
                    </div>
                    <div class="form-group">
                        <label for="title">Kalıp</label>
                        <input type="text" name="pattern" class="form-control" value="{{$product->pattern}}" placeholder="Kalıp" >
                    </div>
                    <div class="form-group">
                        <label for="title">Paket Adedi</label>
                        <input type="text" name="packQty" class="form-control" value="{{$product->packQty}}" placeholder="Paket Adedi" >
                    </div>
                    <div class="form-group">
                        <label for="title">Stok Adet</label>
                        <input type="number" name="quantity" class="form-control" value="{{$product->quantity}}" placeholder="Stok Adet" >
                    </div>
                    <div class="form-group">
                        <label for="title">Fiyat</label>
                        <input type="text" name="price" class="form-control" value="{{$product->price}}" placeholder="Fiyat" >
                    </div>
                    <div class="form-group">
                        <label for="title">Ürün Açıklaması</label>
                        <textarea name="editor1">{{$product->content}}</textarea>
                    </div>
                    <div class="form-group row">
                        <div  class="col-sm-10">
                            <div  class="form-check">
                                <div class="">
                                    <label  class="form-check-label">
                                        <input {{($featured != null) ? "checked" : ''}} name="featured" style="cursor: pointer" class="form-check-input"  type="checkbox"> Öne Çıkar
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="" style="text-align: center">
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>

            </div>
        </div><!-- end card-->
    </div>

</div>
@endsection
@section('footer')
<script src="\assets\plugins\ckeditor/ckeditor.js"></script>
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

@endsection