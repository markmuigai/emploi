@extends('layouts.general-layout')

@section('title','Welcome to Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<!-- LANDING PAGE -->
<div class="landing">
    <div class="container">
        <div class="content">
            <h4 class="text-uppercase">Get Your Job Done</h4>
            <h1>Blast Off Your Career</h1>
            <p>Welcome to Emploi, an online placement platform that advertises job seekers to employers</p>
            <a href="#" class="btn btn-orange">Join Now</a>
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
                <a href="#" class="btn btn-orange">Learn More</a>
            </div>
        </div>
    </div>
</div>
<!-- END OF ABOUT SESSION -->
<!-- STATISTICS -->
<div class="statistics">
    <div class="container">
        <div class="card mx-5">
            <div class="card-body text-center py-4">
                <div class="row">
                    <div class="col-md-4">
                        <i class="fas fa-briefcase"></i>
                        <h5>Total Jobs</h5>
                        <h1 class="counter">14515</h1>
                        <p>Find your next job effortlessly.</p>
                    </div>
                    <div class="col-md-4">
                        <i class="fas fa-clipboard-check"></i>
                        <h5>Total Candidates</h5>
                        <h1 class="counter">2451</h1>
                        <p>Get hired will minimal effort.</p>
                    </div>
                    <div class="col-md-4">
                        <i class="fas fa-building"></i>
                        <h5>Total Companies</h5>
                        <h1 class="counter">451</h1>
                        <p>Get discovered by top comapanies.</p>
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
                <p>We provide you with seamless job placement though superior candidate selection tools that allow the employer to hire very fast, aggregated market vaccancies through job boards. </p>
                <div class="service-carousel m-3 py-1">
                    <div class="card mx-3 py-2 px-1">
                        <div class="card-body">
                            <i class="fas fa-user"></i>
                            <p>Browse Talent Database</p>
                        </div>
                    </div>
                    <div class="card mx-3 py-2 px-1">
                        <div class="card-body">
                            <i class="fas fa-user"></i>
                            <p>Recruitment Process Outsourcing</p>
                        </div>
                    </div>
                    <div class="card mx-3 py-2 px-1">
                        <div class="card-body">
                            <i class="fas fa-user"></i>
                            <p>Assess Candidate</p>
                        </div>
                    </div>
                    <div class="card mx-3 py-2 px-1">
                        <div class="card-body">
                            <i class="fas fa-user"></i>
                            <p>Advertise Jobs</p>
                        </div>
                    </div>
                    <div class="card mx-3 py-2 px-1">
                        <div class="card-body">
                            <i class="fas fa-user"></i>
                            <p>Background Checks</p>
                        </div>
                    </div>
                    <div class="card mx-3 py-2 px-1">
                        <div class="card-body">
                            <i class="fas fa-user"></i>
                            <p>Premium Placement</p>
                        </div>
                    </div>
                    <div class="card mx-3 py-2 px-1">
                        <div class="card-body">
                            <i class="fas fa-user"></i>
                            <p>Professional Coaching</p>
                        </div>
                    </div>
                    <div class="card mx-3 py-2 px-1">
                        <div class="card-body">
                            <i class="fas fa-user"></i>
                            <p>Job Vacancies</p>
                        </div>
                    </div>
                    <div class="card mx-3 py-2 px-1">
                        <div class="card-body">
                            <i class="fas fa-user"></i>
                            <p>Professional CV Editing</p>
                        </div>
                    </div>
                    <div class="card mx-3 py-2 px-1">
                        <div class="card-body">
                            <i class="fas fa-user"></i>
                            <p>Career Centre</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END OF SERVICES -->

<!-- FEATURED JOBS -->
<div class="container mt-5 text-center">
    <h2>Featured Jobs</h2>
    @if(is_null($posts))
    <h4 class="text-center">No Jobs Available Yet.</h4>
    @else
    <div class="featured-carousel">
        @foreach($posts as $p)
        <a class="card m-4" href="/vacancies/{{ $p->slug }}">
            <div class="card-body">
                <div class="d-flex justify-content-center mb-3">
                    <img src="images/a1.jpg" alt="" />
                </div>
                <p class="badge badge-secondary">{{$p->positions}} Postions</p>
                <h5>{{ $p->title }}</h5>
                <p><i class="fas fa-map-marker-alt orange"></i> {{ $p->location->name }}</p>
                <p>{{ $p->location->country->currency }} {{ $p->monthly_salary }} P.M.</p>
                @guest
                @else
                @endguest
            </div>
        </a>
        @endforeach
    </div>
    <a href="#" class="btn btn-orange my-5">View All Jobs</a>
    @endif
</div>
<!-- END OF FEATURED JOBS -->

<!-- TESTIMONALS -->
<div class="container">
    <div class="testimonials">
        <div class="card mx-2 my-3">
            <div class="card-body">
                <h2 class="text-center orange">Testimonials</h2>
                <div class="row align-items-center">
                    <div class="col-2">
                        <img src="{{asset('images/avatar.png')}}" alt="" class="w-100">
                    </div>
                    <div class="col-10">
                        <p>Emploi is the most efficient digital sourcing platform. They are fast and are good at what they do.</p>
                        <hr class="short">
                        <h5>Anthony Ochieng</h5>
                        <p>Employer</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mx-2 my-3">
            <div class="card-body">
                <h2 class="text-center orange">Testimonials</h2>
                <div class="row align-items-center">
                    <div class="col-2">
                        <img src="{{asset('images/avatar.png')}}" alt="" class="w-100">
                    </div>
                    <div class="col-10">
                        <p>Emploi helped me define exactly what it is I was looking for and they even went further And gave me as opportunity of getting there.</p>
                        <hr class="short">
                        <h5>Kipkemoi Kizito</h5>
                        <p>Job Seeker</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mx-2 my-3">
            <div class="card-body">
                <h2 class="text-center orange">Testimonials</h2>
                <div class="row align-items-center">
                    <div class="col-2">
                        <img src="{{asset('images/avatar.png')}}" alt="" class="w-100">
                    </div>
                    <div class="col-10">
                        <p>The Emploi Team create a great rapport with their candidates and are an invaluable asset to anyone looking for a job.</p>
                        <hr class="short">
                        <h5>Faith Chepkemoi</h5>
                        <p>Job Seeker</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mx-2 my-3">
            <div class="card-body">
                <h2 class="text-center orange">Testimonials</h2>
                <div class="row align-items-center">
                    <div class="col-2">
                        <img src="{{asset('images/avatar.png')}}" alt="" class="w-100">
                    </div>
                    <div class="col-10">
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
                @foreach($blogs->slice(0,1) as $blog)
                <div class="card">
                    <div class="card-body">
                        <div class="latest-blog-image" style="background-image: url('{{ asset($blog->imageUrl) }}')"></div>
                        <h5><a href="{{ url('blog/'.$blog->slug) }}">{{ $blog->title }}</a></h5>
                        <div class="d-flex">
                            <p><i class="fas fa-user"></i> {{ $blog->user->name }} | <i class="fas fa-calendar-check"></i> 12 Aug 2019</p>
                        </div>
                        <p class="badge badge-secondary">{{ $blog->category->name }}</p>
                        <p class="truncate-long"><?php echo $blog->contents; ?></p>
                        <a href="{{ url('blog/'.$blog->slug) }}" class="orange">Read More</a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-lg-7">
                @foreach ($blogs->slice(1, 3) as $blog)
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2">
                                <img src="{{ asset($blog->imageUrl) }}" alt="" class="w-100">
                            </div>
                            <div class="col-10">
                                <h5><a href="{{ url('blog/'.$blog->slug) }}">{{ $blog->title }}</a></h5>
                                <div class="d-flex">
                                    <p><i class="fas fa-user"></i> {{ $blog->user->name }} | <i class="fas fa-calendar-check"></i> 12 Aug 2019</p>
                                </div>
                                <p class="badge badge-secondary">{{ $blog->category->name }}</p>
                                <p class="truncate"><?php echo $blog->contents; ?></p>
                                <a href="{{ url('blog/'.$blog->slug) }}" class="orange">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="text-center">
            <a href="" class="btn btn-orange">View All Blogs</a>
        </div>
    </div>
</div>
<!-- END OF BLOGS -->

<!-- FEATURED EMPLOYERS -->
<div class="container py-5 text-center">
    <h2>Featured Employers</h2>
    <div class="employers-carousel py-4">
        <div class="d-flex justify-content-center my-2">
            <img src="images/Africote.png" alt="">
        </div>
        <div class="d-flex justify-content-center my-2">
            <img src="images/Batiment-group-limited.png" alt="">
        </div>
        <div class="d-flex justify-content-center my-2">
            <img src="images/Cartridge-mania.png" alt="">
        </div>
        <div class="d-flex justify-content-center my-2">
            <img src="images/Jubilee-insurance.png" alt="">
        </div>
        <div class="d-flex justify-content-center my-2">
            <img src="images/Kendirita-tours-and-travel.png" alt="">
        </div>
        <div class="d-flex justify-content-center my-2">
            <img src="images/Sprout-ke.png" alt="">
        </div>
        <div class="d-flex justify-content-center my-2">
            <img src="{{asset('images/avatar.png')}}" alt="">
        </div>
        <div class="d-flex justify-content-center my-2">
            <img src="{{asset('images/avatar.png')}}" alt="">
        </div>
        <div class="d-flex justify-content-center my-2">
            <img src="{{asset('images/avatar.png')}}" alt="">
        </div>
        <div class="d-flex justify-content-center my-2">
            <img src="{{asset('images/avatar.png')}}" alt="">
        </div>
        <div class="d-flex justify-content-center my-2">
            <img src="{{asset('images/avatar.png')}}" alt="">
        </div>
    </div>
    <a href="#" class="btn btn-orange">See Who Is Hiring</a>
</div>
<!-- END OF FEATURED EMPLOYERS -->

<!-- GET STARTED -->
<div class="get-started">
    <div class="container">
        <div class="content">
            <h1>Find the Right Job for you.</h1>
            <p>Looking for a job? Looking to hire? The first thing you need to do is create a profile.</p>
            <h4>More than <span>2165</span> professional got their path to success.</h4>
            <a href="#" class="btn btn-orange">Get Started</a>
        </div>
    </div>
</div>
<!-- END OF GET STARTED -->
<script type="text/javascript">
    $(document).ready(function() {
        $('.service-carousel').slick({
            infinite: true,
            slidesToShow: 2,
            slidesToScroll: 1,
            arrows: false,
            dots: true,
            autoplay: true,
            speed: 1000,
        });
        $('.featured-carousel').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 2,
            arrows: true,
            prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
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
            slidesToShow: 3,
            slidesToScroll: 2,
            arrows: true,
            prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
            autoplay: true,
            speed: 500,
        });

        $(function() {
            $('.counter').countUp();
        });

    });
</script>

@endsection