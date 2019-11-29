@extends('layouts.dashboard-layout')

@section('title','Emploi :: Model Seeker for '.$post->title)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'RSI Model for '.$post->title)

@if($saved)
<script type="text/javascript">
$().ready(function(){
	notify('RSI Model Saved','success');
});
</script>
@endif

<div class="card" id="rsi-container">
    <div class="card-body">

	    <h3>
	    	@if(!$post->hasModelSeeker())
	    	<i class="fa fa-warning" title="RSI Model Not Created"></i>
	    	@else
	    	<i class="fa fa-check" title=""></i>
	    	@endif

	    	<!-- <small><a href="/employers/applications/{{ $post->slug }}" class="btn btn-sm btn-danger pull-right">back</a></small> -->

	    </h3>


		<form method="post">
			@if(!$post->hasModelSeeker())
		    <p><em>
		    	By creating an RSI Model, you will be able to rank applicants according by comparing their education, experience, skills, inteview scores and much more. <a href="/employers/role-suitability-index" class="pull-right">learn more</a>
		    </em></p>
		    @else
				<h4 class="orange">Adjust Importance</h4>
		    <div class="row">
		    	<div class="form-group col-md-4 col-md-6 col-12">

		    		<label>Education</label>
		    		<select name="education_importance" class="custom-select">
		    			@foreach($weights as $w)
		    			<option value="{{ $w->weight }}"
		    				@if($post->modelSeeker->education_importance == $w->weight)
		    				selected="selected"
		    				@endif
		    				>{{ $w->name }}</option>
		    			@endforeach
		    		</select>

		    	</div>
		    	<div class="form-group col-md-4 col-md-6 col-12">

		    		<label>Experience</label>
		    		<select name="experience_importance" class="custom-select">
		    			@foreach($weights as $w)
		    			<option value="{{ $w->weight }}"
		    				@if($post->modelSeeker->experience_importance == $w->weight)
		    				selected="selected"
		    				@endif
		    				>{{ $w->name }}</option>
		    			@endforeach
		    		</select>
		    	</div>
		    	<div class="form-group col-md-4 col-md-6 col-12">

		    		<label>Interview</label>
		    		<select name="interview_importance" class="custom-select">
		    			@foreach($weights as $w)
		    			<option value="{{ $w->weight }}"
		    				@if($post->modelSeeker->interview_importance == $w->weight)
		    				selected="selected"
		    				@endif
		    				>{{ $w->name }}</option>
		    			@endforeach
		    		</select>
		    	</div>
		    	<div class="form-group col-md-4 col-md-6 col-12">

		    		<label>Skills </label>
		    		<select name="skills_importance" class="custom-select">
		    			@foreach($weights as $w)
		    			<option value="{{ $w->weight }}"
		    				@if($post->modelSeeker->skills_importance == $w->weight)
		    				selected="selected"
		    				@endif
		    				>{{ $w->name }}</option>
		    			@endforeach
		    		</select>
		    	</div>
		    	<div class="form-group col-md-4 col-md-6 col-12" style="display: none;">

		    		<label>Intellectual Quotent </label>
		    		<select name="iq_importance" class="custom-select">
		    			@foreach($weights as $w)
		    			<option value="{{ $w->weight }}"
		    				@if($post->modelSeeker->iq_importance == $w->weight)
		    				selected="selected"
		    				@endif
		    				>{{ $w->name }}</option>
		    			@endforeach
		    		</select>
		    	</div>
		    	<div class="form-group col-md-4 col-md-6 col-12">

		    		<label>Psychometric Test </label>
		    		<select name="psychometric_importance" class="custom-select">
		    			@foreach($weights as $w)
		    			<option value="{{ $w->weight }}"
		    				@if($post->modelSeeker->psychometric_importance == $w->weight)
		    				selected="selected"
		    				@endif
		    				>{{ $w->name }}</option>
		    			@endforeach
		    		</select>
		    	</div>
		    	<div class="form-group col-md-4 col-md-6 col-12">

		    		<label>Personal Traits</label>
		    		<select name="personality_importance" class="custom-select">
		    			@foreach($weights as $w)
		    			<option value="{{ $w->weight }}"
		    				@if($post->modelSeeker->personality_importance == $w->weight)
		    				selected="selected"
		    				@endif
		    				>{{ $w->name }}</option>
		    			@endforeach
		    		</select>
		    	</div>
		    	<div class="form-group col-md-4 col-md-6 col-12">

		    		<label>Previous Company Size </label>
		    		<select name="company_size_importance" class="custom-select">
		    			@foreach($weights as $w)
		    			<option value="{{ $w->weight }}"
		    				@if($post->modelSeeker->company_size_importance == $w->weight)
		    				selected="selected"
		    				@endif
		    				>{{ $w->name }}</option>
		    			@endforeach
		    		</select>
		    	</div>
		    	<div class="form-group col-md-4 col-md-6 col-12">

		    		<label>Referee Feedback</label>
		    		<select name="feedback_importance" class="custom-select">
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
			<div class="form-group">
				<label>Desired Previous Company Size</label>
				<select name="company_size_id" class="custom-select">
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
			</div>
			<hr>
			<div class="form-group">
				<label>Desired Highest Education Level</label>
				<select name="education_level_id" class="custom-select">
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
			</div>

			@if($post->hasModelSeeker())
			<div class="form-group">
				<label class="orange">Accepted Courses</label>
				<div class="row accepted-courses">

					@forelse($post->modelSeeker->modelSeekerCourses as $course)
					<div class="col-12 col-md-6 hover-bottom py-2">
							{{ $course->course->title }}
						<input type="hidden" name="modelSeekerCourses[]" class="listed-course" value="{{ $course->course->id }}">
						<span class="text-danger pull-right remove-course"><i class="fas fa-times"></i></span>
					</div>
					@empty
					@endforelse
				</div>

				<div class="form-row">
					<div class="col-lg-10 col-12">
						<select class="custom-select" id="course-select">
							@forelse($courses as $course)
							<option value="{{ $course->id }}">{{ $course->title }}</option>
							@empty
							@endforelse
						</select>
					</div>
					<div class="col-lg-2 col-12 mt-md-auto mt-3 text-right">
						<span class="btn btn-success" id="course-add">Add</span>
					</div>
				</div>

			</div>
			@endif

			<div class="form-group" style="display: none;">
				<label>Education Importance</label>
				<select name="education_level_importance" class="custom-select">
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
			</div>

			<hr>

			<div class="form-group" style="display: none;">
				<label>Personality Profile</label>
				<select name="personality_test_id" class="custom-select">
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
			</div>

			<hr style="display: none;">

			<div class="form-group" style="display: none;">
				<label>Desired Experience Duration</label>
				<select name="experience_duration" class="custom-select">
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
			</div>

			<div class="form-group" style="display: none;">
				<label>Experience Importance</label>
				<select name="experience_level_importance" class="custom-select">
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
			</div>

			<hr>

			<div class="form-group" style="display: none;">
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
			</div>

			<div class="form-group" style="display: none;">
				<label>Min IQ Score (0-100)</label>
				<input type="number" name="iq_score" class="form-control" value="{{ isset($post->modelSeeker->id) ? $post->modelSeeker->iq_score : 50 }}" step="0" min="0" max="100" required="required">
			</div>



			<div class="form-group">
				<input type="checkbox" name="interview"
				@if($post->hasModelSeeker())
					@if($post->modelSeeker->interview)
						checked=""
					@endif
				@else
					checked=""
				@endif
				>
				<label>Interview Required</label>
			</div>

			<div class="form-group">
				<label>Min Interview Score (0-100)</label>
				<input type="number" name="interview_result_score" class="form-control" value="{{ isset($post->modelSeeker->id) ? $post->modelSeeker->interview_result_score : 50 }}" step="0" min="0" max="100" required="required">
			</div>

			<hr>

			<div class="form-group">
				<input type="checkbox" name="psychometric"
				@if($post->hasModelSeeker())
					@if($post->modelSeeker->psychometric)
						checked=""
					@endif
				@else
					checked=""
				@endif
				>
				<label>Psychometric Test Required</label>
			</div>

			<div class="form-group">
				<label>Min Psychometric Score (0-100)</label>
				<input type="number" name="psychometric_test_score" class="form-control" value="{{ isset($post->modelSeeker->id) ? $post->modelSeeker->psychometric_test_score : 50 }}" step="0" min="0" max="100" required="required">
			</div>

			@if($post->hasModelSeeker())
			<hr>
			<h4 class="orange">Industry Skills</h4>
				<div class="row selected-skills">
					@forelse($post->modelSeeker->modelSeekerSkills as $mskill)
					<div class="col-md-6 ms-skill" skill_id="{{ $mskill->industrySkill->id }}">
						<input type="hidden" name="skill_id[]" value="{{ $mskill->industrySkill->id }}">
						<input type="hidden" class="skill-weight" name="skill_weight[]" value="{{ $mskill->weight }}">
						<p>
							<strong>{{ $mskill->industrySkill->name }}</strong> || <i>{{ $mskill->weightName }}</i>
							<span class="pull-right text-danger remove-skill" skill_id="{{ $mskill->industrySkill->id }}"><i class="fas fa-times"></i></span>
						</p>
					</div>
					@empty
					@endforelse
				</div>
				<h6 class="mt-3">Add new skill</h6>
				<div class="form-row justify-content-center">
					<div class="col-md-7 col-12">
						<select class="custom-select" id="select-skill">
							<option value="-1">Select</option>
							@foreach($industrySkills as $s)
							<option value="{{ $s->id }}">{{ $s->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-3 col-12">
						<select id="skill-weight" class="custom-select">
							<option value="3">Necessary</option>
							<option value="2">Desired</option>
							<option value="1">Bonus</option>
						</select>
					</div>
					<div class="col-md-2 col-12 text-right mt-md-auto mt-3">
						<span class="btn btn-success btn-sm" id="add-skill">Add</span>
					</div>
				</div>

			@endif
			<hr>
			<h4 class="orange">Other Skills</h4>

			<div class="row other-skills-pool mb-3">

			</div>
			<div class="form-row justify-content-center">
				<div class="col-md-7">
					<input type="text" name="" id="other-skill-name" class="form-control" placeholder="Enter Skill Name">
				</div>
				<div class="col-md-3">
					<select class="custom-select" id="other-skill-weight">
						<option value="3">Very Important</option>
						<option value="2">Important</option>
						<option value="1">Bonus</option>
					</select>
				</div>
				<div class="col-md-2 col-12 text-right mt-md-auto mt-3">
					<span id="add-other-skill" class="btn btn-success btn-sm">Add</span>
				</div>
			</div>


			@if($post->hasModelSeeker())
			<hr>
			<h4 class="orange">Personal Traits</h4>
			<div class="row selected-traits">

				@forelse($post->modelSeeker->modelSeekerPersonalityTraits as $trait)
				<div class="col-md-6 ms-trait" trait_id="{{ $trait->personalityTrait->id }}">
					<input type="hidden" name="trait_id[]" value="{{ $trait->personalityTrait->id }}">
					<input type="hidden" class="trait-weight" name="personal_trait_weight[]" value="{{ $trait->weight }}">
					<p>
						<strong>{{ $trait->personalityTrait->name }}</strong> || <i>{{ $trait->weightName }}</i>
						<span class="pull-right btn btn-sm btn-danger remove-trait" trait_id="">x</span>
					</p>
				</div>
				@empty
				@endforelse
			</div>
			<h4 class="mt-3">Add New Personality Trait</h4>
			<div class="form-row justify-content-center">
				<div class="col-md-7 col-12">
					<select class="custom-select" id="select-trait">
						<option value="-1">Select</option>
						@forelse($personalityTraits as $trait)
						<option value="{{ $trait->id }}">{{ $trait->name }}</option>
						@empty
						@endforelse
					</select>
				</div>
				<div class="col-md-3 col-12">
					<select id="trait-weight" class="custom-select">
						<option value="3">Very Important</option>
						<option value="2">Important</option>
						<option value="1">Bonus</option>
					</select>				</div>
					<div class="col-md-2 col-12 text-right mt-md-auto mt-3">
					<span class="btn btn-success btn-sm" id="add-trait">Add</span>
				</div>
			</div>
			@endif

			<hr>
			<div class="text-right">
				<button type="submit" name="button" class="btn btn-orange">Save RSI Model</button>
			</div>

	    </form>
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

		if($post->hasModelSeeker() && !is_null($post->modelSeeker->other_skills))
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


</script>
<script type="text/javascript" src="/js/rsi.js"></script>

@endsection
