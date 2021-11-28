@extends('front.layouts.master')
@section('title')Siparişlerim | {{$set->title}}@endsection
@section('content')
<main class="bg_gray">
		
	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="{{route('homepage')}}">Anasayfa</a></li>
					<li>Siparişlerim</li>
				</ul>
		</div>
		<h1>Siparişlerim</h1>
	</div>
	<!-- /page_header -->
		<div class="row justify-content-center">
			<div class="col-xl-12 col-lg-12 col-md-12">
				<div class="box_account">
					<div class="form_container">
                        <h3>SP-00{{$orders->id}} Numaralı Sipariş Detayı</h3>
                        <div class="productDetailTable">
                            <div class="cart-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Ürün Resmi</th>
                                            <th>Ürün Adı</th>
                                            <th>Ürün Kodu</th>
                                            <th>Marka</th>
                                            <th>Kategori</th>
                                            <th>Fiyat</th>
                                            <th>Adet</th>
                                            <th>Toplam</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders->getCart->cartProduct as $order)
                                        <tr>
                                            <td style="width: 15%">
                                                <img style="width: 50%" src="/assets/images/products/{{$order->getProducts->img}}" alt="" srcset="">
                                            </td>
                                            <td>{{$order->getProducts->name}}</td>
                                            <td>{{$order->getProducts->code}}</td>
                                            <td>{{$order->getProducts->getCategory->title}}</td>
                                            <td>{{$order->getProducts->getBrand->name}}</td>
                                            <td>${{$order->getProducts->price}}</td>
                                            <td>{{$order->quantity}}</td>
                                            <td>${{ ($order->getProducts->price) * ($order->quantity) }}</td>
                                        </tr>
                                    @endforeach  
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Ürün Resmi</th>
                                            <th>Ürün Adı</th>
                                            <th>Ürün Kodu</th>
                                            <th>Marka</th>
                                            <th>Kategori</th>
                                            <th>Fiyat</th>
                                            <th>Adet</th>
                                            <th>Toplam</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                        </div>
                    </div>
				</div>
			</div>
		</div>

        <div class="row justify-content-right" >
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-5 col-xl-6">
				<div class="box_account">
					<div class="form_container" >
                        <h3>Sipariş Bilgileri</h3>
                        <hr>
                        <div class="productDetailTable" >
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="desc">Sipariş Durumu:</label>
                                    @if ($orders->status == 'Sipariş İptal Edildi'  || $orders->status == 'İade Talebi Oluşturuldu')
                                        <p class="status" style="color: red">{{$orders->status}}</p>
                                    @else
                                        <p class="status" style="color: #47C68E">{{$orders->status}}</p>
                                    @endif
                                </div>
                                <div class="form-group trackCode">
                                    <label for="desc">Kargo Takip Numarası:</label>
                                    <p><b>{{$orders->trackCode}}</b> | 
                                        @if ((($orders->status == 'Kargoya Verildi') || ($orders->status == 'Sipariş Tamamlandı')))
                                            <a href="https://tracking.novaposhta.ua/#/uk" style="color: #47C68E" href="#">Kargom Nerede?</a>
                                        @else
                                        
                                        @endif 
                                </div>
                                <div class="form-group">
                                    <label for="desc">Toplam:</label>
                                    <p>${{$orders->orderAmount - $shipp->track}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="desc">Kargo:</label>
                                    <p>${{$shipp->track}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="desc">Genel Tutar:</label>
                                    <p style="color: #47C68E"><b>${{ ($orders->orderAmount) }}</b></p>
                                </div>
                                <div class="form-group" style="float: right">
                                    @if ($orders->status != 'İade Talebi Oluşturuldu')
                                        <a href="{{route('returnOrder',$orders->id)}}"><button class="btn btn-danger" onclick="return confirm('İade Talebi Etmek İstediğinize Emin Misniz?!')" type="submit">İade Talebi Oluştur <i class="fa fa-undo"></i></button></a>
                                    @else
                                    
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
		<!-- /row -->
		</div>
		<!-- /container -->
	</main>
@endsection
@section('head')
<link href="/assets/front/css/account.css" rel="stylesheet">
<link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/font-awesome/css/all.css" rel="stylesheet" type="text/css" />

@endsection 
@section('footer')
    <script>
        $('.trackCode').hide()
        
        var status = $('.status').html()
        
        if(status == 'Kargoya Verildi' || status == 'Sipariş Tamamlandı' ){
            $('.trackCode').show()
        }else{
            $('.trackCode').hide()
        }
    </script>

<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": []
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": false,
        "lengthChange": false,
        "searching": false,
        "ordering": false,
        "info": false,
        "autoWidth": false,
        "responsive": false,
      });
    });
  </script>
<script src="/assets/plugins/chart.js/Chart.min.js"></script>
<script src="/assets/plugins/datatables/datatables.min.js"></script>

<script src="/assets/data/data_datatables.js"></script>

<script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/assets/plugins/jszip/jszip.min.js"></script>
<script src="/assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>

@endsection
@section('head')
<link rel="stylesheet" type="text/css" href="/assets/plugins/datatables/datatables.min.css" />

@endsection