@extends('layouts.zip')
@section('title','Request Part-timer')
@section('description')
Request Professionals Emploi and reach an audience of 100k+, get access to Premium Shortlisting tools and Candidate Ranking algorithims. Request professional in two minutes.
@endsection



@section('content')

<?php
$user = isset(Auth::user()->id) ? Auth::user() : false;
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>

<link rel="stylesheet" href="/css/infinite-slider.css">
<link rel="stylesheet" href="/css/seeker.css">
<script type="text/javascript" src="/js/carousel.js">
</script>

<style>
    .benefits{
        padding-top: 4;
        margin: 0;
        padding: 0;
        min-height: 70vh;
        max-height: 70vh;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: consolas;
    }

    .container1{
        width: 1000px;
        position: relative;
        display: flex;
        justify-content: space-around;
    }

    .container1 .card{
        margin-top: 10px;
        position: relative;
        cursor: pointer;
    }

    .container1 .card .face{
        width: 230px;
        height: 180px;
        transition: 0.5s;
    }

    .container1 .card .face.face1{
        position: relative;
        background: #500095;
        display: flex;
        justify-content: center;
        align-items: center;
        transform: translateY(100px);
    }

    .container1 .card:hover .face.face1{
        background: #E15419;
        transform: translateY(0);
    }

    .container1 .card .face.face1 .content{
        opacity: 0.2;
        transition: 0.5s;
    }

    .container1 .card:hover .face.face1 .content{
        opacity: 1;
    }

    .container1 .card .face.face1 .content img{
        max-width: 100px;
    }

    .container1 .card .face.face1 .content h3{
        padding: 0;
        color: #fff;
        text-align: center;
        font-size: 1.5em;
    }

    .container1 .card .face.face2{
        position: relative;
        background: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
        transform: translateY(-100px);
    }

    .container1 .card:hover .face.face2{
        transform: translateY(0);
    }

    .container1 .card .face.face2 .content p{
        margin: 0;
        padding: 0;
    }

    .container1 .card .face.face2 .content a{
        display:  inline-block;
        text-decoration: none;
        font-weight: 900;
        color: #333;
        padding: 3px;
    }

    .container1 .card .face.face2 .content a:hover{
        background: #333;
        color: #fff;
    }
</style>



<!-- //index-block1 -->
<!-- index-block2 -->
<!-- /index-block2 -->

<a href="/employers/rpaas" style="background-color: #E15419" class="btn btn-theme">Request</a>
<a href="#exampleModal" style="background-color: #500095" class="btn btn-theme" id="request-part-timer" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Join E-Club <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span></a>
<!-- content-with-photo17 -->
<section class="w3l-index-block3">
  <div class="section-info py-5">
    <div class="container py-md-3">
      <div class="row pt-1">
        <div class="col-md-12 pb-4">
          <div class="text-center h2">
            Welcome to E-Club Membership Page
          </div>
        </div>
      </div>
      <div class="row cwp17-two align-items-center">
        <div class="col-md-6 bg-white">
          <div class="container-fluid">
            <img src="/images/seeker-join.png" alt="">
          </div>
          {{-- <iframe src="https://www.youtube.com/embed/lJIrF4YjHfQ" style="height: 350px; width: 550px; !important;"></iframe> --}}
        </div>
        <div class="col-md-6 cwp17-text pb-4">
          <br><br>
                <p class="card-text pb-2"><br>Emploi’s E-club is a membership programme for employers looking to hire part-time professionals.
                </p>
                 
                <button class="btn pt-1" style="background-color: #E15419; color: white;" id="request-part-timer" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Join E-Club <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span></button>
                <br><br><br>

          </div>

        </div>

        </div>
      </div>
    </div>
  </div>
</section>


      <section class="w3l-index-block2 pt-1 pb-4 bg-light">

        <div class="container py-md-2">
          <div class="heading text-center mx-auto">
            <h3 class="head">Top Benefits</h3>
          </div>
          <div class="row bottom_grids pt-md-3">
            <div class="col-lg-3 col-m-5 mt-5">
              <div class="s-block p-2">
                <img src="/images/zip/s3.png" alt="" class="img-fluid" />
                <h3 class="my-3">HR Advisory</h3>
                <p class="">Access to free on-demand HR advisory services and networking opportunities.</p>
              </div>
            </div>
    
            <div class="col-lg-3 col-m-5 mt-5">
              <div class="s-block p-2">
                <img src="/images/zip/s1.png" alt="" class="img-fluid" /><br><br>
                <h3 class="my-3">Payment</h3>
                <p class="">Friendly and staggered monthly payments. Invoice sent on time.</p>
              </div>
            </div>
    
            <div class="col-lg-3 col-m-5 mt-5">
              <div class="s-block p-2">
                <img src="/images/zip/s2.png" alt="" class="img-fluid" />
                <h3 class="my-3">Discounts</h3>
                <p class="">Discounted rates on other Emploi services like job advertisements.</p>
              </div>
            </div>
    
            <div class="col-lg-3 col-md-5 mt-5">
              <div class="s-block p-2">
                  <img src="/images/zip/s1.png" alt="" class="img-fluid" />
                  <h3 class="my-3">Free Access</h3>
                  <p class="">Access to other Emploi tools for recruitment and talent management.</p>
              </div>
            </div>
           
    
    
          </div>
        </div>
      
      </section>

