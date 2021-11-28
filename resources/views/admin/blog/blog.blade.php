@extends('admin.layouts.master')
@section('title','Blog')
@section('content')
<div class="content">

    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Blog</h1>
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
              <h3 style="float: left" class="card-title">Blog Listesi</h3>
              <div style="text-align: right;">
                <a href="{{route('admin.blog.create')}}">
                    <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> Yeni Yazı Ekle</button>
                </a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Resim</th>
                  <th>Başlık</th>
                  <th>Hit</th>
                  <th>İçerik</th>
                  <th>İşlemler</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $blog)
                    <tr>
                        <th>{{$blog->id}}</th>
                        <th style="width: 10%">
                            <img style="width: 100%" src="/assets/images/blogs/{{$blog->img}}" alt="" srcset="">
                        </th>
                        <th>{{$blog->title}}</th>
                        <th>{{$blog->hit}}</th>
                        <th>{{ Str::substr($blog->content, 0, 25) }}...</th>
                              <th>
                            <a href="{{route('admin.blog.edit',$blog->slug)}}"><button class="btn btn-primary" type="submit"><i class="fa fa-edit"></i></button></a>
                            <a href="{{route('admin.blog.delete',$blog->slug)}}"><button onclick="return confirm('Silmek İstediğinize Emin Misiniz? Bir daha Geri Alamayacaksınız!')" class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button></a>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Resim</th>
                    <th>Başlık</th>
                    <th>Hit</th>
                    <th>İçerik</th>
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