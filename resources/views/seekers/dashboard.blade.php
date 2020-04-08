@extends('layouts.dashboard-layout')

@section('title','Emploi :: Job Seeker Dashboard')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Dashboard')



<h4>Recent Blogs</h4>

<div class="row">
	<div class="col-md-12">
		<?php $blogsTransparent = true; ?>
		@include('components.blogs')
	</div>
	
</div>
<hr>
<div style="text-align: center;" class="row">
	<div class="col-md-8 offset-md-2">
		<a href="/refer">
			<img src="/images/friends_refer_thin-flat.png" style="width: 80%" alt="Refer your Friends and Win">
		</a>
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

@include('components.employers.covid19')

@include('components.ads.responsive')

@endif


@endsection
