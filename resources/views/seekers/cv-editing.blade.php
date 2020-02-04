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
			<img src="{{asset('images/cv2.jpg')}}" alt="CV Editing" class="w-100">
		</div>
		<div class="col-md-6">
			<h5 class="pt-2">What does that mean?</h5>

			<p>A recruiter may spend as little as 20 seconds looking at each CV. You need to maximize on your 20 seconds to deliver maximum impression to the recruiter.</p>

			<p>If you do not have the right skills to deliver a targeted, detailed and get concise CV, <a href="#request-cv-edit-form" class="orange">you need to talk to the experts</a>.</p>

			<p>We leverage on our expertise to provide you with a clear, concise CV that matches your professional level and will stand out before recruiters.</p>
			<p>
				<a href="#request-cv-edit-form" class="btn btn-orange">Request Cv Editing</a>
			</p>
		</div>
	</div>

	 @include('components.ads.responsive')

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
			<img src="{{asset('images/cv.jpg')}}" alt="CV Editing" class="w-100">
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

	<div class="row" id="request-cv-edit-form">
		<div class="col-md-8 offset-md-2">
			<h3 style="text-align: center;">Request Professional CV Editing</h3>
		</div>
		<br><br>
		
		<form method="POST"  enctype="multipart/form-data" action="/cv-editing" class="col-md-8 offset-md-2">
			@csrf
			<p>
				<label>Name:</label>
				@error('name')
			    <div class="text-center my-2 py-1 alert alert-danger" role="alert">
			        Invalid name
			    </div>
			    @enderror
				<input type="text" name="name" required="" maxlength="50" class="form-control" value="{{ isset(Auth::user()->id) ? Auth::user()->name : old('name') }}">
			</p>
			<p>
				<label>Phone Number:</label>
				@error('phone_number')
			    <div class="text-center my-2 py-1 alert alert-danger" role="alert">
			        Invalid phone number
			    </div>
			    @enderror
				<input type="number" name="phone_number" required="" maxlength="20" class="form-control" value="{{ old('phone_number') }}" placeholder="2547XXXXXXXX">
			</p>
			<p>
				<label>Email:</label>
				@error('email')
			    <div class="text-center my-2 py-1 alert alert-danger" role="alert">
			        Invalid e-mail address
			    </div>
			    @enderror
				<input type="email" name="email" required="" maxlength="50" class="form-control" value="{{ isset(Auth::user()->id) ? Auth::user()->email : old('email') }}">
			</p>
			<p>
				<label>Current CV: <small>.doc, .docx and .pdf - Max 5MB</small></label>
				@error('resume')
			    <div class="text-center my-2 py-1 alert alert-danger" role="alert">
			        Invalid resume uploaded
			    </div>
			    @enderror
				<input type="file" name="resume" required="" accept=".pdf, .doc, .docx">
			</p>
			<p>
				<label>Industry:</label>
				@error('industry')
			    <div class="text-center my-2 py-1 alert alert-danger" role="alert">
			        Invalid industry selected
			    </div>
			    @enderror
				<select name="industry" class="form-control">
					@forelse(\App\Industry::orderBy('name')->get() as $ind)
					<option value="{{ $ind->id }}" {{ old('industry') == $ind->id ? 'selected=""' : '' }}>{{ $ind->name }}</option>
					@empty
					@endforelse
				</select>
			</p>
			<p>
				<label>Message:</label>
				@error('message')
			    <div class="text-center my-2 py-1 alert alert-danger" role="alert">
			        Invalid message
			    </div>
			    @enderror
				<textarea class="form-control" placeholder="Optional message " maxlength="500" name="message">{{ old('message') }}</textarea>
			</p>
			<p>
				<input type="submit" class="btn btn-success">
			</p>
		</form>
	</div>


	<h3 class="orange pt-2 text-center">Our Charges</h3>

	<div class="card-deck text-center coloured-card row">
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
