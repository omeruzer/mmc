@extends('front.layouts.master')
@section('title')İadelerim | {{$set->title}}@endsection
@section('content')
<main class="bg_gray">
		
	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="{{route('homepage')}}">Главная</a></li>
					<li>мои возвращения</li>
				</ul>
		</div>
		<h1>мои возвращения</h1>
	</div>
	<!-- /page_header -->
        <div class="row justify-content-center">
			<div class="col-xl-12 col-lg-12 col-md-12">
				<div class="box_account">
					<div class="form_container">
                        <div class="myOrdersTable">
                            @if (count($orders) == 0)
                                <p>
                                    Вы никогда раньше не создавали запрос на возврат. <br>
                                    для покупок <a href="{{route('homepage')}}">кликните сюда</a>
                                </p>
                            @else
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Заказ №</th>
                                            <th>К оплате</th>
                                            <th>Количество</th>
                                            <th>Статус</th>
                                            <th>Деталь</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>SP-00{{$order->id}}</td>
                                                <td>{{$order->orderAmount+$shipp->track}} ₴</td>
                                                <td>{{$order->getCart->cartProductQty()}}</td>
                                                <td>{{$order->status}}</td>
                                                <td>
                                                    <a href="{{route('myOrdersDetail',$order->id)}}"><button class="btn btn-info" type="submit">Деталь</button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Заказ №</th>
                                            <th>К оплате</th>
                                            <th>Количество</th>
                                            <th>Статус</th>
                                            <th>Деталь</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            @endif
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
<link rel="stylesheet" type="text/css" href="/assets/plugins/datatables/datatables.min.css" />


@endsection

@section('footer')

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