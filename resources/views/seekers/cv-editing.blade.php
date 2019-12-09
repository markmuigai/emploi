@extends('layouts.general-layout')

@section('title','Emploi :: Professional CV Editing')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
<div class="container py-5">
	<div class="text-center">
		<h2 class="orange text-center">Does your CV stand out?</h2>
		<p>The job market has become very competitive, and a single vacancy today may attract hundreds of applications.</p>
	</div>
	<div class="row align-items-center justify-content-center py-4">
		<div class="col-md-6">
			<img src="{{asset('images/cv2.jpg')}}" alt="" class="w-100">
		</div>
		<div class="col-md-6">
			<h5 class="pt-2">What does that mean?</h5>

			<p>A recruiter may spend as little as 20 seconds looking at each CV. You need to maximize on your 20 seconds to deliver maximum impression to the recruiter.</p>

			<p>If you do not have the right skills to deliver a targeted, detailed and get concise CV, <a href="/contact" class="orange">YOU NEED TO TALK TO THE EXPERTS</a>.</p>

			<p>We leverage on our expertise to provide you with a clear, concise CV that matches your professional level and will stand out before recruiters.</p>
		</div>
	</div>

	<div class="row align-items-center justify-content-center py-4">
		<div class="col-md-6">
			<h5 class="pt-2">PROCESS</h5>
			<p>
				We first go through your CV to understand your professional journey and angle then send you a questionnaire which will ask you questions about your career goals and experiences. However, a personal consultation will be
				necessary for
				us to really get an idea of how to best market you to employers, so we will schedule an IN-DEPTH phone interview with one of our Certified Resume Writers to go over your questionnaire answers and make sure we know
				everything
				needed to
				make you stand out! (This is just one of the ways we are different from other firms).
			</p>
		</div>
		<div class="col-md-6">
			<img src="{{asset('images/cv.jpg')}}" alt="" class="w-100">
		</div>
		<div class="col-md-8 py-3 text-center">
			<p>
				We shall also be requesting for information we consider important that is missing from your CV. We will guide you in providing us with a career objective statement that is in line with your career goals but also with what
				most
				recruiters look out for especially in the line of finance and management.
			</p>
			<p>
				We will then prepare a draft resume for your review. Quality is always most important and our process typically takes 2 – 4 business days.
			</p>
		</div>
	</div>


	<h3 class="orange pt-2 text-center">Our Charges</h3>

	<div class="card-deck text-center coloured-card">
		<div class="card">
			<div class="card-body d-flex flex-column justify-content-center">
				<h1>Kshs 2,000</h1>
				<p>Entry Level</p>
			</div>
		</div>
		<div class="card">
			<div class="card-body d-flex flex-column justify-content-center">
				<h1>Kshs 4,000</h1>
				<p>Mid Level</p>
			</div>
		</div>
		<div class="card">
			<div class="card-body d-flex flex-column justify-content-center">
				<h1>Kshs 6,000</h1>
				<p>Career Change / Promotion Seeking CV</p>
			</div>
		</div>
		<div class="card">
			<div class="card-body d-flex flex-column justify-content-center">
				<h1>Kshs 6,000</h1>
				<p>Management Level</p>
			</div>
		</div>
		<div class="card">
			<div class="card-body d-flex flex-column justify-content-center">
				<h1>Kshs 10,000</h1>
				<p>Senior Management Level</p>
			</div>
		</div>
	</div>
</div>


@endsection
