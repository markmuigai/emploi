@extends('layouts.seek')

@section('title','Emploi :: Registration Failed')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@include('seekers.search-input')

<div class="container">
    <div class="single">  
       <div class="form-container">
        <h2>Registration Failed</h2>
        
        <div style="text-align: center;">
        	<p>
                An error occured while creating your account. Please try again later
	        	<br>
	        	If this issue persists, kindly let us know by <a href="/contact">contacting us</a>.
	        </p>

            <p>
                Apologies for the inconviniences caused.
            </p>

	        <br>	

	        <p>
	        	<a href="/login" class="btn btn-sm btn-success">Log in</a>
            <a href="/join" class="btn btn-sm btn-primary">Register</a>
	        </p>
        </div>
        
    
                
    </div>
 </div>
</div>

@endsection