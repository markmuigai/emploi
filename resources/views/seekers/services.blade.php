@extends('layouts.general-layout')

@section('title','Emploi :: Job Seeker Services')

@section('description')
Emploi is the Leading Platform for Talent Assessment and Matching for SME's in Africa.
@endsection

@section('content')
<style type="text/css">

   .jservices_header
   {
      background: linear-gradient(#500095 100%,#f2f2f2 100%);background:linear-gradient(to right,#500095,rgba(80,0,160,.3)), url(../images/seeker_services.jpg) no-repeat;
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
  /* max-width: 1000px; */
  /* margin: 40px 10px; */
}
.snip1214 .plan {
  margin: 0;
  width: 33.3%;
  position: relative;
  float: left;
  background-color: #ffffff;
  border: 1px solid rgba(0, 0, 0, 0.1);
}

.snip1214 .free-plan {
  margin: 0;
  width: 100% !important;
  position: relative;
  background-color: #ffffff;
  border: 1px solid rgba(0, 0, 0, 0.1);
  margin-bottom: 50px;
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

.panel-title:hover{
  color: #554695;
  }
</style>

<div class="container">
  <div class="jservices_header"><br><br><br>
    <div style="margin-left: 50px; color: white">
        <h1 >Job Seeker Services</h1>
        <h6>A mix of technology with personalized expert support to <br>fast track your career progress.</h6><br>
        <a href="{{Route('v2.cv-review.create', ['reviewResults' => 72])}}" class="btn btn-orange"> Automatic CV Review</a>
    </div>           
  </div>
</div>
 <div class="container">
    <div class="card">
        <div class="card-body">         
            <div class="snip1214">
              <div class="free-plan plan">
                <h5 class="plan-title">
                  Free
                </h5>
              <div class="plan-cost"><span class="plan-price">Ksh. 0</span><span class="plan-type">/ <br>Month</span></div> 
              <ul class="plan-features">   
                <div class="row">
                  <div class="col-md-6">
                    <li><i class="fas fa-city"></i><a class="text-primary" href="/vacancies">View and apply vacancies</a>
                      <p>
                        Get all the latest jobs at one stop and apply.
                      </p>
                    </li>
                    <li><i class="fas fa-wrench"></i><a class="text-primary" href="/job-seekers/cv-builder">Free CV builder</a>
                      <p>
                        Create your resume in no time at all!
                      </p>
                    </li>
                    <li><i class="fas fa-clipboard-list"> </i><a class="text-primary" href="#"> Access Career advice</a>
                      <p>
                        Instantly Check Your Resume for Issues. Review our suggestions to see what you can fix.
                      </p>
                    </li> 
                  </div>
                  <div class="col-md-6">
                    <li><i class="fas fa-file-download"> </i><a class="text-primary" href="/job-seekers/cv-templates">  Downloadable CV templates with advice</a>
                      <p>
                        Choose a resume that suits your professional profile
                      </p>
                    </li>
                    <li><i class="fas fa-chart-bar"> </i><i class="#"> </i>
                      {{-- @if (auth()->user() && auth()->user()->role == 'seeker')
                          <a class="text-primary" href="{{route('v2.self-assessment.create')}}">
                              Self Assessment
                          </a>
                      @else
                          <a class="text-primary" type="button" data-toggle="modal" data-target="#selfAssessmentModal">
                              Self Assessment
                          </a>
                      @endif --}}
                      {{-- <a class="text-primary" href="/">1 self assessment</a> --}}
                      <p>
                        Improve your job score ranking with intriguing psychometric tests!
                      </p>
                    </li>
                    <li><i class="fas fa-tasks"> </i><i class="#"> </i>
                      <a class="text-primary" href="{{Route('v2.cv-review.create', ['reviewResults' => 72])}}">Automatic CV Review</a>
                      <p>
                        Instantly Check Your Resume for Issues then review our suggestions to see what you can fix
                      </p>
                    </li>
                  </div>
                </div>                            
              </ul><br>
              <div class="plan-select"><a href="/join" class="btn btn-primary"> JOIN</a></div>
          </div>
                <div class="plan">
                      <h5 class="plan-title">
                        Pro
                      </h5>
                      <div class="plan-cost"><span class="plan-price">Ksh. 159</span><span class="plan-type">/ <br>Month</span></div>
                      <ul class="plan-features">
                          <li>All free plan benefits</li>
                          <li>Notifications when;</li>
                          <li><i class="ion-checkmark"></i>You’re shorlisted</li>
                          <li><i class="ion-checkmark"></i>Your profile is viewed</li>
                          <li><i class="ion-checkmark"></i>Your CV is requested</li>
                          <li><i class="ion-checkmark"></i>Multiple self assessments</li>
                          <li><i class="ion-checkmark"></i>Improve your job score ranking</li>
                      </ul>
                      <form method="POST" action="/checkout">
                          <div class="plan-select">
                          @csrf
                          <input type="hidden" name="product" value="pro">
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
                      <div class="plan-cost"><span class="plan-price">Ksh. 259</span><span class="plan-type">/ Month</span></div>
                      <ul class="plan-features">
                          <li><i class="ion-checkmark"> </i>All PRO benefits</li>
                          <li><i class="ion-checkmark"> </i> Rank first in all search lists</li>
                          <li><i class="ion-checkmark"> </i>Automatic application to all vacancies that match your skills</li>
                          <li><i class="ion-checkmark"> </i> Real time analytics on your profile performance</li>
                      </ul><br><br><br><br>
                      <form method="POST" action="/checkout">
                          <div class="plan-select">
                          @csrf
                          <input type="hidden" name="product" value="spotlight">
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
                    <div class="plan-select"><a href="#summit" class="btn btn-primary"> SELECT PLAN</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center my-5">
        <div class="col-md-8">
          <h3 class="orange" style="text-align: center;">Join our Talent Pool.</h3>
          <h5 style="text-align: center;">Are you a professional looking for part-time work? <br> A new solution is here for you.</h5>
          @if(isset(Auth::user()->id) && Auth::user()->role == 'seeker' && $user->seeker->isOnPaas())
          @else
          <center>
            <a href="/job-seekers/register-paas" class="btn btn-primary mb-2">Join Golden Club</a>
          </center>
          @endif     
        </div>             
    </div>
  <br>

  @include('components.testimonials.cv-edit')<br>
  @include('components.blogs')<br>


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

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
            <div class="modal-header">
              <!--  <button type="button" style="background-color: #FF5733" class="close" data-dismiss="modal">&times;</button> -->
              <h4 class="orange">Request For Professional CV Editing</h4>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeCvEditRequestModal">
                <i class="fas fa-times" aria-hidden="true"></i>
            </button>
            <div class="modal-body"> 
                    <form method="POST"  enctype="multipart/form-data" action="/cv-editing" class="col-md-12">
                      @csrf
                      <div class="row">
                        <div class="col-md-6">
                          <p>
                            <label>Name:</label>
                            @error('name')
                              <div class="text-center my-2 py-1 alert alert-danger" role="alert">
                                  Invalid name
                              </div>
                              @enderror
                            <input type="text" name="name" required="" maxlength="50" class="form-control" value="{{ isset(Auth::user()->id) ? Auth::user()->name : old('name') }}">
                          </p>
                        </div>
                            <div class="col-md-6">
                          <p>
                            <label>Phone Number:</label>
                            @error('phone_number')
                              <div class="text-center my-2 py-1 alert alert-danger" role="alert">
                                  Invalid phone number
                              </div>
                              @enderror
                            <input type="number" name="phone_number" required="" maxlength="20" class="form-control" value="{{ old('phone_number') }}" placeholder="2547XXXXXXXX" required="">
                          </p>
                        </div>
                      </div>
                    <div class="row">
                      <div class="col-md-6">
                        <p>
                          <label>Email:</label>
                          @error('email')
                            <div class="text-center my-2 py-1 alert alert-danger" role="alert">
                                Invalid e-mail address
                            </div>
                            @enderror
                          <input type="email" name="email" required="" maxlength="50" class="form-control" value="{{ isset(Auth::user()->id) ? Auth::user()->email : old('email') }}">
                        </p>
                      </div>
                      <div class="col-md-6">
                        <p>
                          <label>Current CV: <small>.doc, .docx and .pdf - Max 5MB</small></label>
                          @error('resume')
                            <div class="text-center my-2 py-1 alert alert-danger" role="alert">
                                Invalid resume uploaded
                            </div>
                            @enderror
                          <input type="file" name="resume" required="" accept=".pdf, .doc, .docx">
                        </p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <p>
                          <label>Industry:</label>
                          @error('industry')
                            <div class="text-center my-2 py-1 alert alert-danger" role="alert">
                                Invalid industry selected
                            </div>
                          @enderror
                          <select name="industry" required="" class="form-control">
                            <option disabled selected value> -- select an option -- </option>
                            @forelse(\App\Industry::orderBy('name')->get() as $ind)
                            <option value="{{ $ind->id }}" {{ old('industry') == $ind->id ? 'selected=""' : '' }}>{{ $ind->name }}</option>
                            @empty
                            @endforelse
                          </select>
                        </p>
                      </div>
                      <div class="col-md-6">
                        <p>
                          <label>Message:</label>
                          @error('message')
                            <div class="text-center my-2 py-1 alert alert-danger" role="alert">
                                Invalid message
                            </div>
                            @enderror
                          <textarea class="form-control" placeholder="Optional message " maxlength="500" name="message">{{ old('message') }}</textarea>
                        </p>
                      </div>
                    </div>
                  
                            <p>
                              <input type="submit" style="float: right;" class="btn btn-success" value="Submit">
                            </p>
                      <p>
                        
                        <a href="/job-seekers/summit" class="btn btn-orange-alt" target="_blank">Learn More</a>
                        
                      </p>
                        
                    </form>
                  </div>
            </div>
    </div>
  </div>

@endsection


@section('modal')
    @include('v2.components.modals.self-assessment')
@endsection