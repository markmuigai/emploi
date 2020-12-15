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
                            <a href="#" class="nav-link dropdown-toggle">Career Centre
                                <i class='bx bx-chevron-down'></i></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="/blog">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/v2/media">Media</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/employers/publish">Advertise</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>