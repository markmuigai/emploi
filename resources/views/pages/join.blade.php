@extends('layouts.sign')

@section('title','Emploi :: Create an Account')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('user_title', 'Create An Account')

<div class="container text-center">
    <p>
        Welcome to Emploi, an efficient platform to manage recruitments and find work for a succesfull career.
    </p>
    <div class="row acc-links">
        <a href="/employers/register" class="col-md-6 col-12">
            <img src="/images/employer-join.png" class="w-100 py-3">
            <h4>Employer Registration</h4>
        </a>
        <a href="/register" class="col-md-6 col-12">
            <img src="/images/seeker-join.png" class="w-100 py-3">
            <h4>Register as Job Seeker</h4>
        </a>
    </div>
    <div class="text-center">
        <p>
            Already have an account? <br> <a href="/login" class="btn btn-orange">Log in here</a> or <a href="/login" class="btn btn-orange-alt">Contact Us</a>
        </p>
    </div>
</div>

@endsection