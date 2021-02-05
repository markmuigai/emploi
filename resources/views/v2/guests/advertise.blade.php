@extends('v2.layouts.app')

@section('title','Advertise on Emploi :: Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
    <!-- Navbar -->
    @include('v2.components.employer.navbar')    
    <!-- End Navbar -->

        <!-- Explore -->
        <section class="explore-area two ptb-100 mt-5">
            <div class="container pb-5">
                <div class="explore-item">
                    <div class="section-title">
                        <h2 class="mt-2">
                            Recruit faster, <span class="text-orange">Hire better</span> 
                        </h2>
                    </div>
                    <h4 class="mb-5">
                        We provide AI-powered recruiting tools for candidate sourcing, candidate screening and predictive analysis for employee retention
                    </h4>
                    <ul>
                        <li>
                            <a class="left-btn" href="#">
                                Post a job
                                <i class="bx bx-plus"></i>
                            </a>
                        </li>
                        <li>
                            <span>CEO Message</span>
                            <a class="right-btn popup-youtube" href="https://www.youtube.com/watch?v=07d2dXHYb94&t=88s">
                                <i class='bx bx-play'></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="explore-img ptb-100">
                    <img src="{{asset("assets-v2/img/explore-main.png")}}" alt="Explore">
                </div>
            </div>
        </section>
        <!-- End Explore -->

        <!-- System -->
        <section class="system-area ptb-100">
            <div class="container">
                <div class="system-item">
                    <div class="section-title three">
                        <h2>What sets us apart from competition</h2>
                    </div>
                    <ul class="system-list">
                        <li>
                            <span></span>
                            Write better job posts using our platform that suggests the right words and phrases, highlight paragraphs that are too boring, too generic, or do not suit your ideal employee profile.
                        </li>
                        <li>
                            <span></span>
                            Our AI-powered recruiting assistants capture your leads, asks them questions in a messenger of their choice, answers their questions about the position and the company, and even schedule interviews.
                        </li>
                        <li>
                            <span></span>
                            Assess a candidate’s level of skills, aptitude, team-compatibility and IQ using our gamified assessments can be compiled into reports automatically
                        </li>
                        <li>
                            <span></span>
                            Predictive analysis for employee retention by collecting vast amounts of data of employees who have quit in the past and processing it throughby an AI-powered system to determine patterns.
                        </li>
                    </ul>
                    <ul class="system-video">
                        <li>
                            <a class="left-btn" href="index-3.html#">
                                Recruit Now
                                <i class='bx bx-plus'></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End System -->

        <!-- services -->
        <div class="container-fluid seeker-services my-5 px-5">
            <div class="section-title text-center">
                <h2>Employer Services</h2>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow rounded mb-2">
                        <div class="card-body text-center">
                            <i class="flaticon-verify"></i>
                            <h4>Advertising</h4>
                            <p>We're established in Africa, with partners and subscribed job seekers guaranteeing you an audience of 100k+ job seekers.</p>
                            <a href="/post-a-job" class="btn btn-primary rounded-pill">
                                Advertise
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow rounded mb-2">
                        <div class="card-body text-center">
                            <i class="flaticon-file"></i>
                            <h3>Premium Recruitment</h3>
                            <p class="description">
                                Let us undertake the hiring process for you - we advertise your job, screen candidates, conduct background checks, and a 90 day free replacement should candidate leave.
                            </p>
                            <a href="/employers/premium-recruitment" class="btn btn-primary rounded-pill">
                                Recruit
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow rounded mb-2">
                        <div class="card-body text-center">
                            <i class="flaticon-comment"></i>
                            <h3>Talent Database</h3>
                            <p>Search experienced candidates in our talent pool by Industry, Location, Skills amongs't others. Download their CV's, contact them directly, and offer positions.</p>
                            <a href="/contact" class="btn btn-primary rounded-pill">
                                Browse Talent Pool
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Services -->

        <!-- Why Us -->
        <section class="explore-area py-5">
            <div class="container">
                <div class="explore-item cv-editing">
                    <div class="section-title">
                        <h2>Why Work With Us?</h2>
                        <p>
                          
                        </p>
                    </div>
                    <ul class="row justify-content">
                            <div class="col-md-8 pl-0">
                                <li>
                                    <i class='bx bxs-check-circle'></i>
                                    Convenience (<i>Sourcing, management and growth tools at one stop.</i>)
                                </li>
                                <li>
                                    <i class='bx bxs-check-circle'></i>
                                    Top quality performance (<i>Thorough professional vetting</i>)
                                </li>
                                <li>
                                    <i class='bx bxs-check-circle'></i>
                                    Assurance (<i>Performance tracking</i>)
                                </li>
                                <li>
                                    <i class='bx bxs-check-circle'></i>
                                    Speed (<i>48 hour turn around time</i>)
                                </li>
                                <li>
                                    <i class='bx bxs-check-circle'></i>
                                    Enjoy E-Club (<i>Membership and its benefits</i>)
                                </li>
                                <li>
                                    <i class='bx bxs-check-circle'></i>
                                    Affordable (<i>Staggered and shared payment methods</i>)
                                </li>
                            </div>
                    </ul>
                </div>
            </div>
        </section>
        <!--     End Why Us -->
@endsection