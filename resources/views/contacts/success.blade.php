@extends('layouts.dashboard-layout')

@section('title','Emploi :: Contact Sent')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Contact Success')

<div class="card">
    <div class="card-body text-center">
        <p>
            Your message has been sent successfully.
        </p>
        @include('components.ads.responsive')
        <p>
            Here is your tracking code: <strong>{{ $code }}</strong>
        </p>
        <p>
            Thank you for choosing Emploi.
        </p>

        @if(isset(Auth::user()->id))
        <a href="/home" class="btn btn-sm btn-orange">Home</a>
        @else
        <a href="/employers/register" class="btn btn-sm btn-orange">Employer Registration</a>
        <a href="/employers/register" class="btn btn-sm btn-orange-alt">Job Seeker Registration</a>
        <a href="/employers/register" class="btn btn-sm btn-purple">Login</a>
        @endif
    </div>

</div>

@endsection