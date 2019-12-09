@extends('layouts.dashboard-layout')

@section('title','Emploi :: Success: Assessment Saved')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Referee Assessment Saved')

<div class="card">
    <div class="card-body text-center">
        <p>
            Thank you for taking your time to provide an honest opinion on <strong>{{ $j->seeker->user->name }}</strong>. This review will go a long way in assisting future employers to determine their suitability for work in an organization.

            <a href="/" class="btn btn-orange">Home</a>
            <a href="/join" class="btn btn-purple">Register</a>
        </p>
    </div>
</div>

@endsection
