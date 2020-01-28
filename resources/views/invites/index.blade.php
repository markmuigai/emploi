@extends('layouts.dashboard-layout')

@section('title','Emploi :: My Invites')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'My Invites')

<div class="card">
    <div class="card-body">
        <h4>
            My Invites [{{ Auth::user()->totalCredits }} credits]
            <a href="/profile/invites/create" style="float: right;" class="btn btn-sm btn-link">Create Invite</a>
        </h4>
        <hr>
        <div class="row">
            @include('components.ads.responsive')
            @forelse($invites as $invite)

                <div class="col-md-10 offset-md-1" style="margin-bottom: 0.5em">
                    <p>
                        <a href="/profile/invites/{{ $invite->slug }}" style="font-weight: bold">Invite Created {{ $invite->since }}</a>
                        <span style="float: right;">
                            {{ $invite->clicks_count }} clicks
                        </span>
                    </p>
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

                    
                </div>


            @empty
            <p>
                No invites have been created.
            </p>
            @endforelse
        </div>
        <div>
            {{ $invites->links() }}
        </div>
    </div>
</div>

@endsection
