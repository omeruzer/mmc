@extends('admin.layouts.master')
@section('title','Kullanıcı Düzenle')
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
                <h3><i class="far fa-check-square"></i> Kullanıcı Düzenle</h3>
            </div>

            <div class="card-body">

                <form action="{{route('admin.user.save',$user->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name"> Ad Soyad</label>
                        <input type="text" name="name" class="form-control" value="{{$user->name}}" placeholder="Ad Soyad" >
                    </div>
                    <div class="form-group">
                        <label for="email"> E-mail</label>
                        <input type="email" name="email" class="form-control"  value="{{$user->email}}" placeholder="E-mail" >
                    </div>
                    <div class="form-group">
                        <label for="name"> Şifre</label>
                        <input type="password" disabled name="password" id="password" class="form-control password" value="{{$user->password}}" placeholder="Şifre" >
                    </div>
                    <div class="form-group">
                        <label for="name"> Şifre (Tekrar)</label>
                        <input type="password" disabled name="password_confirmation" id="password" class="form-control password" value="{{$user->password}}" placeholder="Şifre (Tekrar)" >
                    </div>
                    <div class="form-group row">
                        <div  class="col-sm-10">
                            <div  class="form-check">
                                <div class="">
                                    <label  class="form-check-label edit">
                                        <input class="form-check-input password_edit" id="password_edit" type="checkbox"> Şifreyi Değiştir
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name"> Adres</label>
                        <input type="text" name="address" class="form-control" value="{{$user->address}}" placeholder="Adres" >
                    </div>
                    <div class="form-group">
                        <label for="name"> Şehir</label>
                        <input type="text" name="city" class="form-control" value="{{$user->city}}" placeholder="Şehir" >
                    </div>
                    <div class="form-group">
                        <label for="name"> Ülke</label>
                        <input type="text" name="country" class="form-control" value="{{$user->country}}" placeholder="Ülke" >
                    </div>
                    <div class="form-group">
                        <label for="name"> Posta Kodu</label>
                        <input type="text" name="postCode" class="form-control" value="{{$user->postCode}}" placeholder="Posta kodu" >
                    </div>
                    <div class="form-group">
                        <label for="name"> Telefon</label>
                        <input type="text" name="phone" class="form-control" value="{{$user->phone}}" placeholder="Telefon" >
                    </div>
                    <div class="form-group row">
                        <div  class="col-sm-10">
                            <div  class="form-check">
                                <div class="">
                                    <label  class="form-check-label">
                                        <input {{ ($user->active == 1 )? 'checked' : '' }} name="active" style="cursor: pointer" class="form-check-input" type="checkbox"> Aktiflik
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
                                        <input {{ ($user->manager == 1) ? 'checked' : '' }} name="manager" style="cursor: pointer" class="form-check-input" type="checkbox"> Yönetici Yetkisi
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="" style="float: right">
                    <button type="submit" class="btn btn-primary">Kaydet</button>
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

<script>

    
    
    $(".password_edit").click(()=>{
        if($('.password').attr('disabled') == 'disabled'){
            $('.password').prop('disabled',false);
        }else if($('.password').attr('disabled') != 'disabled'){
            $('.password').prop('disabled',true);
        }
    })
    


</script>

@endsection