<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Page') }} {{ $title ? ' - ' . $title : '' }}</title>

    <link rel="apple-touch-icon" href="{{ asset('/') }}vuexy-template/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/') }}assets/images/application/favicon.jpg">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}vuexy-template/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}vuexy-template/app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}vuexy-template/app-assets/vendors/css/extensions/tether-theme-arrows.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}vuexy-template/app-assets/vendors/css/extensions/tether.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}vuexy-template/app-assets/vendors/css/extensions/shepherd-theme-default.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}vuexy-template/app-assets/vendors/css/tables/datatable/datatables.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}vuexy-template/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}vuexy-template/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}vuexy-template/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}vuexy-template/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}vuexy-template/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}vuexy-template/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}vuexy-template/app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}vuexy-template/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}vuexy-template/app-assets/css/pages/dashboard-analytics.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}vuexy-template/app-assets/css/pages/card-analytics.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}vuexy-template/app-assets/css/plugins/tour/tour.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}vuexy-template/css/style.css">
    <!-- END: Custom CSS-->

    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/css/my-style.css">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    @yield('style')

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu 2-columns  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns">
    <div id="app">

        <!-- BEGIN: Header-->
        @include('layouts.home.header')
        <!-- END: Header-->

        <!-- BEGIN: Main Menu-->
        @include('layouts.home.mainmenu')
        <!-- END: Main Menu-->

        <!-- BEGIN: Content-->
        @yield('content')
        <!-- END: Content-->

        <div class="sidenav-overlay"></div>
        <div class="drag-target"></div>

        <!-- BEGIN: Footer-->
        @include('layouts.home.footer')
        <!-- END: Footer-->

        <!-- BEGIN: Vendor JS-->
        <script src="{{ asset('/') }}vuexy-template/app-assets/vendors/js/vendors.min.js"></script>
        <!-- BEGIN Vendor JS-->

        <!-- BEGIN: Page Vendor JS-->
        <script src="{{ asset('/') }}vuexy-template/app-assets/vendors/js/ui/jquery.sticky.js"></script>
        <script src="{{ asset('/') }}vuexy-template/app-assets/vendors/js/charts/apexcharts.min.js"></script>
        <script src="{{ asset('/') }}vuexy-template/app-assets/vendors/js/extensions/tether.min.js"></script>
        <script src="{{ asset('/') }}vuexy-template/app-assets/vendors/js/extensions/shepherd.min.js"></script>
        <script src="{{ asset('/') }}vuexy-template/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
        <script src="{{ asset('/') }}vuexy-template/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
        <script src="{{ asset('/') }}vuexy-template/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
        <script src="{{ asset('/') }}vuexy-template/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
        <script src="{{ asset('/') }}vuexy-template/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
        <script src="{{ asset('/') }}vuexy-template/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
        <script src="{{ asset('/') }}vuexy-template/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
        <script src="{{ asset('/') }}vuexy-template/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
        <!-- END: Page Vendor JS-->

        <!-- BEGIN: Theme JS-->
        <script src="{{ asset('/') }}vuexy-template/app-assets/js/core/app-menu.js"></script>
        <script src="{{ asset('/') }}vuexy-template/app-assets/js/core/app.js"></script>
        <script src="{{ asset('/') }}vuexy-template/app-assets/js/scripts/components.js"></script>
        <!-- END: Theme JS-->

        <!-- BEGIN: Page JS-->
        <script src="{{ asset('/') }}vuexy-template/app-assets/js/scripts/pages/dashboard-analytics.js"></script>
        <script src="{{ asset('/') }}vuexy-template/app-assets/js/scripts/datatables/datatable.js"></script>
        <!-- END: Page JS-->

        <script src="{{ asset('/') }}assets/js/my-script.js"></script>

        @yield('script')

    </div>
</body>
<!-- END: Body-->

</html>
