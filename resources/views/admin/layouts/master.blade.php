<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') | Yönetim Paneli </title>
    <meta name="description" content="Dashboard | Nura Admin">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Your website">
    
    <link rel="stylesheet" href="/../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="/../../plugins/sweetalert/sweetalert.css">
    
    <!-- Favicon -->
            
    <!-- Bootstrap CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- Font Awesome CSS -->
    <link href="/assets/font-awesome/css/all.css" rel="stylesheet" type="text/css" />

    <!-- Custom CSS -->
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css" />

    <!-- BEGIN CSS for this page -->
    <link rel="stylesheet" type="text/css" href="/assets/plugins/chart.js/Chart.min.css" />
    <link rel="stylesheet" type="text/css" href="/assets/plugins/datatables/datatables.min.css" />
    <!-- END CSS for this page -->
    @yield('head')
    <link rel="shortcut icon" href="/assets/images/logo/{{$set->favicon}}" type="image/x-icon">
</head>

<body class="adminbody">

    <div id="main">

        @include('admin.layouts.partials.navbar')


        @include('admin.layouts.partials.sidebar')


        <div class="content-page">


            @yield('content')



        </div>
        <!-- END content-page -->

        @include('admin.layouts.partials.footer')
        @yield('footer')