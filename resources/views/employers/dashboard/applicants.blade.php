@extends('layouts.dashboard-sidebar')

@section('title','Emploi :: Applicants')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-offset-2 col-md-10">
            <div class="single">
                <h2>All Applicants</h2>
                <!-- <a href="#" class="btn btn-secondary pull-right">Post A Job</a> -->
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#allApplicants" aria-controls="allApplicants" role="tab" data-toggle="tab">All</a></li>
                    <li role="presentation"><a href="#shortlisted" aria-controls="shortlisted" role="tab" data-toggle="tab">Shortlisted</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="allApplicants">
                        <div class="row applicant-description">
                            <div class="col-xs-1">
                                <p>1.</p>
                            </div>
                            <div class="col-xs-2">
                                <img src="{{asset('images/avatar.png')}}" alt="">
                            </div>
                            <div class="col-xs-6">
                                <ul>
                                    <li>John Doe</li>
                                    <li>Male</li>
                                    <li>Backend Developer</li>
                                </ul>
                            </div>
                            <div class="col-xs-3">
                                <i class="fa fa-star-o"></i>
                                <br>
                                <p>RSI: 80%</p>
                                <div class="dropdown">
                                    <button id="dLabel" class="btn btn-secondary" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        More
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                                        <li><a href="#">View Profile</a></li>
                                        <li><a href="#">View Resume</a></li>
                                        <li><a href="#">View RSI</a></li>
                                        <li><a href="#">Shortlist Candidate</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row applicant-description">
                            <div class="col-xs-1">
                                <p>2.</p>
                            </div>
                            <div class="col-xs-2">
                                <img src="{{asset('images/avatar.png')}}" alt="">
                            </div>
                            <div class="col-xs-6">
                                <ul>
                                    <li>Jane Doe</li>
                                    <li>Female</li>
                                    <li>Frontend Developer</li>
                                </ul>
                            </div>
                            <div class="col-xs-3">
                                <i class="fa fa-star-o"></i>
                                <br>
                                <p>RSI: 82%</p>
                                <div class="dropdown">
                                    <button id="dLabel" class="btn btn-secondary" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        More
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                                        <li><a href="#">View Profile</a></li>
                                        <li><a href="#">View Resume</a></li>
                                        <li><a href="#">View RSI</a></li>
                                        <li><a href="#">Shortlist Candidate</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="shortlisted">Shortlisted</div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection