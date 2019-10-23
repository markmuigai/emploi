@extends('layouts.seek')

@section('title','Emploi :: Create an Account')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
<div class="container">
    <div class="single">  
	   
	 <div class="col-md-8 single_right">
	      <h2>
	      	Create an Account
	      </h2>
	      
	      
	      <div style="text-align: center; " class="row">
	      	<p>
	      		Welcome to Emploi, an efficient platform to manage recruitments and find work for a succesfull career.
	      	</p>
	      	

	      	<div class="col-md-4 col-md-offset-2 col-xs-6" style="padding: 1em">
	      		<a href="/employers/register" style="width: 100%">
	      			<img src="/images/employer-join.png" style="width: 100%">
	      			<h4 style="color: black">Employer Registration <i class="fa fa-arrow-right"></i> </h4>
	      		</a>
	      	</div>
	      	<div class="col-md-4 col-xs-6" style="padding: 1em">
	      		<a href="/register" style="width: 100%">
	      			<img src="/images/seeker-join.png" style="width: 100%">
	      			<h4 style="color: black">Register as Job Seeker <i class="fa fa-arrow-right"></i></h4>
	      		</a>
	      	</div>
	      	<div class="col-md-8 col-md-offset-2">
	      		<p>
	      			Already have an account? <br> <a href="/login" class="btn btn-link">Log in here</a> or <a href="/login" class="btn btn-success btn-sm">Contact Us</a>
	      		</p>	      		
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