@extends('layouts.seek')

@section('title','Emploi :: Create a Company')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="container">
    <div class="single row">  
	   <div class="form-container col-md-8 col-md-offset-2">
        <h2>
        	Create Company Profile
        	<small><a href="/employers/publish" class="btn btn-sm btn-link pull-right">cancel</a></small>
        </h2>
        <div class="search_form1 " style="text-align: center;">
		    <form method="post" action="/companies">
		    	@csrf

		    	<p>
			    	<label>Name:</label>
			    	<input type="text" name="name" placeholder="" required="required" class="form-control" style="width: 100%">
			    </p>

			    <p>
			    	<label>Description:</label>
			    	<textarea class="form-control" name="about" rows="4"></textarea>
			    </p>

			    <p>
			    	<label>Website:</label>
			    	<input type="url" name="website" placeholder="" class="form-control">
			    </p>

			    <p>
			    	<label>Industry:</label>
			    	<select name="industry" class="form-control">
			    		@foreach($industries as $i)
			    		<option value="{{ $i->id }}">{{ $i->name }}</option>
			    		@endforeach
			    	</select>
			    </p>

			    <p>
			    	<label>Company Size:</label>
			    	<select name="company_size" class="form-control">
			    		@foreach($sizes as $i)
			    		<option value="{{ $i->id }}">{{ $i->title }}</option>
			    		@endforeach
			    	</select>
			    </p>

			    <p>
			    	<label>Location:</label>
			    	<select name="location" class="form-control">
			    		@foreach($locations as $i)
			    		<option value="{{ $i->id }}">
			    			[ {{ strtoupper($i->country->name) }} ]
			    			 {{ $i->name }}
			    		</option>
			    		@endforeach
			    	</select>
			    </p>

			    <input type="submit" value="Create Company" class="btn btn-sm btn-primary">

		    </form>
	    </div>
    	</div>
 	</div>
</div>

@endsection