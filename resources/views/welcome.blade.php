@extends('layouts.general-layout')

@section('title','Welcome to Emploi - The Premier Online Job Placement Platform in Africa')

@section('description')
Emploi is the Leading Platform for Talent Assessment and Matching for SME's in Africa.
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
        border-radius: 1.5em
    }

    #cards{
        background:linear-gradient(to right,#515151,rgba(81,81,81,.3)),url(/images/connect.jpg); 
        background-size: cover;
        background-position: center;
        min-height: 300px;
        color: white;

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
        .content2 {
            font-size: 95%
        }
    }
</style>

<!-- LANDING PAGE -->
<div class="landing">
    <div class="container">
        <div class="content2">
            <a href="/covid19-information-series">COVID-19 Information Series</a>
        </div>
        <div class="content">

            <?php $line= "We aggregate all the jobs for you at one stop and we provide you with the best placement tools and support you need to land your dream job" ?>

            @if(isset(Auth::user()->id) && Auth::user()->role == 'seeker')
            @include('components.welcome-banner')
            

            @elseif(isset(Auth::user()->id) && Auth::user()->role == 'employer')
            <h4 class="text-uppercase">Hire with ease</h4>
            <h1>Premium Recruitment</h1>
            <p>Welcome to Emploi, where deserving talent meets deserving opportunities</p>
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
@include('components.stats')
<!-- END OF ABOUT SESSION -->

<!-- SERVICES -->
<div class="services my-3">
    <div class="container">
         <div class=" col-md-8 offset-md-2">
            <div class="card my-2">
                  <a href="/job-seekers/featured">
                     <img src="/images/featured.png" alt="get featured" style="width: 100%"> 
                  </a>
            </div>
        </div>            
        <br>             
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
                                        <a href="/job-seekers/summit" class="btn btn-orange">{{ __('other.r_serv') }}</a>
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
                                            <a href="/vacancies" class="btn btn-orange">View Vacancies</a>
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
                                        <a href="/employers/browse" class="btn btn-orange">Browse</a>
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
                                            <a href="/employers/services" class="btn btn-orange">View Services</a>
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

@include('components.testimonials.general')

@include('components.blogs')
<br>
    <div class="text-center">         
        <a href="/refer"><img src="/images/friends_refer_thin-flat.png" alt="Refer your Friends for Rewards"></a>      
    </div> 
       
    
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
<section class="container-fluid container">
    <div class="row">
        <div class="col-md-6">
          <div class="card shadow" id="cards"  style="min-height: 300px;">
            <div class="card-body">
              <h5 class="card-title pb-2">PaaS</h5>
              <p class="card-text">PAAS is a service that seeks to provide qualified part-time professionals on demand 
                  to handle specific tasks at affordable rates and at a cost effective plan.</p>
            </div>
            <div class="card-footer">
                <a href="#" class="btn btn-white">Visit Page</a>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card shadow" id="cards" style="min-height: 300px;">
            <div class="card-body">
              <h5 class="card-title pb-2">Career Summit</h5>
              <p class="card-text">This package provides Job-seekers with Coaching and support that gets you a job
                where you will thrive not just survive</p>
            </div>
            <div class="card-footer">
                <a href="#" class="btn btn-white">Visit Page</a>
            </div>
          </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow" id="cards" style="min-height: 300px;">
              <div class="card-body">
                <h5 class="card-title pb-2">Career Summit</h5>
                <p class="card-text">This package provides Job-seekers with Coaching and support that gets you a job
                  where you will thrive not just survive</p>
              </div>
              <div class="card-footer">
                  <a href="#" class="btn btn-white">Visit Page</a>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card shadow" id="cards" style="min-height: 300px;">
              <div class="card-body">
                <h5 class="card-title pb-2">Career Summit</h5>
                <p class="card-text">This package provides Job-seekers with Coaching and support that gets you a job
                  where you will thrive not just survive</p>
              </div>
              <div class="card-footer">
                  <a href="#" class="btn btn-white">Visit Page</a>
              </div>
            </div>
          </div>
          
      </div>

</section>
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
    });
</script>
    

@endsection
