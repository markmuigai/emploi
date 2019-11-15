<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="@yield('description')" />
    <meta name="csrf-token" content="{{ csrf_token() }}" id="csrf_token">
    <!-- Page Title -->
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/favicon.png') }}">

    <!-- STYLESHEETS -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700,900&display=swap" rel="stylesheet">
    <!--Font Awesome-->
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
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
    <script src="https://kit.fontawesome.com/011a16deb1.js" crossorigin="anonymous"></script>

    <!-- Vue JS -->
    @if (config('app.env') === 'production')
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    @else
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    @endif
    <!-- CountUp JS -->
    <script src="{{asset('js/jquery.countup.js')}}"></script>
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
    <!-- Slick JS -->
    <script type="text/javascript" src="{{asset('js/slick.min.js')}}"></script>
    <!-- Custom JS -->
    <script src="{{asset('js/custom.js')}}"></script>
</head>

<body>
    <header>
        <!-- NAVBAR -->
        <nav class="navbar fixed-top navbar-expand-lg">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fas fa-bars"></span>
                </button>
                <a class="navbar-brand" href="/"><img src="{{ asset('images/logo.png') }}" alt="Emploi Logo" /></a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav ml-auto mr-0">
                        <li class="nav-item d-md-none d-block">
                            <a class="nav-link" href="/employers/dashboard">Dashboard</a>
                        </li>
                        <li class="nav-item d-md-none d-block"><a class="nav-link" href="/employers/jobs">Jobs</a></li>
                        <li class=" nav-item d-md-none d-block">
                            <a class="nav-link" href="#v-pills-messages">Candidates</a>
                        </li>
                        <li class="nav-item d-md-none d-block">
                            <a class="nav-link" href="#v-pills-settings">Test Center</a>
                        </li>
                        <li class="nav-item d-md-none d-block">
                            <a class="nav-link" href="#v-pills-reviews">Reviews</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/vacancies">Vacancies</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/blog">Career Center</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">See Who's Hiring</a>
                        </li>
                        <div class="d-md-flex">
                            @if(isset(Auth::user()->id))
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fas fa-bell"></i></a>
                            </li>
                            @else
                            <LI class="nav-item">
                                <a href="#" class="nav-link btn btn-white">Login</a>
                            </LI>
                            <LI class="nav-item">
                                <a href="#" class="nav-link btn btn-orange">Register</a>
                            </LI>
                            @endif
                            <!-- <li class="nav-item search-form hide">
                                <form action="" class="form-inline mt-2">
                                    <input type="text" name="search" placeholder="Search" class="form-control" id="search">
                                </form>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link" id="search-prompt" href="#"><i class="fas fa-search"></i></a>
                            </li>
                        </div>
                    </ul>
                </div>
                @if(isset(Auth::user()->id))
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{asset('images/avatar.png')}}" class="profile-avatar" alt="">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/profile">View Profile</a>
                        <a class="dropdown-item" href="#">Account Settings</a>
                        <a class="dropdown-item" href="#">Billings</a>
                        <a class="dropdown-item" href="/logout">Logout</a>
                    </div>
                </div>
                @endif
            </div>
        </nav>
        <!-- END OF NAVBAR -->
    </header>
    <!-- MAIN CONTENT  -->
    @guest
    <main>
        @yield('content')
    </main>
    <!-- END OF MAIN CONTENT  -->

    @else
    <!-- MAIN CONTENT FOR EMPLOYER -->
    <main>
        <!-- SIDEBAR FOR EMPLOYERS -->
        <div class="container">
            <div class="row pt-4">
                <div class="col-md-3 d-md-block d-none">
                    <div class="sidebar">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                            @if( isset(Auth::user()->id) && Auth::user()->role == 'employer' )

                            <a class="nav-link active" id="v-pills-home-tab" href="/employers/dashboard" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard <i class="fas fa-chevron-right"></i></a>
                            <a class="nav-link" id="v-pills-profile-tab" href="/employers/jobs" role="tab" aria-controls="v-pills-profile" aria-selected="false">Jobs <i class="fas fa-chevron-right"></i></a>
                            <a class="nav-link" id="v-pills-messages-tab" href="/employers/browse/" role="tab" aria-controls="v-pills-messages" aria-selected="false">Browse Candidates <i class="fas fa-chevron-right"></i></a>

                            @elseif( isset(Auth::user()->id) && Auth::user()->role == 'seeker' )

                            @elseif( isset(Auth::user()->id) && Auth::user()->role == 'admin' )

                            @else

                            @endif

                            <!-- <a class="nav-link" id="v-pills-settings-tab" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Test Center <i class="fas fa-chevron-right"></i></a> -->
                            <a class="nav-link" id="v-pills-reviews-tab" style="display: none;" href="/employers/reviews" role="tab" aria-controls="v-pills-reviews" aria-selected="false">Reviews <i class="fas fa-chevron-right"></i></a>
                        </div>
                        @if( isset(Auth::user()->id) && Auth::user()->role == 'employer' )

                        <!-- ADD JOB AS AN EMPLOYER -->
                        <div class="mt-3">
                            <a href="/vacancies/create" class="btn btn-orange" id="postAlt"><i class="fas fa-plus"></i> Post A Job</a>
                        </div>
                        <!-- END OF ADD JOB AS AN EMPLOYER -->

                        @endif

                    </div>
                </div>
                <!-- END OF SIDEBAR FOR EMPLOYERS -->
                <div class="col-md-9 col-12 align-items-center">
                    <!-- ADD JOB AS AN EMPLOYER -->
                    <div id="postJob" class="mb-3">
                        <h2>@yield('page_title')</h2>
                        @if( isset(Auth::user()->id) && Auth::user()->role == 'employer' )
                        <a href="/vacancies/create" class="btn btn-orange"><i class="fas fa-plus"></i> Post A Job</a>
                        @endif
                    </div>
                    <!-- END OF ADD JOB AS AN EMPLOYER -->
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
    @endguest
    <!-- END OF MAIN CONTENT FOR EMPLOYER -->
    <!-- FOOTER -->
    <footer>
        <div class="container pt-3 pb-1">
            <div class="row justify-content-between">
                <div class="col-md-4 col-sm-4 col-5">
                    <h4>MENU</h4>
                    <ul class="footer-menu">
                        <li><a href="/about">About Us</a></li>
                        <li><a href="/blog">Career Centre</a></li>
                        <li><a href="/join">Register</a></li>
                        <li><a href="/employers/publish">Advertise</a></li>
                        <li><a href="/vacancies">Vacancies</a></li>
                        <li><a href="/contact">Contact Us</a></li>
                    </ul>
                    <div class="d-block d-md-none social">
                        <a href="https://www.facebook.com/jobsikaz/" target="_blank"><i class="fab fa-facebook-f pr-3"></i></a>
                        <a href="https://twitter.com/jobsikaz?lang=en" target="_blank"><i class="fab fa-twitter pr-3"></i></a>
                        <a href="https://ke.linkedin.com/company/jobsikaz-com" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-5 col-7 location">
                    <h4>FIND US</h4>
                    <div class="row align-items-center">
                        <div class="col-1">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="col-10">
                            <p>Syokimau Junction, along Mombasa road, Repen Complex. 4<sup>th</sup> Floor Room 414B</p>
                        </div>
                    </div>
                    <br>
                    <div class="row align-items-center">
                        <div class="col-1">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="col-10">
                            <a href="mailto:info@emploi.co">info@emploi.co</a>
                        </div>
                    </div>
                    <br>
                    <div class="row align-items-center">
                        <div class="col-1">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="col-10">
                            <a href="tel:+254702068282">+254 702 068 282</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 offset-md-2 d-none d-md-block social ">
                    <h4>SOCIAL</h4>
                    <div class="social-icons">
                        <a href="https://www.facebook.com/jobsikaz/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com/jobsikaz?lang=en" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="https://ke.linkedin.com/company/jobsikaz-com" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="copy pt-3">
                <p>Copyright &copy; {{ date('Y') }} Emploi . All Rights Reserved </p>
            </div>
        </div>
    </footer>
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
    </script>
</body>

</html>