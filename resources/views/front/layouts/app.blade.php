<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ipda3 Tech') }}</title>


    <link href="{{ asset($setting->site_icon) }}" rel="icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('plugin/bootstrap-rtl/bootstrap-rtl.min.css') }}">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="{{ asset('plugin/fontAwesome/css/all.min.css') }}">

    <!-- Hover CSS -->
    <link rel="stylesheet" href="{{ asset('plugin/hover/hover-min.css') }}">

    <!--Owl Carousel Css-->
    <link rel="stylesheet" href="{{ asset('plugin/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugin/owl-carousel/owl.theme.default.min.css') }}">

    <!--    style css-->
    <link rel="stylesheet" href="{{ asset('front/css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/media.css') }}">
    <style>
        footer {
            background-image: url("{{ asset('images/footer.jpg') }}");
        }
    </style>
    @yield('style')
</head>
<body>
<div id="app">
    @include('front.includes.navbar')

    <main>
        @yield('content')
    </main>

    @include('front.includes.footer')
</div>


<!-- App js, jquery, popper -->
<script src="{{ asset('js/app.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugin/bootstrap-rtl/bootstrap.min.js') }}"></script>

<!--FontAwesome Js-->
<script src="{{ asset('plugin/fontAwesome/fontawesome.min.js') }}"></script>

<!-- 3d-carousel -->
<script src="{{ asset('plugin/3d-carousel/jquery.waterwheelCarousel.min.js') }}"></script>

<!--Owl Carousel Js-->
<script src="{{ asset('plugin/owl-carousel/owl.carousel.min.js') }}"></script>

<!--App Js-->
<script src="{{ asset('front/js/app.js') }}"></script>

@yield('script')
</body>
</html>