<!-- <section class="benefits bg-light">
    
    <div class="container1 container">
            <div class="card">
                <div class="face face1">
                    <div class="content">
                        <img src="https://github.com/Jhonierpc/WebDevelopment/blob/master/CSS%20Card%20Hover%20Effects/img/code_128.png?raw=true">
                        <h3>HR Advisory</h3>
                    </div>
                </div>
                <div class="face face2">
                    <div class="content">
                        <p>Access to free on-demand HR advisory services and networking opportunities.</p><br><br>
                    </div>
                </div>
            </div>
        
            <div class="card">
                <div class="face face1">
                    <div class="content">
                        <img src="https://github.com/Jhonierpc/WebDevelopment/blob/master/CSS%20Card%20Hover%20Effects/img/launch_128.png?raw=true">
                        <h3>Payment</h3>
                    </div>
                </div>
                <div class="face face2">
                    <div class="content">
                        <p>Friendly and staggered monthly payments. Invoice sent on time.</p><br><br>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="face face1">
                    <div class="content">
                        <img src="https://github.com/Jhonierpc/WebDevelopment/blob/master/CSS%20Card%20Hover%20Effects/img/design_128.png?raw=true">
                        <h3>Discounts</h3>
                    </div>
                </div>
                <div class="face face2">
                    <div class="content">
                        <p>Discounted rates on other Emploi services like job advertisements(50% for the first 6 months).</p><br>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="face face1">
                    <div class="content">
                        <img src="https://github.com/Jhonierpc/WebDevelopment/blob/master/CSS%20Card%20Hover%20Effects/img/launch_128.png?raw=true">
                        <h3>Free Access</h3>
                    </div>
                </div>
                <div class="face face2">
                    <div class="content">
                        <p>Access to other Emploi tools for recruitment and talent management.</p><br><br>
                    </div>
                </div>
            </div>
    </div>
</section> -->

