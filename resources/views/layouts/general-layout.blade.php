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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
                <a class="navbar-brand" href="#"><img src="{{ asset('images/logo.png') }}" alt="Emploi Logo" /></a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mr-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Jobs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Career Center</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">See Who's Hiring</a>
                        </li>
                        <div class="d-md-flex">
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fas fa-bell"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fas fa-search"></i></a>
                            </li>
                        </div>
                    </ul>
                </div>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{asset('images/avatar.png')}}" class="profile-avatar" alt="">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">View Profile</a>
                        <a class="dropdown-item" href="#">Account Settings</a>
                        <a class="dropdown-item" href="#">Billings</a>
                        <a class="dropdown-item" href="#">Sign Out</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- END OF NAVBAR -->
    </header>
    <!-- MAIN CONTENT FOR EMPLOYER -->
    <main>
        <!-- SIDEBAR FOR EMPLOYERS -->
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-2">
                    <div class="sidebar">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-home-tab" href="/new-dashboard" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard <i class="fas fa-chevron-right"></i></a>
                            <a class="nav-link" id="v-pills-profile-tab" href="/home" role="tab" aria-controls="v-pills-profile" aria-selected="false">Jobs <i class="fas fa-chevron-right"></i></a>
                            <a class="nav-link" id="v-pills-messages-tab" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Candidates <i class="fas fa-chevron-right"></i></a>
                            <a class="nav-link" id="v-pills-settings-tab" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Test Center <i class="fas fa-chevron-right"></i></a>
                            <a class="nav-link" id="v-pills-reviews-tab" href="#v-pills-reviews" role="tab" aria-controls="v-pills-reviews" aria-selected="false">Reviews <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- END OF SIDEBAR FOR EMPLOYERS -->
                <div class="col-md-9 col-9">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
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
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="modal-title" id="inviteFriendsLabel">Invite Friends to Use Emploi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times" aria-hidden="true"></i>
                    </button>
                    <form action="">
                        <div class="form-group">
                            <label for="new_invitee">Enter Email address</label>
                            <div class="row">
                                <div class="col-10" id="invitees">
                                    <input type="email" class="form-control" id="new_invitee" placeholder="name@example.com">
                                    <input type="hidden" value="1" id="totalInvitees">
                                </div>
                                <div class="col-2">
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
            var new_input = '<input type="email" id="new_invitee' + newInvitee + '" class="form-control" placeholder="name@example.com">';

            $('#invitees').append(new_input);

            $('#totalInvitees').val(newInvitee);
        }
    </script>
</body>

</html>