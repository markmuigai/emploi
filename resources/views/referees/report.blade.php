@extends('layouts.dashboard-layout')
   
@section('title','Emploi Admin :: Job Seeker Referee Report')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title','Referee Report')

<div class="container-fluid">
    <div class="card shadow p-1 bg-white rounded px-5">
        {{-- <div class="row justify-content-end">
            <div class="col-md-3 my-2">
                <a href="#" class="btn btn-success float-right">
                    Download Report
                </a>
            </div>
        </div> --}}
        <div class="row mt-5">
            <div class="col-md-12">
                    <h6>Updated: {{ $referee->updated_at->diffForHumans() }} </h6>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h4 class="text-center">Personal Information</h4>
                            </div>
                            <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-3">
                                            <img src="/images/avatar.png" style="width: 80%; border-radius: 50%">
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-8" style="text-align: center;">
                                            <br>
                                            <h4 class="font-weight-strong">{{ $referee->seeker->user->name }}</h4>
                                            <p><strong>Industry:</strong> {{ $referee->seeker->industry->name }}</p>
                                            @if(isset($referee->seeker->location_id))
                                            <p><strong>Location:</strong> {{ $referee->seeker->location->name }}</p>
                                            @endif
                                            <p><strong>Submitted:</strong>  {{ $referee->seeker->user->updated_at->diffForHumans() }} </p>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">
                                    Referee Details
                                </h4>
                            </div>
                            <div class="card-body px-2">
                                @if($referee->seeker->objective)
                                    <p class="text-center mb-4"> {{ $referee->seeker->objective }}</p>
                                @endif
                        
                                <div class="row" style=" width: 100%">
                                    <div class="col-md-7" style="text-align: center; ">
                                        <h4>REFEREE</h4> 
                                        <p>{{ ucwords($referee->name ) }}</p>
                                        <p>
                                            <strong>Email: </strong>
                                        <a href="mailto:{{ $referee->email }} ">{{ $referee->email }} </a> <br>
                                        <strong>Phone:</strong> <a href="tel:{{ $referee->phone_number }}">{{ $referee->phone_number }}</a>
                                        </p>
                        
                                    </div>
                                    <div class="col-md-5" style="text-align: center;">
                                        <h5 class="font-weight-strong">{{ strtoupper($referee->organization) }}</h5>
                                        <p><strong>Position:</strong> {{ $referee->position_held }}</p>
                                        <p><strong>Relationship:</strong> {{ $referee->relationship }} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Assessment</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 p-3">
                                <h5 class="card-title text-center">Professionalism</h5>
                                <?php 
                                    $assessment = [
                                        '100' => 'Very Professional',
                                        '80' => 'Professional',
                                        '50' => 'Not Professional'
                                    ]; 
                                ?>
                                <p class="text-center" style=" font-style: italic;">
                                    {{ $assessment[$referee->jobApplicationReferee->professionalism] }}
                                </p>
                            </div>
                            <div class="col-md-4 p-3">
                                <h5 class="card-title text-center">Disciplinary Cases</h5>
                                <p class="text-center" style=" font-style: italic;">{{ $referee->jobApplicationReferee->discplinary_cases }}</p>  
                            </div>
                            <div class="col-md-4 p-3">
                                <h5 class="card-title text-center">Would you Rehire</h5>
                                <p style="text-align: center; font-style: italic;">{{ $referee->jobApplicationReferee->would_you_rehire }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">
                                    Position{{  count($referee->seekerJobs) == 1 ? '' : 'S' }} Held
                                </h4>
                            </div>
                            <div class="card-body">
                                @forelse($referee->seekerJobs as $job)
                                    <h5>
                                        {{ $job->job_title }}
                                    </h5>
                                    <?php
                                        $start_date = \Carbon\Carbon::createFromDate($job->start_date);
                                        $end_date = \Carbon\Carbon::createFromDate($job->end_date);
                                    ?>
                                    <p>
                                        <b>Dates</b>: {{ $start_date->format('d-M-Y') }} <i class="fa fa-arrow-right"></i>   {{ $end_date->format('d-M-Y') }}
                                    </p>
                                    <br>
                                    
                                    <b>Duration</b>: {{ $end_date->diffInMonths($start_date) }} Months <br>
                                    <b>Left Position</b>: {{ $end_date->diffForHumans() }}
                                    <hr>
                                    <?php 
                                        $assessment = [
                                            '100' => 'Excellent',
                                            '80' => 'Above Average',
                                            '50' => 'Average',
                                            '30' => 'Below Average',
                                            '0' => 'Poor'
                                            ]; 
                                    ?>
                                    <p>Ability to meet targets: 
                                        <span style="float: right;">
                                            {{ $assessment[$job->meeting_targets] }} 
                                        </span>
                                    </p>
                                    <p>Work Performance: 
                                        <span style="float: right;">
                                            {{ $assessment[$job->work_performance] }}
                                        </span>
                                    </p>
                                        <p>Work Quality: 
                                            <span style="float: right;">
                                                {{ $assessment[$job->work_quality] }}
                                            </span>
                                        </p>
                                @empty
                                <div>
                                    <p>No positions have been indicated</p>
                                </div>
                        
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Strengths</h4>
                            </div>
                            <div class="card-body">
                                @if($referee->jobApplicationReferee->strengths)
                                <p class="text-center">
                                    {{ $referee->jobApplicationReferee->strengths }}
                                </p>
                                @else
                                    <h4 class="text-center p-3">
                                        No strengths listed
                                    </h4>
                                @endif
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Weaknesses</h4>
                            </div>
                            <div class="card-body">
                                @if($referee->jobApplicationReferee->weaknesses)
                                    <p class="text-center">
                                        {{ $referee->jobApplicationReferee->weaknesses }}
                                    </p>
                                @else
                                    <h4 class="text-center p-3">
                                        No weakness listed
                                    </h4>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Personality Traits</h4>
                    </div>
                    <div class="card-body">
                        @if(count($referee->seekerPersonalityTraits) !== 0)
                            @foreach($referee->seekerPersonalityTraits as $trait)
                                <p>
                                    {{ $trait->personalityTrait->name }}
                                </p>
                            @endforeach
                        @else
                        <h5 class="text-center p-3">
                            No personality traits listed
                        </h5>
                        @endif
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Reason For Leaving</h4>
                    </div>
                    <div class="card-body">
                        @if($referee->jobApplicationReferee->reason_for_leaving)
                            <p class="text-center"> {{ $referee->jobApplicationReferee->reason_for_leaving }} </p> 
                        @else
                            <h5 class="text-center p-3">
                                No reason provided for leaving
                            </h5>
                        @endif
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Comments</h4>
                    </div>
                    <div class="card-body">
                        @if($referee->jobApplicationReferee->comments)
                            <p class="text-center">{{ $referee->jobApplicationReferee->comments }} </p> 
                        @else
                            <h5 class="text-center p-3">
                                No comments provided
                            </h5>
                        @endif
                    </div>
                </div>                      
            </div>
        </div>
    </div>
</div>    
@endsection