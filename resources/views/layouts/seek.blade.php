<!DOCTYPE HTML>
<html>
<head>
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="@yield('description')" />
<link rel="icon" href="{{ asset('images/favicon.png') }}">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="{{ asset('css/bootstrap-3.1.1.min.css') }}" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
@if (config('app.env') === 'production')
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
@else
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
@endif

<!-- Custom Theme files -->
<link href="{{ asset('css/style.css') }}" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<!----font-Awesome----->
<link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet"> 
<style type="text/css">
	.hidden {
		display: none;
	}
	.dropdown {
		color: white;
	}
	.go-mobile {
		display: none;
	}
	.location-select {
		padding: 0.43em; background-color: white
	}
	@media only screen and (max-width: 400px) {
		.no-mobile {
			display: none;
		}
		.go-mobile {
			display: inline;
		}

		.location-select {
			padding: 0.25em; background-color: white
		}
	}
	
</style>
<!----font-Awesome----->
</head>
<body>
	<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0"></script>

<nav class="navbar navbar-default" role="navigation">
	<div class="container">
	    <div class="navbar-header">
	        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
	        </button>
	        <a class="navbar-brand" href="/"><img src="{{ asset('images/logo.png') }}" alt="Emploi Logo"/></a>
	    </div>
	    <!--/.navbar-header-->
	    <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" style="height: 1px;">
	        <ul class="nav navbar-nav">
	        	
		        <li class="dropdown">
		            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: white">Jobs<b class="caret"></b></a>
		            <ul class="dropdown-menu">
			            <li><a href="/vacancies/featured" style="font-weight: bold;">Featured Jobs</a></li>
			            <li><a href="/vacancies">All Jobs</a></li>
			            @foreach(\App\VacancyType::all() as $v)
			            <li><a href="/vacancies/{{ $v->slug }}">{{ $v->name }}</a></li>
			            @endforeach
		            </ul>
		        </li>
		        @if (Route::getCurrentRoute()->uri() != '/')
				<li><a href="/" style="color: white">Home</a></li>
				@else
				<li><a href="/blog" style="color: white">Career Centre</a></li>
				@endif
		        <li class="dropdown">
		        	<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: white">About<b class="caret"></b></a>
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
		            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: white">Employers<b class="caret"></b></a>
		             <ul class="dropdown-menu">
		             	@if(isset(Auth::user()->id) && Auth::user()->role == 'employer')
		             	<li><a href="/employers/dashboard">Dashboard</a></li>
		             	@endif
			            <li><a href="/employers/browse">Browse CVs</a></li>
			            <li><a href="/employers/publish" style="font-weight: bold;">Advertise Jobs</a></li>
			            <li><a href="/employers/premium-recruitment">Premium Recruitment</a></li>
			            <li><a href="/employers/candidate-vetting" style="display: none">Candidate Vetting</a></li>
			            <li><a href="/employers/hr-services" style="display: none">HR Services</a></li>
			            <li><a href="/employers/register">Create Profile</a></li>
			            <li><a href="/mass-recruitment">Mass Recruitment</a></li>
		             </ul>
		        </li>
		        @endif
		        @if(isset(Auth::user()->id) && Auth::user()->role == 'employer')
		        @else
		        <li class="dropdown">
		            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: white">Job Seekers<b class="caret"></b></a>
		            <ul class="dropdown-menu">
			            <li><a href="/register" style="font-weight: bold;">Upload CV</a></li>
			            <li><a href="/job-seekers/cv-editing">CV Editing</a></li>
			            <li><a href="/job-seekers/cv-templates">CV Templates</a></li>
			            
			            <li><a href="/job-seekers/premium-placement">Premium Placement</a></li>
			            <li><a href="/vacancies">Job Vacancies</a></li>
			            <li><a href="/blog">Career Centre</a></li>
			            @guest
			            <li><a href="/blog">Register Profile</a></li>
			            @else
			            <li><a href="/profile">My Profile</a></li>
			            @endguest
			            
		            </ul>
		        </li>
		        @endif
		        @if(isset(Auth::user()->id))
		        <li class="dropdown">
		        	<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #e88725; font-weight: bold">My Account<b class="caret"></b></a>
		        	<ul class="dropdown-menu">
	        			@if(Auth::user()->role != 'seeker')
	        			<li><a href="/home">Dashboard</a></li>
	        			@endif
	        			<li><a href="/profile">Profile</a></li>
	        			@if(Auth::user()->role == 'seeker')
	        			<li><a href="/profile/edit"
	        				@if(!Auth::user()->seeker->hasCompletedProfile())
	        				style="color: red; font-weight: bold"
	        				@endif
	        				>Edit Profile</a></li>
	        			@endif
	        			<li><a href="/logout">Logout</a></li>
		        	</ul>
	        	
		        </li>
		        @else
		        <li><a href="/login" style="color: white">Login</a></li>
		        <li><a href="/join" style="color: #e88725; font-weight: bold">Register</a></li>
		        @endif
		        
		        
	        </ul>
	    </div>
	    <div class="clearfix"> </div>
	  </div>
	    <!--/.navbar-collapse-->
	</nav>
