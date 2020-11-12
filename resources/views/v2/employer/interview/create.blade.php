@extends('layouts.dashboard-layout')

@section('title','Interview Schedule :: Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', $application->user->name.' Interview')
<div class="container-fluid my-4">
    <div class="row justify-content-center">
        <div class="col-md-12 shadow p-4">
            <form action="{{route('v2.interviews.store', ['application' => $application])}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="date">Date and Time</label>
                        <input type="text" name="date" class="form-control" placeholder="Date and Time">
                    </div>
                    <div class="col-md-6">
                        <label for="modeOfInterview">Mode of Interview</label>
                        <select id="modeOfInterview" name="modeOfInterview" class="form-control">
                          <option selected>Select...</option>
                          <option value="online">Online</option>
                          <option value="physical">Physical</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="form-group col-md-12">
                        <label for="location">Location</label>
                        <input type="text" name="location" class="form-control" placeholder="Location">
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
@endsection