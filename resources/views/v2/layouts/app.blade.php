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

        <title>Jecto - Job Board and Portal HTML Template</title>

        <link rel="icon" type="image/png" href="assets/img/favicon.png">
    </head>
    <body>
        <!-- Preloader -->
        @include('v2.components.preloader')
        <!-- End Preloader -->

        <!-- Navbar -->
        <div class="navbar-area fixed-top">
            <!-- Menu For Mobile Device -->
            <div class="mobile-nav">
                <a href="index.html" class="logo">
                    <img src="{{ asset('images/logo-alt.png') }}" alt="Emploi Logo" height="25px"/>
                </a>
            </div>

            <!-- Menu For Desktop Device -->
            <div class="main-nav three">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="index.html">
                            <img src="{{ asset('images/logo-alt.png') }}" alt="Emploi Logo" height="45px"/>
                        </a>
                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="index-3.html#" class="nav-link dropdown-toggle active">Home <i class='bx bx-chevron-down'></i></a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="index.html" class="nav-link">Home Demo One</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="index-2.html" class="nav-link">Home Demo Two</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="index-3.html" class="nav-link active">Home Demo Three</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="index-3.html#" class="nav-link dropdown-toggle">Pages <i class='bx bx-chevron-down'></i></a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="index-3.html#" class="nav-link dropdown-toggle">Users <i class='bx bx-chevron-down'></i></a>
                                            <ul class="dropdown-menu">
                                                <li class="nav-item">
                                                    <a href="login.html" class="nav-link">Login</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="register.html" class="nav-link">Register</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a href="index-3.html#" class="nav-link dropdown-toggle">Employers <i class='bx bx-chevron-down'></i></a>
                                            <ul class="dropdown-menu">
                                                <li class="nav-item">
                                                    <a href="employers.html" class="nav-link">Employers</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="employer-details.html" class="nav-link">Employer Details</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a href="dashboard.html" class="nav-link">Dashboard</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="single-resume.html" class="nav-link">Single Resume</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="testimonials.html" class="nav-link">Testimonials</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pricing.html" class="nav-link">Pricing Plans</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="faq.html" class="nav-link">FAQ</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="coming-soon.html" class="nav-link">Coming Soon</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="404.html" class="nav-link">404 Error Page</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="privacy-policy.html" class="nav-link">Privacy Policy</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="terms-conditions.html" class="nav-link">Terms & COnditions</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="about.html" class="nav-link">About</a>
                                </li>
                                <li class="nav-item">
                                    <span class="tooltip-span">Hot</span>
                                    <a href="index-3.html#" class="nav-link dropdown-toggle">Jobs <i class='bx bx-chevron-down'></i></a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="jobs.html" class="nav-link">Jobs</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="favourite-jobs.html" class="nav-link">Favourite Jobs</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="job-details.html" class="nav-link">Job Details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="post-a-job.html" class="nav-link">Post A Job</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <span class="tooltip-span two">New</span>
                                    <a href="index-3.html#" class="nav-link dropdown-toggle">Candidates <i class='bx bx-chevron-down'></i></a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="candidates.html" class="nav-link">Candidates</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="candidate-details.html" class="nav-link">Candidate Details</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="index-3.html#" class="nav-link dropdown-toggle">Blog <i class='bx bx-chevron-down'></i></a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="blog.html" class="nav-link">Blog</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="blog-details.html" class="nav-link">Blog Details</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="contact.html" class="nav-link">Contact</a>
                                </li>
                            </ul>
                            <div class="side-nav three">
                                <a class="login-left" href="register.html">
                                    <i class="flaticon-enter"></i>
                                    Login/Register
                                </a>
                                <a class="job-right" href="post-a-job.html">
                                    Post A Job
                                    <i class='bx bx-plus'></i>
                                </a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- End Navbar -->

        <!-- Banner -->
        <div class="banner-area three">
            <div class="container-fluid">
                <div class="banner-content two three">
                    <div class="d-table">
                        <div class="d-table-cell">
                            <p>
                                We aggregate all the jobs for you at one stop and we provide 
                                you with the best placement tools and support you need to land your dream job
                            </p>
                            <h1>Blast Off <span>Your Career</span></h1>
                            <div class="banner-form-area">
                                <form>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>
                                                    <i class='bx bx-search'></i>
                                                </label>
                                                <input type="text" class="form-control" placeholder="Search Your Job">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <select>
                                                    <option>All Categories</option>
                                                    <option>Another option</option>
                                                    <option>A option</option>
                                                    <option>Potato</option>
                                                </select>	
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group two">
                                                <label>
                                                    <i class='bx bx-location-plus'></i>
                                                </label>
                                                <input type="text" class="form-control" placeholder="Location">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn">
                                        Search Job
                                        <i class='bx bx-search'></i>
                                    </button>
                                </form>
                            </div>
                            <div class="banner-key">
                                <ul>
                                    <li>
                                        <span>Trending Keywords:</span>
                                    </li>
                                    <li>
                                        <a href="index-3.html#">Account Manager,</a>
                                    </li>
                                    <li>
                                        <a href="index-3.html#">Administrative,</a>
                                    </li>
                                    <li>
                                        <a href="index-3.html#">Android,</a>
                                    </li>
                                    <li>
                                        <a href="index-3.html#">Angular,</a>
                                    </li>
                                    <li>
                                        <a href="index-3.html#">appASP.NET</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="register-area">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-4 col-lg-4">
                                            <div class="register-item">
                                                <h3>
                                                    <span class="odometer" data-count="6,789,990">00</span> 
                                                </h3>
                                                <p>Registered Users</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-lg-4">
                                            <div class="register-item">
                                                <h3>
                                                    <span class="odometer" data-count="8,098,234">00</span> 
                                                </h3>
                                                <p>Global Employers</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-lg-4">
                                            <div class="register-item">
                                                <h3>
                                                    <span class="odometer" data-count="3,678,890">00</span> 
                                                </h3>
                                                <p>Available Jobs</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Banner -->

        @yield('content')

        <!-- Footer -->
        @include('v2.components.footer')
        <!-- End Footer -->

        <!-- Copyright -->
        <div class="copyright-area three">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="copyright-item">
                            <ul>
                                <li>
                                    <a href="index-3.html#" target="_blank">
                                        <i class='bx bxl-facebook'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="index-3.html#" target="_blank">
                                        <i class='bx bxl-twitter'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="index-3.html#" target="_blank">
                                        <i class='bx bxl-linkedin-square'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="index-3.html#" target="_blank">
                                        <i class='bx bxl-pinterest-alt'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="index-3.html#" target="_blank">
                                        <i class='bx bxl-youtube'></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="copyright-item">
                            <p>Copyright @2020 Design & Developed by <a href="https://hibootstrap.com/" target="_blank">HiBootstrap</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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