@extends('layouts.dashboard-layout')

@section('title','Emploi :: @'.$application->user->username.' || RSI '.$application->user->seeker->getRsi($application->post).'%')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'RSI Rating')

<div class="container">
    <div class="card">
        <div class="card-body text-center">
            <h2>{{ $application->user->name }}</h2>
            <p>
                RSI -
                <a href="/employers/applications/{{ $application->post->slug }}">{{ $application->post->title }}</a>
                | {{ $application->user->seeker->getRsi($application->post) }}%
            </p>
            <p>
                {{ $application->user->seeker->years_experience }}yr{{ $application->user->seeker->years_experience > 1 ? 's' : '' }} experience in <strong>{{ $application->user->seeker->industry->name }}</strong> <br>
                {{ $application->user->seeker->sex }} <br>
                @if(isset($application->user->seeker->location_id))
                {{ $application->user->seeker->location->name }}, {{ $application->user->seeker->location->country->code }}
                @endif
            </p>
            <div class="row">
                <!-- <div class="col-lg-3 col-md-6 col-12" style="display: none;margin-bottom: 0.5em; border-bottom: 0.1em solid gray">
                            Personality Traits<br>
                            <a class="btn btn-edit btn-orange-alt" href="/employers/applications/{{ $application->post->slug }}/{{ $application->id }}/rsi/personality">
                                @if(isset($application->seekerPersonality->id))
                                {{ $application->seekerPersonality->personality->name }}
                                @else
                                -not set-
                                @endif
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12" style="display: none; margin-bottom: 0.5em; border-bottom: 0.1em solid gray">
                            IQ Scores <br>
                            <a class="btn btn-edit btn-orange-alt" href="/employers/applications/{{ $application->post->slug }}/{{ $application->id }}/rsi/iq">
                                {{ $application->iqScore }}%
                            </a>
                        </div> -->
                <div class="col-lg-3 col-md-6 col-12">
                    Interview <br>
                    <a class="btn btn-edit btn-orange-alt" href="/employers/applications/{{ $application->post->slug }}/{{ $application->id }}/rsi/interview">
                        {{ $application->interviewScore }}%
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    Psychometric <br>
                    <a class="btn btn-edit btn-orange-alt" href="/employers/applications/{{ $application->post->slug }}/{{ $application->id }}/rsi/psychometric">
                        {{ $application->psychometricScore }}%
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    Company Size <br>
                    <a class="btn btn-edit btn-orange-alt" href="/employers/applications/{{ $application->post->slug }}/{{ $application->id }}/rsi/company-sizes">
                        @if(count($application->seekerPreviousCompanySizes) > 0)
                        {{ count($application->seekerPreviousCompanySizes) }} added
                        @else
                        - not set -
                        @endif
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    Referees <br>
                    <a class="btn btn-edit btn-orange-alt" href="/employers/applications/{{ $application->post->slug }}/{{ $application->id }}/rsi/referees">Manage</a>
                </div>
            </div>
            <div class="pt-4">
                <a class="btn btn-purple" href="/employers/applications/{{ $application->post->slug }}/{{ $application->id }}/cover"><i class="far fa-file"></i> Cover Letter</a>
                <a href="/employers/browse/{{ $application->user->username }}" class="btn btn-orange"><i class="fas fa-user"></i> Profile</a>
                <a class="btn btn-purple" href="{{ asset('/storage/resumes/'.$application->user->seeker->resume) }}"><i class="far fa-file"></i> Resume</a>
            </div>
        </div>
    </div>
</div>


@endsection
