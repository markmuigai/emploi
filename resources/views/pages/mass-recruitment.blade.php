@extends('layouts.general-layout')

@section('title','Emploi :: Mass Recruitment')

@section('description')
Emploi is the Leading Platform for Talent Assessment and Matching for SME's in Africa.
@endsection

@section('content')
<div class="container py-4">
	<h2 class="orange text-center">Mass Recruitment</h2>
	<div class="row pb-3 align-items-center">
		<div class="col-md-4">
			<img src="/images/mass-recruitment.jpg"class="w-100" alt="Mass Recruitment">
		</div>
		<div class="col-md-8">
			<p>
				We offer top-notch mass recruitment tools that will come in handy for employers both in local market and abroad. We have supplied large numbers of skilled and semi-skilled labour to organizations in the hospitality sector,
				agricultural and manufacturing sectors.
			</p>
			{{-- @include('components.ads.responsive') --}}
			<p>
				Are you looking to recruit multiple positions within a short time? With a turn around time of 2-4 days, our mass recruitment service would guarantee you quality affordable candidates who will fit into your organization's culture.
			</p>
			<div class="text-center">
				<p>Want to hire the best?</p>
				<a href="/contact" class="btn btn-orange">Contact Us Today</a>
			</div>
		</div>
	</div>
</div>

@endsection
