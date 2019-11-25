@extends('layouts.dashboard-layout')

@section('title','Emploi :: '.$company->name)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Company Details' )

<div class="card">
	<div class="card-body">
		<div class="row align-items-center">
			<div class="col-md-9">
				<div class="row align-items-center">
					<div class="col-3">
						<img src="{{ asset($company->logoUrl) }}" alt="" class="circle-img w-100 h-100">
					</div>
					<div class="col-9">
						<h4>{{ $company->name }} <span class="badge badge-secondary">{{ count($company->activePosts) }} vacancies</span></h4>
						<h6 class="text-capitalize">{{ $company->tagline }}</h6>
						<p><i class="fas fa-map-marker-alt orange"></i> {{ $company->location->name.', '.$company->location->country->name }}</p>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<p>
					<i class="fas fa-share-alt"></i>
					Share:
					<a href="http://www.facebook.com/sharer.php?u={{ url('/company/'.$company->slug) }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
					<a href="https://twitter.com/share?url={{ url('/company/'.$company->slug) }}&amp;text={{ urlencode($company->title) }}&amp;hashtags=EmploiBlog" target="_blank"><i class="fab fa-twitter"></i></a>
					<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ url('/company/'.$company->slug) }}" target="_blank"><i class="fab fa-linkedin"></i></a>
				</p>
			</div>
		</div>
		<h5>About</h5>
		<p>
			<?php echo $company->about; ?>
		</p>
		<div class="row mt-4">
			<div class="col-md-6">
				<p><strong>Website: </strong><a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a></p>
			</div>
			<div class="col-md-6">
				<p><strong>Company Size: </strong>{{ $company->companySize->title }}</p>
			</div>
			<div class="col-md-6">
				<p><strong>Industry: </strong>{{ $company->industry->name }}</p>
			</div>
			<div class="col-md-6">
				<p><strong>Type: </strong>Privately Held</p>
			</div>
			<div class="col-md-6">
				<p><strong>Headquarters: </strong>{{ $company->location->name . ', '.$company->location->country->name }}</p>
			</div>
			<div class="col-md-6">
				<p class="text-capitalize"><strong>Status: </strong>{{ $company->status }}</p>
			</div>
		</div>


	</div>
</div>

<h3>
	<i class="fa fa-arrow-left" title="View All Companies" onclick="window.location='/companies'"></i>
	{{ $company->name }}
	<small class="pull-right">[{{ count($company->activePosts) }} vacancies]</small>

</h3>

<div class="row">
	<div class="col-md-3 col-xs-4">
		<img src="{{ asset($company->logoUrl) }}" style="width: 100%">
	</div>
	<div class="col-md-5 col-xs-8" style="text-align: center;">
		<br>
		<a href="{{ $company->website }}">{{ $company->website }}</a> <br>
		{{ $company->industry->name }} <br>
		{{ $company->companySize->lower_limit.' - '.$company->companySize->upper_limit }} people <br>
		{{ $company->location->name.', '.$company->location->country->name }}
	</div>
	<div class="col-md-4">
		<h4 class="no-mobile">Contacts</h4>


		@if(isset(Auth::user()->id))
		<p>
			{{ $company->user->employer->address  }}
		</p>
		<p>
			{{ $company->user->employer->company_phone }} <br>
			{{ $company->user->employer->company_email }} <br>
		</p>
		@else
		<p>
			Login to view contact details. <br>
			<a href="/login">login</a>
		</p>
		@endif
	</div>



</div>

<div class="row">
	<div class="col-md-6 col-md-offset-3" style="text-align: center;">
		<img src="{{ asset($company->coverUrl) }}" style="width: 100%">
		<br>
		<strong>{{ $company->tagline }}</strong><br>
	</div>

</div>

<div class="row">
	<br>
	<?php echo $company->about; ?>
</div>

<hr>

@if(count($company->activePosts) > 0)
<div>
	<h3>{{ $company->name }} Vacancies</h3>
	<div class="row">
		@foreach($company->activePosts as $post)
		<div class="col-md-3 hover-bottom" style="text-align: center;">
			<a href="/vacancies/{{ $post->slug }}" style="text-decoration: none;">
				<h5>{{ $post->title }}</h5>
				<img src="{{ asset($post->imageUrl) }}" style="width: 100%">
			</a>
			@if(isset(Auth::user()->id))
			{{ $post->monthlySalary() }}

			@else
			<i>login to apply</i>
			@endif
		</div>

		@endforeach
	</div>
</div>
@else
<div>
	<p>No vacancies available</p>
</div>
@endif





@endsection