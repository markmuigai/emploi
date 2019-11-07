@extends('layouts.seek')

@section('title','Emploi :: Error: Assessment Exists')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@include('seekers.search-input')

<div class="container">
    <div class="single">  
	   
	 <div class="col-md-8 single_right">
	      <h3>
	      	Error: Referee Assessment Exists
	      	

	      	<a href="/profile/referees" class="pull-right btn btn-sm btn-success"> My Referees</a>
	      	<a href="/profile" class="pull-right btn btn-sm btn-primary"><i class="fa fa-user"> </i> My Profile</a>
	      	
	      </h3>
	      <div class="row_1">
	      	
	      	<p style="text-align: center;">
	      		An assessment has already been provided for the job seeker. To edit or update this, kindly <a href="/join" class="btn btn-sm btn-link">Contact us </a> for advise.
	      		<br><br>
	      		<a href="/" class="btn btn-sm btn-danger">Home</a>
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