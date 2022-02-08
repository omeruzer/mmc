@extends('front.layouts.master')
@section('title')Мои заказы | {{ $set->title }}@endsection
@section('content')
    <main class="bg_gray">

        <div class="container margin_30">
            <div class="page_header">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="{{ route('homepage') }}">Главная</a></li>
                        <li>Мои заказы</li>
                    </ul>
                </div>
                <h1>Мои заказы</h1>
            </div>
            <!-- /page_header -->
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="box_account">
                        <div class="form_container">
                            <h3>Заказ № SP-00{{ $orders->id }} Деталь</h3>
                            <div class="productDetailTable">
                                <div class="cart-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>товар</th>
                                                <th>Название</th>
                                                <th>Код </th>
                                                <th>Каталог</th>
                                                <th>бренд</th>
                                                <th>цена</th>
                                                <th>Количество</th>
                                                <th>Сумма</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders->getCart->cartProduct as $order)
                                                <tr>
                                                    <td style="width: 15%">
                                                        <img style="width: 50%"
                                                            src="/assets/images/products/{{ $order->getProducts->img }}"
                                                            alt="" srcset="">
                                                    </td>
                                                    <td>{{ $order->getProducts->name }}</td>
                                                    <td>{{ $order->getProducts->code }}</td>
                                                    <td>{{ $order->getProducts->getCategory->title }}</td>
                                                    <td>{{ $order->getProducts->getBrand->name }}</td>
                                                    <td>{{ $order->getProducts->price }} ₴</td>
                                                    <td>{{ $order->quantity }}</td>
                                                    <td>{{ $order->getProducts->price * $order->quantity }} ₴</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>товар</th>
                                                <th>Название</th>
                                                <th>Код </th>
                                                <th>Каталог</th>
                                                <th>бренд</th>
                                                <th>цена</th>
                                                <th>Количество</th>
                                                <th>Сумма</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-right">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5 col-xl-6">
                    <div class="box_account">
                        <div class="form_container">
                            <h3>запросить информацию</h3>
                            <hr>
                            <div class="productDetailTable">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="desc">Статус:</label>
                                        @if ($orders->status == 'Заказ отменён' || $orders->status == 'Запрос на возврат создан')
                                            <p class="status" style="color: red">{{ $orders->status }}</p>
                                        @else
                                            <p class="status" style="color: #47C68E">{{ $orders->status }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group trackCode">
                                        <label for="desc">Номер отслеживания доставки:</label>
                                        <p><b>{{ $orders->trackCode }}</b></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Итого:</label>
                                        <p>{{ $orders->orderAmount - $shipp->track }} ₴</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Стоимость доставки:</label>
                                        <p>{{ $shipp->track }} ₴</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">К оплате:</label>
                                        <p style="color: #47C68E"><b>{{ $orders->orderAmount }} ₴</b></p>
                                    </div>
                                    <div class="form-group" style="float: right">
                                        @if ($orders->status != 'Запрос на возврат создан')
                                            <a href="{{ route('returnOrder', $orders->id) }}"><button
                                                    class="btn btn-danger"
                                                    onclick="return confirm('Вы уверены, что хотите его вернуть?')"
                                                    type="submit"> Возврат <i class="fa fa-undo"></i></button></a>
                                        @else

                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($orders->status == 'Заказ отправлен' || $orders->status == 'заказ выполнен')
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5 col-xl-6">
                    <div class="box_account">
                        <div class="form_container">
                            <h3>Где мой заказ</h3>
                            <hr>
                            <div class="productDetailTable">
                                <div class="card-body">
                                    <div id="np-tracking" style="margin: auto" class="np-w-br-12"
                                        style="width: 250px; min-height: 322px;">
                                        <div id="np-first-state" style="display: block;">
                                            <div id="np-tracking-logo"></div>
                                            <div id="np-title">
                                                <div class="np-h1"> <span class="np-h1-span1">ВІДСТЕЖЕННЯ</span>
                                                    <br> <span class="np-h1-span2">ПОСИЛОК</span>
                                                </div>
                                            </div>
                                            @if ($orders->status == 'Заказ отправлен' || $orders->status == 'заказ выполнен')
                                                <div id="np-input-container">
                                                    <div id="np-clear-input" style="display: none;"></div>
                                                    <input id="np-user-input" type="text" name="number"
                                                        placeholder="Номер посилки" value="{{$orders->trackCode}}">
                                                </div>
                                            @else
                                                <div id="np-input-container">
                                                    <div id="np-clear-input" style="display: none;"></div>
                                                    <input id="np-user-input" type="text" name="number"
                                                        placeholder="Номер посилки">
                                                </div>
                                            @endif
                                            <div id="np-warning-message"
                                                style="background: url(&quot;https://apimgmtstorelinmtekiynqw.blob.core.windows.net/content/MediaLibrary/Widget/img/line.png&quot;) center center repeat-x;">
                                            </div> <button id="np-submit-tracking" type="button"
                                                style="cursor: not-allowed; background-color: rgb(209, 213, 218); border: 1px solid rgb(196, 196, 196);"
                                                disabled=""> <span id="np-text-button-tracking"
                                                    style="display: block;">ВІДСТЕЖИТИ</span>
                                                <div id="np-load-image-tracking" style="visibility: hidden;"></div>
                                            </button>
                                            <div id="np-error-status"></div>
                                        </div>
                                        <div id="np-second-state" style="display: none;">
                                            <div id="np-status-icon"><img
                                                    src="https://apimgmtstorelinmtekiynqw.blob.core.windows.net/content/MediaLibrary/Widget/img/processing.png"
                                                    alt="error icon"></div>
                                            <div id="np-status-message">Замовлення №20450513409731 готується до відправлення
                                            </div>
                                            <div class="np-track-mini-logo">
                                                <div class="np-line-right"></div>
                                                <div class="np-line-left"></div>
                                            </div> <a
                                                href="https://novaposhta.ua/tracking/?cargo_number=20450513409731&amp;yt0=?utm_source=tracking&amp;utm_medium=widget&amp;utm_term=tracking&amp;utm_content=tracking&amp;utm_campaign=NP"
                                                id="np-more" target="_blank">Детальніше на сайті</a>
                                            <div id="np-return-button"> <span id="np-return-button-span">Інша посилка</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

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
    <link rel='stylesheet'
        href='https://apimgmtstorelinmtekiynqw.blob.core.windows.net/content/MediaLibrary/Widget/Tracking/styles/tracking.css' />
@endsection
@section('footer')

    <script type='text/javascript' id='track' charset='utf-8' data-lang='ru' apiKey='d371e5b7749285cd62c44f7d6b744ef9'
        data-town='city-not-default' data-town-name='undefined' data-town-id='undefined'
        src='https://apimgmtstorelinmtekiynqw.blob.core.windows.net/content/MediaLibrary/Widget/Tracking/dist/track.min.js'>
    </script>

    <script>
        $('.trackCode').hide()

        var status = $('.status').html()

        if (status == 'Заказ отправлен' || status == 'заказ выполнен') {
            $('.trackCode').show()
        } else {
            $('.trackCode').hide()
        }
    </script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
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
    <script type='text/javascript' id='track' charset='utf-8' data-lang='ua' apiKey='d371e5b7749285cd62c44f7d6b744ef9 ' data-town='city-not-default' data-town-name='undefined' data-town-id='undefined' src='https://apimgmtstorelinmtekiynqw.blob.core.windows.net/content/MediaLibrary/Widget/Tracking/dist/track.min.js'></script>

@endsection
@section('head')
    <link rel="stylesheet" type="text/css" href="/assets/plugins/datatables/datatables.min.css" />
    <link rel='stylesheet' href='https://apimgmtstorelinmtekiynqw.blob.core.windows.net/content/MediaLibrary/Widget/Tracking/styles/tracking.css' />

@endsection
