@extends('admin.layouts.master')
@section('title','Şube Düzenle')
@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Şube Düzenle</h1>
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
                <h3><i class="far fa-check-square"></i> Şube Düzenle</h3>
            </div>

            <div class="card-body">

                <form action="{{route('admin.branch.save',$branch->slug)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Şube Adı</label>
                        <input type="text" name="name" class="form-control" value="{{$branch->name}}" placeholder="Şube Adı" >
                    </div>
                    <div class="form-group">
                        <label for="keyw">Adres</label>
                        <input type="address" name="address" class="form-control" value="{{$branch->address}}" placeholder="Adres" >
                    </div>
                    <div class="form-group">
                        <label for="phone">Telefon</label>
                        <input type="text" name="phone" class="form-control" value="{{$branch->phone}}" placeholder="Telefon" >
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