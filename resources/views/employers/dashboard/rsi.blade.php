@extends('layouts.seek')

@section('title','Emploi :: Model Seeker for '.$post->title)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
<style type="text/css">
	.ms-skill {
		padding: 0.5em;
	}
</style>
<div class="container" id="rsi-container">
    <div class="single">  
	   
	 <div class="col-md-8 single_right">
	    <h3>
	    	@if(!$post->hasModelSeeker())
	    	<i class="fa fa-warning" title="RSI Model Not Created"></i>
	    	@else
	    	<i class="fa fa-check" title=""></i>
	    	@endif
	    	RSI Model for {{ $post->title }}
	    	
	    	<small><a href="/employers/applications/{{ $post->slug }}" class="btn btn-sm btn-danger pull-right">back</a></small>
	    	
	    </h3>	

	    
		<form method="post">
			@if(!$post->hasModelSeeker())
		    <i>
		    	By creating an RSI Model, you will be able to rank applicants according by comparing their education, experience, skills, inteview scores and much more. <a href="/employers/role-suitability-index" class="pull-right">learn more</a>
		    </i>
		    @else
		    <div class="row" style="text-align: center; border: 0.1em solid #500095;  padding: 0.5em 0; border-radius: 5px">
		    	<br>
		    	<h4>Adjust Importance</h4>
		    	<div class="col-md-4 col-xs-6">
		    		<br>
		    		<p>Education</p>
		    		<select name="education_importance" class="form-control">
		    			@foreach($weights as $w)
		    			<option value="{{ $w->weight }}"
		    				@if($post->modelSeeker->education_importance == $w->weight)
		    				selected="selected"
		    				@endif
		    				>{{ $w->name }}</option>
		    			@endforeach
		    		</select>
		    		
		    	</div>
		    	<div class="col-md-4 col-xs-6">
		    		<br>
		    		<p>Experience</p>
		    		<select name="experience_importance" class="form-control">
		    			@foreach($weights as $w)
		    			<option value="{{ $w->weight }}"
		    				@if($post->modelSeeker->experience_importance == $w->weight)
		    				selected="selected"
		    				@endif
		    				>{{ $w->name }}</option>
		    			@endforeach
		    		</select>
		    	</div>
		    	<div class="col-md-4 col-xs-6">
		    		<br>
		    		<p>Interview</p>
		    		<select name="interview_importance" class="form-control">
		    			@foreach($weights as $w)
		    			<option value="{{ $w->weight }}"
		    				@if($post->modelSeeker->interview_importance == $w->weight)
		    				selected="selected"
		    				@endif
		    				>{{ $w->name }}</option>
		    			@endforeach
		    		</select>
		    	</div>
		    	<div class="col-md-4 col-xs-6">
		    		<br>
		    		<p>Skills </p>
		    		<select name="skills_importance" class="form-control">
		    			@foreach($weights as $w)
		    			<option value="{{ $w->weight }}"
		    				@if($post->modelSeeker->skills_importance == $w->weight)
		    				selected="selected"
		    				@endif
		    				>{{ $w->name }}</option>
		    			@endforeach
		    		</select>
		    	</div>
		    	<div class="col-md-4 col-xs-6">
		    		<br>
		    		<p>Intellectual Quotent </p>
		    		<select name="iq_importance" class="form-control">
		    			@foreach($weights as $w)
		    			<option value="{{ $w->weight }}"
		    				@if($post->modelSeeker->iq_importance == $w->weight)
		    				selected="selected"
		    				@endif
		    				>{{ $w->name }}</option>
		    			@endforeach
		    		</select>
		    	</div>
		    	<div class="col-md-4 col-xs-6">
		    		<br>
		    		<p>Psychometric Test </p>
		    		<select name="psychometric_importance" class="form-control">
		    			@foreach($weights as $w)
		    			<option value="{{ $w->weight }}"
		    				@if($post->modelSeeker->psychometric_importance == $w->weight)
		    				selected="selected"
		    				@endif
		    				>{{ $w->name }}</option>
		    			@endforeach
		    		</select>
		    	</div>
		    	<div class="col-md-4 col-xs-6">
		    		<br>
		    		<p>Personality Profile</p>
		    		<select name="personality_importance" class="form-control">
		    			@foreach($weights as $w)
		    			<option value="{{ $w->weight }}"
		    				@if($post->modelSeeker->personality_importance == $w->weight)
		    				selected="selected"
		    				@endif
		    				>{{ $w->name }}</option>
		    			@endforeach
		    		</select>
		    	</div>
		    	<div class="col-md-4 col-xs-6">
		    		<br>
		    		<p>Previous Company Size </p>
		    		<select name="company_size_importance" class="form-control">
		    			@foreach($weights as $w)
		    			<option value="{{ $w->weight }}"
		    				@if($post->modelSeeker->company_size_importance == $w->weight)
		    				selected="selected"
		    				@endif
		    				>{{ $w->name }}</option>
		    			@endforeach
		    		</select>
		    	</div>
		    	<div class="col-md-4 col-xs-6">
		    		<br>
		    		<p>Referee Feedback</p>
		    		<select name="feedback_importance" class="form-control">
		    			@foreach($weights as $w)
		    			<option value="{{ $w->weight }}"
		    				@if($post->modelSeeker->feedback_importance == $w->weight)
		    				selected="selected"
		    				@endif
		    				>{{ $w->name }}</option>
		    			@endforeach
		    		</select>
		    	</div>
		    </div>
		    @endif


		    <hr>
			@csrf
			<p>
				<label>Desired Previous Company Size</label>
				<select name="company_size_id" class="form-control">
			    	@forelse($companySizes as $l)
					<option value="{{ $l->id }}"
						@if($post->hasModelSeeker())
							@if($post->modelSeeker->company_size_id == $l->id)
								selected=""
							@endif
						@endif
						>{{ $l->lower_limit .' - '.$l->upper_limit }} people</option>
			    	@empty
			    	@endforelse
			    </select>
			</p>
			<hr>
			<p>
				<label>Desired Education Level</label>
				<select name="education_level_id" class="form-control">
			    	@forelse($educationLevels as $l)
					<option value="{{ $l->id }}"
						@if($post->hasModelSeeker())
							@if($post->modelSeeker->education_level_id == $l->id)
								selected=""
							@endif
						@endif
						>{{ $l->name }}</option>
			    	@empty
			    	@endforelse
			    </select>
			</p>

			<p style="display: none;">
				<label>Education Importance</label>
				<select name="education_level_importance" class="form-control">
			    	@forelse([10,25,50,75,100] as $l)
					<option value="{{ $l }}"
						@if($post->hasModelSeeker())
							@if($post->modelSeeker->education_level_importance == $l)
								selected=""
							@endif
						@endif
					>{{ $l }}%</option>
			    	@empty
			    	@endforelse
			    </select>
			</p>

			<hr>

			<p>
				<label>Personality Profile</label>
				<select name="personality_test_id" class="form-control">
			    	@forelse($personalities as $l)
					<option value="{{ $l->id }}"
						@if($post->hasModelSeeker())
							@if($post->modelSeeker->personality_test_id == $l->id)
								selected=""
							@endif
						@endif
						>{{ $l->name }}</option>
			    	@empty
			    	@endforelse
			    </select>
			</p>

			<hr>

			<p>
				<label>Desired Experience Duration</label>
				<select name="experience_duration" class="form-control">
			    	@forelse([1,2,3,4,5,10,15,20,25] as $l)
					<option value="{{ $l }}"
						@if($post->hasModelSeeker())
							@if($post->modelSeeker->experience_duration == $l)
								selected=""
							@endif
						@endif
					>{{ $l }} year{{ $l != 1 ? 's' : '' }}</option>
			    	@empty
			    	@endforelse
			    </select>
			</p>

			<p style="display: none;">
				<label>Experience Importance</label>
				<select name="experience_level_importance" class="form-control">
			    	@forelse([10,25,50,75,100] as $l)
					<option value="{{ $l }}"
						@if($post->hasModelSeeker())
							@if($post->modelSeeker->experience_level_importance == $l)
								selected=""
							@endif
						@endif
					>{{ $l }}%</option>
			    	@empty
			    	@endforelse
			    </select>
			</p>

			<hr>

			<p style="text-align: center;">
				<label>IQ Test Required</label>
				<input type="checkbox" name="iq_test" 
				@if($post->hasModelSeeker())
					@if($post->modelSeeker->iq_test)
						checked=""
					@endif
				@else
					checked=""
				@endif
				>
			</p>

			<p>
				<label>Min IQ Score (0-100)</label>
				<input type="number" name="iq_score" class="form-control" value="{{ isset($post->modelSeeker->id) ? $post->modelSeeker->iq_score : 50 }}" step="0" min="0" max="100" required="required">
			</p>

			<hr>

			<p style="text-align: center;">
				<label>Interview Required</label>
				<input type="checkbox" name="interview" 
				@if($post->hasModelSeeker())
					@if($post->modelSeeker->interview)
						checked=""
					@endif
				@else
					checked=""
				@endif
				>
			</p>

			<p>
				<label>Min Interview Score (0-100)</label>
				<input type="number" name="interview_result_score" class="form-control" value="{{ isset($post->modelSeeker->id) ? $post->modelSeeker->interview_result_score : 50 }}" step="0" min="0" max="100" required="required">
			</p>

			<hr>

			<p style="text-align: center;">
				<label>Psychometric Test Required</label>
				<input type="checkbox" name="psychometric" 
				@if($post->hasModelSeeker())
					@if($post->modelSeeker->psychometric)
						checked=""
					@endif
				@else
					checked=""
				@endif
				>
			</p>

			<p>
				<label>Min Psychometric Score (0-100)</label>
				<input type="number" name="psychometric_test_score" class="form-control" value="{{ isset($post->modelSeeker->id) ? $post->modelSeeker->psychometric_test_score : 50 }}" step="0" min="0" max="100" required="required">
			</p>

			@if($post->hasModelSeeker())
			<div class="row" style="border-top: 0.1em solid black">
				<br>
				<h4 style="text-align: center;">Skills</h4>
				<div class="selected-skills">
					@forelse($post->modelSeeker->modelSeekerSkills as $mskill)
					<div class="col-md-6 ms-skill" skill_id="{{ $mskill->skill->id }}">
						<input type="hidden" name="skill_id[]" value="{{ $mskill->skill->id }}">
						<input type="hidden" name="skill_weight[]" value="{{ $mskill->weight }}">
						<p>
							<b>{{ $mskill->skill->name }}</b> || <i>{{ $mskill->weightName }}</i>
							<span class="pull-right btn btn-sm btn-danger remove-skill" skill_id="{{ $mskill->skill->id }}">x</span>
						</p>
					</div>
					@empty
					@endforelse
				</div>
				
				<div class="col-md-8 col-md-offset-2">
					<p>
						Add new skill <br>
						<select class="form-control" id="select-skill">
							<option value="-1">Select</option>
							@foreach($skills as $s)
							<option value="{{ $s->id }}">{{ $s->name }}</option>
							@endforeach
						</select>
						<select id="skill-weight" class="btn btn-sm">
							<option value="3">Necessary</option>
							<option value="2">Desired</option>
							<option value="1">Bonus</option>
						</select>
						<span class="btn btn-success btn-sm" id="add-skill">Add</span>
					</p>
					
				</div>
			</div>
			@endif

			<br>
			<hr>
			<br>

			<input type="submit"  class="btn btn-primary" value="Save RSI Model" name="">

			<br><br>
	    
	    </form>
	    
     </div>
     <div class="col-md-4">
	   	  @include('left-bar')
	   	  
	 </div>
     <div class="clearfix"> </div>
 </div>
</div>

<script type="text/javascript">
	<?php
		$sk = '';
		foreach($skills as $s)
		{
			$sk .= "[".$s->id.", '".$s->name."'],"; 
		}
		$sk = '['.$sk.']';
		echo 'var skills='.$sk.';';
	?>
	
</script>
<script type="text/javascript" src="/js/rsi.js"></script>

@endsection