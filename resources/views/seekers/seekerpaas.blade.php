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
            <h1 class="font-weight-light">Get Hired as a Part-time Professional</h1>
            <br><br>
            <button type="button" class="btn btn-purple">Read More</button>
            <button type="button" class="btn btn-orange" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Subscribe</button>

          </div>
        </div>
      </div>
    </header>

    </div>

    <div class="container pt-3">

      <div class="row">
        <div class="col-lg-7 pr-5">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/lJIrF4YjHfQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

        <div class="col-lg-5 mx-auto">
            <div class="card border-light mb-3 mx-auto" style="max-width: 20rem;">
              <div class="card-header"><h3>For Your Demand Job</h13></div>
              <div class="card-body">
                <!-- <h5 class="card-title">Light card title</h5> -->
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
              <div class="Button text-center">
                <a href="#">
                  <button type="button" class="btn btn-orange">Learn More</button>
                </a>
              </div>
            </div>

        </div>

        <section>
      <!-- Partners -->
      <div class="container">
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
    </section>

  </div>

</div>

<!-- start of description container -->
<div class="container" id="#">

      <div class="row pt-5 pb-5">

        <!-- pricing section -->

        <div class="col-lg-6">
          <div>

            <div class="card border-light mb-3" style="max-width: 30rem;">
              <div class="card-header"><h2>Pricing  <span style="color: orange;">55USD</span></h2></div>
              <div class="card-body">
                <h5 class="card-title">Pay and Enjoy</h5>
                <p class="card-text pb-5">
                  Having you subscribed will open many more tools that you can use for your business. <br>
                  You will unlock project management tools that you can utilize in your organization. <br>
                  We also do the recruitment process for you, giving you time to plan on task executuion.
                </p>

                <!-- modal starts here within card -->
                <button type="button" class="btn btn-orange" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Subscribe</button>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Subscription Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <form action="#" method="#">
                            <div class="form-group">
                              <input type="text" class="form-control" id="recipient-name" placeholder="Enter Your Name">
                            </div>
                            <div class="form-group">
                              <input type="email" class="form-control" id="recipient-email" placeholder="Enter Your Email Address">
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" id="recipient-phone" placeholder="Enter Your Phone Number">
                            </div>

                          </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-orange">Subscribe</button>
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
            <div class="container">
<!-- testimonials -->
                <div id="carouselContent" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active text-center p-4">
                             <p>lorem ipsum (imagine longer text) <br> lorem ipsum</p>
                        </div>
                        <div class="carousel-item text-center p-4">

                            <p>lorem ipsum (imagine longer text)</p>
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

</div>



@endsection
