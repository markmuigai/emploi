@extends('layouts.dashboard-layout')

@section('title','Emploi :: Dashboard')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Dashboard')

<a href="/employers/rate-card" class="btn btn-orange-alt"  data-placement="left">Our Packages</a>
<a href="/employers/dashboard/top-candidates" class="btn btn-orange"  data-placement="left">Hire Top Candidates</a>
<div class="card my-2 recents">
    <div class="card-body">
        <div class="col-md-12">
            <h6>Recent Applications </h6>
            <ol>
                @forelse($internalApplications as $application)

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
        
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script type="text/javascript" src="/js/employers-dashboard.js" defer></script>

@endsection