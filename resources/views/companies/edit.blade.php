@extends('layouts.seek')

@section('title','Emploi :: Edit '.$company->name)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="container">
    <div class="single row">  
	   <div class="form-container col-md-8 col-md-offset-2">
        <h2>
        	Edit {{ $company->name }}
        </h2>
        <p class="col-md-12" style="text-align: center;">
        	<a href="/profile" class="btn btn-sm btn-danger">cancel</a>
        </p>
        <br><br>
        <hr>
        <div class="search_form1 " style="text-align: center;">
		    <form method="post" action="/companies/{{ $company->id }}" class="row" enctype="multipart/form-data">
		    	@csrf
		    	{{ method_field('PUT') }}

		    	<p>
			    	<label>Name:</label>
			    	<input type="text" name="name" placeholder="" value="{{ $company->name }}" required="required" class="form-control" style="width: 100%">
			    </p>

			    <div class="col-md-6 col-md-offset-3">
			    	<p>
				    	<label>Logo:</label>
				    	<input type="file" name="logo" placeholder="" class="">
				    </p>
				    <br>
			    </div>

			    <div class="clearfix"></div>

			    <p>
			    	<label>Tagline:</label>
			    	<input type="text" name="tagline" placeholder="" value="{{ $company->tagline }}" required="required" class="form-control" style="width: 100%">
			    </p>

			    

			    <p>
			    	<label>Description:</label>
			    	<textarea class="form-control" name="about" rows="4">{{ $company->about }} </textarea>
			    </p>

			    <p>
			    	<label>Website:</label>
			    	<input type="url" name="website" placeholder="" value="{{ $company->website }}" class="form-control">
			    </p>

			    <p>
			    	<label>Industry:</label>
			    	<select name="industry_id" class="form-control">
			    		@foreach($industries as $i)
			    		<option value="{{ $i->id }}"
			    			@if($company->industry_id == $i->id)
			    			selected=""
			    			@endif
			    			>{{ $i->name }}</option>
			    		@endforeach
			    	</select>
			    </p>

			    <p>
			    	<label>Company Size:</label>
			    	<select name="company_size_id" class="form-control">
			    		@foreach($sizes as $i)
			    		<option value="{{ $i->id }}"
			    			@if($company->company_size_id == $i->id)
			    			selected=""
			    			@endif
			    			>{{ $i->lower_limit.' - '.$i->upper_limit }}</option>
			    		@endforeach
			    	</select>
			    </p>

			    <p>
			    	<label>Location:</label>
			    	<select name="location_id" class="form-control">
			    		@foreach($locations as $i)
			    		<option value="{{ $i->id }}"
			    			@if($company->location_id == $i->id)
			    			selected=""
			    			@endif
			    			>
			    			[ {{ strtoupper($i->country->name) }} ]
			    			 {{ $i->name }}
			    		</option>
			    		@endforeach
			    	</select>
			    </p>

			    <input type="submit" value="Save Company" class="btn btn-sm btn-primary">

		    </form>
	    </div>
    	</div>
 	</div>
</div>

@endsection