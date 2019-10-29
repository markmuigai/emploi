@extends('layouts.seek')

@section('title','Emploi :: Job Seeker Services')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@include('seekers.search-input')

<div class="container">
    <div class="single">  
	   
	 <div class="col-md-8 single_right">
	      <h3>
	      	Job Seeker Services
	      	@if(isset(Auth::user()->id))
	      	<a href="/profile" class="pull-right btn btn-sm btn-success"><i class="fa fa-user"> </i> My Profile</a>
	      	@else
	      	<a href="/join" class="pull-right btn btn-sm btn-success"><i class="fa fa-user"> </i> Register</a>
	      	@endif
	      	
	      </h3>
	      <div class="row_1">
	      	<div class="col-sm-4 single_img">
	      		<img src="/images/a1.jpg" style="width: 100%">
	      	</div>
	      	<div class="col-sm-8 single-para">
	      		
	      		<p style="text-align: center">
		            We provide you with seamless job placement through superior candidate selection tools that allow employers to hire very fast, Aggregated market vacancies through our Jobs board, Free and downloadable resume templates, Curated expert career advice, Professional coaching and CV services.
		        </p>

		        <div class="row">
		        	<div class="col-md-6 hover-bottom">
		        		<h4 class="">
		        			Job Vacancies
		        		</h4>
		        		<p>
		        			We post job openings from employers and partners in Kenya and Across East Africa for your career growth
		        		</p>
		        	</div>
		        	<div class="col-md-6 hover-bottom">
		        		<h4 class="">Upload CV</h4>
		        		
		        		<p>
		        			Employers on our platform browse for CVs and this is a golden opportunity for you to be seen and shortlisted
		        		</p>
		        	</div>
		        	<div class="col-md-6 hover-bottom">
		        		<h4 class="">Professional CV Editing</h4>
		        		<p>
		        			Our experts re-write your CV making sure it stands out in applications to improve your shortlisting and employment chances.
		        		</p>
		        	</div>
		        	<div class="col-md-6 hover-bottom">
		        		<h4 class="">Career Coaching</h4>
		        		<p>
		        			Our experts will assess your profile and provide reliable guidance on how to advance your career.
		        		</p>
		        	</div>
		        </div>
	      		
	      	</div>
	      	<div class="clearfix"> </div>
	      	<br>
	      	<div class="row hover-bottom"> 
	      		<div class="col-sm-8">
	      			<h5>
	      				Premium Placement
	      				<small class="pull-right">
	      					<a href="/job-seekers/premium-placement" style="color: #e88725">see more</a>
	      				</small>
	      			</h5>
		      		<p>
		      			Get seen by employers as we rank you on top of the employer search list. Get our professional CV Editing services for frequent shortlisting. We offer exclusive placement services matching your career and Interview coaching to land your dream job.
		      		</p>
	      		</div>
	      		<div class="col-sm-4">
	      			<img src="/images/premium.jpg" style="width: 100%">
	      		</div>
	      		
	      	</div>
	      	<div class="row hover-bottom"> 
	      		
	      		<div class="col-sm-4">
	      			<img src="/images/cv-editing.jpg" style="width: 100%">
	      		</div>
	      		<div class="col-sm-8">
	      			<h5>Professional CV Editing
	      				<small class="pull-right">
	      					<a href="/job-seekers/cv-editing" style="color: #e88725">see more</a>
	      				</small>
	      			</h5>
		      		<p>
		      			Recruiters are very busy people. On average, they read your CV in six seconds and thus having a well-designed professional CV is critical for your career growth.
		      		</p>
	      		</div>
	      		
	      	</div>
	      	<div class="row hover-bottom"> 
	      		<div class="col-sm-8">
	      			<h5>
	      				Resume Templates
	      				<small class="pull-right">
	      					<a href="/job-seekers/cv-templates" style="color: #e88725">see more</a>
	      				</small>
	      			</h5>
		      		<p>
		      			If you want to get a good job, you need a good resume. Resume templates are a great place to start when you're reformatting or writing a resume. We provide free templates to job seekers to get started.
		      		</p>
	      		</div>
	      		<div class="col-sm-4">
	      			<img src="/images/templates.jpg" style="width: 100%">
	      		</div>
	      		
	      	</div>
	      </div>
	      
	      <div>
	      	

	      </div>

	      	

	      	
			
	      
	      
		  
	   </div>
	   <div class="col-md-4">
	   	  @include('left-bar')
	   	  
	 </div>
	   <div class="clearfix"> </div>
	 </div>
</div>

@endsection