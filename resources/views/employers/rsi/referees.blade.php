@extends('layouts.seek')

@section('title','Emploi :: '.$app->user->name.' Referees')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
<div class="container">
    <div class="single">  
	   <div class="contact_top">
	   	 <h2>{{ $app->user->name }} Referees</h2>
	     
          <div class="row" style="">
	   	   <div class="addr col-md-8 col-md-offset-2 row" style="text-align: center;">
                
                @if(count($app->user->seeker->referees) > 0)

                	<div>
                		<h4>Selected Referees for RSI</h4>
                		<div class="row">
                		@forelse($app->seekerApplications as $b)
                			<div class="col-md-4 col-xs-6 hover-bottom">
                				{{ $b->jobApplicationReferee->referee->relationship }} at {{ $b->jobApplicationReferee->referee->organization }} <br>
                				<b>{{ $b->jobApplicationReferee->referee->name }}</b>
                			</div>
                			
                		
                		@empty
                		
                			No referees selected for RSI
                		

                		@endforelse
                		</div>
                	</div>
                	<br><br>
                	<h4>All Referees</h4>
                	@forelse($app->user->seeker->referees as $ref)
                	<div style="text-align: left;" class="col-md-6 col-xs-6 hover-bottom">
                		{{ $ref->relationship.' at '.$ref->organization }} <br>
                		<b>{{ $ref->name }}</b> <br>
                		@if($ref->ready)
                			<hr>
                			<p>
                				<input type="checkbox" onchange="window.location='/employers/applications/{{ $app->post->slug }}/{{ $app->id }}/rsi/referees/toggle?referee_id={{ $ref->id }}'"
                				@if($app->usesReferee($ref->id))
                					checked=""
                				@else
                				@endif

                				>
                				Add to RSI
                			</p>
                			
                		@else
                		<i>Referee has not provided assesment</i>
                		@endif
                	</div>
                	@empty
                	@endforelse
                
                @else
                <p>
                	{{ $app->user->name }} has no referees indicated. <a href="/employers/applications/{{ $app->post->slug }}/{{ $app->id }}/rsi/referees/add">Request Referee</a>
                </p>
                @endif

				
				<div class="row">
					<div class="col-md-6 col-md-offset-3" style="text-align: center;">
					
						 <br><br><br>
						<a href="/employers/applications/{{ $app->post->slug }}/{{ $app->id }}/rsi" class="btn btn-success btn-sm">View RSI</a>
						<a href="/employers/applications/{{ $app->post->slug }}/{{ $app->id }}/rsi/referees/add" class="btn btn-primary btn-sm">Request Referee</a>
					</div>
				</div>
				<p>
					
				</p>
				
				
				
                
           </div>
          </div>
          <div class="clearfix"> </div>
	   </div>
	   
    </div>
</div>

@endsection