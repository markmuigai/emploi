@extends('layouts.general-layout')

@section('title','Welcome to Emploi - Online Placement Platform for Africa')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<style>
    main {
        margin: 0 !important;
        padding: 0 !important;
    }
    .for-mobile {
        display: none;
    }

    @media only screen and (min-width: 997px) {
        .navbar {
            background: transparent;
            transition: background 0.5s;
        }

        .scrolled {
            transition: background 1s;
            background: var(--primary);
        }
    }

    @media only screen and (max-width: 996px) {
        .navbar-brand img {
            height: 40px;
        }
    }
    @media only screen and (max-width: 500px) {
        .for-mobile {
            display: inline
        }
    }
</style>

<!-- LANDING PAGE -->
<div class="landing">
    <div class="container">
        <div class="content">

            <?php $line= "Welcome to Emploi, where deserving talent meets deserving opportunities"; ?>

            @if(isset(Auth::user()->id) && Auth::user()->role == 'seeker')
            @include('components.welcome-banner')
            

            @elseif(isset(Auth::user()->id) && Auth::user()->role == 'employer')
            <h4 class="text-uppercase">Hire with ease</h4>
            <h1>Premium Recruitment</h1>
            <p>{{ $line }}</p>
            <a href="/employers/publish" class="btn btn-orange px-4">Advertise</a>
            <a href="/employers/services" class="btn btn-white px-4">Services</a>


            @elseif(isset(Auth::user()->id) && Auth::user()->role == 'admin')
            <h4 class="text-uppercase">Hello {{ Auth::user()->name }}</h4>
            <h1>Howdy Admin</h1>
            <p>Manage activities happening on Emploi from the administrator's dashboard.</p>
            <a href="/home" class="btn btn-orange px-4">Admin Dashboard</a>
            <a href="/logout" class="btn btn-white px-4">Logout</a>


            @elseif(isset(Auth::user()->id) && Auth::user()->role == 'super-admin')
            <h4 class="text-uppercase">Hello {{ Auth::user()->name }}</h4>
            <h1>Super-Admin Logged in</h1>
            <p>Manage administrators on Emploi, you are in control.</p>
            <a href="/home" class="btn btn-orange px-4">Super-Admin Dashboard</a>
            <a href="/logout" class="btn btn-white px-4">Logout</a>

            @else
                @include('components.welcome-banner')
                
            @endif
        </div>
    </div>
</div>
<!-- END OF LANDING PAGE -->

<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            @include('components.ads.responsive')
        </div>        
    </div>
</div>

<!-- SEARCH BAR -->
@include('components.search-form')
<!-- END OF SEARCH BAR -->

<!-- ABOUT SECTION -->
<div class="about">
    <div class="container">
        <div class="card pb-5">
            <div class="card-body text-center">
                <h2 class="orange">Who Are We?</h2>
                <p>Emploi is a job matching platform that does it right and does it fast. Job matching platform that combines candidate pre-assessment with recruitment process management tools to facilitate fast and accurate vacancy - job seeker
                    matching.
                </p>
                <a href="/about" class="btn btn-orange">More About Us</a>
                <a href="/employers/publish" class="btn btn-orange-alt px-4">Advertise Here</a>
            </div>
        </div>
    </div>
</div>
<!-- END OF ABOUT SESSION -->
<!-- STATISTICS -->
<div class="statistics">
    <div class="container">
        <div class="card mx-5">
            <div class="card-body text-center py-3 py-lg-4">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-12">
                        <i class="fas fa-briefcase"></i>
                        <h5>Total Jobs</h5>
                        <h1 class="counter">{{ count(\App\Post::all()) }}</h1>
                        <p>Find your next job effortlessly.</p>
                        <hr class="d-block d-md-none">
                    </div>
                    <div class="col-md-4 col-sm-4 col-12">
                        <i class="fas fa-clipboard-check"></i>
                        <h5>Total Candidates</h5>
                        <h1 class="counter">{{ count(\App\Seeker::all()) * 2 }}</h1>
                        <p>Get hired with minimal effort.</p>
                        <hr class="d-block d-md-none">
                    </div>
                    <div class="col-md-4 col-sm-4 col-12">
                        <i class="fas fa-building"></i>
                        <h5>Total Companies</h5>
                        <h1 class="counter">{{ count(\App\Company::all()) * 3 }}</h1>
                        <p>{{ count(\App\Company::getHiringCompanies2(0)) * 3 }} companies are hiring.</p>
                        <hr class="d-block d-md-none">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END OF STATISTICS -->
