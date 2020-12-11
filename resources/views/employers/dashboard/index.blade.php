@extends('layouts.dashboard-layout')

@section('title','Emploi :: Dashboard')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Dashboard')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-3  px-0 col-sm-8">
                    <a href="/employers/rate-card" class="btn btn-orange-alt my-1"  data-placement="left">Our Packages</a>
                </div>
                <div class="col-md-4  px-0 col-sm-8">
                    <a href="/employers/dashboard/top-candidates" class="btn btn-orange my-1"  data-placement="left">Hire Top Candidates</a>
                </div>
                <div class="col-md-4 px-0  col-sm-8">
                    @if(Auth::user()->email == 'jobs@emploi.co')
                    <a href="/employers/dashboard/applications" class="btn btn-orange-alt my-1"  data-placement="left">View Applications</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card my-2 recents">
    <div class="card-body row">
        <div class="col-md-7">
            <h6>Recent Applications </h6>
            <ol>
                @forelse($recentApplications as $application)

                  <li>
                        <a href="/employers/browse/{{ $application->username }}">
                            {{ $application->name }}
                            <?php $c = \Carbon\Carbon::createFromDate($application->created_at); ?>
                        </a> applied for 
                        <a href="/employers/applications/{{ $application->slug }}">{{ $application->title }}</a> job, {{ $c->diffForHumans() }}
                    </li>

                @empty

                    <li>No Applications have been received</li>
                @endforelse
            </ol>
        </div>
        <div class="col-md-5" id="stats-field">
            <p>Loading stats...</p>
        </div>
        
    </div>
</div><br>
<!-- SEARCH CANDIDATES -->
<form method="get" action="/employers/dashboard">
    <div class="form-row">
        <div class="form-group col-md-4">
            <select name="industry" class="custom-select">
                <option value="">All Industries</option>
                @forelse($industries as $i)
                <option value="{{ $i->slug }}" @if(isset($industry->id) && $i->id == $industry->id)
                    selected=""
                    @endif
                    >{{ $i->name }}</option>
                @empty
                @endforelse
            </select>
        </div>   
        <div class="col-md-4">
            <button type="submit" name="button" class="btn btn-orange">Search</button>
        </div>
    </div>
</form>
<!-- END OF SEARCH CANDIDATES -->
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
        <div class="text-center">
            <p>No Job Seekers found</p>
        </div>
        @include('components.ads.responsive')
    @endif
</div>
<div class="card mt-4" id="graph">
    <div class="card-body">
        <canvas id="myChart"></canvas>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<script type="text/javascript" src="/js/employers-dashboard.js" defer></script>

@endsection
