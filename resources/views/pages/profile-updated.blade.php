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
      	<a href="/profile/edit" class="btn btn-orange">Edit Profile</a>
    </div>
</div>

@endsection
