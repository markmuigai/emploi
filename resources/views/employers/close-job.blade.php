@extends('layouts.seek')

@section('title','Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')


<div class="container">
    <div class="single">
	   <div class="contact_top">
	   	 <h2 style="margin-bottom: 0">{{ $post->title }}</h2>

	   	 <p class="col-md-8 col-md-offset-2" style="text-align: center; padding: 0.5em; border-bottom: 0.1em solid black">
        	<a href="/employers/applications/{{ $post->slug }}" class="btn btn-sm btn-info">Applications ({{ count($post->applications) }})</a>
            <a href="/employers/applications/{{ $post->slug }}/rsi" class="btn btn-sm btn-danger">

                @if(!$post->hasModelSeeker())
                <i class="fa fa-warning"  title="RSI Model Not Created"></i>
                @else
                <i class="fa fa-check" title=""></i>
                @endif
                RSI Model

            </a>
            <br class="go-mobile">

            @if($post->status == 'active')
            <a href="/employers/applications/{{ $post->slug }}/invite" class="btn btn-success btn-sm">Invite</a>
            @else
            @endif

        </p>


          <div class="clearfix"> </div>
	   </div>

	   	<div class="row">
	   	   	<h4 style="text-align: center;">Selected Candidates</h4>
	   	   	@forelse($post->candidates as $c)
	   	   	<div class="col-md-8 col-md-offset-2 row" style="padding: 1em; overflow: hidden; border-bottom: 0.1em solid gray">
	   	   		<img src="{{ asset($c->seeker->user->getPublicAvatarUrl()) }}" style="border-radius: 50%" class="col-md-3 col-xs-3" style="width: 100%">

	   	   		<p class="col-md-9 col-xs-9" style="text-align: center; ">

	   	   			<a href="/employers/browse/{{ $c->seeker->user->username }}"><strong>{{ $c->seeker->user->name }}</strong></a> <br>
	   	   			<span>RSI {{ $c->seeker->getRsi($post) }}%</span> <br>
	   	   			<span>{{ $post->location->country->currency }} {{ $c->monthly_salary }} p.m.</span> <br>

	   	   		</p>
	   	   	</div>
	   	   	@empty
	   	   	<p style="text-align: center;">No Candidates selected</p>
	   	   	@endforelse

	   	   	@if($post->positions > count($post->candidates))


   	   		<form class="col-md-6 col-md-offset-3" method="post">
				<hr>
   	   			<h4 style="text-align: center;">Select Candidate</h4>
   	   			@csrf
   	   			<p>
   	   				<label>Select Candidate</label>
   	   				<select class="form-control" name="seeker_id" required="">
   	   					<option value="">Select Candidate</option>
   	   					@forelse($post->shortlisted as $a)

   	   						<option value="{{ $a->user->seeker->id }}">RSI {{ $a->user->seeker->getRsi($post) }}% || {{ $a->user->name }} </option>
   	   					@empty
   	   					@endforelse
   	   				</select>
   	   			</p>
   	   			<p>
   	   				<label>Monthly Salary</label>
   	   				<input type="number" name="monthly_salary" class="form-control" value="{{ $post->monthly_salary }}" required="">
   	   			</p>
   	   			<br>
   	   			<input type="submit" class="pull-right btn btn-primary btn-sm" name="">
   	   		</form>
   	   		@else

   	   			<p class="col-md-6 col-md-offset-3" style="text-align: center;">
   	   				<br>All Positions have been filled</p>
   	   		@endif
       	</div>

    </div>
</div>

@endsection
