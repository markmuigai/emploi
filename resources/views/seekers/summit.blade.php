@extends('layouts.general-layout')

@section('title','Emploi :: Summit')

@section('description')
Emploi is the Leading Platform for Talent Assessment and Matching for SME's in Africa.
@endsection

@section('content')
<style type="text/css">
   .summit-header
   {
      background: linear-gradient(to right, #808080, rgba(81, 81, 81, .3)), url(../images/seeker_services.jpg);
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
</style>
<div class="container">
    <div class="text content-left summit-header"><br><br><br>
        <div style="margin-left: 50px; color: white">
            <h1 >Summit Plan</h1>
             <p>Coaching and support that gets you a job<br>where you will thrive not just survive</p>
        </div>          
    </div><br>
  

 <div class="row">
    <div class="col-md-4">
         <div class="card">
              <div class="card-body">
                  <h5 class="orange">Professional CV Editing</h5>
                  <p class="card-text">
                    <ui>
                        <li>We first go through your CV to understand your professional journey and angle then send you a questionnaire which will ask you questions about your career goals and experiences.</li> 
                        <p>However, a personal consultation will be necessary for us to really get an idea of how to best market you to employers.</p>
                        <li>So we will schedule an IN-DEPTH phone interview with one of our Certified Resume Writers to go over your questionnaire answers and make sure we know everything needed to make you stand out! (This is just one of the ways we are different from other firms).</li>
                    </ui>
                  </p><br>
              </div>
              <div class="card-footer">            
                  <button type="button" class="btn btn-orange" data-toggle="modal" data-target="#myModal1">SELECT</button>
              </div>
          </div>   

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
                                      <h5><del>Kshs {{ $price }}</del></h5>
                                         <p>Entry Level</p>
                                          <br><br>
                                          <div class="orange">50% off</div>
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
                                      <h5><del>Kshs {{ $price }}</del></h5>
                                         <p>Mid Level</p>
                                          <br><br>
                                          <div class="orange">50% off</div>
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
                                      <h5><del>Kshs {{ $price }}</del></h5>
                                        <p>Career Change / Promotion Seeking CV</p>
                                        <div class="orange">50% off</div>
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
                                      <h5><del>Kshs {{ $price }}</del></h5>
                                      <p>Management Level</p>
                                      <br>
                                      <div class="orange">50% off</div>
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
                                      <del>Kshs {{ $price }}</del></h5>
                                        Senior Management Level</p>
                                        <div class="orange">50% off</div>
                                      Kshs 5000</h5>
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
                                    <h6 style="text-align: center">NOTE: "These prices may vary from 25% to 50% discount depending on the workload assessment"</h6>



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
                                        <select name="industry" class="form-control">
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
                                  <div class="col-md-12"style="background-color: rgba(81, 81, 81, .3)">
                                    <div class="card" >
                                      <div class="card-body">
                                      <p class="orange">Have you been called to an interview urgently? Do not worry here at Emploi we can assist you with emergency CV EDITING ready within 24 Hours. So the next time you get this kind of emergency, know that we have got you covered.</p>
                                      </div>                                
                                    </div>
                                </div>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-orange-alt" data-dismiss="modal">Close</button>
                          </div>
                    </div>      
              </div>
        </div>
      </div><br><br>

        <div class="col-md-4">
          <div class="card">
                <div class="card-body">
                  <h5 class="orange">Exclusive Placement</h5>
                  <p class="card-text">
                      <ul>
                          <li>It is our responsibility to commit and help job seekers find open positions in companies where they’ll thrive, not just survive.</li>
                          <li> We want to help you find a well-suited position where you are professionally rewarded and appreciated for doing what you love to do.</li>
                          <li>Through this service, we shall take you up as a special client and endeavor to get you employment within the shortest time possible, in an industry and location of your choice.</li>
                      </ul>
                  </p><br>
              </div>  
              <div class="card-footer">            
                  <button type="button" class="btn btn-orange" data-toggle="modal" data-target="#myModal2">SELECT</button>
              </div>
          </div>

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
                                 <h5 class="pt-2">WHAT DOES IT ENTAILS</h5>
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
                                          <div class="col-md-12" style="">
                                              <h5>Other FREE Benefits!</h5>
                                          </div>
                                          <div class="col-md-4 card">
                                              <div class="card-body">
                                                 <p>CV Review</p>
                                              </div>     
                                          </div>

                                          <div class="col-md-4 card">
                                              <div class="card-body">
                                                  <p>CV Editing</p>
                                              </div>   
                                          </div>

                                          <div class="col-md-4 card">
                                              <div class="card-body">
                                                <p>Updating Of LinkedIn Profile</p>
                                              </div>   
                                          </div> 
                                        </div>
                                    <div class="col-md-12 card">
                                          <div class="card-body">
                                            <p style="text-align: center">Featured jobseeker tag for 3 months on the website to appear on all searches and applicant lists</p>
                                          </div>
                                    </div>    

                                <div class="text-center">
                                    <a href="/contact" class="btn btn-orange">Contact Us</a>
                                </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-orange-alt" data-dismiss="modal">Close</button>
                          </div>
                    </div>      
              </div>
        </div>
      </div>

                
        <div class="col-md-4">
          <div class="card">
                <div class="card-body">
                  <h5 class="orange">Interview Coaching</h5>
                  <p class="card-text">
                      <p>Interview coaching can increase your chances of getting a job for many reasons;</p>
                      <ul>
                        <li> Coaching gives you experience answering many different interview questions and pretending to interact with potential employers.</li>
                        <li>Your coach can provide you with valuable feedback that will help you improve your responses during interviews.</li>
                        <li>The more you practice with a coach, the more confident you will be.</li>
                        <li> A coach can give you the tools to feel confident and self-assured going into any interview.</li>
                      </ul>
                    </p>                                                              
                </div>            
              <div class="card-footer">
                <a href="/contact" class="btn btn-orange">SELECT</a>
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
      </div>
    </div><br>


    <h3 class="text-center" style="display: none;">Some Of Our Interview Coaches</h3>
    <div class="card-group" style="display: none;">
        <div class="card">
            <div class="card-body team-member text-center">
                <img src="/images/avatar.png" alt="simon" />
                <h5>Simon Gitau</h5>
              
            </div>
        </div>
        <div class="card">
            <div class="card-body team-member text-center">
                <img src="/images/avatar.png" alt="eva" />
                <h5>Eva Wanjohi</h5>
              
            </div>
        </div>
         <div class="card">
            <div class="card-body team-member text-center">
                <img src="/images/avatar.png" alt="sophy" />
                <h5>Sophy Mwale</h5>
         
            </div>
        </div>
    </div><br>    
  </div>

@endsection
