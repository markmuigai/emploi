@extends('layouts.general-layout')

@section('title','Emploi :: Dashboard')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')


@section('page_title', 'Dashboard')
<div class="card-deck">
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
<div class="card mt-4">
    <div class="card-body">
        <canvas id="myChart" width="400" height="150"></canvas>
    </div>
</div>
<div class="row mt-4 recents">
    <div class="col-12 col-md-8 offset-md-2">
        <div class="card">
            <div class="card-body">
                <h6>Recent Applications</h6>
                <ul>
                    @forelse(Auth::user()->employer->recentApplications() as $app)
                    <li><a href="/employers/browse/{{ $app->user->username }}">{{ $app->user->name }}</a> has applied for the <a href="/employers/applications/{{ $app->post->slug }}">{{ $app->post->title }}</a> job.</li>
                    @empty

                    <li>No Applications have been received</li>

                    @endforelse
                    
                </ul>
            </div>
        </div>
    </div>
</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script>
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                label: '# of Applications',
                data: [12, 19, 3, 5, 2, 3, 6],
                borderColor: 'rgb(232, 135, 37)',
                backgroundColor: 'rgba(253, 242, 232, 0.5)',
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
            }
        }
    });
</script>

@endsection
