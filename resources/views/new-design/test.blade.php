@extends('layouts.general-layout')

@section('title','Emploi :: Dashboard')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Candidates')
<!-- NAV-TABS -->
<ul class="nav nav-tabs" id="jobDetails" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="job-description-tab" data-toggle="tab" href="#job-description" role="tab" aria-controls="job-description" aria-selected="true">All Candidates</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="shortlist-tab" data-toggle="tab" href="#shortlist" role="tab" aria-controls="shortlist" aria-selected="false">Shortlisted Candidates</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="selected-tab" data-toggle="tab" href="#selected" role="tab" aria-controls="selected" aria-selected="false">Selected Candidates</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="rejected-jobs-tab" data-toggle="tab" href="#rejected-jobs" role="tab" aria-controls="rejected-jobs" aria-selected="false">Rejected Candidates</a>
    </li>
</ul>
<div class="row">
    <div class="col-lg-9 col-12">
        <!-- NAV-TAB CONTENT -->
        <div class="tab-content pt-2" id="jobDetailsContent">
            <!-- ALL JOBS -->
            <div class="tab-pane fade show active" id="job-description" role="tabpanel" aria-labelledby="job-description-tab">
                <!-- JOB CARD -->
                <div class="card py-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2 col-3">
                                <img src="{{asset('images/avatar.png')}}" class="avatar-small">
                            </div>
                            <div class="col-5 col-md-5 col-lg-6">
                                <h4>Tammy Dixon</h4>
                                <p class="text-success">UI/UX Designer</p>
                                <p><i class="fas fa-map-marker-alt orange"></i> 5th Street</p>
                            </div>
                            <div class="col-4 col-md-4 col-lg-4 text-center">
                                <p><i class="far fa-star"></i></p>
                                <h5>88%</h5>
                                <p> <i class="far fa-eye"></i> 234 Views</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row justify-content-between align-items-center">
                            <div class="col-12 col-md-6 col-lg-6">
                                <span class="badge badge-secondary">CSS</span>
                                <span class="badge badge-secondary">HTML</span>
                                <span class="badge badge-secondary">Photoshop</span>
                            </div>
                            <div class="col-12 col-md-6 col-lg-5 d-flex justify-content-between align-items-center">
                                <p class="orange">Exp. 3 years</p>
                                <button class="btn btn-orange">View Profile</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END OF JOB CARD -->
            </div>
            <!-- END OF ALL JOBS -->
            <!-- ACTIVE JOBS -->
            <div class="tab-pane fade" id="shortlist" role="tabpanel" aria-labelledby="shortlist-tab">


            </div>
            <!-- END OF ACTIVE JOBS -->

            <!-- CLOSED JOBS -->
            <div class="tab-pane fade" id="selected-jobs" role="tabpanel" aria-labelledby="selected-jobs-tab">


            </div>
            <!-- END OF CLOSED JOBS -->
            <!-- CLOSED JOBS -->
            <div class="tab-pane fade" id="rejected-jobs" role="tabpanel" aria-labelledby="rejected-jobs-tab">


            </div>
            <!-- END OF CLOSED JOBS -->
        </div>
    </div>
    <div class="col-lg-3 col-12">
        <div class="card mt-2">
            <div class="card-body">
                <h6>Recent Applications</h6>
            </div>
        </div>
    </div>
</div>

@endsection