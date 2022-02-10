@extends('admin.layouts.master')
@section('title','Viber')
@section('content')

<div class="content">
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
            <div class="">
                @include('admin.layouts.partials.error')
                @include('admin.layouts.partials.alert')
            </div>
    
            <div id="invoice">
    
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">SP-11{{$order->id}} Numaralı Sipariş</h3>
                    </div>
                    <!-- /.card-header -->
                    
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h3>Müşteri Bilgileri</h3>
                                </div>
                
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="desc">Telefon : </label>
                                        <p>{{$order->phone}}</p>
                                    </div>
                                </div>
                            </div><!-- end card-->
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Ürün Resim</th>
                                        <th>Ürün Ad</th>
                                        <th>Ürün Kod</th>
                                        <th>Kategori</th>
                                        <th>Marka</th>
                                        <th>Ürün Fiyat</th>
                                        <th>Adet</th>
                                        <th>Tutar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td style="width: 15%">
                                                <img style="width: 50%" src="/assets/images/products/{{$product->img}}" alt="" srcset="">
                                            </td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->code}}</td>
                                            <td>{{$product->getCategory->title}}</td>
                                            <td>{{$product->getBrand->name}}</td>
                                            <td>{{$product->price}} ₴</td>
                                            <td>{{$product->quantity}}</td>
                                            <td>{{ ($product->price) * ($product->quantity) }} ₴</td>
                                        </tr>
                                    @endforeach   
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Ürün Resim</th>
                                        <th>Ürün Ad</th>
                                        <th>Ürün Kod</th>
                                        <th>Kategori</th>
                                        <th>Marka</th>
                                        <th>Ürün Fiyat</th>
                                        <th>Adet</th>
                                        <th>Tutar</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
    
            </div>
        </div>
    </div>
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