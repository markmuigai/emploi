@extends('layouts.seek')

@section('title','Emploi :: Browse CVs')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="container">
    <div class="single">  
	   <div class="form-container row">
        <h2 class="col-md-8 col-md-offset-2" >
        	Browse Candidates <br>
        	<form method="get" action="/employers/browse">
        		<input type="text" name="q" placeholder="Search" class="btn " value="{{ $query }}" style="border-bottom: 0.1em solid black">
        		<select name="industry" class="btn" style="border-bottom: 0.1em solid black; background-color: white">
        			<option value="">All Industries</option>
        			@forelse($industries as $i)
        			<option value="{{ $i->slug }}"
        				@if(isset($industry->id) && $i->id == $industry->id)
        				selected=""
        				@endif
        				>{{ $i->name }}</option>
        			@empty
        			@endforelse
        		</select>
        		<select name="location" class="btn" style="border-bottom: 0.1em solid black; background-color: white">
        			<option value="">All Locations</option>
        			@forelse($locations as $i)
        			<option value="{{ $i->id }}"
        				@if(isset($location->id) && $i->id == $location->id)
        				selected=""
        				@endif
        				>{{ $i->name }}</option>
        			@empty
        			@endforelse
        		</select>
        		<input type="submit" value="Search" class="btn btn-sm btn-info">
        	</form>
        </h2>
        <div class="search_form1 row">
		    
        	@forelse($seekers as $s)

        	<div class="col-md-8 col-md-offset-2 row" style=" border-bottom: 0.1em solid black">
        		<a style="font-weight: bold" href="/employers/browse/{{ $s->user->username }}">
        			<img src="{{ asset($s->user->getPublicAvatarUrl()) }}" style="border-radius: 50%" class="col-md-3 col-md-offset-2 col-xs-3">
        		</a>
        		<div class="col-md-5 col-xs-9" style="padding: 1em; text-align: center;">
        			<p>
        				<a style="font-weight: bold; font-size: 110%" href="/employers/browse/{{ $s->user->username }}">
        					{{ $s->public_name }}
        				</a>
        				 <br>
        				<small>{{ $s->industry->name }}</small>
        			</p>
        			
        			<p>
                        @if(isset($s->location))
        				{{ $s->location->name.', '.$s->location->country->code }}	
                        @else
                        {{ $s->country->name }}
                        @endif
        			</p>
        			@if(count($s->matchSeeker(Auth::user())) > 0)
        			<p>
        				<form method="post" action="/employers/shortlist">
        					@csrf
        					<input type="hidden" name="seeker_id" value="{{ $s->id }}">
	        				<select class="btn " name="post_id" required="required">
	        					<option>Shortlist for:</option>
	        					@forelse($s->matchSeeker(Auth::user()) as $post)
		        					@if(!$s->hasApplied($post))
		        					<option value="{{ $post->id }}">{{ $post->title }}</option>
		        					@endif
	        					@empty
	        					@endforelse
	        					
	        				</select>
	        				<button class="btn btn-sm btn-success">Go</button>
	        			</form>
        			</p>
        			@endif
        			
        		</div>
        		
        	</div>
        	@empty
        	<div class="col-md-8 col-md-offset-2 row" style="text-align: center;">
        		<p>No Job Seekers found</p>
        	</div>
        	
        	@endforelse
	    	
		    
	    </div>
    </div>
 </div>
</div>

@endsection