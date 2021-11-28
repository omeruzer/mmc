<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('desc')">
    <meta name="keywords" content="@yield('keyw')">
    <meta name="author" content="{{$set->author}}">
    <link rel="shortcut icon" href="/assets/images/logo/{{$set->favicon}}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <title>@yield('title')</title>

    <!-- Font Awesome CSS -->
    <link href="/assets/font-awesome/css/all.css" rel="stylesheet" type="text/css" />

    <!-- Favicons-->
    <link rel="apple-touch-icon" type="image/x-icon" href="/assets/front/img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="/assets/front/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="/assets/front/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="/assets/front/img/apple-touch-icon-144x144-precomposed.png">
	
    <!-- GOOGLE WEB FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="/assets/front/css/bootstrap.custom.min.css" rel="stylesheet">
    <link href="/assets/front/css/style.css" rel="stylesheet">

	<!-- SPECIFIC CSS -->
    <link href="/assets/front/css/home_1.css" rel="stylesheet">

    <link href="/assets/front/css/listing.css" rel="stylesheet">
    	<!-- SPECIFIC CSS -->
        <link href="/assets/front/css/product_page.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="/assets/front/css/custom.css" rel="stylesheet">

    @yield('head')

</head>

<body>
	
	<div id="page">
		
        @include('front.layouts.header')

        <!-- /header -->
            
        @yield('content')   
        <!-- /content -->
            
        @include('front.layouts.footer')
        <!--/footer-->
	</div>
	<!-- page -->
	
	<div id="toTop"></div><!-- Back to top button -->
	
	<!-- COMMON SCRIPTS -->
    <script src="/assets/front/js/common_scripts.min.js"></script>
    <script src="/assets/front/js/main.js"></script>
  
    <!-- SPECIFIC SCRIPTS -->
    <script  src="/assets/front/js/carousel_with_thumbs.js"></script>

	
	<!-- SPECIFIC SCRIPTS -->
	<script src="/assets/front/js/carousel-home.min.js"></script>
    @yield('footer')
</body>
</html>