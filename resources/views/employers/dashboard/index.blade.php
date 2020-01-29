@extends('layouts.dashboard-layout')

@section('title','Emploi :: Dashboard')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Dashboard')

<div class="card-deck" style="display: none">
    <div class="card">
        <div class="card-body">
            <h1>186</h1>
            <p>Candidates viewed your profile</p>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h1>35</h1>
            <p>Job views</p>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h1>14</h1>
            <p>Search appearances</p>
        </div>
    </div>
</div>
<div class="card my-2 recents">
    <div class="card-body row">
        <div class="col-md-7">
            <h6>Recent Applications </h6>
            <ul>
                @if(count(Auth::user()->employer->recentApplications()) > 0)
                    <?php
                        $recent = Auth::user()->employer->recentApplications();
                    ?>
                    @for($i=0; $i < count($recent); $i++)
                    <li>
                        <a href="/employers/browse/{{ $recent[$i]->user->username }}">
                            {{ $recent[$i]->user->name }}
                        </a> applied for 
                        <a href="/employers/applications/{{ $recent[$i]->post->slug }}">{{ $recent[$i]->post->title }}</a> job, {{ $recent[$i]->created_at->diffForHumans() }}
                    </li>
                    @endfor
                @else
                <li>No Applications have been received</li>
                @endif
            </ul>
        </div>
        <div class="col-md-5">
            <h6>My Statistics</h6>
            <a href="/employers/jobs">Jobs Posted: {{ count(Auth::user()->employer->posts) }} </a><br>
            <a href="/employers/jobs/active">Active Jobs: {{ count(Auth::user()->employer->activePosts) }} </a><br>
            <a href="/employers/jobs/other">Closed Jobs: {{ count(Auth::user()->employer->closedPosts) }}</a><br>
            <a href="/employers/jobs/shortlisting">Shortlisting Jobs: 
                {{ count(\App\Post::whereIn('company_id',Auth::user()->companies->pluck('id'))->where('how_to_apply',null)->orderBy('id','DESC')->get()) }}
            </a><br>
            Applications Received: {{ count(Auth::user()->employer->jobApplications()) }} <br>
            <a href="/profile">Companies: {{ count(Auth::user()->companies) }}</a></a><br>
            <a href="/employers/saved">Saved Profiles: {{ count(Auth::user()->employer->savedProfiles) }}</a><br>
            <a href="/employers/cv-requests">CV Requests: {{ count(Auth::user()->employer->cvRequests->where('status','P')) }} Pending | {{ count(Auth::user()->employer->cvRequests->where('status','C')) }} Accepted </a>
        </div>
        
    </div>
</div>
<div class="card mt-4">
    @include('components.ads.responsive')
</div>
<div class="card mt-4" id="graph">
    <div class="card-body">
        <canvas id="myChart"></canvas>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script>
    <?php

    $counter = '[';
    $labels = '[';
    $weekelyCount = Auth::user()->employer->weekApplicationsCounter;
    for($i=0; $i<count($weekelyCount); $i++)
    {
        $counter .= $weekelyCount[$i][0];
        $labels .= '"'.$weekelyCount[$i][1].'"';
        if(count($weekelyCount) != $i-1)
        {
            $counter.=',';
            $labels.=',';
        }
    }
    $counter .= ']';
    $labels .= ']';
    
    echo "var graph_data = $counter;";
    echo "var graph_labels = $labels;";


    ?>

    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: graph_labels,
            datasets: [{
                label: 'Number of Applications',
                data: graph_data,
                borderColor: 'rgb(232, 135, 37)',
                // backgroundColor: 'rgba(253, 242, 232, 0.5)',
                backgroundColor: 'rgba(0,0,0,0)',
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            title: {
                display: true,
                text: "Total Applications over the Past Week"
            },
            legend: {
              boxWidth: 20,
            },
        },
        maintainAspectRatio: false,
    });
    
</script>

@endsection
