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
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
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
                        <li class="nav-item">
                            <a class="nav-link" href="/vacancies">Vacancies</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/blog">Career Center</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/companies?hiring=true">See Who's Hiring</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="/employers/register" class="btn btn-orange"> Employer Registration</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" id="search-prompt" href="#"><i class="fas fa-search"></i></a>
                        </li>
                        <div class="d-md-flex">
                            <!-- <li class="nav-item search-form hide">
                                <form action="" class="form-inline mt-2">
                                    <input type="text" name="search" placeholder="Search" class="form-control" id="search">
                                </form>
                            </li> -->
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END OF NAVBAR -->
    </header>
    <!-- MAIN CONTENT FOR EMPLOYER -->
    <main class="sign-page pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12">
                <div class="sign-left text-center">
                    <h1 class="orange">@yield('user_title')</h1>
                    @if(is_null(\Route::current()->getName()))
                    <h5>- Continue With -</h5>
                    <a href="/auth-with/facebook" class="pr-2"><i class="fab fa-facebook-f"></i></a>
                    <a href="/auth-with/google" class="pr-2"><i class="fab fa-google"></i></a>
                    <a href="/auth-with/linkedin" class="pr-2"><i class="fab fa-linkedin"></i></a>
                    @endif
                </div>
                <div class="container pt-3">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
    <!-- END OF MAIN CONTENT FOR EMPLOYER -->
    <!-- FOOTER -->
    <div class="sign-copy">
        <p>Copyright &copy; {{ date('Y') }} Emploi . All Rights Reserved </p>
    </div>
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
    {{--@include('cookieConsent::index')--}}
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
