@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Job Seeker Referee Report')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Job Seeker Referee Report')

<div class="card">
    <div class="card-body">
        <div class="row align-items-center">            
            <div class="col-lg-10 col-9">                
                <h4><b><u>Referee Report</u></b></h4>
                @forelse($refereeReport as $rr)
                  <div class="row">
                      <div class="col-md-4">
                          Seeker_ID:
                      </div>
                      <div class="col-md-4">
                          {{ $rr->seeker_id }}
                      </div>
                  </div>  

                   <div class="row">
                      <div class="col-md-4">
                          Referee_ID:
                      </div>
                      <div class="col-md-4">
                          {{ $rr->referee_id }}
                      </div>
                  </div>  

                   <div class="row">
                      <div class="col-md-4">
                          Reason_for_leaving:
                      </div>
                      <div class="col-md-4">
                          {{ $rr->reason_for_leaving }}
                      </div>
                  </div>

                    <div class="row">
                      <div class="col-md-4">
                          Strengths:
                      </div>
                      <div class="col-md-4">
                          {{ $rr->strengths }}
                      </div>
                  </div> 

                    <div class="row">
                      <div class="col-md-4">
                          Weaknesses:
                      </div>
                      <div class="col-md-4">
                          {{ $rr->weaknesses }}
                      </div>
                  </div> 

                    <div class="row">
                      <div class="col-md-4">
                          Professionalism:
                      </div>
                      <div class="col-md-4">
                          {{ $rr->professionalism }}
                      </div>
                  </div>  

                   <div class="row">
                      <div class="col-md-4">
                          Would_you_rehire:
                      </div>
                      <div class="col-md-4">
                          {{ $rr->would_you_rehire }}
                      </div>
                  </div>

                   <div class="row">
                      <div class="col-md-4">
                          Comments:
                      </div>
                      <div class="col-md-4">
                          {{ $rr->comments }}
                      </div>
                  </div>  


                   <div class="row">
                      <div class="col-md-4">
                          Status:
                      </div>
                      <div class="col-md-4">
                          {{ $rr->status }}
                      </div>
                  </div>              
            </div>
            
        @empty
        <p class="text-center">
            No Referee Report Found
        </p>
        @endforelse                     
                       
        </div>
     </div>
 </div>
@endsection