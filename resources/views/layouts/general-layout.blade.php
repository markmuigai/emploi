<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('title')</title>
    @include('components.meta')
    <!-- STYLESHEETS -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" rel="preload">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700&display=swap" rel="stylesheet">
    <!--Font Awesome-->
    <!-- <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet"> -->
    <!-- ChartJS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css"  rel="preload"/>
    <!-- Slick JS -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick.css')}}"  rel="preload"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick-theme.css')}}"  rel="preload"/>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/main.css')}}" rel="preload">

    <!-- JQuery -->
    <script src="{{asset('js/jquery-3.4.1.min.js')}}" charset="utf-8"></script>

</head>
<body>
       
   <!-- LOAD SCREEN -->
    <!-- <div id="load_screen">
      <div id="loading">
        <div class="dot"></div>
        <h1>Loading</h1>
      </div>
    </div> -->

    <!-- END OF LOAD SCREEN -->

    <header>
        <!-- NAVBAR -->
        @include('components.navbar')
        <!-- END OF NAVBAR -->
    </header>
    <!-- MAIN CONTENT  -->

    {{--@if(is_null(\Route::current()->getName()))--}}
    <main>
        @yield('content')
    </main>
    {{--@endif--}}
    <!-- END OF MAIN CONTENT -->

    <!-- TOP SEARCHES -->
    @if(Request::is('/'))
    @else
    @include('components.top-search')
    @endif

    <!-- END OF TOP SEARCHES -->

    <!-- FOOTER -->
    @include('components.footer')
    <!-- END OF FOOTER -->

    <!-- INVITE FRIENDS -->
    @include('components.invite')
    <!-- END OF INVITE FRIENDS -->

    @include('cookieConsent::index')

    <!-- INLINE SCRIPTS -->
    <script type="text/javascript">
        // Post a Job Alternative
        var isVisible = false;
        $(window).scroll(function() {
            var shouldBeVisible = $(window).scrollTop() > 70;
            if (shouldBeVisible && !isVisible) {
                isVisible = true;
                $('#postAlt').fadeIn();
            } else if (isVisible && !shouldBeVisible) {
                isVisible = false;
                $('#postAlt').fadeOut();
            }
        });

        // Changing Active
        $('.nav-pills .nav-link.active').removeClass('active');
        $('a[href="' + location.pathname + '"]').closest('.nav-pills .nav-link').addClass('active');

        // Changing Active for Navbar
        $('.navbar-nav .nav-link.active').removeClass('active');
        $('a[href="' + location.pathname + '"]').closest('.navbar-nav .nav-link').addClass('active');
    </script>
    @include('components.tawk')

    <script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@12.4.0/dist/lazyload.min.js"></script>
    <script type="text/javascript">
        var lazyLoadInstance = new LazyLoad({
            elements_selector: ".lazy"
            // ... more custom settings?
        });
        lazyLoadInstance.update();
    </script>
    @include('components.onesignal')
    @include('components.vue')
    <script src="{{ asset('js/online-monitor-2.js') }}" async="" defer=""></script>
    @include('components.exit-popup')

    <!-- SCRIPTS -->
    
    <!-- Popper -->
    <script src="{{asset('js/popper.min.js')}}" charset="utf-8" ></script>
    <!-- Bootstrap -->
    <script src="{{asset('js/bootstrap4.min.js')}}" charset="utf-8"  async defer></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/011a16deb1.js" crossorigin="anonymous"  async defer></script>
    <!-- <script src="{{asset('js/jquery.fontawesome.js')}}"></script> -->
    <!-- CountUp JS -->
    <script src="{{asset('js/jquery.countup.js')}}" ></script>
    <!-- Succinct JS -->
    <script src="{{asset('js/jQuery.succinct.min.js')}}" ></script>
    <!-- <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script> -->
    <!-- Notify JS Notifications -->
    <script src="{{asset('js/notify.min.js')}}" ></script>
    <script src="{{asset('js/emploi-notify.js')}}" ></script>
    <!-- Slick JS -->
    <script src="{{asset('js/slick.min.js')}}"></script>
    <!-- Custom JS -->
    <script src="{{asset('js/custom.js')}}" ></script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0"></script>
</body>
 
</html>
