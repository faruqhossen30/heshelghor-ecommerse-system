<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>@yield('title')</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Riode - Ultimate eCommerce Template">
    <meta name="author" content="D-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/icons/favicon.png">

    <script>
        WebFontConfig = {
            google: { families: ['Poppins:400,500,600,700,800,900'] }
        };
        (function (d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = '{{asset('frontend')}}/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>


    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/vendor/animate/animate.min.css">

    <!-- Plugins CSS File -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/vendor/magnific-popup/magnific-popup.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/vendor/owl-carousel/owl.carousel.min.css">
    {{-- For push --}}
    @stack('styles')

    <!-- Main CSS File -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/css/demo3.min.css">
</head>

<body class="home">

    <div class="page-wrapper">
        <h1 class="d-none">Riode - Responsive eCommerce HTML Template</h1>
        <header class="header">
            {{-- Topbar --}}
            @include('frontend.layouts.topbar')
            {{-- Headeer --}}
            @include('frontend.layouts.searchbar')
            {{-- Menu --}}
            @include('frontend.layouts.menu')
        </header>
        <!-- End Header -->

        <!-- Start of Main/content -->
            @yield('content')
        <!-- End of Main/content -->

        @include('frontend.layouts.footer')


<!-- Plugins JS File -->
<script src="{{asset('frontend')}}/vendor/jquery/jquery.min.js"></script>
<script src="{{asset('frontend')}}/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="{{asset('frontend')}}/vendor/elevatezoom/jquery.elevatezoom.min.js"></script>
<script src="{{asset('frontend')}}/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

<script src="{{asset('frontend')}}/vendor/owl-carousel/owl.carousel.min.js"></script>
<script src="{{asset('frontend')}}/vendor/sticky/sticky.min.js"></script>
{{-- For stack --}}
@stack('scripts')

<!-- Main JS File -->
<script src="{{asset('frontend')}}/js/main.min.js"></script>
</body>

</html>
