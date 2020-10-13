@extends('layouts.dashboard-layout')

@section('title','Emploi :: Application Success')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', $post->title)

<div class="card">
    <div class="card-body text-center">
        <h4 style="color: green">Application Success!</h4>
        @include('components.ads.responsive')
        <p>
            Application for {{ $post->title }} was completed successful.
        </p>
      <p>
            You will be notified on your application progress in due time. Keep track of your application by logging into your account. For further assistance, please do not hesitate to <a class="orange" href="/contact">contact us.</a>
        </p>
        <p> @include('components.otherJobs')</p>
        <br>
    	@if($created)
    	<p>
    		We have created a job seeker profile for you. Check your e-mail address for a verification link then login and update your profile. <br>
    		<a href="/login" class="btn btn-orange btn-sm">{{ __('auth.login') }}</a>
            <a href="/vacancies" class="btn btn-primary btn-sm">Vacancies</a>
    	</p>
    	@endif
    </div>
</div>



@endsection