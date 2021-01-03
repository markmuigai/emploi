@extends('layouts.general-layout')

@section('title','Emploi :: 429 - Too Many Requests')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
<div class="error-page d-flex flex-column justify-content-center align-items-md-end align-items-center">
    <div class="content mr-md-5 mr-0">
        <div class="text-center">
            <h1>429</h1>
            <h2>Too Many Requests</h2>
            <p>
                The request cannot be completed as we received too many requests from your end.
            </p>
            <p>
                If this is a mistake, please don't hesitate to <a href="/contact">contact us</a>
            </p>
            <a href="/" class="btn btn-sm btn-orange">Home</a>
        </div>
    </div>
</div>
<?php
    $code = '429: Too Many Requests';
    $url = url()->current();
    $user = isset(Auth::user()->id) ? '['.Auth::user()->name.' - '.Auth::user()->email.']' : '[Unauthenticated user]';
    $message = $code.' '.$user.' '.$url;
    if (app()->environment() === 'production')
        \App\Jurisdiction::first()->notify(new \App\Notifications\SystemError($message));
?>
@endsection
