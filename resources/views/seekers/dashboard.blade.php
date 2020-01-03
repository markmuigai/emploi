@extends('layouts.dashboard-layout')

@section('title','Emploi :: Job Seeker Dashboard')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Dashboard')


<h4>Recent Blogs</h4>
<div class="row">
	@forelse ($blogs->slice(0, 4) as $b)
	<div class="col-lg-6">
		<div class="card my-2">
			<div class="card-body">
				<div class="row align-items-center">
					<div class="col-4">
						<img src="{{ asset($b->imageUrl) }}" class="w-100" alt="{{ $b->title }}">
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

<?php
$user = Auth::user();
?>

@if(isset($user->seeker->industry_id))
<hr>
<h4>{{ $user->seeker->industry->name }} Jobs</h4>
<?php
$posts = \App\Post::where('industry_id',$user->seeker->industry_id)->where('status','active')->orderBy('id','DESC')->orderBy('featured','DESC')->paginate(8);
?>
<div class="row">
	
	@forelse ($posts as $b)
	<div class="col-lg-6">
		<div class="card my-2">
			<div class="card-body">
				<div class="row align-items-center">
					<div class="col-4">
						<img src="{{ asset($b->imageUrl) }}" class="w-100" alt="{{ $b->title }}">
					</div>
					<div class="col-8">
						<h5>{{ $b->title }}</h5>
						<span class="badge badge-dark">
							<a href="/vacancies/{{ $b->slug }}">
								{{ $b->monthlySalary() }}
							</a>
						</span>
						<a href="/vacancies/{{ $b->slug }}" class="btn btn-sm btn-orange-alt pull-right">View</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	@empty
	<div class="col-12 my-3 text-center">
		<div class="card">
			<div class="card-body">
				<p>No Industry jobs have been posted.</p>
			</div>
		</div>
	</div>
	@endforelse
</div>
<div>
	{{ $posts->links() }}
</div>

@else

@endif


@endsection
