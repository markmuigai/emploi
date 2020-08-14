<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    @include('feed::links')
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title')</title>
    @include('components.meta')
    
    <!-- Template CSS -->
    <link rel="stylesheet" href="/css/zip.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- web fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700&display=swap" rel="stylesheet">
    <!-- //web fonts -->
  </head>
  <body>
<div class="w3l-bootstrap-header fixed-top">
  <nav class="navbar navbar-expand-lg navbar-light p-2" style="background-color: #500095; border: #500095">
    <div class="container">
      {{-- <a class="navbar-brand" href="/">
        <img src="/images/logo-alt.png" style="width: 5em">
      </a> --}} 
    <a class="navbar-brand" href="/">
        <img src="/images/logo-alt.png" alt="Emploi" title="Emploi logo" style="height:35px;" />
    </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent"  style="background-color: #500095; border: none">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="/" style="color: white">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/about" style="color: white">About Us</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="/employers/publish" style="color: white">Advertise</a>
          </li>
          @guest
          <li class="nav-item">
            <a class="nav-link" href="/job-seekers/services" style="color: white;">For Job Seekers</a>
          </li>
          @else
              <li class="nav-item">
                <a class="nav-link" href="/home" style="color: white;">Profile</a>
              </li>

          @endguest
        </ul>
        <div class="form-inline">
          @guest
          <a href="/login?redirectToUrl={{ url('/employers/publish') }}" class="login mr-4"  style="color: white">Log In</a>
          {{-- <a href="tel:+254702068282" class="btn btn-primary btn-theme" style="background-color: #E15419">
            <i class="fa fa-phone"></i> Call Us
          </a> --}}
          @else
              <a href="/logout" class="login mr-4"  style="color: white">Log out</a>
              <a href="/home" class="btn btn-primary btn-theme" style="background-color: #E15419">Dashboard</a>
          @endguest
        </div>
      </div>
    </div>
  </nav>
</div>
@yield('content')
@if(!isset($disableZipFooter))
{{-- <section class="w3l-index-block10">
  <div class="new-block top-bottom">
    <div class="container">
      <div class="middle-section">
        <!-- <h5>Tagline</h5> -->
        <div class="section-width">
          <h2>Emploi Covid-19 Response</h2>
        </div>
        <div class="link-list-menu">
            <p class="mb-5">See how we are supporting companies and individuals in the fight against COVID-19</p>
            <a href="/covid19-information-series" class="btn btn-outline-light btn-more">Read More <span class="fa fa-arrow-right" aria-hidden="true"></span></a>
        </div>
      </div>
    </div>
    </div>
  </section> --}}
@endif
<!-- index-block8 -->
<section class="w3l-index-block8 py-5">
  <div class="container py-md-3 text-center">
    <div class="heading text-center mx-auto">
      <h3 class="head">Have questions? We're here to help. </h3>
    </div>
    <div class="buttons mt-4">
      <a href="/post-a-job" class="btn btn-outline-primary m-2 btn-demo">Post a Job</a>
      <a href="/contact" class="btn btn-primary btn-demo m-2">Contact Us</a>
      <a href="tel:+254702068282" class="btn btn-outline-primary m-2 btn-demo"><i class="fa fa-phone"></i> 0702 068 282</a>
    </div>
  </div>
