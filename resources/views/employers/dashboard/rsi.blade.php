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

	    @if(!$post->hasModelSeeker())
	    <i>
	    	By creating an RSI Model, you will be able to rank applicants according by comparing their education, experience, skills, inteview scores and much more.
	    </i>
	    @else
	    <div class="row" style="text-align: center; border-bottom: 0.1em solid black; padding: 0.5em 0">
	    	<br>
	    	<h6>Adjust Weights (Total 
	    			<span v-text="total"></span>
	    			<span style="color: red" v-show="total != 100">! 
	    				<span v-show="total < 100">MIN</span>
	    				<span v-show="total > 100">MAX</span>
	    			
	    			TOTAL IS 100 !</span>
	    		)
	    	</h6>
	    	<div class="col-md-3 col-xs-6">
	    		Education <br>
	    		<input type="number" style="text-align: center" name="education_importance" class="form-control" v-model="education">
	    	</div>
	    	<div class="col-md-3 col-xs-6">
	    		Experience <br>
	    		<input type="number" style="text-align: center" name="experience_importance" class="form-control" value=""  v-model="experience">
	    	</div>
	    	<div class="col-md-3 col-xs-6">
	    		Interview <br>
	    		<input type="number" style="text-align: center" name="interview_importance" class="form-control" v-model="interview">
	    	</div>
	    	<div class="col-md-3 col-xs-6">
	    		Skills <br>
	    		<input type="number" style="text-align: center" name="skills_importance" class="form-control"  v-model="skills">
	    	</div>
	    	<div class="col-md-3 col-xs-6">
	    		Intellectual Quotent <br>
	    		<input type="number" style="text-align: center" name="iq_importance" class="form-control"  v-model="iq">
	    	</div>
	    	<div class="col-md-3 col-xs-6">
	    		Psychometric Test <br>
	    		<input type="number" style="text-align: center" name="psychometric_importance" class="form-control" v-model="psychometric">
	    	</div>
	    	<div class="col-md-3 col-xs-6">
	    		Personality <br>
	    		<input type="number" style="text-align: center" name="personality_importance" class="form-control" v-model="personalities">
	    	</div>
	    	<div class="col-md-3 col-xs-6">
	    		Company Size <br>
	    		<input type="number" style="text-align: center" name="personality_importance" class="form-control" v-model="company_size">
	    	</div>
	    	
	    </div>
	    @endif

	    <hr>
		<form method="post">
			@csrf
			<p>
				<label>Company Size</label>
				<select name="company_size_id" class="form-control">
			    	@forelse($companySizes as $l)
					<option value="{{ $l->id }}"
						@if($post->hasModelSeeker())
							@if($post->modelSeeker->company_size_id == $l->id)
								selected=""
							@endif
						@endif
						>{{ $l->lower_limit .' - '.$l->upper_limit }}</option>
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
			    	@forelse([1,2,3,5,10,15,20,25] as $l)
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
						<p>
							{{ $mskill->skill->name }}
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
	$().ready(function(){

		$('#add-skill').click(function(){
			var s = $('#select-skill').val();
			if(s == -1)
				return;
			var added = false;
			$('.ms-skill').each(function(){
				if($(this).attr('skill_id') == s)
					added = true;
			});
			if(!added)
			{
				var t = 'Skill Name';
				for(var i=0; i<skills.length; i++)
				{
					if(skills[i][0] == s)
					{
						t = skills[i][1];
						break;
					}
				}
				var $s = ''+
				'<div class="col-md-6 ms-skill" skill_id="'+s+'">'+
					'<p>'+
						t+
						'<input type="hidden" name="skill_id[]" value="'+s+'">'+
						'<span class="pull-right btn btn-sm btn-danger remove-new-skill" skill_id="'+s+'">x</span>'+
					'</p>'+
				'</div>';
				$('.selected-skills').append($s);
				$('.remove-new-skill').click(function(){
				//var s = $(this).attr('skill_id');
				$(this).parent().parent().remove();
			});
			}
		});

		$('.remove-skill').click(function(){
			//var s = $(this).attr('skill_id');
			$(this).parent().parent().remove();
		});
	});
</script>
<script type="text/javascript">
	rsi = new Vue({
        el: '#rsi-container',
        data: {
        	education: 15,
        	experience: 25,
        	iq: 10,
        	interview: 20,
        	personalities: 10,
        	skills: 10,
        	psychometric: 5,
        	company_size: 5
        },
        computed: {
        	total(){
        		return parseFloat(this.education) + parseFloat(this.experience) + parseFloat(this.iq) + parseFloat(this.interview) + parseFloat(this.personalities) + parseFloat(this.skills) + parseFloat(this.psychometric) + parseFloat(this.company_size);
        	}
        }
    });
</script>

@endsection