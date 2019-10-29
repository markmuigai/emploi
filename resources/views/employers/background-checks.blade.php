@extends('layouts.seek')

@section('title','Emploi :: Background Checks')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@include('seekers.search-input')

<div class="container">
    <div class="single">  
	   
	 <div class="col-md-8 single_right">
	      <h3>
	      	Background Checks
	      	<a href="/contact" class="pull-right" style="text-decoration: none;">
	      		<i class="fa fa-phone "></i>  <span>Contact</span>
	      	</a>   	
	      </h3>
	      <div class="row">
	      	<div class="col-md-4">
	      		<img src="/images/background-check.png" style="width: 100%">
	      	</div>
	      	<div class="col-md-8">
	      		<br>
	      		<p>
	      			Acquiring new staff is imperative to achieve business goals, yet each applicant and employee adds business and security risk.
					Fortunately, performing background checks on applicants and employees is an effective way to discover potential issues that could affect your business.
	      		</p>
	      		
	      	</div>
	      	<div class="clearfix"> </div>
	      </div>
	      <div>
	      	<p>
	      		Protect your organization with our comprehensive employment background checks ranging:
	      	</p>
	      	<ul>
	      		<li>Identity checks</li>
	      		<li>Address, including previous addresses</li>
	      		<li>Confirmation of the right and eligibility to work in the country</li>
	      		<li>Verification of academic certificates, passports, and driving licenses</li>
	      		<li>Financial background check</li>
	      		<li>Qualification and membership of professional bodies</li>
	      		<li>Full employment history including employment gaps</li>
	      		<li>Detailed analysis of CVs to identify information gaps or inconsistencies and follow-up investigation of any inconsistencies</li>
	      		<li>Management of written reference process or questionnaire design</li>
	      		<li>In-depth interview of candidates</li>
	      		<li>Follow up on personal and character references</li>
	      		<li>Interviews with referees, including checks on the referees.</li>
	      		<li>Standard and enhanced criminal records check via the Criminal investigations department.</li>
	      		<li>Anti-fraud investigation</li>
	      		<li>Discreet enquiries about suspect activities</li>
	      		<li>Drivers Records</li>
	      		<li>Substance Abuse Screening</li>
	      	</ul>
	      </div>
	      <br><br>
	      <div class="row">
				<div class="col-md-6 col-md-offset-3" style="text-align: center;">
					<b>Get in touch with us and hire the best</b> <br>
					Phone: +254 702 068 282 <br>
					E-mail: <a href="mailto:info@emploi.co">info@emploi.co</a> <br>
					<a href="/contact" class="btn btn-success">Contact Us</a>
				</div>
			</div>

	      

	      


	      
	   </div>
	   <div class="col-md-4">
	   	  @include('left-bar')
	   	  
	 </div>
	   <div class="clearfix"> </div>
	 </div>
</div>

@endsection