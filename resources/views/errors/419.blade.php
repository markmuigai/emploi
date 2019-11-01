@extends('layouts.seek')

@section('title','Emploi :: 419 - Page Expired')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@include('seekers.search-input')
<div class="container">
    <div class="single">  
       <div class="form-container">
        <h2>419 - Page Expired</h2>
        
        <div style="text-align: center;">
        	<p>
        		The request cannot be completed as the page has expired. <br>
        		This may have been caused by taking too long to complete a form.
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

