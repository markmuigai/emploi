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


<!-- index-block1 -->
<div class="w3l-index-block1">
  <div class="content py-5">
    <div class="container">
      <div class="row align-items-center py-md-5 py-3">
        <div class="col-md-7 content-left pt-md-0 pt-5">
          <h3 class="mt-3 mb-md-5 mb-4 h1">Request for Professional.</h3>
          <p class="mt-3 mb-md-5 mb-4">Are you looking for part-time professionals? A new solution is here for you.</p>
  
            <a href="/employers/rpaas" style="background-color: #E15419" class="btn btn-theme">Request Part-timer</a>
            <a href="#exampleModal" style="background-color: #500095" class="btn btn-theme" id="request-part-timer" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Join E-Club <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span></a>
                      
         
            

          
        </div>
        <div class="col-md-5 mx-auto content-photo mt-md-0 mt-5">
          <img src="/images/guru.png" class="img-fluid" alt="main image">
        </div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</div>
<!-- //index-block1 -->
<!-- index-block2 -->

<!-- /index-block2 -->
<!-- content-with-photo17 -->
<section class="w3l-index-block3">
  <div class="row pt-5">
    <div class="col-md-12 pt-1">
      <div class="text-center h2">
        How it works
      </div>
    </div>
  </div>
  <div class="section-info py-5">
    <div class="container py-md-3">
      <div class="row cwp17-two align-items-center">
        <div class="col-md-6">
          <iframe src="https://www.youtube.com/embed/lJIrF4YjHfQ" style="height: 350px; width: 550px; !important;"></iframe>
        </div>
        <div class="col-md-6 cwp17-text h4">
          <div class="card bg-white shadow-sm h4" style="max-width: 30rem;">
            <div class="card-body">
                <p class="card-text">PAAS is a service that seeks to provide qualified professionals on demand to
                  handle specific tasks at affordable rates and at a cost effective plan. <br> It is created to fulfill the need of employers for mid-level and senior
                  positions that became vacant due to theCOVID-19 pandemic.<br><br> Lay-offs by companies led to reassessment of processes in the companies.
                  PAAS seeks to connect experienced persons to the SMEs.
                  It also provides a processing framework to SMEs and part-time professionals to effectively fill in the gap.</p>
            </div>
          </div>

        </div>

        </div>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="heading text-center mx-auto">
    <h3 class="head">Benefits of Using PaaS</h3>
    <p class="my-3 head">Join the E-Club to enjoy more benefits including faster processing of request.</p>
  </div>
  <div class="col-md-8 mx-auto align-right pt-4 pb-4">
    <div class="modal-content bg-light shadow">
        {{-- <div class="modal-header">
          <h5 class="modal-title text-right h4" id="exampleModalLabel">Your Fulfillment is what we seek!</h5>
        </div> --}}
        <div class="modal-body">
          <div class="card shadow-lg">
            <div class="card-text p-2 h5">
              <ul class="list-group">
                <li class="list-group-item">Access to networking with a large pool of professionals through Know The Professional networking program.</li>
                <li class="list-group-item">Access to free on-demand HR advisory services.</li>
                <li class="list-group-item">Immediate replacement to vacancies left by a PAAS professional.</li>
                <li class="list-group-item">Discounted rates on advertisement of vacancies (50% for the first 6 months).</li>
                <li class="list-group-item">Highest chances of landing a potential fulltime employee in the long run.</li>
                <li class="list-group-item">Accessibility to other employer tools free of charge for the duration of the contract.</li>
              </ul>
            </div>
          </div>
        </div>
    </div>
</div>
</section>
<!-- content-with-photo17 -->
 <div class="w3l-index-block4">
   <div class="features-bg py-5">
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
                <h4>Place a Request and Agree on TOR</h4>
                <p>Place a Request Using the Request Form and Agree on the Terms of Reference </p>
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
                <p>Review and rate performance on task completion. Secure payments - Receive invoices and make payments through Emploi</p>
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
                <h4>Performance guarantees.</h4>
                <p>Performance guarantees: rate candidate performance on your candidate management dashcboard, request for replacement on dissatisfaction and get instant replacement of absentee candidates</p>
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
                 <h4>End of Task</h4>
                 <p>Transition & Offboarding Management</p>
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

 
<!-- PaaS Benefits -->

<section class="w3l-index-block7 py-5">
  <div class="container py-md-3">
    <div class="heading text-center mx-auto">
      <h3 class="head">PaaS Benefits & Pricing</h3>
      <p class="my-3 head">PaaS Membership empowers you with a continous pool of talented professionals for your on-demand tasks. It ensures that you get quality output and timeline task delivery.</p>
    </div>

    <div class="row cwp17-two align-items-center">
      <div class="col-md-8 mx-auto cwp17-text">

        <div class="card shadow-sm">
            <div class="card-header bg-white">
              <div class="h3" style="color: #E15419">
                KSHs. 5500 Annually
              </div>

            </div>
            
            <div class="card-body pt-2 pb-3 h6">

              <div class="card-text p-4">
                <ul>
                  <li>Full Year Membership</li>
                  <li>End-to-End Recruitment Support</li>
                  <li>Credible Professionals</li>
                  <li>Project Management Software</li>
                </ul>
              </div>
            </div>

            <div class="card-footer bg-white mx-auto p-4">
                <button class="btn" style="background-color: #E15419; color: white"  name="submit" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Subscribe</button>
            </div>

          </div>

      </div>
      
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
                  <input type="text" class="form-control" name="firstname" required="" placeholder="first name">
                </div>
                <div class="form-group">
                  <label class="h5">Last Name</label>
                  <input type="text" class="form-control" name="lastname" required="" placeholder="last name">
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

@endsection
