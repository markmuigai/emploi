@extends('layouts.seek')

@section('title','Emploi :: Registration Successfull')

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
	        	Your account as a job seeker has been created succesfully.
	        	<br>
	        	Check your <strong>e-mail inbox</strong> for your username and password for log in.
	        </p>

	        <br>

	        <p>
	        	<a href="/login" class="btn btn-sm btn-success">Log in</a>
            <a href="/vacancies" class="btn btn-sm btn-primary">Vacancies</a>
	        </p>
        </div>



    </div>
 </div>
</div>

@endsection
