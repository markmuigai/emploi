@extends('layouts.seek')

@section('title','Emploi :: '.$app->post->title.' Application')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@include('seekers.search-input')
<div class="container">
    <div class="single">  
	   
	 <div class="col-md-8 single_right">
	      <h3>
	      	<i class="fa fa-arrow-left" title="View Applications" onclick="window.location='/profile/applications'"></i>
	      	{{ $app->post->title }} Application

	      	<a href="/profile/applications" class="btn btn-sm btn-primary pull-right"><i class="fa fa-user"></i> profile</a>
	      	<a href="/vacancies" class="pull-right btn btn-sm btn-success"><i class="fa fa-briefcase"></i> Vacancies</a>
	      	<br><br>
	      	<small><b>{{ $app->created_at }}</b></small>

	      	<small class="pull-right">
				@if($app->post->isShortlisted($user->seeker))
				<span style="color: green">SHORTLISTED</span>
				@else
				not shortlisted
				@endif
			</small>
	      </h3>
	      <div class="row_1">
	      	
	      	<div class="clearfix"> </div>
	      </div>

	      <div style="border-bottom: 0.1em solid gray">
	      	<h4 style="font-weight: bold">Company</h4>
	      	<a href="/companies/{{ $app->post->company->id }}">{{ $app->post->company->name }}</a> 
	      	<a href="{{$app->post->company->website}}" class="pull-right">{{$app->post->company->website}}</a>
	      	<br>
	      	{{ $app->post->company->tagline }} 
	      </div>

	      <br>
	      
	      <div style="border-bottom: 0.1em solid gray">
	      	<h4 style="font-weight: bold">Cover Letter</h4>
	      	<?php echo $app->cover; ?>
	      </div>

	      <br>



	      <p><i>Resume was attached from your profile</i></p>
	   </div>
	   <div class="col-md-4">
	   	  @include('left-bar')
	   	  
	 </div>
	   <div class="clearfix"> </div>
	 </div>
</div>

@endsection