<!-- SERVICES -->
<div class="services my-3">
    <div class="container">
        <div class="card">
            <div class="card-body text-center">
                <h2 class="orange" id="our-services-section">Our Services</h2>
                <p>We provide you with seamless job placement through superior candidate selection tools that allow the employer to hire very fast, aggregated market vaccancies through job boards.</p>
                <div class="row pt-2 service-cards">
                    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist" style="width: 100%">
                        <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">For Job Seekers</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">For Employers</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <br>
                            <div class="card-deck">
                                <div class="card">
                                    <img class="card-img-top" src="/images/logo.png" alt="Professional CV Editing">
                                    <div class="card-body">
                                        <h5 class="card-title">CV Editing</h5>
                                        <p class="card-text">A recruiter may spend as little as 20 seconds looking at each CV. You need to maximize on your 20 seconds to deliver maximum impression to the recruiter.</p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="/job-seekers/cv-editing" class="btn btn-orange-alt">Request Service</a>
                                    </div>
                                </div>
                                <div class="card">
                                    <img class="card-img-top" src="/images/logo.png" alt="Job Seeker Premium Placement">
                                    <div class="card-body">
                                        <h5 class="card-title">Premium Placement</h5>
                                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="/job-seekers/premium-placement" class="btn btn-orange">Learn More</a>
                                    </div>
                                </div>
                                <div class="card">
                                    <img class="card-img-top" src="/images/logo.png" alt="Latest Vacancies">
                                    <div class="card-body">
                                        <h5 class="card-title">Job Vacancies</h5>
                                        <p class="card-text">
                                        We aggregate top vacancies from companies and job boards, ensuring your career progresses upwards steadily </p>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted">
                                            <a href="/vacancies" class="btn btn-orange-alt">View Vacancies</a>
                                        </small>
                                    </div>
                                </div>

                            </div>
                            <br>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <br>
                            <div class="card-deck">
                                <div class="card">
                                    <img class="card-img-top" src="/images/logo.png" alt="Professional CV Editing">
                                    <div class="card-body">
                                        <h5 class="card-title">Talent Database</h5>
                                        <p class="card-text">Search tens of thousands of qulaified CVs for quick shortlisting, direct contact and hire</p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="/employers/browse" class="btn btn-orange-alt">Browse</a>
                                    </div>
                                </div>
                                <div class="card">
                                    <img class="card-img-top" src="/images/logo.png" alt="Advertise on Emploi">
                                    <div class="card-body">
                                        <h5 class="card-title">Advertise Jobs</h5>
                                        <p class="card-text">Reach an Audience of 100k+ subscribers, Utilize Advanced Recruitment tools and Candidate Ranking Algorithm.</p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="/employers/publish" class="btn btn-orange">Advertise Here</a>
                                    </div>
                                </div>
                                <div class="card">
                                    <img class="card-img-top" src="/images/logo.png" alt="Latest Vacancies">
                                    <div class="card-body">
                                        <h5 class="card-title">Recruitment Process Outsourcing</h5>
                                        <p class="card-text">
                                        Use our Talent database and powerful Search-Sort-Assess-Score engine to cut down your recruitment workload by Up to 70% and your costs By Up to 65%. </p>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted">
                                            <a href="/employers/services" class="btn btn-orange-alt">View Services</a>
                                        </small>
                                    </div>
                                </div>

                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                $(document).ready(function(){
                    $(".nav-tabs a").click(function(){
                        $(this).tab('show');
                    });
                    $('.nav-tabs a').on('shown.bs.tab', function(event){
                        var x = $(event.target).text();         // active tab
                        var y = $(event.relatedTarget).text();  // previous tab
                        $(".act span").text(x);
                        $(".prev span").text(y);
                    });
                });
                </script>
            </div>
        </div>
    </div>
