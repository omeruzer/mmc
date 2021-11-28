@extends('admin.layouts.master')
@section('title','İletişim')
@section('content')
<div class="content">

    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">İletişim</h1>
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
                    <h3><i class="far fa-check-square"></i> İletişim</h3>
                </div>
    
                <div class="card-body">
                    <form action="{{route('admin.contact.post',$contact->id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="address"> Anahtar Kelime</label>
                            <input type="text" name="keyw" class="form-control" value="{{$contact->keyw}}" placeholder="Anahtar Kelime" >
                        </div>
                        <div class="form-group">
                            <label for="address"> Açıklama</label>
                            <input type="text" name="desc" class="form-control" value="{{$contact->desc}}" placeholder="Açıklama" >
                        </div>
                        <div class="form-group">
                            <label for="address"> Adres</label>
                            <input type="text" name="address" class="form-control" value="{{$contact->address}}" placeholder="Adres" >
                        </div>
                        <div class="form-group">
                            <label for="phone">Telefon</label>
                            <input type="text" name="phone" class="form-control" value="{{$contact->phone}}" placeholder="Telefon" >
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text" name="email" class="form-control" value="{{$contact->email}}" placeholder="E-mail" >
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