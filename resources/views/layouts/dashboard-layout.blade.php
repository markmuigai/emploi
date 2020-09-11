<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    @include('components.meta')
    @include('feed::links')
    <!-- Page Title -->
    <title>@yield('title')</title>
    <!-- Favicon -->

    <!-- Load Screen Scripts -->
    <!-- <script type="text/javascript">
        window.addEventListener("load", function() {
            var load_screen = document.getElementById("load_screen");
            document.body.removeChild(load_screen);
        });
    </script> -->

    <!-- STYLESHEETS -->
    <!-- Bootstrap -->
    <link  rel="preload, stylesheet" as="style" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700&display=swap" rel="stylesheet">

    <!--Font Awesome-->
    <!-- <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet"> -->
    <!-- ChartJS -->
    <link  rel="preload, stylesheet" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css" />
    <!-- Slick JS -->
    <link  rel="preload, stylesheet" as="style" type="text/css" href="{{asset('css/slick.css')}}" />
    <link  rel="preload, stylesheet" as="style" type="text/css" href="{{asset('css/slick-theme.css')}}" />
    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css"> -->
    <link  rel="preload, stylesheet" as="style" href="{{asset('css/bootstrap-select.min.css')}}">

    <!-- Custom CSS -->
    <link  rel="preload, stylesheet" as="style" href="{{asset('css/main.css')}}">


    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper -->
    <script src="{{asset('js/popper.min.js')}}" charset="utf-8"></script>
    <!-- Bootstrap -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/011a16deb1.js" crossorigin="anonymous"></script>
    <!-- Succinct JS -->
    <script src="{{asset('js/jQuery.succinct.min.js')}}"></script>
    <!-- <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script> -->
    <!-- Notify JS Notifications -->
    <script type="text/javascript" src="{{asset('js/notify.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/emploi-notify.js')}}"></script>
    <!-- Latest compiled and minified JavaScript -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script> -->
    <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
    <!-- Slick JS -->
    <script src="{{asset('js/slick.min.js')}}"></script>
    <!-- Custom JS -->
    <script src="{{asset('js/custom.js')}}"></script>
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-W7QXPST');</script>
<!-- End Google Tag Manager -->
</head>

