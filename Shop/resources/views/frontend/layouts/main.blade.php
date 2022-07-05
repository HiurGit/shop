<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Biolife - Organic Food</title>
    <link href="https://fonts.googleapis.com/css?family=Cairo:400,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400i,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&amp;display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/frontend')}}/assets/images/favicon.png"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend')}}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend')}}/assets/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend')}}/assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend')}}/assets/css/nice-select.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend')}}/assets/css/slick.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend')}}/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend')}}/assets/css/main-color.css">

</head>
<body class="biolife-body">

    <!-- Preloader -->

    @include('frontend.layouts.preloader')
    <!-- HEADER -->
    @include('frontend.layouts.header')

    <!-- Page Contain -->

    @yield('home')
    <!-- FOOTER -->

    @include('frontend.layouts.footer')

    <!--Quickview Popup-->
    @include('frontend.layouts.quickview_popup')

    <!-- Scroll Top Button -->
    <a class="btn-scroll-top"><i class="biolife-icon icon-left-arrow"></i></a>

    <script src="{{ asset('public/frontend')}}/assets/js/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('public/frontend')}}/assets/js/bootstrap.min.js"></script>
    <script src="{{ asset('public/frontend')}}/assets/js/jquery.countdown.min.js"></script>
    <script src="{{ asset('public/frontend')}}/assets/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('public/frontend')}}/assets/js/jquery.nicescroll.min.js"></script>
    <script src="{{ asset('public/frontend')}}/assets/js/slick.min.js"></script>
    <script src="{{ asset('public/frontend')}}/assets/js/biolife.framework.js"></script>
    <script src="{{ asset('public/frontend')}}/assets/js/functions.js"></script>
</body>

</html>
