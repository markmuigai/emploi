<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('title')</title>
    @include('components.meta')

    <!-- Load Screen Scripts -->
    <script type="text/javascript">
        window.addEventListener("load", function() {
            var load_screen = document.getElementById("load_screen");
            document.body.removeChild(load_screen);
        });
    </script>

    <!-- STYLESHEETS -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700,900&display=swap" rel="stylesheet">
    <!--Font Awesome-->
    <!-- <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet"> -->
    <!-- ChartJS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css" />
    <!-- Slick JS -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick-theme.css')}}" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/main.css')}}">


    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script async="async" src="{{asset('js/jquery-3.4.1.min.js')}}" charset="utf-8"></script>
    <!-- Popper -->
    <script async="async" src="{{asset('js/popper.min.js')}}" charset="utf-8"></script>
    <!-- Bootstrap -->
    <script async="async" src="{{asset('js/bootstrap4.min.js')}}" charset="utf-8"></script>
    <!-- Font Awesome -->
    <!-- <script async="async" src="https://kit.fontawesome.com/011a16deb1.js" crossorigin="anonymous"></script> -->
    <script async="async" src="{{asset('js/jquery.fontawesome.js')}}"></script>
    <!-- CountUp JS -->
    <script async="async" src="{{asset('js/jquery.countup.js')}}"></script>
    <!-- Succinct JS -->
    <script async="async" src="{{asset('js/jQuery.succinct.min.js')}}"></script>
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Notify JS Notifications -->
    <script async="async" src="{{asset('js/notify.min.js')}}"></script>
    <script async="async" src="{{asset('js/emploi-notify.js')}}"></script>
    <!-- Slick JS -->
    <script async="async" src="{{asset('js/slick.min.js')}}"></script>
    <!-- Custom JS -->
    <script async="async" src="{{asset('js/custom.js')}}"></script>
</head>

<body>
    <!-- LOAD SCREEN -->
    <div id="load_screen">
        <div id="loading">
            <h1>Loading...</h1>
        </div>
    </div>
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
    <div class="prompts">
        <button type="button" name="button" class="invite" data-toggle="modal" data-target="#inviteFriends"><i class="fas fa-user-plus"></i></button>
        <!-- <button type="button" name="button" class="send-message">Send a Message</button> -->
    </div>
    <!-- MODALS -->
    <!-- INVITE FRIEND MODAL -->
    <div class="modal fade" id="inviteFriends" tabindex="-1" role="dialog" aria-labelledby="inviteFriendsLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content p-3">
                <div class="modal-body">
                    <h5 class="modal-title" id="inviteFriendsLabel">Invite Friends to Use Emploi</h5>
                    <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times" aria-hidden="true"></i>
                    </button>
                    <div action="">
                        <form class="form-group" method="post" action="/referrals">
                            @csrf
                            <label for="new_invitee">Enter Email address</label>
                            <div class="row">
                                <div class="col-9 col-md-10" id="invitees">
                                    <input type="text" name="name" class="form-control my-1" id="new_invitee" placeholder="John Doe" required="">
                                    <input type="email" name="email" class="form-control my-1" id="new_invitee" placeholder="john@example.com" required="">
                                    <input type="hidden" value="1" id="totalInvitees">
                                </div>
                                <div class="col-3 col-md-2" style="display: none">
                                    <button type="button" name="button" class="btn btn-purple add">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <button class="btn btn-orange pull-right">Invite</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF INVITE FRIEND MODAL -->
    <!-- END OF INVITE FRIENDS -->
    <!-- END OF MODALS -->
    @include('cookieConsent::index')

    <!-- INLINE SCRIPTS -->
    <script type="text/javascript">
        // Add New Email
        $('.add').on('click', add);

        function add() {
            var newInvitee = parseInt($('#totalInvitees').val()) + 1;
            var new_input = '<input type="email" id="new_invitee' + newInvitee + '" class="form-control my-1 invitee-by-email" placeholder="name@example.com">';

            $('#invitees').append(new_input);

            $('#totalInvitees').val(newInvitee);
        }
        // Slide in search bar
        $('#search-prompt').on('click', function() {
            $(".search-form").toggleClass("hide show")
        })

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
</body>

</html>