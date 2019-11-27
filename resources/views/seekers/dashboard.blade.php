@extends('layouts.dashboard-layout')

@section('title','Emploi :: Job Seeker Dashboard')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Dashboard')

<h4>Recent Applications</h4>
<div class="row">
	@forelse ($posts->slice(0, 4) as $p)
	<div class="col-lg-6">
		<div class="card my-3">
			<div class="card-body">
				<h4>{{ $p->title }}</h4>
				<h6 class="orange">
					<a href="/companies/{{ $p->company->name }}">
						{{ $p->company->name }}
					</a>
				</h6>
				<p><strong>Applied on: </strong>{{ $p->created_at }}</p>
				<div class="row align-items-center">
					<div class="col-6">
						<p>{{ $p->monthlySalary() }}</p>
						@if($p->post->isShortlisted($user->seeker))
						<p class="text-success">Shortlisted</p>
						@else
						<p class="text-primary">Pending</p>
						@endif
					</div>
					<div class="col-6">
						<a href="/profile/applications/{{ $p->id }}" class="btn btn-orange pull-right">View</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	@empty
	<div class="col-12 my-3 text-center">
		<div class="card">
			<div class="card-body">
				<p>You haven't applied to any jobs yet.</p>
				<a href="/vacancies" class="btn btn-orange">Apply Now</a>
			</div>
		</div>
	</div>
	@endforelse
</div>

<h4>Recent Blogs</h4>
<div class="row">
	@forelse ($blogs->slice(0, 3) as $b)
	<div class="col-lg-6">
		<div class="card my-2">
			<div class="card-body">
				<div class="row align-items-center">
					<div class="col-4">
						<img src="{{ asset($b->imageUrl) }}" class="w-100">
					</div>
					<div class="col-8">
						<h5>{{ $b->title }}</h5>
						<span class="badge badge-orange">
							<a href="/blog/{{ $b->category->slug }}">
								{{ $b->category->name }}
							</a>
						</span>
						<a href="/blog/{{ $b->slug }}" class="btn btn-sm btn-orange-alt pull-right">Read Blog</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	@empty
	<div class="col-12 my-3 text-center">
		<div class="card">
			<div class="card-body">
				<p>No blogs have been posted.</p>
			</div>
		</div>
	</div>
	@endforelse
</div>


@endsection