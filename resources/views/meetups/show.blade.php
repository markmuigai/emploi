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
                                <form method="POST" action="/events-subscriptions">
                                    @csrf
                                    <input type="hidden" name="slug" value="{{ $meetup->slug }}">
                                    <input type="submit" value="SUBSCRIBE TO EVENT" title="Express Interest"  class="btn btn-sm btn-orange-alt">
                                </form>
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

        			<p>
        				
        			</p>

        		</div>
        		<div class="col-md-12 card">
        			<?php
        				print $event->description;
        			?>
        		</div>

        	</div>
        </div>
        
    </div>
</div>
@include('components.share-event')
@include('components.employers.covid19')
@include('components.ads.responsive')



@endsection

