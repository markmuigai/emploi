@extends('layouts.zip')

@section('title','Advertise on Emploi')

@section('description')
Advertise on Emploi and reach an audience of 100k+, get access to Premium Shortlisting tools and Candidate Ranking algorithims. Post a job in two minutes.
@endsection

@section('content')
<?php
$user = isset(Auth::user()->id) ? Auth::user() : false;
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>

<style>
  .blink{
		padding: 10px;	
    color: white;
		text-align: center;
	}
	.span{
		font-size: 28px;
		font-family: cursive;
		color: #E15419;
		animation: blink 2s linear infinite;
	}
  @keyframes blink{
    0%{opacity: 0;}
    50%{opacity: .5;}
    100%{opacity: 1;}
    }
</style>

<style>
  .banner{
    margin: 0;
    padding: 0;
    background: url(../images/advertise_here.jpg);
    background-size: cover;
    background-position: center;
    width: 100%;
    height: 27vh;
  }

  .banner a{
    display: inline-block;
    padding: 10px 20px;
    background: #E87341;
    color: #ffffff;
    text-decoration: none;
    transition: 2s;
  }
 </style>
<!-- index-block1 -->
<div class="w3l-index-block1">
  <div class="content py-5">
    <div class="container">
      <div class="row align-items-center py-md-5 py-3">
        <div class="col-md-5 content-left pt-md-0 pt-5">
          <h3>Post Your Job in Minutes</h3>
          <p class="mt-3 mb-md-5 mb-4">Advertise & shortlist your job here and take advantage of our superior shortlisting tools.</p>


                <a href="/post-a-job" class="btn btn-primary btn-theme" id="post-a-job-in-two-minutes-emploi">Post a Job</a>
                <a href="/employers/register?redirectToUrl={{ url('/employers/publish') }}" class="btn btn-outline-primary mr-2 btn-demo">  Create Account</a><br><br>
                <a href="/employers/paas" class="btn btn-theme" id="visit-employer-paas" style="width: 300px;background-color:#E15419;">Request for Part Timer <span class="spinner-grow spinner-grow-sm ml-2" role="status" aria-hidden="true"></span></a>

              
          
        </div>
        <div class="col-md-7 content-photo mt-md-0 mt-5">
          <img src="/images/zip/main.jpg" class="img-fluid" alt="main image">
        </div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</div>

  <div class="container container-fluid pb-4">
      <a href="#" data-toggle="modal" data-target="#advertModal">
          <div class="banner animate__animated animate__pulse animate__infinite  infinite animate__slow  10s">    

          </div>
      </a>
  </div>

  <!-- Advert Modal -->
    <div class="modal fade" id="advertModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
              <h4 class="modal-title">Advertise here</h4>
              </div>
                <div class="modal-body">               
                      <form action="/employers/publish" method="POST">
                          @csrf                              
                          <div class="form-group">
                              <label for="">Your Name</label>
                              <input type="text" name="name" value="{{ $user ? $user->name : '' }}" required="" class="form-control" placeholder="" maxlength="50">
                          </div>
                          <div class="form-group">
                              <label for="">Phone Number</label>
                              <input type="text" name="phone_number" value="" class="form-control" placeholder="" maxlength="50">
                          </div>
                          <div class="form-group">
                              <label for="">Email Address</label>
                              <input type="email" name="email" value="{{ $user ? $user->email : '' }}" required="" class="form-control" placeholder="" maxlength="50">
                          </div>
                          <div class="form-group">
                              <label for="">Job Title</label>
                              <input type="text" name="title" maxlength="100" class="form-control" placeholder="">
                          </div>
                          <div class="form-group">
                              <label for="description">Job Description</label>
                              <input type="text" name="" name="description" class="form-control">
                          </div>                  

                          <div class="text-center">                 
                                
                              <input type="submit" class="btn btn-success" value="Submit">
                            
                          </div>                                               
                      </form>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                   </div>
                </div>                         
            </div>                  
        </div>
    </div>
  <!-- Advert Modal End-->

<!-- index-block2 -->
<section class="w3l-index-block2 py-4">
  <div class="container py-md-3">
    <div class="heading text-center mx-auto">
      <h3 class="head">9 out of 10 Employers</h3>
      <p class="my-3 head"> Who advertise on Emploi receive qualified applications <b>from the first day</b>!</p>
    </div>
    <div class="row bottom_grids pt-md-3">
      <div class="col-lg-4 col-md-6 mt-5">
        <div class="s-block">
          <a href="/contact" class="d-block p-lg-4 p-3">
            <img src="/images/zip/s1.png" alt="" class="img-fluid" />
            <h3 class="my-3">Audience of 100k+</h3>
            <p class="">We're established in Africa, with partners and subscribed job seekers guaranteeing you an audience of 100k+ job seekers.</p>
          </a>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mt-5">
        <div class="s-block">
          <a href="/employers/browse" class="d-block p-lg-4 p-3">
            <img src="/images/zip/s2.png" alt="" class="img-fluid" />
            <h3 class="my-3">Browse Talent Pool</h3>
            <p class="">
            	Get access to our database of job seekers and shortlist, contact and select job seekers with our recruitment tools.
            </p>
          </a>
        </div>
      </div>
      <div class="col-lg-4 mt-5">
        <div class="s-block">
          <a href="/employers/services" class="d-block p-lg-4 p-3">
            <img src="/images/zip/s3.png" alt="" class="img-fluid" />
            <h3 class="my-3">Best Recruitment Tools</h3>
            <p class="">Receive, sort, contact, and shortlist applications online with our Role Suitability Index tool.</p>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /index-block2 -->

    <div class="blink pt-4">
      <a href="/post-a-job" style="text-decoration: none;">
        <span class="span">Free Job Advertisement for new employers. 20% discount for all employers.</span>
      </a>
    </div>

