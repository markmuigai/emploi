@extends('layouts.general-layout')

@section('title','Emploi :: CSV Import Result')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
<div class="container py-4">
    <h3 class="orange text-center">CSV Import Result</h3>
    <div class="row align-items-center">
        <div class="col-md-6">
            <h4>Successful Invites</h4>
            <div class="row">
                @forelse($successful as $invite)
                <div class="col-md-4">
                    @include('components.invitedContact')
                </div>

                @empty
                <p>No invites were successful</p>

                @endforelse
            </div>
        </div>
        <div class="col-md-6">
            <h4>Failed Invites</h4>
            <div class="row">
                @forelse($failed as $invite)
                <div class="col-md-4">
                    @include('components.invitedContact')
                </div>
                @empty
                <p>No invites failed</p>

                @endforelse
            </div>
        </div>
    </div>
    @endsection
