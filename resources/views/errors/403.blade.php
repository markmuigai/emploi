@extends('layouts.general-layout')

@section('title','Emploi :: 403 - Forbidden')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
<div class="error-page d-flex flex-column justify-content-center align-items-md-end align-items-center">
    <div class="content mr-md-5 mr-0">
        <div class="text-center">
            <h1>403</h1>
            <h2>Forbidden</h2>
            <p>
                The page you requested for cannot be displayed as you are forbidden from accessing it.
            </p>
            <p>
                If this is a mistake, please don't hesitate to <a href="/contact" class="orange">contact us</a </p> <p>
            </p>
            <a href="/" class="btn btn-orange">Home</a>
        </div>
    </div>
</div>
<?php
    $code = '403: Forbidden';
    $url = url()->current();
    $user = isset(Auth::user()->id) ? '['.Auth::user()->name.' - '.Auth::user()->email.']' : '[Unauthenticated user]';
    $message = $code.' '.$user.' '.$url;
    if (app()->environment() === 'production')
        \App\Jurisdiction::first()->notify(new \App\Notifications\SystemError($message));
?>
@endsection
