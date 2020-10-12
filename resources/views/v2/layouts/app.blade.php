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

        <link rel="icon" sizes="512x512" href="{{ asset('images/favicon.png') }}">
    </head>
    <body>
        <!-- Preloader -->
        @include('v2.components.preloader')
        <!-- End Preloader -->

        <!-- Navbar -->
        @include('v2.components.guest.navbar')
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
        @include('v2.components.copyright')
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