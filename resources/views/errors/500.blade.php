@extends('layouts.seek')

@section('title','Emploi :: 500 - Internal Server Error')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@include('seekers.search-input')
<div class="container">
    <div class="single">  
       <div class="form-container">
        <h2>500 - Internal Server Error</h2>
        
        <div style="text-align: center;">
        	<p>
        		The request cannot be completed. An error occurred on our end.
	        	<br>
	        	Please try again or <a href="/contact">contact us</a> and report this error for assistance  <br>
	        </p>
	        <br>	
	        <p>
	        	<a href="/" class="btn btn-sm btn-success">Home</a>
	        </p>
        </div>
    </div>
 </div>
</div>
