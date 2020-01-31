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
					<a href="/blog/{{ $b->slug }}" class="w-100">
						<img src="{{ asset($b->imageUrl) }}" class="w-100" alt="{{ $b->title }}">
					</a>
					<div class="col-4">
						
					</div>
					<div class="col-8">
						<a href="/blog/{{ $b->slug }}" class="orange">
							<h5>{{ $b->title }}</h5>
						</a>
						<a href="/blog/{{ $b->category->slug }}" class="badge badge-purple">
							{{ $b->category->name }} Blog
						</a>
						<span style="float: right;">
		                    <?php $likes = \App\Like::getCount('blog',$b->id); ?>
		                    @if($likes == 1)
		                        1 Like
		                    @else
		                        {{ $likes }} Likes
		                    @endif 

		                    |
		                    
	                        @if(Auth::user()->hasLiked('blog',$b->id))

	                            <a href="/likes/b/{{ $b->slug }}" style="color: #500095" title="Unlike Blog">
	                                <i class="fa fa-thumbs-up"></i> Unlike
	                            </a>

	                        @else

	                            <a href="/likes/b/{{ $b->slug }}" title="Like Blog">
	                                <i class="fa fa-thumbs-up"></i> Like
	                            </a>

	                        @endif

		                    
		                </span>
						<br>
						
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
	<div style="text-align: center;" class="col">
		<a href="/blog" class="btn btn-orange">Read more blogs</a>
	</div>
</div>
@include('components.ads.responsive')
<?php
$user = Auth::user();
?>

@if(isset($user->seeker->industry_id))
<hr>
<h4>{{ $user->seeker->industry->name }} Jobs</h4>
@include('components.ads.responsive')
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
						<h5><a href="/vacancies/{{ $b->slug }}">{{ $b->title }}</a></h5>
						<p class="badge badge-purple">
							{{ $b->monthlySalary() }}
						</p>
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

@include('components.ads.responsive')

@endif


@endsection
