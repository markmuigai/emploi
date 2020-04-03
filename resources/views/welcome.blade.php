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

    .content2 {
        float: none;
        position: absolute;
        top: 68vh;
        background-color: white;
        color: #500095;
        border-radius: 1.5%;
        padding: 0.4em 1em;
        box-shadow: 0.5em 0.8em #888888;
        border-radius: 1.5em
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

    @media only screen and (max-width:425px) {
        .landing {
            background-image: url(../images/bg-small.jpg);
            
            background-repeat: no-repeat;
            background-size: cover;
            background-position: right;
            height: 80vh
        }
    }
</style>

<!-- LANDING PAGE -->
<div class="landing">
    <div class="container">
        <div class="content2">
            <a href="https://emploi.co/blog/a-review-of-government-measures-to-combat-covid-19">See how we are supporting companies and individuals in the fight against COVID-19</a>
        </div>
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

            @elseif(isset(Auth::user()->id) && Auth::user()->role == 'guest')
            <h1>the Leading Platform for Recruitment and Placement Solutions for SMEs</h1>
            <p>
                <a href="/guests/i-am-a-job-seeker" class="btn btn-orange px-4">I'm a Job Seeker</a>
                <br class="for-mobile"><br class="for-mobile">
                <a href="/guests/i-am-an-employer" class="btn btn-white px-4">I'm an Employer</a>
            </p>
            @else
                @include('components.welcome-banner')
                
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
                <h2 class="orange">{{ __('other.who_r_we') }}?</h2>
                <p>{{ __('other.who_r_we_txt') }}
                </p>
                <a href="/about" class="btn btn-orange">{{ __('other.m_abt_us') }}</a>
                <a href="/employers/publish" class="btn btn-orange-alt px-4">{{ __('jobs.advert_jobs') }}</a>
            </div>
        </div>
    </div>
</div>
<!-- END OF ABOUT SESSION -->
@include('components.stats')
<!-- SERVICES -->
<div class="services my-3">
    <div class="container">
        <div class="card">
            <div class="card-body text-center">
                <h2 class="orange" id="our-services-section">{{ __('other.o_serv') }}</h2>
                <p>{{ __('other.o_serv_txt') }}</p>
                <div class="row pt-2 service-cards">
                    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist" style="width: 100%">
                        <?php
                            $seekerServices = 'active';
                            $employerServices = '';

                            if(isset(Auth::user()->id))
                            {
                                if(Auth::user()->role == 'employer' || Auth::user()->role == 'admin')
                                {
                                    $seekerServices = '';
                                    $employerServices = 'active';
                                }
                                
                            }
                        ?>
                        
                        <li class="nav-item">
                            <a class="nav-link {{ $seekerServices }}" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">{{ __('jobs.for_js') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $employerServices }}" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">{{ __('jobs.for_emp') }}</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show  {{ $seekerServices == 'active' ? 'show active' : '' }}" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <br>
                            <div class="card-deck">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ __('jobs.cv_edit') }}</h5>
                                        <p class="card-text">{{ __('jobs.cv_edit_txt') }}</p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="/job-seekers/cv-editing" class="btn btn-orange-alt">{{ __('other.r_serv') }}</a>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ __('jobs.f_seeker') }}</h5>
                                        <p class="card-text">{{ __('jobs.f_seeker_txt') }}</p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="/job-seekers/services" class="btn btn-orange">{{ __('other.l_more') }}</a>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ __('jobs.j_vacays') }}</h5>
                                        <p class="card-text">
                                        {{ __('jobs.j_vacays_txt') }} </p>
                                    </div>
                                    <div class="card-footer">
                                        <span id="featured-vacancies"></span>
                                        <small class="text-muted">
                                            <a href="/vacancies" class="btn btn-orange-alt">View Vacancies</a>
                                        </small>
                                    </div>
                                </div>

                            </div>
                            <br>
                        </div>
                        <div class="tab-pane fade {{ $employerServices == 'active' ? 'show active' : '' }}" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <br>
                            <div class="card-deck">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Talent Database</h5>
                                        <p class="card-text">Search tens of thousands of qualified CVs for quick shortlisting, direct contact and hire</p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="/employers/browse" class="btn btn-orange-alt">Browse</a>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Advertise Jobs</h5>
                                        <p class="card-text">Reach an Audience of 100k+ subscribers, Utilize Advanced Recruitment tools and Candidate Ranking Algorithm.</p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="/employers/publish" class="btn btn-orange">Advertise Here</a>
                                    </div>
                                </div>
                                <div class="card">
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
<div class="container mt-5 text-center" >
    <h2 class="orange">{{ __('jobs.f_jobs') }}</h2>
    @if(is_null($posts))
    <div class="text-center">
        <p>No jobs posted yet. Please check back later.</p>
    </div>
    @else
    <div class="featured-carousel">
        @forelse($posts as $post)
        <span class="card mx-4 m-md-2 m-lg-4">
            <div class="card-body">
                <div class="d-flex justify-content-center mb-3">
                    <img src="{{ asset('images/500g.png') }}" data-src="{{ asset($post->imageUrl) }}" class="lazy"  alt="{{ $post->title }}" />
                </div>
                <p class="badge badge-secondary">{{$post->positions}} Positions</p>
                <a href="/vacancies/{{ $post->slug }}">
                    <h5>{{ $post->getTitle(true) }}</h5>
                </a>
                <p>
                    <a href="/vacancies/{{ $post->location->name }}">
                        <i class="fas fa-map-marker-alt orange"></i> {{ $post->location->name }}
                    </a>
                </p>
                <p>
                    @if(isset(Auth::user()->id))
                    {{ $post->monthlySalary() }} {{ $post->monthly_salary == 0 ? '' : 'p.m.' }}
                    @else
                    @endif
                </p>
                <p>
                    
                    <button class="btn btn-orange-alt" data-toggle="modal" data-target="#postModal{{ $post->id }}"><i class="fas fa-share-alt"></i></button>
                    @if(isset(Auth::user()->id) && Auth::user()->role == 'seeker' && Auth::user()->seeker->hasApplied($post))
                    <a href="/vacancies/{{ $post->slug }}" class="btn btn-orange-alt">
                        Applied
                    </a>
                    @else
                    <a href="/vacancies/{{ $post->slug }}" class="btn btn-orange">
                        {{ __('other.apply') }}
                    </a>
                    @endif

                </p>
            </div>
        </span>
        @empty
        @endforelse
    </div>
    <a href="/vacancies" class="btn btn-orange mt-3 mb-5">{{ __('jobs.v_a_jobs') }}</a>
    <a href="/vacancies/featured" class="btn btn-orange-alt mt-3 mb-5">{{ __('jobs.f_jobs') }}</a>
    @endif
