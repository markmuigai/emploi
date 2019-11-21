@extends('layouts.seek')

@section('title','Emploi :: My Applications')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@include('seekers.search-input')
<div class="container">
    <div class="single">

	 <div class="col-md-8 single_right">
	      <h3>
	      	My Applications

	      	<a href="/profile" class="btn btn-sm btn-primary pull-right"><i class="fa fa-user"></i> My Profile</a>
	      	<a href="/vacancies" class="pull-right btn btn-sm btn-success"><i class="fa fa-briefcase"></i> Vacancies</a>
	      	<br>
	      	<small><strong>{{ count($user->applications) }} applications</strong></small>
	      </h3>
	      <div class="row_1">

	      	<div class="clearfix"> </div>
	      </div>

	      <div>
	      	@if(count($user->applications) > 0)
	      		Here are your past job applications.
	      	@else
	      		You have not made any job application
	      	@endif


	      	<div class="row" style="margin: 1em 0">
	      		@forelse($user->applications as $app)
	      		<div class="col-md-6 hover-bottom" style="padding: 0.5em">
	      			<strong>{{ $app->post->title }}</strong>
	      			<small class="pull-right">[ {{ $app->post->status }} ]</small>
	      			<br>
	      			{{ $app->created_at }} <br>
	      			<a href="/profile/applications/{{ $app->id }}" class="btn btn-sm btn-success">view</a>
	      			<small class="pull-right">
	      				@if($app->post->isShortlisted($user->seeker))
	      				<span style="color: green">SHORTLISTED</span>
	      				@else
	      				not shortlisted
	      				@endif
	      			</small>
	      		</div>
	      		@empty
	      		@endforelse
	      	</div>

	      </div>
	   </div>
	   <div class="col-md-4">
	   	  @include('left-bar')

	 </div>
	   <div class="clearfix"> </div>
	 </div>
</div>

@endsection
