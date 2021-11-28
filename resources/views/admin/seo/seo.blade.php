@extends('admin.layouts.master')
@section('title','SEO')
@section('content')
<div class="content">

    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">SEO</h1>
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


        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="far fa-check-square"></i> Login SEO</h3>
                </div>
    
                <div class="card-body">
                    <form action="{{route('admin.seo.login')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">Anahtar Kelime</label>
                            <input type="text" name="keyw" value="{{$loginSeo->keyw}}" class="form-control" placeholder="Anahtar Kelime" >
                        </div>
                        <div class="form-group">
                            <label for="email">Açıklama</label>
                            <input type="text" name="desc" value="{{$loginSeo->desc}}"  class="form-control" placeholder="Açıklama" >
                        </div>
                        <div class="" style="float: right;">
                            <button type="submit" class="btn btn-primary">Kaydet</button>
                        </div>
                    </form>
        
                </div>
            </div><!-- end card-->
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="far fa-check-square"></i> Register SEO</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.seo.register')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">Anahtar Kelime</label>
                            <input type="text" name="keyw" value="{{$registerSeo->keyw}}" class="form-control" placeholder="Anahtar Kelime" >
                        </div>
                        <div class="form-group">
                            <label for="email">Açıklama</label>
                            <input type="text" name="desc"value="{{$registerSeo->desc}}"  class="form-control" placeholder="Açıklama" >
                        </div>
                        <div class="" style="float: right;">
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                        </div>
                    </form>
        
                </div>
            </div><!-- end card-->
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="far fa-check-square"></i> SSS SEO</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.seo.sss')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">Anahtar Kelime</label>
                            <input type="text" name="keyw" value="{{$sssSeo->keyw}}" class="form-control" placeholder="Anahtar Kelime" >
                        </div>
                        <div class="form-group">
                            <label for="email">Açıklama</label>
                            <input type="text" name="desc"value="{{$sssSeo->desc}}"  class="form-control" placeholder="Açıklama" >
                        </div>
                        <div class="" style="float: right;">
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                        </div>
                    </form>
        
                </div>
            </div><!-- end card-->
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="far fa-check-square"></i> Blog SEO</h3>
                </div>
    
                <div class="card-body">
                    <form action="{{route('admin.seo.blog')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">Anahtar Kelime</label>
                            <input type="text" name="keyw" value="{{$blogSeo->keyw}}" class="form-control" placeholder="Anahtar Kelime" >
                        </div>
                        <div class="form-group">
                            <label for="email">Açıklama</label>
                            <input type="text" name="desc" value="{{$blogSeo->desc}}" class="form-control" placeholder="Açıklama" >
                        </div>
                        <div class="" style="float: right;">
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