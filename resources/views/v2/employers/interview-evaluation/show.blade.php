@extends('v2.layouts.app')

@section('title','Interview Evaluation :: Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Interview Evaluation form')
    <!-- Navbar -->
    @include('v2.components.jobseeker.navbar')
    <!-- End Navbar -->

    <!-- Jobs -->
    <div class="job-area-list dashboard-area mt-1 ptb-100">
        <div class="container-fluid px-2">
            <div class="row">
                <div class="col-lg-2 pt-5">
                    @include('v2.components.sidebar.employer')               
                </div>           
                <div class="col-lg-10 jobs-form">
					<a href="{{ url()->previous() }}" class="btn btn-primary rounded-pill mt-2">
						<i class='bx bx-arrow-back'></i>
						Back
					</a>
					<h3 class="text-center my-2">Interview Evaluation</h3>
					<div class="card shadow">
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<h5>Interviewer email:  {{$evaluationResult->interviewer->email}}</h5>
									<h5></h5>
								</div>
								<div class="col-md-6">
									<h5>Date of Interview:  {{$interview->date}}</h5>
								</div>
								<div class="col-md-6">
									<h5>Candidate Name: {{$interview->jobApplication->user->name}}</h5>
								</div>
								<div class="col-md-6">
									<h5>Position: {{$interview->jobApplication->post->title}}</h5>
								</div>
							</div>
							<p class="my-3">
								Interview evaluations forms are to be completed by the interviewer to rank the candidate's overall qualifications
								for the position for which they have applied. Under each heading, the interviewer should give the candidate a numerical
								rating and write specific job related comments in the space provided. The numerical rating system is based on the scale below
							</p>
							<ul class="list-group list-group-horizontal text-center my-3">
								<li class="list-group-item">Scale: </li>
								<li class="list-group-item">5 - Exceptional</li>
								<li class="list-group-item">4 - Above Average</li>
								<li class="list-group-item">3 - Average</li>
								<li class="list-group-item">2 - Satisfactory</li>
								<li class="list-group-item">1 - Unsatisfactory</li>
							</ul>
							<div class="row">
								@foreach ($evaluationResult->criteriaResults as $criteriaResult)
								<div class="col-md-8">
									<p>
										<strong>{{$criteriaResult->criteria->category}} - </strong>
										{{$criteriaResult->criteria->title}}
									</p>
									<h4>
										{{$criteriaResult->rating}} - {{$criteriaResult->remark()}}
									</h4>
								</div>
								@endforeach
							</div>
						</div>
					</div>
                 </div>
            </div>
        </div>
    </div>
    <!-- End Jobs -->
@endsection


