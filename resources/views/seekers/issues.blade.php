@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Issues') )

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title', 'Issues') 

@section('content')

<a href="/job-seekers/dashboard" class="btn btn-orange">
    <i class="fa fa-arrow-left"></i>Back
</a><br><br>
<div class="card">
    <div class="card-body">
        <div class="row" style="text-align: right; ">
        </div>
        <div class="row">
        @forelse($i as $issues)        
            <div class="col-md-10 offset-md-1">
            <br>
               <div class="row d-flex">
                <h3 class="mr-5 ml-3"><b> </b>{{ $issues->title }}</h3>
                <h5 class="ml-5 orange">Due in {{ Carbon\Carbon::parse($issues->due_date)->diffForHumans() }}</h5>
                </div>

                <p><strong>Created:</strong> {{ $issues->created_at->diffForHumans() }}</p>
                <p><strong>Updated:</strong> {{ $issues->updated_at->diffForHumans() }}</p>
                <p>
                    <a href="/job-seekers/issue/{{ $issues->id }}" class="btn btn-orange btn-sm">View</a>
                </p>
                <hr>               
            </div>     
        
        @empty
        <p class="text-center">
            No Issues Found
        </p>
        </div>
        @endforelse
    </div>
</div>
{{ $i->links() }}

@endsection