<section>
<!-- content-with-photo17 -->
 <div class="w3l-index-block4">
   <div class="features-bg py-4">
     <!-- features15 block -->
     <div class="container py-md-3">
       <div class="heading text-center mx-auto">
         <h3 class="head">Creating a Part-timer Request.</h3>
         <p class="my-3 head">To create a new request you go the request page and fill in required details including Task and Specific Industry. Emploi will then take care of the rest of the process.</p>
       </div>
       <div class="row">
         <div class="col-md-6 features15-col-text">
           <div class="d-flex flex-wrap feature-unit align-items-center">
             <div class="col-sm-3">
               <div class="features15-info">
                 <span class="fa fa-line-chart" aria-hidden="true"></span>
               </div>
             </div>
             <div class="col-sm-9 mt-sm-0 mt-4">
               <div class="features15-para">
                <h4>Request and Agree on TOR</h4>
                <p>Place a Request Using the Request Form and Agree on the Terms of Reference.</p>
               </div>
             </div>
            </div>
         </div>
         <div class="col-md-6 features15-col-text">
           <div class="d-flex flex-wrap feature-unit align-items-center">
             <div class="col-sm-3">
               <div class="features15-info">
                 <span class="fa fa-graduation-cap" aria-hidden="true"></span>
               </div>
             </div>
             <div class="col-sm-9 mt-sm-0 mt-4">
               <div class="features15-para">
                <h4>Review Shortlisted</h4>
                <p>Review and select from a shortlist of 3 from emploi's system</p>
               </div>
             </div>
            </div>
         </div>
         <div class="col-md-6 features15-col-text">
           <div class="d-flex flex-wrap feature-unit align-items-center">
             <div class="col-sm-3">
               <div class="features15-info">
                 <span class="fa fa-sort-alpha-asc" aria-hidden="true"></span>
               </div>
             </div>
             <div class="col-sm-9 mt-sm-0 mt-4">
               <div class="features15-para">
                <h4>Task Assignment</h4>
                <p>Assign Weekly/Monthly deliverables through your candidate management dashboard</p>
              </div>
             </div>
            </div>
         </div>
         <div class="col-md-6 features15-col-text">
           <div class="d-flex flex-wrap feature-unit align-items-center">
             <div class="col-sm-3">
               <div class="features15-info">
                 <span class="fa fa-star" aria-hidden="true"></span>
               </div>
             </div>
             <div class="col-sm-9 mt-sm-0 mt-4">
               <div class="features15-para">
                <h4>Review, Rate & Make Payments</h4>
                <p>Secure Payments and Review Performance on Task Completion.</p>
              </div>
             </div>
            </div>
         </div>
         <div class="col-md-6 features15-col-text">
           <div class="d-flex flex-wrap feature-unit align-items-center">
             <div class="col-sm-3">
               <div class="features15-info">
                 <span class="fa fa-users" aria-hidden="true"></span>
               </div>
             </div>
             <div class="col-sm-9 mt-sm-0 mt-4">
               <div class="features15-para">
                <h4>Instant Replacement.</h4>
                <p>Request for replacement on dissatistaction and absentee candidates.</p>
              </div>
             </div>
            </div>
         </div>
         <div class="col-md-6 features15-col-text">
           <div class="d-flex flex-wrap feature-unit align-items-center">
             <div class="col-sm-3">
               <div class="features15-info">
                 <span class="fa fa-laptop" aria-hidden="true"></span>
               </div>
             </div>
             <div class="col-sm-9 mt-sm-0 mt-4">
               <div class="features15-para">
                 <h4>End of Process</h4>
                 <p>Transition & Offboarding Management</p><br>
               </div>
             </div>
            </div>
         </div>
       </div>
       <div>
         <!-- features15 block -->
       </div>
     </div>
   </div>
 </div>

 </section>

 
<!-- PaaS Benefits -->

<section class="w3l-index-block7 py-5">
  <div class="container py-md-3">
    <div class="heading text-center mx-auto">
      <h3 class="head">Stats</h3><br><br>
    </div>

    @include('components.paastats')


  </div>
</section>

<!-- Partners Sections -->
<section class="w3l-index-block7 py-5">
<div class="container">
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
</section>


<!-- content-with-photo17 -->
<section class="w3l-index-block7 py-5">
  <div class="container py-md-3">
    <div class="row cwp17-two align-items-center">
      <div class="col-md-6 cwp17-text">
        <h2>Great features app
            that everyone Love</h2>
        <p>We enhance communication between employers and job seekers by configuring and automating responses giving your organization a professional outlook and giving job seekers appropriate feedback to advance their careers. Founded in 2017 as Jobsikaz and later rebranding to Emploi in 2019, we our goal is to impact 5 million job seekers in Africa by 2025. </p>
        <a href="/about">Read more about us &raquo;</a>
      </div>
      <div class="col-md-6 cwp17-image">
        <img src="/images/inspired.jpg" class="img-fluid" alt="Hire without Bias on Emploi" />
      </div>
    </div>
  </div>
