@extends('layouts.seek')

@section('title','Emploi :: Psychometric Tests')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@include('seekers.search-input')
<div class="container">
    <div class="single">  
	   
	 <div class="col-md-8 single_right">
	      <h3>
	      	Psychometric Tests
	      	<a href="/contact" class="pull-right" style="text-decoration: none;">
	      		<i class="fa fa-phone "></i>  <span>Contact</span>
	      	</a>   	
	      </h3>
	      <div class="row">
	      	<div class="col-md-4">
	      		<img src="/images/templates.jpg" style="width: 100%">
	      	</div>
	      	<div class="col-md-8">
	      		<br>
	      		<p>
	      			Psychometric tests help to identify a candidate’s skills, knowledge and personality. <br>
	      			They’re often used during the preliminary screening stage of candidates in recruitment or even while carrying out staff capacity assessment.<br>

					Psychometric testing can measure a number of attributes including intelligence, critical reasoning, motivation and personality profile which will guide the organization in assigning roles.
	      		</p>
	      		
	      	</div>
	      	<div class="clearfix"> </div>
	      </div>

	      <div>
	      	<p>
	      		They’re objective, convenient and strong indicators of job performance; making them very popular with recruiters.

				We have sharpened our knowledge in psychometrics and taken a cutting-edge approach to assessments.
	      	</p>
	      	<p>
	      		We work hand-in-hand with workplace psychologists and other HR consultants to offer assessments that are increasingly varied, innovative and adapted to today’s needs.
	      	</p>
	      	
	      </div>

	      <div class="row">
	      	<h5>Our range of tests</h5>
	      	<div class="col-md-6">
	      		<b>1. Personality And Competency</b><br>

				These assessments help companies identify dominant personality traits in the work environment.
				They also allow you to identify candidates’ innate aptitudes with reference to a comprehensive selection of jobs and potential careers.<br><br>

				The Tests Include:<br>

				a) Professional Profile <br>
				b) Big Five Profile <br>
				c) CTPI-R <br>
				d) Sales Profile-R <br>
				e) Management Style Inventory <br>
				f) Occupational Interest Inventory <br>
	      	</div>

	      	<div class="col-md-6">
	      		<b>2. Skills And Aptitude</b><br>

				Apart from personality tests, we offer targeted assessments to measure reasoning, emotional intelligence, and linguistic abilities.<br>
				These aptitude tests allow you to predict how prospective employees will perform in a particular job role and to simplify the
				implementation of internal evaluations or trainings.<br>

				These Tests Include:<br>

				 

				a) Reasoning Test <br>
				b) Emotional Intelligence Test <br>
				c) Business English Test <br><br>

				
	      	</div>
	      </div>

	      <div>
	      	<br>
	      	<p>
	      		All our tests are created as per the guidelines of <b>International Test Commission (ITC)</b>, <b>American Psychometric Association(APA)</b> and <b>British Psychological Association (BPS)</b>, and are also validated as per the values set by these organizations.
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