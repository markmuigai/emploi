@extends('layouts.general-layout')

@section('title','Account Verified')

@section('description')
Emploi is the Leading Platform for Talent Assessment and Matching for SME's in Africa.
@endsection

@section('content')

<div class="text-center my-5">
    <h2>Account Verified Successfully</h2>
    <p>
    	Hello {{ $user->name }},<br>
    	Your account has been verified.
    </p>
    @include('components.ads.responsive')
    <p>
        @guest
        Click <a href="/login">here</a> to {{ __('auth.login') }} to your account. 
        @else
        Click <a href="/home">here</a> to view your dashboard.
        @endguest
    </p>
</div>


@endsection