</section>
<!-- content-with-photo17 -->
<section class="w3l-index-block5">
  <!-- main-slider -->
  <div class="testimonials py-5">
    <div class="container text-center py-lg-3">
      <div class="heading text-center mx-auto">
        <h3 class="head">Managers & HR love us </h3>
      </div>
      <div class="row">
        <div class="col-md-10 mx-auto">
          <div class="owl-one owl-carousel owl-theme">
          	<div class="item">
              <div class="slider-info mt-lg-4 mt-3">
                <div class="img-circle">
                  <img src="{{asset('images/testimonials/paul.jpeg')}}" class="img-fluid rounded" alt="Paul - WorkPay">
                </div>
                <div class="message">“It took seven days from the time we signed up with Emploi looking to hire a key account manager to the time the candidate reported for work. We were very time constrained as we had already spent a lot of time trying to hire through other platforms with no success. From the other platforms I received a lot of irrelevant CVs that honestly I didn’t even know what to do with. I would rate Emploi higher than the other platforms, because I believe the human touch from their team was critical in fast tracking the process for us.”</div>
                <div class="name">- Paul - WorkPay</div>
              </div>
            </div>
            <div class="item">
              <div class="slider-info mt-lg-4 mt-3">
                <div class="img-circle">
                  <img src="/images/avatar.png" class="img-fluid rounded" alt="Calvin Njoroge, Director – Quality Car Imports">
                </div>
                <div class="message">“We were struggling with sales and we needed a new team to come in and help us grow our business. So we went about putting ourselves out there interviewing; we got numerous CVs some of which were time-wasting, recklessly prepared and demoralizing to our business growth. So we got recommended to Emploi [Jobsikaz Afrique Ltd] and we were guaranteed that we would get results. I would recommend Emploi to anyone because they helped us solve a very big headache that we had. They did the recruitment for us, did the interviews and conducted background checks. All we had to do was doing a final interview and give them jobs. With regards to results, the team that we got…WOW! They helped us grow, we have 360 turnaround, we have a team that is now performing and because of that, I would recommend Emploi anytime to any businesses like ours that want to grow.”</div>
                <div class="name">- Calvin Njoroge, Director – Quality Car Imports</div>
              </div>
            </div>
            <div class="item">
              <div class="slider-info mt-lg-4 mt-3">
                <div class="img-circle">
                  <img src="{{asset('images/testimonials/elijah.jpeg')}}" class="img-fluid rounded" alt="Elijah Gathogo, Sales and Marketing Director – Mizizi Africa Homes">
                </div>
                <div class="message">“I contacted Emploi for support in recruiting sales agents and they recommended the best qualified candidates and their rankings. What we liked [about Emploi] is the speed and affordable cost which is unlike any other service we’ve seen in the market”</div>
                <div class="name">- Elijah Gathogo, Sales and Marketing Director – Mizizi Africa Homes</div>
              </div>
            </div>
            <div class="item">
              <div class="slider-info mt-lg-4 mt-3">
                <div class="img-circle">
                  <img src="{{asset('images/testimonials/sandra.webp')}}" class="img-fluid rounded" alt="Sandra Eshitemi – Employer">
                </div>
                <div class="message">“Working with Emploi was an enabling experience. They work with a schedule and to rubber stamp it all they are reputable.”</div>
                <div class="name">- Sandra Eshitemi – Employer</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /main-slider -->
</section>

{{-- subscribe modal --}}
<section>
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
              <form method="POST"  enctype="multipart/form-data" action="/employers/subscribe-paas">
                @csrf
                <div class="form-group">
                  <label class="h5">First Name</label>
                  <input type="text" class="form-control" name="firstname" required="" placeholder="First name">
                </div>
                <div class="form-group">
                  <label class="h5">Last Name</label>
                  <input type="text" class="form-control" name="lastname" required="" placeholder="Last name">
                </div>

                <div class="form-group">
                  <label class="h5">Email Address</label>
                  <input type="email" class="form-control" name="email" required="" placeholder="Email">
                </div>
                <div class="form-group">
                  <label class="h5">Phone Number</label>
                  <input type="text" class="form-control" name="phone_number" required="" placeholder="Phone">
                </div>
                <div class="form-group">
                  <label class="h5">Company Name</label>
                  <input type="text" class="form-control" name="company" required="" placeholder="Company name">
                </div>

                <div class="modal-footer">
                  <input type="submit" class="btn" style="background-color: #E15419; color: white;" name="button" value="Submit">
                  <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                </div>

              </form>
          </div>

        </div>
      </div>
    </div>

</section>

{{-- request form --}}
<section>


  <div class="modal fade" id="requestModal" tabindex="-1" role="dialog" aria-labelledby="requestModalLabel" aria-hidden="true">
    <div class="modal-dialog p-5" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="requestModalLabel">Subscription Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- subscribe form for Professional -->
          <form method="POST"  enctype="multipart/form-data" action="#">
              @csrf
              <div class="form-group">
                  <label class="h5">Task Title</label>
                  <input type="text" class="form-control" name="tasktitle" required="" placeholder="Task title">
              </div>
              <div class="form-group">
                  <label class="h5">Task Description</label>
                  <input type="text" class="form-control" name="descritption" required="" placeholder="Description">
              </div>
              <div class="form-group">
                <label class="h5">Industry</label>
                  <select path="industry" id="industry" name="industry" class="form-control input-sm">
                  <option value="" selected=""></option>
                  </select>
              </div>
              <div class="modal-footer">
               <input type="submit" class="btn" style="background-color: #E15419; color: white;" name="button" value="Submit">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
              </div>

            </form>
        </div>

      </div>
    </div>
  </div>

</section>

