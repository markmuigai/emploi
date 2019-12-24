@extends('layouts.dashboard-layout')

@section('title','Emploi :: '.$app->user->name.' Referees')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Referees')

<div class="card">
    <div class="card-body">
        <h2>{{ $app->user->name }} Referees</h2>
        <a href="/employers/applications/{{ $app->post->slug }}/{{ $app->id }}/rsi/referees/add" class="btn btn-orange pull-right">Request Referee</a>

        @if(count($app->user->seeker->referees) > 0)

        <h4>Selected Referees</h4>
        <div class="row">
            @forelse($app->seekerApplications as $b)
            <div class="col-md-4 col-6">
                {{ dd($b->jobApplicationReferee) }}
                {{ $b->jobApplicationReferee->referee->relationship }} at {{ $b->jobApplicationReferee->referee->organization }}
                <strong>{{ $b->jobApplicationReferee->referee->name }}</strong>
            </div>
            @empty
        </div>

        <p>No referees selected for RSI</p>

        @endforelse

        <hr>

        <h4>All Referees</h4>
        <div class="row">
            @forelse($app->user->seeker->referees as $ref)
            <div class="col-md-6 col-xs-6 text-left">
                {{ $ref->relationship.' at '.$ref->organization }}
                <strong>{{ $ref->name }}</strong>
                @if($ref->ready)
                <hr>
                <p>
                    <input type="checkbox" onchange="window.location='/employers/applications/{{ $app->post->slug }}/{{ $app->id }}/rsi/referees/toggle?referee_id={{ $ref->id }}'" @if($app->usesReferee($ref->id))
                    checked=""
                    @else
                    @endif


                    Add to RSI
                </p>

                @else

                <p>* Referee has not provided assesment</p>

                @endif
            </div>
            @empty
            @endforelse
        </div>
        @else
        <p>
            {{ $app->user->name }} has no referees indicated. <a href="/employers/applications/{{ $app->post->slug }}/{{ $app->id }}/rsi/referees/add">Request Referee</a>
        </p>
        @endif

        <a href="/employers/applications/{{ $app->post->slug }}/{{ $app->id }}/rsi" class="btn btn-purple">View RSI</a>

    </div>

    @endsection