<body>
    <!-- LOAD SCREEN -->
    <!-- <div id="load_screen">
        <div id="loading">
            <h1>Loading...</h1>
        </div>
    </div> -->
    <!-- END OF LOAD SCREEN -->

    <header>
        <!-- NAVBAR -->
        @include('components.navbar')
        <!-- END OF NAVBAR -->
    </header>
    <!-- MAIN CONTENT  -->

    <!-- MAIN CONTENT FOR EMPLOYER -->
    <main>
        <!-- SIDEBAR -->
        <div class="container pb-4">
            <div class="row pt-5">
                <div class="col-md-3 d-md-block d-none">
                    <div class="sidebar">
                        <!-- EMPLOYER SIDEBAR -->
                        @if( isset(Auth::user()->id) && Auth::user()->role == 'employer' )
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-home-tab" href="/employers/dashboard" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard <i class="fas fa-chevron-right"></i></a>
                            <a class="nav-link" id="v-pills-messages-tab" href="/profile" role="tab" aria-controls="v-pills-messages" aria-selected="false">Profile <i class="fas fa-chevron-right"></i></a>
                            <a class="nav-link" id="v-pills-profile-tab" href="/employers/jobs" role="tab" aria-controls="v-pills-profile" aria-selected="false">Jobs <i class="fas fa-chevron-right"></i></a>
                            <a class="nav-link" id="v-pills-messages-tab" href="/employers/browse" role="tab" aria-controls="v-pills-messages" aria-selected="false">Browse Candidates <i class="fas fa-chevron-right"></i></a>
                            <a class="nav-link" id="v-pills-messages-tab" href="/employers/saved" role="tab" aria-controls="v-pills-messages" aria-selected="false">Saved Profiles <i class="fas fa-chevron-right"></i></a>
                            <a class="nav-link" id="v-pills-messages-tab" href="/employers/paas-dash" role="tab" aria-controls="v-pills-messages" aria-selected="false">PAAS <i class="fas fa-chevron-right"></i></a>
                            <a class="nav-link" id="v-pills-messages-tab" href="/employers/cv-requests" role="tab" aria-controls="v-pills-messages" aria-selected="false">Requested Profiles <i class="fas fa-chevron-right"></i></a>

                            <!-- <a class="nav-link" id="v-pills-settings-tab" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Test Center <i class="fas fa-chevron-right"></i></a> -->
                            <!-- <a class="nav-link" id="v-pills-reviews-tab" href="/employers/reviews" role="tab" aria-controls="v-pills-reviews" aria-selected="false">Reviews <i class="fas fa-chevron-right"></i></a> -->
                        </div>
                        <!-- END OF EMPLOYER SIDEBAR -->

                        <!-- JOB SEEKER SIDEBAR -->
                        @elseif( isset(Auth::user()->id) && Auth::user()->role == 'seeker' )
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-home-tab" href="/job-seekers/dashboard" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard <i class="fas fa-chevron-right"></i></a>
                            <a class="nav-link" id="v-pills-messages-tab" href="/profile" role="tab" aria-controls="v-pills-messages" aria-selected="false">Profile <i class="fas fa-chevron-right"></i></a>
                            <a class="nav-link" id="v-pills-messages-tab" href="/vacancies" role="tab" aria-controls="v-pills-messages" aria-selected="false">Vacancies <i class="fas fa-chevron-right"></i></a>
                            <a class="nav-link" id="v-pills-messages-tab" href="/profile/applications" role="tab" aria-controls="v-pills-messages" aria-selected="false">Applications <i class="fas fa-chevron-right"></i></a>
                            <a class="nav-link" id="v-pills-messages-tab" href="/profile/referees" role="tab" aria-controls="v-pills-messages" aria-selected="false">Referees <i class="fas fa-chevron-right"></i></a>
                        </div>
                        <!-- END OF JOB SEEKER SIDEBAR -->

                        <!-- ADMIN SIDEBAR -->
                        @elseif( isset(Auth::user()->id) && Auth::user()->role == 'admin' )

                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-home-tab" href="/admin/panel" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard <i class="fas fa-chevron-right"></i></a>
                            <a class="nav-link" id="v-pills-messages-tab" href="/admin/posts" role="tab" aria-controls="v-pills-messages" aria-selected="false">Job Posts <i class="fas fa-chevron-right"></i></a>
                            <a class="nav-link" id="v-pills-messages-tab" href="/admin/username/jobs" role="tab" aria-controls="v-pills-messages" aria-selected="false">Emploi Profile <i class="fas fa-chevron-right"></i></a>
                            <a class="nav-link" id="v-pills-messages-tab" href="/admin/blog" role="tab" aria-controls="v-pills-messages" aria-selected="false">Blogs <i class="fas fa-chevron-right"></i></a>
                            <a class="nav-link" id="v-pills-messages-tab" href="/admin/emails" role="tab" aria-controls="v-pills-messages" aria-selected="false">Send emails <i class="fas fa-chevron-right"></i></a>
                            <a class="nav-link" id="v-pills-messages-tab" href="/admin/invoices" role="tab" aria-controls="v-pills-messages" aria-selected="false">Invoices <i class="fas fa-chevron-right"></i></a>
                            <a class="nav-link" id="v-pills-messages-tab" href="/admin/paas-applications" role="tab" aria-controls="v-pills-messages" aria-selected="false">Paas Applications <i class="fas fa-chevron-right"></i></a>
                        </div>

                        <!-- END OF ADMIN SIDEBAR -->

                        <!-- GUEST SIDEBAR -->
                        @else
                        @include('components.social-auth')
                        <br>
                        <div class="card">
                            <div class="card-body text-center">
                                
                                <a href="/join" class="btn btn-orange">{{ __('auth.register') }}</a>
                                <h6 class="mt-3">- Have An Account -</h6>
                                <a href="/login" class="btn btn-orange-alt">{{ __('auth.login') }}</a>

                                
                            </div>
                        </div>
                        <!-- END OF GUEST SIDEBAR -->
                        @endif



                        @if( isset(Auth::user()->id) && Auth::user()->role == 'employer' )

                        <!-- ADD JOB AS AN EMPLOYER -->
                        <div class="mt-3">
                            <a href="/vacancies/create" class="btn btn-orange" id="postAlt" dusk="create-new-post"><i class="fas fa-plus"></i> Post A Job</a>
                        </div>
                        <!-- END OF ADD JOB AS AN EMPLOYER -->

                        @elseif( isset(Auth::user()->id) && Auth::user()->role == 'seeker' )

                        <!-- APPLY FOR A JOB AS A SEEKER -->
                        <div class="mt-3">
                            <a href="/vacancies" class="btn btn-orange" id="postAlt"><i class="fas fa-plus"></i> Apply For A Job</a>
                        </div>
                        <!-- END OF APPLY FOR A JOB AS A SEEKER -->
                        @endif

                    </div>
                </div>
                <!-- END OF SIDEBAR FOR EMPLOYERS -->
                <div class="col-md-9 col-12 align-items-center">
                    <!-- ADD JOB AS AN EMPLOYER -->
                    <div id="postJob" class="mb-2">
                        <h2>@yield('page_title')</h2>
                        

                        <div class="row">
                            @if(isset(Auth::user()->id) && Auth::user()->role == 'employer' && Auth::user()->employer->isOnPaas())
                            <a href="/inbox" class="btn btn-purple mr-1" dusk="create-new-post"><i class="fas fa-comments"></i> Messages</a>
                            @endif
                            
                            @if( isset(Auth::user()->id) && Auth::user()->role == 'employer' )
                            <a href="/vacancies/create" class="btn btn-orange" dusk="create-new-post"><i class="fas fa-plus"></i> Post A Job</a>

                            @elseif( isset(Auth::user()->id) && Auth::user()->role == 'seeker' )
                            <a href="/vacancies" class="btn btn-orange"><i class="fas fa-plus"></i> Apply For A Job</a>

                            @elseif( isset(Auth::user()->id) && Auth::user()->role == 'admin' )
                            <h3>
                                <span class="badge badge-secondary">
                                    {{ Auth::user()->jurisdictions[0]->country->name }}
                                </span>
                            </h3>
                            @endif
                        </div>
                        
                    </div>
                    
                    <!-- END OF ADD JOB AS AN EMPLOYER -->
                    @yield('content')
                </div>

            </div>
        </div>
    </main>                      
        

    <!-- END OF MAIN CONTENT FOR EMPLOYER -->
