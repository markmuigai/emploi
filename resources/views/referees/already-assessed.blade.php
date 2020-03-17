@extends('layouts.dashboard-layout')

@section('title','Emploi :: Error: Assessment Exists')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Error: Referee Assessment Exists')

<div class="container">
    <div class="single">
        <p>
            An assessment has already been provided for the job seeker. <br>To edit or update your assessment, kindly <a href="/contact" class="orange">Contact us </a>.
        </p>
        @include('components.ads.responsive')
        <a href="/" class="btn-sm btn btn-orange mt-3">Home</a>
        <a href="/join" class="btn-sm btn btn-primary mt-3">{{ __('auth.register') }}</a>
        <a href="/login" class="btn-sm btn btn-default mt-3">{{ __('auth.login') }}</a>
    </div>
</div>

@endsection