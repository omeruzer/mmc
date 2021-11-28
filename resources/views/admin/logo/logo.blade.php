@extends('admin.layouts.master')
@section('title','Genel Ayarlar')
@section('content')
<div class="content">

    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Logo ve Favicon</h1>
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
            <div class="card mb-6">
                <div class="card-header">
                    <h3><i class="far fa-check-square"></i> Logo</h3>
                </div>

                <div class="card-body">
                    <div  class="">
                        <img width='15%' src="\assets\images\logo\{{$logo->logo}}" alt="">
                    </div>
                    <form action="{{ route('admin.logo.post',$logo->id) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="logo">Logo</label>
                            <input type="file" name="logo" class="form-control" >
                        </div>

                        <div class="">
                            <img width='15%' src="\assets\images\logo\{{$logo->favicon}}" alt="">
                        </div>
                        <div class="form-group">
                            <label for="favicon">Favicon</label>
                            <input type="file" name="favicon" class="form-control" >
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