</div>
<!-- END OF SERVICES -->

<!-- FEATURED JOBS -->
<div class="container mt-5 text-center">
    <h2 class="orange">Featured Jobs</h2>
    @if(is_null($posts))
    <div class="text-center">
        <p>No jobs posted yet. Please check back later.</p>
    </div>
    @else
    <div class="featured-carousel">
        @forelse($posts as $p)
        <a class="card mx-4 m-md-2 m-lg-4" href="/vacancies/{{ $p->slug }}">
            <div class="card-body">
                <div class="d-flex justify-content-center mb-3">
                    <img src="{{ asset('images/500g.png') }}" data-src="{{ asset($p->imageUrl) }}" class="lazy"  alt="{{ $p->title }}" />
                </div>
                <p class="badge badge-secondary">{{$p->positions}} Postions</p>
                <h5>{{ $p->getTitle(true) }}</h5>
                <p><i class="fas fa-map-marker-alt orange"></i> {{ $p->location->name }}</p>
                <p>
                    @if(isset(Auth::user()->id))
                    {{ $p->monthlySalary() }} {{ $p->monthly_salary == 0 ? '' : 'p.m.' }}
                    @else
                    @endif
                </p>
                <p>
                    
                        <i class="fab fa-facebook-f" style="margin: 0.25em"></i>

                        <i class="fab fa-twitter" style="margin: 0.25em"></i>

                        <i class="fab fa-linkedin" style="margin: 0.25em"></i>

                        <i class="fab fa-whatsapp" style="margin: 0.25em"></i>

                </p>
            </div>
        </a>
        @empty
        @endforelse
    </div>
    <a href="/vacancies" class="btn btn-orange mt-3 mb-5">View All Jobs</a>
    <a href="/vacancies/featured" class="btn btn-orange-alt mt-3 mb-5">Featured Vacancies</a>
    @endif
</div>
<!-- END OF FEATURED JOBS -->

<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            @include('components.ads.responsive')
        </div>        
    </div>
</div>

<!-- TESTIMONALS -->
<div class="container">
    <div class="testimonials">
        <div class="card mx-4 mx-md-5 mx-lg-2 my-3">
            <div class="card-body">
                <h2 class="text-center orange">Testimonials</h2>
                <div class="row align-items-center justify-content-center">
                    <div class="col-7 col-sm-5 col-md-2">
                        <img src="/images/avatar.png" data-src="{{asset('images/avatar.png')}}" alt="Anthony Ochieng" class="w-100 lazy">
                    </div>
                    <div class="col-12 col-md-10">
                        <p>Emploi is the most efficient digital sourcing platform. They are fast and are good at what they do.</p>
                        <hr class="short">
                        <h5>Anthony Ochieng</h5>
                        <p>Employer</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mx-4 mx-md-5 mx-lg-2 my-3">
            <div class="card-body">
                <h2 class="text-center orange">Testimonials</h2>
                <div class="row align-items-center justify-content-center">
                    <div class="col-7 col-sm-5 col-md-2">
                        <img src="/images/avatar.png" data-src="{{asset('images/testimonials/kizito.webp')}}" alt="Kipkemoi Kizito" class="w-100 lazy">
                    </div>
                    <div class="col-12 col-md-10">
                        <p>Emploi helped me define exactly what it is I was looking for and they even went further And gave me an opportunity of getting there.</p>
                        <hr class="short">
                        <h5>Kipkemoi Kizito</h5>
                        <p>Job Seeker</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mx-4 mx-md-5 mx-lg-2 my-3">
            <div class="card-body">
                <h2 class="text-center orange">Testimonials</h2>
                <div class="row align-items-center justify-content-center">
                    <div class="col-7 col-sm-5 col-md-2">
                        <img src="/images/avatar.png" data-src="{{asset('images/testimonials/fay.webp')}}" alt="Faith Chepkemoi" class="w-100 lazy">
                    </div>
                    <div class="col-12 col-md-10">
                        <p>The Emploi Team creates a great rapport with their candidates and is an invaluable asset to anyone looking for a job.</p>
                        <hr class="short">
                        <h5>Faith Chepkemoi</h5>
                        <p>Job Seeker</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mx-4 mx-md-5 mx-lg-2 my-3">
            <div class="card-body">
                <h2 class="text-center orange">Testimonials</h2>
                <div class="row align-items-center justify-content-center">
                    <div class="col-7 col-sm-5 col-md-2">
                        <img src="/images/avatar.png" data-src="{{asset('images/testimonials/sandra.webp')}}" alt="Sandra Eshitemi" class="w-100 lazy">
                    </div>
                    <div class="col-12 col-md-10">
                        <p>Working with Emploi was an enabling experience. They work with a schedule and to rubber stamp it all they are reputable.</p>
                        <hr class="short">
                        <h5>Sandra Eshitemi</h5>
                        <p>Employer</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END OF TESTIMONIALS -->

