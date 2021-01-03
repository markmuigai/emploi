@extends('layouts.sign')

@section('title','Account Updated')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('user_title', 'Account Updated')

<div class="d-flex flex-column justify-content-center align-center">
    <p>
        Your account has been updated successfully.
    </p>
    <p>
        Please login to continue.
    </p>
    {{-- @include('components.ads.responsive') --}}

    <div class="mt-4">
        <a href="/login" class="btn btn-sm btn-orange">{{ __('auth.login') }}</a>
  </div>
</div>

@endsection