{{-- subscribe modal --}}
<section>
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
              <form method="POST"  enctype="multipart/form-data" action="/employers/subscribe-paas">
                @csrf
                <div class="form-group">
                  <label class="h5">First Name</label>
                  <input type="text" class="form-control" name="firstname" required="" placeholder="First name">
                </div>
                <div class="form-group">
                  <label class="h5">Last Name</label>
                  <input type="text" class="form-control" name="lastname" required="" placeholder="Last name">
                </div>

                <div class="form-group">
                  <label class="h5">Email Address</label>
                  <input type="email" class="form-control" name="email" required="" placeholder="Email">
                </div>
                <div class="form-group">
                  <label class="h5">Phone Number</label>
                  <input type="text" class="form-control" name="phone_number" required="" placeholder="Phone">
                </div>
                <div class="form-group">
                  <label class="h5">Company Name</label>
                  <input type="text" class="form-control" name="company" required="" placeholder="Company name">
                </div>

                <div class="modal-footer">
                  <input type="submit" class="btn" style="background-color: #E15419; color: white;" name="button" value="Submit">
                  <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                </div>

              </form>
          </div>

        </div>
      </div>
    </div>

</section>

@endsection



{{-- @extends('layouts.general-layout')

@section('title','Welcome to Emploi - The Premier Online Job Placement Platform in Africa')

@section('description')
Emploi is the Leading Platform for Talent Assessment and Matching for SME's in Africa.
@endsection

@section('content')

<style>
    main {
        margin: 0 !important;
        padding: 0 !important;
    }
    .for-mobile {
        display: none;
    }

    .content2 {
        float: none;
        position: absolute;
        top: 68vh;
        background-color: white;
        color: #500095;
        border-radius: 1.5%;
        padding: 0.4em 1em;
        border-radius: 1.5em
    }

    @media only screen and (min-width: 997px) {
        .navbar {
            background: transparent;
            transition: background 0.5s;
        }

        .scrolled {
            transition: background 1s;
            background: var(--primary);
        }
    }

    @media only screen and (max-width: 996px) {
        .navbar-brand img {
            height: 40px;
        }
    }
    @media only screen and (max-width: 500px) {
        .for-mobile {
            display: inline
        }
    }

    @media only screen and (max-width:425px) {
        .landing {
            background-image: url(../images/bg-small.jpg);
            
            background-repeat: no-repeat;
            background-size: cover;
            background-position: right;
            height: 80vh
        }
        .content2 {
            font-size: 95%
        }
    }
</style>

<!-- LANDING PAGE -->
<div class="landing">
    <div class="container">
        <div class="content2">
            <a href="/covid19-information-series">COVID-19 Information Series</a>
        </div>
        <div class="content">


            @if(isset(Auth::user()->id) && Auth::user()->role == 'seeker')
            @include('components.welcome-banner')
            

            @elseif(isset(Auth::user()->id) && Auth::user()->role == 'employer')
            <h4 class="text-uppercase">Hire with ease</h4>
            <h1>Premium Recruitment</h1>
            <p>Welcome to Emploi, where deserving talent meets deserving opportunities</p>
            <a href="/employers/publish" class="btn btn-orange px-4">Advertise</a>
            <a href="/employers/services" class="btn btn-white px-4">Services</a>


            @elseif(isset(Auth::user()->id) && Auth::user()->role == 'admin')
            <h4 class="text-uppercase">Hello {{ Auth::user()->name }}</h4>
            <h1>Howdy Admin</h1>
            <p>Manage activities happening on Emploi from the administrator's dashboard.</p>
            <a href="/home" class="btn btn-orange px-4">Admin Dashboard</a>
            <a href="/logout" class="btn btn-white px-4">Logout</a>


            @elseif(isset(Auth::user()->id) && Auth::user()->role == 'super-admin')
            <h4 class="text-uppercase">Hello {{ Auth::user()->name }}</h4>
            <h1>Super-Admin Logged in</h1>
            <p>Manage administrators on Emploi, you are in control.</p>
            <a href="/home" class="btn btn-orange px-4">Super-Admin Dashboard</a>
            <a href="/logout" class="btn btn-white px-4">Logout</a>

            @elseif(isset(Auth::user()->id) && Auth::user()->role == 'guest')
            <h1>the Leading Platform for Recruitment and Placement Solutions for SMEs</h1>
            <p>
                <a href="/guests/i-am-a-job-seeker" class="btn btn-orange px-4">I'm a Job Seeker</a>
                <br class="for-mobile"><br class="for-mobile">
                <a href="/guests/i-am-an-employer" class="btn btn-white px-4">I'm an Employer</a>
            </p>
            @else
                @include('components.welcome-banner')
                
            @endif
        </div>
        
    </div>
</div>
<!-- END OF LANDING PAGE -->



@endsection --}}
