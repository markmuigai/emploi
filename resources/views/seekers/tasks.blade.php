@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Tasks') )

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title', 'Tasks') 

@section('content')

<a href="/job-seekers/dashboard" class="btn btn-orange">
    <i class="fa fa-arrow-left"></i>Back
</a><br><br>
<div class="card">
    <div class="card-body">
        <div class="row" style="text-align: right; ">
        </div>
        <div class="row">
        @forelse($tasks as $t)        
            <div class="col-md-10 offset-md-1">
            <br>
               <div class="row d-flex">
                <h3 class="mr-5 ml-3"><b> </b>{{ $t->title }}</h3>
                <h5 class="ml-5 orange">Due in {{ Carbon\Carbon::parse($t->due_date)->diffForHumans() }}</h5>
                </div>

                <p>{{ $t->description}}</p>

                <p><strong>Created:</strong> {{ $t->created_at->diffForHumans() }}</p>
                <p><strong>Updated:</strong> {{ $t->updated_at->diffForHumans() }}</p>
                <p>
                    <a href="/job-seekers/issue/{{ $t->slug }}" class="btn btn-orange btn-sm">View Issues</a>
                </p>
                <hr>               
            </div>     
        
        @empty
        <p class="text-center">
            No Task Found
        </p>
        </div>
        @endforelse
    </div>
</div>
{{ $tasks->links() }}

@endsection