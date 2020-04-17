@extends('layouts.dashboard-layout')

@section('title','Emploi :: Referee Saved')

@section('description')
Emploi is the Leading Platform for Talent Assessment and Matching for SME's in Africa.
@endsection

@section('content')
@section('page_title', 'Referee Saved')

<div class="card">
    <div class="card-body text-center">
        <p>
            Thank you for saving <strong>{{ $referee->name }}</strong> as your referee to your profile. An e-mail has been sent for {{ $referee->name }} provide your assessment, which will be used to boost your rank as employers do their
            shortlisting.
        </p>
        @include('components.ads.responsive')
        <p>
            Kindly get in touch with your referee to ensure an assessment is submitted.
        </p>

        <a href="/profile/add-referee" class="btn btn-orange mt-3">Add Another Referee</a>
    </div>
</div>

@endsection
