@extends('layouts.seek')

@section('title','Emploi :: Success: Assessment Saved')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@include('seekers.search-input')

<div class="container">
    <div class="single">  
	   
	 <div class="col-md-8 single_right">
	      <h3>
	      	Referee Assessment Saved
	      	
	      	
	      </h3>
	      <div class="row_1">
	      	
	      	<p style="text-align: center;">
	      		Thank you for taking your time to provide an honest opinion on {{ $j->seeker->user->name }}. This review will go a long way in assisting future employers to determine their suitability for work in an organization.
	      		<br><br>
	      		<a href="/" class="btn btn-success">Home</a>
	      		<a href="/join" class="btn btn-primary">Register</a>
	      	</p>
	      	
	      	
	      </div>
	   </div>
	   <div class="col-md-4">
	   	  @include('left-bar')
	   	  
	 </div>
	   <div class="clearfix"> </div>
	 </div>
</div>

@endsection