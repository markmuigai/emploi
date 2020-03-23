@extends('layouts.dashboard-layout')
   
@section('title','Emploi Admin :: Job Seeker Referee Report')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title','Referee Report')

<div class="container"> 
      <div class="row">
          <div class="col-md-3 offset-md-1">
              <img src="/images/avatar.png" style="width: 100%; border-radius: 50%">
          </div>
          <div class="col-md-7" style="text-align: center;">
              <br>
              <h4 class="font-weight-strong">{{ $referee->seeker->user->name }}</h4>
              <p>Industry: {{ $referee->seeker->industry->name }}</p>
              @if(isset($referee->seeker->location_id))
              <p>Location: {{ $referee->seeker->location->name }}</p>
              @endif
              <p>Submitted:  {{ $referee->seeker->user->updated_at->diffForHumans() }} </p>
          </div>
      </div>
      
      @if($referee->seeker->objective)
      <div class="row mt-1">
          <div class="col-md-10 offset-md-1" style="text-align: center;">
              <p> {{ $referee->seeker->objective }}</p>
          </div>
      </div>
      @endif

      <div class="row" style=" width: 100%">
          <div class="col-md-5" style="text-align: center; ">
              <h4>REFEREE</h4> 
              <p>{{ ucwords($referee->name ) }}</p>
              <p>
                 Email: <a href="mailto:{{ $referee->email }} ">{{ $referee->email }} </a> <br>
                 Phone: <a href="tel:{{ $referee->phone_number }}">{{ $referee->phone_number }}</a>
              </p>

          </div>
          <div class="col-md-7" style="text-align: center;">
              <h5 class="font-weight-strong">{{ strtoupper($referee->organization) }}</h5>
               <p>Position: {{ $referee->position_held }}</p>
               <p>Relationship: {{ $referee->relationship }} </p>
          </div>
      </div>

      <div class="row" style="text-align: center;">

          <div class="col-md-12" style="">
              <h4>ASSESSMENT</h4>
          </div>
          <div class="col-md-4 card">
              <div class="card-body">
                  <h5 class="card-title">Professionalism</h5>
                  <?php 
                      $assessment = [
                          '100' => 'Very Professional',
                          '80' => 'Professional',
                          '50' => 'Not Professional'
                        ]; 
                  ?>
                  <p style=" font-style: italic;">
                      {{ $assessment[$referee->jobApplicationReferee->professionalism] }}
                  </p>
              </div>     
          </div>

          <div class="col-md-4 card">
              <div class="card-body">
                  <h5 class="card-title">Disciplinary Cases</h5>
                  <p style=" font-style: italic;">{{ $referee->jobApplicationReferee->discplinary_cases }}</p>
              </div>   
          </div>

          <div class="col-md-4 card">
              <div class="card-body">
                  <h5 class="card-title">Would you Rehire</h5>
                  <p style="text-align: center; font-style: italic;">{{ $referee->jobApplicationReferee->would_you_rehire }}</p>
              </div>   
          </div> 
      </div>

      <div class="row" style="">
          <div class="col-md-12" style="text-align: center;">
              <h4>POSITION{{  count($referee->seekerJobs) == 1 ? '' : 'S' }} HELD</h4>
          </div>
          @forelse($referee->seekerJobs as $job)
          <div class="col-md-6 card">
              
              <div class="card-body">
                  <h5 class="card-title">
                      {{ $job->job_title }}
                  </h5>
                  <?php
                      $start_date = \Carbon\Carbon::createFromDate($job->start_date);
                      $end_date = \Carbon\Carbon::createFromDate($job->end_date);
                  ?>
                  <p class="card-subtitle">
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
                  
              </div>
          </div>

          @empty
          <div>
              <p>No positions have been indicated</p>
          </div>

          @endforelse
      </div>


      @if(count($referee->seekerIndustrySkills) > 0 || count($referee->otherSeekerSkills) > 0)
      <div class="row" style="">

          <div class="col-md-12" style="text-align: center;">
              <h4>SKILLS</h4>
          </div>
          @forelse($referee->seekerIndustrySkills as $skill)
              <div class="col-md-6 card">
                  {{ $skill->industrySkill->name }} [{{ $skill->weight/10 * 100 }}%  ]              
              </div>
          @empty
          @endforelse

          @forelse($referee->otherSeekerSkills as $otherSkill)
              <div class="col-md-6 card">
                  {{ $otherSkill->name }}            
              </div>
          @empty
          @endforelse
      </div>
      @endif

      @if($referee->jobApplicationReferee->strengths)
      <br>
      <div class="row" style="">
          <div class="col-md-3">
              <h4>STRENGTHS</h4>
          </div>
          <div class="col-md-9" style="text-align: center;">
              <p>
                  {{ $referee->jobApplicationReferee->strengths }}
              </p>
          </div>

      </div>
      <hr>
      @endif

      @if($referee->jobApplicationReferee->weaknesses)
      <br>
      <div class="row" style="">
          <div class="col-md-3">
              <h4>WEAKNESSES</h4>
          </div>
          <div class="col-md-9" style="text-align: center;">
              <p>
                  {{ $referee->jobApplicationReferee->weaknesses }}
              </p>
          </div>

      </div>
      <hr>
      @endif

      @if(count($referee->seekerPersonalityTraits) !== 0)
      <div class="row" style="">
          <div class="col-md-5">
              <h4>PERSONALITY TRAITS</h4>
          </div>
          <div class="col-md-7 row" style="text-align: center;">
              @foreach($referee->seekerPersonalityTraits as $trait)
                  <div class="card col-md-6">
                      <div class="card-title">
                        <p>
                            {{ $trait->personalityTrait->name }}
                        </p>
                      </div>
                      
                  </div>
                  
              @endforeach
          </div>
      </div>

      @endif

      @if($referee->jobApplicationReferee->reason_for_leaving)
      <hr>
      <div class="row" style="">
          <div class="col-md-5">
              <h4>REASON FOR LEAVING</h4>
          </div>
          <div class="col-md-7 row" style="text-align: center;">
              <p> {{ $referee->jobApplicationReferee->reason_for_leaving }} </p> 
          </div>
      </div>
      @endif

      @if($referee->jobApplicationReferee->comments)
      <hr>
      <div class="row" style="">
          <div class="col-md-4">
              <h4>COMMENTS</h4>
          </div>
          <div class="col-md-8 row" style="text-align: center;">
              <p> {{ $referee->jobApplicationReferee->comments }} </p> 
          </div>
      </div>
      @endif
             
</div>     
@endsection