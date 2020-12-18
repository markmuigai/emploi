@extends('layouts.sign')

@section('title','Emploi :: Registration Successfull')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('user_title', 'Account Created')

<div class="d-flex flex-column justify-content-center align-center">
    <p>Your account as a job seeker has been created successfully.</p>
    {{-- @include('components.ads.responsive') --}}
    <p>Check your e-mail inbox and verify your account.</p>

    <div class="mt-4">
        <a href="/login" class="btn btn-orange">{{ __('auth.login') }}</a>
        <a href="/job-seekers/cv-builder" class="btn btn-orange-alt">Build CV</a>
        <a href="/job-seekers/free-cv-review" class="btn btn-orange">Free CV Review</a>
    </div>
</div>

@endsection