<!-- BLOGS -->
<div class="blogs mt-3 py-5">
    <div class="container">
        <h2 class="text-center">Blogs And News</h2>
        <div class="row">
            <div class="col-lg-5">
                <div class="card mb-lg-3 my-2">
                    @include('components.ads.inarticle')
                </div>
                @forelse($blogs->slice(0,1) as $blog)
                <div class="card">
                    <div class="card-body">
                        <div class="latest-blog-image lazy mb-2" data-bg="url({{ asset($blog->imageUrl) }})"></div>
                        <h5><a href="{{ url('blog/'.$blog->slug) }}">{{ $blog->title }}</a></h5>
                        <div class="d-flex">
                            <p><i class="fas fa-user"></i> {{ $blog->user->name }} | <i class="fas fa-calendar-check"></i> {{ $blog->postedOn }}</p>
                        </div>
                        <p class="badge badge-secondary">{{ $blog->category->name }}</p>
                        <p class="">{!!html_entity_decode($blog->longPreview(250))!!}</p>
                        <a href="{{ url('blog/'.$blog->slug) }}" class="orange">Read More</a>
                        <button class="btn btn-orange-alt" data-toggle="modal" data-target="#socialModal{{ $blog->id }}" style="float: right"><i class="fas fa-share-alt"></i> Share</button>
                        @include('components.share-modal')
                    </div>
                </div>
                @empty
                @endforelse
            </div>
            <div class="col-lg-7">
                @forelse ($blogs->slice(1, 3) as $blog)
                <div class="card mb-lg-3 my-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <img src="{{ asset('images/500g.png') }}" data-src="{{ asset($blog->imageUrl) }}" alt="{{ $blog->title }}" class="w-100 lazy">
                            </div>
                            <div class="col-8">
                                <h5><a href="{{ url('blog/'.$blog->slug) }}">{{ $blog->title }}</a></h5>
                                <div class="d-flex">
                                    <p><i class="fas fa-user"></i> {{ $blog->user->name }} | <i class="fas fa-calendar-check"></i> {{ $blog->postedOn }}</p>
                                </div>
                                <p class="badge badge-secondary">{{ $blog->category->name }}</p>
                            </div>
                        </div>
                        <p class="">{!!html_entity_decode($blog->longPreview(250))!!}</p>
                        <a href="{{ url('blog/'.$blog->slug) }}" class="orange">Read More</a>
                        <button class="btn btn-orange-alt" data-toggle="modal" data-target="#socialModal{{ $blog->id }}" style="float: right"><i class="fas fa-share-alt"></i> Share</button>
                        @include('components.share-modal')
                    </div>
                </div>
                @empty
                @endforelse
            </div>
        </div>
        <div class="text-center">
            <a href="/blog" class="btn btn-orange">View All Blogs</a>
        </div>
    </div>
</div>
<!-- END OF BLOGS -->

