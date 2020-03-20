@extends('layouts.dashboard-layout')
   
@section('title','Emploi Admin :: Job Seeker Referee Report')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title','Referee Report')

<div class="container"> 
     <div class="row">
          <div class="col-md-2 offset-md-1">
              <img src="/images/avatar.png" style="width: 100%; border-radius: 50%">
          </div>
          <div class="col-md-7" style="text-align: center;">
              <h4 class="font-weight-strong">{{ $referee->seeker->user->name }}</h4>
              <p>Industry: {{ $referee->seeker->industry->name }}</p>
              @if(isset($referee->seeker->location_id))
              <p>Location: {{ $referee->seeker->location->name }}</p>
              @endif
              <p>{{ $referee->seeker->user->updated_at->diffForHumans() }} </p>
          </div>
      </div>
      
      <div class="row mt-1">
          <div class="col-md-10 offset-md-1" style="text-align: center;">
              <p> {{ $referee->seeker->objective }}</p>
          </div>
        
           
      </div>

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
              <h5 class="font-weight-strong">Organization: {{ $referee->organization }}</h5>
               <p>Position Held: {{ $referee->position_held }}</p>
               <p>Relationship: {{ $referee->relationship }} </p>
          </div>
      </div>
              
      <div class="row">
        <div class="col-md-12" style="text-align: center;">
        <h4><b>JOB TITLE:</b> 
            @foreach($referee->seekerJobs as $job)
              {{ $job->job_title }}
            @endforeach
         </h4>
          <p>Industry: {{ $referee->seeker->industry->name }} </p>
          <p>Start Date:
            @foreach($referee->seekerJobs as $st)
              {{ $st->start_date }}
            @endforeach
          </p>
          <p>End Date:
            @foreach($referee->seekerJobs as $ed)
              {{ $ed->end_date }}
            @endforeach
          </p>        
      </div>

      <div class="col-md-12" style="text-align: center;">
        <h4 class="font-weight-light"></h4>
          <p>Meet Target: 
            @foreach($referee->seekerJobs as $target)
              {{ $target->meeting_targets }}%
            @endforeach
          </p>
          <p>Performance:
            @foreach($referee->seekerJobs as $performance)
              {{ $performance->work_performance }}%
            @endforeach
          </p>
          <p>Work Qaulity:
             @foreach($referee->seekerJobs as $quality)
              {{ $quality->work_quality }}%
            @endforeach
          </p>
      </div>


      @if(count($referee->seekerIndustrySkills) > 0)
      <div class="row">
        <div class="col-md-12" style="text-align: center;">
          <br><h4>SKILLS</h4>
            <div class="row">
                @foreach($referee->seekerIndustrySkills as $skill)
                <div class="col-md-4 card">
                   {{ $skill->industrySkill->name }}
                   <br>
                   {{ $skill->weight }}                
                </div>
                @endforeach
            </div>
      </div>
      @endif

      <div class="col-md-12" style="text-align: center;">
          <h4>OTHER SKILLS</h4>
            <p>
            @foreach($referee->otherSeekerSkills as $otherSkill)
              {{ $otherSkill->name }}<br>
            @endforeach
            </p>
      </div>
             
       <div class="col-md-12" style="text-align: center;">
           <p><b>STRENGTHS:</b> {{ $referee->jobApplicationReferee->strengths }}
          </p>
          <p><b>WEAKNESSES:</b> {{ $referee->jobApplicationReferee->weaknesses }}</p>        
      </div>

      <div class="col-md-12" style="text-align: center;">
        <br><h4><b>OTHER DETAILS</b></h4>
          <h4 class="font-weight-light"></h4>
            <p>Professionalism:{{ $referee->jobApplicationReferee->professionalism }}</p>
            <p>Disciplinary Cases: {{ $referee->jobApplicationReferee->discplinary_cases }}</p>
            <p>Would you Rehire: {{ $referee->jobApplicationReferee->would_you_rehire }}</p>
      </div>
      
      @if(count($referee->seekerPersonalityTraits) !== 0)
      <div class="col-md-12" style="text-align: center;">
        <h4 class="font-weight-strong">PERSONALITY TRAITS</h4>
          <p>
            @foreach($referee->seekerPersonalityTraits as $trait)
              {{ $trait->personalityTrait->name }}<br>
            @endforeach
          </p>       
      </div>
      @endif
      <div class="col-md-12" style="text-align: center;">
          <h4 class="font-weight-strong">REASONS FOR LEAVING</h4>
          <p> {{ $referee->jobApplicationReferee->reason_for_leaving }} </p>       
      </div>

      @if($referee->jobApplicationReferee->comments !=null)
       <div class="col-md-12" style="text-align: center;">
            <h4 class="font-weight-strong">COMMENTS</h4>
            <p>{{ $referee->jobApplicationReferee->comments }}</p>       
      </div>
      @endif
      </div>        
    
    </div>
</div>     
@endsection