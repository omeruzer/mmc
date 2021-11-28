@extends('admin.layouts.master')
@section('title','Gizlilik')
@section('head')
    
@endsection
@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Gizlilik</h1>
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
                <h3><i class="far fa-check-square"></i> Gizlilik</h3>
            </div>

            <div class="card-body">
                <form action="{{route('admin.privacy.post')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="keyw"> Anahtar Kelime</label>
                        <input type="text" name="keyw" class="form-control" value="{{$privacy->keyw}}" placeholder="Anahtar Kelime" >
                    </div>
                    <div class="form-group">
                        <label for="desc">Açıklama</label>
                        <input type="text" name="desc" class="form-control" value="{{$privacy->desc}}" placeholder="Açıklama" >
                    </div>
                    <div class="form-group">
                        <label for="privacy">Gizlilik Yazısı</label>
                        <textarea name="editor1">{{$privacy->privacy}}</textarea>
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