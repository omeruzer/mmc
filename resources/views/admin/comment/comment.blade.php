@extends('admin.layouts.master')
@section('title','Yorumlar')
@section('content')
<div class="content">

    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Yorumlar</h1>
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
                  <th>Resim</th>
                  <th>Ürün</th>
                  <th>Ad Soyad</th>
                  <th>Yorum</th>
                  <th>Tarih</th>
                  <th>İşlemler</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $comment)
                    <tr>
                      @if ($comment->isRead == 0)
                        <span>
                          <th>{{$comment->id}}</th>
                          <th style="width: 15%">
                            <img style="width: 50%" src="\assets\images\products\{{$comment->getProduct->img}}">
                          </th>                        
                          <th style="width: 15%" >{{Str::substr($comment->getProduct->name, 0, 20)}}...</th>
                          <th style="width: 15%">{{Str::substr($comment->getUser->name, 0, 20 )}}... </th>
                          <th style="width: 15%">{{ Str::substr($comment->comment, 0, 20) }}...</th>
                          <th>{{$comment->created_at}}</th>
                          <th>
                            <a href="{{route('admin.comment.read',$comment->id)}}"><button class="btn btn-primary" type="submit"><i class="fa fa-edit"></i></button></a>
                            <a href="{{route('admin.comment.delete',$comment->id)}}"><button onclick="return confirm('Silmek İstediğinize Emin Misiniz? Bir daha Geri Alamayacaksınız!')" class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button></a>
                          </th>
                        </span>
                      @else
                        <span>
                          <th>{{$comment->id}}</th>
                          <th style="width: 15%">
                            <img style="width: 50%" src="\assets\images\products\{{$comment->getProduct->img}}">
                          </th>                        
                          <th style="width: 15% ; font-weight: lighter">{{Str::substr($comment->getProduct->name, 0, 20)}}...</th>
                          <th style="width: 15% ; font-weight: lighter">{{Str::substr($comment->getUser->name, 0, 20 )}}... </th>
                          <th style="width: 15% ; font-weight: lighter">{{ Str::substr($comment->comment, 0, 20) }}...</th>
                          <th style="font-weight: lighter">{{$comment->created_at}}</th>
                          <th>
                            <a href="{{route('admin.comment.read',$comment->id)}}"><button class="btn btn-primary" type="submit"><i class="fa fa-edit"></i></button></a>
                            <a href="{{route('admin.comment.delete',$comment->id)}}"><button onclick="return confirm('Silmek İstediğinize Emin Misiniz? Bir daha Geri Alamayacaksınız!')" class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button></a>
                          </th>
                        </span>
                      @endif

                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Resim</th>
                    <th>Ürün</th>
                    <th>Ad Soyad</th>
                    <th>Yorum</th>
                    <th>Tarih</th>
                    <th>İşlemler</th>
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
        "buttons": [ "excel", "pdf", "print"]
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