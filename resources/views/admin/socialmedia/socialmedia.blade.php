@extends('admin.layouts.master')
@section('title','Sosyal Medya Ayarları')
@section('content')
<div class="content">

    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Sosyal Medya Ayarları</h1>
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
                    <h3><i class="far fa-check-square"></i> Sosyal Medya Ayarları</h3>
                </div>

                <div class="card-body">

                    <form action="{{route('admin.socialmedia.update')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Facebook</label>
                            <input type="text" name="facebook" value="{{$socialmedia->facebook}}"  class="form-control"  placeholder="Facebook" >
                        </div>
                        <div class="form-group">
                            <label for="title">Instagram</label>
                            <input type="text" name="instagram" value="{{$socialmedia->instagram}}" class="form-control"  placeholder="Instagram" >
                        </div>
                        <div class="form-group">
                            <label for="title">Telegram</label>
                            <input type="text" name="telegram" value="{{$socialmedia->telegram}}" class="form-control"  placeholder="Telegram" >
                        </div>
                        <div class="form-group">
                            <label for="title">Viber</label>
                            <input type="text" name="viber" value="{{$socialmedia->viber}}" class="form-control"  placeholder="Viber" >
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