</div>
@forelse($posts as $post)
@include('components.post-share-modal')
@empty
@endforelse
<!-- END OF FEATURED JOBS -->

<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            @if($agent->isMobile())
                @include('components.ads.mobile_400x350')
            @else            
                @include('components.ads.flat_728x90')
            @endif
        </div>        
    </div>
</div>

<!-- TESTIMONALS -->
<div class="container">
    <div class="testimonials">
        <div class="card mx-4 mx-md-5 mx-lg-2 my-3">
            <div class="card-body">
                <h2 class="text-center orange">{{ __('other.testi') }}</h2>
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
                <h2 class="text-center orange">{{ __('other.testi') }}</h2>
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
                <h2 class="text-center orange">{{ __('other.testi') }}</h2>
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
                <h2 class="text-center orange">{{ __('other.testi') }}</h2>
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

@include('components.blogs')

@include('components.featuredEmployers')

<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            @if($agent->isMobile())
                @include('components.ads.mobile_400x350')
            @else            
                @include('components.ads.flat_728x90')
            @endif
        </div>        
    </div>
</div>

<!-- GET STARTED -->
<div class="get-started">
    <div class="container">
        <div class="content">
            @guest
                <h1>{{ __('other.find_right_job') }}</h1>
                <p>{{ __('other.looking_') }}</p>
                <h4>{{ __('other.more_than') }} <span class="seeker-stats"><span>2207</span></span> {{ __('other.proffesionals_path') }}</h4>
                <a href="/employers/services" class="btn btn-white px-4">Employer Services</a>
                <a href="/job-seekers/services" class="btn btn-orange px-4">Job Seeker Services</a>
            @else
                @if(Auth::user()->role == 'seeker')
                    <h1>{{ __('other.find_right_job') }}</h1>
                    <p>Looking for a job? Maybe your CV doesn't stand out! Let us catapult your career and land you a job with our professional CV Editing.</p>
                    <h4>More than <span class="seeker-stats"><span>2207</span></span> professional got their path to success.</h4>
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
        <script type="text/javascript">
            $().ready(function(){
                $.ajax({
                    type: 'GET',
                    url: '/api/job-seekers-who-found-their-way?csrf-token='+$('#csrf_token').attr('content'),
                    success: function(response) {
                        
                        $('.seeker-stats').empty();
                        $('.seeker-stats').append('<span>'+response+'</span>');
                        
                    },
                    error: function(e) {

                        
                    },
                });
            });
        </script>
    </div>
</div>
@include('components.top-search')
<!-- END OF GET STARTED -->
<script type="text/javascript">
    $(document).ready(function() {
        $('.featured-carousel').slick({
            infinite: true,
            slidesToShow: 3,
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


        
        

        // $(function() {
        //     $('.counter').countUp();
        // });
    });
</script>
    

@endsection
