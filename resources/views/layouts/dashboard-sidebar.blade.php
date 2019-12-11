<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('title')</title>
    @include('components.meta')
    
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link href="{{ asset('css/bootstrap-3.1.1.min.css') }}" rel='stylesheet' type='text/css' />
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('js/custom.js') }}"></script>
    <!-- ChartJS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css" />
    <!-- Custom Theme files -->
    <link href="{{ asset('css/style.css') }}" rel='stylesheet' type='text/css' />
    <link href='//fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
    <!--font-Awesome-->
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel='stylesheet' type='text/css' />

    <!--font-Awesome-->
    <!-- Notify JS Notifications -->
    <script type="text/javascript" src="{{asset('js/notify.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/emploi-notify.js')}}"></script>
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><img src="{{ asset('images/logo.png') }}" alt="Emploi Logo" /></a>
            <!--/.navbar-header-->
            <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" style="height: 1px;">
                <ul class="nav navbar-nav">
                    <li><a href="/vacancies">Vacancies</a></li>
                    @if (Route::getCurrentRoute() != null && Route::getCurrentRoute()->uri() != '/')
                    <li><a href="/">Home</a></li>
                    @else
                    <li><a href="/blog">Career Centre</a></li>
                    @endif
                    <li class="dropdown" style="display: none">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">About<strong class="caret"></strong></a>
                        <ul class="dropdown-menu multi-column columns-3">
                            <div class="row">
                                <div class="col-sm-4">
                                    <ul class="multi-column-dropdown">
                                        <li><a href="/about">About Us</a></li>

                                        <li><a href="/contact">Contact Us</a></li>

                                    </ul>
                                </div>
                                <div class="col-sm-4">
                                    <ul class="multi-column-dropdown">
                                        <li><a href="/employers/publish" style="font-weight: bold">Advertise a Job</a></li>
                                        <li><a href="/blog">Career Centre</a></li>

                                    </ul>
                                </div>
                                <div class="col-sm-4">
                                    <ul class="multi-column-dropdown">
                                        <li><a href="/terms-and-conditions">Terms & Conditions</a></li>
                                        <li><a href="/privacy-policy">Privacy Policy</a></li>
                                    </ul>
                                </div>
                            </div>
                        </ul>
                    </li>

                    @if(isset(Auth::user()->id) && Auth::user()->role == 'seeker')
                    @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Employers<strong class="caret"></strong></a>
                        <ul class="dropdown-menu">
                            @if(isset(Auth::user()->id) && Auth::user()->role == 'employer')
                            <li><a href="/employers/dashboard">Dashboard</a></li>
                            @endif
                            <li><a href="/employers/services">All Services</a></li>
                            <li><a href="/employers/browse">Browse CVs</a></li>
                            <li><a href="/employers/publish"><strong>Advertise Jobs</strong></a></li>
                            <li><a href="/employers/premium-recruitment">Premium Recruitment</a></li>
                            <li><a href="/employers/candidate-vetting" style="display: none">Candidate Vetting</a></li>
                            <li><a href="/employers/hr-services" style="display: none">HR Services</a></li>
                            <li><a href="/employers/register">Create Profile</a></li>
                            <li><a href="/mass-recruitment">Mass Recruitment</a></li>
                            <li><a href="/employers/role-suitability-index"><strong>Role Suitability Index</strong></a></li>
                        </ul>
                    </li>
                    @endif
                    @if(isset(Auth::user()->id) && Auth::user()->role == 'admin')
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <strong class="caret"></strong></a>
                        <ul class="dropdown-menu">
                            <li><a href="/job-seekers/services">Job Posts</a></li>
                            <li><a href="/register">CV Requests</a></li>

                            <li><a href="/job-seekers/cv-editing">Job Seekers</a></li>
                            <li><a href="/job-seekers/cv-templates">CV Templates</a></li>

                            <li><a href="/job-seekers/premium-placement">Blogs</a></li>
                            <li><a href="/vacancies">Compose Emails</a></li>
                        </ul>
                    </li>
                    @else
                    @endif
                    @if(isset(Auth::user()->id) && Auth::user()->role == 'employer')
                    @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Job Seekers<strong class="caret"></strong></a>
                        <ul class="dropdown-menu">
                            <li><a href="/job-seekers/services">All Services</a></li>
                            <li><a href="/register" style="font-weight: bold;">Upload CV</a></li>

                            <li><a href="/job-seekers/cv-editing">CV Editing</a></li>
                            <li><a href="/job-seekers/cv-templates">CV Templates</a></li>

                            <li><a href="/job-seekers/premium-placement">Premium Placement</a></li>
                            <li><a href="/vacancies">Vacancies</a></li>
                            <li><a href="/blog">Career Centre</a></li>
                            @guest

                            <li><a href="/blog">Register Profile</a></li>
                            @else
                            @endguest
                        </ul>
                    </li>
                    @endif
                    @if(isset(Auth::user()->id))
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #e88725; font-weight: bold">
                            <img src="{{ Auth::user()->getPublicAvatarUrl() }}" alt="">
                                My Account
                                <strong class="caret"></strong>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/home">Dashboard</a></li>
                            <li><a href="/profile">Profile</a></li>
                            @if(Auth::user()->role == 'seeker')
                            <li><a href="/profile/edit"
                              @if(!Auth::user()->seeker->hasCompletedProfile())
                                    class="text-danger"
                                    @endif
                                    >Edit Profile</a></li>
                            <li><a href="/profile/applications">My Applications ({{ count(Auth::user()->applications) }})</a></li>
                            <li><a href="/job-seekers/services">Job Seeker Services</a></li>
                            @endif
                            <li><a href="/logout">Logout</a></li>
                        </ul>
                    </li>
                    @else
                    <li><a href="/login">Login</a></li>
                    <li><a href="/join" class="orange">Register</a></li>
                    @endif
                </ul>
            </div>
        </div>
        <!--/.navbar-collapse-->
    </nav>

    <nav class="sidebar">
        <a href="/"><i class="fa fa-home"></i> Home</a>
        <a href="/home"><i class="fa fa-bar-chart" aria-hidden="true"></i> Dashboard</a>
        <a href="#">Jobs</a>
        <a href="#">Applicants</a>
    </nav>

    <!-- Content -->
    @yield('content')
    <!-- Content -->
    <!-- <div class="copy">
        <p>Copyright © {{ date('Y') }} Emploi . All Rights Reserved </p>
    </div> -->
    @include('components.tawk')
</body>

</html>
