@extends('v2.layouts.app')

@section('content')
    <!-- Navbar -->
    @include('v2.components.guest.navbar')
    <!-- End Navbar -->

    @include('v2.components.main-banner')

    <!-- Who we are -->
    <div class="new-area pt-100 pb-70">
        <div class="container text-center">
            <div class="about-content">
                <div class="section-title">
                    <span class="sub-title">Explore New Life</span>
                    <h2>{{ __('other.who_r_we') }}?</h2>
                </div>
                <p style="font-size: 1rem">{{ __('other.who_r_we_txt') }}</p>
                <a class="cmn-btn" href="/about">
                    {{ __('other.m_abt_us') }}
                    <i class='bx bx-info-square' ></i>
                </a>
                <a class="cmn-btn" href="/employers/publish">
                    {{ __('jobs.advert_jobs') }}
                    <i class='bx bx-station'></i>
                </a>
            </div>
        </div>
    </div>
    <!-- End Who we are -->

    <!-- CV Editing -->
    <section class="explore-area ptb-100">
        <div class="container">
            <div class="explore-item">
                <div class="section-title">
                    <span class="sub-title">Explore New Life</span>
                    <h2>Put Your Cv In Front Of Great Employers</h2>
                </div>
                <ul>
                    <li>
                        <a class="left-btn" href="about.html#">
                            Request For Professional CV Editing
                            <i class="flaticon-upload"></i>
                        </a>
                    </li>
                    <li>
                        <a class="cmn-btn" href="/covid19-information-series">
                            COVID-19 Information Series
                            <i style="color:white" class='bx bx-doughnut-chart'></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End CV Editing -->

    <!-- Our Services -->
    <section class="work-area py-5 pb-70">
        <div class="container">
            <div class="section-title">
                <span class="sub-title">What we offer</span>
                <h2>{{ __('other.o_serv') }} for<span style="color:#e15419"> job seekers</span></h2>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <a href="/job-seekers/summit">
                        <div class="work-item">
                            <i class="flaticon-verify"></i>
                            <span>01</span>
                            <h3>{{ __('jobs.cv_edit') }}</h3>
                            <p>{{ __('jobs.cv_edit_txt') }}</p>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <a href="/job-seekers/services">
                        <div class="work-item">
                            <i class="flaticon-file"></i>
                            <span>02</span>
                            <h3>{{ __('jobs.f_seeker') }}</h3>
                            <p>{{ __('jobs.f_seeker_txt') }}</p>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <a href="/vacancies">
                        <div class="work-item">
                            <i class="flaticon-comment"></i>
                            <span>03</span>
                            <h3>{{ __('jobs.j_vacays') }}</h3>
                            <p>{{ __('jobs.j_vacays_txt') }}</p>
                        </div>
                    </a>
                </div>
            </div>
                <div class="section-title">
                    <h2>{{ __('other.o_serv') }} for <span style="color:#e15419"> employers</span></h2>
                </div>
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <a href="/employers/browse">
                        <div class="work-item">
                            <i class="flaticon-comment"></i>
                            <span>04</span>
                            <h3>Talent Database</h3>
                            <p>Search tens of thousands of qualified CVs for quick shortlisting, direct contact and hire.</p>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <a href="/employers/publish">
                        <div class="work-item">
                            <i class="flaticon-comment"></i>
                            <span>05</span>
                            <h3>Advertise Jobs</h3>
                            <p>Reach an audience of 100k+ subscribers, utilize advanced recruitment tools and candidate ranking algorithm.</p>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <a href="/employers/services">
                        <div class="work-item">
                            <i class="flaticon-comment"></i>
                            <span>06</span>
                            <h3>Recruitment Process Outsourcing</h3>
                            <p>Use our talent database and powerful search-sort-assess-score engine to cut down your recruitment workload by up to 70% and your costs by up to 65%.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Services -->

    <!-- Featured jobs -->
    <section class="feature-area pb-100">
        <div class="container-fluid">
            <div class="section-title three">
                <div class="sub-title-wrap">
                    {{-- <img src="{{ asset('assets-v2/img/home-three/title-img.png') }}" alt="Icon">
                    <span class="sub-title">Employers Offering Job</span> --}}
                </div>
                <h2>{{ __('jobs.f_jobs') }}</h2>
            </div>
            @include('v2.components.featured-jobs')
            <div class="job-browse">
                <a href="/vacancies" class="btn btn-orange mt-3 mb-5">View All Jobs</a>
                <a href="/vacancies/featured" class="btn btn-orange-alt mt-3 mb-5">Featured Vacancies</a>
            </div>
        </div>
    </section>
    <!-- End Featured jobs -->

    <!-- Blog -->
    <section class="blog-area three pt-100 pb-70">
        <div class="container">
            <div class="section-title three">
                <h2 class="text-white">Blog & News</h2>
            </div>
                @include('v2.components.blogs')<br>

        </div>
    </section>
    <!-- End Blog -->

    <!-- Testimonial -->
    <section class="testimonial-area pt-5 pb-100">
        <div class="container">
            <div class="section-title two text-center">
                <h2>Testimonials</h2>
            </div>
            <div class="testimonial-slider owl-theme owl-carousel">
                <div class="testimonial-item">
                    <img src="{{asset('assets-v2/img/home-two/testimonial1.jpg')}}" alt="Testimonial">
                    <p>Awesome dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud</p>
                    <h3>Devit M.Kolin</h3>
                    <span>CEO & Founder</span>
                </div>
                <div class="testimonial-item">
                    <img src="{{asset('assets-v2/img/home-two/testimonial2.jpg')}}" alt="Testimonial">
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                    <h3>Tom Henry</h3>
                    <span>Director</span>
                </div>
            </div>
        </div>
    </section>
    <!-- End Testimonial -->

    <!-- Partner -->
    <div class="partner-area two pt-5 pb-70">
        <div class="container text-center">
            <div class="section-title three">
                <h2>Featured Employers</h2>
            </div>
            <div class="partner-slider owl-theme owl-carousel">
                @include('v2.components.featured-employers')                
            </div>
        </div>
    </div>
    <!-- End Partner -->

@endsection