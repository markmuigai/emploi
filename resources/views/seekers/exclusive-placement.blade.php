@extends('layouts.general-layout')

@section('title','Emploi :: Exclusive Placement')

@section('description')
Emploi is the Leading Platform for Talent Assessment and Matching for SME's in Africa.
@endsection

@section('content')

<div class="container py-5">
    <h2 class="orange text-center">Exclusive Placement</h2>
     <h5 class="pt-2">WHAT IS IT?</h5>
    <ul>
        <li>It is our responsibility to commit and help job seekers find open positions in companies where they’ll thrive, not just survive. We want to help you find a well-suited position where you are professionally rewarded and appreciated for doing what you love to do.</li>
        <li>Through this service, we shall take you up as a special client and endeavor to get you employment within the shortest time possible, in an industry and location of your choice.</li>
    </ul>

         @include('components.ads.responsive')

     <h5 class="pt-2">THIS IS FOR YOU IF:</h5>
     <ul>
         <li>You are looking for career progression but do not have the time and expertise to carry out an efficient job search.</li>
         <li>You have been job hunting for a while with no success, either sending applications or attending interviews with no feedback.</li>
         <li>You are looking to grow into your career either at your current employer, or elsewhere, but aren’t sure how to go about it.</li>
         <li>You are having a distressed job search, either having recently been laid off, or facing a potential lay-off.</li>
     </ul>
       <div class="text-center py-3">
            <img src="/images/placement.jpg" class="w-50" alt="Premium Placement">
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

@endsection
