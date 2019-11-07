@extends('layouts.seek')

@section('title','Emploi :: Referee Saved')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@include('seekers.search-input')

<div class="container">
    <div class="single">  
	   
	 <div class="col-md-8 single_right">
	      <h3>
	      	Referee Saved
	      	

	      	<a href="/profile" class="pull-right btn btn-sm btn-success"> My Referees</a>
	      	<a href="/profile" class="pull-right btn btn-sm btn-primary"><i class="fa fa-user"> </i> My Profile</a>
	      	
	      </h3>
	      <div class="row_1">
	      	
	      	<p style="text-align: center;">
	      		Thank you for saving {{ $referee->name }} as your referee to your profile. An E-mail has been sent and {{ $referee->name }} will provide your assessment, which will be used to boost your rank as employers do their shortlisting.

	      		<br>
	      		Kindly get in touch with your referee to ensure an assessment is submitted. 
	      		<br><br>
	      		<a href="/profile/add-referee" class="btn btn-sm btn-danger">Add Another Referee</a>
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