<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    @include('components.meta')
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
    <script src="{{asset('js/jquery-3.4.1.min.js')}}" charset="utf-8"></script>
    <!-- Popper -->
    <script src="{{asset('js/popper.min.js')}}" charset="utf-8"></script>
    <!-- Bootstrap -->
    <script src="{{asset('js/bootstrap4.min.js')}}" charset="utf-8"></script>
    <!-- Font Awesome -->
    <script src="{{asset('js/jquery.fontawesome.js')}}"></script>
    <!-- Succinct JS -->
    <script src="{{asset('js/jQuery.succinct.min.js')}}"></script>
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

    <!-- Slick JS -->
    <script type="text/javascript" src="{{asset('js/slick.min.js')}}"></script>
    <!-- Custom JS -->
    <script src="{{asset('js/custom.js')}}"></script>
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
                            <a class="nav-link" id="v-pills-messages-tab" href="/admin/cv-requests" role="tab" aria-controls="v-pills-messages" aria-selected="false">CV Requests <i class="fas fa-chevron-right"></i></a>
                            <a class="nav-link" id="v-pills-messages-tab" href="/admin/blog" role="tab" aria-controls="v-pills-messages" aria-selected="false">Blogs <i class="fas fa-chevron-right"></i></a>
                            <a class="nav-link" id="v-pills-messages-tab" href="/admin/emails" role="tab" aria-controls="v-pills-messages" aria-selected="false">Send emails <i class="fas fa-chevron-right"></i></a>
                        </div>

                        <!-- END OF ADMIN SIDEBAR -->

                        <!-- GUEST SIDEBAR -->
                        @else
                        <div class="card">
                            <div class="card-body text-center">
                                <h5>Sign Up Today</h5>
                                <a href="/join" class="btn btn-orange">Register</a>
                                <h6 class="mt-3">- Have An Account -</h6>
                                <a href="/login" class="btn btn-orange-alt">Login</a>
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
                        @if( isset(Auth::user()->id) && Auth::user()->role == 'employer' )
                        <a href="/vacancies/create" class="btn btn-orange" dusk="create-new-post"><i class="fas fa-plus"></i> Post A Job</a>

                        @elseif( isset(Auth::user()->id) && Auth::user()->role == 'seeker' )
                        <a href="/vacancies" class="btn btn-orange"><i class="fas fa-plus"></i> Apply For A Job</a>

                        @elseif( isset(Auth::user()->id) && Auth::user()->role == 'admin' )
                        <h3>
                            <span class="badge badge-secondary">
                                @yield('admin_country')
                            </span>
                        </h3>
                        @endif
                    </div>
                    <!-- END OF ADD JOB AS AN EMPLOYER -->
                    @yield('content')
                </div>
            </div>
        </div>

    </main>
    <!-- END OF MAIN CONTENT FOR EMPLOYER -->
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times" aria-hidden="true"></i>
                    </button>
                    <form action="">
                        <div class="form-group">
                            <label for="new_invitee">Enter Email address</label>
                            <div class="row">
                                <div class="col-9 col-md-10" id="invitees">
                                    <input type="email" class="form-control my-1" id="new_invitee" placeholder="name@example.com">
                                    <input type="hidden" value="1" id="totalInvitees">
                                </div>
                                <div class="col-3 col-md-2">
                                    <button type="button" name="button" class="btn btn-purple add"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-orange pull-right">Invite</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF INVITE FRIEND MODAL -->
    <!-- END OF INVITE FRIENDS -->
    <!-- END OF MODALS -->

    <!-- INLINE SCRIPTS -->
    <script type="text/javascript">
        // Add New Email
        $('.add').on('click', add);

        function add() {
            var newInvitee = parseInt($('#totalInvitees').val()) + 1;
            var new_input = '<input type="email" id="new_invitee' + newInvitee + '" class="form-control my-1" placeholder="name@example.com">';

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
