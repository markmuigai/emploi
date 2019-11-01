@extends('layouts.seek')

@section('title','Emploi :: 429 - Too Many Requests')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@include('seekers.search-input')
<div class="container">
    <div class="single">  
       <div class="form-container">
        <h2>429 - Too Many Requests</h2>
        
        <div style="text-align: center;">
        	<p>
        		The request cannot be completed as we received too many requests from your end.
	        	<br>
	        	If this is a mistake, please don't hesitate to <a href="/contact">contact us</a> <br>
	        </p>
	        <br>	
	        <p>
	        	<a href="/" class="btn btn-sm btn-success">Home</a>
	        </p>
        </div>
    </div>
 </div>
</div>
