@extends('layouts.general-layout')

@section('title','Emploi :: Job Seeker Services')

@section('description')
Emploi is the Leading Platform for Talent Assessment and Matching for SME's in Africa.
@endsection

@section('content')
<style type="text/css">

   .jservices_header
   {
      background: linear-gradient(to right, #808080, rgba(81, 81, 81, .3)), url(../images/seeker_services.jpg);
      height: 50vh;
      background-repeat: no-repeat;
      background-position: 85% center;  
   }
</style>

<style type="text/css">
@import url(https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css);
@import url(https://fonts.googleapis.com/css?family=Raleway:400,500);
@import url(https://fonts.googleapis.com/css?family=Montserrat:500);
.snip1214 {
  font-family: 'Raleway', sans-serif;
  color: #000000;
  text-align: center;
  font-size: 18px;
  width: 100%;
  max-width: 1000px;
  margin: 40px 10px;
}
.snip1214 .plan {
  margin: 0;
  width: 25%;
  position: relative;
  float: left;
  background-color: #ffffff;
  border: 1px solid rgba(0, 0, 0, 0.1);
}

.snip1214 .plan-title {
  position: relative;
  top: 0;
  font-weight: 500;
  padding: 5px 15px;
  margin: 0 auto;
  -webkit-transform: translateY(-50%);
  transform: translateY(-50%);
  margin: 0;
  display: inline-block;
  background-color: #301934;
  color: #ffffff;
  text-transform: uppercase;
}
.snip1214 .plan-cost {
  padding: 0px 10px 20px;
}
.snip1214 .plan-price {
  font-family: 'Montserrat', sans-serif;
  font-weight: 500;
  font-size: 2.4em;
  color:    #808080;
}
.snip1214 .plan-type {
  opacity: 0.6;
}
.snip1214 .plan-features {
  padding: 0;
  margin: 0;
  text-align: left;
  list-style: outside none none;
  font-size: 0.8em;
}
.snip1214 .plan-features li {
  border-top: 1px solid #d2d7e2;
  padding: 10px 5%;
}
.snip1214 .plan-features li:nth-child(even) {
  background: rgba(0, 0, 0, 0.08);
}
.snip1214 .plan-features i {
  margin-right: 8px;
  opacity: 0.4;
}

.snip1214 .featured {
  margin-top: -10px;
  background-color: #500095;
  color: #ffffff;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
  z-index: 1;
}
.snip1214 .featured .plan-title,
.snip1214 .featured .plan-price {
  color: #ffffff;
}
.snip1214 .featured .plan-cost {
  padding: 10px 10px 20px;
}
.snip1214 .featured .plan-features li {
  border-top: 1px solid rgba(255, 255, 255, 0.4);
}
.btn-primary{
   background-color:  #301934;
  color: #ffffff;
  text-decoration: none;
  padding: 0.5em 1em;
  -webkit-transform: translateY(20%);
  transform: translateY(20%);
  font-weight: 500;
  text-transform: uppercase;
  display: inline-block;
  border-radius: 0;
  border: none;
}

@media only screen and (max-width: 767px) {
  .snip1214 .plan {
    width: 100%;
  }
  .snip1214 .plan-title,
  .snip1214 .plan-select a {
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }
  .snip1214 .plan-cost,
  .snip1214 .featured .plan-cost
  }
  .snip1214 .plan-select,
  .snip1214 .featured .plan-select {
    padding: 10px 10px 10px;
  }
  .snip1214 .featured {
    margin-top: 0;
  }
}
@media only screen and (max-width: 440px) {
  .snip1214 .plan {
    width: 100%;
  }
}
</style>

<div class="container">
         <div class="jservices_header"><br><br><br>
            <div style="margin-left: 50px; color: white">
                <h1 >Job Seeker Services</h1>
                <h6>A mix of Technology with personalized expert support to <br>fast track your career progress.</h6><br>
                <a href="/job-seekers/free-cv-review" class="btn btn-orange"> Request Free CV Review</a>
            </div>           
        </div>
      </div>
 <div class="container">
<div class="card">
    <div class="card-body">         
        <div class="snip1214">
             <div class="plan">
                    <h5 class="plan-title">
                       Free
                    </h5>
                  <div class="plan-cost"><span class="plan-price">Ksh. 0</span><span class="plan-type">/ <br>Month</span></div>
                  <ul class="plan-features">               
                        <li><i class="ion-checkmark"> </i><a href="/vacancies">View and apply vacancies</a></li>
                        <li><i class="ion-checkmark"> </i><a href="/job-seekers/cv-builder">Free CV builder</a></li>
                        <li><i class="ion-checkmark"> </i><a href="#"> Access Career advice</a></li>                 
                        <li><i class="ion-checkmark"> </i><a href="/job-seekers/cv-templates">  Downloadable CV templates with advice</a></li>
                        <li><i class="ion-checkmark"> </i><i class="#"> </i><a href="/vacancies">Profile Accessible to 100’s of employers</a></li><br><br>
                    </ul><br>
                    <div class="plan-select"><a href="/join" class="btn btn-primary"> JOIN</a></div>
              </div>

              <div class="plan">
                    <h5 class="plan-title">
                       Pro
                    </h5>
                    <div class="plan-cost"><span class="plan-price">Ksh. 49</span><span class="plan-type">/ <br>Month</span></div>
                    <ul class="plan-features">
                        <li>All free plan benefits</li>
                        <li>Notifications when;</li>
                        <li><i class="ion-checkmark"></i>You’re shorlisted</li>
                        <li><i class="ion-checkmark"></i>Your profile is viewed</li>
                        <li><i class="ion-checkmark"></i>Your CV is requested</li>
                    </ul><br><br><br><br>
                    <form method="POST" action="/checkout">
                        <div class="plan-select">
                        @csrf
                        <input type="hidden" name="product" value="seeker_basic">
                        <p>
                        <input type="submit" name="" value="SELECT PLAN" class="btn btn-primary">
                        </p>
                        </div>
                    </form>
              </div>

              <div class="plan featured">
                    <h5 class="plan-title">
                     Spotlight
                    </h5>
                    <div class="plan-cost"><span class="plan-price">Ksh. 159</span><span class="plan-type">/ Month</span></div>
                    <ul class="plan-features">
                        <li><i class="ion-checkmark"> </i>All PRO benefits</li>
                        <li><i class="ion-checkmark"> </i> Rank first in all search lists</li>
                        <li><i class="ion-checkmark"> </i>Automatic application to all vacancies that match your skills</li>
                        <li><i class="ion-checkmark"> </i> Real time analytics on your profile performance</li>
                    </ul><br><br><br><br>
                     <form method="POST" action="/checkout">
                        <div class="plan-select">
                        @csrf
                        <input type="hidden" name="product" value="featured_seeker">
                        <p>
                        <input type="submit" name="" value="SELECT PLAN" class="btn btn-primary">
                        </p>
                        </div>
                    </form>
              </div>

              <div class="plan">
                    <h5 class="plan-title">
                    Summit
                    </h5>
                    <div class="plan-cost"><span class="plan-price">Ksh. 2,000</span><br> to Ksh. 16,000</div>
                        <ul class="plan-features">
                        <li><i class="ion-checkmark"> </i>90 day interview guarantee</li>
                        <li><i class="ion-checkmark"> </i>Professional Discovery</li>
                        <li><i class="ion-checkmark"> </i>Opportunity Mapping</li>
                        <li><i class="ion-checkmark"> </i>In-depth Career Advisory</li>                        
                        <li><i class="ion-checkmark"> </i>Professionally Customized CV and Cover Letter</li>
                        <li><i class="ion-checkmark"> </i>Post Placement follow-up and support</li>   
                        </ul><br>
                  <div class="plan-select"><a href="#jservices-footer" class="btn btn-primary"> SELECT PLAN</a></div>
              </div>
         </div>
    </div>
</div><br><br>


<h3 class="orange" style="text-align: center;">Summit Packages</h3>
<h5 style="text-align: center;">Take your career to the Summit with Emploi.</h5>
    <div class="row justify-content-center" id="jservices-footer">
        <div class="col-lg-6">
            <div class="card my-2">
                <div class="card-body">
                     <div class="row align-items-center">
                        <div class="col-md-4 col-12 pb-2 pb-md-0">
                            <img src="/images/cv-editing.png" class="w-100" alt="Experts on CV Editing">
                        </div>
                        <div class="col-md-8 col-12">
                            <h5>Professional CV Editing</h5>
                            <p>
                                Recruiters are very busy people. On average, they read your CV in six seconds and thus having a well-designed professional CV is critical for your career growth.
                            </p><br><br>
                            <a href="/job-seekers/cv-editing" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>  
        <div class="col-lg-6">
            <div class="card my-2">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-4 col-12 pb-2 pb-md-0">
                            <img src="/images/premium-placement.png" class="w-100" alt="Premium Placement">
                        </div>
                        <div class="col-md-8 col-12">
                            <h5>Exclusive Placement</h5>
                            <p>
                                Get seen by employers as we rank you on top of the employer search list. Get our professional CV Editing services for frequent shortlisting. We offer exclusive placement services matching your career and Interview
                                coaching   to land your dream job.
                            </p>
                            <a href="/job-seekers/exclusive-placement" class="btn btn-primary">Learn More</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>               
</div>

<br id="testimonialsView">
  <br>

  @include('components.testimonials.cv-edit')<br>


<div class="card">
    <div class="card-body">
        <div class="container">
          <h4 class="orange">Frequently asked questions by Job Seekers.</h4>
          <div class="panel-group" id="faqAccordion">
            @forelse($faqs as $faq)
            <div class="panel panel-default " id="faq{{$faq->id}}">
                <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question{{$faq->id}}">
                     <h5 class="panel-title">
                      <span class="ing" style="cursor: pointer">Q: {{ $faq->title }}</span>
                   </h5>

                </div>
                <div id="question{{$faq->id}}" class="panel-collapse collapse" style="height: 0px;">
                    <div class="panel-body">
                         <h5><span class="label label-primary" style="color: #500095">Answer</span></h5>

                        <p style="font-style: italic;">
                          <?php echo $faq->description; ?>
                        </p>
                    </div>
                </div>
            </div>
            @empty
             <p>
              Check back later or <a href="/contact" class="orange">Contact Us</a>
            </p>
            @endforelse
        </div>
      </div>
    </div>
</div>

    <div class="row">
        @include('components.featuredJobs')
    </div>
@include('components.search-form')
<!-- @include('components.ads.responsive') -->

@endsection
