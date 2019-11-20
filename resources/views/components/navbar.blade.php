<!-- NAVBAR -->
<nav class="navbar fixed-top navbar-expand-lg">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fas fa-bars"></span>
        </button>
        <a class="navbar-brand" href="/"><img src="{{ asset('images/logo.png') }}" alt="Emploi Logo" /></a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ml-auto mr-0">
                <li class="nav-item d-md-none d-block">
                    <a class="nav-link" href="/employers/dashboard">Dashboard</a>
                </li>
                <li class="nav-item d-md-none d-block"><a class="nav-link" href="/employers/jobs">Jobs</a></li>
                <li class=" nav-item d-md-none d-block">
                    <a class="nav-link" href="#v-pills-messages">Candidates</a>
                </li>
                <li class="nav-item d-md-none d-block">
                    <a class="nav-link" href="#v-pills-settings">Test Center</a>
                </li>
                <li class="nav-item d-md-none d-block">
                    <a class="nav-link" href="#v-pills-reviews">Reviews</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/vacancies">Vacancies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/blog">Career Center</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/companies?hiring=true">See Who's Hiring</a>
                </li>
                <div class="d-md-flex">
                    @if(isset(Auth::user()->id))
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-bell"></i></a>
                    </li>
                    @else
                    <LI class="nav-item">
                        <a href="/login" class="nav-link btn btn-white px-3">Login</a>
                    </LI>
                    <LI class="nav-item">
                        <a href="/join" class="nav-link btn btn-orange px-3">Register</a>
                    </LI>
                    @endif
                    <!-- <li class="nav-item search-form hide">
                        <form action="" class="form-inline mt-2">
                            <input type="text" name="search" placeholder="Search" class="form-control" id="search">
                        </form>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" id="search-prompt" href="#"><i class="fas fa-search"></i></a>
                    </li>
                </div>
            </ul>
        </div>
        @if(isset(Auth::user()->id))
        <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{asset('images/avatar.png')}}" class="profile-avatar" alt="">
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                @guest
                    <a class="dropdown-item" href="/login">Login</a>
                    <a class="dropdown-item" href="/join">Create Profile</a>
                    <a class="dropdown-item" href="/contact">Contact Us</a>
                @else
                    <a class="dropdown-item" href="/home" style="font-weight: bold">Dashboard</a>
                    <a class="dropdown-item" href="/profile">View Profile</a>
                    <a class="dropdown-item" href="/logout">Logout</a>

                @endguest
                
            </div>
        </div>
        @endif
    </div>
</nav>
<!-- END OF NAVBAR -->
