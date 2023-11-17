<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>{{ config('app.name') }} - @yield('title')</title>
    <!-- Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="handheldfriendly" content="true">
    <meta name="MobileOptimized" content="width">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('bootstrap/dist/images/logos/favicon.ico') }}">
    <!-- Core Css -->
    <link id="themeColors" rel="stylesheet" href="{{ asset('bootstrap/dist/css/style.min.css') }}">
    @stack('styles')
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset('bootstrap/dist/images/logos/daao.png') }}" alt="loader" class="lds-ripple img-fluid">
    </div>
    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="horizontal" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        @yield('content')
    </div>

    <!-- Import Js Files -->
    <script src="{{ asset('bootstrap/dist/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- core files -->
    <script src="{{ asset('bootstrap/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('bootstrap/dist/js/custom.js') }}"></script>
    @stack('scripts')
</body>

</html>
