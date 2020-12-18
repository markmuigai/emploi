@extends('layouts.dashboard-layout')

@section('title','Events' )

@section('description')
Emploi Events is the place to find Career Transformational Conferences, Seminars and Webinars for a successful career.
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
                <?php $meetup = $event; ?>
                @include('components.share-event')

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
                             <button class="btn btn-orange-alt" data-toggle="modal" data-target="#shareEvent{{ $meetup->id }}"><i class="fas fa-share-alt"></i> Share</button>
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
    
    
    
          <br> <div class="col-md-12 card" >
                    <h3 class="orange"><center>Past Events</center></h3>
                    <div class="card-body row">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/l_UYqvX6gsA" class="col-md-8" frameborder="0" allowfullscreen></iframe>       
                        <div class="col-md-4" style="text-align: center;">
                        <h4>CV Writing Masterclass</h4>
                            <p>Catch our C.E.O talk and give insights from our Grand CV Review Drive and advice on cutting edge CV and Job hunting techniques during and post Covid-19.
                            </p>                           
                        </div>
                    </div>                    
                </div>

                <div class="col-md-12 card" >
                    <div class="card-body row">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/CbyM1B_pagM" class="col-md-8" frameborder="0" allowfullscreen></iframe>                    
                        <div class="col-md-4" style="text-align: center;">
                            <h4>Employment to Entrepreneurship</h4>
                            <p>We were able to host successful entrepreneurs who were able to shed more light on how and what starting a business entails.
                            </p>                           
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>



<div>
	{{ $meetups->links() }}
</div>
{{-- <div class="card mb-4">
    <div class="card-body">
        @if($agent->isMobile())
            @include('components.ads.mobile_400x350')
        @else            
            @include('components.ads.flat_728x90')
        @endif
    </div>
</div>   --}}
@endsection