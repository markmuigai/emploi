@extends('layouts.dashboard-layout')

@section('title','Emploi Invite from '.$invite->user->name)

@section('description')
{{ $invite->message }}
@endsection

@section('content')
@section('page_title', 'Emploi Invite')

<div class="card">
    <div class="card-body">
        <div style="text-align: center;">
            <b>Hello!</b> <br>
            {{ $invite->message }}
            <br>
            <br>

            @guest
                <a href="/employers/register" class="btn btn-orange">Employer Registion</a>
                <a href="/register" class="btn btn-primary">Job Seeker Registration</a>
            @else
                <a href="/profile/invites" class="btn btn-orange">Manage My Invites</a>
                <a href="/profile/invites/create" class="btn btn-primary">Create Invite</a>
            @endguest
            
        </div>
    </div>
</div>

@endsection
