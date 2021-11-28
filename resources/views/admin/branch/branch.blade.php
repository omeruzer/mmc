@extends('admin.layouts.master')
@section('title','Şubeler')
@section('head')
  <link href="/assets/plugins/sweetalert/sweetalert.min.css" rel="stylesheet" />
@endsection
@section('content')
<div class="content">

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



        <div class="card">
            <div class="card-header">
              <h3 class="card-title" style="float: left">Şubeler Listesi</h3>
              <div style="text-align: right;margin-bottom: 5px">
                <a href="{{route('admin.branch.create')}}">
                    <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i>  Yeni Şube Ekle</button>
                </a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Şube Adı</th>
                  <th>Şube Adres</th>
                  <th>Şube Telefon</th>
                  <th>İşlemler</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($branchs as $branch)
                    <tr>
                        <th>{{$branch->id}}</th>
                        <th>{{$branch->name}}</th>
                        <th>{{$branch->address}}</th>
                        <th>{{$branch->phone}}</th>
                        <th>
                            <a href="{{route('admin.branch.edit',$branch->slug)}}"><button class="btn btn-primary" type="submit"><i class="fa fa-edit"></i></button></a>
                            <a  href="{{route('admin.branch.delete',$branch->slug)}}"><button onclick="return confirm('Silmek İstediğinize Emin Misiniz? Bir daha Geri Alamayacaksınız!')" class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button></a>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Şube Adı</th>
                    <th>Şube Adres</th>
                    <th>Şube Telefon</th>
                    <th>İşlemler</th>
                      </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <!-- END container-fluid -->

</div>
@endsection
@section('footer')
 
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["excel", "pdf", "print"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });

</script>

@endsection