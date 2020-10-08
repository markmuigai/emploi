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
        <div class="loader">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="spinner"></div>
                </div>
            </div>
        </div>
        <!-- End Preloader -->

        <!-- Navbar -->
        <div class="navbar-area fixed-top">
            <!-- Menu For Mobile Device -->
            <div class="mobile-nav">
                <a href="index.html" class="logo">
                    <img src="assets/img/logo-three.png" alt="Logo">
                </a>
            </div>

            <!-- Menu For Desktop Device -->
            <div class="main-nav three">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="index.html">
                            <img src="{{asset('assets-v2/img/logo-three.png')}}" alt="Logo">
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
            <div class="banner-shape-three">
                <img src="{{asset('assets-v2/img/home-three/banner-main.png')}}" alt="Shape">
            </div>
            <div class="container-fluid">
                <div class="banner-content two three">
                    <div class="d-table">
                        <div class="d-table-cell">
                            <p>Helping you to find any type of job</p>
                            <h1>We’ll Help You To Find Your <span>Desire Job</span></h1>
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
            <div class="banner-bottom-btn">
                <a href="index-3.html#job">
                    <i class='bx bx-mouse-alt'></i>
                </a>
            </div>
        </div>
        <!-- End Banner -->

        <!-- Employer -->
        <section id="job" class="employer-area pb-100">
            <div class="container">
                <div class="section-title three">
                    <div class="sub-title-wrap">
                        <img src="{{asset('assets-v2/img/home-three/title-img.png')}}" alt="Icon">
                        <span class="sub-title">Employers Offering Job</span>
                    </div>
                    <h2>Company Offering Job</h2>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="employer-item">
                            <a href="job-details.html">
                                <img src="{{asset('assets-v2/img/home-one/job1.png')}}" alt="Employer">
                                <h3>Product Designer</h3>
                                <ul>
                                    <li>
                                        <i class="flaticon-send"></i>
                                        Los Angeles, CS, USA
                                    </li>
                                    <li>5 months ago</li>
                                </ul>
                                <p>We are Looking for a skilled Ul/UX designer amet conscu adiing elitsed do eusmod tempor</p>
                                <span class="span-one">Accounting</span>
                                <span class="span-two">FULL TIME</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="employer-item">
                            <a href="blog-details.html">
                                <img src="{{asset('assets-v2/img/home-one/job2.png')}}" alt="Employer">
                                <h3>Sr. Shopify Developer</h3>
                                <ul>
                                    <li>
                                        <i class="flaticon-send"></i>
                                        Houston, TX, USA
                                    </li>
                                    <li>4 months ago</li>
                                </ul>
                                <p>Responsible for managing skilled Ul/UX designer amet conscu adiing elitsed do eusmod</p>
                                <span class="span-one">Accounting</span>
                                <span class="span-two two">FULL TIME</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <a href="job-details.html">
                            <div class="employer-item">
                                <img src="{{asset('assets-v2/img/home-one/job3.png')}}" alt="Employer">
                                <h3>Tax Manager</h3>
                                <ul>
                                    <li>
                                        <i class="flaticon-send"></i>
                                        Ho Chi Minh City, Vietnam
                                    </li>
                                    <li>6 months ago</li>
                                </ul>
                                <p>International collaborative a skilled Ul/UX designer amet conscu adiing elitsed do eusmod</p>
                                <span class="span-one two">Broardcasting</span>
                                <span class="span-two three">FREELANCER</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <div class="employer-item">
                            <a href="job-details.html">
                                <img src="{{asset('assets-v2/img/home-one/job4.png')}}" alt="Employer">
                                <h3>Senior Data Engineer</h3>
                                <ul>
                                    <li>
                                        <i class="flaticon-send"></i>
                                        Cardiss, UK
                                    </li>
                                    <li>9 months ago</li>
                                </ul>
                                <p>International collaborative designer amet conscu adiing elitsed do eusmod tempor</p>
                                <span class="span-one three">Web & Software Dev</span>
                                <span class="span-two four">REMOTE</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="employer-item">
                            <a href="job-details.html">
                                <img src="{{asset('assets-v2/img/home-one/job5.png')}}" alt="Employer">
                                <h3>Construction Worker</h3>
                                <ul>
                                    <li>
                                        <i class="flaticon-send"></i>
                                        Adelaide SA, Australia
                                    </li>
                                    <li>10 months ago</li>
                                </ul>
                                <p>We are Looking for a skilled Ul/UX designer amet conscu adiing elitsed do eusmod tempor</p>
                                <span class="span-one">Accounting</span>
                                <span class="span-two">FULL TIME</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="employer-item">
                            <a href="job-details.html">
                                <img src="{{asset('assets-v2/img/home-one/job6.png')}}" alt="Employer">
                                <h3>Product Manager</h3>
                                <ul>
                                    <li>
                                        <i class="flaticon-send"></i>
                                        Warangal, Telangana, India
                                    </li>
                                    <li>2 months ago</li>
                                </ul>
                                <p>Wind Power Engineering Manager amet conscu adiing elitsed do eusmod tempor</p>
                                <span class="span-one four">Customer Service</span>
                                <span class="span-two">FULL TIME</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="job-browse">
                    <p>A tons of top tech jobs are waiting for you. <a href="jobs.html">Browse all jobs</a></p>
                </div>
            </div>
        </section>
        <!-- End Employer -->

        <!-- System -->
        <section class="system-area ptb-100">
            <div class="system-shape">
                <img src="{{asset('assets-v2/img/home-three/system1.png')}}" alt="Shape">
                <img src="{{asset('assets-v2/img/home-three/system2.png')}}" alt="Shape">
            </div>
            <div class="container">
                <div class="system-item">
                    <div class="section-title three">
                        <div class="sub-title-wrap">
                            <img src="{{asset('assets-v2/img/home-three/title-img-two.png')}}" alt="Icon">
                            <span class="sub-title">Recruitment System</span>
                        </div>
                        <h2>You’ll Be Able To Recruit Qualified Candidate With Jecto</h2>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut tur incidunt laborequaerat voluptatem.</p>
                    <ul class="system-list">
                        <li>
                            <span></span>
                            Access to the very best professionals
                        </li>
                        <li>
                            <span></span>
                            Look at on your own core business
                        </li>
                        <li>
                            <span></span>
                            Develop effi­­ci­­en­ci­­es by HR management
                        </li>
                    </ul>
                    <ul class="system-video">
                        <li>
                            <a class="left-btn" href="index-3.html#">
                                Recruit Now
                                <i class='bx bx-plus'></i>
                            </a>
                        </li>
                        <li>
                            <span>Watch Message</span>
                            <a class="right-btn popup-youtube" href="https://www.youtube.com/watch?v=07d2dXHYb94&t=88s">
                                <i class='bx bx-play'></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End System -->

        <!-- Work -->
        <section class="work-area two three pt-100 pb-70">
            <div class="container">
                <div class="section-title three">
                    <div class="sub-title-wrap">
                        <img src="{{asset('assets-v2/img/home-three/title-img.png')}}" alt="Icon">
                        <span class="sub-title">Working Process</span>
                    </div>
                    <h2>See How It Works</h2>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-lg-4">
                        <div class="work-item two three">
                            <i class="flaticon-accounting"></i>
                            <h3>Register An Account</h3>
                            <p>Lorem ipsum dolor sit amet conscu adiing elitsed do eusmod tempor incidunt utinto elit sed doe</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="work-item two three">
                            <i class="flaticon-file"></i>
                            <h3>Search Your Job</h3>
                            <p>Lorem ipsum dolor sit amet conscu adiing elitsed do eusmod tempor incidunt utinto elit sed doe</p>
                        </div>
                    </div>
                    <div class="col-sm-6 offset-sm-3 offset-lg-0 col-lg-4">
                        <div class="work-item two three work-border">
                            <i class="flaticon-businessman-paper-of-the-application-for-a-job"></i>
                            <h3>Apply For Job</h3>
                            <p>Lorem ipsum dolor sit amet conscu adiing elitsed do eusmod tempor incidunt utinto elit sed doe</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Work -->

        <!-- Feature -->
        <section class="feature-area pb-100">
            <div class="container-fluid">
                <div class="section-title three">
                    <div class="sub-title-wrap">
                        <img src="{{asset('assets-v2/img/home-three/title-img.png')}}" alt="Icon">
                        <span class="sub-title">Employers Offering Job</span>
                    </div>
                    <h2>Here's Features Job</h2>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-lg-2">
                        <div class="feature-item">
                            <a href="job-details.html">
                                <img src="{{asset('assets-v2/img/home-three/feature1.png')}}" alt="Feature">
                            </a>
                            <div class="bottom">
                                <h3>
                                    <a href="job-details.html">Accounting</a>
                                </h3>
                                <span>5 Jobs</span>
                                <i class="flaticon-verify"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-2">
                        <div class="feature-item">
                            <a href="job-details.html">
                                <img src="{{asset('assets-v2/img/home-three/feature2.png')}}" alt="Feature">
                            </a>
                            <div class="bottom">
                                <h3>
                                    <a href="job-details.html">Digital Marketing</a>
                                </h3>
                                <span>2 Jobs</span>
                                <i class="flaticon-verify"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-2">
                        <div class="feature-item">
                            <a href="job-details.html">
                                <img src="{{asset('assets-v2/img/home-three/feature3.png')}}" alt="Feature">
                            </a>
                            <div class="bottom">
                                <h3>
                                    <a href="job-details.html">Customer Service</a>
                                </h3>
                                <span>4 Jobs</span>
                                <i class="flaticon-verify"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-2">
                        <div class="feature-item">
                            <a href="job-details.html">
                                <img src="{{asset('assets-v2/img/home-three/feature4.png')}}" alt="Feature">
                            </a>
                            <div class="bottom">
                                <h3>
                                    <a href="job-details.html">Broadcasting</a>
                                </h3>
                                <span>1 Job</span>
                                <i class="flaticon-verify"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-2">
                        <div class="feature-item">
                            <a href="job-details.html">
                                <img src="{{asset('assets-v2/img/home-three/feature5.png')}}" alt="Feature">
                            </a>
                            <div class="bottom">
                                <h3>
                                    <a href="job-details.html">Sale Assistance</a>
                                </h3>
                                <span>5 Jobs</span>
                                <i class="flaticon-verify"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-2">
                        <div class="feature-item">
                            <a href="job-details.html">
                                <img src="{{asset('assets-v2/img/home-three/feature6.png')}}" alt="Feature">
                            </a>
                            <div class="bottom">
                                <h3>
                                    <a href="job-details.html">Teachers</a>
                                </h3>
                                <span>2 Job</span>
                                <i class="flaticon-verify"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="job-browse">
                    <p>Jobs are waiting for you <a href="jobs.html">Browse all jobs</a></p>
                </div>
            </div>
        </section>
        <!-- End Feature -->

        <!-- Company -->
        <section class="company-area pb-70">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="section-title three">
                            <div class="sub-title-wrap">
                                <img src="{{asset('assets-v2/img/home-three/title-img.png')}}" alt="Icon">
                                <span class="sub-title">Employers Offering Job</span>
                            </div>
                            <h2>Company Offering Job</h2>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="sorting-menu">
                            <ul> 
                               <li class="filter" data-filter="all">All</li>
                               <li class="filter" data-filter=".m">Featured</li>
                               <li class="filter" data-filter=".n">Most Viewed</li>
                               <li class="filter" data-filter=".o">Newest</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="container" class="row">
                    <div class="col-sm-6 col-lg-3 mix n">
                        <div class="company-item">
                            <div class="feature-top-right">
                                <span>Most Viewed</span>
                            </div>
                            <div class="top">
                                <a href="employer-details.html">
                                    <img src="{{asset('assets-v2/img/home-one/company1.png')}}" alt="Brand">
                                </a>
                                <h3>
                                    <a href="employer-details.html">Pi Agency</a>
                                </h3>
                                <span>Part Time Job</span>
                                <p>
                                    <i class="flaticon-appointment"></i>
                                    10 min ago / Austria, Vienna
                                </p>
                            </div>
                            <div class="bottom">
                                <ul>
                                    <li>Pay Relocation Free</li>
                                    <li>Remote Work</li>
                                    <li>Duration: 5 Years</li>
                                </ul>
                                <span>Annual Salary</span>
                                <h4>50K</h4>
                                <a href="employer-details.html">
                                    <i class="flaticon-right-arrow"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mix n">
                        <div class="company-item">
                            <div class="feature-top-right">
                                <span>Most Viewed</span>
                            </div>
                            <div class="top">
                                <a href="employer-details.html">
                                    <img src="{{asset('assets-v2/img/home-one/company2.png')}}" alt="Brand">
                                </a>
                                <h3>
                                    <a href="employer-details.html">Kn It</a>
                                </h3>
                                <span>Permanent Job</span>
                                <p>
                                    <i class="flaticon-appointment"></i>
                                    9 min ago / Tirana, Albania
                                </p>
                            </div>
                            <div class="bottom">
                                <ul>
                                    <li>Graphic Designer</li>
                                    <li>Remote Work</li>
                                    <li>Duration: 2 Years</li>
                                </ul>
                                <span>Annual Salary</span>
                                <h4>56K</h4>
                                <a href="employer-details.html">
                                    <i class="flaticon-right-arrow"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mix m">
                        <div class="company-item">
                            <div class="feature-top-right">
                                <span>Featured</span>
                            </div>
                            <div class="top">
                                <a href="employer-details.html">
                                    <img src="{{asset('assets-v2/img/home-one/company3.png')}}" alt="Brand">
                                </a>
                                <h3>
                                    <a href="employer-details.html">Orbit Inc.</a>
                                </h3>
                                <span>Part Time Job</span>
                                <p>
                                    <i class="flaticon-appointment"></i>
                                    8 min ago / Doha, Qatar
                                </p>
                            </div>
                            <div class="bottom">
                                <ul>
                                    <li>Product Manager</li>
                                    <li>Remote Work</li>
                                    <li>Duration: 5 Years</li>
                                </ul>
                                <span>Annual Salary</span>
                                <h4>70K</h4>
                                <a href="employer-details.html">
                                    <i class="flaticon-right-arrow"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mix o">
                        <div class="company-item">
                            <div class="feature-top-right">
                                <span>Newest</span>
                            </div>
                            <div class="top">
                                <a href="employer-details.html">
                                    <img src="{{asset('assets-v2/img/home-one/company4.png')}}" alt="Brand">
                                </a>
                                <h3>
                                    <a href="employer-details.html">Dev Roside</a>
                                </h3>
                                <span>Full Time Job</span>
                                <p>
                                    <i class="flaticon-appointment"></i>
                                    15 min ago / UK, England
                                </p>
                            </div>
                            <div class="bottom">
                                <ul>
                                    <li>Design & Developer</li>
                                    <li>Remote Work</li>
                                    <li>Duration: 2 Years</li>
                                </ul>
                                <span>Annual Salary</span>
                                <h4>89K</h4>
                                <a href="employer-details.html">
                                    <i class="flaticon-right-arrow"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mix o">
                        <div class="company-item">
                            <div class="feature-top-right">
                                <span>Newest</span>
                            </div>
                            <div class="top">
                                <a href="employer-details.html">
                                    <img src="{{asset('assets-v2/img/home-one/company5.png')}}" alt="Brand">
                                </a>
                                <h3>
                                    <a href="employer-details.html">Roshu.co</a>
                                </h3>
                                <span>Part Time Job</span>
                                <p>
                                    <i class="flaticon-appointment"></i>
                                    10 min ago / Cardiff, England
                                </p>
                            </div>
                            <div class="bottom">
                                <ul>
                                    <li>Internet Operator</li>
                                    <li>Remote Work</li>
                                    <li>Duration: 2 Years</li>
                                </ul>
                                <span>Annual Salary</span>
                                <h4>66K</h4>
                                <a href="employer-details.html">
                                    <i class="flaticon-right-arrow"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mix m">
                        <div class="company-item">
                            <div class="feature-top-right">
                                <span>Featured</span>
                            </div>
                            <div class="top">
                                <a href="employer-details.html">
                                    <img src="{{asset('assets-v2/img/home-one/company6.png')}}" alt="Brand">
                                </a>
                                <h3>
                                    <a href="employer-details.html">Omti. Med</a>
                                </h3>
                                <span>Part Time Job</span>
                                <p>
                                    <i class="flaticon-appointment"></i>
                                    40 min ago / Tokyo, Japan
                                </p>
                            </div>
                            <div class="bottom">
                                <ul>
                                    <li>Caring Officer</li>
                                    <li>Remote Work</li>
                                    <li>Duration: 2 Years</li>
                                </ul>
                                <span>Annual Salary</span>
                                <h4>50K</h4>
                                <a href="employer-details.html">
                                    <i class="flaticon-right-arrow"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mix o">
                        <div class="company-item">
                            <div class="feature-top-right">
                                <span>Newest</span>
                            </div>
                            <div class="top">
                                <a href="employer-details.html">
                                    <img src="{{asset('assets-v2/img/home-one/company7.png')}}" alt="Brand">
                                </a>
                                <h3>
                                    <a href="employer-details.html">Rahbar</a>
                                </h3>
                                <span>Full Time Job</span>
                                <p>
                                    <i class="flaticon-appointment"></i>
                                    7 min ago / Washington, US
                                </p>
                            </div>
                            <div class="bottom">
                                <ul>
                                    <li>Media Connector</li>
                                    <li>Remote Work</li>
                                    <li>Duration: 3 Years</li>
                                </ul>
                                <span>Annual Salary</span>
                                <h4>87K</h4>
                                <a href="employer-details.html">
                                    <i class="flaticon-right-arrow"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mix n">
                        <div class="company-item">
                            <div class="feature-top-right">
                                <span>Most Viewed</span>
                            </div>
                            <div class="top">
                                <a href="employer-details.html">
                                    <img src="{{asset('assets-v2/img/home-one/company8.png')}}" alt="Brand">
                                </a>
                                <h3>
                                    <a href="employer-details.html">Doblin. Fo</a>
                                </h3>
                                <span>Part Time Job</span>
                                <p>
                                    <i class="flaticon-appointment"></i>
                                    12 min ago / California, US
                                </p>
                            </div>
                            <div class="bottom">
                                <ul>
                                    <li>Private Officer</li>
                                    <li>Remote Work</li>
                                    <li>Duration: 1 Year</li>
                                </ul>
                                <span>Annual Salary</span>
                                <h4>50K</h4>
                                <a href="employer-details.html">
                                    <i class="flaticon-right-arrow"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Company -->

        <!-- Pricing -->
        <section class="pricing-area pt-100 pb-70">
            <div class="container">
                <div class="section-title three">
                    <div class="sub-title-wrap">
                        <img src="{{asset('assets-v2/img/home-three/title-img.png')}}" alt="Icon">
                        <span class="sub-title">Pricing Package</span>
                    </div>
                    <h2>Affordable Pricing Plan</h2>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <div class="pricing-item">
                            <div class="top">
                                <h3>Premium</h3>
                                <span>For enormous Company</span>
                            </div>
                            <div class="middle">
                                <h4><span class="span-left">$</span> 560/ <span class="span-right">Month</span></h4>
                            </div>
                            <div class="end">
                                <ul>
                                    <li>Unlimited Job Categories</li>
                                    <li>Unlimited Job Posting</li>
                                    <li>Unlimited proposals</li>
                                    <li>Resume database access</li>
                                    <li>Individually written job ads</li>
                                </ul>
                                <a class="cmn-btn" href="index-3.html#">
                                    Get Started
                                    <i class='bx bx-plus'></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="pricing-item">
                            <div class="top">
                                <h3>Advanced</h3>
                                <span>For companies under 400</span>
                            </div>
                            <div class="middle">
                                <h4><span class="span-left">$</span> 399/ <span class="span-right">Month</span></h4>
                            </div>
                            <div class="end">
                                <ul>
                                    <li>400 Job Posting</li>
                                    <li>90 Job Categories</li>
                                    <li>Unlimited proposals</li>
                                    <li>Resume database access</li>
                                    <li>Individually written job ads</li>
                                </ul>
                                <a class="cmn-btn" href="index-3.html#">
                                    Get Started
                                    <i class='bx bx-plus'></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="pricing-item">
                            <div class="top">
                                <h3>Basic</h3>
                                <span>For companies under 80</span>
                            </div>
                            <div class="middle">
                                <h4><span class="span-left">$</span> 150/ <span class="span-right">Month</span></h4>
                            </div>
                            <div class="end">
                                <ul>
                                    <li>50 Job Posting</li>
                                    <li>20 Job Categories</li>
                                    <li>Unlimited proposals</li>
                                    <li>Resume database access</li>
                                    <li><del>Individually written job ads</del></li>
                                </ul>
                                <a class="cmn-btn" href="index-3.html#">
                                    Get Started
                                    <i class='bx bx-plus'></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="pricing-item">
                            <div class="top">
                                <h3>Free</h3>
                                <span>For companies under 10</span>
                            </div>
                            <div class="middle">
                                <h4><span class="span-left">$</span> 100/ <span class="span-right">Month</span></h4>
                            </div>
                            <div class="end">
                                <ul>
                                    <li>10 Job Posting</li>
                                    <li>15 Job Categories</li>
                                    <li>Unlimited proposals</li>
                                    <li><del>Resume database access</del></li>
                                    <li><del>Individually written job ads</del></li>
                                </ul>
                                <a class="cmn-btn" href="index-3.html#">
                                    Get Started
                                    <i class='bx bx-plus'></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Pricing -->

        <!-- Partner -->
        <div class="partner-area two pb-70">
            <div class="container">
                <div class="partner-slider owl-theme owl-carousel">
                    <div class="partner-item">
                        <img src="{{asset('assets-v2/img/home-one/partner1.png')}}" alt="Partner">
                        <img src="{{asset('assets-v2/img/home-one/partner1.png')}}" alt="Partner">
                    </div>
                    <div class="partner-item">
                        <img src="{{asset('assets-v2/img/home-one/partner2.png')}}" alt="Partner">
                        <img src="{{asset('assets-v2/img/home-one/partner2.png')}}" alt="Partner">
                    </div>
                    <div class="partner-item">
                        <img src="{{asset('assets-v2/img/home-one/partner3.png')}}" alt="Partner">
                        <img src="{{asset('assets-v2/img/home-one/partner3.png')}}" alt="Partner">
                    </div>
                    <div class="partner-item">
                        <img src="{{asset('assets-v2/img/home-one/partner4.png')}}" alt="Partner">
                        <img src="{{asset('assets-v2/img/home-one/partner4.png')}}" alt="Partner">
                    </div>
                    <div class="partner-item">
                        <img src="{{asset('assets-v2/img/home-one/partner5.png')}}" alt="Partner">
                        <img src="{{asset('assets-v2/img/home-one/partner5.png')}}" alt="Partner">
                    </div>
                    <div class="partner-item">
                        <img src="{{asset('assets-v2/img/home-one/partner1.png')}}" alt="Partner">
                        <img src="{{asset('assets-v2/img/home-one/partner1.png')}}" alt="Partner">
                    </div>
                </div>
            </div>
        </div>
        <!-- End Partner -->

        <!-- Client -->
        <section class="client-area ptb-100">
            <div class="client-img">
                <img src="{{asset('assets-v2/img/home-three/client1.jpg')}}" alt="Client">
                <img src="{{asset('assets-v2/img/home-three/client2.jpg')}}" alt="Client">
                <img src="{{asset('assets-v2/img/home-three/client3.jpg')}}" alt="Client">
                <img src="{{asset('assets-v2/img/home-three/client4.jpg')}}" alt="Client">
                <img src="{{asset('assets-v2/img/home-three/client5.jpg')}}" alt="Client">
                <img src="{{asset('assets-v2/img/home-three/client6.jpg')}}" alt="Client">
            </div>
            <div class="container">
                <div class="section-title three">
                    <div class="sub-title-wrap">
                        <img src="{{asset('assets-v2/img/home-three/title-img.png')}}" alt="Icon">
                        <span class="sub-title">Testimonials</span>
                    </div>
                    <h2>Our Trusted Clients</h2>
                </div>
                <div class="client-slider owl-theme owl-carousel">
                    <div class="client-item">
                        <p>Awesome dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaenimminim veniam quis nostrud  dolore magn</p>
                        <h3>Devit M. Kolin</h3>
                        <span>CEO & Founder</span>
                    </div>
                    <div class="client-item">
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that </p>
                        <h3>Tom Henry</h3>
                        <span>Director</span>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Client -->

        <!-- Blog -->
        <section class="blog-area three pt-100 pb-70">
            <div class="container">
                <div class="section-title three">
                    <div class="sub-title-wrap">
                        <img src="{{asset('assets-v2/img/home-three/title-img.png')}}" alt="Icon">
                        <span class="sub-title">News & Blog</span>
                    </div>
                    <h2>Latest Blog Posts</h2>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-lg-4">
                        <div class="blog-item">
                            <div class="top">
                                <a href="blog-details.html">
                                    <img src="{{asset('assets-v2/img/home-one/blog1.jpg')}}" alt="Blog">
                                </a>
                            </div>
                            <span>Job skills. 12-09-2020</span>
                            <h3>
                                <a href="blog-details.html">The Internet Is A Job Seeker Most Crucial Success </a>
                            </h3>
                            <div class="cmn-link">
                                <a href="blog-details.html">
                                    <i class="flaticon-right-arrow one"></i>
                                    Learn More
                                    <i class="flaticon-right-arrow two"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="blog-item">
                            <div class="top">
                                <a href="blog-details.html">
                                    <img src="{{asset('assets-v2/img/home-one/blog2.jpg')}}" alt="Blog">
                                </a>
                            </div>
                            <span>Career advice. 11-09-2020</span>
                            <h3>
                                <a href="blog-details.html">Today From Connecting With Potential Employers</a>
                            </h3>
                            <div class="cmn-link">
                                <a href="blog-details.html">
                                    <i class="flaticon-right-arrow one"></i>
                                    Learn More
                                    <i class="flaticon-right-arrow two"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 offset-sm-3 offset-lg-0 col-lg-4">
                        <div class="blog-item">
                            <div class="top">
                                <a href="blog-details.html">
                                    <img src="{{asset('assets-v2/img/home-one/blog3.jpg')}}" alt="Blog">
                                </a>
                            </div>
                            <span>Future plan. 10-09-2020</span>
                            <h3>
                                <a href="blog-details.html">We’ve Weeded Through Hundreds Of Job Hunting</a>
                            </h3>
                            <div class="cmn-link">
                                <a href="blog-details.html">
                                    <i class="flaticon-right-arrow one"></i>
                                    Learn More
                                    <i class="flaticon-right-arrow two"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Blog -->

        <!-- Footer -->
        <footer class="footer-area three pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-lg-4">
                        <div class="footer-item three">
                            <div class="footer-logo">
                                <a class="logo" href="index.html">
                                    <img src="{{asset('assets-v2/img/logo-three.png')}}" alt="Logo">
                                </a>
                                <ul>
                                    <li>
                                        <span>Address: </span>
                                        2659 Autostrad St, London, UK
                                    </li>
                                    <li>
                                        <span>Message: </span>
                                        <a href="mailto:hello@jecto.com">hello@jecto.com</a>
                                    </li>
                                    <li>
                                        <span>Phone: </span>
                                        <a href="tel:2151234567">215 - 123 - 4567</a>
                                    </li>
                                    <li>
                                        <span>Open: </span>
                                        Mon - Fri / 9:00 AM - 6:00 PM
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="footer-item three">
                            <div class="footer-service">
                                <h3>Our Services</h3>
                                <ul>
                                    <li>
                                        <a href="index-3.html#" target="_blank">Accounting</a>
                                    </li>
                                    <li>
                                        <a href="index-3.html#" target="_blank">Teachers</a>
                                    </li>
                                    <li>
                                        <a href="index-3.html#" target="_blank">Customer Service</a>
                                    </li>
                                    <li>
                                        <a href="index-3.html#" target="_blank">Digital Marketing</a>
                                    </li>
                                    <li>
                                        <a href="index-3.html#" target="_blank">Web & Software Dev</a>
                                    </li>
                                    <li>
                                        <a href="index-3.html#" target="_blank">Science & Analytics</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-2">
                        <div class="footer-item three">
                            <div class="footer-service">
                                <h3>Useful Links</h3>
                                <ul>
                                    <li>
                                        <a href="privacy-policy.html" target="_blank">Privacy Policy</a>
                                    </li>
                                    <li>
                                        <a href="terms-conditions.html" target="_blank">Terms & Conditions</a>
                                    </li>
                                    <li>
                                        <a href="jobs.html" target="_blank">Jobs</a>
                                    </li>
                                    <li>
                                        <a href="candidates.html" target="_blank">Candidates</a>
                                    </li>
                                    <li>
                                        <a href="blog.html" target="_blank">Blog</a>
                                    </li>
                                    <li>
                                        <a href="contact.html" target="_blank">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="footer-item three">
                            <div class="footer-newsletter">
                                <h3>Newsletter</h3>
                                <p>Lorem ipsum dolor sit amet conscu adipiscing elit sed</p>
                                <form class="newsletter-form" data-toggle="validator">
                                    <input type="email" class="form-control" placeholder="Your email*" name="EMAIL" required autocomplete="off">
            
                                    <button class="btn" type="submit">
                                        <i class="flaticon-send"></i>
                                    </button>
                                    <div id="validator-newsletter" class="form-result"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
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