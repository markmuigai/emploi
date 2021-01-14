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
                                <form action="{{route('v2.interviews.update', ['post' => $application->post, 'interview' => $interview])}}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <label for="date">Date and Time</label> 
                                            <input class="form-control rounded-pill" name="date" type="datetime-local" id="meeting-time"
                                            name="meeting-time" value="{{$interview->formattedDate()}}"
                                            min="2020-06-07T00:00" max="2022-06-14T00:00">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="modeOfInterview">Mode of Interview</label>
                                            <select id="modeOfInterview" name="modeOfInterview" class="interview-mode rounded-pill">
                                              <option {{$interview->interview_mode == 'online' ? 'selected' : ''}} value="online">Online</option>
                                              <option {{$interview->interview_mode == 'physical' ? 'selected' : ''}} value="physical">Physical</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <label for="location">Location</label>
                                            <input type="text" name="location" class="form-control rounded-pill" placeholder="Location"
                                            value="{{$interview->location ?? ''}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="status">Status</label>
                                            <select id="status" name="status" class="status-mode rounded-pill">
                                     <!--          <option {{$interview->status == '' ? 'selected' : ''}} value="{{ $interview->status}}">{{ $interview->status}}</option> -->
                               <!--                <option value="pending">pending</option>
                                              <option value="complete">complete</option>
                                              <option value="missed">missed</option>
                                              value="online">Online</option> -->
                                                <option {{$interview->status == 'pending' ? 'selected' : ''}} value="pending">pending</option>
                                                <option {{$interview->status == 'complete' ? 'selected' : ''}} value="complete">complete</option>
                                                <option {{$interview->status == 'missed' ? 'selected' : ''}} value="missed">missed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="form-group col-md-12">
                                            <label for="interviewDescription">Other Information</label>
                                            <textarea class="form-control" name="description" id="interviewDescription" rows="3">{{$interview->description ?? ''}}</textarea>
                                          </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3 rounded-pill">
                                        Update Schedule 
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