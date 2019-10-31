@extends('layouts.seek')

@section('title','Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@include('seekers.search-input')
<div class="container">
    <div class="single">  
       <div class="form-container">
        <h2>Account Not Verified</h2>
        
        <div style="text-align: center;">
        	<p>
        		We value our users which is why we require all accounts to be verified.
	        	<br>
	        	A confirmation e-mail has been re-sent to your e-mail address. <br>
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