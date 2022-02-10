@extends('admin.layouts.master')
@section('title','Siparişler')
@section('content')
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Siparişler</h1>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Siparişler Listesi</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Sipariş Numarası</th>
                  <th>Ürün Adet</th>
                  <th>Ad Soyad</th>
                  <th>Ödeme Türü</th>
                  <th>Teslimat Türü</th>
                  <th>Sipariş Tutarı</th>
                  <th>Durum</th>
                  <th>Sipariş Tarihi</th>
                  <th>İşlemler</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($orders as $order)
                    <tr>
                      @if ($order->isRead == 0)
                        <span>
                          <td><b>{{$order->id}}</b></td>
                          <td><b>SP-00{{$order->id}}</b></td>
                          <td><b>{{$order->getCart->cartProductQty()}}</b></td>
                          <td><b>{{$order->name }}</b></td>
                          <td><b>{{$order->paymentType}}</b></td>
                          <td><b>{{$order->shipping}}</b></td>
                          <td><b>{{$order->orderAmount}} ₴</b></td>
                          <td><b>{{$order->status}}</b></td>
                          <td><b>{{$order->created_at}}</b></td>
                          <td>
                            <a href="{{route('admin.order.detail',$order->id)}}"><button class="btn btn-primary" type="submit"><i class="fa fa-book-open"></i></button></a>
                            <a href="{{route('admin.order.delete',$order->id)}}"><button onclick="return confirm('Silmek İstediğinize Emin Misiniz? Bir daha Geri Alamayacaksınız!')" class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button></a>
                          </td>
                        </span>
                      @else
                        <span>
                          <td style="font-weight: lighter">{{$order->id}}</td>
                          <td style="font-weight: lighter">SP-00{{$order->id}}</td>
                          <td style="font-weight: lighter">{{$order->getCart->cartProductQty()}}</td>
                          <td style="font-weight: lighter">{{$order->name }}</td>
                          <td style="font-weight: lighter">{{$order->paymentType}}</td>
                          <td style="font-weight: lighter">{{$order->shipping}}</td>
                          <td style="font-weight: lighter">{{($order->orderAmount)}} ₴</td>
                          <td style="font-weight: lighter">{{$order->status}}</td>
                          <td style="font-weight: lighter">{{$order->created_at}}</td>
                          <td>
                            <a href="{{route('admin.order.detail',$order->id)}}"><button class="btn btn-primary" type="submit"><i class="fa fa-book-open"></i></button></a>
                            <a href="{{route('admin.order.delete',$order->id)}}"><button onclick="return confirm('Silmek İstediğinize Emin Misiniz? Bir daha Geri Alamayacaksınız!')" class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button></a>
                          </td>
                        </span>
                      @endif

                    </tr> 
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Sipariş Numarası</th>
                  <th>Ürün Adet</th>
                  <th>Ad Soyad</th>
                  <th>Ödeme Türü</th>
                  <th>Teslimat Türü</th>
                  <th>Sipariş Tutarı</th>
                  <th>Durum</th>
                  <th>Sipariş Tarihi</th>
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