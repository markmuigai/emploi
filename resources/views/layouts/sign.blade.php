<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('feed::links')
    <meta name="description" content="@yield('description')" />
    <!-- Page Title -->
    <title>@yield('title')</title>
    @include('components.meta')

    <!-- STYLESHEETS -->
    <!-- Bootstrap -->
    <link rel="preload, stylesheet" as="style" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700&display=swap" rel="stylesheet">

    <!--Font Awesome-->
    <!-- <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet"> -->
    <!-- Custom CSS -->
    <link rel="preload, stylesheet" as="style" href="{{asset('css/main.css')}}">

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper -->
    <script src="{{asset('js/popper.min.js')}}" charset="utf-8"></script>
    <!-- Bootstrap -->
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/011a16deb1.js" crossorigin="anonymous"></script>
    <!-- <script src="{{asset('js/jquery.fontawesome.js')}}"></script> -->
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Notify JS Notifications -->
    <script type="text/javascript" src="{{asset('js/notify.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/emploi-notify.js')}}"></script>
    <!-- Custom JS -->
    <script src="{{asset('js/custom.js')}}"></script>
</head>

<body>
    <header>
        <!-- NAVBAR -->
        <nav class="navbar fixed-top navbar-expand-lg">
            <div class="container">
                <div class="d-flex justify-content-start">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fas fa-bars"></span>
                    </button>
                    <a class="navbar-brand" href="/"><img src="{{ asset('images/logo-alt.png') }}" alt="Emploi Logo" /></a>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mr-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/vacancies">Vacancies</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/blog">Career Center</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/employers/publish">Advertise</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="modal" data-target="#searchModal"><i class="fas fa-search"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END OF NAVBAR -->
    </header>
    <!-- MAIN CONTENT FOR EMPLOYER -->
    <main class="sign-page mt-3 pb-5">
        <div class="row justify-content-center">
            @if($agent->isMobile())
            <div class="col-md-12">
                @yield('content')
            </div>
                
            @else            
                <div class="col-md-8 d-flex justify-content-center">
                    <div style="width: 728px;">
                        @yield('content')
                    </div>
                </div>
            @endif
        </div>
    </main>
    <!-- END OF MAIN CONTENT FOR EMPLOYER -->
    <!-- FOOTER -->
    <div class="sign-copy">
        <p>Copyright &copy; {{ date('Y') }} Emploi . All Rights Reserved </p>
    </div>
    <!-- END OF FOOTER -->

    <!-- INVITE FRIENDS -->
    @include('components.invite')
    <!-- END OF INVITE FRIENDS -->
    @include('components.search-modal')

    {{--@include('cookieConsent::index')--}}
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
</body>

</html>
