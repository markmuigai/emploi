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
                    <a class="nav-link" href="/employers/dashboard">Dashboard</a>
                </li>
                <li class="nav-item d-md-none d-block">
                    <a class="nav-link" href="/profile">Profile</a>
                </li>
                <li class="nav-item d-md-none d-block">
                    <a class="nav-link" href="/employers/jobs">Jobs</a>
                </li>
                <li class=" nav-item d-md-none d-block">
                    <a class="nav-link" href="/employers/browse">Browse Candidates</a>
                </li>
                <li class=" nav-item d-md-none d-block">
                    <a class="nav-link" href="/employers/saved">Saved Profiles</a>
                </li>
                <li class=" nav-item d-md-none d-block">
                    <a class="nav-link" href="/employers/cv-requests">Requested Profiles</a>
                </li>
                <!-- EMPLOYER SIDEBAR -->

                <!-- JOB SEEKER SIDEBAR -->
                @elseif( isset(Auth::user()->id) && Auth::user()->role == 'seeker' )
                <li class="nav-item d-md-none d-block">
                    <a class="nav-link" href="/job-seekers/dashboard">Dashboard</a>
                </li>
                <li class="nav-item d-md-none d-block">
                    <a class="nav-link" href="/profile">Profile</a>
                </li>
                <li class="nav-item d-md-none d-block">
                    <a class="nav-link" href="/profile/applications">Applications</a>
                </li>
                <li class="nav-item d-md-none d-block">
                    <a class="nav-link" href="/profile/referees">Referees</a>
                </li>
                <!-- END OF JOB SEEKER SIDEBAR -->

                <!-- ADMIN SIDEBAR -->
                @elseif( isset(Auth::user()->id) && Auth::user()->role == 'admin' )
                <li class="nav-item d-md-none d-block">
                    <a class="nav-link" href="/admin/panel">Dashboard</a>
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
                    <a class="nav-link" href="/vacancies">Vacancies</a>
                </li>
                <li class="nav-item">
                    @guest
                    <a class="nav-link" href="/companies?hiring=true">See Who's Hiring</a>
                    @else

                    @if(Auth::user()->role == 'employer')
                    <a class="nav-link" href="/employers/browse">Candidates</a>
                    @else
                    <a class="nav-link" href="/companies?hiring=true">See Who's Hiring</a>
                    @endif

                    @endguest


                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/blog">Career Center</a>
                </li>
                <!-- END OF ADMIN SIDEBAR -->

                @if(isset(Auth::user()->id) && Auth::user()->role == 'seeker')
                @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Employers
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <!-- <a class="dropdown-item" href="/employers/dashboard">Dashboard</a> -->
                        <a class="dropdown-item" href="/employers/browse">Browse CVs</a>
                        <a class="dropdown-item" href="/employers/publish">Advertise Jobs</a>
                        <a class="dropdown-item" href="/employers/premium-recruitment">Premium Recruitment</a>
                        <a class="dropdown-item" href="/employers/services">All Services</a>
                        @guest
                        @else
                        <a class="dropdown-item" href="/companies/create">Add A Company</a>
                        @endguest
                        
                        
                        
                        <!-- <a class="dropdown-item" href="/employers/rate-card">Rate Card</a> -->
                        <!-- <a class="dropdown-item" href="#">Candidate Vetting</a> -->
                        <!-- <a class="dropdown-item" href="#">HR Services</a> -->
                        <!-- <a class="dropdown-item" href="/mass-recruitment">Mass Recruitment</a>
                        <a class="dropdown-item" href="/employers/register">Employer Registration</a>
                        <a class="dropdown-item" href="/employers/faqs">Employer FAQs</a>
                        <a class="dropdown-item" href="/employers/rate-card">Rate Card</a> -->
                        <!-- <a class="dropdown-item" href="/employers/role-suitability-index">Role Suitability Index</a> -->
                    </div>
                </li>
                @endif
                @if(isset(Auth::user()->id) && Auth::user()->role == 'employer')
                @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Job Seekers
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/job-seekers/services">All Services</a>
                        <a class="dropdown-item" href="/register">Upload CV</a>
                        <a class="dropdown-item" href="/job-seekers/cv-editing">CV Editing</a>
                        <a class="dropdown-item" href="/job-seekers/cv-templates">CV Templates</a>
                        <a class="dropdown-item" href="/job-seekers/premium-placement">Premium Placement</a>
                        <a class="dropdown-item" href="/job-seekers/faqs">FAQs</a>
                    </div>
                </li>
                @endif

                @if(isset(Auth::user()->id) && Auth::user()->role == 'super-admin')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Super Admin
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <!-- <a class="dropdown-item" href="/desk/documentation">Documentation</a> -->
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
                    <a href="/login" class="btn btn-white px-3">Login</a>
                </li>
                <li class="nav-item">
                    <a href="/join" class="btn btn-orange px-3">Register</a>
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
                        @guest
                            <a class="dropdown-item" href="/login">Login</a>
                            <a class="dropdown-item" href="/join">Create Profile</a>
                            <a class="dropdown-item" href="/contact">Contact Us</a>
                        @else
                            @if(Auth::user()->canHandleCvEdits())
                            <a class="dropdown-item" href="/cv-editing">Edit Cvs (
                                {{ count(App\CvEditRequest::where('cv_editor_id',Auth::user()->cvEditor->id)->where('submitted_on',null)->get()) }})</a>
                            @endif
                            @if(Auth::user()->role == 'admin')
                            <a class="dropdown-item" href="/admin/how-to">Admin FAQs</a>
                            @endif
                            @if(Auth::user()->canUseBloggingPanel())
                            <a class="dropdown-item" href="/my-blogs">Blogging Panel</a>
                            @endif

                            <?php
                                $product = session('product');
                                if(isset($product))
                                    print '<a class="dropdown-item" href="/checkout">Checkout (1)</a>';
                            ?>

                            <a class="dropdown-item" href="/home"><strong>Dashboard</strong></a>
                            <a class="dropdown-item" href="/profile">View Profile</a>
                            <a class="dropdown-item" href="/logout">Logout</a>
                        @endguest
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
