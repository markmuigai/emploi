@extends('layouts.general-layout')

@section('title','Emploi :: Dashboard')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Job')
<!-- NAV-TABS -->
<ul class="nav nav-tabs" id="jobDetails" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="job-description-tab" data-toggle="tab" href="#job-description" role="tab" aria-controls="job-description" aria-selected="true">Job Description</a>
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
    <div class="col-lg-9 col-md-8 col-12">
        <!-- NAV-TAB CONTENT -->
        <div class="tab-content pt-2" id="jobDetailsContent">
            <!-- ALL JOBS -->
            <div class="tab-pane fade show active" id="job-description" role="tabpanel" aria-labelledby="job-description-tab">
                <!-- JOB CARD -->
                <div class="card py-2">
                    <div class="card-body">
                        <div class="row pb-3">
                            <div class="col-12 col-md-6 col-lg-7">
                                <h4>HTML Developer <span class="badge badge-light">5 Positions</span></h4>
                                <p><i class="fas fa-map-marker-alt orange"></i> California P.O.Box 1234</p>
                                <p>
                                    <span class="badge badge-orange">Part Time</span>
                                    <span class="badge badge-success">Full Time</span>
                                    <span class="badge badge-danger">Internship</span>
                                    <span class="badge badge-info">Freelancer</span>
                                </p>
                                <p class="pt-3"><i class="fas fa-share-alt"></i> Share: <a href="#"><i class="fab fa-facebook-f"></i></a> <a href="#"><i class="fab fa-twitter"></i></a> <a href="#"><i class="fab fa-google-plus-g"></i></a> <a
                                      href="#"><i class="fab fa-pinterest"></i></a></p>
                            </div>
                            <div class="col-12 col-md-6 col-lg-5 d-flex flex-column justify-content-between text-right">
                                <p>
                                    <a href="#"><i class="fas fa-edit"></i> Edit</a> |
                                    <a href="#"><i class="far fa-eye"></i> Publish</a> |
                                    <a href="#" class="text-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                                </p>
                                <p><i class="far fa-calendar-check"></i> Sep 3, 2019</p>
                                <p>
                                    <strong>KSH 12,000 - 15,000 P.M.</strong>
                                </p>
                                <p><i class="orange far fa-calendar-check"></i> 15 August - 30 August</p>
                            </div>
                        </div>
                        <!-- JOB DESCRIPTION -->
                        <h5 class="pt-3 pb-2">Job Description</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                            laborum.</p>
                        <!-- RESPONSIBILITIES -->
                        <h5 class="pt-3 pb-2">Responsibilities</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti veniam ad quia officiis dicta quis in rem repudiandae earum dolorem!</p>
                        <ul>
                            <li>Lorem ipsum dolor sit amet, consectetur adipisicing.</li>
                            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam, aut.</li>
                        </ul>
                        <!-- REQUIREMENTS -->
                        <h5 class="pt-3 pb-2">Requirements</h5>
                        <ul>
                            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi, placeat voluptas.</li>
                        </ul>
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
    <div class="col-lg-3 col-md-4 col-12">
        <div class="card mt-2">
            <div class="card-body">
                <h6>Recent Applications</h6>
            </div>
        </div>
    </div>
</div>

@endsection