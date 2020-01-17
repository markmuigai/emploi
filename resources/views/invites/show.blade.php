@extends('layouts.dashboard-layout')

@section('title','Emploi :: Invite '.$invite->slug)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Invite '.$invite->slug)

<div class="card">
    <div class="card-body">
        <h4>
            <a href="/profile/invites" class="btn btn-sm"><i class="fa fa-arrow-left"></i></a>
            {{ $invite->slug }}
            <small>
                [{{ $invite->clicks_count }} clicks]
            </small>
            
        </h4>
        <hr>
        <div>
            <b>Message</b> <br>
            {{ $invite->message ? $invite->message : Auth::user()->inviteText }}
            <br>
            <hr>
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
            <br>
            <a href="/profile/invites/{{ $invite->slug }}/edit" class="btn btn-sm btn-link">Edit Invite</a>
            <span class="btn btn-sm btn-danger " style="float:right" id="startDeleteInvite">Delete Invite</span>

            <form style="display: none;" id="deleteInvite" action="/profile/invites/{{ $invite->slug }}" method="POST">
            @csrf
            {{ method_field('DELETE') }}
        </form>
            
        </div>
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