<!-- FEATURED EMPLOYERS -->
<div class="container py-5 text-center">
    <h2>Featured Employers</h2>
    <div class="employers-carousel py-4">
        <?php
        $featuredEmployers = ['abcl','apa','bingwa','biolight','bridgecap','brilliant','crystal','ecopharm','ess','esto-africa','global-internet','jambo_logistics','knbs','kpl','limelight','mboga','neema','novacent','papaya','pelings','pergamon','platinum_credit','rvibs','saif','sanlam','sirmit','texas','timecon','uniliver','wilco','zydii'];
        ?>

        @forelse($featuredEmployers as $f)
        <div class="d-flex justify-content-center my-2">
            <img alt="{{ $f }}" class="lazy" src="images/company-logo.png" data-src="images/logos/{{ $f }}.webp">
        </div>
        @empty
        @endforelse
    </div>
    <a href="/companies" class="btn btn-orange">See Who Is Hiring</a>
</div>
<!-- END OF FEATURED EMPLOYERS -->

<!-- GET STARTED -->
<div class="get-started">
    <div class="container">
        <div class="content">
            @guest
                <h1>Find the Right Job for you.</h1>
                <p>Looking for a job? Looking to hire? The first thing you need to do is create a profile.</p>
                <h4>More than <span>{{ round(count(\App\Seeker::all())*0.1) }}</span> professional got their path to success.</h4>
                <a href="/employers/services" class="btn btn-white px-4">Employer Services</a>
                <a href="/job-seekers/services" class="btn btn-orange px-4">Job Seeker Services</a>
            @else
                @if(Auth::user()->role == 'seeker')
                    <h1>Find the Right Job for you.</h1>
                    <p>Looking for a job? Maybe your CV doesn't stand out! Let us catapult your career and land you a job with our professional CV Editing.</p>
                    <h4>More than <span>{{ round(count(\App\Seeker::all())*0.1) }}</span> professional got their path to success.</h4>
                    <a href="/vacancies/{{ Auth::user()->seeker->industry_id ? Auth::user()->seeker->industry->slug : 'featured' }}" class="btn btn-orange">Explore Vacancies</a>
                    <a href="/job-seekers/cv-editing" class="btn btn-white px-4">Request CV Editing</a>
                @endif
                @if(Auth::user()->role == 'employer')
                    <h1>Let us recruit for you</h1>
                    <p>Looking to hire? We offer premium recruitment solutions that'll make sure you have the right candindate</p>
                    <h4>We conduct pre-assessment, background checks, proficiency tests, have a <span>ready pool of more than 40,000 job seekers</span> to start from.</h4>
                    <a href="/employers/publish" class="btn btn-orange">Advertise</a>
                    <a href="/home" class="btn btn-white px-4">My Dashboard</a>
                @endif
                @if(Auth::user()->role == 'admin')
                    <h1>Admin Logged In</h1>
                    <a href="/home" class="btn btn-orange">Dashboard</a>
                    <a href="/logout" class="btn btn-white px-4">Logout</a>
                @endif
                @if(Auth::user()->role == 'super-admin')
                    <h1>Super Admin Logged in</h1>
                    <a href="/home" class="btn btn-orange">Dashboard</a>
                    <a href="/logout" class="btn btn-white px-4">Logout</a>
                @endif
            @endguest
        </div>
    </div>
</div>
@include('components.top-search')
<!-- END OF GET STARTED -->
<script type="text/javascript">
    $(document).ready(function() {
        $('.featured-carousel').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 2,
            arrows: true,
            prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
            responsive: [{
                    breakpoint: 996,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 2,
                    }
                },
                {
                    breakpoint: 737,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                },
            ]
        });
        $('.testimonials').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
            autoplay: true,
            speed: 2000,
        });
        $('.employers-carousel').slick({
            infinite: true,
            rows: 2,
            slidesToShow: 4,
            slidesToScroll: 2,
            arrows: true,
            prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
            autoplay: true,
            speed: 500,
            responsive: [{
                    breakpoint: 996,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 736,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 425,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                },
            ]
        });

        // $(function() {
        //     $('.counter').countUp();
        // });
    });
</script>

@endsection
