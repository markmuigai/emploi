@extends('layouts.general-layout')

@section('title','Emploi :: Job Seeker Services')

@section('description')
Emploi is the Leading Platform for Talent Assessment and Matching for SME's in Africa.
@endsection

@section('content')
<div class="container">
    <div class="card about">
        <div class="card-body text-center">
            <h1 class="orange">Job Seeker Services</h1>
        </div>
               <ul>
                    <li>We provide you with seamless job placement through superior candidate selection tools that allow employers to hire very fast, aggregated market vacancies through our Jobs board,</li>
                    <li> Free and downloadable resume templates,</li>
                    <li> Curated expert career advice,</li>
                    <li> Professional coaching and CV services.</li>
                </ul>
            <div class="text-center"><br>
                @guest
                <a href="/register" class="btn btn-orange">Upload Your CV</a>                
                @else
                    @if(Auth::user()->role == 'seeker')
                        <a href="/job-seekers/cv-templates" class="btn btn-orange-alt">CV Templates</a>
                    @else
                        <a href="/job-seekers/" class="btn btn-orange-alt">Create Account</a>
                    @endif
                @endguest                
                <a href="/job-seekers/cv-editing" class="btn btn-orange">Professional CV Editing</a>
                <a href="/job-seekers/cv-builder" class="btn btn-orange-alt">CV Builder</a><br><br>
            </div>
    </div>
</div>

<div class="container">
    <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">    
                        <p class="orange">APPLICATION UPDATES</p>
                        <ul class="tick">
                            <li>Get real-time notifications when;</li>
                        </ul>
                            <ul class="text-left">
                                <li>you're shortlisted,</li>
                                <li>your profile is viewed,</li>
                                <li>your CV is Requested.</li>
                             </ul>                   
                           <br><br><br><br>                              
                        <h1>Kshs <br>49</h1>
                        @if( isset(Auth::user()->id) && Auth::user()->role == 'seeker' )
                        <form method="POST" action="/checkout">
                            @csrf
                            <input type="hidden" name="product" value="seeker_basic">
                            <br><p>
                            <input type="submit" name="" value="Request" class="btn btn-orange-alt">
                            </p>
                        </form>
                        @else
                        <h5><a href="/login?redirectToUrl={{ url('/job-seekers/services') }}" class="orange" >Login</a> Or <a href="/register?redirectToUrl={{ url('/job-seekers/services') }}" class="orange">Register</a> To Request</h5>
                        @endif                 
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <p class="orange">FEATURED JOB SEEKER</p>
                        <ul class="tick">            
                             <li>Have your profile rank first in applications and searches.</li>
                             <li>Get real-time analytics of your applications,shortlist and vacancies on the dashboard.</li>
                        </ul>
                        <ul class="tick">
                            <li>Get real-time notifications when;</li>
                        </ul>
                            <ul class="text-left">
                                <li>you're shortlisted,</li>
                                <li>your profile is viewed,</li>
                                <li>your CV is Requested.</li>
                             </ul> 
                    
                         <h1>Kshs <br>159</h1>
                        @if( isset(Auth::user()->id) && Auth::user()->role == 'seeker' )
                        <form method="POST" action="/checkout">
                            @csrf
                            <input type="hidden" name="product" value="featured_seeker">
                            <br><p>
                            <input type="submit" name="" value="Request" class="btn btn-orange-alt">
                            </p>
                        </form>
                        @else
                        <h5><a href="/login?redirectToUrl={{ url('/job-seekers/services') }}" class="orange" >Login</a> Or <a href="/register?redirectToUrl={{ url('/job-seekers/services') }}" class="orange">Register</a> To Request</h5>
                        @endif                    
                    </div>
                </div>
            </div>
        </div>
    </div>   

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card my-2">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-4 col-12 pb-2 pb-md-0">
                            <img src="/images/cv-templates.png" class="w-100" alt="Resume Templates">
                        </div>
                        <div class="col-md-8 col-12">
                            <h5>Resume Templates</h5>
                            <p>
                                If you want to get a good job, you need a good resume. Resume templates are a great place to start when you're reformatting or writing a resume. We provide free templates to job seekers to get started.
                            </p>
                            <a href="/job-seekers/cv-templates" class="orange">View Templates</a>
                            <a href="/job-seekers/cv-builder" class="orange" style="float: right;">CV Builder</a>
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
                            <a href="/job-seekers/premium-placement" class="orange">Learn More</a>
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
                            <img src="/images/coaching.png" class="w-100" alt="Premium Placement">
                        </div>
                        <div class="col-md-8 col-12">
                            <h5>Career Coaching</h5>
                            <p>
                                Our experts will assess your profile and provide reliable guidance on how best to advance your career. We'll give you insights from how to structure your CV to nailing the interview.
                            </p>
                            <a href="/job-seekers/cv-editing" class="orange">Contact Us</a>
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
                            <img src="/images/cv-editing.png" class="w-100" alt="Experts on CV Editing">
                        </div>
                        <div class="col-md-8 col-12">
                            <h5>Professional CV Editing</h5>
                            <p>
                                Recruiters are very busy people. On average, they read your CV in six seconds and thus having a well-designed professional CV is critical for your career growth.
                            </p>
                            <a href="/job-seekers/cv-editing" class="orange">Learn More</a>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>              
</div>

    <div class="row">
        @include('components.featuredJobs')
    </div>
</div>
@include('components.search-form')
@include('components.ads.responsive')

@endsection