<!--     <div style="text-align: right;">
           <div class="" aria-orientation="horizontal">
            <a href="https://www.facebook.com/emploi.co/" target="_blank" rel="noreferrer">
                <span style="display: none">Follow us on Facebook</span>
                <i class="fa fa-facebook" style="color: #3b5998; font-size: 30px"></i>
            </a>
            <a href="https://twitter.com/emploiafrica" target="_blank" rel="noreferrer">
                <span style="display: none">Follow us on Twitter</span>
                <i class="fab fa-twitter" style="color:  #00acee; font-size: 30px"></i>
            </a>
            <a href="https://ke.linkedin.com/company/emploike" target="_blank" rel="noreferrer">
                <span style="display: none">Follow us on LinkedIn</span>
                <i class="fab fa-linkedin-in" style="color: #0e76a8; font-size: 30px"></i>
            </a>
            <a href="https://instagram.com/emploi.co" target="_blank" rel="noreferrer">
                <span style="display: none">Follow us on Instagram</span>
                <i class="fab fa-instagram" style="color:  #3f729b; font-size: 30px"></i>
            </a>
              <a href="https://www.youtube.com/channel/UC6pk7QBB_ezkJmLto-nk3yw" target="_blank" rel="noreferrer">
                <span style="display: none">Subscribe on Youtube</span>
                <i class="fab fa-youtube" style="color:  #c4302b; font-size: 30px"></i>
            </a>
        </div> 
    </div> -->
    @if( isset(Auth::user()->id) && Auth::user()->role == 'seeker' )
    @include('components.search-form')
    @endif

    @guest
    @include('components.search-form')
    @endguest

    @include('components.top-search')

    <!-- FOOTER -->
    @include('components.footer')
    <!-- END OF FOOTER -->

    <!-- INVITE FRIENDS -->
    @include('components.invite')
    <!-- END OF INVITE FRIENDS -->

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
</body>

</html>