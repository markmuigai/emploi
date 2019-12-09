@extends('layouts.sign')

@section('title','Emploi :: E-mail Exists')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('user_title', 'E-mail Account Exists')

<div class="d-flex flex-column justify-content-center align-center">
    <p>An account with the e-mail address <strong><em>{{ $email }}</em></strong> already exists in our database.</p>
    <p><em>Please use a different e-mail address or log in to your account</em></p>

    <p class="mt-4">
        <a href="/login" class="btn btn-orange">Log in</a>
        <a href="/join" class="btn btn-orange-alt">Register</a>
    </p>
</div>

@endsection