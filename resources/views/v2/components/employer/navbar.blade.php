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
                            
                            <a href="/" class="nav-link">Home
                            </a>
                        </li>

                        <li class="nav-item">
                                                    
                            <a href="/post-a-job" class="nav-link">Advertise
                            </a>
                        </li>

                        <li class="nav-item">
                                                   
                            <a href="/employers/paas" class="nav-link">PaaS
                            </a>
                        </li>
              

                        <li class="nav-item">
                                                   
                            <a href="/employers/premium-recruitment" class="nav-link">Premium Recruitment
                            </a>
                        </li>

                        <li class="nav-item">
                                                   
                            <a href="/employers/services" class="nav-link">All Services
                            </a>
                        </li>

                        @if(isset(Auth::user()->id))
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-bell"></i></a>
                        </li> -->
                        @else
                            <li class="nav-item">
                                <a href="/v2/login" style="margin-right:0px !important" class="btn btn-login btn-orange btn-register btn-outline px-3">{{ __('auth.login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="/employers/register" style="padding-left" class="btn btn-login btn-orange btn-register btn-outline px-3">{{ __('auth.register') }}</a>
                            </li>
                        @endif
                        @auth
                        <li id="profile-menu-item" class="nav-item">
                            <img src="{{ Auth::user()->getPublicAvatarUrl() }}" height="30px" class="profile-avatar mp-3" alt="Profile">
                            <i class='bx bx-chevron-down text-white'></i>
                            <ul class="dropdown-menu">
                                @if(Auth::user()->role == 'admin')
                                    <li class="nav-item">
                                        <a class="nav-link" href="/admin/how-to">Admin {{ __('other.faqs') }}</a>
                                    </li>
                                @endif
                                @if(Auth::user()->canUseBloggingPanel())
                                    <li class="nav-item">
                                        <a class="nav-link" href="/my-blogs">Blogging Panel</a>
                                    </li>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link" href="/v2/home"><strong>{{ __('other.dashboard') }}</strong></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/profile">{{ __('other.profile') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/v2/logout">{{ __('auth.logout') }}</a>
                                </li>
                            </ul>
                        </li>
                        @endauth
                        @if(isset(Auth::user()->id) && Auth::user()->role == 'seeker')
                        @else                               
                            <li class="nav-item dropdown">                  
                                    <li class="nav-item">
                                    <span class="tooltip-span two">New</span>
                                <a id="forEmployers" class="nav-link" href="/register">For Jobseekers</a>
                            </li> 
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>