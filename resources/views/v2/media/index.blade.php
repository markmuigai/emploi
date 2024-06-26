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
                <div class="card-body" style="  background: linear-gradient(to right,#500095,rgba(80,0,149,.3)); color: #fff;">
                    <a href="/v2/job-seekers/cv-editing/create">
                        <h5>Professional CV Editing</h5>
                        <p>
                            For a detailed, targeted, concise and well-presented CV, talk to our CV Editing experts.
                        </p>
                    </a>
                </div>
            </div>
            <div class="card mt-2 mb-3">
                <div class="card-body" style="  background: linear-gradient(to right,#500095,rgba(80,0,149,.3)); color: #fff;">
                    <a href="/job-seekers/cv-builder">
                        <h5>Free CV builder</h5>
                        <p>
                            Create your resume in no time at all!
                        </p>
                    </a>
                </div>
            </div>
            <div class="card mt-2 mb-3">
                <div class="card-body" style="  background: linear-gradient(to right,#500095,rgba(80,0,149,.3)); color: #fff;">
                    <a href="/job-seekers/cv-templates">
                        <h5>Downloadable CV templates with advice</h5>
                        <p>
                            Choose a resume that suits your professional profile
                        </p>
                    </a>
                </div>
            </div>
            <div class="card mt-2 mb-3">
                <div class="card-body" style="  background: linear-gradient(to right,#500095,rgba(80,0,149,.3)); color: #fff;">
                    <a href="/job-seekers/cv-templates">
                        <h5>Exclusive Placement</h5>
                        <p>
                            Get seen by employers as we rank you on top of the employer search list. We offer exclusive placement services matching your career and Interview
                            coaching to land your dream job.
                        </p>
                    </a>
                </div>
            </div>
            <div class="card mt-2 mb-3">
                <div class="card-body" style="  background: linear-gradient(to right,#500095,rgba(80,0,149,.3)); color: #fff;">
                    <a href="/v2/assessment/about">
                        <h5>
                            Self Assessment
                        </h5>
                        <p>
                            Improve your job score ranking with intriguing psychometric tests!
                        </p>
                    </a>
                </div>
            </div>
            @include('v2.components.get-help')
        </div>
   </div>
</div> 

@endsection

@section('modal')
    @include('v2.components.modals.self-assessment')
@endsection