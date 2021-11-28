@extends('front.layouts.master')
@section('title')Yorumlarım | {{$set->title}}@endsection
@section('content')
<main class="bg_gray">
		
	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="{{route('homepage')}}">Anasayfa</a></li>
					<li><a href="{{route('account')}}">Hesabım</a></li>
					<li>Yorumlarım</li>
				</ul>
		</div>
		<h1>Yorumlarım</h1>
	</div>
    <div class="row">
        <div class="col-xl-6">
            @include('admin.layouts.partials.error')
            @include('admin.layouts.partials.alert')        
        </div>
      </div>
	    <!-- /page_header -->
		<div class="row justify-content-center">
			<div class="col-xl-12 col-lg-12 col-md-12">
				<div class="box_account">
					<div class="form_container">
                        <div class="myOrdersTable">

                            {{-- @if (count($comments) > 0)
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th>Ürün Resmi</th>
                                            <th>Ürün Adı</th>
                                            <th>Ürün Kodu</th>
                                            <th>Yorum</th>
                                            <th>Tarih</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        @foreach ($comments as $comment)
                                            <tr>
                                                <td style="width: 15%;">
                                                    <img style="width: 50%;" src="/assets/images/products/{{$comment->getProduct->img}}" alt="" srcset="">
                                                </td>
                                                <td>{{Str::substr($comment->getProduct->name,0,20)}}...</td>
                                                <td>{{$comment->getProduct->code}}</td>
                                                <td>{{Str::substr($comment->comment,0,20)}}...</td>
                                                <td>{{$comment->created_at}}</td>
                                                <td>
                                                    <a href="{{route('mycomment.detail',$comment->id)}}"><button class="btn btn-info" type="submit">Yoruma Git</button></a>
                                                    <a href="{{route('comment.delete',$comment->id)}}"><button class="btn btn-danger" type="submit">Yorumu Sil</button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th>Ürün Resmi</th>
                                            <th>Ürün Adı</th>
                                            <th>Ürün Kodu</th>
                                            <th>Yorum</th>
                                            <th>Tarih</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                </table>
                            @else
                                <div class="container">
                                    <div class="" style="text-align: center">
                                        <h3>Hiç Yorumunuz Yok</h3>
                                    </div>
                                </div>
                            @endif --}}
                            <div class="cart-body">
                                @if (count($comments) > 0)
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Ürün Resmi</th>
                                                <th>Ürün Adı</th>
                                                <th>Ürün Kodu</th>
                                                <th>Yorum</th>
                                                <th>Tarih</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($comments as $comment)
                                                <tr>
                                                    <td style="width: 15%;">
                                                        <img style="width: 50%;" src="/assets/images/products/{{$comment->getProduct->img}}" alt="" srcset="">
                                                    </td>
                                                    <td>{{Str::substr($comment->getProduct->name,0,20)}}...</td>
                                                    <td>{{$comment->getProduct->code}}</td>
                                                    <td>{{Str::substr($comment->comment,0,20)}}...</td>
                                                    <td>{{$comment->created_at}}</td>
                                                    <td>
                                                        <a href="{{route('mycomment.detail',$comment->id)}}"><button class="btn btn-info" type="submit">Yoruma Git</button></a>
                                                        <a href="{{route('comment.delete',$comment->id)}}"><button class="btn btn-danger" type="submit">Yorumu Sil</button></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Ürün Resmi</th>
                                                <th>Ürün Adı</th>
                                                <th>Ürün Kodu</th>
                                                <th>Yorum</th>
                                                <th>Tarih</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                    </table> 
                                @else
                                    <div class="container">
                                        <div class="" style="text-align: center">
                                            <h3>Hiç Yorumunuz Yok</h3>
                                        </div>
                                    </div>
                                @endif

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