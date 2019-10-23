@extends('layouts.seek')

@section('title','Emploi :: @'.$application->user->username.' || RSI  '.$application->user->seeker->getRsi($application->post).'%')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
<div class="container">
    <div class="single">  
	   <div class="contact_top">
	   	 <h2>{{ $application->user->name }}</h2>
	   	 <p style="text-align: center;">
	   	 	RSI - 
	   	 	<a href="/employers/applications/{{ $application->post->slug }}">{{ $application->post->title }}</a>
	   	 	 || {{ $application->user->seeker->getRsi($application->post) }}%</p>
	     
          <div class="row" style="">
	   	   <div class="addr">
                
                
	   	   		<hr>
				
				<div class="row">
					<div class="col-md-6 col-md-offset-3" style="text-align: center;">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-6" style="margin-bottom: 0.5em; border-bottom: 0.1em solid gray">
								Personality <br>
								<a class="btn btn-sm btn-edit btn-link" href="/employers/applications/{{ $application->post->slug }}/{{ $application->id }}/rsi/personality">
									@if(isset($application->seekerPersonality->id))
										{{ $application->seekerPersonality->personality->name }}
									@else
									-not set-
									@endif
								</a>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-6" style="margin-bottom: 0.5em; border-bottom: 0.1em solid gray">
								IQ Scores <br>
								<a class="btn btn-sm btn-edit btn-link" href="/employers/applications/{{ $application->post->slug }}/{{ $application->id }}/rsi/iq">
									{{ $application->iqScore }}%
								</a>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-6" style="margin-bottom: 0.5em; border-bottom: 0.1em solid gray">
								Interview <br>
								<a class="btn btn-sm btn-edit btn-link" href="/employers/applications/{{ $application->post->slug }}/{{ $application->id }}/rsi/interview">
									{{ $application->interviewScore }}%
								</a>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-6" style="margin-bottom: 0.5em; border-bottom: 0.1em solid gray">
								Psychometric <br>
								<a class="btn btn-sm btn-edit btn-link" href="/employers/applications/{{ $application->post->slug }}/{{ $application->id }}/rsi/psychometric">
									{{ $application->psychometricScore }}%
								</a>
							</div>
							<br>
							<p>
								{{ $application->user->seeker->industry->name }} <br>
								{{ $application->user->seeker->sex }} <br>
								{{ $application->user->seeker->years_experience }}yr{{ $application->user->seeker->years_experience > 1 ? 's' : '' }} experience <br><br>
								{{ $application->user->seeker->location->name }}, {{ $application->user->seeker->location->country->code }}
							</p>
						</div>
						<div style="display: none">
							<b>Notes</b><br>
							- Profile not completed<br>
							- Education requirements not met<br>
							- Experience not adequate<br><br>
						</div>
						

						

						<a class="btn btn-sm btn-success" href="/employers/applications/{{ $application->post->slug }}/{{ $application->id }}/cover"><i class="fa fa-file-o"></i> Cover Letter</a>
						<a href="/employers/browse/{{ $application->user->username }}" class="btn btn-sm btn-primary" style=""><i class="fa fa-user"></i> Profile</a>
						<a class="btn btn-sm btn-danger" href="{{ asset('/storage/resumes/'.$application->user->seeker->resume) }}"><i class="fa fa-file-o"></i> Resume</a>
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