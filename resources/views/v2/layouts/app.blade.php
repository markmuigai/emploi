<!DOCTYPE html>
<html lang="zxx">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap CSS --> 
        <link rel="stylesheet" href="{{asset('assets-v2/css/bootstrap.min.css')}}">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="{{asset('assets-v2/css/meanmenu.css')}}">
        <!-- Nice Select JS -->
        <link rel="stylesheet" href="{{asset('assets-v2/css/nice-select.css')}}">
        <!-- Boxicon CSS -->
        <link rel="stylesheet" href="{{asset('assets-v2/css/boxicons.min.css')}}">
        <!-- Flaticon CSS -->
        <link rel="stylesheet" href="{{asset('assets-v2/fonts/flaticon.css')}}">
        <!-- Popup CSS -->
        <link rel="stylesheet" href="{{asset('assets-v2/css/magnific-popup.css')}}">
        <!-- Odometer CSS -->
        <link rel="stylesheet" href="{{asset('assets-v2/css/odometer.css')}}">
        <!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="{{asset('assets-v2/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets-v2/css/owl.theme.default.min.css')}}">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="{{asset('assets-v2/css/animate.min.css')}}">
        <!-- Style CSS -->
        <link rel="stylesheet" href="{{asset('assets-v2/css/style.css')}}">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="{{asset('assets-v2/css/responsive.css')}}">

        <title>Welcome to Emploi - The Premier Online Job Placement Platform in Africa</title>

        <link rel="icon" sizes="512x512" href="{{ asset('images/favicon.png') }}">
    </head>
    <body>
        <!-- Preloader -->
        @include('v2.components.preloader')
        <!-- End Preloader -->

        <!-- Navbar -->
        @include('v2.components.guest.navbar')
        <!-- End Navbar -->

        @yield('content')

        <!-- Footer -->
        @include('v2.components.footer')
        <!-- End Footer -->

        <!-- Copyright -->
        @include('v2.components.copyright')
        <!-- End Copyright -->


        <!-- Essential JS -->
        <script src="{{asset('assets-v2/js/jquery-3.5.1.min.js')}}"></script>
        <script src="{{asset('assets-v2/js/popper.min.js')}}"></script>
        <script src="{{asset('assets-v2/js/bootstrap.min.js')}}"></script>
        <!-- Form Validator JS -->
        <script src="{{asset('assets-v2/js/form-validator.min.js')}}"></script>
        <!-- Contact JS -->
        <script src="{{asset('assets-v2/js/contact-form-script.js')}}"></script>
        <!-- Ajax Chip JS -->
        <script src="{{asset('assets-v2/js/jquery.ajaxchimp.min.js')}}"></script>
        <!-- Meanmenu JS -->
        <script src="{{asset('assets-v2/js/jquery.meanmenu.js')}}"></script>
        <!-- Nice Select JS -->
        <script src="{{asset('assets-v2/js/jquery.nice-select.min.js')}}"></script>
        <!-- Mixitup JS -->
        <script src="{{asset('assets-v2/js/jquery.mixitup.min.js')}}"></script>
        <!-- Popup JS -->
        <script src="{{asset('assets-v2/js/jquery.magnific-popup.min.js')}}"></script>
        <!-- Odometer JS -->
        <script src="{{asset('assets-v2/js/odometer.min.js')}}"></script>
        <script src="{{asset('assets-v2/js/jquery.appear.js')}}"></script>
        <!-- Owl Carousel JS -->
        <script src="{{asset('assets-v2/js/owl.carousel.min.js')}}"></script>
        <!-- Progressbar JS -->
        <script src="{{asset('assets-v2/js/progressbar.min.js')}}"></script>
        <!-- Custom JS -->
        <script src="{{asset('assets-v2/js/custom.js')}}"></script>
    </body>
</html>