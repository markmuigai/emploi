@extends('layouts.general-layout')

@section('title','Emploi :: Dashboard')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
<h1 class="py-2">Dashboard</h1>
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
    <div class="col-12 col-md-8">
        <div class="card">
            <div class="card-body">
                <h6>Recent Applications</h6>
                <ul>
                    <li><a href="#">John Doe</a> has applied for the <a href="#">Web and Graphics</a> job.</li>
                    <li><a href="#">Jane Doe</a> has completed the <a href="#">General Test</a>.</li>
                    <li><a href="#">A person</a> has applied for <a href="#">Software Developer</a> job.</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-body">
                <h6>Recent Profile Visits</h6>
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