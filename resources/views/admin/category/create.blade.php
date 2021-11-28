@extends('admin.layouts.master')
@section('title','Kategori Ekle')
@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Genel Ayarlar</h1>
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
                <h3><i class="far fa-check-square"></i> Kategori Ekle</h3>
            </div>

            <div class="card-body">

                <form action="{{route('admin.category.created')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Kategori Başlık</label>
                        <input type="text" autocomplete="off" value="{{old('title')}}" name="title" class="form-control" placeholder="Kategori Başlık" >
                    </div>
                    <div class="form-group">
                        <label for="keyw">Anahtar Kelime</label>
                        <input type="text" autocomplete="off" value="{{old('keyw')}}" name="keyw" class="form-control" placeholder="Anahtar Kelime" >
                    </div>
                    <div class="form-group">
                        <label for="desc">Açıklama</label>
                        <input type="text" autocomplete="off" value="{{old('desc')}}" name="desc" class="form-control" placeholder="Açıklama" >
                    </div>
                    <div class="" style="float: right">
                        <button type="submit" class="btn btn-success">Ekle</button>
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