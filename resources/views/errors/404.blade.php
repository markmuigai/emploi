@extends('layouts.seek')

@section('title','Emploi :: 404 - Page not found')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@include('seekers.search-input')
<div class="container">
    <div class="single">  
       <div class="form-container">
        <h2>404 - Page not Found</h2>
        
        <div style="text-align: center;">
        	<p>
        		The page you requested for was not found on Emploi, or may have moved location. 
	        	<br>
	        	Kindly check the link entered. If this is a mistake, please don't hesitate to <a href="/contact">contact us</a> <br>
	        </p>

	        <br>	

	        <p>
	        	<a href="/" class="btn btn-sm btn-success">Home</a>
	        </p>
        </div>
        
    
                
    </div>
 </div>
</div>
@endsection
