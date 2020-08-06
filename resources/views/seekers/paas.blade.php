@extends('layouts.general-layout')

@section('content')

<style>
    .masthead {
    height: 90vh;
    min-height: 400px;
    font-size: 95%;
    background-image:url('/images/mid.png');
    background-size: cover;
    color: white;
    background-position: center;
    background-repeat: no-repeat;
    }
</style>


<!-- animation styling -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="/css/infinite-slider.css">
<link rel="stylesheet" href="/css/seeker.css">
<script type="text/javascript" src="/js/carousel.js">
</script>

<div>

    <div>

      <!-- Full Page Image Header with Vertically Centered Content -->
    <header class="masthead">
      <div class="container h-100">
        <div class="row h-100 align-items-center">
          <div class="col-md-12 text-left">
            <h3 class="font-weight-bold">Are you looking for part-time work?<br>
               A new solution is here for you.</h3>
            <br><br>
            <button type="button" class="btn btn-purple">Call US <i class="fas fa-phone"></i></button>
            <button type="button" class="btn btn-orange" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Subscribe</button>

          </div>
        </div>
      </div>
    </header>

    </div>

    <div class="container pt-3">

      <div class="row pt-2">
        <div class="col-lg-6">
            <iframe src="https://www.youtube.com/embed/lJIrF4YjHfQ" style="height: 350px; !important;"></iframe>
        </div>

        <div class="col-lg-6 mx-auto">
            <div class="card border-light mb-3 mx-auto mt-2" style="max-width: 20rem;">
              <div class="card-header"><h3>Pro as a Service</h13></div>
              <div class="card-body">
                <div class="card-text">
                  <p class="h5 p-3">PAAS is a service that seeks to provide qualified professionals on demand to
                  handle specific tasks at affordable rates and at a cost effective....</p>
                </div>
                <!-- Large modal -->
                <button type="button" class="btn btn-orange" data-toggle="modal" data-target=".bd-example-modal-lg">Learn More</button>

                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg p-2">
                  <div class="modal-content p-4">
                     <h1 class="bg-light">Product Description</h1>

                     <div>
                       PAAS is a service that seeks to provide qualified professionals on demand to
                       handle specific tasks at affordable rates and at a cost effective plan.
                       <br><br>
                       It is created to fulfill the need of employers for mid-level and senior
                       positions that became vacant due to theCOVID-19 pandemic.
                       <br><br>
                       Lay-offs by companies led to reassessment of processes in the companies.
                       PAAS seeks to connect experienced persons to the SMEs.
                       It also provides a processing framework to SMEs and part-time professionals to effectively fill in the gap


                     </div>

                     <div class="modal-footer">
                       <button type="button" class="btn btn-orange">Contact Us</button>
                       <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                     </div>

                  </div>
                </div>
                </div>

              </div>

            </div>

        </div>

      </div>

<!-- start of description container -->
<div class="container" id="#">

      <div class="row pt-5">
        <!-- testimonials -->

          <div class="col-lg-6 pt-2 mb-3">

            <h2 class="text-center">Testimonials</h2>
            <div class="container mt-2">
<!-- testimonials -->
                <div id="carouselContent" class="carousel slide pt-3" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active text-center">
                             <p style="font-size: 30px">I have found a steady stream of work from PaaS Membership club. All pros need
                               watch this space.</p><br>
                               <p style="font-weight: bold;">John Doe</p>
                        </div>
                        <div class="carousel-item text-center p-4">

                            <p style="font-size: 30px">PaaS Membership gave me a lifeline. I have been active for 3 months now</p><br>
                            <p style="font-weight: bold;">Tom Cruise</p>
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

          <!-- pricing section -->

          <div class="col-lg-6 mb-3">
            <div>

              <div class="card border-light mt-4" style="max-width: 30rem;">
                <div class="card-header"><h2>Pricing  <span style="color: orange;">2750KES</span></h2></div>
                <div class="card-body">
                  <h5 class="card-title">What you get</h5>
                  <p class="card-text pb-3">
                    Visibility from multiple clients. <br>
                    Project management tools that you can utilize in your project. <br>
                    End-to-end recruitment training ensuring you pass interview and get task. <br>
                  </p>

                  <!-- modal starts here within card -->
                  <button type="button" class="btn btn-orange" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Subscribe</button>

                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog p-5" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Subscription Details</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <!-- subscribe form for Professional -->
                            <form action="#" method="#">
                              <div class="form-group">
                                <label class="h5">Fill your name</label>
                                <input type="text" class="form-control" id="recipient-name" placeholder="Name">
                              </div>
                              <div class="form-group">
                              <div class="form-group">
                                <label class="h5 pr-2">Industry</label>
                                <select name="industry" id="industry" class="select">
                                  <option value="accountant">Accountant</option>
                                  <option value="it">IT Specialist</option>
                                  <option value="analyst">Data Analyst</option>
                                  <option value="build">Building and Construction</option>
                                </select>
                              </div>
                                <label class="h5">Email Address</label>
                                <input type="email" class="form-control" id="recipient-email" placeholder="Email">
                              </div>
                              <div class="form-group">
                                <label class="h5">Phone Number</label>
                                <input type="text" class="form-control" id="recipient-phone" placeholder="Phone">
                              </div>

                              <div class="modal-footer">
                                <button type="button" class="btn btn-orange">Subscribe</button>
                                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                              </div>

                            </form>
                        </div>

                      </div>
                    </div>
                  </div>

                  <!-- end modal in card -->
                </div>
              </div>

              <!-- text carousel -->

            </div>
          </div>    <!-- end of pricing-->

      </div>

</div>

<!-- Partners -->

      <div class="container">
        <div class="container text-center">
          <h1>Potential Employers!</h1>
        </div>
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




@endsection
