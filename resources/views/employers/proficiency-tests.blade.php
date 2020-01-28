@extends('layouts.general-layout')

@section('title','Emploi :: Proficiency Tests')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
<div class="container pb-0 pb-lg-4 pt-4">
	<h3 class="orange text-center">Proficiency Tests</h3>
	@include('components.ads.responsive')
	<div class="row pb-3 align-items-center">
		<div class="col-md-4">
			<img src="/images/proficiency-test.png" class="w-100" alt="Proficiency Tests">
		</div>
		<div class="col-md-8">
			<p>
				The importance of these tests cannot be overemphasized, when it comes to determine the suitability and skill set for particular candidates and the job requirements. <br>
				Through this service you are able as employer to receive the test score for a candidate on the aptitude and proficiency tests. <br>
				You may also request for the administration of this on your own sourced candidates
			</p>
			<p>
				By administering proficiency tests on a candidate, the employer will be able to deeply analyze a candidate's strengths and weaknesses which may not be present in their resume.
			</p>
		</div>
	</div>
	<div class="text-center">
		<p>Want to hire the best?</p>
		<a href="/contact" class="btn btn-orange">Contact Us Today</a>
	</div>
</div>

@endsection
