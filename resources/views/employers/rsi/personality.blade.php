@extends('layouts.seek')

@section('title','Emploi :: Candidate Personality')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
<div class="container">
    <div class="single">  
	   <div class="form-container row">
        <h2 class="col-md-8 col-md-offset-2" >
        	 {{ $application->user->name }} <br>
        	
        </h2>
        <p class="col-md-8 col-md-offset-2" style="text-align: center;">
        	<a href="/employers/applications/{{ $application->post->slug }}/">
        	{{ $application->post->title }}
        	</a>
        	||
        	<a href="/employers/applications/{{ $application->post->slug }}/{{ $application->id }}/rsi">
        		RSI {{ $application->user->seeker->getRsi($application->post) }}%
        	</a>
        </p>
        <div class="search_form1 row">

        	<br>
		    
		    <form method="POST" class="col-md-8 col-md-offset-2" action="/employers/applications/{{ $application->post->slug }}/{{ $application->id }}/rsi/personality">
		    	@csrf
		    	<p>
						<label>Select Personality </label>
						<select required="" name="personality" class="form-control">
							<option value="">Select</option>
							@foreach($personalities as $p)
							<option value="{{ $p->id }}"
								@if(isset($application->seekerPersonality->id) && $application->seekerPersonality->personality_id == $p->id)
								selected=""
								@endif
								>{{ $p->name }}</option>
							@endforeach
						</select>
						
					</p>
				<br>
				<hr>
				<p>
					<input type="submit" name="" >
				</p>
		    </form>
        	
	    	
		    
	    </div>
    </div>
 </div>
</div>


@endsection