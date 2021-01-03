@extends('layouts.dashboard-layout')

@section('title','Emploi :: '.$title)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="card">
	<div class="card-body text-center">
		<h2 class="orange">Success!</h2>
		<p>{{ $message }}</p>
		<a href="#" onclick="window.history.back()" class="btn btn-purple">Back</a>
		<a href="/employers/dashboard" class="btn btn-orange">Home</a>
	</div>
</div>

@endsection