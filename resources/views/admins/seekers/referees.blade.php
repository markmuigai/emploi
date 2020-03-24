@extends('layouts.dashboard-layout')

@section('title','Emploi ::  Referees')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Referees')

<div class="card">
    <h4>All Referees</h4>
        <div class="row">
           @forelse($referees as $ref)
            <div class="col-md-6 col-xs-6 text-left row">
                <div class="col-md-8 offset-md-2">
                    <strong>{{ $ref->name }}</strong><br>
                    <span style="font-style: italic;">{{ $ref->relationship }}</span> at {{ $ref->organization }}  <br> 
                     <p>Updated at:  {{ $ref->updated_at->diffForHumans() }} </p>      @if($ref->ready)                                                      
                    <a href="referee/{{ $ref->slug }}">
                    <i class="btn btn-primary">View Report</i>
                    </a>
                    @else
                    <p style="color: red"> Referee has not provided assesment</p>
                    <br>
                    @endif
                </div>           
            </div>
            @empty
            <p>No Referee Indicated</p>
          @endforelse         
        </div>
 </div>     
@endsection
