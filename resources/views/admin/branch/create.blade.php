@extends('admin.layouts.master')
@section('title','Şube Ekle')
@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Şubeler</h1>
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
                <h3><i class="far fa-check-square"></i> Şube Ekle</h3>
            </div>

            <div class="card-body">

                <form action="{{route('admin.branch.created')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name"> Şube Adı</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Şube Adı" >
                    </div>
                    <div class="form-group">
                        <label for="address">Adres</label>
                        <input type="text" name="address" value="{{old('address')}}" class="form-control" placeholder="Adres" >
                    </div>
                    <div class="form-group">
                        <label for="phone">Telefon</label>
                        <input type="text" name="phone" value="{{old('phone')}}" class="form-control" placeholder="Telefon" >
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