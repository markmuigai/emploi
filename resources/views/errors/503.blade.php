@extends('layouts.general-layout')

@section('title','Emploi :: 503 - Service Unavailable')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
<div class="error-page d-flex flex-column justify-content-center align-items-md-end align-items-center">
    <div class="content mr-md-5 mr-0">
        <div class="text-center">
            <h1>503</h1>
            <h2>Service Unavailable</h2>
            <p>
                The request cannot be completed as our services are not available at the moment for system maintenance
            </p>
            <p>
                Please check back later or <a href="/contact" class="orange">contact us</a> and report this error for assistance.
            </p>
            <a href="/" class="btn btn-orange">Home</a>
        </div>
    </div>
</div>
@endsection
