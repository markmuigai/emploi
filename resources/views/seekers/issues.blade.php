@extends('layouts.dashboard-layout')

@section('title','Emploi Seeker :: Tasks') )

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
        @forelse($issues as $i)        
            <div class="col-md-10 offset-md-1">
            <br>
               <div class="row d-flex">
                <h3 class="mr-5 ml-3"><b> </b>{{ $i->title }}</h3>
                <h5 class="ml-5 orange">Due in {{ Carbon\Carbon::parse($i->due_date)->diffForHumans() }}</h5>
                </div>

                <p><strong>Created:</strong> {{ $i->created_at->diffForHumans() }}</p>
                <p><strong>Updated:</strong> {{ $i->updated_at->diffForHumans() }}</p>
                <p>
                    <a href="/job-seekers/issues/{{ $i->id }}" class="btn btn-orange btn-sm">View</a>
                </p>
                <hr>               
            </div>     
        
        @empty
        <p class="text-center">
            No Issues Found
        </p>
          @endforelse
        </div>          
    </div>
</div>
{{ $issues->links() }}

@endsection