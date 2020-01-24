@extends('layouts.general-layout')

@section('title','Emploi :: 401 - Unauthorized')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="error-page d-flex flex-column justify-content-center align-items-md-end align-items-center">
    <div class="content mr-md-5 mr-0">
        <div class="text-center">
            <h1>401</h1>
            <h2>Unauthorized access</h2>
            <p>
                The page you requested for cannot be displayed as you are not authorized to access it.
            </p>
            <p>
                If this is a mistake, please don't hesitate to <a href="/contact" class="orange">contact us</a>
            </p>
            <a href="/" class="btn btn-orange">Home</a>
        </div>
    </div>
</div>
{{ \App\Jurisdiction::first()->notify(new \App\Notifications\SystemError('401 - '.url()->current())) }}
@endsection