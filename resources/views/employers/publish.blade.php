@extends('layouts.seek')

@section('title','Emploi :: Advertise on Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="container">
    <div class="single">
	   <div class="col-md-4">
	   	  @include('left-bar')

	 </div>
	 <div class="col-md-8 single_right">
	    <h3>
	    	Advertise on Emploi
	    	@if(isset(Auth::user()->id))
	    	<small><a href="/about" class="btn btn-sm btn-link pull-right">About Us</a></small>
	    	@else
	    	<small><a href="/employers/register" class="btn btn-sm btn-link pull-right">register</a></small>
	    	@endif

	    </h3>
	    <p>
	    	Advertise your job to an audience of over 100,000 on our jobseeker database and social media communities. We provide advanced recruitment solutions to suit your business.
	    </p>

	    <p>Our services include <strong>Premium Recruitment</strong> - where we source and vet candidates on your behalf, <strong>Job Advertising and Shortlisting</strong>, and <strong>Database Search</strong></p>
	    <p>To access these features, register as an employer and streamline your recruitment or advertise a job</p>

	    <p style="text-align: center;">
	    	<br>
	    	<a href="/vacancies/create" class="btn btn-success">Publish Job Post</a>
	    	<a href="/contact" class="btn btn-primary">Contact Us</a>
	    </p>
	    <h5>Advertising Features</h5>
	    <ul class="feature_list">
			<li>Reach over 100,000 job seekers through our partner networks</li>
			<li>Shortlisting dashboard</li>
			<li>Easily Schedule Interviews with candidates</li>
			<li>Job post sent as featured to job seekers</li>
			<li>Job post shared on Facebook, Twitter and LinkedIn Pages</li>
		</ul>
		<h5>Employer Benefits</h5>
		<ul class="feature_list">
			<li>Browse our database of job seekers</li>
			<li>Shortlist and schedule interviews with job seekers</li>
			<li>Request premium recruitment</li>
			<li>Request Candidate Vetting</li>
			<li>Advertise jobs</li>
		</ul>
		<p style="text-align: center;">
	    	<br>
	    	<a href="/vacancies/create" class="btn btn-success">Publish Job Post</a>
	    	<a href="/contact" class="btn btn-primary">Contact Us</a>
	    </p>
     </div>
     <div class="clearfix"> </div>
 </div>
</div>

@endsection
