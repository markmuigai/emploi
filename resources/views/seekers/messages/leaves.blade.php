@extends('layouts.dashboard-layout')

@section('title','Leave Requests') )

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title', 'Leave Requests and Status') 

@section('content')

<a href="/job-seekers/dashboard" class="btn btn-orange">
    <i class="fa fa-arrow-left"></i>Back
</a><br><br>
<div class="card">
    <div class="card-body">
       
                @foreach ($leaves as $m)
                    <br>
                    <div class="row d-flex">
                    <h5 class="mr-5 ml-3 pr-5"><b> </b>{{ $m->id }}</h5>
                    <h6>{{ $m->reason }}</h6>
                    </div>
                    <br>

                    <hr>
                @endforeach
            </div>
       
    </div>
</div>

@endsection