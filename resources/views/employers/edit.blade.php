@extends('layouts.seek')

@section('title','Emploi :: Edit Employer Profile')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
<div class="container">
    <div class="single">  
	   
	 <div class="col-md-8 col-md-offset-2 single_right">
	    <h3>
	    	Edit Profile
	    	<small><a href="/profile" class="btn btn-sm btn-danger pull-right">View Profile</a></small>
	    	
	    </h3>	

	    <form method="post" action="/profile/update" enctype="multipart/form-data">
	    	@csrf
	    	<p>
	    		<label>Full Name: *</label>
	    		<input type="text" name="name" class="form-control" value="{{ $user->name }}" required="">
	    	</p>

	    	<p>
	    		<label>E-mail Address: *</label>
	    		<input type="email" disabled="" class="form-control" value="{{ $user->email }}" required="">
	    	</p>

	    	<p>
	    		<label>Username: *</label>
	    		<input type="text" name="username" class="form-control" value="{{ $user->username }}" required="">
	    	</p>

	    	<p>
	    		<label>Avatar:</label>
	    		<input type="file" name="avatar" class="btn" value="" accept="image/png, image/jpeg">
	    	</p>

	    	<p>
	    		<input type="submit" name="" value="Update Profile" class="btn btn-success">
	    	</p>
	    </form>
	    
     </div>
     <div class="clearfix"> </div>
 </div>
</div>

@endsection