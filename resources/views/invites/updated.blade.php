@extends('layouts.dashboard-layout')

@section('title','Emploi :: Invite Updated')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Invite Updated')

<div class="card">
    <div class="card-body">
        <h4>
            Invite Updated [{{ Auth::user()->totalCredits }} credits]
            <a href="/profile/invites/create" style="float: right;" class="btn btn-sm btn-link">Create Invite</a>
        </h4>
        <hr>
        @include('components.ads.responsive')
        <div>
            <b>Success!</b> <br>
            Invite has been updated successfully.
            <br>
            <br>
            <a href="/profile/invites/{{ $invite->slug }}" class="btn btn-orange">View</a>
            <a href="/profile/invites" class="btn btn-primary">My Invites</a>
        </div>
    </div>
</div>

@endsection
