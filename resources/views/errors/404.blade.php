@extends('layouts.general-layout')

@section('title','Emploi :: 404 - Page not found')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
<div class="error-page d-flex flex-column justify-content-center align-items-md-end align-items-center">
    <div class="content mr-md-5 mr-0">
        <div class="text-center">
            <h1>404</h1>
            <h3>Page not Found</h3>
            <p>
                The page you requested for was not found on Emploi, or may have moved location.
            </p>
            <p>
                Kindly check the link entered. If this is a mistake, please don't hesitate to <a href="/contact" class="orange">contact us</a>
            </p>
            <a href="/" class="btn btn-orange">Home</a>
        </div>
    </div>
</div>
@endsection
