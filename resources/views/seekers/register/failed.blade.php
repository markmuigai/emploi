@extends('layouts.sign')

@section('title','Emploi :: Registration Failed')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('user_title', 'Registration Failed')

<div class="d-flex flex-column justify-content-center align-center">
    <p>An error occured while creating your account. Please try again later</p>
    <p>If this issue persists, kindly let us know by <a href="/contact" class="orange">contacting us</a>.</p>

    <div class="mt-4">
        <a href="#" class="btn btn-purple" onclick="window.history.back()">Back</a>
        <a href="/login" class="btn btn-orange">Log in</a>
        <a href="/join" class="btn btn-orange-alt">Register</a>
    </div>
</div>

@endsection
