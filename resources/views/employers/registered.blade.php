@extends('layouts.sign')

@section('title','Account Created')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('user_title', 'Account Created')

<div class="d-flex flex-column justify-content-center align-center">
    <p>
        Your account as an employer has been created succesfully.
    </p>
    <p>
        A confirmation e-mail has been sent.
    </p>
    <p>
        To log in, your username is <strong>{{ $username }}</strong>
    </p>

    <div class="mt-4">
        <a href="/login" class="btn btn-sm btn-orange">Login</a>
  </div>
</div>

@endsection