</section>
<!-- / index-block8 -->
      <!-- footer-28 block -->
      <section class="w3l-market-footer">
        <footer class="footer-28">
          <div class="footer-bg-layer">
            <div class="container py-lg-3">
              <div class="row footer-top-28">
                <div class="col-md-6 footer-list-28 mt-5">
                  <h6 class="footer-title-28">Contact information</h6>
                  <ul>
                    <li>
                      <p><strong>Address</strong> : Even Business Park, Airport North Rd, Nairobi</p>
                    </li>
                    <li>
                      <p>
                        <strong>Phone</strong> : 
                          <a href="tel:+254702068282">0702-068-282</a> | 
                          <a href="tel:+254774569001">0774-569-001</a> | 
                          <a href="tel:+254772795017">0772-795-017</a>
                      </p>
                    </li>
                    <li>
                      <p><strong>Email</strong> : <a href="mailto:info@emploi.co">info@emploi.co</a></p>
                    </li>
                  </ul>

                  <div class="main-social-footer-28 mt-3">
                    <ul class="social-icons">
                      <li class="facebook">
                        <a href="https://www.facebook.com/emploi.co/" title="Facebook">
                          <span class="fa fa-facebook" aria-hidden="true"></span>
                        </a>
                      </li>
                      <li class="twitter">
                        <a href="https://twitter.com/emploiafrica" title="Twitter">
                          <span class="fa fa-twitter" aria-hidden="true"></span>
                        </a>
                      </li>
                      <li class="linkedin">
                        <a href="https://ke.linkedin.com/company/emploike" title="LinkedIn">
                          <span class="fa fa-linkedin" aria-hidden="true"></span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-4 footer-list-28 mt-5">
                      <h6 class="footer-title-28">Company</h6>
                      <ul>
                        <li><a href="/about">About</a></li>
                        <li><a href="/blog">Career Centre</a></li>
                        <li><a href="/employers/faqs">FAQs</a></li>
                        <li><a href="/vacancies">Vacancies</a></li>
                      </ul>
                    </div>
                    <div class="col-md-4 footer-list-28 mt-5">
                      <h6 class="footer-title-28">Support</h6>
                      <ul>
                        <li><a href="/contact">Contact Us</a></li>
                        <li><a href="/join">Create account</a></li>
                      </ul>
                    </div>
                    <div class="col-md-4 footer-list-28 mt-5">
                      <h6 class="footer-title-28">Product</h6>
                      <ul>
                        <li><a href="/employers/publish">Advertise</a></li>
                        <li><a href="/employers/browse">Browse Candidates</a></li>
                        <li><a href="/employers/premium-recruitment">Premium Recruitment</a></li>
                        <li><a href="/checkout?product=featured_company">Get Featured</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="midd-footer-28 align-center py-lg-4 py-3 mt-5">
              <div class="container">
                <p class="copy-footer-28 text-center"> &copy; {{ date('Y') }} Emploi. All Rights Reserved.</p>
              </div>
            </div>
          </div>
        </footer>

        <!-- move top -->
        <button onclick="topFunction()" id="movetop" title="Go to top">
          &#10548;
        </button>
        <script>
          // When the user scrolls down 20px from the top of the document, show the button
          window.onscroll = function () {
            scrollFunction()
          };

          function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
              document.getElementById("movetop").style.display = "block";
            } else {
              document.getElementById("movetop").style.display = "none";
            }
          }

          // When the user clicks on the button, scroll to the top of the document
          function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
          }
        </script>
        <!-- /move top -->
      </section>
      <!-- //footer-28 block -->

      <!-- jQuery, Bootstrap JS -->
      
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

      <!-- Template JavaScript -->
      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

      <!-- script for owlcarousel -->
      <script>
        $(document).ready(function () {
          $('.owl-one').owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            responsiveClass: true,
            autoplay: false,
            autoplayTimeout: 5000,
            autoplaySpeed: 1000,
            autoplayHoverPause: false,
            responsive: {
              0: {
                items: 1,
                nav: false
              },
              480: {
                items: 1,
                nav: false
              },
              667: {
                items: 1,
                nav: true
              },
              1000: {
                items: 1,
                nav: true
              }
            }
          })
        })
      </script>
      <!-- //script for owlcarousel -->

      <!-- disable body scroll which navbar is in active -->
      <script>
        $(function () {
          $('.navbar-toggler').click(function () {
            $('body').toggleClass('noscroll');
          })
        });
      </script>
      <!-- disable body scroll which navbar is in active -->

      <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
      @include('components.tawk')
      <script>
        $(document).ready(function () {
          $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline',

            fixedContentPos: false,
            fixedBgPos: true,

            overflowY: 'auto',

            closeBtnInside: true,
            preloader: false,

            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
          });

          $('.popup-with-move-anim').magnificPopup({
            type: 'inline',

            fixedContentPos: false,
            fixedBgPos: true,

            overflowY: 'auto',

            closeBtnInside: true,
            preloader: false,

            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-slide-bottom'
          });
        });
      </script>

</body>
</html>