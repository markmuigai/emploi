@extends('layouts.dashboard-layout')

@section('title',$meetup->name )

@section('description')
{{ $meetup->caption ? $meetup->caption : 'Emploi Events is the place to find career transformational Conferences, Seminars and Webinars for a successful career.' }}
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
						<div class="col-md-8" style="text-align: center;">
							<a href="/events/{{ $event->slug }}" class="orange" style="font-weight: bold;">{{ $event->name }}</a><br>
							<b>{{ $event->startsAt() }}</b> <hr>
							
						</div>
					</div>
					
				</div>
        		<div class="col-md-5" style="text-align: center;">
        			<p>
        				@if(!true)
							<span class="btn btn-sm btn-orange-alt">SUBSCRIBED</span>
        				@else
							<span class="btn btn-sm btn-orange">SUBSCRIBE TO EVENT</span>
        				@endif
        				<br><br>
        				{{ $meetup->user->name }} <br>
        				Price: {{ $meetup->getPrice() }} <br>
        				@guest

        					<p><a href="/login?redirectToUrl={{url('/events/'.$meetup->slug)}}">Log in</a> to view organizer's contacts</p>

	        				

	        			@else

	        				Location: {{ $meetup->locationName }} <br>
	        				Address: <i>{{ $meetup->address }}</i><br>

	        				Email: <a href="mailto:{{ $meetup->email }}">{{ $meetup->email }}</a>
	        				<br>
	        				@if(isset($meetup->phone_number))
							Tel: <a href="tel:{{ $meetup->phone_number }}">{{ $meetup->phone_number }}</a>
	        				@endif

	        				<hr>
							
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
@include('components.ads.responsive')



@endsection

