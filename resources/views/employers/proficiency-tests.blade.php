@extends('layouts.seek')

@section('title','Emploi :: Proficiency Tests')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@include('seekers.search-input')

<div class="container">
    <div class="single">  
	   
	 <div class="col-md-8 single_right">
	      <h3>
	      	Proficiency Tests
	      	<a href="/contact" class="pull-right" style="text-decoration: none;">
	      		<i class="fa fa-phone "></i>  <span>Contact</span>
	      	</a>   	
	      </h3>
	      <div class="row">
	      	<div class="col-md-4">
	      		<img src="/images/proficiency-test.png" style="width: 100%">
	      	</div>
	      	<div class="col-md-8">
	      		<br>
	      		<p>
	      			The importance of these tests cannot be overemphasized, when it comes to determine the suitability and skill set for particular candidates and the job requirements. <br>
					Through this service you are able as employer to receive the test score for a candidate on the aptitude and proficiency tests. <br>
					You may also request for the administration of this on your own sourced candidates
	      		</p>
	      		
	      	</div>
	      	<div class="clearfix"> </div>
	      </div>

	      <div>
	      	<p>
	      		By administering proficiency tests on a candidate, the employer will be able to deeply analyze a candidate's strengths and weaknesses which may not be present in their resume.
	      	</p>
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