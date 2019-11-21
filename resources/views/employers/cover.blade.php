@extends('layouts.seek')

@section('title','Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="container">
    <div class="single">
	   <div class="form-container row">
        <h2 class="col-md-8 col-md-offset-2" >
        	Cover Letter <br>

        </h2>

        <div class="col-md-8 col-md-offset-2">
        	<p style="text-align: center;">
        		<a href="/employers/applications/{{ $application->post->slug }}">{{ $application->post->title }}</a>
        		<br>
        		<i><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($application->created_at))->diffForHumans() ?></i><br>
        		<a href="/employers/browse/{{ $application->user->username }}">
        			@if($application->post->isShortlisted($application->user->seeker))
        				<i class="fa fa-check"></i>
        			@endif
        			<strong>{{ $application->user->name }}</strong>
        		</a>

        	</p>
        	<hr>
        	<?php echo $application->cover ?>
        </div>

    </div>
 </div>
</div>

@endsection
