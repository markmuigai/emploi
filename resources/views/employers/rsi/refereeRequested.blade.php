@extends('layouts.dashboard-layout')

@section('title','Emploi :: Referee Requested')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Referee Requested')

<div class="card">
    <div class="card-body text-center">
        <h2>{{ $app->user->name }}'s Referee Requested</h2>
        <p>
            Success. {{ $app->user->name }} has been informed to provide details on their referees. You will be notified once updated. <br><br>
            <a class="btn btn-danger" href="/employers/applications/{{ $app->post->slug }}/{{ $app->id }}/rsi/referees">View Referees</a>
        </p>
    </div>
</div>

@endsection
