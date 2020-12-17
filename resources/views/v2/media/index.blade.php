   @extends('layouts.general-layout')

@section('title', 'Media')

@section('description')
Emploi is the Leading Platform for Talent Assessment and Matching for SME's in Africa.
@endsection

@section('content')

<div class="container-fluid p-5">
   <h3 class="orange text-center">Career Videos</h3>
   <div class="row">
      <div class="col-md-9 mt-2" >
         <div class="row">
            <div class="col-md-4 card">
                  <iframe src="https://www.youtube.com/embed/shbQ6cJKqJw" frameborder="0" allowfullscreen></iframe>                    
                     <h4>Welcome to Emploi 2.0: Learn about the website</h4>
                     <p>Take a dive through the Emploi website and experience newly added features through this presentation.
                     </p>                       
            </div>
            <div class="col-md-4 card">
                  <iframe src="https://www.youtube.com/embed/oT1Xi8HS3FE" frameborder="0" allowfullscreen></iframe>                    
                     <h4>Emploi Launch</h4>
                     <p>Emploi 2.0 is finally here! Have a look at our new design, improve your job score ranking with our new Self-Assessment feature and gather insight on your resume with our AI- enabled Automatic CV Review. Stay tuned.
                     </p>                       
            </div>
            <div class="col-md-4 card">
                  <iframe src="https://www.youtube.com/embed/7pj-dCfYptc" frameborder="0" allowfullscreen></iframe>                    
                     <h4>Technology and Employment: Our CEO's interview with Ndereva Hillary of Y254 TV</h4>
                     <p>Conversations around, the future of work, What is @emploi.co doing to help job seekers cope during this transition.?
                     </p>                       
            </div>
            <div class="col-md-4 card">
                  <iframe src="https://www.youtube.com/embed/BVJ4punLoMc" frameborder="0" allowfullscreen></iframe>                    
                     <h4><a href="/job-seekers/summit"> Resume Tips-Make Yourself a Stronger Candidate Today!</a></h4>
                     <p>Here is Maggie giving insight into Emploi's CV editing service. LISTEN, SIGN UP AND GET HIRED TODAY.
                     </p>                       
            </div>
            <div class="col-md-4 card">
                  <iframe src="https://www.youtube.com/embed/E6dTmonX6Vk" frameborder="0" allowfullscreen></iframe>                    
                     <h4><a href="/job-seekers/services">Emploi Services-Land that dream job Today!</a></h4>
                     <p>Is your job search proving tough? Make it easier by signing up at Emploi.co today! 
                     </p>                       
            </div>
            <div class="col-md-4 card">
                  <iframe src="https://www.youtube.com/embed/fMkCW5yIYLs" frameborder="0" allowfullscreen></iframe>                   
                     <h4>The future of jobs amid the job losses during COVID-19</h4>
                     <p>A live conversation with CEO of Emploi, Sophy Mwale, and Simba Elijah Charles of Metropol TV on the future of jobs.
                     </p>                       
            </div>
         </div>                      
      </div>
      <div class="col-md-3">
         <div class="card mt-2 mb-3">
             <div class="card-body">
                 <h5><a class="text-primary" href="/job-seekers/summit">Professional CV Editing</a></h5>
                 <p>
                     For a detailed, targeted, concise and well-presented CV, talk to our CV Editing experts.
                 </p>
             </div>
         </div>
         <div class="card mt-2 mb-3">
             <div class="card-body">
                 <h5><a class="text-primary" href="/job-seekers/cv-builder">Free CV builder</a></h5>
                 <p>
                     Create your resume in no time at all!
                 </p>
             </div>
         </div>
         <div class="card mt-2 mb-3">
             <div class="card-body">
                 <h5><a class="text-primary" href="/job-seekers/cv-templates">  Downloadable CV templates with advice</a></h5>
                 <p>
                     Choose a resume that suits your professional profile
                 </p>
             </div>
         </div>
         <div class="card mt-2 mb-3">
             <div class="card-body">
                 <h5><a class="text-primary" href="/job-seekers/cv-templates">Exclusive Placement</a></h5>
                 <p>
                     Get seen by employers as we rank you on top of the employer search list. We offer exclusive placement services matching your career and Interview
                     coaching to land your dream job.
                 </p>
             </div>
         </div>
         <div class="card mt-2 mb-3">
             <div class="card-body">
                 <h5>
                     @if (auth()->user())
                         <a class="text-primary" href="/v2/self-assessments/create">Self Assessment</a>
                     @else
                        <a class="text-primary" type="button" data-toggle="modal" data-target="#selfAssessmentModal">
                            Self Assessment
                        </a>
                     @endif
                 </h5>
                 <p>
                     Improve your job score ranking with intriguing psychometric tests!
                 </p>
             </div>
         </div>
     </div>
   </div>
</div> 

@endsection

@section('modal')
    @include('v2.components.modals.self-assessment')
@endsection