<!-- content-with-photo17 -->
<section class="w3l-index-block3">
  <div class="section-info py-5">
    <div class="container py-md-3">
      <div class="row cwp17-two align-items-center">
        <div class="col-md-6 cwp17-image">
          <img src="/images/zip/business.png" class="img-fluid" alt="" />
        </div>
        <div class="col-md-6 cwp17-text">
          <h2>Premium Recruitment</h2>
          <p>Let us undertake the hiring process for you - we advertise your job, screen candidates, conduct background checks, and a 90 day free replacement should candidate leave.</p>
          <a href="/employers/premium-recruitment">Learn more &raquo;</a>
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
         <h3 class="head">How it works</h3>
         <p class="my-3 head"> Emploi is an established professional recruitment and development firm, and we provide you with different packages that enable you to hire quickly, securely, and without bias.</p>
       </div>
       <div class="row">
         <div class="col-md-6 features15-col-text">
           <a href="#url" class="d-flex flex-wrap feature-unit align-items-center">
             <div class="col-sm-3">
               <div class="features15-info">
                 <span class="fa fa-line-chart" aria-hidden="true"></span>
               </div>
             </div>
             <div class="col-sm-9 mt-sm-0 mt-4">
               <div class="features15-para">
                 <h4>Advertise a Job</h4>
                 <p>With an Employer's profile, after advertising your job, qualified job applications start streaming in. Easily shortlist or reject applications with professional response templates.</p>
               </div>
             </div>
           </a>
         </div>
         <div class="col-md-6 features15-col-text">
           <a href="#url" class="d-flex flex-wrap feature-unit align-items-center">
             <div class="col-sm-3">
               <div class="features15-info">
                 <span class="fa fa-graduation-cap" aria-hidden="true"></span>
               </div>
             </div>
             <div class="col-sm-9 mt-sm-0 mt-4">
               <div class="features15-para">
                 <h4>Browse Talent Pool </h4>
                 <p>Search experienced candidates in our talent pool by Industry, Location, Skills amongs't others. Download their CV's, contact them directly, and offer positions. </p>
               </div>
             </div>
           </a>
         </div>
         <div class="col-md-6 features15-col-text">
           <a href="#url" class="d-flex flex-wrap feature-unit align-items-center">
             <div class="col-sm-3">
               <div class="features15-info">
                 <span class="fa fa-sort-alpha-asc" aria-hidden="true"></span>
               </div>
             </div>
             <div class="col-sm-9 mt-sm-0 mt-4">
               <div class="features15-para">
                 <h4>Applicants Management</h4>
                 <p>Our Role Suitability tool and other features enable you to score job applications against your model candidate and rank them for advanced shortlisting</p>
               </div>
             </div>
           </a>
         </div>
         <div class="col-md-6 features15-col-text">
           <a href="#url" class="d-flex flex-wrap feature-unit align-items-center">
             <div class="col-sm-3">
               <div class="features15-info">
                 <span class="fa fa-star" aria-hidden="true"></span>
               </div>
             </div>
             <div class="col-sm-9 mt-sm-0 mt-4">
               <div class="features15-para">
                 <h4>Premium Recruitment</h4>
                 <p>Let's handle the recruitment process for you and provide you candidates that fit your description for you to decide. We guarantee a 2-4 day Turn-Around-Time</p>
               </div>
             </div>
           </a>
         </div>
         <div class="col-md-6 features15-col-text">
           <a href="#url" class="d-flex flex-wrap feature-unit align-items-center">
             <div class="col-sm-3">
               <div class="features15-info">
                 <span class="fa fa-users" aria-hidden="true"></span>
               </div>
             </div>
             <div class="col-sm-9 mt-sm-0 mt-4">
               <div class="features15-para">
                 <h4>Featured Company</h4>
                 <p>Top candidates apply vacancies from top companies. Let our HR and IT team provide you with branding and marketing tips to get the best candidates applying</p>
               </div>
             </div>
           </a>
         </div>
         <div class="col-md-6 features15-col-text">
           <a href="#url" class="d-flex flex-wrap feature-unit align-items-center">
             <div class="col-sm-3">
               <div class="features15-info">
                 <span class="fa fa-laptop" aria-hidden="true"></span>
               </div>
             </div>
             <div class="col-sm-9 mt-sm-0 mt-4">
               <div class="features15-para">
                 <h4>Hire Remotely</h4>
                 <p>We provide your recruitment team with the necessary tools for interviews, insight on candidates, and thorough background checks.</p>
               </div>
             </div>
           </a>
         </div>
       </div>
       <div>
         <!-- features15 block -->
       </div>
     </div>
   </div>
 </div>
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



@endsection
