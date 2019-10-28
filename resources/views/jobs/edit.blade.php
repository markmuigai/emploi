@extends('layouts.seek')

@section('title','Emploi :: Edit '.$post->title)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="container">
    <div class="single">  
	   <div class="form-container row">
        <h2 class="col-md-8 col-md-offset-2">
        	<i class="fa fa-arrow-left" title="View Dashboard" onclick="window.location='/employers/dashboard'"></i>
        	Edit {{ $post->title }}
        	
        </h2>
        <div class="search_form1 row" style="text-align: center;">
		    
        	<form method="post" action="/vacancies/{{ $post->slug }}" class="col-md-8 col-md-offset-2" enctype="multipart/form-data">
		    	@csrf
		    	{{ method_field('PUT') }}
		    	<div id="section1" class="section-view ">
		    		<h3>Step 1 of 3</h3>
		    		<p>
				    	<label>Company *</label>
				    	<select name="company" class="form-control" disabled="">
				    		@foreach($companies as $i)
				    		<option value="{{ $i->id }}"
				    			@if($post->company_id == $i->id)
				    			selected=""
				    			@endif
				    			>{{ $i->name }}</option>
				    		@endforeach
				    	</select>
				    </p>
				    <br>

				    <p>
				    	<label>Job Title *</label>
				    	<input type="text" name="title" id="job-title" class="form-control" style="width: 100%; color: black" value="{{ $post->title }}">
				    </p>
				    <br>

				    <p>
				    	<label>Job Industry *</label>
				    	<select name="industry" class="form-control">
				    		@foreach($industries as $i)
				    		<option value="{{ $i->id }}"
				    			@if($post->industry_id == $i->id)
				    			selected=""
				    			@endif
				    			>{{ $i->name }}</option>
				    		@endforeach
				    	</select>
				    </p>
				    <br>

				    <p>
				    	<label>Vacancy Type *</label>
				    	<select name="vacancyType" class="form-control">
				    		@foreach($vacancyTypes as $i)
				    		<option value="{{ $i->id }}"
				    			@if($post->vacancy_type_id == $i->id)
				    			selected=""
				    			@endif
				    			>{{ $i->name }}</option>
				    		@endforeach
				    	</select>
				    </p>
				    <br>

				    <a href="#" class="btn btn-sm btn-primary pull-right toSection2">Next ></a>
		    	</div>

		    	<div id="section2" class="section-view hidden">
		    		<h3>Step 2 of 3</h3>
		    		<p>
				    	<label>Job Description *</label>
				    	<textarea class="form-control" id="responsibilities" name="responsibilities" rows="5">{{ $post->responsibilities }}</textarea>
				    </p>
				    <br>

				    <p>
				    	<label>Education *</label>
				    	<select name="education" class="form-control">
				    		@foreach($educationLevels as $i)
				    		<option value="{{ $i->id }}"
				    			@if($post->education_requirements == $i->id)
				    			selected=""
				    			@endif
				    			>{{ $i->name }}</option>
				    		@endforeach
				    	</select>
				    </p>
				    <br>

				    <p>
				    	<label>Experience *</label>
				    	<select name="experience" class="form-control">
				    		<option value="0" {{ $post->experience_requirements == 0 ? 'selected="selected"' : '' }}>No Experience Required</option>
				    		<option value="6" {{ $post->experience_requirements == 6 ? 'selected="selected"' : '' }}>6 month Experience</option>
				    		<option value="12" {{ $post->experience_requirements == 12 ? 'selected="selected"' : '' }}>1 year Experience</option>
				    		<option value="24" {{ $post->experience_requirements == 24 ? 'selected="selected"' : '' }}>2 years Experience</option>
				    		<option value="36" {{ $post->experience_requirements == 36 ? 'selected="selected"' : '' }}>3 years Experience</option>
				    		<option value="60" {{ $post->experience_requirements == 60 ? 'selected="selected"' : '' }}>5 years Experience</option>
				    		<option value="120" {{ $post->experience_requirements == 120 ? 'selected="selected"' : '' }}>10 years Experience</option>
				    	</select>
				    </p>
				    <br>

				    <p>
				    	<label>Number of Positions Available*</label>
				    	<select name="positions" class="form-control">
				    		@for($i=1; $i<30;$i++ )
				    		<option value="{{ $i }}"
				    		{{ $i == $post->positions ? 'selected="selected"' : '' }}
				    		>{{ $i }}</option>
				    		@endfor
				    	</select>
				    </p>
				    <br>

				    <a href="#" class="btn btn-sm btn-danger toSection1">< Previous</a>
				    <a href="#" class="btn btn-sm btn-primary pull-right toSection3">Next ></a>
		    	</div>

		    	<div id="section3" class="section-view hidden">
		    		<h3>Step 3 of 3</h3>
		    		

				    <p>
				    	<label>Job Location:</label>
				    	<select name="location" class="form-control">
				    		@foreach($locations as $i)
				    		<option value="{{ $i->id }}"
				    			@if($post->location_id == $i->id)
				    			selected=""
				    			@endif
				    			>[{{ $i->country->name }}] {{ $i->name }}</option>
				    		@endforeach
				    	</select>
				    </p>
				    <br>

				    <p>
				    	<label>Monthly Salary *</label>
		                <input type="number" name="monthly_salary" class="form-control" required="" placeholder="enter 0 for non-disclosure" value="{{ $post->monthly_salary }}">
				    </p>
				    <br>

				    <p>
				    	<label>Application Deadline *</label>
		                <input type="datetime-local" name="deadline" class="form-control" required="" value="{{ \Carbon\Carbon::parse($post->deadline)->format('Y-m-d\TH:i') }}" required="">
				    </p>
				    <br>

				    <p>
				    	<label>How to apply:</label>
				    	<textarea class="form-control" name="how_to_apply" rows="5" placeholder="Optionally, you can specify additional description to applicants">{{ $post->how_to_apply ? $post->how_to_apply : '' }}</textarea>
				    </p>
				    <br>

				    <p>
				    	<label>Optional Photo</label>
				    	<input type="file" name="image" placeholder="" accept=".jpg, .png,.jpeg">
				    </p>
				    <br>

				    <a href="#" class="btn btn-sm btn-danger toSection2">< Previous Page</a>
				    <input type="submit" value="Save" class="btn btn-sm btn-primary pull-right">
		    	</div>

		    </form>
	    	
		    
	    </div>
    </div>
 </div>
</div>

<script type="text/javascript">
	$().ready(function(){
		$('.toSection1').click(function(){
			$('.section-view').addClass('hidden');
			$('#section1').removeClass('hidden');
		});
		$('.toSection2').click(function(){
			var title = $('#job-title').val();
			if(title.length < 5)
				return alert('job title too short');
			$('.section-view').addClass('hidden');
			$('#section2').removeClass('hidden');
		});
		$('.toSection3').click(function(){
			
			$('.section-view').addClass('hidden');
			$('#section3').removeClass('hidden');
		});
	});
</script>

<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    setTimeout(function(){

        CKEDITOR.replace('responsibilities');

    },3000);
    
</script>


@endsection