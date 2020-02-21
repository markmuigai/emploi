@extends('layouts.dashboard-layout')

@section('title','Emploi :: Job Seeker Dashboard')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Dashboard')



<h4>Recent Blogs</h4>

<div class="row">
	@forelse ($blogs->slice(0, 6) as $b)
	<div class="col-md-4 ">
		<div class="card my-2">
			<div class="card-body">
				<div class="row align-items-center">
					<a href="/blog/{{ $b->slug }}" class="w-100">
						<img src="{{ asset($b->imageUrl) }}" class="w-100" alt="{{ $b->title }}">
					</a>
					<div>
						<a href="/blog/{{ $b->slug }}" class="orange">
							<h5>{{ $b->getTitle() }}</h5>
						</a>
						<a href="/blog/{{ $b->category->slug }}" class="badge badge-purple">
							{{ $b->category->name }}
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
	<div style="text-align: center;" class="col-md-10 offset-md-1">
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
						<br>
						<span href="/vacancies/{{ $b->slug }}">{{ $b->created_at->diffForHumans() }}</span>
					</div>
					<div class="col-8">
						<h5><a href="/vacancies/{{ $b->slug }}">{{ $b->title }}</a></h5>
						<p>
							<a href="/companies/{{ $b->company->name }}">{{ $b->company->name }}</a>
							<small class="badge badge-purple">{{ $b->monthlySalary() }}</small>
						</p>
						

						
						<?php 
		                    $show = true; 
		                    if(Auth::user()->seeker->hasApplied($b))
		                    {
		                        $show = false;
		                    }
		                ?>
		                @if($show)
		                <a href="/vacancies/{{ $b->slug }}" class="btn btn-orange">View and Apply</a>

		                @else
		                <span class="btn btn-orange-alt">Applicattion Sent</span>

		                @endif
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
