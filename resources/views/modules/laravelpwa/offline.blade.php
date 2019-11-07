@extends('layouts.seek')

@section('title','Emploi :: Offline')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@include('seekers.search-input')
<div class="container">
    <div class="single">  
       <div class="form-container">
        <h2>No Internet Connection</h2>
        
        <div style="text-align: center;">
        	<p>
                You are currently not connected to the internet.
	        	<br>

	        	Kindly check your connection and retry <br>
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
