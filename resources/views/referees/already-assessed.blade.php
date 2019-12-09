@extends('layouts.dashboard-layout')

@section('title','Emploi :: Error: Assessment Exists')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', Error: Referee Assessment Exists)

<div class="container">
    <div class="single">
        <p>
            An assessment has already been provided for the job seeker. To edit or update this, kindly <a href="/contact" class="orange">Contact us </a> for advise.
        </p>
        <a href="/" class="btn btn-orange mt-3">Home</a>
    </div>
</div>

@endsection