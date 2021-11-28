@extends('admin.layouts.master')
@section('title','SSS Düzenle')
@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Sıkça Sorulan Sorular</h1>
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
                <h3><i class="far fa-check-square"></i> Soru Düzenle</h3>
            </div>

            <div class="card-body">

                <form action="{{route('admin.sss.save',$sss->id)}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Marka Adı</label>
                        <input type="text" name="question" class="form-control" value="{{$sss->question}}" placeholder="Soru" >
                    </div>
                    <div class="form-group">
                        <label for="name">Marka Adı</label>
                        <input type="text" name="answer" class="form-control" value="{{$sss->answer}}" placeholder="Cevap" >
                    </div>
                    <button onclick="return window.confirm('Emin Misiniz?')" type="submit" class="btn btn-success">Kaydet</button>
                </form>

            </div>
        </div><!-- end card-->
    </div>

</div>
@endsection
@section('name')
<script>
    $('.formm').keypress(function(e){
    if ( e.which == 13 ) return false;
    //or...
    if ( e.which == 13 ) e.preventDefault();
 }); 
</script>

@endsection