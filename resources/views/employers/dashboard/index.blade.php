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
<script>
    <?php
    
    echo "var graph_data = $graph_counter;";
    echo "var graph_labels = $graph_labels;";


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

<script type="text/javascript">
    $().ready(function(){
        function loadStats(){
            console.log('Loading stats');
            $.ajax({
                type: 'GET',
                url: '/employers/dashboard-stats?csrf-token='+$('#csrf_token').attr('content'),
                success: function(response) {
                    $('#stats-field').children().remove();
                    $('#stats-field').append(response);

                },
                error: function(e) {

                    notify('Failed to Statistics', 'error');
                },
            });
        }
        loadStats();
        setInterval(loadStats,60000);
    });
</script>

@endsection
