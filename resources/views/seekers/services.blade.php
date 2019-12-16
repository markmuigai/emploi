@extends('layouts.general-layout')

@section('title','Emploi :: Job Seeker Services')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
<div class="container pb-5">
    <div class="card about">
        <div class="card-body text-center">
            <h1 class="orange">Job Seeker Services</h1>
            <p class="text-center">
                We provide you with seamless job placement through superior candidate selection tools that allow employers to hire very fast, Aggregated market vacancies through our Jobs board, Free and downloadable resume templates, Curated
                expert career advice, Professional coaching and CV services.
            </p>
            <div class="row pt-5">
                <div class="col-md-6">
                    <h4>
                        Job Vacancies
                    </h4>
                    <p>
                        We post job openings from employers and partners in Kenya and Across East Africa for your career growth
                    </p>
                </div>
                <div class="col-md-6">
                    <h4>Upload CV</h4>

                    <p>
                        Employers on our platform browse for CVs and this is a golden opportunity for you to be seen and shortlisted
                    </p>
                </div>
                <div class="col-md-6">
                    <h4>Professional CV Editing</h4>
                    <p>
                        Our experts re-write your CV making sure it stands out in applications to improve your shortlisting and employment chances.
                    </p>
                </div>
                <div class="col-md-6">
                    <h4>Career Coaching</h4>
                    <p>
                        Our experts will assess your profile and provide reliable guidance on how to advance your career.
                    </p>
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
                            <img src="/images/templates.jpg" class="w-100" alt="Resume Templates">
                        </div>
                        <div class="col-md-8 col-12">
                            <h5>Resume Templates</h5>
                            <p>
                                If you want to get a good job, you need a good resume. Resume templates are a great place to start when you're reformatting or writing a resume. We provide free templates to job seekers to get started.
                            </p>
                            <a href="/job-seekers/cv-templates" class="orange">Learn More</a>
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
                            <img src="/images/cv-editing.jpg" class="w-100" alt="Professional CV Editing">
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
        <div class="col-lg-6">
            <div class="card my-2">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-4 col-12 pb-2 pb-md-0">
                            <img src="/images/premium.jpg" class="w-100" alt="Premium Placement">
                        </div>
                        <div class="col-md-8 col-12">
                            <h5>Premium Placement</h5>
                            <p>
                                Get seen by employers as we rank you on top of the employer search list. Get our professional CV Editing services for frequent shortlisting. We offer exclusive placement services matching your career and Interview
                                coaching
                                to land your dream job.
                            </p>
                            <a href="/job-seekers/premium-placement" class="orange">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('components.search-form')

@endsection
