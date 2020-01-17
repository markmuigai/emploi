@extends('layouts.dashboard-layout')

@section('title','Emploi :: Create Invite')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Create Invite')

<div class="card">
    <div class="card-body">
        <h4>Create Invite</h4>
        <form method="POST" action="/profile/invites">
            @csrf
            <div class="form-group">
                <textarea class="form-control" name="message" required="" id="message" rows="5" placeholder="Add message for your referrals" maxlength="500">{{ Auth::user()->inviteText }}</textarea>
            </div>
            <div class="form-actions text-right">
                <input type="submit" class="btn btn-primary btn-sm" name="" value="Save Invite">
            </div>
        </form>
    </div>
</div>

@endsection
