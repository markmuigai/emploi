<div class="navbar-area fixed-top">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="/v2" class="logo">
            <img src="{{ asset('images/logo-alt.png') }}" alt="emploi">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav three collapsed menu-shrink">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="/v2">
                    <img src="{{ asset('images/logo-alt.png') }}" alt="Emploi Logo" height="45px"/>
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <span class="tooltip-span">Hot</span>
                            
                            <a href="{{Route('v2.vacancies.index')}}" class="nav-link dropdown-toggle {{
                                request()->routeIs('v2.vacancies.index') ? 'active' : '' 
                                }}">Vacancies
                                <i class='bx bx-chevron-down'></i></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="/v2/vacancies">{{ __('jobs.vacancies') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a href="favourite-jobs.html" class="nav-link">Favourite Jobs</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/v2/self-assessments/create" class="nav-link">Self Assessment</a>
                                </li>
                                <li class="nav-item">
                                    <a href="post-a-job.html" class="nav-link">Post A Job</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            @guest
                                <a class="nav-link" href="/companies?hiring=true">{{ __('jobs.whos_hiring') }}</a>
                            @else
                            @if(Auth::user()->role == 'employer')
                                <a class="nav-link" href="/employers/browse">{{ __('other.candidates') }}</a>
                            @else
                                <a class="nav-link" href="/companies?hiring=true">{{ __('jobs.whos_hiring') }}</a>
                            @endif
                            @endguest
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/blog">{{ __('blog.c_centre') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/events">Events</a>
                        </li>
                        @if(isset(Auth::user()->id) && Auth::user()->role == 'employer')
                        @else
                            <li class="nav-item">
                                <span class="tooltip-span two">New</span>
                                <a href="index-3.html#" class="nav-link dropdown-toggle">{{ __('other.job_seekers') }} <i class='bx bx-chevron-down'></i></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="/job-seekers/services" class="nav-link">{{ __('other.a_services') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/job-seekers/summit" class="nav-link">Career Summit</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/job-seekers/paas" class="nav-link">Golden Club</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/register" class="nav-link">{{ __('jobs.u_cv') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/job-seekers/faqs" class="nav-link">{{ __('other.faqs') }}</a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        @if(isset(Auth::user()->id) && Auth::user()->role == 'seeker')
                        @else
                            <li class="nav-item">
                                <a href="index-3.html#" class="nav-link dropdown-toggle">{{ __('jobs.employers') }}<i class='bx bx-chevron-down'></i></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="/employers/browse" class="nav-link">{{ __('jobs.browse_cvs') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/employers/publish" class="nav-link">{{ __('jobs.advert_jobs') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/employers/premium-recruitment" class="nav-link">{{ __('jobs.p_recruit') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/employers/paas" class="nav-link">PaaS</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/employers/e-club" class="nav-link">E-Club</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/employers/services" class="nav-link">{{ __('other.a_services') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/companies/create" class="nav-link">{{ __('other.add_comp') }}</a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        @if(isset(Auth::user()->id))
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-bell"></i></a>
                        </li> -->
                        @else
                            <li class="nav-item">
                                <a href="/login" style="margin-right:0px !important" class="btn btn-login btn-white px-3">{{ __('auth.login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="/join" style="padding-left" class="btn btn-login btn-orange btn-register btn-outline px-3">{{ __('auth.register') }}</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>