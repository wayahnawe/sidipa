<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Title -->

    <title>SIDIPA - @yield('title')</title>


    <!-- Required Meta Tag -->

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="handheldfriendly" content="true">
    <meta name="MobileOptimized" content="width">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('bootstrap/dist/images/logos/favicon.ico') }}">
    {{-- <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/datatable/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/datatable/fixedHeader.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/datatable/responsive.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/style.min.css') }}">
    @stack('styles')
    {{-- <style>
        table{
            margin: 0 auto;
            width: 100%;
            clear: both;
            border-collapse: collapse;
            /* table-layout: fixed; // ***********add this
            word-wrap:break-word; // ***********and this */
        }
    </style> --}}
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset('bootstrap/dist/images/logos/daao.png') }}" alt="loader" class="lds-ripple img-fluid">
    </div>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <aside class="left-sidebar">
            @include('layouts.dashboard.__content__.sidebar')
        </aside>

        <div class="body-wrapper">
            @include('layouts.dashboard.__content__.header')
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{ asset('bootstrap/dist/js/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('bootstrap/dist/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('bootstrap/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('bootstrap/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('bootstrap/dist/js/app.minisidebar.init.js') }}"></script>
    <script src="{{ asset('bootstrap/dist/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('bootstrap/dist/js/custom.js') }}"></script>
    <script src="{{ asset('bootstrap/dist/js/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bootstrap/dist/js/datatable/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('bootstrap/dist/js/datatable/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('bootstrap/dist/js/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('bootstrap/dist/js/datatable/responsive.bootstrap.min.js') }}"></script>
    <script src="{{ asset('bootstrap/dist/js/plugins/toastr-init.js') }}"></script>

    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-center",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "50",
            "hideDuration": "50",
            // "timeOut": "60000",
            // "extendedTimeOut": "60000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
    </script>
    @stack('scripts')
</body>

</html>
