@extends('layouts.dashboard-layout')

@section('title','Emploi :: '.$company->name)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Company Details' )

<div class="row">
	<div class="col-md-12 col-lg-9">
		<div class="card">
			<div class="card-header cover" style="background-image: url('{{ $company->coverUrl }}');"></div>
			<div class="card-body pb-0">
				<div class="row">
					<div class="col-lg-4 col-md-6">
						<img src="{{ asset($company->logoUrl) }}" alt="{{ $company->name }}" class="circle-img w-100 h-100">
					</div>
				</div>
				<div class="row align-items-center">
					<div class="col-lg-9 col-md-8">
						<h4>{{ $company->name }} <span class="badge badge-secondary">{{ count($company->activePosts) }} vacancies</span></h4>
						<h6 class="text-capitalize">{{ $company->tagline }}</h6>
						<p><i class="fas fa-map-marker-alt orange"></i> {{ $company->location->name.', '.$company->location->country->name }}</p>
					</div>
					<div class="col-lg-3 col-md-4">
						<p>
							<i class="fas fa-share-alt"></i>
							Share:
							<a href="http://www.facebook.com/sharer.php?u={{ url('/company/'.$company->slug) }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
							<a href="https://twitter.com/share?url={{ url('/company/'.$company->slug) }}&amp;text={{ urlencode($company->title) }}&amp;hashtags=EmploiBlog" target="_blank"><i class="fab fa-twitter"></i></a>
							<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ url('/company/'.$company->slug) }}" target="_blank"><i class="fab fa-linkedin"></i></a>
						</p>
					</div>
				</div>
				<h5 class="pt-3">About</h5>
				<p>
					<?php echo $company->about; ?>
				</p>
				<div class="row mt-4">
					<div class="col-md-6">
						<p><strong>Website: </strong><a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a></p>
					</div>
					<div class="col-md-6">
						<p><strong>Company Size: </strong>{{ $company->companySize->lower_limit.' - '.$company->companySize->upper_limit }} ({{ $company->companySize->title }})</p>
					</div>
					<div class="col-md-6">
						<p><strong>Industry: </strong>{{ $company->industry->name }}</p>
					</div>
					<div class="col-md-6">
						<p><strong>Type: </strong>Privately Held</p>
					</div>
					<div class="col-md-6">
						<p><strong>Loacation: </strong>{{ $company->location->name . ', '.$company->location->country->name }}</p>
					</div>
					<div class="col-md-6">
						<p class="text-capitalize"><strong>Status: </strong>{{ $company->status }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12 col-lg-3 mt-2">
		<div class="card">
			<div class="card-body text-center px-0">
				<h5 class="orange">Contact Details</h5>
				@if(isset(Auth::user()->id))
				<h6>Address</h6>
				<p>
					{{ $company->user->employer->address  }}
				</p>
				<h6>Phone Number</h6>
				<p>
					{{ $company->user->employer->company_phone }}
				</p>
				<h6>Email</h6>
				<p class="orange">
					<a href="mailto:{{ $company->user->employer->company_email }}">
						{{ $company->user->employer->company_email }}
					</a>
				</p>
				<p>
				</p>
				@else
				<p>
					Login to view contact details.
				</p>
				<a href="/login" class="orange">Login</a>
				@endif
			</div>
		</div>
	</div>
</div>


@if(count($company->activePosts) > 0)
<div class="featured-carousel">
	@foreach($company->activePosts as $post)
	<div class="card my-4 mx-md-0 mr-md-5 mr-md-2 mx-4">
		<div class="card-body text-center">
			<a href="/vacancies/{{ $post->slug }}">
				<div class="d-flex justify-content-center mb-3">
					<img src="{{ asset($company->logoUrl) }}" alt="{{ $company->name }}" class="circle-img">
				</div>
				<p class="badge badge-secondary">{{$post->positions}} Postions</p>
				<h5>{{ $post->title }}</h5>
			</a>
			<p><i class="fas fa-map-marker-alt orange"></i> {{ $post->location->name }}</p>
			<p>
				@if(isset(Auth::user()->id))
				{{ $post->monthlySalary() }} {{ $post->monthly_salary == 0 ? '' : 'p.m.' }}
				@else
				<p><a href="/login" class="orange">Login</a> to view salary</p>
				@endif
			</p>
		</div>
	</div>
	@endforeach
</div>
@else
<div class="card my-4">
	<div class="card-body text-center">
		<p>No vacancies available</p>
	</div>
</div>
@endif

<script type="text/javascript">
	$(document).ready(function() {
		$('.featured-carousel').slick({
			infinite: true,
			slidesToShow: 3,
			slidesToScroll: 2,
			arrows: true,
			prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
			nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
			responsive: [{
				breakpoint: 769,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
				}
			}, {
				breakpoint: 425,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
				}
			}, ]
		});
	});
</script>
@endsection
