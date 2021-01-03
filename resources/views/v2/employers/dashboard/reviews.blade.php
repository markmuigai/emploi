@extends('layouts.dashboard-layout')

@section('title','Emploi :: Reviews')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Company Reviews')
<div class="row">
    <div class="col-lg-8 col-12">
        <!-- JOB CARD -->
        <div class="card my-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2 col-3">
                        <img src="{{asset('images/avatar.png')}}" class="avatar-small">
                    </div>
                    <div class="col-5 col-md-5 col-lg-6">
                        <h5>Tammy Dixon</h5>
                        <p class="text-success">UI/UX Designer</p>
                        <p><i class="fas fa-map-marker-alt orange"></i> 5th Street</p>
                    </div>
                    <div class="col-4 col-md-4 col-lg-4 text-center">
                        <p>Rating Given:</p>
                        <h4 class="text-success">88%</h4>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, qd... <a class="orange" data-toggle="modal" data-target="#reviewModal">Read
                        More</a>
                </p>
            </div>
        </div>
        <!-- JOB CARD -->
        <div class="card my-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2 col-3">
                        <img src="{{asset('images/avatar.png')}}" class="avatar-small">
                    </div>
                    <div class="col-5 col-md-5 col-lg-6">
                        <h5>Tammy Dixon</h5>
                        <p class="text-success">UI/UX Designer</p>
                        <p><i class="fas fa-map-marker-alt orange"></i> 5th Street</p>
                    </div>
                    <div class="col-4 col-md-4 col-lg-4 text-center">
                        <p>Rating Given:</p>
                        <h4 class="text-success">88%</h4>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud... <a class="orange" data-toggle="modal"
                      data-target="#reviewModal">Read
                        More</a></p>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-12 pt-md-3 pt-lg-0 my-2">
        <div class="card">
            <div class="card-body">
                <h6>Company Profile</h6>
                <h5>Company Name</h5>
                <p><i class="fas fa-star orange"></i> 88%</p>
                <p><i class="fas fa-globe-africa orange"></i> ajob.com</p>
                <p><i class="fas fa-map-marker-alt orange"></i> 5th Street</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore rerum reprehenderit laudantium deleniti placeat minus vel velit, cum corporis officia?</p>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content p-3">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
                <div class="row pb-3">
                    <div class="col-lg-2 col-md-3 col-4">
                        <img src="{{asset('images/avatar.png')}}" class="avatar-small">
                    </div>
                    <div class="col-8">
                        <h5>Tammy Dixon</h5>
                        <p class="text-success">UI/UX Designer</p>
                        <p><i class="fas fa-map-marker-alt orange"></i> 5th Street</p>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum do.
                </p>
                <div class="row">
                    <div class="col-md-6 col-12 my-2">
                        <p class="d-flex justify-content-between"><strong>Company Infrastructure</strong><span class="text-success">88%</span></p>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 my-2">
                        <p class="d-flex justify-content-between"><strong>Company Location</strong><span class="text-success">88%</span></p>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 my-2">
                        <p class="d-flex justify-content-between"><strong>Work Environment</strong><span class="text-success">88%</span></p>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 my-2">
                        <p class="d-flex justify-content-between"><strong>Management</strong><span class="text-success">88%</span></p>

                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
