@extends('layouts.dashboard-layout')

@section('title','Emploi :: Invoice Paid')

@section('description')
Emploi is the Leading Platform for Talent Assessment and Matching for SME's in Africa.
@endsection

@section('content')
@section('page_title', 'Invoice Paid')

<div class="card">
    <div class="card-body text-center">
        <p>
            The Invoice <b>{{ $invoice->slug }}</b> was paid successfully.
        </p>
        {{-- @include('components.ads.responsive') --}}
        <p>
            Here is your tracking code: <strong>{{ $invoice->pesapal_transaction_tracking_id }}</strong>
        </p>
        <p>
            Thank you for choosing Emploi.
        </p>

        @if(isset(Auth::user()->id))
        <a href="/home" class="btn btn-sm btn-orange">Home</a>
        @else
        <a href="/employers/register" class="btn btn-sm btn-orange">Employer Registration</a>
        <a href="/employers/register" class="btn btn-sm btn-orange-alt">Job Seeker Registration</a>
        <a href="/employers/register" class="btn btn-sm btn-purple">{{ __('auth.login') }}</a>
        @endif
    </div>

</div>

@endsection