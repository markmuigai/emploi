@extends('layouts.dashboard-layout')

@section('title','Events' )

@section('description')
Emploi Events is the place to find career transformational Conferences, Seminars and Webinars for a successful career.
@endsection

@section('content')
@section('page_title', 'Emploi Events' )

<div class="card">
    <div class="card-body">
        <div class="container">
        	<div class="row">
        		<form class="col-md-12" method="get" >
					<input type="text" name="name" placeholder="Search .." class="form-control" value="{{ request('name') != null ? request('name') : '' }}">
        		</form>
        		<br><br>
        		@forelse($meetups as $event)

        		<div class="col-md-12 card" >
        			<div class="card-body row">
        				<a href="/events/{{ $event->slug }}"  class="col-md-4">
        					<img src="{{ asset($event->imageUrl) }}" style="width: 100%">
						</a>
	        			<div class="col-md-8" style="text-align: center;">
	        				<a href="/events/{{ $event->slug }}" class="orange" style="font-weight: bold;">{{ $event->name }}</a><br>
	        				<b>{{ $event->startsAt() }}</b> <hr>
	        				{{ $event->caption }}
	        				<br>
	        				@guest

								<a href="/login?redirectToUrl={{url('/events/'.$event->slug)}}" class="btn btn-orange">Log in</a> to Subscribe
	        				@else
	        					@if(Auth::user()->role == 'admin')
	        					
	        					<a href="/events/{{ $event->slug }}/edit" class="btn btn-link">Edit</a>

	        					@else

	        					<a href="/events/{{ $event->slug }}" class="btn btn-orange-alt">View Details</a>

	        					@endif

	        				@endguest
	        			</div>
        			</div>
        			
        		</div>

        		@empty

        		<div class="col-md-8 offset-md-2">
        			<p style="text-align: center;">
        				No events found, check back later
        				<br><br>
        				<a href="/vacancies" class="btn btn-sm btn-orange">Vacancies</a>
        				<a href="/blog" class="btn btn-sm btn-orange-alt">Career Centre</a>
        			</p>
        		</div>

        		@endforelse
        	</div>
        	
        </div>
        
    </div>
</div>
<div>
	{{ $meetups->links() }}
</div>
@include('components.ads.responsive')



@endsection