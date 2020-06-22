@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Metrics')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', ' Metrics')

<div class="card">
    <div class="card-body">

        <form method="get" class="row">
            <div class="col-md-6">
                <label>Country</label>
                    <select class="form-control" name="country">
                    <option value="">All Countries</option>
                    @foreach($countries as $c)
                    <option  value="{{ $c->id }}" {{ isset($focus_country) && $focus_country == $c->id ? 'selected=""' : '' }}>
                    {{ $c->name }}
                    </option>
                    @endforeach
                      
                </select>
                <br>
                <label>Year</label>
                <select class="form-control" name="year">
                    @for($y = 2014; $y<= Date('Y'); $y++ )
                    <option value="{{ $y }}" {{ $y == $focus_year ? 'selected=""' : '' }}>{{ $y }}</option>
                    @endfor
                </select>
                <br>
                <label>Month</label>
                <select class="form-control" name="month">
                    @for($i=0; $i<count($months); $i++)
                    <option value="{{ $i+1 }}" {{ $i+1 == $focus_month ? 'selected=""' : '' }}>{{ $months[$i] }}</option>
                    @endfor
                </select>
                <br>
                <p style="text-align: center;">
                    <input type="submit" class="btn btn-sm btn-orange">
                </p>
                
            </div>

            <br>

            <div class="col-md-6">
                <h5>Metrics [ {{ $months[$focus_month-1]}}  {{ $focus_year }}]</h5>
                <div style="text-align: center;">
                    Job Seekers: {{ $seekers_count }} |
                    Employers: {{ $employers_count }}<br>
                    <b>Total New Users: {{ $seekers_count + $employers_count }}</b> <br><br>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        Contacts: {{ $contacts_count }} <br>
                        Blogs: {{ $blogs_count }} <br>
                        Companies: {{ $companies_count }} <br>
                        Referees: {{ $referees_count }} <br>
                        Cv Editors: {{ $cv_editors }} <br>
                        {{ __('other.faqs') }}: {{ $faqs }} <br>
                        Featured Seeker: {{ $featured_seeker }} <br>
                    </div>
                    <div class="col-md-6">
                        Adverts: {{ $adverts_count }} <br>
                        Cv Requests: {{ $cv_requests_count }} <br>
                        Job Applications: {{ $job_applications_count }} <br>
                        RSI Model Seekers: {{ $model_seekers_count }} <br>
                        Job Posts: {{ $posts_count }} <br>
                        CV Edit Requests: {{ $cv_edit_requests }} <br>
                        Seeker Basic: {{ $seeker_basic }} <br>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

<div class="card">
    <div class="card-body">
        <canvas id="verifications-graph"></canvas>

    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script>
    <?php

    $weekelyCount = \App\Jurisdiction::getVerificationsGraph();
    //return $stats;
    //$weekelyCount = Auth::user()->employer->weekApplicationsCounter;
    $counter = '[';
    $labels = '[';
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

    var ctx = document.getElementById('verifications-graph');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: graph_labels,
            datasets: [{
                label: 'Account Verifications',
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
                text: "Total Account Verifications over the Past Week"
            },
            legend: {
              boxWidth: 20,
            },
        },
        maintainAspectRatio: false,
    });
    
</script>

@endsection
