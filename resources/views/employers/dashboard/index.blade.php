@extends('layouts.dashboard-layout')

@section('title','Emploi :: Dashboard')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Dashboard')

<a href="/employers/rate-card" class="btn btn-orange-alt"  data-placement="left">Our Packages</a>
<div class="card my-2 recents">
    <div class="card-body row">
        <div class="col-md-7">
            <h6>Recent Applications </h6>
            <ul>
                @forelse($recentApplications as $application)

                    <li>
                        <a href="/employers/browse/{{ $application->username }}">
                            {{ $application->name }}
                            <?php $c = \Carbon\Carbon::createFromDate($application->created_at); ?>
                        </a>   {{ $application->email }}   {{ $application->phone_number }} applied for 
                        <a href="/employers/applications/{{ $application->slug }}">{{ $application->title }}</a> job, {{ $c->diffForHumans() }}
                    </li><br>

                @empty

                    <li>No Applications have been received</li>
                @endforelse
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
                    <img src="{{ asset($seeker->user->getPublicAvatarUrl()) }}" style="width: 100%; border-radius: 50%" alt="{{ $seeker->user->username }}">
                    <div style="color: orange">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                    </div>
                <i>{{ $seeker->industry->name }}</i> <br>
                <a href="/employers/browse/{{$seeker->user->username}}" class="btn btn-orange btn-sm" target="_blank">View Profile</a>
                <br>
            </div>
        @endforeach      
    </div><br>
      {{ $featuredSeekers->links() }}
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
