@extends('layouts.dashboard-layout')

@section('title','Emploi :: My Applications')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'My Applications')

@if(count($user->applications) > 0)
<h5>{{ count($user->applications) }} applications</h5>
<div class="row">
    @forelse($user->applications as $app)
    <div class="col-lg-6">
        <div class="card my-3">
            <div class="card-body">
                <h4>{{ $app->post->title }}</h4>
                <p><strong>Applied on: </strong>{{ $app->created_at }}</p>
                <div class="row align-items-center">
                    <div class="col-6">
                        @if($app->post->isShortlisted($user->seeker))
                        <p class="text-success">Shortlisted</p>
                        @else
                        <p class="text-primary">Pending</p>
                        @endif
                    </div>
                    <div class="col-6">
                        <a href="/profile/applications/{{ $app->id }}" class="btn btn-orange pull-right">View</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @empty
    @endforelse
</div>
@else
<p class="text-center">
    You have not made any job application
</p>
@endif
@endsection