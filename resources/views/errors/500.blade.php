@extends('layouts.general-layout')

@section('title','Emploi :: 500 - Internal Server Error')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
<div class="error-page d-flex flex-column justify-content-center align-items-md-end align-items-center">
    <div class="content mr-md-5 mr-0">
        <div class="text-center">
            <h1>500</h1>
            <h2>Internal Server Error</h2>
            <p>
                The request cannot be completed. An error occurred on our end.
            </p>
            <p>
                Please try again or <a href="/contact" class="orange">contact us</a> and report this error for assistance.
            </p>
            <a href="/" class="btn btn-orange">Home</a>
        </div>
    </div>
</div>