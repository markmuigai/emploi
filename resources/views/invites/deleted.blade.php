@extends('layouts.dashboard-layout')

@section('title','Emploi :: Invite Deleted')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Invite Deleted')

<div class="card">
    <div class="card-body">
        <h4>
            Invite Deleted [{{ Auth::user()->totalCredits }} credits]
            <a href="/profile/invites/create" style="float: right;" class="btn btn-sm btn-link">Create Invite</a>
        </h4>
        {{-- @include('components.ads.responsive') --}}
        <hr>
        <div>
            <b>Success!</b> <br>
            Invite <u>{{ $slug }} has been deleted</u> successfully. Visitors to the link will still be able to register normally. 
            <br>
            <br>
            <a href="/profile/invites" class="btn btn-primary">My Invites</a>
        </div>
    </div>
</div>

@endsection
