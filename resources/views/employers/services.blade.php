@extends('layouts.seek')

@section('title','Emploi :: Employer Services')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@include('seekers.search-input')

<div class="container">
    <div class="single">  
	   
	 <div class="col-md-8 single_right">
	      <h3>
	      	Employer Services
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
		            Use our Talent database and powerful Search-Sort-Assess-Score engine to cut down your recruitment workload by Up to 70% and your costs By Up to 65%. Get End-to-End powerful Recruitment tools; Process Quality Checks; 90 Day candidate Guarantee.
		        </p>

		        <div class="row">
		        	<div class="col-md-6 hover-bottom">
		        		<h4 class="">
		        			Job Advertisement
		        		</h4>
		        		<p>
		        			Get your advertisement viewed by tens of thousands through our Facebook, Website and LinkedIn
		        		</p>
		        	</div>
		        	<div class="col-md-6 hover-bottom">
		        		<h4 class="">Database Search</h4>
		        		
		        		<p>
		        			Employers on our platform can search tens of thousands of qulaified CVs for quick shortlisting
		        		</p>
		        	</div>
		        	<div class="col-md-6 hover-bottom">
		        		<h4 class="">Premium Services</h4>
		        		<p>
		        			We assist employers in recruiting the best candidates to fill vacancies through our assited recruitment
		        		</p>
		        	</div>
		        	<div class="col-md-6 hover-bottom">
		        		<h4 class="">Mass Recruitment</h4>
		        		<p>
		        			Our team is highly optimized to process mass recruitment requests with a turn-around-time of less than 1 week.
		        		</p>
		        	</div>
		        </div>
	      		
	      	</div>
	      	<div class="clearfix"> </div>
	      	<br>
	      	<h3>Premium Services</h3>
	      	<div class="row hover-bottom"> 
	      		
	      		<div class="col-sm-4">
	      			<img src="/images/background-check.png" style="width: 100%">
	      		</div>
	      		<div class="col-sm-8">
	      			<h5>Background Checks
	      				<small class="pull-right">
	      					<a href="/employers/background-checks" style="color: #e88725">see more</a>
	      				</small>
	      			</h5>
		      		<p>
		      			Performing background checks on applicants and employees is an effective way to discover potential issues that could affect your business. Protect your organization with our comprehensive employment background checks
		      		</p>
	      		</div>
	      		
	      	</div>
	      	<div class="row hover-bottom"> 
	      		<div class="col-sm-8">
	      			<h5>
	      				Proficiency & IQ Test
	      				<small class="pull-right">
	      					<a href="/employers/iq-tests" style="color: #e88725">IQ Tests</a> |
	      					<a href="/employers/proficiency-tests" style="color: #e88725">Proficiency</a>
	      				</small>
	      			</h5>
		      		<p>
		      			We determine the suitability and skill set for particular candidates and the job requirements. Receive the test score for a candidate on the aptitude, proficiency and IQ tests.
		      		</p>
	      		</div>
	      		<div class="col-sm-4">
	      			<img src="/images/proficiency-test.png" style="width: 100%">
	      		</div>
	      		
	      	</div>
	      	<div class="row hover-bottom"> 
	      		
	      		<div class="col-sm-4">
	      			<img src="/images/templates.jpg" style="width: 100%">
	      		</div>
	      		<div class="col-sm-8">
	      			<h5>Psychometric tests
	      				<small class="pull-right">
	      					<a href="/employers/psychometric-tests" style="color: #e88725">see more</a>
	      				</small>
	      			</h5>
		      		<p>
		      			Psychometric tests help to identify a candidate’s skills, knowledge and personality. Measure a number of attributes including intelligence, critical reasoning, motivation and personality profile.
		      		</p>
	      		</div>
	      		
	      	</div>
	      	
	      	<div class="row hover-bottom"> 
	      		<div class="col-sm-8">
	      			<h5>
	      				Premium Recruitment
	      				<small class="pull-right">
	      					<a href="/employers/premium-recruitment" style="color: #e88725">see more</a>
	      				</small>
	      			</h5>
		      		<p>
		      			Our premium recruitment services facilitate the recruitment of the best person available through our headhunting abilities. For instance, managerial jobs require matching candidates to be approached and informed of the available job.
		      		</p>
	      		</div>
	      		<div class="col-sm-4">
	      			<img src="/images/premium-recruit.png" style="width: 100%">
	      		</div>
	      		
	      	</div>
	      	<div class="row hover-bottom"> 
	      		
	      		<div class="col-sm-4">
	      			<img src="/images/linkage.png" style="width: 100%">
	      		</div>
	      		<div class="col-sm-8">
	      			<h5>Linkage with Training Firms
	      				<small class="pull-right">
	      					<a href="/employers/train-employees" style="color: #e88725">see more</a>
	      				</small>
	      			</h5>
		      		<p>
		      			We have set up to support you in identifying the best provider of training solutions as per your needs. Ask for our solutions to constantly improve your team for higher returns
		      		</p>
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