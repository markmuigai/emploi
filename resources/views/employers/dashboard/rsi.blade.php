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
		    		<p>Industry Skills </p>
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
		    	<div class="col-md-4 col-xs-6" style="display: none;">
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
		    		<p>Personal Traits</p>
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
						>{{ $l->title }}</option>
			    	@empty
			    	@endforelse
			    </select>
			</p>
			<hr>
			<p>
				<label>Desired Highest Education Level</label>
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

			@if($post->hasModelSeeker())
			<div>
				<h6 style="text-align: center;">Accepted Courses</h6>
				<div class=" accepted-courses">
					
					@forelse($post->modelSeeker->modelSeekerCourses as $course)
					<div class="col-md-4 col-xs-6 hover-bottom">
						{{ $course->course->title }} 
						<input type="hidden" name="modelSeekerCourses[]" class="listed-course" value="{{ $course->course->id }}">
						<span class="pull-right btn btn-sm btn-danger remove-course">x</span>
					</div>
					@empty
					@endforelse
				</div>
				<br>
				<div class="row">
					<br>
					<div class="col-md-9 col-xs-9">
						<select class="form-control" id="course-select">
							@forelse($courses as $course)
							<option value="{{ $course->id }}">{{ $course->title }}</option>
							@empty
							@endforelse
						</select>
					</div>
					<div class="col-xs-3 col-md-3">
						<span class="btn btn-success" id="course-add">Add</span>
					</div>
				</div>

			</div>
			@endif

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

			<p style="display: none;">
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

			<hr style="display: none;">

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

			<p style="text-align: center; display: none;">
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

			<p style="display: none">
				<label>Min IQ Score (0-100)</label>
				<input type="number" name="iq_score" class="form-control" value="{{ isset($post->modelSeeker->id) ? $post->modelSeeker->iq_score : 50 }}" step="0" min="0" max="100" required="required">
			</p>

			

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
				<h4 style="text-align: center;">Industry Skills</h4>
				<div class="selected-skills">
					@forelse($post->modelSeeker->modelSeekerSkills as $mskill)

					<div class="col-md-6 ms-skill" skill_id="{{ $mskill->industrySkill->id }}">
						<input type="hidden" name="skill_id[]" value="{{ $mskill->industrySkill->id }}">
						<input type="hidden" class="skill-weight" name="skill_weight[]" value="{{ $mskill->weight }}">
						<p>
							<b>{{ $mskill->industrySkill->name }}</b> || <i>{{ $mskill->weightName }}</i>
							<span class="pull-right btn btn-sm btn-danger remove-skill" skill_id="{{ $mskill->industrySkill->id }}">x</span>
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
							@foreach($industrySkills as $s)
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

			<p>
				<h4 style="text-align: center;">Other Skills</h4>

				<div class="row other-skills-pool" style="text-align: center;">
					
				</div>
				<br>
				<div class="row">
					<div class="col-md-7">
						<input type="text" name="" id="other-skill-name" class="form-control" placeholder="enter skill name">
					</div>
					<div class="col-md-3">
						<select class="btn btn-sm" id="other-skill-weight">
							<option value="3">Very Important</option>
							<option value="2">Important</option>
							<option value="1">Bonus</option>
						</select>
					</div>
					
					<span id="add-other-skill" class="btn btn-success btn-sm">Add</span>
				</div>

			</p>

			<hr>
			@if($post->hasModelSeeker())
			<div class="row" style="border-top: 0.1em solid black">
				<br>
				<h4 style="text-align: center;">Personal Traits</h4>
				<div class="selected-traits">

					@forelse($post->modelSeeker->modelSeekerPersonalityTraits as $trait)
					<div class="col-md-6 ms-trait" trait_id="{{ $trait->personalityTrait->id }}">
						<input type="hidden" name="trait_id[]" value="{{ $trait->personalityTrait->id }}">
						<input type="hidden" class="trait-weight" name="personal_trait_weight[]" value="{{ $trait->weight }}">
						<p>
							<b>{{ $trait->personalityTrait->name }}</b> || <i>{{ $mskill->weightName }}</i>
							<span class="pull-right btn btn-sm btn-danger remove-trait" trait_id="">x</span>
						</p>
					</div>
					@empty
					@endforelse
					
				</div>
				<div class="col-md-8 col-md-offset-2">
					<p>
						Add new Personal trait <br>
						<select class="form-control" id="select-trait">
							<option value="-1">Select</option>
							@forelse($personalityTraits as $trait)							
							<option value="{{ $trait->id }}">{{ $trait->name }}</option>
							@empty
							@endforelse
						</select>
						<select id="trait-weight" class="btn btn-sm">
							<option value="3">Very Important</option>
							<option value="2">Important</option>
							<option value="1">Bonus</option>
						</select>
						<span class="btn btn-success btn-sm" id="add-trait">Add</span>
					</p>
				</div>
			</div>
			@endif
			<br>

			<input type="submit"  class="btn btn-primary pull-right" value="Save RSI Model" name="">

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
		foreach($industrySkills as $s)
		{
			$sk .= "[".$s->id.", '".$s->name."'],"; 
		}
		$sk = '['.$sk.']';
		echo 'var skills='.$sk.';';

		$allTraits = '';
		foreach($personalityTraits as $t)
		{
			$allTraits .= "[".$t->id.", '".$t->name."'],"; 
		}
		$allTraits = '['.$allTraits.']';
		echo 'var allTraits='.$allTraits.';';

		if($post->hasModelSeeker())
		{
			echo 'var other_skills='.$post->modelSeeker->other_skills.';';
			echo 'var other_skills_weight='.$post->modelSeeker->other_skills_weight.';';
		}
		else
		{

			echo 'var other_skills=false;';
			echo 'var other_skills_weight=false;';
		}
	?>
	console.log(courses);
	
</script>
<script type="text/javascript" src="/js/rsi.js"></script>

@endsection