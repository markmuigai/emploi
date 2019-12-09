@extends('layouts.sign')

@section('title','Account Created')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('user_title', 'Account Created')

<div class="card">
    <div class="card-body text-center">
        <h2>Account Created</h2>
        <p>
            Your account as a job seeker has been created succesfully.
        </p>
        <p>
            Check your <strong>e-mail inbox</strong> for your password and log in.
        </p>
        <p>
            <a href="/profile/edit" class="btn btn-orange">Update Profile</a>
            <a href="/vacancies" class="btn btn-orange-alt">Vacancies</a>
        </p>
    </div>
</div>
@endsection