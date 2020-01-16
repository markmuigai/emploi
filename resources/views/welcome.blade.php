@extends('layouts.general-layout')

@section('title','Welcome to Emploi - Online Placement Platform for East Africa')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<style>
    main {
        margin: 0 !important;
        padding: 0 !important;
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
</style>

<!-- LANDING PAGE -->
<div class="landing">
    <div class="container">
        <div class="content">

            @if(isset(Auth::user()->id) && Auth::user()->role == 'seeker')
            <h4 class="text-uppercase">Step into your Future</h4>
            <h1>Blast Off Your Career</h1>
            <p>Welcome to Emploi, an online placement platform that does it right and does it fast</p>
            <a href="/vacancies" class="btn btn-orange px-4">Vacancies</a>
            <a href="/job-seekers/services" class="btn btn-white px-4">Services</a>

            @elseif(isset(Auth::user()->id) && Auth::user()->role == 'employer')
            <h4 class="text-uppercase">Hire with ease</h4>
            <h1>Premium Recruitment</h1>
            <p>Welcome to Emploi, an online placement platform. Hire with our <a href="/employers/role-suitability-index">Role Suitability Index</a> to rank applications</p>
            <a href="/employers/publish" class="btn btn-orange px-4">Advertise</a>
            <a href="/employers/services" class="btn btn-white px-4">Services</a>


            @elseif(isset(Auth::user()->id) && Auth::user()->role == 'admin')
            <h4 class="text-uppercase">Hello {{ Auth::user()->name }}</h4>
            <h1>Admin Logged in</h1>
            <p>Manage activities happening on Emploi from the administrator's dashboard for y</p>
            <a href="/home" class="btn btn-orange px-4">Admin Dashboard</a>
            <a href="/logout" class="btn btn-white px-4">Logout</a>


            @elseif(isset(Auth::user()->id) && Auth::user()->role == 'super-admin')
            <h4 class="text-uppercase">Hello {{ Auth::user()->name }}</h4>
            <h1>Super-Admin Logged in</h1>
            <p>Manage administrators on Emploi, you are in control.</p>
            <a href="/home" class="btn btn-orange px-4">Super-Admin Dashboard</a>
            <a href="/logout" class="btn btn-white px-4">Logout</a>

            @else
            <h4 class="text-uppercase">Step into your Future</h4>
            <h1>Blast Off Your Career</h1>
            <p>Welcome to Emploi, an online placement platform that does it right and does it fast</p>
            <a href="/join" class="btn btn-orange px-4">Join Now</a>
            <a href="/vacancies" class="btn btn-white px-4">Vacancies</a>
            @endif
        </div>
    </div>
</div>
<!-- END OF LANDING PAGE -->

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
                        <p>{{ count(\App\Company::getHiringCompanies2()) }} companies are hiring.</p>
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
                <h2 class="orange">Our Services</h2>
                <p>We provide you with seamless job placement through superior candidate selection tools that allow the employer to hire very fast, aggregated market vaccancies through job boards.</p>
                <div class="row pt-2 service-cards">
                    <div class="col-md-6 col-sm-6">
                        <h5>Employer Services</h5>
                        <a href="/employers/browse" class="card m-2 py-2">
                            <div class="card-body">
                                <i class="fas fa-briefcase"></i>
                                <p>Browse Talent Database</p>
                            </div>
                        </a>
                        <a href="/employers/services" class="card m-2 py-2">
                            <div class="card-body">
                                <i class="fas fa-briefcase"></i>
                                <p>Recruitment Process Outsourcing</p>
                            </div>
                        </a>
                        <a href="/employers/services" class="card m-2 py-2">
                            <div class="card-body">
                                <i class="fas fa-briefcase"></i>
                                <p>Assess Candidate</p>
                            </div>
                        </a>
                        <a href="/employers/publish" class="card m-2 py-2">
                            <div class="card-body">
                                <i class="fas fa-briefcase"></i>
                                <p>Advertise Jobs</p>
                            </div>
                        </a>
                        <a href="/employers/background-checks" class="card m-2 py-2">
                            <div class="card-body">
                                <i class="fas fa-briefcase"></i>
                                <p>Background Checks</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <h5>Job Seeker Services</h5>
                        <a href="/job-seekers/premium-placement" class="card m-2 py-2">
                            <div class="card-body">
                                <i class="fas fa-user"></i>
                                <p>Premium Placement</p>
                            </div>
                        </a>
                        <a href="/job-seekers/services" class="card m-2 py-2">
                            <div class="card-body">
                                <i class="fas fa-user"></i>
                                <p>Professional Coaching</p>
                            </div>
                        </a>
                        <a href="/vacancies" class="card m-2 py-2">
                            <div class="card-body">
                                <i class="fas fa-user"></i>
                                <p>Job Vacancies</p>
                            </div>
                        </a>
                        <a href="/job-seekers/cv-editing" class="card m-2 py-2">
                            <div class="card-body">
                                <i class="fas fa-user"></i>
                                <p>Professional CV Editing</p>
                            </div>
                        </a>
                        <a href="/blog" class="card m-2 py-2">
                            <div class="card-body">
                                <i class="fas fa-user"></i>
                                <p>Career Centre</p>
                            </div>
                        </a>
                    </div>
                </div>
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
    @endif
</div>
<!-- END OF FEATURED JOBS -->

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
                        <p>Emploi helped me define exactly what it is I was looking for and they even went further And gave me as opportunity of getting there.</p>
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
                        <p>The Emploi Team create a great rapport with their candidates and are an invaluable asset to anyone looking for a job.</p>
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
                @forelse($blogs->slice(0,1) as $blog)
                <div class="card">
                    <div class="card-body">
                        <div class="latest-blog-image lazy mb-2" data-bg="url({{ asset($blog->imageUrl) }})"></div>
                        <h5><a href="{{ url('blog/'.$blog->slug) }}">{{ $blog->title }}</a></h5>
                        <div class="d-flex">
                            <p><i class="fas fa-user"></i> {{ $blog->user->name }} | <i class="fas fa-calendar-check"></i> {{ $blog->postedOn }}</p>
                        </div>
                        <p class="badge badge-secondary">{{ $blog->category->name }}</p>
                        <p class="truncate-long">{!!html_entity_decode($blog->longPreview(500))!!}</p>
                        <a href="{{ url('blog/'.$blog->slug) }}" class="orange">Read More</a>
                        <span style="float: right; text-align: right;">
                            <a href="{{ $blog->shareFacebookLink }}" target="_blank" rel="noreferrer" style="margin-right: 1em"><i class="fab fa-facebook-f"></i></a>
                            <a href="{{ $blog->shareTwitterLink }}" target="_blank" rel="noreferrer" style="margin-right: 1em"><i class="fab fa-twitter"></i></a>
                            <a href="{{ $blog->shareLinkedinLink }}" target="_blank" rel="noreferrer" style="margin-right: 1em"><i class="fab fa-linkedin"></i></a>
                            <a href="{{ $blog->shareWhatsappLink }}" data-action="share/whatsapp/share" target="_blank" rel="noreferrer" style="margin-right: 1em"><i class="fab fa-whatsapp"></i></a>
                        </span>
                    </div>
                </div>
                @empty
                @endforelse

                @forelse ($blogs->slice(4, 4) as $blog)
                <div class="card mb-lg-3 my-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <img data-src="{{ asset($blog->imageUrl) }}" src="{{ asset('images/500g.png') }}" alt="{{ $blog->title }}" class="w-100 lazy">
                            </div>
                            <div class="col-8">
                                <h5><a href="{{ url('blog/'.$blog->slug) }}">{{ $blog->title }}</a></h5>
                                <div class="d-flex">
                                    <p><i class="fas fa-user"></i> {{ $blog->user->name }} | <i class="fas fa-calendar-check"></i> {{ $blog->postedOn }}</p>
                                </div>
                                <p class="badge badge-secondary">{{ $blog->category->name }}</p>
                            </div>
                        </div>
                        <p class="truncate">{!!html_entity_decode($blog->preview)!!}</p>
                        <a href="{{ url('blog/'.$blog->slug) }}" class="orange">Read More</a>
                        <a href="{{ $blog->shareFacebookLink }}" target="_blank" rel="noreferrer" style="margin-right: 1em"><i class="fab fa-facebook-f"></i></a>
                            <a href="{{ $blog->shareTwitterLink }}" target="_blank" rel="noreferrer" style="margin-right: 1em"><i class="fab fa-twitter"></i></a>
                            <a href="{{ $blog->shareLinkedinLink }}" target="_blank" rel="noreferrer" style="margin-right: 1em"><i class="fab fa-linkedin"></i></a>
                            <a href="{{ $blog->shareWhatsappLink }}" data-action="share/whatsapp/share" target="_blank" rel="noreferrer" style="margin-right: 1em"><i class="fab fa-whatsapp"></i></a>
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
                        <p class="truncate">{!!html_entity_decode($blog->preview)!!}</p>
                        <a href="{{ url('blog/'.$blog->slug) }}" class="orange">Read More</a>
                        <a href="{{ $blog->shareFacebookLink }}" target="_blank" rel="noreferrer" style="margin-right: 1em"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{ $blog->shareTwitterLink }}" target="_blank" rel="noreferrer" style="margin-right: 1em"><i class="fab fa-twitter"></i></a>
                        <a href="{{ $blog->shareLinkedinLink }}" target="_blank" rel="noreferrer" style="margin-right: 1em"><i class="fab fa-linkedin"></i></a>
                        <a href="{{ $blog->shareWhatsappLink }}" data-action="share/whatsapp/share" target="_blank" rel="noreferrer" style="margin-right: 1em"><i class="fab fa-whatsapp"></i></a>
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
            <h4>More than <span>2165</span> professional got their path to success.</h4>
            <a href="/register" class="btn btn-orange">Get Started</a>
            <a href="/contact" class="btn btn-white px-4">Contact Us</a>
            @else
            @if(Auth::user()->role == 'seeker')
            <h1>Find the Right Job for you.</h1>
            <p>Looking for a job? Looking to hire? The first thing you need to do is create a profile.</p>
            <h4>More than <span>2165</span> professional got their path to success.</h4>
            <a href="/register" class="btn btn-orange">Get Started</a>
            <a href="/contact" class="btn btn-white px-4">Contact Us</a>
            @endif
            @if(Auth::user()->role == 'employer')
            <h1>Let us recruit for you</h1>
            <p>Looking to hire? We offer premium recruitment solutions that'll make sure you have the right candindate</p>
            <h4>We conduct pre-assessment, background checks, proficiency tests, have a <span>ready pool of more than 20,000 job seekers</span> to start from.</h4>
            <a href="/employers/publish" class="btn btn-orange">Advertise</a>
            <a href="/contact" class="btn btn-white px-4">Contact Us</a>
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
