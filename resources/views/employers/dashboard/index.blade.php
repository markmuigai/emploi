@extends('layouts.dashboard-layout')

@section('title','Emploi :: Dashboard')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Dashboard')

<div class="card my-2 recents">
    <div class="card-body row">
        <div class="col-md-7">
            <h6>Recent Applications </h6>
            <ul>
                @if(count($recentApplications) > 0)
                    @for($i=0; $i < count($recentApplications); $i++)
                    <li>
                        <a href="/employers/browse/{{ $recentApplications[$i]->user->username }}">
                            {{ $recentApplications[$i]->user->name }}
                        </a> applied for 
                        <a href="/employers/applications/{{ $recentApplications[$i]->post->slug }}">{{ $recentApplications[$i]->post->title }}</a> job, {{ $recentApplications[$i]->created_at->diffForHumans() }}
                    </li>
                    @endfor
                @else
                <li>No Applications have been received</li>
                @endif
            </ul>
        </div>
        <div class="col-md-5" id="stats-field">
            <p>Loading stats...</p>
        </div>
        
    </div>
</div>
<div class="card mt-4">
    @if(count($featuredSeekers) > 0)
    <div class="row">
        <div class="col-md-12">
            <h4 class="orange" style="text-align: center;">Featured Job Seekers</h4>
        </div>
        @foreach($featuredSeekers as $seeker)
            <div class="col-md-3" style="text-align: center;">
                <a href="/employers/browse/{{$seeker->user->username}}">{{ $seeker->user->name }}</a>
                    <img src="{{ asset($seeker->user->getPublicAvatarUrl()) }}" style="width: 100%" alt="{{ $seeker->user->username }}">
                <i>{{ $seeker->industry->name }}</i> <br>
                <a href="/employers/browse/{{$seeker->user->username}}" class="btn btn-orange btn-sm" target="_blank">View Profile</a>
                <br>
            </div>
        @endforeach
    </div>
    @else
        @include('components.ads.responsive')
    @endif
</div>
<div class="card mt-4" id="graph">
    <div class="card-body">
        <canvas id="myChart"></canvas>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script type="text/javascript" src="/js/employers-dashboard.js" defer></script>

@endsection
