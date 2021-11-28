@extends('admin.layouts.master')
@section('title','Mesajlar')
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
        <div class="row">
          <div class="col-xl-6">
              @include('admin.layouts.partials.error')
              @include('admin.layouts.partials.alert')        
          </div>
        </div>
        <!-- end row -->



        <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Ad Soyad</th>
                  <th>E-mail</th>
                  <th>Subject</th>
                  <th>Tarih</th>
                  <th>İşlemler</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                    <tr>
                          @if ($message->isRead == 0)
                            <span>
                              <th>{{$message->id}}</th>
                              <th>{{ Str::substr($message->name, 0, 10) }}...</th>
                              <th>{{ Str::substr($message->email, 0, 10) }}...</th>
                              <th>{{ Str::substr($message->subject, 0, 10) }}...</th>
                              <th>{{$message->created_at}}</th>
                            </span>
                            @else
                              <span >
                                <th style="font-weight: lighter">{{$message->id}}</th>
                                <th style="font-weight: lighter">{{ Str::substr($message->name, 0, 10) }}...</th>
                                <th style="font-weight: lighter">{{ Str::substr($message->email, 0, 10) }}...</th>
                                <th style="font-weight: lighter">{{ Str::substr($message->subject, 0, 10) }}...</th>
                                <th style="font-weight: lighter">{{$message->created_at}}</th>        
                              </span>
                            @endif
                        <th>
                            <a href="{{route('admin.message.read',$message->id)}}"><button class="btn btn-primary" type="submit"><i class="fa fa-book-open"></i></button></a>
                            <a href="{{route('admin.message.delete',$message->id)}}"><button onclick="return confirm('Silmek İstediğinize Emin Misiniz? Bir daha Geri Alamayacaksınız!')" class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button></a>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th> 
                  <th>Ad Soyad</th>
                  <th>E-mail</th>
                  <th>Subject</th>
                  <th>Tarih</th>
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