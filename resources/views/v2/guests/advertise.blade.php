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
                            <a class="left-btn" href="/post-a-job">
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
                                <i class='bx bx-user-voice'></i>
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
                            <a href="/post-a-job" class="btn btn-success rounded-pill">
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
                            <a href="/employers/premium-recruitment" class="btn btn-success rounded-pill">
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
                            <a href="/contact" class="btn btn-success rounded-pill">
                                Browse Talent Pool
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Services -->

        <!-- Feedback -->
        <section class="feedback-area py-3">
            <div class="container">
                <div class="section-title">
                    <h2>Testimonials</h2>
                </div>
                <div class="feedback-slider owl-theme owl-carousel">
                    <div class="feedback-item">
                        <h3>Paul</h3>
                        <span>Work Pay</span>
                        <p>“It took seven days from the time we signed up with Emploi looking to hire a key account manager to the time the candidate reported for work. We were very time constrained as we had already spent a lot of time trying to hire through other platforms with no success. From the other platforms I received a lot of irrelevant CVs that honestly I didn’t even know what to do with. I would rate Emploi higher than the other platforms, because I believe the human touch from their team was critical in fast tracking the process for us.”</p>
                        <h4>
                            <i class="flaticon-left-quote"></i>
                            Quite reliable
                        </h4>
                        <div class="img-circle">
                            <img src="{{asset('images/testimonials/paul.jpeg')}}" class="img-fluid rounded img-rounded" alt="Paul - WorkPay">
                        </div>
                    </div>
                    <div class="feedback-item">
                        <h3>Calvin Njoroge</h3>
                        <span>Director – Quality Car Imports</span>
                        <p>“Emploi did the recruitment for us, did the interviews and conducted background checks.
                                  All we had to do was doing a final interview and give them jobs. With regards to results,
                                   the team that we got…WOW! They helped us grow, we have 360 turnaround, we have a team that
                                    is now performing and because of that, I would recommend Emploi anytime to any businesses
                                     like ours that want to grow.”</p>
                        <h4>
                            <i class="flaticon-left-quote"></i>
                            Just, WOW!
                        </h4>
                        <div class="img-circle">
                            <img src="/images/avatar.png" class="img-fluid rounded img-rounded" alt="Calvin Njoroge, Director – Quality Car Imports">
                        </div>
                    </div>
                    <div class="feedback-item">
                        <h3>Elijah Gathogo</h3>
                        <span>Sales and Marketing Director – Mizizi Africa Homes</span>
                        <p>“I contacted Emploi for support in recruiting sales agents and they recommended the best qualified 
                            candidates and their rankings. What we liked [about Emploi] is the speed and affordable cost which
                             is unlike any other service we’ve seen in the market”</p>
                        <h4>
                            <i class="flaticon-left-quote"></i>
                            Fast and Affordable
                        </h4>
                        <div class="img-circle">
                            <img src="{{asset('images/testimonials/elijah.jpeg')}}" class="img-fluid rounded img-rounded" alt="Elijah Gathogo, Sales and Marketing Director – Mizizi Africa Homes">
                        </div>
                    </div>
                    <div class="feedback-item">
                        <h3>Sandra Eshitemi</h3>
                        <span> Employer</span>
                        <p>“Working with Emploi was an enabling experience. They work with a schedule and to rubber stamp it all
                             they are reputable.”</p>
                        <h4>
                            <i class="flaticon-left-quote"></i>
                            Reputable
                        </h4>
                        <div class="img-circle">
                            <img src="{{asset('images/testimonials/sandra.webp')}}" class="img-fluid rounded img-rounded" alt="Sandra Eshitemi – Employer">
                          </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Feedback -->

        <!-- Contact Us -->
        <div class="job-details-area employer-details-area ptb-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="details-item">
                            <div class="review">
                                <h4 class="text-center">Get in touch with us</h4>
                                <form>
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck59">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <i class='bx bx-user'></i>
                                                <input type="text" class="form-control" placeholder="Name*">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <i class='bx bx-mail-send'></i>
                                                <input type="email" class="form-control" placeholder="Email*">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <i class='bx bx-mail-send'></i>
                                                <textarea id="your-message" rows="10" class="form-control" placeholder="Write message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn">Submit Message</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Conact -->

@endsection