@extends('layouts.dashboard-layout')

@section('title','Emploi :: Invite Created')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Invite Created')

<div class="card">
    <div class="card-body">
        <h4>
            Invite Created [{{ Auth::user()->totalCredits }} credits]
            <a href="/profile/invites/create" style="float: right;" class="btn btn-sm btn-link">Create Invite</a>
        </h4>
        <hr>
        <div>
            <b>Success!</b> <br>
            Invite has been created successfully.
            @include('components.ads.responsive')
            <br>
            <br>
            <p>
                Share link:
                <a href="{{ $invite->shareFacebookLink }}" target="_blank" rel="noreferrer" style="margin-right: 1em"><i class="fab fa-facebook-f"></i></a>
                <a href="{{ $invite->shareTwitterLink }}" target="_blank" rel="noreferrer" style="margin-right: 1em"><i class="fab fa-twitter"></i></a>
                <a href="{{ $invite->shareLinkedinLink }}" target="_blank" rel="noreferrer" style="margin-right: 1em"><i class="fab fa-linkedin"></i></a>
                <a href="{{ $invite->shareWhatsappLink }}" data-action="share/whatsapp/share" target="_blank" rel="noreferrer" style="margin-right: 1em"><i class="fab fa-whatsapp"></i></a>

            </p>
            <p style="text-align: center;">
                
                <a href="{{ url('/invites/'.$invite->slug) }}" target="_blank">
                    {{ url('/invites/'.$invite->slug) }}
                </a>
            </p>
            <hr>
            <a href="/profile/invites/{{ $invite->slug }}" class="btn btn-orange">View</a>
            <a href="/profile/invites" class="btn btn-primary">My Invites</a>
        </div>
    </div>
</div>

@endsection
