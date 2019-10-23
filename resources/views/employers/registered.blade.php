@extends('layouts.seek')

@section('title','Account Created')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@include('seekers.search-input')
<div class="container">
    <div class="single">  
       <div class="form-container">
        <h2>Account Created</h2>
        
        <div style="text-align: center;">
        	<p>
	        	Your account as an employer has been created succesfully.
	        	<br>
	        	Check your personal e-mail inbox for your password and log in.
	        </p>

	        <br>	

	        <p>
	        	<a href="/login" class="btn btn-sm btn-success">Login</a>
	        </p>
        </div>
        
    
                
    </div>
 </div>
</div>
@endsection