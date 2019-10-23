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
        <h2>{{ $title }}</h2>
        
        <div style="text-align: center;">
        	<p>
	        	{{ $message }}
	        </p>

	        <br>	

	        <p>
	        	<a href="/profile" class="btn btn-sm btn-success">View Profile</a>
	        	<a href="/profile/edit" class="btn btn-sm btn-primary">Edit Profile</a>
	        </p>
        </div>
        
    
                
    </div>
 </div>
</div>

@endsection