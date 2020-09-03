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
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!------ Include the above in your HEAD tag ---------->

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>

<link rel="stylesheet" href="/css/infinite-slider.css">
<link rel="stylesheet" href="/css/seeker.css">
<script type="text/javascript" src="/js/carousel.js">
</script>

<script>
  $(document).ready(function(){
   setTimeout(function(){
       $('#myModal').modal('show');
   }, 17000);
  });
  
</script>

<style>
    .blink{
      width: auto;
		padding: 10px;	
    color: white;
		text-align: center;
    }
    .span{
      font-size: 24px;
      font-family: cursive;
      color: #E15419;
      animation: blink 1s linear infinite;
    }
    @keyframes blink{
    0%{opacity: 0;}
    50%{opacity: .5;}
    100%{opacity: 1;}
    }
</style>

<!-- index-block1 -->
<section>
<div class="w3l-index-block1">
  <div class="content py-5">   
    <div class="container"> 
      <div class="row align-items-center py-md-5 py-5"> 
        <div class="col-md-5 content-left pt-md-0 pt-5">
        @if(session()->has('success'))
            <div class="alert alert-success">
            {{ session()->get('success') }}
            </div>
        @endif

          <h3 class="mt-3 mb-md-5 mb-4 h1">Request Part-timer.</h3>
          <p class="mt-3 mb-md-5 mb-4">Sign up for membership now and subscribe to a pool of part time talent.</p>

          <a href="/employers/request-paas" style="background-color: #E15419; color:white;" class="btn btn-theme">Request</a>
          <a href="#exampleModal" style="background-color: #500095; color: white;" class="btn btn-theme" id="request-part-timer" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Join E-Club <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span></a>        
        
              
          
        </div>
        <div class="col-md-7 content-photo mt-md-0 mt-5">
          <img src="/images/zip/main.jpg" class="img-fluid" alt="main image">
        </div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</div>
</section>

<section>
  <div class="blink pt-4 container-fluid w3l-index-block3"><a href="#exampleModal" id="request-part-timer" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="text-decoration: none;"><span class="span">Get One Month Free E-Club Membership Now!!</span></a></div>

</section>


<!-- //index-block1 -->

<!-- index-block2 -->
<!-- /index-block2 -->
<!-- content-with-photo17 -->
<section class="w3l-index-block3">
  <div class="section-info py-3">
    <div class="container py-md-3">
      <div class="row cwp17-two align-items-center">
        <div class="col-md-6 cwp17-text h4 pl-4">
              <p class="card-text container-fluid">
                <div class="card-title align-text-right">
                  Professionals as a Service
                </div>
                <p>
                  PAAS is a service that seeks to provide qualified part-time professionals on demand to
                  handle specific tasks at affordable rates and at a cost effective plan. 
                </p>
              </p>

              <p class="card-text container-fluid">
                <div class="card-title align-text-right">
                  E-Club
                </div>
                <p>
                  E-Club is a membership programme for employers looking to hire part-time professionals.
                  <a href="/employers/e-club">Read More...</a> 
                </p>
              </p>
        </div>

        <div class="col-md-6 bg-light">
          <div>
            <img src="/images/seeker-join.png" style="max-width:100%" alt="">
          </div>
        </div>

        </div>
      </div>
    </div>
  </div>
</section>


<section>
  <div class="modal fade pt-4" id="myModal">
    <div class="modal-dialog modal-dialog-centered pt-4">
      <div class="modal-content">
          <div class="modal-text">
            <button type="button" class="close d-flex pr-3 pt-2" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-header h4">Employer PAAS</div>
          <div class="modal-header">
            <h6 class="modal-title" id="exampleModalCenterTitle">Are you interested in hiring part time professionals? Leave your phone number and our team will get back to you.</h6>
            
          </div>
          <div class="modal-body">
            <form method="POST"  enctype="multipart/form-data" action="/employers/paas">
              @csrf
              <div class="form-group">
                <input type="number" class="form-control" name="phone" placeholder="phone number">
              </div>
              <div class="modal-footer">
                <input type="submit" class="btn" style="background-color: #E15419; color: white;" name="button" value="Send">
              </div>
            </form>
      </div>
    </div>
  </div>
