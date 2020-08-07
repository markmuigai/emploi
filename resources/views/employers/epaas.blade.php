@extends('layouts.general-layout')

@section('content')

<style>
    .masthead {
    height: 90vh;
    min-height: 400px;
    font-size: 95%;
    opacity: 0.9;
    background-image: url('/images/js.jpg');
    background-size: cover;
    color: white;
    background-position: center;
    background-repeat: no-repeat;
    }
</style>

<link rel="stylesheet" href="/css/infinite-slider.css">
<script type="text/javascript" src="/js/carousel.js">
</script>


    <div>

      <!-- Full Page Image Header with Vertically Centered Content -->
    <header class="masthead">
      <div class="container h-100">
        <div class="row h-100 align-items-center">
          <div class="col-lg-12 text-left">
            <h1 class="font-weight-light">Are you looking for part-time <br>professionals? A new solution is here for you.</h1>
            <br><br>
            <a href="tel:+254702068282" class="btn btn-purple">Call US <i class="fas fa-phone"></i></a>
            <button type="button" class="btn btn-orange" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
              Subscribe</button><br>
          </div>
            @if(session()->has('success'))
            <div class="alert alert-success">
            {{ session()->get('success') }}
            </div>
            @endif
        </div>
      </div>
    </header>

    </div>

    <div class="container pt-3">

      <div class="row">
        <div class="col-lg-6 pb-3">
          <iframe style="height: 350px !important;" src="https://www.youtube.com/embed/lJIrF4YjHfQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

        <div class="col-lg-6 pb-3 mx-auto">
            <div class="card border-light mb-3 mx-auto" style="max-width: 100%;">
              <div class="card-header"><h3>What is PAAS</h3></div>
              <div class="card-body">
                <!-- <h5 class="card-title">Light card title</h5> -->
                <p class="card-text">PAAS is a service that seeks to provide qualified professionals on demand to handle specific tasks at affordable rates/at a cost effective plan. It is created to fulfill the need of employers for mid-level and senior positions that became vacant due to the COVID-19 pandemic.
                Lay-offs by companies led to reassessment of processes in the companies. PAAS seeks to connect experienced persons to the SMEs. It also provides a processing framework to SMEs and part-time professionals to effectively fill in the gap.</p>
              </div>
              <div class="Button text-center">
                <a href="#benefits">
                  <button type="button" class="btn btn-orange">Membership Benefits</button>
                </a>
              </div>
            </div>

        </div>

      <!-- Partners -->
      <div class="container mt-5">
        <hr>

            <h2 class="text-center">Our Partners</h2>
            <hr>
            <div class="container pt-4 pb-4">
              <section class="customer-logos slider">
                <div class="slide"><img src="/images/logos/texas.webp"></div>
                <div class="slide"><img src="/images/logos/uniliver.webp"></div>
                <div class="slide"><img src="/images/logos/sanlam.webp"></div>
                <div class="slide"><img src="/images/logos/rvibs.webp"></div>
                <div class="slide"><img src="/images/logos/papaya.webp"></div>
                <div class="slide"><img src="/images/logos/neema.webp"></div>
                <div class="slide"><img src="/images/logos/mboga.webp"></div>
                <div class="slide"><img src="/images/logos/apa.webp"></div>
              </section>
            </div>
      </div>
      <hr>

  </div>

</div>

<!-- start of description container -->
<div class="container" id="#">

      <div class="row pt-5 pb-5">

        <!-- pricing section -->

        <div class="col-md-6">
          <div>

            <div class="card border-light mb-3" style="max-width: 100%; align-items: center;">
              <div class="card-header"><h2>Membership<br> <span style="color: orange;">Ksh. 5500 Annually</span></h2></div>
              <div class="card-body">
                <h5 class="card-title">What you get.</h5>
                <p class="card-text pb-5">
                  Project management tools. <br>
                  End-to-end recruitment process management and support. <br>
                  Discounts on some of our services. <br>
                  A peace of mind for your next task.
                </p>

                <!-- modal starts here within card -->
                <button type="button" class="btn btn-orange" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Subscribe</button>

                <div class="modal fade p-5" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Subscription Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                            <form method="POST"  enctype="multipart/form-data" action="/employers/subscribe-paas">
                                  @csrf
                                  <label>Name</label>
                                  <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Enter Your Name" required>
                                  </div>
                                  <label>Email</label>
                                  <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Enter Your Email Address" required>
                                  </div>
                                  <label>Phone Number</label>
                                  <div class="form-group">
                                    <input type="text" class="form-control" name="phone_number" placeholder="Enter Your Phone Number" required>
                                  </div>
                                  <div class="pt-3">
                                    <input type="submit" class="btn btn-orange" name="button" value="Subscribe">
                                    <div class="btn btn-oange" style="float: right;"  data-dismiss="modal">Close</div>
                                  </div>

                            </form>
                      </div>

                    </div>
                  </div>
                </div>

                <!-- end modal in card -->
              </div>
            </div>

          </div>
        </div>

          <div class="col-lg-6">
            <div class="text-center pb-2"><p class="h2">Testimonials</p></div>
            <div class="container">
            <!-- testimonials -->
                <div id="carouselContent" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active text-center">
                             <p style="font-size: 30px">Having worked with professionals in PaaS has increased our company's revenue. We are impressed.</p><br>
                               <p style="font-weight: bold;">Small Clothing Business</p>
                        </div>
                        <div class="carousel-item text-center p-4">

                            <p style="font-size: 30px">PaaS gave us the talent that we were looking for. The professionals referred are top notch.</p><br>
                            <p style="font-weight: bold;">Milky Way</p>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselContent" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselContent" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </div>

          </div>

          <!-- end of first description row -->
      </div>
      
      <div class="row pt-3" id="benefits">
        <div class="col-lg">
          <div>
            <div class="card">
              <div class="card-header bg-orange rounded-10">
                <h2 class="text-center bg-light">Benefits of PaaS Membership</h2>
              </div>
              <div class="card-body">
                <div class="card-text h5">
                  <ol>
                    <li>Access to networking with a large pool of professionals through Know The Professional networking program.</li>
                    <li>Access to free on-demand HR advisory services.</li>
                    <li>Immediate replacement to vacancies left by a PAAS professional</li>
                    <li>Discounted rates on advertisement of vacancies (50% for the first 6 months)</li>
                    <li>Highest chances of landing a potential fulltime employee in the long run.</li>
                    <li>Accessibility to other employer tools free of charge for the duration of the contract.</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>

        </div>
      
      </div>

</div>



@endsection
