@extends('layouts.general-layout')

@section('title','Emploi :: Job Seeker Services')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
<div class="container pb-5">
    <span id="seeker_basic"></span><span id="featured_seeker"></span>
    <div class="row">
        <?php
        $products = \App\Product::whereIn('slug',['featured_seeker','seeker_basic'])->get();
        ?>
        @forelse($products as $product)
            <div class="col-lg-6">
                <div class="card my-2">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-4 col-12 pb-2 pb-md-0">
                                <img src="/images/{{ $product->slug == 'featured_seeker' ? 'featured-seeker' : '500g' }}.png" class="w-100 d-xs-none" alt="Job Seeker Basic Package" style="border-radius: 5%">
                            </div>
                            <div class="col-md-8 col-12">
                                <h5>{{ $product->title }}</h5>
                                <p>
                                    Have your profile rank first in applications and searches. Includes Application updates. Get detailed reasons why the application was rejected, or not shortlisted.
                                </p>
                                <form method="POST" action="/checkout">
                                    @csrf
                                    <input type="hidden" name="product" value="featured_seeker">
                                    <input type="submit" class="btn btn-link" value="Request">
                                    <span style="float: right;">{{ $product->getPrice() }}</span>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
        @endforelse

        
    </div>
    
    <div class="card about">
        <div class="card-body text-center">
            <h1 class="orange">Job Seeker Services</h1>
            <p class="text-center">
                We provide you with seamless job placement through superior candidate selection tools that allow employers to hire very fast, Aggregated market vacancies through our Jobs board, Free and downloadable resume templates, Curated
                expert career advice, Professional coaching and CV services.
                <br>
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
                <a href="/job-seekers/cv-builder" class="btn btn-orange-alt">CV Builder</a>
            </p>
        </div>
    </div>

    @include('components.ads.responsive')

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
                            <h5>Premium Placement</h5>
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
                            <img src="/images/vacancies.png" class="w-100" alt="Vacancies from Across Africa">
                        </div>
                        <div class="col-md-8 col-12">
                            <h5>Latest Vacancies</h5>
                            <p>
                                We post job openings from employers and partners in Africa for you to easily apply and advance your career. <a href="/job-seekers/get-featured" class="orange">Get Featured</a> to stand out, get updates and much more.
                            </p>
                            <a href="/vacancies/features" class="orange">View Vacancies</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
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
                            <a href="/checkout?product=seeker_basic" class="orange" style="float: right;">Application Updates</a>
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