</section>

  <section class="w3l-index-block2 pt-1 pb-4">

    <div class="container py-md-2">
      <div class="heading text-center mx-auto">
        <h3 class="head">Top Benefits</h3>
      </div>
      <div class="row bottom_grids pt-md-3">
        <div class="col-lg-4 col-m-6 mt-5">
          <div class="s-block p-2">
            <div class="d-flex">
              <img src="/images/zip/s3.png" alt="" class="img-fluid" />
              <h3 class="my-3 pl-4">Convenience</h3>
            </div>
            <p class="">Sourcing, management and growth tools at one stop.</p>
          </div>
        </div>

        <div class="col-lg-4 col-m-6 mt-5">
          <div class="s-block p-2">
            <div class="d-flex">
              <img src="/images/zip/s1.png" alt="" class="img-fluid" />
              <h3 class="my-3 pl-4">Productivity</h3>
            </div>
            <p class="">Top quality performance: KPI & performance appraisal framework.</p>
          </div>
        </div>

        <div class="col-lg-4 col-m-6 mt-5">
          <div class="s-block p-2">
            <div class="d-flex">
              <img src="/images/zip/s2.png" alt="" class="img-fluid" />
              <h3 class="my-3 pl-4">Recruitment</h3>
            </div>
            <p class="">Thorough professional vetting: Know The Professional Candidate Referencing.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mt-5">
          <div class="s-block p-2">
            <div class="d-flex">
              <img src="/images/zip/s1.png" alt="" class="img-fluid" />
              <h3 class="my-3 pl-4">Assurance</h3>
            </div>
              <p class="">We will help you maintain a healthy pipeline of potential replacements at all times.</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mt-5">
          <div class="s-block p-2">
            <div class="d-flex">
              <img src="/images/zip/s2.png" alt="" class="img-fluid" />
              <h3 class="my-3 pl-4">Talent Pool</h3>
            </div>
              <p class="">
                Get access to our Job Seeker database and get to hire top professionals.
              </p>
          </div>
        </div>
        <div class="col-lg-4 col-m-6 mt-5">
            <div class="s-block p-2">
              <div class="d-flex">
                <img src="/images/zip/s3.png" alt="" class="img-fluid" />
                <h3 class="my-3 pl-4">Save Time</h3>
              </div>
              <p class="">Speed: 48 hour turnaround time.</p>
            </div>
        </div>


      </div>
    </div>
  
  </section>

  <section class="pt-5 container">
    <div style="">
      <a href="/employers/e-club">
          <img style="width: 100%" src="/images/epaas.jpg" alt="join eClub"> 

      </a>    
  </div>
  </section>

  
 
<section class="pb-4">
<!-- content-with-photo17 -->
 <div class="w3l-index-block4">
   <div class="features-bg py-5">
     <!-- features15 block -->
     <div class="container py-md-3">
       <div class="heading text-center mx-auto">
         <h3 class="head pt-4">Creating a Part-timer Request.</h3>
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
                <p>Review and select from a shortlist of 3 from emploi's system.</p>
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
                <p>Assign Weekly/Monthly deliverables through your candidate management dashboard.</p>
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

        
    <div class="col-md-12 d-flex justify-content-center pt-5">
      <a href="#exampleModal" style="background-color: #E15419; color: white;" class="btn btn-theme mr-4" id="request-part-timer" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Join E-Club <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span></a>        
      <a href="/employers/e-club" style="background-color: #500095; color:white;" class="btn btn-theme">Visit E-Club Page</a>

    </div>
         <!-- features15 block -->
       </div>
     </div>
   </div>
 </div>

 </section>


 
<!-- PaaS Benefits -->

<section class="w3l-index-block7">
  <div class="container py-md-1">
    <div class="heading text-center mx-auto">
      <h3 class="head pb-4">PaaS Stats</h3>
    </div>
    <div class="container">
      @include('components.paastats')
    </div>

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

<section class="container">
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog p-5 modal-dialog-centered" role="document">
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
                    <?php
                    $fname = '';
                    $lname = '';
                    $email = '';
                    $phone = '';
                    $company ='';

                    if(isset(Auth::user()->id))
                    {
                      $full_name = Auth::user()->name;
                      $full_name = explode(" ", $full_name);
                      $fname = $full_name[0];
                      $lname = isset($full_name[1]) ? $full_name[1] : '';
                      $email = Auth::user()->email;
                      if(Auth::user()->role == 'employer'){
                      $phone = Auth::user()->employer->contact_phone ? : '';
                      $company = Auth::user()->employer->company_name ? : '';
                       } 
                    }                
                    ?>
              <div class="form-group">
                <label class="h5">First Name</label>
                <input type="text" class="form-control" name="firstname" required="" placeholder="First name" value="{{ $fname }}">
              </div>
              <div class="form-group">
                <label class="h5">Last Name</label>
                <input type="text" class="form-control" name="lastname" required="" placeholder="Last name" value="{{ $lname }}">
              </div>

              <div class="form-group">
                <label class="h5">Email Address</label>
                <input type="email" class="form-control" name="email" required="" placeholder="Email" value="{{ $email }}">
              </div>
              <div class="form-group">
                <label class="h5">Phone Number</label>
                <input type="number" class="form-control" name="phone_number" required="" placeholder="Phone" value="{{ $phone }}">
              </div>
              <div class="form-group">
                <label class="h5">Company Name</label>
                <input type="text" class="form-control" name="company" required="" placeholder="Company name" value="{{ $company }}">
              </div>

              <div class="custom-control custom-checkbox form-check">
                  <input type="checkbox" class="custom-control-input" id="defaultUnchecked" required="">
                  <label class="custom-control-label" for="defaultUnchecked">
                    I agree to the <a href="/terms-and-conditions" style="color:orange;">Terms And Conditions</a>  <b style="color: orange" title="Required">*</b>
                  </label>
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
