@extends('layouts.sign')

@section('title','Emploi :: E-mail Exists')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('user_title', 'E-mail Account Exists')

<div class="d-flex flex-column justify-content-center align-center">
    <p>An account with the e-mail address <strong>{{ $email }}</strong> already exists in our database.</p>
    @include('components.ads.responsive')
    <p>Please use a different e-mail address or log in to your account</p>

    <div class="mt-4">
        <a href="/login" class="btn btn-orange">{{ __('auth.login') }}</a>
        <a href="/join" class="btn btn-orange-alt">{{ __('auth.register') }}</a>
    </div>
</div>

@endsection
