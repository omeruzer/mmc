@extends('admin.layouts.master')
@section('title','Genel Ayarlar')
@section('content')
<div class="content">

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
                    <h3><i class="far fa-check-square"></i> Genel Ayarlar</h3>
                </div>

                <div class="card-body">

                    <form action="{{route('admin.setting.update')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" value="{{$setting->title}}" placeholder="Title" >
                        </div>
                        <div class="form-group">
                            <label for="title">Açıklama</label>
                            <input type="text" name="desc" class="form-control" value="{{$setting->desc}}" placeholder="Açıklama" >
                        </div>
                        <div class="form-group">
                            <label for="title">Anahtar Kelime</label>
                            <input type="text" name="keyw" class="form-control" value="{{$setting->keyw}}" placeholder="Anahtar Kelime" >
                        </div>
                        <div class="form-group">
                            <label for="title">Yazar</label>
                            <input type="text" name="author" class="form-control" value="{{$setting->author}}" placeholder="Yazar" >
                        </div>
                        <div class="" style="float: right">
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                        </div>
                    </form>

                </div>
            </div><!-- end card-->
        </div>

    </div>
    <!-- END container-fluid -->

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