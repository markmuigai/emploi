@extends('layouts.dashboard-layout')

@section('title','Leave Requests') )

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title', 'Leave Requests and Status') 

@section('content')

<style>
    hr {
    color:#ddd;
    background-color: #E1573A; 
    height:2px;
    border:none;
    max-width:100%;
    }
</style>

<a href="/job-seekers/dashboard" class="btn btn-orange">
    <i class="fa fa-arrow-left"></i> Back
</a><br><br>
<div class="card">
    <div class="card-body">
       
                @foreach ($leaves as $m)
                    <br>
                    <div class="row ml-1 mb-1">
                        <p class="h4">{{ $m->reason }}</p>
                    </div>

                    <div>
                        <strong>Start On:</strong> {{ Carbon\Carbon::parse($m->start_time)->diffForHumans() }}<br>
                        <strong>End On:</strong> {{ Carbon\Carbon::parse($m->end_time)->diffForHumans() }} <br>
                        <h6 class="orange" style="text-align:right">{{ $m->status }}</h6>
                    </div>

                    <br>

                    <hr>
                @endforeach
            </div>
       
    </div>
</div>

@endsection