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
                <h3><i class="far fa-check-square"></i> Ürün Ekle</h3>
            </div>

            <div class="card-body">

                <form action="{{route('admin.product.created')}}" class="formm" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="img">Ürün Resim</label>
                        <input type="file" name="img" class="form-control" >
                    </div>
                    {{-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3><i class="fas fa-download"></i> Resim Yükle</h3>
                                2 MB ve daha büyük olan dosyalar kabul edilmeyecektir
                            </div>

                            <div class="card-body">
                                <div class="col-12"></div>
                                <input type="file" name="files[]" id="filer_example1" multiple="multiple">
                            </div>
                        </div>
                    </div> --}}
                    <div class="form-group">
                        <label for="name">Ürün Adı</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Ürün Adı" >
                    </div>
                    <div class="form-group">
                        <label for="code">Ürün Kodu</label>
                        <input type="number" name="code" value="{{old('code')}}" class="form-control" placeholder="Ürün Kodu" >
                    </div>
                    <div class="form-group">
                        <label for="category">Kategori</label>
                        <select class="form-control" name="category">
                            <option value="">Kategori Seçiniz</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach                        
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="brand">Marka</label>
                        <select class="form-control" name="brand">
                            <option value="">Marka Seçiniz</option>
                            @foreach ($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="keyw">Anahtar Kelime</label>
                        <input type="text" value="{{old('keyw')}}" name="keyw" class="form-control" placeholder="Anahtar Kelime" >
                    </div>
                    <div class="form-group">
                        <label for="desc">Açıklama</label>
                        <input type="text" name="desc" value="{{old('desc')}}" class="form-control" placeholder="Açıklama" >
                    </div>
                    <div class="form-group">
                        <label for="title">Üretici Ülke</label>
                        <input type="text" name="country" class="form-control" value="{{old('country')}}" placeholder="Üretici Ülke" >
                    </div>
                    <div class="form-group">
                        <label for="title">Renkler</label>
                        <input type="text" name="colors" class="form-control" value="{{old('colors')}}" placeholder="Renkler" >
                    </div>
                    <div class="form-group">
                        <label for="title">Bedenler</label>
                        <input type="text" name="size" class="form-control" value="{{old('size')}}" placeholder="Bedenler" >
                    </div>
                    <div class="form-group">
                        <label for="title">Malzeme</label>
                        <input type="text" name="material" class="form-control" value="{{old('material')}}" placeholder="Malzeme" >
                    </div>
                    <div class="form-group">
                        <label for="title">Kalıp</label>
                        <input type="text" name="pattern" class="form-control" value="{{old('pattern')}}" placeholder="Kalıp" >
                    </div>
                    <div class="form-group">
                        <label for="title">Paket Adedi</label>
                        <input type="text" name="packQty" class="form-control" value="{{old('packQty')}}" placeholder="Paket Adedi" >
                    </div>
                    <div class="form-group">
                        <label for="quantity">Stok Adet</label>
                        <input type="number" name="quantity" value="{{old('quantity')}}" class="form-control" placeholder="Stok Adet" >
                    </div>
                    <div class="form-group">
                        <label for="price">Fiyat</label>
                        <input type="text"  name="price" value="{{old('price')}}" class="form-control" placeholder="Fiyat" >
                    </div>
                    <div class="form-group">
                        <label for="desc">Ürün Açıklaması</label>
                        <textarea value="{{old('editor1')}}" name="editor1"></textarea>
                    </div>
                    <div class="form-group row">
                        <div  class="col-sm-10">
                            <div  class="form-check">
                                <div class="">
                                    <label  class="form-check-label">
                                        <input name="featured" style="cursor: pointer" class="form-check-input" type="checkbox"> Öne Çıkar
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="text-align: center">
                        <button type="submit" class="btn btn-success">Ekle</button>
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