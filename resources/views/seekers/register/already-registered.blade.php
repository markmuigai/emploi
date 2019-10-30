@extends('layouts.seek')

@section('title','Emploi :: E-mail Exists')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@include('seekers.search-input')

<div class="container">
    <div class="single">  
       <div class="form-container">
        <h2>E-mail Account Exists</h2>
        
        <div style="text-align: center;">
        	<p>
        		An account with the e-mail address<b> {{ $email }} already exists</b> in our database. 
	        	<br>
	        	Please use a different e-mail address or log in to your account.
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