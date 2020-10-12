@extends('v2.layouts.app')

@section('content')

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
            <div class="row">
                <div class="col-sm-6 col-lg-2">
                    <div class="feature-item">
                        <a href="job-details.html">
                            <img src="{{ asset('assets-v2/img/home-three/feature1.png') }}" alt="Feature">
                        </a>
                        <div class="bottom">
                            <h3>
                                <a href="job-details.html">Accounting</a>
                            </h3>
                            <span>5 Jobs</span>
                            <i class="flaticon-verify"></i>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="feature-item">
                        <a href="job-details.html">
                            <img src="{{ asset('assets-v2/img/home-three/feature2.png') }}" alt="Feature">
                        </a>
                        <div class="bottom">
                            <h3>
                                <a href="job-details.html">Digital Marketing</a>
                            </h3>
                            <span>2 Jobs</span>
                            <i class="flaticon-verify"></i>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="feature-item">
                        <a href="job-details.html">
                            <img src="{{ asset('assets-v2/img/home-three/feature3.png') }}" alt="Feature">
                        </a>
                        <div class="bottom">
                            <h3>
                                <a href="job-details.html">Customer Service</a>
                            </h3>
                            <span>4 Jobs</span>
                            <i class="flaticon-verify"></i>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="feature-item">
                        <a href="job-details.html">
                            <img src="{{ asset('assets-v2/img/home-three/feature4.png') }}" alt="Feature">
                        </a>
                        <div class="bottom">
                            <h3>
                                <a href="job-details.html">Broadcasting</a>
                            </h3>
                            <span>1 Job</span>
                            <i class="flaticon-verify"></i>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="feature-item">
                        <a href="job-details.html">
                            <img src="{{ asset('assets-v2/img/home-three/feature5.png') }}" alt="Feature">
                        </a>
                        <div class="bottom">
                            <h3>
                                <a href="job-details.html">Sale Assistance</a>
                            </h3>
                            <span>5 Jobs</span>
                            <i class="flaticon-verify"></i>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="feature-item">
                        <a href="job-details.html">
                            <img src="{{ asset('assets-v2/img/home-three/feature6.png') }}" alt="Feature">
                        </a>
                        <div class="bottom">
                            <h3>
                                <a href="job-details.html">Teachers</a>
                            </h3>
                            <span>2 Job</span>
                            <i class="flaticon-verify"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="job-browse">
                <p>Jobs are waiting for you <a href="jobs.html">Browse all jobs</a></p>
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
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="blog-item">
                        <div class="top">
                            <a href="blog-details.html">
                                <img src="{{asset('assets-v2/img/home-one/blog1.jpg')}}" alt="Blog">
                            </a>
                        </div>
                        <span>Job skills. 12-09-2020</span>
                        <h3>
                            <a href="blog-details.html">The Internet Is A Job Seeker Most Crucial Success </a>
                        </h3>
                        <div class="cmn-link">
                            <a href="blog-details.html">
                                <i class="flaticon-right-arrow one"></i>
                                Learn More
                                <i class="flaticon-right-arrow two"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="blog-item">
                        <div class="top">
                            <a href="blog-details.html">
                                <img src="{{asset('assets-v2/img/home-one/blog2.jpg')}}" alt="Blog">
                            </a>
                        </div>
                        <span>Career advice. 11-09-2020</span>
                        <h3>
                            <a href="blog-details.html">Today From Connecting With Potential Employers</a>
                        </h3>
                        <div class="cmn-link">
                            <a href="blog-details.html">
                                <i class="flaticon-right-arrow one"></i>
                                Learn More
                                <i class="flaticon-right-arrow two"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="blog-item">
                        <div class="top">
                            <a href="blog-details.html">
                                <img src="{{asset('assets-v2/img/home-one/blog3.jpg')}}" alt="Blog">
                            </a>
                        </div>
                        <span>Future plan. 10-09-2020</span>
                        <h3>
                            <a href="blog-details.html">We’ve Weeded Through Hundreds Of Job Hunting</a>
                        </h3>
                        <div class="cmn-link">
                            <a href="blog-details.html">
                                <i class="flaticon-right-arrow one"></i>
                                Learn More
                                <i class="flaticon-right-arrow two"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Blog -->

    <!-- Client -->
    <section class="client-area ptb-100">
        <div class="client-img">
            <img src="{{asset('assets-v2/img/home-three/client1.jpg')}}" alt="Client">
            <img src="{{asset('assets-v2/img/home-three/client2.jpg')}}" alt="Client">
            <img src="{{asset('assets-v2/img/home-three/client3.jpg')}}" alt="Client">
            <img src="{{asset('assets-v2/img/home-three/client4.jpg')}}" alt="Client">
            <img src="{{asset('assets-v2/img/home-three/client5.jpg')}}" alt="Client">
            <img src="{{asset('assets-v2/img/home-three/client6.jpg')}}" alt="Client">
        </div>
        <div class="container">
            <div class="section-title three">
                <div class="sub-title-wrap">
                    <img src="{{asset('assets-v2/img/home-three/title-img.png')}}" alt="Icon">
                </div>
                <h2>Our Trusted Clients</h2>
            </div>
            <div class="client-slider owl-theme owl-carousel">
                <div class="client-item">
                    <p>Awesome dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaenimminim veniam quis nostrud  dolore magn</p>
                    <h3>Devit M. Kolin</h3>
                    <span>CEO & Founder</span>
                </div>
                <div class="client-item">
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that </p>
                    <h3>Tom Henry</h3>
                    <span>Director</span>
                </div>
            </div>
        </div>
    </section>
    <!-- End Client -->

    <!-- Partner -->
    <div class="partner-area two pt-5 pb-70">
        <div class="container text-center">
            <div class="section-title three">
                <h2>Featured Employers</h2>
            </div>
            <div class="partner-slider owl-theme owl-carousel">
                <div class="partner-item">
                    <img src="{{asset('assets-v2/img/home-one/partner1.png')}}" alt="Partner">
                    <img src="{{asset('assets-v2/img/home-one/partner1.png')}}" alt="Partner">
                </div>
                <div class="partner-item">
                    <img src="{{asset('assets-v2/img/home-one/partner2.png')}}" alt="Partner">
                    <img src="{{asset('assets-v2/img/home-one/partner2.png')}}" alt="Partner">
                </div>
                <div class="partner-item">
                    <img src="{{asset('assets-v2/img/home-one/partner3.png')}}" alt="Partner">
                    <img src="{{asset('assets-v2/img/home-one/partner3.png')}}" alt="Partner">
                </div>
                <div class="partner-item">
                    <img src="{{asset('assets-v2/img/home-one/partner4.png')}}" alt="Partner">
                    <img src="{{asset('assets-v2/img/home-one/partner4.png')}}" alt="Partner">
                </div>
                <div class="partner-item">
                    <img src="{{asset('assets-v2/img/home-one/partner5.png')}}" alt="Partner">
                    <img src="{{asset('assets-v2/img/home-one/partner5.png')}}" alt="Partner">
                </div>
                <div class="partner-item">
                    <img src="{{asset('assets-v2/img/home-one/partner1.png')}}" alt="Partner">
                    <img src="{{asset('assets-v2/img/home-one/partner1.png')}}" alt="Partner">
                </div>
            </div>
        </div>
    </div>
    <!-- End Partner -->

@endsection