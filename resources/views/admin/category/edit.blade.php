@extends('admin.layouts.master')
@section('title','Kategori Düzenle')
@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Kategori Düzenle</h1>
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
                <h3><i class="far fa-check-square"></i> Kategori Düzenle</h3>
            </div>

            <div class="card-body">

                <form action="{{route('admin.category.save',$category->slug)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Kategori Başlık</label>
                        <input type="text" name="title" autocomplete="off" class="form-control" value="{{$category->title}}" placeholder="Kategori Başlık" >
                    </div>
                    <div class="form-group">
                        <label for="keyw">Anahtar Kelime</label>
                        <input type="text" name="keyw" autocomplete="off" class="form-control" value="{{$category->keyw}}" placeholder="Anahtar Kelime" >
                    </div>
                    <div class="form-group">
                        <label for="desc">Açıklama</label>
                        <input type="text" name="desc" autocomplete="off"  class="form-control" value="{{$category->desc}}" placeholder="Açıklama" >
                    </div>
                    <div class="" style="float: right">
                        <button onclick="return window.confirm('Emin Misiniz?')" type="submit" class="btn btn-primary">Kaydet</button>

                    </div>
                </form>

            </div>
        </div><!-- end card-->
    </div>

</div>
@endsection
@section('footer')
<script>
    $('.formm').keypress(function(e){
    if ( e.which == 13 ) return false;
    //or...
    if ( e.which == 13 ) e.preventDefault();
 }); 
</script>

@endsection