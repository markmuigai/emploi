@extends('layouts.general-layout')

@section('title','Emploi :: 404 - Page not found')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
<div class="error-page d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="text-center">
            <h1>404</h1>
            <h2>Sorry</h2>
            <h3>Page not Found</h3>
            <p>
                The page you requested for was not found on Emploi, or may have moved location.
                <br>
                Kindly check the link entered. If this is a mistake, please don't hesitate to <a href="/contact">contact us</a> <br>
            </p>
            <a href="/" class="btn btn-orange">Home</a>
        </div>
    </div>
</div>
@endsection