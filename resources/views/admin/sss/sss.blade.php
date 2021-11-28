@extends('admin.layouts.master')
@section('title','SSS')
@section('content')
<div class="content">

    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Sıkça Sorulan Sorular</h1>
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
              <h3 style="float: left" class="card-title">Soru Listesi</h3>
              <div style="text-align: right;" >
                <a href="{{route('admin.sss.create')}}">
                    <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> Yeni Soru Ekle </button>
                </a>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Soru</th>
                  <th>Cevap</th>
                  <th>İşlemler</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($questions as $question)
                    <tr>
                        <th>{{$question->id}}</th>
                        <th>{{ Str::substr($question->question, 0, 20) }}...</th>
                        <th>{{Str::substr($question->answer, 0, 20)}}...</th>
                        <th>
                            <a href="{{route('admin.sss.edit',$question->id)}}"><button class="btn btn-primary" type="submit"><i class="fa fa-edit"></i></button></a>
                            <a href="{{route('admin.sss.delete',$question->id)}}"><button class="btn btn-danger" onclick="return confirm('Silmek İstediğinize Emin Misiniz? Bir daha Geri Alamayacaksınız!')"  type="submit"><i class="fa fa-trash"></i></button></a>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Soru</th>
                    <th>Cevap</th>
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