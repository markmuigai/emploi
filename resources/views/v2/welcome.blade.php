@extends('v2.layouts.app')

@section('title','Latest Job Vacancies - Companies Hiring and Job Advertisements :: Welcome to Emploi')

@section('content')
    <!-- Navbar -->
    @include('v2.components.guest.navbar')
    <!-- End Navbar -->

    @include('v2.components.main-banner')

    <!-- Who we are -->
    <div class="card">
    <div class="new-area pt-100 pb-70">
        <div class="container text-center">
            <div class="about-content">
                <div class="section-title">
                    <strong>
                        <span class="sub-title">Career Opportunities</span>
                    </strong>
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
</div>
    <!-- End Who we are -->

    <!-- CV Editing -->
    <section class="explore-area ptb-100">
        <div class="container">
            <div class="explore-item">
                <div class="section-title">
                    <strong>
                        <span class="sub-title">CV Writing Services</span>
                    </strong>
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
            <div class="section-title text-center">
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
                    <a href="/v2/vacancies">
                        <div class="work-item">
                            <i class="flaticon-comment"></i>
                            <span>03</span>
                            <h3>{{ __('jobs.j_vacays') }}</h3>
                            <p>{{ __('jobs.j_vacays_txt') }}</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Services -->

    <!-- Featured Jobs -->
    <section class="company-area two pb-2">
        <div class="container-fluid">
            <div class="section-title two">
                <h2>{{ __('jobs.f_jobs') }}</h2>
            </div>
            <div class="company-slider owl-theme owl-carousel">
                @include('v2.components.featured-jobs')
            </div>
            <div class="job-browse pt-3">
                <a class="cmn-btn mb-2" href="/v2/vacancies">
                    View All Jobs
                    <i class='bx bx-briefcase-alt'></i>
                </a>
                <a class="cmn-btn" href="/vacancies/featured">
                    Featured Vacancies
                    <i class='bx bx-star' ></i>
                </a>
            </div>
        </div>
    </section>
    <!-- End Featured Jobs -->

    <!-- Blog -->
    <section class="blog-area three pt-5 pb-3">
        <div class="container">
            <div class="section-title three">
                <h2>Blog & News 1</h2>
            </div>
            @include('v2.components.blogs')<br>
            <div class="d-flex justify-content-center">
                <a class="text-`center cmn-btn" href="/blog">
                    View All Blogs
                    <i class='bx bx-book-reader'></i>
                </a>
            </div>
        </div>
    </section>
    <!-- End Blog -->


        <!-- Location -->
        <section class="location-area pb-70 mt-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <h2>Blog & News 2</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="location-slider owl-theme owl-carousel">
                    <?php
                        $blogs = \App\Blog::where('status','active')->orderBy('created_at', 'desc')->take(6)->get();
                    ?>
                    @foreach ($blogs as $b)
                        <div class="location-item">
                            <div class="top">
                                <a href="/blog/{{ $b->slug }}">
                                    <img src="https://emploi.co/storage/blogs/1601901614.jpg" alt="">
                                    {{-- <img src="/storage/blogs/{{ $b->image1 }}" alt="{{ $b->title }}"> --}}
                                </a>
                            </div>
                            <span>{{$b->postedOn}}</span>
                            <h3>
                                <a href="/blog/{{ $b->slug }}">{{ $b->title }}</a>
                            </h3>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center">
                    <a class="text-`center cmn-btn" href="/blog">
                        View All Blogs
                        <i class='bx bx-book-reader'></i>
                    </a>
                </div>
            </div>
        </section>
        <!-- End Location -->

    <!-- Testimonial -->
    {{-- <section class="testimonial-area pt-5 pb-100">
        <div class="container">
            <div class="section-title two text-center">
                <h2>Testimonials</h2>
            </div>
            <div class="testimonial-slider owl-theme owl-carousel">
                <div class="testimonial-item">
                    <img src="{{asset('images/testimonials/kizito.webp')}}" alt="Kipkemoi">
                    <p>Emploi helped me define exactly what it is I was looking for and they even went further And gave me an opportunity of getting there.</p>
                    <h3>Kipkemoi Kizito</h3>
                    <span>Job Seeker</span>
                </div>
                <div class="testimonial-item">
                    <img src="{{asset('images/testimonials/sandra.webp')}}" alt="Sandra">
                    <p>Working with Emploi was an enabling experience. They work with a schedule and to rubber stamp it all they are reputable.</p>
                    <h3>Sandra Eshitemi</h3>
                    <span>Employer</span>
                </div>
                <div class="testimonial-item">
                    <img src="{{asset('images/testimonials/fay.webp')}}" alt="Faith">
                    <p>The Emploi Team creates a great rapport with their candidates and is an invaluable asset to anyone looking for a job.</p>
                    <h3>Faith Chepkemoi</h3>
                    <span>Job Seeker</span>
                </div>
                <div class="testimonial-item">
                    <img src="{{asset('/images/testimonials/linda.png')}}" alt="Linda">
                    <p>I highly recommend Emploi to anyone not making progress in their job search in the current market.</p>
                    <h3>Linda Isuyi</h3>
                    <span>Job Seeker</span>
                </div>
                <div class="testimonial-item">
                    <img src="{{asset('/images/testimonials/earnest.png')}}" alt="Earnest">
                    <p>I wish to appreciate the good work done by Emploi CV writing team for putting together an enticing resume. I have sought CV writing services with other companies since 2017 but still went a long time without a job. </p>
                    <h3>Earnest Chege</h3>
                    <span>Job Seeker</span>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- End Testimonial -->

<!-- our product-->
<br>
@if(Auth::user())
<section class="container my-5">
    <div class="row">
        <div class="col-md-6 mb-4">
          <div class="card shadow" id="paas">
            <div class="card-body">
              <h2 class="card-title pb-2">PaaS</h2>
              <h5 class="card-text"> Get qualified part time professionals on demand.</h5>
            </div>
                 <div class="card-footer">
                     <a href="/job-seekers/paas" class="btn btn-orange">Visit Page</a>
                </div>       
          </div>
        </div>
        <div class="col-md-6 mb-4">
          <div class="card shadow" id="summit">
            <div class="card-body">
              <h2 class="card-title pb-2">Career Summit</h2>
              <h5 class="card-text">Get coaching and support that will get you a job where you will thrive not just survive.</h5>
            </div>
            <div class="card-footer">
                <a href="/job-seekers/summit" class="btn btn-orange">Visit Page</a>
            </div>
          </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card shadow" id="spotlight">
              <div class="card-body">
                <h2 class="card-title pb-2">Spotlight</h2>
                <h5 class="card-text">Get to appear top in all search lists.</h5>
              </div>
              <div class="card-footer">
                  <a href="/job-seekers/services" class="btn btn-orange">Visit Page</a>
              </div>
            </div>
          </div>

          <div class="col-md-6 mb-4">
            <div class="card shadow" id="pro">
              <div class="card-body">
                <h2 class="card-title pb-2">Pro Package</h2>
                <h5 class="card-text">Get real-time notification updates.</h5>
              </div>
              <div class="card-footer">
                  <a href="/job-seekers/services" class="btn btn-orange">Visit Page</a>
              </div>
            </div>
          </div>
          
      </div>

</section>

@else
<section class="container-fluid container">
    <div class="row">
        <div class="col-md-6 mb-4">
          <div class="card shadow" id="seeker_paas">
            <div class="card-body">
              <h2 class="card-title pb-2">PaaS</h2>
              <h5 class="card-text"> Get qualified part time professionals on demand.</h5>
            </div>
                 <div class="card-footer">
                     <a href="/job-seekers/paas" class="btn btn-orange">Visit Page</a>
                </div>       
          </div>
        </div>
        <div class="col-md-6 mb-4">
          <div class="card shadow" id="seeker_summit">
            <div class="card-body">
              <h2 class="card-title pb-2">Career Summit</h2>
              <h5 class="card-text">Get coaching and support that will get you a job where you will thrive not just survive.</h5>
            </div>
            <div class="card-footer">
                <a href="/job-seekers/summit" class="btn btn-orange">Visit Page</a>
            </div>
          </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card shadow" id="seeker_spotlight">
              <div class="card-body">
                <h2 class="card-title pb-2">Spotlight</h2>
                <h5 class="card-text">Get to appear top in all search lists.</h5>
              </div>
              <div class="card-footer">
                  <a href="/job-seekers/services" class="btn btn-orange">Visit Page</a>
              </div>
            </div>
          </div>

          <div class="col-md-6 mb-4">
            <div class="card shadow" id="seeker_pro">
              <div class="card-body">
                <h2 class="card-title pb-2">Pro Package</h2>
                <h5 class="card-text">Get real-time notification updates.</h5>
              </div>
              <div class="card-footer">
                  <a href="/job-seekers/services" class="btn btn-orange">Visit Page</a>
              </div>
            </div>
          </div>
          
      </div>
</section>
@endif
<!-- End of our products-->

@endsection