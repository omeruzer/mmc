@extends('admin.layouts.master')
@section('title','Kullanıcı Ekle')
@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Kullanıcılar</h1>
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
                <h3><i class="far fa-check-square"></i> Kullanıcı Ekle</h3>
            </div>

            <div class="card-body">

                <form action="{{route('admin.user.created')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name"> Ad Soyad</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Ad Soyad" >
                    </div>
                    <div class="form-group">
                        <label for="email"> E-mail</label>
                        <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="E-mail" >
                    </div>
                    <div class="form-group">
                        <label for="name"> Şifre</label>
                        <input type="text" name="password"  class="form-control" placeholder="Şifre" >
                    </div>
                    <div class="form-group">
                        <label for="name"> Şifre (Tekrar)</label>
                        <input type="text" name="password_confirmation" class="form-control" placeholder="Şifre (Tekrar)" >
                    </div>
                    <div class="form-group">
                        <label for="name"> Adres</label>
                        <input type="text" name="address" value="{{old('address')}}" class="form-control" placeholder="Adres" >
                    </div>
                    <div class="form-group">
                        <label for="name"> Şehir</label>
                        <input type="text" name="city" value="{{old('city')}}" class="form-control" placeholder="Şehir" >
                    </div>
                    <div class="form-group">
                        <label for="name"> Telefon</label>
                        <input type="text" name="phone" value="{{old('phone')}}" class="form-control" placeholder="Telefon" >
                    </div> 
                    <div class="form-group row">
                        <div  class="col-sm-10">
                            <div  class="form-check">
                                <div class="">
                                    <label  class="form-check-label">
                                        <input name="manager" style="cursor: pointer" class="form-check-input" type="checkbox"> Yönetici Yetkisi
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div  class="col-sm-10">
                            <div  class="form-check">
                                <div class="">
                                    <label  class="form-check-label">
                                        <input name="active" style="cursor: pointer" class="form-check-input" type="checkbox"> Aktiflik
                                    </label>
                                </div>
                            </div>
                        </div>
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