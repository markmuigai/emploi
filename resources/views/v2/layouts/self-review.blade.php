<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>@yield('title')</title>

	<!-- Favicons-->
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

	<!-- GOOGLE WEB FONT -->
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">

	<!--Main layout files-->
	        <!-- Style CSS -->
	<link rel="stylesheet" href="{{asset('assets-v2/css/style.css')}}">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="{{asset('assets-v2/css/meanmenu.css')}}">
	<link rel="stylesheet" href="{{asset('assets-v2/css/magnific-popup.css')}}">
	<!-- BASE CSS -->
    <link rel="stylesheet" href="{{asset('assets-v2/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets-v2/css/animate.min.css')}}">
	<link href="{{asset('survey-assets/css/style.css')}}" rel="stylesheet">
	<link href="{{asset('survey-assets/css/responsive.css')}}" rel="stylesheet">
	<link href="{{asset('survey-assets/css/menu.css')}}" rel="stylesheet">
	<link href="{{asset('survey-assets/css/all_icons_min.css')}}" rel="stylesheet">
	<link href="{{asset('survey-assets/css/skins/square/grey.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('assets-v2/css/responsive.css')}}">
	<link rel="icon" sizes="512x512" href="{{ asset('images/favicon.png') }}">   
	<link rel="stylesheet" href="{{asset('assets-v2/css/boxicons.min.css')}}">
	<!-- YOUR CUSTOM CSS -->
	<link href="{{asset('survey-assets/css/custom.css')}}" rel="stylesheet">

	<script src="{{asset('survey-assets/js/modernizr.js')}}"></script>
	<!-- Modernizr -->
<!-- 		<script src="{{asset('survey-assets/js/jquery-3.5.1.min.js')}}"></script> -->

     <!--    Jquery cloudflare cdn -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>

<body>
	
    <!-- Preloader -->
    {{-- @include('v2.components.preloader') --}}
    <!-- End Preloader -->
	
	<div id="loader_form">
		<div data-loader="circle-side-2"></div>
	</div><!-- /loader_form -->


	@yield('content')

	

	<!-- SCRIPTS -->
	<!-- Jquery-->

	<!-- Common script -->
	<script src="{{asset('survey-assets/js/common_scripts_min.js')}}"></script>
	<!-- Wizard script -->
	<script src="{{asset('survey-assets/js/registration_wizard_func.js')}}"></script>
	<!-- Menu script -->
	<script src="{{asset('survey-assets/js/velocity.min.js')}}"></script>
	<script src="{{asset('survey-assets/js/main.js')}}"></script>
	<!-- Theme script -->
	<script src="{{asset('survey-assets/js/functions.js')}}"></script>

	<script src="{{asset('assets-v2/js/jquery.meanmenu.js')}}"></script>

	@yield('js')

</body>
</html>