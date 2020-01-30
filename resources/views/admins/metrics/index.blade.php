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
                        Faqs: {{ $faqs }} <br>
                    </div>
                    <div class="col-md-6">
                        Adverts: {{ $adverts_count }} <br>
                        Cv Requests: {{ $cv_requests_count }} <br>
                        Job Applications: {{ $job_applications_count }} <br>
                        RSI Model Seekers: {{ $model_seekers_count }} <br>
                        Job Posts: {{ $posts_count }} <br>
                        CV Edit Requests: {{ $cv_edit_requests }} <br>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>


@endsection
