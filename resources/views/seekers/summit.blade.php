@extends('layouts.general-layout')

@section('title','Emploi :: Summit')

@section('description')
Emploi is the Leading Platform for Talent Assessment and Matching for SME's in Africa.
@endsection

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>

<style type="text/css">
   .summit-header
   {
      background: linear-gradient(#500095 100%,#f2f2f2 100%);background:linear-gradient(to right,#500095,rgba(80,0,160,.3)), url(../images/seeker_services.jpg);
      height: 50vh;
      background-repeat: no-repeat;
      background-position: 85% center;
    }


    .modal-dialog{
        overflow-y: initial !important
    }
    .modal-content{
        height: 650px;
        overflow-y: auto;
    }

     

    .pricing .card {
      border: none;
      border-radius: 1rem;
      transition: all 0.2s;
      box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
    }

    .pricing hr {
      margin: 1.5rem 0;
    }

    .pricing .card-title {
      margin: 0.5rem 0;
      font-size: 0.9rem;
      letter-spacing: .1rem;
      font-weight: bold;
    }

    .pricing .card-price {
      font-size: 1.7rem;
      margin: 0;
    }

    .pricing .card-price .period {
      font-size: 0.8rem;
    }

    .pricing ul li {
      margin-bottom: 1rem;
    }

    .pricing .text-muted {
      opacity: 0.7;
    }

    .pricing .btn {
      font-size: 80%;
      border-radius: 5rem;
      letter-spacing: .1rem;
      font-weight: bold;
      padding: 1rem;
      transition: all 0.2s;
    }

    /* Hover Effects on Card */

    @media (min-width: 992px) {
      .pricing .card:hover {
        margin-top: -.25rem;
        margin-bottom: .25rem;
        box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.3);
      }
      .pricing .card:hover .btn {
        opacity: 1;
      }
  }


  .ribbon {
    width: 150px;
    height: 150px;
    overflow: hidden;
    position: absolute;
  }

  .ribbon::before,
  .ribbon::after {
    position: absolute;
    z-index: -1;
    content: '';
    display: block;
    border: 5px solid #2980b9;
  }

  .ribbon span {
    position: absolute;
    display: block;
    width: 225px;
    padding: 15px 0;
    background-color: #E87341; 
    /* #3498DB */
    box-shadow: 0 5px 10px rgba(0,0,0,.1);
    color: #fff;
    font: 700 18px/1 'Lato', sans-serif;
    text-shadow: 0 1px 1px rgba(0,0,0,.2);
    text-transform: uppercase;
    text-align: center;
  }

  /* top right*/
.ribbon-top-right {
  top: -10px;
  right: -10px;
}
.ribbon-top-right::before,
.ribbon-top-right::after {
  border-top-color: transparent;
  border-right-color: transparent;
}
.ribbon-top-right::before {
  top: 0;
  left: 0;
}
.ribbon-top-right::after {
  bottom: 0;
  right: 0;
}
.ribbon-top-right span {
  left: -25px;
  top: 30px;
  transform: rotate(45deg);
}

</style>

