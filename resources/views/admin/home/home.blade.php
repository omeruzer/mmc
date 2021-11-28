@extends('admin.layouts.master')
@section('title','Anasayfa')
@section('content')
                <!-- Start content -->
                <div class="content">

                    <div class="container-fluid">
    
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">Yönetim Paneli</h1>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="">
                            <h4>Genel Bilgiler</h4>
                        </div>

                        <hr>
    
                        <div class="row">
                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box noradius noborder bg-danger">
                                    <i class="far fa-user float-right text-white"></i>
                                    <h6 class="text-white text-uppercase m-b-20">Kayıtlı Kullanıcı</h6>
                                    <h1 class="m-b-20 text-white counter">{{$userCount}}</h1>
                                    <span class="text-white">adet</span>
                                </div>
                            </div>
    
                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box noradius noborder bg-purple">
                                    <i class="fas fa-envelope float-right text-white"></i>
                                    <h6 class="text-white text-uppercase m-b-20">Okunmamış Mesaj</h6>
                                    <h1 class="m-b-20 text-white counter">{{$messageCount}}</h1>
                                    <span class="text-white">adet</span>
                                </div>
                            </div>
    
                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box noradius noborder bg-warning">
                                    <i class="fas fa-user-shield float-right text-white"></i>
                                    <h6 class="text-white text-uppercase m-b-20">Yönetici</h6>
                                    <h1 class="m-b-20 text-white counter">{{$managerCount}}</h1>
                                    <span class="text-white">adet</span>
                                </div>
                            </div>
    
                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box noradius noborder bg-info">
                                    <i class="fas fa-list float-right text-white"></i>
                                    <h6 class="text-white text-uppercase m-b-20">Kategori</h6>
                                    <h1 class="m-b-20 text-white counter">{{$categoryCount}}</h1>
                                    <span class="text-white">adet</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box noradius noborder bg-danger">
                                    <i class="fas fa-sitemap float-right text-white"></i>
                                    <h6 class="text-white text-uppercase m-b-20">Ürün</h6>
                                    <h1 class="m-b-20 text-white counter">{{$productCount}}</h1>
                                    <span class="text-white">adet</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box noradius noborder bg-purple">
                                    <i class="fas fa-building float-right text-white"></i>
                                    <h6 class="text-white text-uppercase m-b-20">Şube</h6>
                                    <h1 class="m-b-20 text-white counter">{{$branchCount}}</h1>
                                    <span class="text-white">adet</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box noradius noborder bg-warning">
                                    <i class="fas fa-copyright float-right text-white"></i>
                                    <h6 class="text-white text-uppercase m-b-20">Marka</h6>
                                    <h1 class="m-b-20 text-white counter">{{$brandCount}}</h1>
                                    <span class="text-white">adet</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box noradius noborder bg-info">
                                    <i class="fas fa-clipboard float-right text-white"></i>
                                    <h6 class="text-white text-uppercase m-b-20">Blog</h6>
                                    <h1 class="m-b-20 text-white counter">{{$blogCount}}</h1>
                                    <span class="text-white">adet</span>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="">
                            <h4>Satış Bilgileri</h4>
                        </div>

                        <hr>
    
                        <div class="row">
                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box noradius noborder bg-danger">
                                    <i class="far fa-user float-right text-white"></i>
                                    <h6 class="text-white text-uppercase m-b-20">Ciro</h6>
                                    <h1 class="m-b-20 text-white counter">{{$amount}}</h1>
                                    <span class="text-white">UAH</span>
                                </div>
                            </div>
    
                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box noradius noborder bg-purple">
                                    <i class="fas fa-envelope float-right text-white"></i>
                                    <h6 class="text-white text-uppercase m-b-20">Sipariş</h6>
                                    <h1 class="m-b-20 text-white counter">{{$orderCount}}</h1>
                                    <span class="text-white">adet</span>
                                </div>
                            </div>
    
                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box noradius noborder bg-warning">
                                    <i class="fas fa-user-shield float-right text-white"></i>
                                    <h6 class="text-white text-uppercase m-b-20">Kargoya Verildi</h6>
                                    <h1 class="m-b-20 text-white counter">{{$truckOrder}}</h1>
                                    <span class="text-white">adet</span>
                                </div>
                            </div>
    
                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box noradius noborder bg-info">
                                    <i class="fas fa-list float-right text-white"></i>
                                    <h6 class="text-white text-uppercase m-b-20">Tamamlanan Sipariş</h6>
                                    <h1 class="m-b-20 text-white counter">{{$endOrder}}</h1>
                                    <span class="text-white">adet</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box noradius noborder bg-danger">
                                    <i class="fas fa-sitemap float-right text-white"></i>
                                    <h6 class="text-white text-uppercase m-b-20">Yeni Sipariş</h6>
                                    <h1 class="m-b-20 text-white counter">{{$NewOrder}}</h1>
                                    <span class="text-white">adet</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box noradius noborder bg-purple">
                                    <i class="fas fa-building float-right text-white"></i>
                                    <h6 class="text-white text-uppercase m-b-20">Bekleyen Siparişler</h6>
                                    <h1 class="m-b-20 text-white counter">{{$WaitOrder}}</h1>
                                    <span class="text-white">adet</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box noradius noborder bg-warning">
                                    <i class="fas fa-copyright float-right text-white"></i>
                                    <h6 class="text-white text-uppercase m-b-20">İptal Edilen Sipariş</h6>
                                    <h1 class="m-b-20 text-white counter">{{$cancelOrder}}</h1>
                                    <span class="text-white">adet</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box noradius noborder bg-info">
                                    <i class="fas fa-clipboard float-right text-white"></i>
                                    <h6 class="text-white text-uppercase m-b-20">İade Talebi</h6>
                                    <h1 class="m-b-20 text-white counter">{{$returnOrder}}</h1>
                                    <span class="text-white">adet</span>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="">
                            <h4>Ziyaretçi Bilgileri</h4>
                        </div>

                        <hr>
    
                        <div class="row">
                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box noradius noborder bg-danger">
                                    <i class="far fa-calendar-week float-right text-white"></i>
                                    <h6 class="text-white text-uppercase m-b-20">Anlık Ziyaretçi*</h6>
                                    <h1 class="m-b-20 text-white counter">{{count($lastDayVisitor)}}</h1>
                                    <span class="text-white">adet</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box noradius noborder bg-purple">
                                    <i class="fa fa-calendar-week float-right text-white"></i>
                                    <h6 class="text-white text-uppercase m-b-20">Günlük Ziyaretçi</h6>
                                    <h1 class="m-b-20 text-white counter">{{count($lastDayVisitor)}}</h1>
                                    <span class="text-white">adet</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box noradius noborder bg-warning">
                                    <i class="fa fa-calendar-week float-right text-white"></i>
                                    <h6 class="text-white text-uppercase m-b-20">Haftalık Ziyaretçi</h6>
                                    <h1 class="m-b-20 text-white counter">{{count($lastWeekVisitor)}}</h1>
                                    <span class="text-white">adet</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box noradius noborder bg-info">
                                    <i class="fa fa-calendar-week float-right text-white"></i>
                                    <h6 class="text-white text-uppercase m-b-20">Aylık Ziyaretçi</h6>
                                    <h1 class="m-b-20 text-white counter">{{count($lastMonthVisitor)}}</h1>
                                    <span class="text-white">adet</span>
                                </div>
                            </div>
   
    

                        </div>

                        <hr>
    
    
                        {{-- <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h3><i class="fas fa-chart-bar"></i> Chart 1</h3>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus non luctus metus. Vivamus fermentum ultricies orci sit amet sollicitudin.
                                    </div>
    
                                    <div class="card-body">
                                        <canvas id="comboBarLineChart"></canvas>
                                    </div>
                                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                                </div>
                                <!-- end card-->
                            </div>
    
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h3><i class="fas fa-chart-bar"></i> Chart 2</h3>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus non luctus metus. Vivamus fermentum ultricies orci sit amet sollicitudin.
                                    </div>
    
                                    <div class="card-body">
                                        <canvas id="barChart"></canvas>
                                    </div>
                                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                                </div>
                                <!-- end card-->
                            </div>
                        </div> --}}
                        <!-- end row --> 
    
    
    
                         <div class="row">
    
                            {{-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h3><i class="fas fa-history"></i> Tasks progress</h3>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </div>
    
                                    <div class="card-body">
                                        <p class="font-600 mb-1">Task completed <span class="text-info pull-right"><b>100%</b></span></p>
                                        <div class="progress">
                                            <div class="progress-bar progress-xs bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
    
                                        <div class="mb-3"></div>
    
                                        <p class="font-600 mb-1">Task 1 <span class="text-primary pull-right"><b>95%</b></span></p>
                                        <div class="progress">
                                            <div class="progress-bar progress-xs bg-primary" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="95">
                                            </div>
                                        </div>
    
                                        <div class="mb-3"></div>
    
                                        <p class="font-600 mb-1">Task 2 <span class="text-primary pull-right"><b>88%</b></span></p>
                                        <div class="progress">
                                            <div class="progress-bar progress-xs bg-primary" role="progressbar" style="width: 88%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="88">
                                            </div>
                                        </div>
    
                                        <div class="mb-3"></div>
    
                                        <p class="font-600 mb-1">Task 3 <span class="text-info pull-right"><b>75%</b></span>
                                        </p>
                                        <div class="progress">
                                            <div class="progress-bar progress-xs bg-info" role="progressbar" style="width: 78%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="75">
                                            </div>
                                        </div>
    
                                        <div class="mb-3"></div>
    
                                        <p class="font-600 mb-1">Task 4 <span class="text-info pull-right"><b>70%</b></span>
                                        </p>
                                        <div class="progress">
                                            <div class="progress-bar progress-xs bg-info" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="70">
                                            </div>
                                        </div>
    
                                        <div class="mb-3"></div>
    
                                        <p class="font-600 mb-1">Task 5 <span class="text-warning pull-right"><b>68%</b></span></p>
                                        <div class="progress">
                                            <div class="progress-bar progress-xs bg-warning" role="progressbar" style="width: 68%" aria-valuenow="68" aria-valuemin="0" aria-valuemax="68">
                                            </div>
                                        </div>
    
                                        <div class="mb-3"></div>
    
                                        <p class="font-600 mb-1">Task 6 <span class="text-warning pull-right"><b>65%</b></span></p>
                                        <div class="progress">
                                            <div class="progress-bar progress-xs bg-warning" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="65">
                                            </div>
                                        </div>
    
                                        <div class="mb-3"></div>
    
                                        <p class="font-600 mb-1">Task 7 <span class="text-danger pull-right"><b>55%</b></span></p>
                                        <div class="progress">
                                            <div class="progress-bar progress-xs bg-danger" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="55">
                                            </div>
                                        </div>
    
                                        <div class="mb-3"></div>
    
                                        <p class="font-600 mb-1">Task 8 <span class="text-danger pull-right"><b>40%</b></span></p>
                                        <div class="progress">
                                            <div class="progress-bar progress-xs bg-danger" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="40">
                                            </div>
                                        </div>
    
                                        <div class="mb-3"></div>
    
                                        <p class="font-600 mb-1">Task 9 <span class="text-danger pull-right"><b>20%</b></span></p>
                                        <div class="progress">
                                            <div class="progress-bar progress-xs bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="20">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer small text-muted">Updated today at 11:59 PM</div>
                                </div>
                                <!-- end card-->
                            </div> --}}
    
    
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h3><i class="fas fa-list-ol"></i> Stoğu Azalan Ürünler</h3>
                                    </div>
    
                                    <div class="card-body">
    
                                        <div class="widget-messages nicescroll" style="height: 500px;">
                                            @if ($decliningstocks->count() <= 0 )
                                                <a href="#">
                                                    <div class="message-item">
                                                        <p class="message-item-user">Stoğu Azalan Ürün Yok</p>
                                                    </div>
                                                </a>
                                            @else
                                            @foreach ($decliningstocks as $item)
                                                <a href="#">
                                                    <div class="message-item">
                                                        <p class="message-item-user">{{$item->code}}</p>
                                                        <p class="message-item-msg">{{$item->name}}</p>
                                                        <p class="message-item-date" style="color: red; font-weight: bold; font-size: 18px">{{$item->quantity}}</p>
                                                    </div>
                                                </a>
                                            @endforeach
                                            @endif
                                        </div>
                                        <div class="">
                                            <a href="{{ route('admin.product') }}"><button type="submit" class="btn btn-primary" style="float: right">Ürünlere Git <i style="margin-left: 5px" class="fa fa-arrow-right"></i></button></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card-->
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h3><i class="fas fa-list-ol"></i> Yeni Eklenen Ürünler</h3>
                                    </div>
    
                                    <div class="card-body">
    
                                        <div class="widget-messages nicescroll" style="height: 500px;">

                                            @foreach ($newProducts as $newProduct)
                                                <a href="#">
                                                    <div class="message-item">
                                                        <p class="message-item-user">{{$newProduct->code}}</p>
                                                        <p class="message-item-msg">{{$newProduct->name}}</p>
                                                        <p class="message-item-date" style="color: red; font-weight: bold; font-size: 18px">{{$newProduct->quantity}}</p>
                                                    </div>
                                                </a>
                                            @endforeach

                                        </div>
                                        <div class="">
                                            <a href="{{ route('admin.product') }}"><button type="submit" class="btn btn-primary" style="float: right">Ürünlere Git <i style="margin-left: 5px" class="fa fa-arrow-right"></i></button></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card-->
                            </div>
                            
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header" style="">
                                      <h3 style="float: left" class="card-title">Ziyaretçi Listesi</h3>
                                      <a href="{{ route('admin.visitor.delete') }}"><button style="float: right" type="submit" class="btn btn-danger"><i class="fa fa-trash" style="margin-right: 5px"></i> Tabloyu Sil</button></a>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                      <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>IP Adresi</th>
                                                <th>Girdiği Adres</th>
                                                <th>Tarayıcı</th>
                                                <th>Tarayıcı Dili</th>
                                                <th>Tarih</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if ($visitors->count() <= 0)
                                                <tr>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                </tr>
                                            @else
                                                @foreach ($visitors as $visitor)
                                                <tr>
                                                    <td>{{$visitor->id}}</td>
                                                    <td>{{$visitor->ip}}</td>
                                                    <td>{{$visitor->url}}</td>
                                                    <td>{{$visitor->browser}}</td>
                                                    <td>{{$visitor->language}}</td>
                                                    <td>{{$visitor->created_at}}</td>
                                                </tr>
                                                @endforeach
                                            @endif

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>IP Adresi</th>
                                                <th>Girdiği Adres</th>
                                                <th>Tarayıcı</th>
                                                <th>Tarayıcı Dili</th>
                                                <th>Tarih</th>
                                            </tr>
                                        </tfoot>
                                      </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- end card-->
                            </div>
    
                        </div>
                        <!-- end row--> 
    
                    </div>
                    <!-- END container-fluid -->
    
                </div>
                <!-- END content --> 
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