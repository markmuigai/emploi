@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Job Post Groups')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Job Post Groups')

<div class="card">
    <div class="card-body">
        <h4>Group Jobs for sharing 
            @if(count($postGroups) > 0)
                <a href="/admin/job-post-groups/create" style="float: right;" class="btn btn-link ">Create</a>
            @endif
        </h4>
        <div>
            @forelse($postGroups as $pg)
            <div class="row">
                <div class="col-8">
                    <b><a href="/admin/job-post-groups/{{ $pg->id }}">{{ $pg->title }}</a></b>
                    <br>
                </div>
                <div class="col-4 text-right">
                    <p>
                        STATUS: {{ $pg->status }} <br>
                        <a href="/vacancies/{{ $pg->slug }}" class="btn btn-sm btn-link">view</a>
                    </p>
                </div>
            </div>
            <div class="text-center">
                <h5>Job Posts Included ({{ count($pg->postGroupJobs) }})</h5>
                @forelse($pg->postGroupJobs as $pgs)
                <a href="/vacancies/{{ $pgs->post->slug }}" target="_blank">{{ $pgs->post->title }}</a>
                @empty
                <p>
                    No Job posts included
                </p>
                @endforelse
                
            </div>
            <hr>
            @empty
            <div class="text-center">
                <p>No Job Post Groups have been created. <br><br> <a href="/admin/job-post-groups/create" class="btn btn-sm btn-orange">create</a></p>
            </div>
            @endforelse
        </div>
        
    </div>
</div>

@endsection