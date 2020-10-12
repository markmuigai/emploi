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

    <!-- Feature -->
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
    <!-- End Feature -->

    <!-- Employer -->
    <section id="job" class="employer-area pb-100">
        <div class="container">
            <div class="section-title three">
                <div class="sub-title-wrap">
                    <img src="{{asset('assets-v2/img/home-three/title-img.png')}}" alt="Icon">
                    <span class="sub-title">Employers Offering Job</span>
                </div>
                <h2>Company Offering Job</h2>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="employer-item">
                        <a href="job-details.html">
                            <img src="{{asset('assets-v2/img/home-one/job1.png')}}" alt="Employer">
                            <h3>Product Designer</h3>
                            <ul>
                                <li>
                                    <i class="flaticon-send"></i>
                                    Los Angeles, CS, USA
                                </li>
                                <li>5 months ago</li>
                            </ul>
                            <p>We are Looking for a skilled Ul/UX designer amet conscu adiing elitsed do eusmod tempor</p>
                            <span class="span-one">Accounting</span>
                            <span class="span-two">FULL TIME</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="employer-item">
                        <a href="blog-details.html">
                            <img src="{{asset('assets-v2/img/home-one/job2.png')}}" alt="Employer">
                            <h3>Sr. Shopify Developer</h3>
                            <ul>
                                <li>
                                    <i class="flaticon-send"></i>
                                    Houston, TX, USA
                                </li>
                                <li>4 months ago</li>
                            </ul>
                            <p>Responsible for managing skilled Ul/UX designer amet conscu adiing elitsed do eusmod</p>
                            <span class="span-one">Accounting</span>
                            <span class="span-two two">FULL TIME</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <a href="job-details.html">
                        <div class="employer-item">
                            <img src="{{asset('assets-v2/img/home-one/job3.png')}}" alt="Employer">
                            <h3>Tax Manager</h3>
                            <ul>
                                <li>
                                    <i class="flaticon-send"></i>
                                    Ho Chi Minh City, Vietnam
                                </li>
                                <li>6 months ago</li>
                            </ul>
                            <p>International collaborative a skilled Ul/UX designer amet conscu adiing elitsed do eusmod</p>
                            <span class="span-one two">Broardcasting</span>
                            <span class="span-two three">FREELANCER</span>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6">
                    <div class="employer-item">
                        <a href="job-details.html">
                            <img src="{{asset('assets-v2/img/home-one/job4.png')}}" alt="Employer">
                            <h3>Senior Data Engineer</h3>
                            <ul>
                                <li>
                                    <i class="flaticon-send"></i>
                                    Cardiss, UK
                                </li>
                                <li>9 months ago</li>
                            </ul>
                            <p>International collaborative designer amet conscu adiing elitsed do eusmod tempor</p>
                            <span class="span-one three">Web & Software Dev</span>
                            <span class="span-two four">REMOTE</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="employer-item">
                        <a href="job-details.html">
                            <img src="{{asset('assets-v2/img/home-one/job5.png')}}" alt="Employer">
                            <h3>Construction Worker</h3>
                            <ul>
                                <li>
                                    <i class="flaticon-send"></i>
                                    Adelaide SA, Australia
                                </li>
                                <li>10 months ago</li>
                            </ul>
                            <p>We are Looking for a skilled Ul/UX designer amet conscu adiing elitsed do eusmod tempor</p>
                            <span class="span-one">Accounting</span>
                            <span class="span-two">FULL TIME</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="employer-item">
                        <a href="job-details.html">
                            <img src="{{asset('assets-v2/img/home-one/job6.png')}}" alt="Employer">
                            <h3>Product Manager</h3>
                            <ul>
                                <li>
                                    <i class="flaticon-send"></i>
                                    Warangal, Telangana, India
                                </li>
                                <li>2 months ago</li>
                            </ul>
                            <p>Wind Power Engineering Manager amet conscu adiing elitsed do eusmod tempor</p>
                            <span class="span-one four">Customer Service</span>
                            <span class="span-two">FULL TIME</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="job-browse">
                <p>A tons of top tech jobs are waiting for you. <a href="jobs.html">Browse all jobs</a></p>
            </div>
        </div>
    </section>
    <!-- End Employer -->

    <!-- System -->
    <section class="system-area ptb-100">
        <div class="system-shape">
            <img src="{{asset('assets-v2/img/home-three/system1.png')}}" alt="Shape">
            <img src="{{asset('assets-v2/img/home-three/system2.png')}}" alt="Shape">
        </div>
        <div class="container">
            <div class="system-item">
                <div class="section-title three">
                    <div class="sub-title-wrap">
                        <img src="{{asset('assets-v2/img/home-three/title-img-two.png')}}" alt="Icon">
                        <span class="sub-title">Recruitment System</span>
                    </div>
                    <h2>You’ll Be Able To Recruit Qualified Candidate With Jecto</h2>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut tur incidunt laborequaerat voluptatem.</p>
                <ul class="system-list">
                    <li>
                        <span></span>
                        Access to the very best professionals
                    </li>
                    <li>
                        <span></span>
                        Look at on your own core business
                    </li>
                    <li>
                        <span></span>
                        Develop effi­­ci­­en­ci­­es by HR management
                    </li>
                </ul>
                <ul class="system-video">
                    <li>
                        <a class="left-btn" href="index-3.html#">
                            Recruit Now
                            <i class='bx bx-plus'></i>
                        </a>
                    </li>
                    <li>
                        <span>Watch Message</span>
                        <a class="right-btn popup-youtube" href="https://www.youtube.com/watch?v=07d2dXHYb94&t=88s">
                            <i class='bx bx-play'></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End System -->

    <!-- Our Services -->
    <section class="work-area two three pt-100 pb-70">
        <div class="container">
            <div class="section-title three">
                <div class="sub-title-wrap">
                    <img src="{{asset('assets-v2/img/home-three/title-img.png')}}" alt="Icon">
                    <span class="sub-title">Working Process</span>
                </div>
                <h2>See How It Works</h2>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="work-item two three">
                        <i class="flaticon-accounting"></i>
                        <h3>Register An Account</h3>
                        <p>Lorem ipsum dolor sit amet conscu adiing elitsed do eusmod tempor incidunt utinto elit sed doe</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="work-item two three">
                        <i class="flaticon-file"></i>
                        <h3>Search Your Job</h3>
                        <p>Lorem ipsum dolor sit amet conscu adiing elitsed do eusmod tempor incidunt utinto elit sed doe</p>
                    </div>
                </div>
                <div class="col-sm-6 offset-sm-3 offset-lg-0 col-lg-4">
                    <div class="work-item two three work-border">
                        <i class="flaticon-businessman-paper-of-the-application-for-a-job"></i>
                        <h3>Apply For Job</h3>
                        <p>Lorem ipsum dolor sit amet conscu adiing elitsed do eusmod tempor incidunt utinto elit sed doe</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Work -->

    <!-- Feature -->
    <section class="feature-area pb-100">
        <div class="container-fluid">
            <div class="section-title three">
                <div class="sub-title-wrap">
                    <img src="{{asset('assets-v2/img/home-three/title-img.png')}}" alt="Icon">
                    <span class="sub-title">Employers Offering Job</span>
                </div>
                <h2>Here's Features Job</h2>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-2">
                    <div class="feature-item">
                        <a href="job-details.html">
                            <img src="{{asset('assets-v2/img/home-three/feature1.png')}}" alt="Feature">
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
                            <img src="{{asset('assets-v2/img/home-three/feature2.png')}}" alt="Feature">
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
                            <img src="{{asset('assets-v2/img/home-three/feature3.png')}}" alt="Feature">
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
                            <img src="{{asset('assets-v2/img/home-three/feature4.png')}}" alt="Feature">
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
                            <img src="{{asset('assets-v2/img/home-three/feature5.png')}}" alt="Feature">
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
                            <img src="{{asset('assets-v2/img/home-three/feature6.png')}}" alt="Feature">
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
    <!-- End Feature -->

    <!-- Company -->
    <section class="company-area pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="section-title three">
                        <div class="sub-title-wrap">
                            <img src="{{asset('assets-v2/img/home-three/title-img.png')}}" alt="Icon">
                            <span class="sub-title">Employers Offering Job</span>
                        </div>
                        <h2>Company Offering Job</h2>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="sorting-menu">
                        <ul> 
                        <li class="filter" data-filter="all">All</li>
                        <li class="filter" data-filter=".m">Featured</li>
                        <li class="filter" data-filter=".n">Most Viewed</li>
                        <li class="filter" data-filter=".o">Newest</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="container" class="row">
                <div class="col-sm-6 col-lg-3 mix n">
                    <div class="company-item">
                        <div class="feature-top-right">
                            <span>Most Viewed</span>
                        </div>
                        <div class="top">
                            <a href="employer-details.html">
                                <img src="{{asset('assets-v2/img/home-one/company1.png')}}" alt="Brand">
                            </a>
                            <h3>
                                <a href="employer-details.html">Pi Agency</a>
                            </h3>
                            <span>Part Time Job</span>
                            <p>
                                <i class="flaticon-appointment"></i>
                                10 min ago / Austria, Vienna
                            </p>
                        </div>
                        <div class="bottom">
                            <ul>
                                <li>Pay Relocation Free</li>
                                <li>Remote Work</li>
                                <li>Duration: 5 Years</li>
                            </ul>
                            <span>Annual Salary</span>
                            <h4>50K</h4>
                            <a href="employer-details.html">
                                <i class="flaticon-right-arrow"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 mix n">
                    <div class="company-item">
                        <div class="feature-top-right">
                            <span>Most Viewed</span>
                        </div>
                        <div class="top">
                            <a href="employer-details.html">
                                <img src="{{asset('assets-v2/img/home-one/company2.png')}}" alt="Brand">
                            </a>
                            <h3>
                                <a href="employer-details.html">Kn It</a>
                            </h3>
                            <span>Permanent Job</span>
                            <p>
                                <i class="flaticon-appointment"></i>
                                9 min ago / Tirana, Albania
                            </p>
                        </div>
                        <div class="bottom">
                            <ul>
                                <li>Graphic Designer</li>
                                <li>Remote Work</li>
                                <li>Duration: 2 Years</li>
                            </ul>
                            <span>Annual Salary</span>
                            <h4>56K</h4>
                            <a href="employer-details.html">
                                <i class="flaticon-right-arrow"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 mix m">
                    <div class="company-item">
                        <div class="feature-top-right">
                            <span>Featured</span>
                        </div>
                        <div class="top">
                            <a href="employer-details.html">
                                <img src="{{asset('assets-v2/img/home-one/company3.png')}}" alt="Brand">
                            </a>
                            <h3>
                                <a href="employer-details.html">Orbit Inc.</a>
                            </h3>
                            <span>Part Time Job</span>
                            <p>
                                <i class="flaticon-appointment"></i>
                                8 min ago / Doha, Qatar
                            </p>
                        </div>
                        <div class="bottom">
                            <ul>
                                <li>Product Manager</li>
                                <li>Remote Work</li>
                                <li>Duration: 5 Years</li>
                            </ul>
                            <span>Annual Salary</span>
                            <h4>70K</h4>
                            <a href="employer-details.html">
                                <i class="flaticon-right-arrow"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 mix o">
                    <div class="company-item">
                        <div class="feature-top-right">
                            <span>Newest</span>
                        </div>
                        <div class="top">
                            <a href="employer-details.html">
                                <img src="{{asset('assets-v2/img/home-one/company4.png')}}" alt="Brand">
                            </a>
                            <h3>
                                <a href="employer-details.html">Dev Roside</a>
                            </h3>
                            <span>Full Time Job</span>
                            <p>
                                <i class="flaticon-appointment"></i>
                                15 min ago / UK, England
                            </p>
                        </div>
                        <div class="bottom">
                            <ul>
                                <li>Design & Developer</li>
                                <li>Remote Work</li>
                                <li>Duration: 2 Years</li>
                            </ul>
                            <span>Annual Salary</span>
                            <h4>89K</h4>
                            <a href="employer-details.html">
                                <i class="flaticon-right-arrow"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 mix o">
                    <div class="company-item">
                        <div class="feature-top-right">
                            <span>Newest</span>
                        </div>
                        <div class="top">
                            <a href="employer-details.html">
                                <img src="{{asset('assets-v2/img/home-one/company5.png')}}" alt="Brand">
                            </a>
                            <h3>
                                <a href="employer-details.html">Roshu.co</a>
                            </h3>
                            <span>Part Time Job</span>
                            <p>
                                <i class="flaticon-appointment"></i>
                                10 min ago / Cardiff, England
                            </p>
                        </div>
                        <div class="bottom">
                            <ul>
                                <li>Internet Operator</li>
                                <li>Remote Work</li>
                                <li>Duration: 2 Years</li>
                            </ul>
                            <span>Annual Salary</span>
                            <h4>66K</h4>
                            <a href="employer-details.html">
                                <i class="flaticon-right-arrow"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 mix m">
                    <div class="company-item">
                        <div class="feature-top-right">
                            <span>Featured</span>
                        </div>
                        <div class="top">
                            <a href="employer-details.html">
                                <img src="{{asset('assets-v2/img/home-one/company6.png')}}" alt="Brand">
                            </a>
                            <h3>
                                <a href="employer-details.html">Omti. Med</a>
                            </h3>
                            <span>Part Time Job</span>
                            <p>
                                <i class="flaticon-appointment"></i>
                                40 min ago / Tokyo, Japan
                            </p>
                        </div>
                        <div class="bottom">
                            <ul>
                                <li>Caring Officer</li>
                                <li>Remote Work</li>
                                <li>Duration: 2 Years</li>
                            </ul>
                            <span>Annual Salary</span>
                            <h4>50K</h4>
                            <a href="employer-details.html">
                                <i class="flaticon-right-arrow"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 mix o">
                    <div class="company-item">
                        <div class="feature-top-right">
                            <span>Newest</span>
                        </div>
                        <div class="top">
                            <a href="employer-details.html">
                                <img src="{{asset('assets-v2/img/home-one/company7.png')}}" alt="Brand">
                            </a>
                            <h3>
                                <a href="employer-details.html">Rahbar</a>
                            </h3>
                            <span>Full Time Job</span>
                            <p>
                                <i class="flaticon-appointment"></i>
                                7 min ago / Washington, US
                            </p>
                        </div>
                        <div class="bottom">
                            <ul>
                                <li>Media Connector</li>
                                <li>Remote Work</li>
                                <li>Duration: 3 Years</li>
                            </ul>
                            <span>Annual Salary</span>
                            <h4>87K</h4>
                            <a href="employer-details.html">
                                <i class="flaticon-right-arrow"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 mix n">
                    <div class="company-item">
                        <div class="feature-top-right">
                            <span>Most Viewed</span>
                        </div>
                        <div class="top">
                            <a href="employer-details.html">
                                <img src="{{asset('assets-v2/img/home-one/company8.png')}}" alt="Brand">
                            </a>
                            <h3>
                                <a href="employer-details.html">Doblin. Fo</a>
                            </h3>
                            <span>Part Time Job</span>
                            <p>
                                <i class="flaticon-appointment"></i>
                                12 min ago / California, US
                            </p>
                        </div>
                        <div class="bottom">
                            <ul>
                                <li>Private Officer</li>
                                <li>Remote Work</li>
                                <li>Duration: 1 Year</li>
                            </ul>
                            <span>Annual Salary</span>
                            <h4>50K</h4>
                            <a href="employer-details.html">
                                <i class="flaticon-right-arrow"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Company -->

    <!-- Pricing -->
    <section class="pricing-area pt-100 pb-70">
        <div class="container">
            <div class="section-title three">
                <div class="sub-title-wrap">
                    <img src="{{asset('assets-v2/img/home-three/title-img.png')}}" alt="Icon">
                    <span class="sub-title">Pricing Package</span>
                </div>
                <h2>Affordable Pricing Plan</h2>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="pricing-item">
                        <div class="top">
                            <h3>Premium</h3>
                            <span>For enormous Company</span>
                        </div>
                        <div class="middle">
                            <h4><span class="span-left">$</span> 560/ <span class="span-right">Month</span></h4>
                        </div>
                        <div class="end">
                            <ul>
                                <li>Unlimited Job Categories</li>
                                <li>Unlimited Job Posting</li>
                                <li>Unlimited proposals</li>
                                <li>Resume database access</li>
                                <li>Individually written job ads</li>
                            </ul>
                            <a class="cmn-btn" href="index-3.html#">
                                Get Started
                                <i class='bx bx-plus'></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="pricing-item">
                        <div class="top">
                            <h3>Advanced</h3>
                            <span>For companies under 400</span>
                        </div>
                        <div class="middle">
                            <h4><span class="span-left">$</span> 399/ <span class="span-right">Month</span></h4>
                        </div>
                        <div class="end">
                            <ul>
                                <li>400 Job Posting</li>
                                <li>90 Job Categories</li>
                                <li>Unlimited proposals</li>
                                <li>Resume database access</li>
                                <li>Individually written job ads</li>
                            </ul>
                            <a class="cmn-btn" href="index-3.html#">
                                Get Started
                                <i class='bx bx-plus'></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="pricing-item">
                        <div class="top">
                            <h3>Basic</h3>
                            <span>For companies under 80</span>
                        </div>
                        <div class="middle">
                            <h4><span class="span-left">$</span> 150/ <span class="span-right">Month</span></h4>
                        </div>
                        <div class="end">
                            <ul>
                                <li>50 Job Posting</li>
                                <li>20 Job Categories</li>
                                <li>Unlimited proposals</li>
                                <li>Resume database access</li>
                                <li><del>Individually written job ads</del></li>
                            </ul>
                            <a class="cmn-btn" href="index-3.html#">
                                Get Started
                                <i class='bx bx-plus'></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="pricing-item">
                        <div class="top">
                            <h3>Free</h3>
                            <span>For companies under 10</span>
                        </div>
                        <div class="middle">
                            <h4><span class="span-left">$</span> 100/ <span class="span-right">Month</span></h4>
                        </div>
                        <div class="end">
                            <ul>
                                <li>10 Job Posting</li>
                                <li>15 Job Categories</li>
                                <li>Unlimited proposals</li>
                                <li><del>Resume database access</del></li>
                                <li><del>Individually written job ads</del></li>
                            </ul>
                            <a class="cmn-btn" href="index-3.html#">
                                Get Started
                                <i class='bx bx-plus'></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Pricing -->

    <!-- Partner -->
    <div class="partner-area two pb-70">
        <div class="container">
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
                    <span class="sub-title">Testimonials</span>
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
@endsection