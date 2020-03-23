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
           @foreach($referees as $ref)
            <div class="col-md-6 col-xs-6 text-left row">
                <div class="col-md-8 offset-md-2">
                    <strong>{{ $ref->name }}</strong><br>
                    {{ $ref->relationship.' at '.$ref->organization }}<br>                                
                     @if($ref->ready)                                                      
                    <a href="referee/{{ $ref->slug }}">
                    <i class="fa fa-file"></i>View Report
                    </a>
                    @else
                    <p>* Referee has not provided assesment</p>
                    <br>
                    @endif
                </div>           
            </div>
          @endforeach
        </div>
 </div>     
@endsection
