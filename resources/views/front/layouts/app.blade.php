<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Ipda3 Tech') }}</title>



        <!-- Fonts -->

        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700&display=swap" rel="stylesheet">
        <!-- Bootstrap 4 RTL -->
    {{--<link rel="stylesheet" href="{{ asset('adminlte/css/bootstrap-rtl/bootstrap-rtl.min.css') }}">--}}

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('front/css/bootstrap/bootstrap.min.css') }}">

        <!-- FontAwesome CSS -->
        <link rel="stylesheet" href="{{ asset('front/css/font-awesome/all.min.css') }}">

        <!-- Hover CSS -->
        <link rel="stylesheet" href="{{ asset('front/css/hover/hover-min.css') }}">

        <!--Owl Carousel Css-->
        <link rel="stylesheet" href="{{ asset('front/css/owl-carousel/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('front/css/owl-carousel/owl.theme.default.min.css') }}">

        <!--    style css-->
        <link rel="stylesheet" href="{{ asset('front/css/pages/index.css') }}">
        <link rel="stylesheet" href="{{ asset('front/css/pages/media.css') }}">
        <style>
            footer {
                background-image: url("{{ asset('front/imgs/footer.jpg') }}");
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


        <!-- Scripts -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ asset('front/js/jquery.min.js') }}"></script>
        <script src="{{ asset('front/js/popper.min.js') }}"></script>
        <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>

        <!--FontAwesome Js-->
        <script src="{{ asset('front/js/fontawesome.min.js') }}"></script>

        <!-- 3d-carousel -->
        <script src="{{ asset('plugin/3d-carousel/jquery.waterwheelCarousel.min.js') }}"></script>

        <!--Owl Carousel Js-->
        <script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>

        <!--App Js-->
        <script src="{{ asset('front/js/app.js') }}"></script>

        @yield('script')
    </body>
</html>
