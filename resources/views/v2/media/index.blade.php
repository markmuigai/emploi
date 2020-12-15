@extends('layouts.general-layout')

@section('title', 'Media')

@section('description')
Emploi is the Leading Platform for Talent Assessment and Matching for SME's in Africa.
@endsection

@section('content')

<div class="container py-5">
   <div class="col-md-12" >
        <h4 class="orange" style="text-align: center;">Career Videos</h4>
        <div class="row">
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
</div> 

@endsection
