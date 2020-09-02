@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Issues') )

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title', 'Issues') 

@section('content')

<a href="/job-seekers/dashboard" class="btn btn-default">
    <i class="fa fa-arrow-left"></i>Back
</a>
<div class="card">
    <div class="card-body">
        <div class="row" style="text-align: right; border-bottom: 0.1em solid #ff5e00">
        </div>
        <div class="row">
        @forelse($i as $issues)        
            <div class="col-md-10 offset-md-1">
                <h4>{{ $issues->title }} </h4>
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