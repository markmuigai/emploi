@extends('layouts.sign')

@section('title','Emploi :: Registration Successfull')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('user_title', 'Account Created')

<div class="d-flex flex-column justify-content-center align-center">
    <p>Your account as a job seeker has been created succesfully.</p>
    @include('components.ads.responsive')
    <p>Check your e-mail inbox for your username and password to log in.</p>

    <div class="mt-4">
        <a href="/login" class="btn btn-orange">Log in</a>
        <a href="/vacancies" class="btn btn-orange-alt">Vacancies</a>
    </div>
</div>

@endsection
