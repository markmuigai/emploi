@extends('layouts.general-layout')

@section('title','Account Verified')

@section('description')
Emploi is the Leading Platform for Talent Assessment and Matching for SME's in Africa.
@endsection

@section('content')

<div class="text-center my-5">
    <h2>Account Already Verified</h2>
    <p>
    	Hello {{ $user->name }},<br>
    	Your account was verified at {{ $user->email_verified_at }}.
    </p>
    {{-- @include('components.ads.responsive') --}}
    <p>
        @guest
        Click <a href="/login">here</a> to log into your account. 
        @else
        Click <a href="/home">here</a> to view your dashboard.
        @endguest
    </p>
</div>


@endsection
