@extends('admin.layouts.master')
@section('title','İstatistikler')
@section('content')
<div class="content">

    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">İstatistikler</h1>
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


        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="far fa-check-square"></i> En Çok Görüntülenen Ürünler</h3>
                </div>
    
                <div class="card-body">
                    <canvas id="productHit"></canvas>
                </div>
            </div><!-- end card-->
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="far fa-check-square"></i> En Az Görüntülenen Ürünler</h3>
                </div>
    
                <div class="card-body">
                    <canvas id="productBad"></canvas>
                </div>
            </div><!-- end card-->
        </div>


    </div>
    <!-- END container-fluid -->

</div>
@endsection
@section('footer')
<script src="\assets\plugins\chart.js\Chart.min.js"></script>
<script src="\assets\plugins\chart.js\ui-chartjs.js"></script>
@php
    $labels = "";
    $data = "";
    foreach ($productHits as $productHit) {
        $labels .= "\"$productHit->name\",";
        $data   .=  "$productHit->hit,"; 
    }
@endphp
<script>

    // En Çok Okunanlar
    var ctxBar = document.getElementById("productHit").getContext("2d");
    var bestpost = new Chart(ctxBar, {
        type: 'line',
        data: {
            labels: [{!!$labels!!}],
            datasets: [{
                label: 'Okunma Sayısı',
                borderColor: chartColors.blue,
                data: [{!!$data!!}]

            }]
        },
    });

</script>

@php
    $labels = "";
    $data = "";
    foreach ($productBads as $productBad) {
        $labels .= "\"$productBad->name\",";
        $data   .=  "$productBad->hit,"; 
    }
@endphp
<script>

    // En Çok Okunanlar
    var ctxBar = document.getElementById("productBad").getContext("2d");
    var bestpost = new Chart(ctxBar, {
        type: 'line',
        data: {
            labels: [{!!$labels!!}],
            datasets: [{
                label: 'Okunma Sayısı',
                borderColor: 'rgba(71,198,142,255)',
                data: [{!!$data!!}]
            }] 
        },
    });

</script>

@endsection