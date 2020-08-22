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

<style>
  .blink{
  width: auto;
  padding-top: 10px;
  padding-bottom: 30px;	
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
            Welcome to E-Club
          </div>
        </div>
      </div>
      @if(session()->has('fail'))
          <div class="alert alert-success">
          {{ session()->get('fail') }}
          </div>
      @endif
      <div class="row cwp17-two align-items-center">
        <div class="col-md-6 bg-white">
          <div class="container">
            <img src="/images/seeker-join.png" style="width:100%;">
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

<section>
  <div class="blink pt-4 container-fluid w3l-index-block3"><a href="#exampleModal" id="request-part-timer" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="text-decoration: none;"><span class="span">Get E-Club Membership One Month Free</span></a></div>

</section>


      <section class="w3l-index-block2 pt-1 pb-4 bg-light">

        <div class="container py-md-2">
          <div class="heading text-center mx-auto">
            <h3 class="head">Top Benefits</h3>
          </div>
          <div class="row bottom_grids pt-md-3">
            <div class="col-lg-3 col-m-5 mt-5">
              <div class="s-block p-2">
                <div class="d-flex">
                  <img src="/images/zip/s3.png" alt="" class="img-fluid" />
                  <h3 class="my-3 pl-4">Advisory</h3>
                </div>
                <p class="">Access to free on-demand HR advisory services and networking opportunities.</p>
              </div>
            </div>
    
            <div class="col-lg-3 col-m-5 mt-5">
              <div class="s-block p-2">
                <div class="d-flex">
                  <img src="/images/zip/s1.png" alt="" class="img-fluid" /><br><br>
                  <h3 class="my-3 pl-4">Payment</h3>
                </div>
                <p class="">Friendly and staggered monthly payments. Invoice sent on time.</p><br>
              </div>
            </div>
    
            <div class="col-lg-3 col-m-5 mt-5">
              <div class="s-block p-2">
                <div class="d-flex">
                  <img src="/images/zip/s2.png" alt="" class="img-fluid" />
                  <h3 class="my-3 pl-4">Discounts</h3>
                </div>
                <p class="">Discounted rates on other Emploi services like job advertisements.</p>
              </div>
            </div>
    
            <div class="col-lg-3 col-md-5 mt-5">
              <div class="s-block p-2">
                <div class="d-flex">
                  <img src="/images/zip/s1.png" alt="" class="img-fluid" />
                  <h3 class="my-3 pl-4">Free Access</h3>
                </div>
                <p class="">Access to recruitment and talent management tools.</p>
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
<section class="py-2">
<div>
      <div class="pt-3 pb-3">
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
                      if(Auth::user()->role == 'employer')
                      $phone = Auth::user()->employer->contact_phone ? : '';
                      $company = Auth::user()->employer->company_name ? : '';
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
                <input type="text" class="form-control" name="phone_number" required="" placeholder="Phone" value="{{ $phone }}">
              </div>
              <div class="form-group">
                <label class="h5">Company Name</label>
                <input type="text" class="form-control" name="company" required="" placeholder="Company name" value="{{ $company }}">
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
