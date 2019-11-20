@extends('layouts.general-layout')

@section('title','Emploi Referral')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="container">
    <div class="single">  
	   
	 <div class="col-md-8 single_right">
	      <h3>
	      	<i class="fa fa-arrow-left" onclick="window.history.back()"></i>
	      	{{ $title }}
	      </h3>
	      <div class="row_1">
	      	<div class="clearfix"> </div>
	      </div>

	      <div class="col-md-8 offset-md-2">
	      	{{ $message }}
	      </div>

	      

	      
	   </div>
	   <div class="clearfix"> </div>
	 </div>
</div>

@endsection