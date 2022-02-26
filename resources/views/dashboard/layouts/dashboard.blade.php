<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ipda3 Tech @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugin/fontAwesome/css/all.min.css') }}">
    <!-- Hover Style -->
    <link rel="stylesheet" href="{{ asset('plugin/hover/hover-min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.min.css') }}">
    <!-- i-check style -->
    <link rel="stylesheet" href="{{ asset('plugin/icheck-bootstrap/blue.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Custom style for RTL -->
    <link rel="stylesheet" href="{{ asset('adminlte/css/custom.css') }}">
    <!-- Bootstrap 4 RTL -->
    <link rel="stylesheet" href="{{ asset('plugin/bootstrap-rtl/bootstrap-rtl.min.css') }}">
    <!-- App style -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Site Icon -->
    <link rel="icon" href="{{ asset($setting->site_icon) }}">
    @yield('style')
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<!-- Authentication Links -->
@guest
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
@else
    <div class="wrapper">
    @include("dashboard.includes.navbar")
    @include("dashboard.includes.sidebar")

    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="min-height: 1030.69px;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            @yield('breadcrumb')
                        </div>
                        <div class="col-sm-6">
                            <h1>@yield('page_title')</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            @include('dashboard.includes.messages')
            @yield('dashboard-content')
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer bg-dark">
            <strong>Copyright &copy; {{ date('Y') }} <a href="#">mo saber</a> .</strong>
            All rights reserved
            <div class="float-right d-none d-sm-inline-block">
                <b>ipda3 tech</b>
            </div>
        </footer>
    </div>
@endguest

<!-- ./wrapper -->

<!-- App js, jquery, popper -->
<script src="{{ asset('js/app.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugin/bootstrap-rtl/bootstrap.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/js/adminlte.min.js') }}"></script>
<!-- 3d-carousel -->
<script src="{{ asset('plugin/3d-carousel/jquery.waterwheelCarousel.min.js') }}"></script>
<!-- i-check -->
<script src="{{ asset('plugin/icheck-bootstrap/icheck.min.js') }}"></script>
<!-- scripts for admin pages -->
<script src="{{ asset('js/dashboard.js') }}"></script>
<script>
    $(function () {
        $('[data-tooltip="tooltip"]').tooltip()
    });
</script>
@yield('script')
</body>
</html>
