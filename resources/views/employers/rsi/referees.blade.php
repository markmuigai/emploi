@extends('layouts.dashboard-layout')

@section('title','Emploi :: '.$app->user->name.' Referees')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Referees')

<div class="card">
    <div class="card-body">
        <h2>
            <a href="/employers/applications/{{ $app->post->slug }}/{{ $app->id }}/rsi" class="btn btn-default"><i class="fa fa-arrow-left"></i> View RSI</a>
            {{ $app->user->name }}'s Referees
        </h2>
        <hr>

        @if(count($app->user->seeker->referees) > 0)
        <div class="col-md-8">
            <h4>Selected Referees</h4>
            <div class="row">
                @forelse($app->seekerApplications as $b)
                <div class="col-md-4 col-6">
                    {{ $b->jobApplicationReferee->referee->relationship }} at {{ $b->jobApplicationReferee->referee->organization }}
                    <strong>{{ $b->jobApplicationReferee->referee->name }}</strong>
                </div>
                @empty
                <p>No referees selected for RSI</p>

                @endforelse
            </div>
        </div>
        

        

        <hr>

        <h4>All Referees</h4>
        <div class="row">
            @forelse($app->user->seeker->referees as $ref)
            <div class="col-md-6 col-xs-6 text-left row">
                <div class="col-md-8 offset-md-2">
                    {{ $ref->relationship.' at '.$ref->organization }}
                    <br>
                    <strong>{{ $ref->name }}</strong>
                    <br>
                    @if($ref->ready)
                    <hr>
                    <p>
                        <input type="checkbox" onchange="window.location='/employers/applications/{{ $app->post->slug }}/{{ $app->id }}/rsi/referees/toggle?referee_id={{ $ref->id }}'" @if($app->usesReferee($ref->id))
                        checked=""
                        @else
                        @endif
                        >


                        Add{{ $app->usesReferee($ref->id) ? 'ed' : ' to RSI' }}
                        <a href="/employers/referees/{{ $ref->slug }}" class="btn btn-sm btn-purple" style="float: right;" target="_blank">
                            
                            <i class="fa fa-file"></i> Report
                        </a>
                    </p>

                    @else

                    <p>* Referee has not provided assesment</p>

                    @endif
                    <br>
                </div>
                
                
            </div>
            @empty
            @endforelse
        </div>
        @else
        <p>
            {{ $app->user->name }} has no referees indicated. <a href="/employers/applications/{{ $app->post->slug }}/{{ $app->id }}/rsi/referees/add">Request Referee</a>
        </p>
        @endif


    </div>

    @endsection
