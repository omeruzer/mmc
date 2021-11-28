@extends('admin.layouts.master')
@section('title','Kategoriler')
@section('content')
<div class="content">

    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Kategoriler</h1>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="">
          @include('admin.layouts.partials.error')
          @include('admin.layouts.partials.alert')
        </div>


        <div class="card">
            <div class="card-header">
              <h3 style="float: left" class="card-title">Kategori Listesi</h3>
              <div style="text-align: right;" >
                <a href="{{route('admin.category.create')}}">
                    <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> Yeni Kategori Ekle </button>
                </a>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Başlık</th>
                  <th>İşlemler</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <th>{{$category->id}}</th>
                        <th>{{$category->title}}</th>
                        <th>
                            <a href="{{route('admin.category.edit',$category->slug)}}"><button class="btn btn-primary" type="submit"><i class="fa fa-edit"></i></button></a>
                            <a href="{{route('admin.category.delete',$category->slug)}}"><button class="btn btn-danger" onclick="return confirm('Silmek İstediğinize Emin Misiniz? Bir daha Geri Alamayacaksınız!')"  type="submit"><i class="fa fa-trash"></i></button></a>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Başlık</th>
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