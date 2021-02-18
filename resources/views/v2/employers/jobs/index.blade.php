@extends('v2.layouts.app')

@section('title','Employer Jobs :: Emploi')

@section('description')
	Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
	@section('page_title', 'Self Assessment Results ')

	<!-- Navbar -->
	@include('v2.components.jobseeker.navbar')
	<!-- End Navbar -->

	<div class="job-area-list dashboard-area mt-1 ptb-100">
	<div class="container-fluid px-2">
		<div class="row">
			<div class="col-lg-2 pt-3 position-fixed">
				<div class="affix">
					@include('v2.components.sidebar.employer')
				</div>
			</div>
			<div class="col-lg-10 jobs-form offset-md-2">
				<div class="categories-area">
					<div class="container-fluid mb-5">
						<h3 class="my-3 text-center">Employer Dashboard</h3>
						<div class="row employer-stats">
							<div class="col-md-8">
								<div class="card">
									<div class="card-body">
										<h4 class="mb-2">
											Recent Applications
										</h4>
										<div class="activity-feed">
											@forelse($recentApplications as $application)
												<div class="feed-item">
													<div
														class="date">{{ CarbonParse($application->created_at)->diffForHumans()}}</div>
													<a href="/v2/employers/browse/{{ $application->username }}">
														{{ $application->name }}
													</a> applied for
													<a href="/v2/employers/applications/{{ $application->slug }}">{{ $application->title }}</a>
													job
												</div>
											@empty
												<a href="/employers/jobs"
													 class="btn btn-primary btn-sm btn-success float-right">
													View All
												</a>
												<li>No Applications have been received</li>
											@endforelse
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								@if(auth()->user()->employer->jobApplicationsCount() !=0 )
									<div class="card card-stats mb-4">
										<div class="card-body">
											<div class="row">
												<div class="col">
													<h4 class="mb-1">Applicants</h4>
													<span
														class="h2 font-weight-bold mb-0">{{ auth()->user()->employer->jobApplicationsCount() }}</span>
												</div>
												<div class="col-auto">
													<a href="/employers/jobs">
														<div
															class="icon icon-shape bg-success text-white rounded-circle shadow">
															<i class='bx bxs-user-detail'></i>
														</div>
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="card card-stats mb-4">
										<div class="card-body">
											<div class="row">
												<div class="col">
													<h4 class="mb-1">My Jobs</h4>
													<span
														class="h2 font-weight-bold mb-0">{{ auth()->user()->employer->jobPostsCount() }}</span>
												</div>
												<div class="col-auto">
													<a href="/employers/jobs">
														<div
															class="icon icon-shape bg-success text-white rounded-circle shadow">
															<i class='bx bx-briefcase-alt'></i>
														</div>
													</a>
												</div>
											</div>
										</div>
									</div>
								@endif

								<a class="cmn-btn mt-1" href="/vacancies/create">
									Post a job
									<i class="bx bx-plus"></i>
								</a>
								<a class="cmn-btn mt-1" href="/employers/rate-card">
									Our Packages
									<i class='bx bxs-package'></i>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="candidate-area pb-100">
					<div class="container-fluid">
						<ul class="nav nav-pills employer mb-3" id="pills-tab" role="tablist">
							<li class="nav-item">
								<a class="nav-link {{isset(request()->job_category) ? '' : 'active'}}" id="pills-home-tab"
									 href="{{route('v2.employers.jobs.index')}}">
									All jobs
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link {{request()->job_category == 'shortlisting' ? 'active' : ''}}" id="pills-profile-tab"
									 href="{{route('v2.employers.jobs.index', ['job_category' => 'shortlisting'])}}">
									Shortlisting
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link {{request()->job_category == 'active' ? 'active' : ''}}" id="pills-contact-tab"
									 href="{{route('v2.employers.jobs.index', ['job_category' => 'active'])}}">
									Active Jobs
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link {{request()->job_category == 'other' ? 'active' : ''}}" id="pills-contact-tab"
									 href="{{route('v2.employers.jobs.index', ['job_category' => 'other'])}}">
									Other Jobs
								</a>
							</li>
						</ul>
						<div class="row">
							@forelse ($posts as $post)
								<div class="col-lg-3">
									<div class="candidate-item two">
										<div class="job left">
											<h3 class="text-center">
												<a href="/v2/employers/jobs/{{ $post->slug }}/applications">{{ $post->title }}</a>
											</h3>
											<ul class="experience">
												<li>Closing: <i
														class="far fa-calendar-check"></i> {{ $post->readableDeadline }}
												</li>
												<li>Salary: <strong>{{ $post->monthlySalary() }} p.m.</strong></li>
												@if($post->how_to_apply)
													<li>Alternative Application</li>
												@else
													<li>No. of Applicants: {{ count($post->applications) }}</li>
												@endif
											</ul>
											<a href="/vacancies/{{ $post->slug }}/edit" class="btn btn-success  btn-sm">
												Edit Job
												<i class='bx bxs-pencil'></i>
											</a>
											@if($post->status == 'active')
												<a href="/vacancies/laravel-developer/deactivate"
													 class="btn btn-danger  btn-sm">
													Deactivate
													<i class='bx bxs-trash'></i>
												</a>
											@elseif($post->status == 'closed')
												<a href="/vacancies/laravel-developer/activate" class="btn btn-success"><i
														class="far fa-eye"></i> Activate</a>
											@else
												<p class="text-danger">Not Verified</p>
											@endif
										</div>
									</div>
								</div>
							@empty
								<div class="col-md-12 card d-flex justify-content-center">
									<div class="card-body">
										<h4 class="text-center">
											No Posts to Show
										</h4>
									</div>
								</div>
							@endforelse
						</div>
						<div class="text-center">
							{{ $posts->links() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
	<script type="text/javascript">
		$("#inputRating").change(function () {
			this.form.submit();
		});
	</script>
@endsection


