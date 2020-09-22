@extends('layouts.sign')

@section('title','Account Created')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('user_title', 'Account Created')

<div class="card">
    <div class="card-body text-center">
        <h2>Hello Job Seeker</h2>
        <p>
            Your account as a job seeker has been created successfully.
        </p>
        @include('components.ads.responsive')
        <p>
            Check your <strong>e-mail inbox</strong> for your password and log in.
        </p>
        <div class="mt-4">
            <a href="/profile/edit" class="btn btn-orange">Update Profile</a>
            <a href="/job-seekers/cv-builder" class="btn btn-orange-alt">Build CV</a>
            <a href="/job-seekers/free-cv-review" class="btn btn-orange">Free CV Review</a>
        </div>
    </div>
</div>
@endsection
