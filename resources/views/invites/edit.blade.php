@extends('layouts.dashboard-layout')

@section('title','Emploi :: Edit Invite')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Edit Invite')

<div class="card">
    <div class="card-body">
        <h4>Edit Invite</h4>
        @include('components.ads.responsive')
        <form method="POST" action="/profile/invites/{{ $invite->slug }}">
            @csrf
            {{ method_field('PUT') }}
            <div class="form-group">
                <textarea class="form-control" name="message" required="" id="message" rows="5" placeholder="Add message for your referrals" maxlength="500">{{ $invite->message ? $invite->message : Auth::user()->inviteText }}</textarea>
            </div>
            <div class="form-actions">
                <input type="submit" class="btn btn-primary btn-sm" name="" value="Update Invite">
                <span class="btn btn-sm btn-danger " style="float:right" id="startDeleteInvite">Delete Invite</span>

            </div>
        </form>
        <form style="display: none;" id="deleteInvite" action="/profile/invites/{{ $invite->slug }}" method="POST">
            @csrf
            {{ method_field('DELETE') }}
        </form>
    </div>
</div>
<script type="text/javascript">
    $().ready(function(){
        $('#startDeleteInvite').click(function(){
            var r = confirm("Are you sure you want to delete this Invite?");
            if (r == true) {
              notify('Deleting Invite ...');
              $('#deleteInvite').submit();
            }
        });
    });
    
</script>

@endsection
