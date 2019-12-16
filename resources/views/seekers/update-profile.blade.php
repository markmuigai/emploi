@extends('layouts.dashboard-layout')

@section('title','Emploi :: Job Seeker Profile Incomplete')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Update your profile')

<div class="card">
    <div class="card-body text-center">
        <h2>Job Seeker Profile Incomplete</h2>
        <p>
            Hi {{ Auth::user()->name }},<br><br>
            Your profile has not been updated. Please edit your profile and include experience and education background first before applying for jobs or adding referees.
        </p>
        <a href="#" class="btn btn-purple" onclick="window.history.back()">Back</a>
        <a href="/profile/edit" class="btn btn-orange">Edit Profile</a>
    </div>
</div>

@endsection