@yield('content')
<div class="footer">
	<div class="container ">
		<div class="row">


			<div class="col-md-4 grid_3">
				<h4>Services</h4>
				<ul class="f_list f_list1">
					<li><a href="/register">Upload CV</a></li>
					<li><a href="/job-seekers/cv-editing">CV Editing</a></li>
					<li style="display: none;"><a href="/employers/publish">Advise</a></li>
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
					<li><p><span class="yellow"><a href="{{ url('/vacancies/'.$post->slug) }}">{{ $post->title }}</a></span> {{ $post->location->country->currency }} {{ $post->monthly_salary }}</p></li>
				  	@empty

				  		@forelse(\App\Post::recent(3) as $post)
							<li><p><span class="yellow"><a href="{{ url('/vacancies/'.$post->slug) }}">{{ $post->title }}</a></span> in {{ $post->location->name }} </p></li>
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
			<div class="col-md-3 grid_3 hidden" >
				<h4>Sign up for our newsletter</h4>
				<p style="display: none;">World-class Publications for your growth</p>
				<form method="post" action="/subscribe">
					<input type="email" name="email" required="required" class="form-control" placeholder="Enter your email">
					<input type="submit" style="background-color: #e88725 " class="btn red" name="" value="Subscribe now!">
			    </form>
			</div>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<div class="footer_bottom" style="">	
  <div class="container">
  	<div class="row">


	    <div class="col-sm-2 col-xs-4">
	  		<ul class="f_list2">
				<li><a href="/vacancies">Vacancies</a></li>
				<li><a href="/register">Upload CV</a></li>
		    </ul>
	  	</div>
	  	<div class="col-sm-2 col-xs-4">
	  		<ul class="f_list2">
				<li><a href="/employers/publish">Advertise</a></li>
				<li><a href="/employers/browse">Browse CVs</a></li>
		    </ul>
	  	</div>
	  	<div class="col-sm-2 col-xs-4">
	  		<ul class="f_list2">
				<li><a href="/about">About</a></li>
				<li><a href="/contact">Contact</a></li>
		    </ul>
	  	</div>
	  	<div class="col-sm-6 footer_text no-mobile">
	       <p>"Job matching platform that combines candidate pre-assessment with recruitment process management tools to facilitate fast and accurate vacancy - job seeker matching."</p>
	  	</div>
  	</div>
  	<div class="clearfix"> </div>
	<div class="copy">
		<p>Copyright © {{ date('Y') }} Emploi . All Rights Reserved </p>
	</div>
  </div>
</div>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5daebbf3df22d91339a060bb/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

</body>
</html>	