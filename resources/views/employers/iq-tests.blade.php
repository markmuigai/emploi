@extends('layouts.seek')

@section('title','Emploi :: IQ Tests')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@include('seekers.search-input')
<div class="container">
    <div class="single">  
	   
	 <div class="col-md-8 single_right">
	      <h3>
	      	Intellectual Quotent Tests (IQ)
	      	<a href="/contact" class="pull-right" style="text-decoration: none;">
	      		<i class="fa fa-phone "></i>  <span>Contact</span>
	      	</a>   	
	      </h3>
	      <div class="row">
	      	<div class="col-md-4">
	      		<img src="/images/premium-recruit.png" style="width: 100%">
	      	</div>
	      	<div class="col-md-8">
	      		<br>
	      		<p>
	      			IQ is a measure of your ability to reason and solve problems. It essentially reflects how well you did on a specific test as compared to other people of your age group.  <br>
	      			While IQ can be a predictor of things such as innovation, experts caution that it does not necessarily guarantee success at the office. However, individuals with higher IQ levels have historically brought more meaningful change to organizations compared to their minors.
	      		</p>
	      		
	      	</div>
	      	<div class="clearfix"> </div>
	      </div>

	      <div>
	      	<p>
	      		Employers are advised to conduct IQ tests on candidates and employees to be in a better positioning when planning human resources
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