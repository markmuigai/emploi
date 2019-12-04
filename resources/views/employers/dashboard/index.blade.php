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
    <div class="card-body">
        <h6>Recent Applications</h6>
        <ul>
            @if(count(Auth::user()->employer->recentApplications()) > 0)
                <?php
                    $recent = Auth::user()->employer->recentApplications();
                ?>
                @for($i=0; $i < count($recent); $i++)
                <li>
                    <a href="/employers/browse/{{ $recent[$i]->user->username }}">
                        {{ $recent[$i]->user->name }}
                    </a> has applied for the
                    <a href="/employers/applications/{{ $recent[$i]->post->slug }}">{{ $recent[$i]->post->title }}</a> job.
                </li>
                @endfor
            @else
            <li>No Applications have been received</li>
            @endif
        </ul>
    </div>
</div>
<div class="card mt-4">
    <div class="card-body">
        <canvas id="myChart"></canvas>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script>
    <?php
    $counter = '[';
    $labels = '[';
    for($i=0; $i<count(Auth::user()->employer->weekApplicationsCounter); $i++)
    {
        $counter .= Auth::user()->employer->weekApplicationsCounter[$i][0];
        $labels .= '"'.Auth::user()->employer->weekApplicationsCounter[$i][1].'"';
        if(count(Auth::user()->employer->weekApplicationsCounter) != $i-1)
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
