@extends('layouts.dashboard-layout')

@section('title','Emploi :: Add '.$app->user->name."'s Referee")

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Add Referee')
<div class="card">
    <div class="card-body">
        <h3>Add {{ $app->user->name }}'s Referee</h3>

        <div class="text-center">
            <p>
                Request {{ $app->user->name }} to include referees by sending them an online form to fill. <br>
                An e-mail will be sent to {{ $app->user->name }} with instructions.
            </p>
            <a class="btn btn-orange-alt" href="/employers/applications/{{ $app->post->slug }}/{{ $app->id }}/rsi/referees/request">Send request</a>


            <hr>
            <a href="/employers/applications/{{ $app->post->slug }}/{{ $app->id }}/rsi" class="btn btn-purple btn-sm">View RSI</a>
            <a href="/employers/applications/{{ $app->post->slug }}/{{ $app->id }}/rsi/referees" class="btn btn-orange btn-sm">View Referees</a>
        </div>
    </div>
</div>



@endsection