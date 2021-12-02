@extends('admin.layouts.master')
@section('title','Banka Hesapları')
@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Banka Hesapları</h1>
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
                <h3><i class="far fa-check-square"></i> Banka Hesabı Ekle</h3>
            </div>

            <div class="card-body">

                <form action="{{route('admin.bankaccount.created')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name"> Banka Adı</label>
                        <input type="text" autocomplete="off" name="bankName" class="form-control" placeholder="Banka Adı" >
                    </div>
                    <div class="form-group">
                        <label for="name"> Hesap Numarası</label>
                        <input type="text" autocomplete="off" name="accountNumber" class="form-control" placeholder="Hesap Numarası" >
                    </div>
                    <button type="submit" class="btn btn-success">Ekle</button>
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