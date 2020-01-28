@extends('layouts.general-layout')

@section('title','Emploi :: Linkage with Training Firms')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
<div class="container pb-0 pb-lg-4 pt-4">
	<h3 class="orange text-center">Linkage with Training Firms</h3>
	@include('components.ads.responsive')
	<div class="row pb-3 align-items-center">
		<div class="col-md-4">
			<img src="/images/training.png" class="w-100" alt="Linkage with Training Firms">
		</div>
		<div class="col-md-8">
			<p>
				Changing business environments require constant capacity building to improve the skills of your team and keep you ahead of competition and other business challenges. Emploi has thus set itself up to support you in identifying the best
				provider of training solutions as per your needs.
			</p>
		</div>
	</div>

	<!-- <p>
	      		Employers are advised to conduct IQ tests on candidates and employees to be in a better positioning when planning human resources
	      	</p> -->

	<div class="text-center">
		<p>Want to hire the best?</p>
		<a href="/contact" class="btn btn-orange">Contact Us Today</a>
	</div>
</div>


@endsection