<style>

  .banner{
    margin: 0;
    padding: 0;
    background: linear-gradient(#500095 100%,#f2f2f2 100%);background:linear-gradient(to right,#500095,rgba(80,0,160,.3)), url(../images/seeker_services.jpg) no-repeat;
    background-size: cover;
    background-position: center;
    width: 100%;
    height: 27vh;
    overflow: hidden;
    color: white;
    text-align: left;
    padding-left: 20px;
    font-family: sans-serif;
    /* text-transform: uppercase; */

  }

  .banner h1{
    margin: 0;
  }

  .banner h2{
    margin: 0 0 20px 0;
  }

  .banner a{
    display: inline-block;
    padding: 10px 20px;
    background: #E87341;
    color: #ffffff;
    text-decoration: none;
    transition: 20s;
  }

  .banner a:hover{
    background: none;
    color: white;
  }

  .panel-title:hover{
    color: #554695;
  }



</style>
<div class="container container-fluid pb-4">
    <div class="text content-left summit-header"><br><br><br>
        <div style="margin-left: 50px; color: white">
            <h1 >Summit Plan</h1>
             <p style="font-size:18px;">Coaching and support that gets you a job<br>where you will thrive not just survive.</p>
        </div>          
</div><br>

<div class="container">
  <h4 class="text-center pt-4" style="font-weight: bold;">Get your career to the top</h4>
  <p class="h6 text-center">
    Are your job application efforts proving unfruitful? The Career Summit will land you that interview ASAP!</p>
</div>


<section class="pricing py-5">
      <div class="container">
        <div class="row">

          <div class="col-lg-4">
            <div class="card mb-5 mb-lg-0">
              <div class="card-body"><br><br>
                <h5 class="card-title text-muted text-uppercase text-center">Exclusive Placement</h5>
                <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Professional discovery- In-depth career advisory</strong></li>
                  <li><span class="fa-li"><i class="fas fa-check"></i></span>Career profile -Opportunity mapping</li>
                  <li><span class="fa-li"><i class="fas fa-check"></i></span>Fine-tuning of application tools, pitches, presentations and outreach messaging</li>
                  <li><span class="fa-li"><i class="fas fa-check"></i></span>Coaching(2 sessions) on the best interviewing techniques- 100% success rate to date</li>
                  <li><span class="fa-li"><i class="fas fa-check"></i></span>Vacancy hunting</li>
                  <li><span class="fa-li"><i class="fas fa-check"></i></span>Post placement follow-up and support</li>
                  <li><span class="fa-li"><i class="fas fa-check"></i></span>CV Review</li>
                  <li><span class="fa-li"><i class="fas fa-check"></i></span>CV Editing</li>
                </ul>
                <a href="#" class="btn btn-block text-uppercase btn-white" style="background-color: #500094;" type="button" data-toggle="modal" data-target="#myModal2">GET STARTED</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="card mb-5 mb-lg-0">
              <div class="card-body">
                <div class="ribbon ribbon-top-right ml-2"><span>50% Off</span></div><br><br>
                <h5 class="card-title text-muted text-uppercase text-center">Professional CV Editing</h5>
                <hr>

                <ul class="fa-ul pb-3">
                  <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Increased interview chances</strong></li>
                  <li><span class="fa-li"><i class="fas fa-check"></i></span>Indepth career advisory</li>
                  <li><span class="fa-li"><i class="fas fa-check"></i></span>Summarised skills and achievements</li>
                  <li><span class="fa-li"><i class="fas fa-check"></i></span>Cover Letter</li>
                  <li><span class="fa-li"><i class="fas fa-check"></i></span>Updated resume</li>
                  <li><span class="fa-li"><i class="fas fa-check"></i></span>Timely format</li>
                  <li><span class="fa-li"><i class="fas fa-check"></i></span>Industry –accepted standards</li>
                  <li><span class="fa-li"><i class="fas fa-check"></i></span>Professional touch</li>
                  <li><span class="fa-li"><i class="fas fa-check"></i></span>Objective Point of View</li>
                </ul><br><br><br>
                <a href="#" class="btn btn-block text-uppercase btn-white" style="background-color: #500094;" type="button" data-toggle="modal" data-target="#myModal1">Get Started</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="card">
              <div class="card-body"><br><br>
                <h5 class="card-title text-muted text-uppercase text-center">Interview Coaching</h5>
                <hr>
                <ul class="fa-ul pb-2">
                  <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Practical interview experience</strong></li>
                  <li><span class="fa-li"><i class="fas fa-check"></i></span>In depth career advisory</li>
                  <li><span class="fa-li"><i class="fas fa-check"></i></span>Build your confidence</li>
                  <li><span class="fa-li"><i class="fas fa-check"></i></span>Employer insight</li>
                  <li><span class="fa-li"><i class="fas fa-check"></i></span>Personalized expert feedback</li>
                </ul><br><br><br><br><br><br><br><br><br><br><br>
                <a href="/job-seekers/coaching-request" class="btn btn-block text-uppercase btn-white" style="background-color: #500094;" type="button">Get Started</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> 


    <div class="banner animate__animated animate__pulse animate__infinite	infinite animate__slow	10s">

      <h1>50% Off</h1>
      <h5>Professional CV Editing</h5>
      <a href="#" data-toggle="modal" data-target="#myModal1">Request</a>
    
    </div>

<section>
    <div class="col-md-12 pb-4 pt-2">
      <div class="container-fluid text-center pt-4 pb-4">
        <div class="h3 font-weight-bold">SEE THE DIFFERENCE A PROFESSIONAL RESUME MAKES</div>
      </div>
      <div class="row mx-auto pt-3">
        <div class="row col-md-6 mx-auto mr-1" style="background-color:#554594">
          <div class="container-fluid text-center pt-3">
            <div class="h5 font-weight-bold" style="color:white;">BEFORE</div>
            <img src="/images/cv91.jpg" style="width:100%; height:90%;pointer-events: none;" class="shadow">

          </div>
        </div>
        
        <div class="row col-md-6 mx-auto ml-1" style="background-color:#554594">
          <div class="container-fluid text-center pt-3">
            <div class="h5 font-weight-bold" style="color:white;">AFTER</div>
            <img src="/images/cv103.jpg" style="width:100%; height:90%;pointer-events: none;" class="shadow">

          </div>
        </div>
      </div>
    </div>
    <div class="container row pb-4">
         <a href="/job-seekers/free-cv-review" class="btn btn-white" style="background-color: #500094; margin: 0 auto;">Request For Free CV Review</a>
    </div>
  </section>

  @include('components.testimonials.cv-edit')
  
<div class="container-fluid no-padding" style="display: none;">
<h3 class="orange text-center">Our Career Experts</h3>
    <div class="row">
      <div class="col-md-4">
        <div class="card">
            <div class="card-body team-member text-center">
                <img src="/images/avatar.png" alt="simon" />
                <h5>Simon Gitau</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris malesuada tortor quis nunc dignissim, a eleifend nisi mollis. Proin vel enim eu nisi scelerisque vehicula. Proin sit amet elementum odio. Nunc quis posuere ipsum. Morbi malesuada tellus quam. Nulla nec condimentum nisl. Mauris maximus quam sem.</p>
            </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
            <div class="card-body team-member text-center">
                <img src="/images/career_experts/eva.png" alt="eva" />
                <h5>Eva Wanjohi</h5>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris malesuada tortor quis nunc dignissim, a eleifend nisi mollis. Proin vel enim eu nisi scelerisque vehicula. Proin sit amet elementum odio. Nunc quis posuere ipsum. Morbi malesuada tellus quam. Nulla nec condimentum nisl. Mauris maximus quam sem.</p>
            </div>
        </div>
      </div>
      <div class="col-md-4">
         <div class="card">
            <div class="card-body team-member text-center">
                <img src="/images/avatar.png" alt="sophy" />
                <h5>Tom Kamaliki</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris malesuada tortor quis nunc dignissim, a eleifend nisi mollis. Proin vel enim eu nisi scelerisque vehicula. Proin sit amet elementum odio. Nunc quis posuere ipsum. Morbi malesuada tellus quam. Nulla nec condimentum nisl. Mauris maximus quam sem.</p>
            </div>
          </div>
        </div>
    </div>
  </div><br>  

  @include('components.blogs')


<br><div class="container-fluid no-padding">
 
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

</div>

<div class="row">
    <div class="col-md-4">

      <!-- Modal -->
        <div class="modal fade" id="myModal1" role="dialog">
              <div class="modal-dialog">
              
                    <!-- Modal content-->
                    <div class="modal-content">
                          <div class="modal-header">
                           <!--  <button type="button" style="background-color: #FF5733" class="close" data-dismiss="modal">&times;</button> -->
                            <h4 class="orange">Professional CV Editing</h4>
                          </div>
                          <div class="modal-body" id="charges">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="card">
                                    <div class="card-body">
                                      <?php
                                        $price = 2000;
                                        $p = \App\Product::where('slug','entry_level_cv_edit')->first();
                                        if(isset($p->id))
                                        
                                      ?>
                                         <p>1. Entry Level</p>
                                         <h5><del>Kshs {{ $price }}</del></h5>
                                          <h5>Kshs 1000</h5>
                                          <form method="POST" action="/checkout" >
                                        @csrf
                                        <input type="hidden" name="product" value="entry_level_cv_edit">
                                        <p>
                                        <input type="submit" name="" value="Request" class="btn btn-orange-alt">
                                        </p>
                                        </form>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="card">
                                    <div class="card-body">
                                      <?php
                                        $price = 4000;
                                        $p = \App\Product::where('slug','mid_level_cv_edit')->first();
                                        if(isset($p->id))
                                        
                                      ?>
                                         <p>2. Mid Level</p>
                                         <h5><del>Kshs {{ $price }}</del></h5>
                                          <h5>Kshs 2000</h5>
                                          <form method="POST" action="/checkout" >
                                        @csrf
                                        <input type="hidden" name="product" value="mid_level_cv_edit">
                                        <p>
                                        <input type="submit" name="" value="Request" class="btn btn-orange-alt">
                                        </p>
                                        </form>
                                    </div>
                                  </div>
                                </div>
                                </div>

                               <div class="row">
                              <div class="col-md-6">
                                  <div class="card">
                                    <div class="card-body d-flex flex-column justify-content-center">
                                      <?php
                                        $price = 6000;
                                        $p = \App\Product::where('slug','c_change_cv_edit')->first();
                                        if(isset($p->id))
                                          
                                      ?>
                                        <p>3. Career Change / Promotion Seeking CV</p>
                                        <h5><del>Kshs {{ $price }}</del></h5>
                                          <h5>Kshs 3000</h5>
                                        <form method="POST" action="/checkout">
                                        @csrf
                                        <input type="hidden" name="product" value="c_change_cv_edit">
                                        <p>
                                        <input type="submit" name="" value="Request" class="btn btn-orange-alt">
                                        </p>
                                        </form>
                                    </div>
                                  </div>
                                </div>

                                  <div class="col-md-6">
                                  <div class="card">
                                    <div class="card-body d-flex flex-column justify-content-center">
                                      <?php
                                        $price = 6000;
                                        $p = \App\Product::where('slug','mgnt_cv_edit')->first();
                                        if(isset($p->id))
                                          
                                      ?>
                                      <p>4. Management Level</p>
                                      <h5><del>Kshs {{ $price }}</del></h5>
                                        <h5>Kshs 3000</h5>
                                      <form method="POST" action="/checkout">
                                      @csrf
                                      <input type="hidden" name="product" value="mgnt_cv_edit">
                                      <p>
                                      <input type="submit" name="" value="Request" class="btn btn-orange-alt">
                                      </p>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="card">
                                    <div class="card-body d-flex flex-column justify-content-center">
                                      <?php
                                        $price = 10000;
                                        $p = \App\Product::where('slug','s_mgnt_cv_edit')->first();
                                        if(isset($p->id))
                                          
                                      ?>
                                        5. Senior Management Level</p>
                                        <del>Kshs {{ $price }}</del></h5>
                                        <h5>Kshs 5000</h5>
                                        <form method="POST" action="/checkout">
                                        @csrf
                                        <input type="hidden" name="product" value="s_mgnt_cv_edit">
                                        <p>
                                        <input type="submit" name="" value="Request" class="btn btn-orange-alt">
                                        </p>
                                        </form>
                                    </div>
                                  </div>
                                </div>
                                  
                              

                              

                                 <div class="col-md-6">
                                    <ul>
                                      <li>Streamline your job search process.</li>
                                      <li>Boost your chance of getting a face-to-face interview.</li>
                                      <li>Helps employers sum up your skills and achievement.</li>
                                    </ul>                       
                                 </div>
                              </div>
                                    <h6 style="text-align: center">NOTE: "These prices may vary upto 50% discount depending on the workload assessment"</h6>



                              <div style="width: 100%">
                                    <a href="/refer">
                                    <img src="/images/promotions/cv-editing_refer_banner.jpeg" width="100%" alt="Earn up to Ksh.500 by referring a friend"> 
                                    </a>    
                                  </div>     
                                     

                                <br id="request-cv-edit-form">

                                <div class="row" id="request-cv-edit-form">
                                  <div class="col-md-8 offset-md-2">
                                    <h3 style="text-align: center;">Request Professional CV Editing</h3>
                                  </div>
                                  <br><br>
                                  
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
                                            <input type="submit" style="float: right;" class="btn btn-success" value="Request Service">
                                          </p>
                                    <p>
                                      
                                      <a href="#charges" class="btn btn-orange-alt">View Pricing</a>
                                      
                                    </p>
                                      
                                  </form>
                                </div><br>
                                <!--  <div class="col-md-12"style="background-color: rgba(81, 81, 81, .3)">
                                    <div class="card" >
                                      <div class="card-body">
                                      <p class="orange">Have you been called to an interview urgently? Do not worry here at Emploi we can assist you with emergency CV EDITING ready within 24 Hours. So the next time you get this kind of emergency, know that we have got you covered.</p>
                                      </div>                                
                                    </div>
                                </div>  -->

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-orange-alt" data-dismiss="modal">Close</button>
                          </div>
                    </div>      
              </div>
        </div>
      </div><br><br>



      <!-- Modal -->
          <div class="modal fade" id="myModal2" role="dialog">
              <div class="modal-dialog">
              
                    <!-- Modal content-->
                    <div class="modal-content">
                          <div class="modal-header">
                           <!--  <button type="button" style="background-color: #FF5733" class="close" data-dismiss="modal">&times;</button> -->
                      
                          <h4 class="orange">Exclusive placement</h4>
                          </div>
                          <div class="modal-body">
                                 <h5 class="pt-2">THIS IS FOR YOU IF:</h5>
                                 <ul>
                                     <li>You are looking for career progression but do not have the time and expertise to carry out an efficient job search.</li>
                                     <li>You have been job hunting for a while with no success, either sending applications or attending interviews with no feedback.</li>
                                     <li>You are looking to grow into your career either at your current employer, or elsewhere, but aren’t sure how to go about it.</li>
                                     <li>You are having a distressed job search, either having recently been laid off, or facing a potential lay-off.</li>
                                 </ul>
                                   <div class="text-center py-3">
                                        <img src="/images/exclusive.jpg" class="w-50" alt="Premium Placement">
                                    </div>
                                 <h5 class="pt-2">WHAT DOES IT ENTAIL?</h5>
                                 <ol>
                                     <li>Professional discovery- In-depth career advisory</li>
                                     <li>Career profile -Opportunity mapping</li>
                                     <li>Job Preparedness</li>
                                          <ul>
                                              <li>Fine-tuning of application tools, pitches, presentations and outreach messaging</li>
                                              <li>Coaching(2 sessions) on the best interviewing techniques- 100% success rate to date</li>
                                          </ul>
                                     <li>Vacancy hunting</li>
                                     <li>Post placement follow-up and support</li>
                                 </ol>     

                                         @include('components.ads.responsive')
                                     
                                  
                                    <div class="row" style="text-align: center;">
                                          <div class="col-lg-12" style="">
                                              <h5>Other FREE Benefits!</h5>
                                          </div>
                                          <div class="col-lg-4 card">
                                            <ul class="fa-ul">
                                              <li><span class="fa-li"><i class="fas fa-check orange"></i></span>CV Review</li>
                                            </ul>
                                          </div>

                                          <div class="col-lg-4 card">
                                            <ul class="fa-ul">
                                              <li><span class="fa-li"><i class="fas fa-check orange"></i></span>CV Editing</li>
                                            </ul>
                                          </div>

                                          <div class="col-lg-4 card">
                                            <ul class="fa-ul">
                                              <li><span class="fa-li"><i class="fas fa-check orange"></i></span>LinkedIn Profile Update</li>
                                            </ul>
                                          </div> 
                                        </div>
                                    <div class="col-md-12 card">
                                            <ul class="fa-ul card-body">
                                              <li><span class="fa-li" style="text-align:center;"><i class="fas fa-check orange"></i></span>Featured jobseeker tag for 3 months on the website to appear on all searches and applicant lists</li>
                                            </ul>
                                    </div>    

                                <div class="text-center">
                                    <a href="/job-seekers/placement-request" class="btn btn-orange">Make Request</a>
                                </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-orange-alt" data-dismiss="modal">Close</button>
                          </div>
                    </div>      
              </div>
        </div>

                
  
        <div class="modal fade" id="myModal3" role="dialog">
              <div class="modal-dialog">
              
                    <!-- Modal content-->
                    <div class="modal-content">
                          <div class="modal-header">
                           <!--  <button type="button" style="background-color: #FF5733" class="close" data-dismiss="modal">&times;</button> -->
                            <h4 class="orange">Interview Coaching</h4>
                          </div>
                          <div class="modal-body">
                            <p>Interview coaching can increase your chances of getting a job for many reasons;</p><br>
                                <ul>
                                      <li>Coaching gives you experience answering many different interview questions and pretending to interact with potential employers.</li>
                                      <li>Your coach can provide you with valuable feedback that will help you improve your responses during interviews.</li>
                                      <li>The more you practice with a coach, the more confident you will be.</li>
                                      <li>A coach can give you the tools to feel confident and self-assured going into any interview.</li>
                                </ul> 
                          </div>
                          
                          <div class="text-center">
                              <a href="/contact" class="btn btn-orange">Contact Us</a>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-orange-alt" data-dismiss="modal">Close</button>
                          </div>
                    </div>      
              </div>
        </div>
@endsection
