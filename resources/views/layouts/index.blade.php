<!doctype html>
<html lang="en">

<head>
    <title>{{setting('site.title')}} @yield('page_title')</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="utf-8">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="/css/base.css">
    <link rel="stylesheet" href="/css/vendor.css">
    <link rel="stylesheet" href="/css/main.css">

    @yield('css')
    <!-- script
    ================================================== -->
    <script src="/js/modernizr.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/svg" sizes="32x32" href="/favicon-32x32.svg">
    <link rel="icon" type="image/svg" sizes="16x16" href="/favicon-16x16.svg">
    <link rel="manifest" href="/site.webmanifest">
</head>

<body>
    <div id="preloader">
        <div id="loader" class="dots-fade">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <div id="top" class="s-wrap site-wrapper">
        @include('partials.header')
        <!-- END header -->

        @yield('container')

        @include('partials.footer')

        <!-- END footer -->
    </div> <!-- end s-wrap -->
    <!-- loader -->
    <!-- Java Script
    ================================================== -->
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/js/plugins.js"></script>
    <script src="/js/main.js"></script>
    @yield('js')
</body>

</html>
