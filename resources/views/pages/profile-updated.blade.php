@extends('layouts.dashboard-layout')

@section('title','Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="card">
    <div class="card-body text-center">
        <h2>{{ $title }}</h2>
      	<p>
        	{{ $message }}
        </p>
      	<a href="/profile" class="btn btn-purple">View Profile</a>
      	<a href="/home" class="btn btn-orange">
      		<?php
      		if(session('redirectToPost'))
      		{
      			print 'Continue to Apply Job';      			
      		}
      		else
      			print 'Dashboard';
      		?>
      		
      	</a>
    </div>
</div>

@endsection
