@extends('layouts.general-layout')

@section('title','Social Login Error')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="text-center my-5">
    <h2>Email Address Error!</h2>
    <p>
    	We we're unable to proceed with your authentication using {{ $provider }}. This error may be because your account has no e-mail address. 
    </p>
    <p>
        To proceed, kindly <a href="/join" class="btn btn-link btn-sm">Create an Account</a> with your E-mail address. If you already have an account, <a href="/login" class="btn btn-link btn-sm">Log in </a> with your e-mail and password.
    </p>
    <p>
        We apologize for any inconviniences cause.
    </p>
</div>


@endsection
