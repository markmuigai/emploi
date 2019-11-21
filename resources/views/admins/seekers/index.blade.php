@extends('layouts.seek')

@section('title','Emploi Admin :: Job Seekers')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="container">
    <div class="single">  
	   <div class="form-container row">
        <h2 class="col-md-8 col-md-offset-2">
        	<small>
        		<a href="/admin/panel" class="btn btn-sm btn-success">
        			<i class="fa fa-arrow-left"></i>
        		</a>
        	</small>
        	Job Seekers
        	
        </h2>
        <form style="text-align: center;">
        	<input type="hidden" name="search" value="true">
        	<p>
        		<input type="email" name="email" class="btn" placeholder="Email Address" value="{{ isset($email) ? $email : '' }}">
	            <input type="text" name="phone_number" class="btn" placeholder="Phone Number" value="{{ isset($phone_number) ? $phone_number : '' }}">
	            <input type="text" name="keywords" class="btn" placeholder="Keywords"  value="{{ isset($keywords) ? $keywords : '' }}">
	            <select name="gender" class="btn">
	            	<option value="">All Genders</option>
	            	<option value="F" {{ isset($gender) && $gender=='F' ? 'selected="selected"' : '' }}>Female</option>
	            	<option value="M" {{ isset($gender) && $gender=='M' ? 'selected="selected"' : '' }}>Male</option>
	            	<option value="I" {{ isset($gender) && $gender=='I' ? 'selected="selected"' : '' }}>Other</option>
	            </select>
        	</p>
            
            <br>
            <p>
            	<select name="location" class="btn">
	            	<option value="">All Locations</option>
	            	@forelse($locations as $l)
	            	<option value="{{ $l->id }}" {{ isset($location) && $location == $l->id ? 'selected="selected"' : '' }}>
	            		{{ $l->name.', '.$l->country->name }}
	            	</option>
	            	@empty
	            	@endforelse
	            	
	            </select>

	            <select name="industry" class="btn">
	            	<option value="">All Industries</option>
	            	@forelse($industries as $ind)
	            	<option value="{{ $ind->id }}" {{ isset($industry) && $industry == $ind->id ? 'selected="selected"' : '' }}>{{ $ind->name }}</option>
	            	@empty
	            	@endforelse
	            	
	            </select>

	            <input type="submit" name="" class="btn btn-primary" value="Search">
            </p>
            <hr>

        </form>
        <div class="search_form1 row" style="text-align: center;">
		    
        	@forelse($seekers as $seeker)

        	<div class="col-md-4 col-xs-6 hover-bottom" style="text-align: center; margin-bottom: 0.5em">
        		<h4>
        			<a href="/admin/seekers/{{ $seeker->user->username }}">
        				{{ $seeker->user->name }} 
        			</a>
        			<br>
        			<small>{{ $seeker->industry->name }}</small>
        		</h4> <br>
        		<p>
        			<a href="mailto:{{ $seeker->user->email }}">{{ $seeker->user->email }}</a> <br>
        			{{ $seeker->phone_number }} <br>
        			{{ $seeker->sex }}
        		</p>
        	</div>

        	@empty
        	<p style="text-align: center;">
        		No Job seekers have been found!
        	</p>
        	@endforelse
		    
	    </div>

	    <div style="text-align: center;">
	    	@if(isset($search))
	    	<br>
	    	<p style="text-align: center; color: green">End of search results</p>
	    	@else
	    	{{ $seekers->links() }}
	    	@endif
	    </div>
    </div>
 </div>
</div>


@endsection