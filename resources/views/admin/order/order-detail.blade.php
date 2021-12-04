@extends('admin.layouts.master')
@section('title')
    Siparişler | Yönetim Paneli
@endsection 
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
        <div class="">
            @include('admin.layouts.partials.error')
            @include('admin.layouts.partials.alert')
        </div>

        <div id="invoice">

            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">SP-00{{$order->id}} Numaralı Sipariş</h3>
                </div>
                <!-- /.card-header -->
                
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3>Müşteri Bilgileri</h3>
                            </div>
            
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="desc">Ad Soyad:</label>
                                    <p>{{$order->name}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="desc">E-mail:</label>
                                    <p>{{$order->email}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="desc">Telefon</label>
                                    <p>{{$order->phone}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="desc">Adres</label>
                                    <p>{{$order->address}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="desc">Şehir</label>
                                    <p>{{$order->city}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="desc">Ülke</label>
                                    <p>{{$order->country}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="desc">Posta Kodu</label>
                                    <p>{{$order->postCode}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="desc">Sipariş Tarihi</label>
                                    <p>{{$order->created_at}}</p>
                                </div>
                                <form action="{{route('admin.order.save',$order->id)}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="desc">Sipariş Durumu</label>
                                        <select class="form-control" name="status" id="status">
                                            <option {{old('status',$order->status) == "заказ принят" ? "selected" : ""}}>заказ принят</option>
                                            <option {{old('status',$order->status) == 'Заказ обрабатывается' ? 'selected' : ""}}>Заказ обрабатывается</option>
                                            <option {{old('status',$order->status) == 'Заказ отправлен' ? 'selected' : ""}}>Заказ отправлен</option>
                                            <option {{old('status',$order->status) == 'заказ выполнен' ? 'selected' : ""}}>заказ выполнен</option>
                                            <option {{old('status',$order->status) == 'Заказ отменён' ? 'selected' : ""}}>Заказ отменён</option>
                                            <option {{old('status',$order->status) == 'Запрос на возврат создан' ? 'selected' : ""}}>Запрос на возврат создан</option>
                                        </select>
                                    </div>
                                    <div class="form-group track">
                                        <label for="">Kargo Takip No:</label>
                                        <input type="text" name="trackCode" id="trackCode" class="form-control" placeholder="Kargo Takip Kodu">
                                    </div>
                                    <div class="" style="float: right">
                                        <button type="submit" class="btn btn-success" >Kaydet</button>
                                    </div>
                                </form>
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
                                @foreach ($products->getCart->cartProduct as $product)
                                    <tr>
                                        <td style="width: 15%">
                                            <img style="width: 50%" src="/assets/images/products/{{$product->getProducts->img}}" alt="" srcset="">
                                        </td>
                                        <td>{{$product->getProducts->name}}</td>
                                        <td>{{$product->getProducts->code}}</td>
                                        <td>{{$product->getProducts->getCategory->title}}</td>
                                        <td>{{$product->getProducts->getBrand->name}}</td>
                                        <td>{{$product->getProducts->price}}</td>
                                        <td>{{$product->quantity}}</td>
                                        <td>{{ ($product->getProducts->price) * ($product->quantity) }}</td>
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
                    <div style="margin-top: 15px"  class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card col-xs-12 col-sm-12 col-md-12 col-lg-3 col-xl-3" style="float: right">
                            <div class="card-header">
                                <h3>Sipariş Tutarı</h3>
                            </div>
            
                            <div class="card-body" >
                                <div class="">
                                    <div class="form-group" >
                                        <label for="desc">Toplam:</label>
                                        <p>${{$order->orderAmount - $shipp->track}}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Kargo:</label>
                                        <p>${{$shipp->track}}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Genel Tutar:</label>
                                        <p><b>${{ ($order->orderAmount)}}</b></p>
                                    </div>
                                </div>
                            </div>
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

<script>

    $('.track').hide();

    $('#status').on('change', function () {
    if(this.value == 'Заказ отправлен' || this.value == 'заказ выполнен' ){
        $('.track').show();
    }else{ 
        $('.track').hide();
    }
    });

</script>

  
@endsection