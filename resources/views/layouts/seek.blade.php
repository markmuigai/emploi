<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<title>@yield('title')</title>
	@include('components.meta')

	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link href="{{ asset('css/bootstrap-3.1.1.min.css') }}" rel='stylesheet' type='text/css'  rel="preload"/>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	
	<script src="{{ asset('js/custom.js') }}"></script>
	<!-- ChartJS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css"  rel="preload"/>
	<!-- Custom Theme files -->
	<link href="{{ asset('css/style.css') }}" rel='stylesheet' type='text/css'  rel="preload" />
	<link href='//fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
	<!--font-Awesome-->
	<link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet" rel="preload">
	<link href="{{ asset('css/custom.css') }}" rel='stylesheet' type='text/css'  rel="preload"/>

	<!--font-Awesome-->
	<!-- Notify JS Notifications -->
    <script type="text/javascript" src="{{asset('js/notify.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/emploi-notify.js')}}"></script>
</head>

<body style="font-family: Calibri">
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0"></script>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/"><img src="{{ asset('images/logo.png') }}" alt="Emploi Logo" /></a>
			<!--/.navbar-header-->
			<div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" style="height: 1px;">
				<ul class="nav navbar-nav">

					<li><a href="/vacancies">Vacancies</a></li>

					@if (Route::getCurrentRoute() != null && Route::getCurrentRoute()->uri() != '/')
					<li><a href="/">Home</a></li>
					@else
					<li><a href="/blog">Career Centre</a></li>
					@endif
					<li class="dropdown" style="display: none">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">About<strong class="caret"></strong></a>
						<ul class="dropdown-menu multi-column columns-3">
							<div class="row">
								<div class="col-sm-4">
									<ul class="multi-column-dropdown">
										<li><a href="/about">About Us</a></li>

										<li><a href="/contact">Contact Us</a></li>

									</ul>
								</div>
								<div class="col-sm-4">
									<ul class="multi-column-dropdown">
										<li><a href="/employers/publish" style="font-weight: bold">Advertise a Job</a></li>
										<li><a href="/blog">Career Centre</a></li>

									</ul>
								</div>
								<div class="col-sm-4">
									<ul class="multi-column-dropdown">
										<li><a href="/terms-and-conditions">Terms & Conditions</a></li>
										<li><a href="/privacy-policy">Privacy Policy</a></li>
									</ul>
								</div>
							</div>
						</ul>
					</li>

					@if(isset(Auth::user()->id) && Auth::user()->role == 'seeker')
					@else
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Employers<strong class="caret"></strong></a>
						<ul class="dropdown-menu">
							@if(isset(Auth::user()->id) && Auth::user()->role == 'employer')
							<li><a href="/employers/dashboard">Dashboard</a></li>
							@endif
							<li><a href="/employers/services">All Services</a></li>
							<li><a href="/employers/browse">Browse CVs</a></li>
							<li><a href="/employers/publish" style="font-weight: bold;">Advertise Jobs</a></li>
							<li><a href="/employers/premium-recruitment">Premium Recruitment</a></li>
							<li><a href="/employers/candidate-vetting" style="display: none">Candidate Vetting</a></li>
							<li><a href="/employers/hr-services" style="display: none">HR Services</a></li>
							<li><a href="/employers/register">Create Profile</a></li>
							<li><a href="/mass-recruitment">Mass Recruitment</a></li>
							<li><a href="/employers/role-suitability-index" style="font-weight: bold;">Role Suitability Index</a></li>
						</ul>
					</li>
					@endif
					@if(isset(Auth::user()->id) && Auth::user()->role == 'employer')
					@else
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Job Seekers<strong class="caret"></strong></a>
						<ul class="dropdown-menu">
							<li><a href="/job-seekers/services">All Services</a></li>
							<li><a href="/register" style="font-weight: bold;">Upload CV</a></li>

							<li><a href="/job-seekers/cv-editing">CV Editing</a></li>
							<li><a href="/job-seekers/cv-templates">CV Templates</a></li>

							<li><a href="/job-seekers/premium-placement">Premium Placement</a></li>
							<li><a href="/vacancies">Vacancies</a></li>
							<li><a href="/blog">Career Centre</a></li>
							@guest

							<li><a href="/blog">Career Centre</a></li>
							@else
							@endguest
						</ul>
					</li>
					@endif
					@if(isset(Auth::user()->id))
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #ff5e00; font-weight: bold">My Account<strong class="caret"></strong></a>
						<ul class="dropdown-menu">
							<li><a href="/home">Dashboard</a></li>
							<li><a href="/profile">Profile</a></li>
							@if(Auth::user()->role == 'seeker')
							<li><a href="/profile/edit" @if(!Auth::user()->seeker->hasCompletedProfile())
									style="color: red; font-weight: bold"
									@endif
									>Edit Profile</a></li>
							<li><a href="/profile/applications">My Applications ({{ count(Auth::user()->applications) }})</a></li>
							<li><a href="/job-seekers/services">Job Seeker Services</a></li>
							@endif
							<li><a href="/logout">Logout</a></li>
						</ul>
					</li>
					@else
					<li><a href="/login">{{ __('auth.login') }}</a></li>
					<li><a href="/join" style="color: #ff5e00; font-weight: bold">{{ __('auth.register') }}</a></li>
					@endif
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
		<!--/.navbar-collapse-->
	</nav>
	<!-- Content -->
	@yield('content')
	<!-- Content -->
	<div class="footer" style="display: none">
		<div class="container ">
			<div class="row">
				<div class="col-md-4 grid_3">
					<h4>Services</h4>
					<ul class="f_list f_list1">
						<li><a href="/register">Upload CV</a></li>
						<li><a href="/job-seekers/cv-editing">CV Editing</a></li>
						<li style="display: none;"><a href="/employers/publish">Advertise</a></li>
						<li><a href="/contact">Contact</a></li>
					</ul>
					<ul class="f_list">
						<li><a href="/employers/browse">Browse CVs</a></li>
						<li><a href="/employers/candidate-vetting">Candidate Vetting</a></li>
						<li style="display: none;"><a href="/blog">Blog</a></li>
						<li><a href="/employers/hr-services" style="display: none;">HR Services</a></li>
					</ul>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-4 grid_3">
					<h4>Featured Jobs</h4>
					<div class="footer-list">
						<ul>
							@forelse(\App\Post::featured(3) as $post)
							<li>
								<p><span class="yellow"><a href="{{ url('/vacancies/'.$post->slug) }}">{{ $post->title }}</a></span> {{ $post->location->country->currency }} {{ $post->monthly_salary }}</p>
							</li>
							@empty

							@forelse(\App\Post::recent(3) as $post)
							<li>
								<p><span class="yellow"><a href="{{ url('/vacancies/'.$post->slug) }}">{{ $post->title }}</a></span> in {{ $post->location->name }} </p>
							</li>
							@empty
							@endforelse

							@endforelse


						</ul>
					</div>
				</div>
				<div class="col-md-4 grid_3 no-mobile">
					<h4>Job Seekers</h4>
					<p>At the core of our systems is a vacancy – job seeker matching engine powered by algorithms for job seeker assessment and ranking together with advanced recruitment process management tools.</p>
				</div>
				<div class="col-md-3 grid_3 hidden">
					<h4>Sign up for our newsletter</h4>
					<p style="display: none;">World-class Publications for your growth</p>
					<form method="post" action="/subscribe">
						<input type="email" name="email" required="required" class="form-control" placeholder="Enter your email">
						<input type="submit" style="background-color: #ff5e00 " class="btn red" name="" value="Subscribe now!">
					</form>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="footer_bottom">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-3 col-xs-4">
					<h4>MENU</h4>
					<ul class="f_list2">
						<li><a href="/about">About Us</a></li>
						<li><a href="/blog">Career Centre</a></li>
						<li><a href="/join">{{ __('auth.register') }}</a></li>
						<li><a href="/employers/publish">Advertise</a></li>
						<li><a href="/vacancies">Vacancies</a></li>
						<li><a href="/contact">Contact Us</a></li>
					</ul>
				</div>
				<div class="col-md-6 col-sm-5 col-xs-8 location">
					<h4>FIND US</h4>
					<div class="row">
						<div class="col-xs-2 col-sm-2">
							<i class="fa fa-map-marker"></i>
						</div>
						<div class="col-xs-10 col-sm-10">
							<p>Even Business Park, Airport North Rd, Nairobi</p>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-xs-2 col-sm-2">
							<i class="fa fa-envelope"></i>
						</div>
						<div class="col-xs-10 col-sm-10">
							<a href="mailto:info@emploi.co">info@emploi.co</a>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-xs-2 col-sm-2">
							<i class="fa fa-phone"></i>
						</div>
						<div class="col-xs-10 col-sm-10">
							<a href="tel:+254702068282">+254 702 068 282</a>
						</div>
					</div>
					<div class="hidden-social">
						<a href="https://www.facebook.com/emploi.co/" target="_blank" rel="noreferrer"><i class="fa fa-facebook"></i></a>
						<a href="https://twitter.com/emploike" target="_blank" rel="noreferrer"><i class="fa fa-twitter"></i></a>
						<a href="https://ke.linkedin.com/company/emploike" target="_blank" rel="noreferrer"><i class="fa fa-linkedin"></i></a>
						<a href="https://instagram.com/emploi.co" target="_blank" rel="noreferrer"><i class="fa fa-instagram"></i></a>
					</div>
				</div>
				<div class="col-md-3 col-sm-4 social">
					<h4>SOCIAL</h4>
					<a href="https://www.facebook.com/emploi.co/" target="_blank" rel="noreferrer"><i class="fa fa-facebook"></i></a>
					<a href="https://twitter.com/emploike" target="_blank" rel="noreferrer"><i class="fa fa-twitter"></i></a>
					<a href="https://ke.linkedin.com/company/emploike" target="_blank" rel="noreferrer"><i class="fa fa-linkedin"></i></a>
					<a href="https://instagram.com/emploi.co" target="_blank" rel="noreferrer"><i class="fa fa-instagram"></i></a>
				</div>
			</div>
			<div class="clearfix"> </div>
			<div class="copy">
				<p>Copyright © {{ date('Y') }} Emploi . All Rights Reserved </p>
			</div>
		</div>
	</div>
	@include('components.tawk')
	<script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@12.4.0/dist/lazyload.min.js"></script>
	<script type="text/javascript">
        var lazyLoadInstance = new LazyLoad({
            elements_selector: ".lazy"
            // ... more custom settings?
        });
        lazyLoadInstance.update();
    </script>
    @include('components.onesignal')
    @include('components.vue')
    <script src="{{ asset('js/online-monitor-2.js') }}" async="" defer=""></script>
    @include('components.exit-popup')
</body>

</html>
