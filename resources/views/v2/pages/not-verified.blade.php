@extends('layouts.general-layout')

@section('title','Emploi')

@section('description')
Emploi is the Leading Platform for Talent Assessment and Matching for SME's in Africa.
@endsection

@section('content')

<div class="text-center my-5">
    <h2>Account Not Verified</h2>
    <p>
        We value our users which is why we require all accounts to be verified.
    </p>
    @include('components.ads.responsive')
    <p>
        A confirmation e-mail has been re-sent to your e-mail address.
    </p>
    <a href="/login" class="btn btn-orange">{{ __('auth.login') }}</a>
</div>


@endsection
