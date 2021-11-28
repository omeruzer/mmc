@extends('admin.layouts.master')
@section('title','Kargo')
@section('content')
<div class="content">

    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Kargo Ayarları</h1>
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
                    <h3><i class="far fa-check-square"></i> Kargo Ayarları</h3>
                </div>

                <div class="card-body">

                    <form action="{{route('admin.truck.update')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Kargo Fiyatı</label>
                            <input type="number" name="truck" class="form-control" value="{{$truck->track}}" placeholder="Kargo Fiyatı" >
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