@extends('layouts.dashboard-layout')

@section('title','Emploi :: Advertisement Created')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="card">
    <div class="card-body">
    	<h4>
    		Advertisement Request Created
    		@guest
    		<a href="/join" class="btn btn-success" style="float: right;">Create Account</a>
    		@else

    		<a href="/home" class="btn btn-success" style="float: right;">My Dashboard</a>

    		@endguest
    		
    	</h4>
    	<p>
    		Hello {{ $advert->name }},<br>
    		<b>Your advertisment request has been received succesfully.</b> One of our representatives will call you for additional information and will provide payment instructions.
    		<br>
    		Thank you for chosing Emploi.
    		<br><br>
    		<a href="/contact" class="btn btn-primary">Contact Us</a>
    	</p>
	</div>

</div>

@endsection
