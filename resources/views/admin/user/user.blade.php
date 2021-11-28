@extends('admin.layouts.master')
@section('title','Kullanıcılar')
@section('content')
<div class="content">

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



        <div class="card">
          <div class="card-header">
            <h3 style="float: left" class="card-title">Kullanıcı Listesi</h3>
            <div style="text-align: right;margin-bottom: 5px">
              <a href="{{route('admin.user.create')}}">
                  <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> Yeni Kullanıcı Ekle</button>
              </a>
            </div>
          </div>
          
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>ID</th>
                <th>AD Soyad</th>
                <th>E-mail</th>
                <th>Telefon</th>
                <th>Yetki</th>
                <th>Aktivasyon</th>
                <th>İşlemler</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                <tr>
                    <th>{{$user->id}}</th>
                    <th>{{$user->name}}</th>
                    <th>{{$user->email}}</th>
                    <th>{{$user->phone}}</th>
                    <th>
                      @if ($user->manager)
                          <div class="alert alert-success">Yönetici</div>
                      @else
                        <div class="alert alert-warning">Ziyaretçi</div>
                      @endif
                    </th>
                    <th>
                      @if ($user->active)
                          <div class="alert alert-success">Aktif</div>
                      @else
                        <div class="alert alert-danger">Pasif</div>
                      @endif
                    </th>
                         <th>
                        <a href="{{route('admin.user.edit',$user->id)}}"><button class="btn btn-primary" type="submit"><i class="fa fa-edit"></i></button></a>
                        <a href="{{route('admin.user.delete',$user->id)}}"><button onclick="return confirm('Silmek İstediğinize Emin Misiniz? Bir daha Geri Alamayacaksınız!')" class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button></a>
                    </th>
                </tr>
                @endforeach
            </tbody>
              <tfoot>
              <tr>
                <th>ID</th>
                <th>AD Soyad</th>
                <th>E-mail</th>
                <th>Telefon</th>
                <th>Yetki</th>
                <th>Aktivasyon</th>
                <th>İşlemler</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
      </div>
      <!-- end row-->

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