@extends('layouts.general-layout')

@section('title','Emploi :: Jobs Listed')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Jobs')
<!-- NAV-TABS -->
<ul class="nav nav-tabs" id="jobs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="all-jobs-tab" data-toggle="tab" href="#all-jobs" role="tab" aria-controls="all-jobs" aria-selected="true">All Jobs</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="active-jobs-tab" data-toggle="tab" href="#active-jobs" role="tab" aria-controls="active-jobs" aria-selected="false">Active Jobs</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="closed-jobs-tab" data-toggle="tab" href="#closed-jobs" role="tab" aria-controls="closed-jobs" aria-selected="false">Closed Jobs</a>
    </li>
</ul>

<!-- NAV-TAB CONTENT -->
<div class="tab-content pt-2" id="jobsContent">
    <!-- ALL JOBS -->
    <div class="tab-pane fade show active" id="all-jobs" role="tabpanel" aria-labelledby="all-jobs-tab">
        <!-- JOB CARD -->
        <div class="card py-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-8">
                        <h4><a href="/test">HTML Developer <span class="badge badge-light">5 Positions</span></a></h4>
                        <p><i class="fas fa-map-marker-alt orange"></i> California P.O.Box 1234</p>
                        <p>
                            <span class="badge badge-orange">Part Time</span>
                            <span class="badge badge-success">Full Time</span>
                            <span class="badge badge-danger">Internship</span>
                            <span class="badge badge-info">Freelancer</span>
                        </p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 job-actions">
                        <p><i class="far fa-calendar-check"></i> Sep 3, 2019</p>
                        <p>
                            <strong>KSH 12,000 - 15,000 P.M.</strong>
                        </p>
                        <p>No. of Applicants: 5</p>
                    </div>
                </div>
                <hr>
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 col-md-6 col-lg-4">
                        <p><i class="fas fa-share-alt"></i> Share: <a href="#"><i class="fab fa-facebook-f"></i></a> <a href="#"><i class="fab fa-twitter"></i></a> <a href="#"><i class="fab fa-google-plus-g"></i></a> <a href="#"><i
                                  class="fab fa-pinterest"></i></a></p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 job-actions">
                        <a href="#" class="orange"><i class="fas fa-edit orange"></i> Edit</a> |
                        <a href="#"><i class="far fa-eye"></i> Publish</a> |
                        <a href="#"><i class="fas fa-trash-alt"></i> Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF ALL JOBS -->
    <!-- ACTIVE JOBS -->
    <div class="tab-pane fade" id="active-jobs" role="tabpanel" aria-labelledby="active-jobs-tab">


    </div>
    <!-- END OF ACTIVE JOBS -->

    <!-- CLOSED JOBS -->
    <div class="tab-pane fade" id="closed-jobs" role="tabpanel" aria-labelledby="closed-jobs-tab">


    </div>
    <!-- END OF CLOSED JOBS -->

</div>

@endsection
