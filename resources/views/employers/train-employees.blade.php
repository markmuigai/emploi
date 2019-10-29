@extends('layouts.seek')

@section('title','Emploi :: Linkage with Training Firms')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@include('seekers.search-input')
<div class="container">
    <div class="single">  
	   
	 <div class="col-md-8 single_right">
	      <h3>
	      	Linkage with Training Firms
	      	<a href="/contact" class="pull-right" style="text-decoration: none;">
	      		<i class="fa fa-phone "></i>  <span>Contact</span>
	      	</a>   	
	      </h3>
	      <div class="row">
	      	<div class="col-md-4">
	      		<img src="/images/training.png" style="width: 100%">
	      	</div>
	      	<div class="col-md-8">
	      		<br>
	      		<p>
	      			Changing business environments require constant capacity building to improve the skills of your team and keep you ahead of competition and other business challenges.
					Emploi has thus set itself up to support you in identifying the best provider of training solutions as per your needs.
	      		</p>
	      		
	      	</div>
	      	<div class="clearfix"> </div>
	      </div>

	      <div style="display: none">
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