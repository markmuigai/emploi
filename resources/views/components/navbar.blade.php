
<nav class="navbar fixed-top navbar-expand-lg">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fas fa-bars"></span>
        </button>
        <a class="navbar-brand" href="/"><img src="{{ asset('images/logo-alt.png') }}" alt="Emploi Logo" /></a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mr-0">
                <!-- EMPLOYER SIDEBAR -->
                @if( isset(Auth::user()->id) && Auth::user()->role == 'employer' )
                <li class="nav-item d-md-none d-block">
                    <a class="nav-link" href="/v2/employers/dashboard">{{ __('other.dashboard') }}</a>
                </li>
                <li class="nav-item d-md-none d-block">
                    <a class="nav-link" href="/profile">{{ __('other.profile') }}</a>
                </li>
                <li class="nav-item d-md-none d-block">
                    <a class="nav-link" href="/employers/jobs">{{ __('other.jobs') }}</a>
                </li>
                <li class=" nav-item d-md-none d-block">
                    <a class="nav-link" href="/employers/browse">{{ __('other.browse_can') }}</a>
                </li>
                <li class=" nav-item d-md-none d-block">
                    <a class="nav-link" href="/employers/saved">{{ __('other.saved_ps') }}</a>
                </li>
                <li class=" nav-item d-md-none d-block">
                    <a class="nav-link" href="/employers/cv-requests">{{ __('other.r_profiles') }}</a>
                </li>
                <!-- EMPLOYER SIDEBAR -->

                <!-- JOB SEEKER SIDEBAR -->
                @elseif( isset(Auth::user()->id) && Auth::user()->role == 'seeker' )
                <li class="nav-item d-md-none d-block">
                    <a class="nav-link" href="/job-seekers/dashboard">{{ __('other.dashboard') }}</a>
                </li>
                <li class="nav-item d-md-none d-block">
                    <a class="nav-link" href="/profile">{{ __('other.profile') }}</a>
                </li>
                <li class="nav-item d-md-none d-block">
                    <a class="nav-link" href="/profile/applications">{{ __('other.applications') }}</a>
                </li>
                <li class="nav-item d-md-none d-block">
                    <a class="nav-link" href="/profile/referees">{{ __('other.referees') }}</a>
                </li>
                <!-- END OF JOB SEEKER SIDEBAR -->

                <!-- ADMIN SIDEBAR -->
                @elseif( isset(Auth::user()->id) && Auth::user()->role == 'admin' )
                <li class="nav-item d-md-none d-block">
                    <a class="nav-link" href="/admin/panel">{{ __('other.dashboard') }}</a>
                </li>
                <li class="nav-item d-md-none d-block">
                    <a class="nav-link" href="/admin/posts">Job Posts</a>
                </li>
                <li class="nav-item d-md-none d-block">
                    <a class="nav-link" href="/admin/cv-requests">CV Requests</a>
                </li>
                <li class="nav-item d-md-none d-block">
                    <a class="nav-link" href="/admin/blog">All Blogs</a>
                </li>
                <li class="nav-item d-md-none d-block">
                    <a class="nav-link" href="/admin/emails">Profile</a>
                </li>
                <li class="nav-item d-md-none d-block">
                    <a class="nav-link" href="/profile">Send Emails</a>
                </li>
                @else
                @endif
               <li class="nav-item">
                    <a class="nav-link" href="/v2/vacancies">{{ __('jobs.vacancies') }}</a>
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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Career Center
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/blog">Blogs</a>
                        <a class="dropdown-item" href="/v2/media">Media</a>
                    </div>
                </li>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/events">Events</a>
                </li>
                <!-- END OF ADMIN SIDEBAR -->

                @if(isset(Auth::user()->id) && Auth::user()->role == 'employer')
                @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ __('other.job_seekers') }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a href="/v2/job-seekers/cv-editing/create" class="dropdown-item">Professional CV Editing</a>
                        <a href="/job-seekers/services" class="dropdown-item">Job Seeker Services</a>
                        <a href="/v2/cv-review/create" class="dropdown-item">Automatic CV Review</a>                 
                        <a href="/v2/assessment/about" class="dropdown-item">Self Assessment</a>                      
                        <a href="/job-seekers/paas" class="dropdown-item">Golden Club</a>  
                    </div>
                </li>
                @endif
                @if(isset(Auth::user()->id) && Auth::user()->role == 'seeker')
                @else

                <li class="nav-item dropdown">                  
                        <li class="nav-item">
                    <a class="nav-link" href="/v2/employers/advertise-here">Employers</a>
                </li>                
                @endif

                @if(isset(Auth::user()->id) && Auth::user()->role == 'super-admin')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Super Admin
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                       <!--  <a class="dropdown-item" href="/desk/documentation">Documentation</a> -->
                        <a class="dropdown-item" href="/desk/create-admin">Create Admins</a>
                        <a class="dropdown-item" href="/desk/admins">Manage Admins</a>
                    </div>
                </li>
                @else
                @endif

                @if(isset(Auth::user()->id))
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-bell"></i></a>
                </li> -->
                @else
                <li class="nav-item">
                    <a href="/login" class="btn btn-white px-3">{{ __('auth.login') }}</a>
                </li>
                <li class="nav-item">
                    <a href="/join" class="btn btn-orange px-3">{{ __('auth.register') }}</a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#searchModal"><i class="fas fa-search"></i></a>
                </li>

                @if(isset(Auth::user()->id))
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ Auth::user()->getPublicAvatarUrl() }}" class="profile-avatar" alt="Profile">
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg-right dropdown-menu-left" aria-labelledby="navbarDropdown">
                        
                        @if(Auth::user()->canHandleCvEdits())
                        <a class="dropdown-item" href="/cv-editing">CV Edit Requests (
                            {{ count(App\CvEditRequest::where('cv_editor_id',Auth::user()->cvEditor->id)->where('submitted_on',null)->get()) }})</a>
                        @endif
                        @if(Auth::user()->role == 'admin')
                        <a class="dropdown-item" href="/admin/how-to">Admin {{ __('other.faqs') }}</a>
                        @endif
                        @if(Auth::user()->canUseBloggingPanel())
                            <a class="dropdown-item" href="/my-blogs">Blogging Panel</a>
                        @endif

                        <?php
                            $product = session('product');
                            if(isset($product))
                                print '<a class="dropdown-item" href="/checkout">Checkout (1)</a>';
                        ?>

                        <a class="dropdown-item" href="/home"><strong>{{ __('other.dashboard') }}</strong></a>
                        <a class="dropdown-item" href="/profile">{{ __('other.profile') }}</a>
                        <a class="dropdown-item" href="/logout">{{ __('auth.logout') }}</a>
                    </div>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<script type="text/javascript">
    $(document).ready(function() {
        $(function() {
            $(window).scroll(function() {
                var $nav = $(".navbar");
                $nav.toggleClass('scrolled', $(this).scrollTop() > 70);
            })
        });
    });
</script>

@include('components.search-modal')

@include('v2.components.modals.self-assessment')
