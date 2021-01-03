@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Invite Links' )

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title',  'Invite Links' )

@section('content')

<div class="card">
    <div class="card-body">
        <div class="" style="">
            <a href="/admin/panel" class="btn "><i class="fa fa-arrow-left"></i> Back</a>
            <a href="/profile/invites/create" class="btn btn-orange" style="float: right;">My Invite Links</a>  
        </div>
        <br>
        <div class="row">
        @forelse($inviteLinks as $r)

            <div class="col-md-6 card">
                <div class="card-body">
                    <h4>{{ $r->user->name }}</h4>
                    <p><strong>Created: {{ $r->created_at->diffForHumans() }}</strong></p>
                    <p>
                        Slug: <a href="/invites/{{ $r->slug }}">{{ $r->slug }}</a> <br>
                        [Clicks:  {{ $r->clicks_count }}]
                    </p>
                    <p>
                        Status: <b>{{ $r->status }}</b>
                    </p>
                </div>
                
            </div>
        @empty
        <p style="text-align: center;">
            No Referrals have been found.
        </p>
        </div>
        @endforelse
    </div>
</div>
{{ $inviteLinks->links() }}

@endsection