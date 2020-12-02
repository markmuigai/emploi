@extends('v2.layouts.app')

@section('title','Interview Schedule :: Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
    @section('page_title', $application->user->name.' Interview')

    <!-- Navbar -->
    @include('v2.components.jobseeker.navbar')
    <!-- End Navbar -->

    <!-- Jobs -->
    <div class="dashboard-area mt-1 ptb-100">
        <div class="container-fluid px-2">
            <div class="row">
                <div class="col-lg-2 pt-5">
                    @include('v2.components.sidebar.employer')               
                </div>           
                 <div class="col-lg-10">
                    <div class="container-fluid my-4">
                        {{-- <a href="{{ url()->previous() }}" class="btn btn-primary rounded-pill">
                            <i class="fa fa-arrow-left"></i> Back
                         </a> --}}
                        <h4>
                            {{$application->user->name}} Interview for {{strtolower($application->post->title)}} position
                        </h4>
                        <div class="row justify-content-center">
                            <div class="col-md-12 shadow p-4">
                                <form action="{{route('v2.interviews.store', ['application' => $application])}}" method="post">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <label for="date">Date and Time</label> 

                                            <input class="form-control rounded-pill" name="date" type="datetime-local" id="meeting-time"
                                            name="meeting-time" value="2018-06-12T19:30"
                                            min="2018-06-07T00:00" max="2018-06-14T00:00">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="modeOfInterview">Mode of Interview</label>
                                            <select id="modeOfInterview" name="modeOfInterview" class="interview-mode rounded-pill">
                                              <option selected>Select...</option>
                                              <option value="online">Online</option>
                                              <option value="physical">Physical</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="form-group col-md-12">
                                            <label for="location">Location</label>
                                            <input type="text" name="location" class="form-control rounded-pill" placeholder="Location">
                                          </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="form-group col-md-12">
                                            <label for="interviewDescription">Description</label>
                                            <textarea class="form-control" name="description" id="interviewDescription" rows="3"></textarea>
                                          </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">
                                        Schedule Interview
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Jobs -->
@endsection