@extends('layouts.seek')

@section('title','Emploi :: Referee Exists')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@include('seekers.search-input')

<div class="container">
    <div class="single">  
	   
	 <div class="col-md-8 single_right">
	      <h3>
	      	Error: Referee Exists
	      	

	      	<a href="/profile/referees" class="pull-right btn btn-sm btn-success"> My Referees</a>
	      	<a href="/profile" class="pull-right btn btn-sm btn-primary"><i class="fa fa-user"> </i> My Profile</a>
	      	
	      </h3>
	      <div class="row_1">
	      	
	      	<p style="text-align: center;">
	      		{{ $name }} has <b> already been added </b>as one of your referees with the e-mail address {{ $email }}. Kindly add another referee to prevent duplication.

	      		<br>
	      		Thank you for your co-operation in the recruitment process.
	      		<br><br>
	      		<a href="/profile/add-referee" class="btn btn-sm btn-danger">Add Referee</a>
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