@extends('layouts.dashboard-layout')

@section('title',$meetup->name )

@section('description')
{{ $meetup->caption ? $meetup->caption : 'Emploi Events is the place to find career transformational Conferences, Seminars and Webinars for a successful career.' }}
@endsection

@section('meta-include')
<meta property="og:url"           content="{{ url('/events/'.$meetup->slug) }}/" />
<meta property="og:title"         content="{{ $meetup->name }}" />
<meta property="og:description"   content=" {{ $meetup->caption }}" />

<meta property="og:image" content="{{ asset($meetup->imageUrl) }}">
<meta property="og:image:width"   content="900" />
<meta property="og:image:height"  content="600" />
@endsection

@section('content')
@section('page_title', $meetup->name )
<?php
$event = $meetup;
?>

<div class="card">
    <div class="card-body">
        <div class="container">
        	<div class="row">
        		<div class="col-md-7 " >
					<div class=" row">
						<a href="/events/{{ $event->slug }}" class="col-md-12">
							<img src="{{ $event->imageUrl }}" class="col-md-12">
						</a>
					</div>
					
				</div>
        		<div class="col-md-5" style="text-align: center;">
        			<p>
                        <button class="btn btn-orange-alt" data-toggle="modal" data-target="#shareEvent{{ $meetup->id }}"><i class="fas fa-share-alt"></i> Share</button>

                        <br>

                        <b>{{ $event->startsAt() }}</b>  <br>
        				
        				{{ $meetup->user->name }} <br>
        				Price: {{ $meetup->getPrice() }} <br>
                        Subscribers: ({{ count($meetup->subscriptions) }})
        				@guest

        					<p><a href="/login?redirectToUrl={{url('/events/'.$meetup->slug)}}" class="orange">Log in</a> to subscribe and view organizer's contacts</p>

	        				

	        			@else

                            @if(Auth::user()->hasEnrolledMeetup($meetup))
                                <p class="orange">Subscribed</p>
                            @else
                                @php($end_time = \Carbon\Carbon::parse($meetup->end_time))
                                @if($end_time->isPast()) 
                                    <h6 class="orange">This Event has expired. Kindly check on our <strong>past events</strong></h6>
                                    @else
                                    <form method="POST" action="/events-subscriptions">
                                        @csrf
                                        <input type="hidden" name="slug" value="{{ $meetup->slug }}">
                                        <input type="submit" value="SUBSCRIBE TO EVENT" title="Express Interest"  class="btn btn-sm btn-orange-alt">
                                    </form>
                                @endif   
                            @endif
                            <br>

	        				Location: {{ $meetup->locationName }} <br>
	        				Address: <i>{{ $meetup->address }}</i><br>

	        				Email: <a href="mailto:{{ $meetup->email }}">{{ $meetup->email }}</a>
	        				<br>
	        				@if(isset($meetup->phone_number))
							Tel: <a href="tel:{{ $meetup->phone_number }}">{{ $meetup->phone_number }}</a>
	        				@endif

                            @if(Auth::user()->role == 'admin')
                                <a href="/events/{{ $event->slug }}/subscribers" class="orange">View Subscribers ({{ count($meetup->subscriptions) }})</a>
                            @endif

							
        				@endguest
        			</p>


        		</div>
        		<div class="col-md-12 card">
                    <div class="card-body">
                        <h4 style="text-align: center;" class="orange">Description</h4>
                        
                        <?php
                            print $event->description;
                        ?>
                    </div>
        			
        		</div>

                <div class="col-md-12 card">
                    <div class="card-body " >
                        <h4 class="orange" style="text-align: center;">Instructions</h4>
                        @guest
                        <p><a href="/login?redirectToUrl={{url('/events/'.$meetup->slug)}}" class="orange">Log in</a> and subscribe to view event attendance instructions.</p>

                        @else
                            @if(Auth::user()->hasEnrolledMeetup($meetup))
                                <?php
                                    print $event->instructions;
                                ?>
                            @else
                                @php($end_time = \Carbon\Carbon::parse($meetup->end_time))
                                @if($end_time->isPast())                              
                                    <h6 class="orange">This Event has expired. Kindly check on our <strong>past events</strong></h6>  
                                    @else
                                     <form method="POST" action="/events-subscriptions">
                                        @csrf
                                        <input type="hidden" name="slug" value="{{ $meetup->slug }}">
                                        <input type="submit" value="SUBSCRIBE TO EVENT TO VIEW" title="Express Interest"  class="btn btn-sm btn-orange-alt">
                                    </form>
                                @endif
                           @endif
                        @endguest
                    </div>
                    
                </div>

        	</div>
        </div>
        
    </div>
</div>
@include('components.share-event')
{{-- <div class="card mb-4">
    <div class="card-body">
        @if($agent->isMobile())
            @include('components.ads.mobile_400x350')
        @else            
            @include('components.ads.flat_728x90')
        @endif
    </div>
</div> --}}

@endsection

