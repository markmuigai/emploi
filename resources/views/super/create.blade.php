@extends('layouts.seek')

@section('title','Emploi :: Create Admin')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="container">
    <div class="single">  
	   <div class="col-md-4">
	   	  @include('left-bar')
	   	  
	 </div>
	 <div class="col-md-8 single_right">
	    <h3>
	    	Create Administrators
	    	<a href="/desk/admins" class="btn btn-sm btn-danger pull-right">cancel</a>
	   	</h3>	

	   	<form method="post" action="/desk/create-admin">
	   		@csrf
	   		<p>
	   			<label>Name:</label>
	   			<input type="text" name="name" placeholder="" class="form-control">
	   		</p>
	   		<p>
	   			<label>Username:</label>
	   			<input type="text" name="username" placeholder="" class="form-control">
	   		</p>

	   		<p>
	   			<label>Email:</label>
	   			<input type="email" name="email" placeholder="" class="form-control">
	   		</p>

	   		<p>
	   			<label>Country:</label>
	   			<select class="form-control" name="country">
	   				@foreach($countries as $c)
	   				<option value="{{ $c->id }}">{{ $c->name }}</option>
	   				@endforeach
	   			</select>
	   		</p>

	   		<p>
	   			<label>Password:</label>
	   			<input type="password" name="password" placeholder="" class="form-control">
	   		</p>
	   		<p>
	   			<input type="submit" name="" value="Submit" class="btn btn-success">
	   		</p>
	   	</form>
	    
     </div>
     <div class="clearfix"> </div>
 </div>
</div>

@endsection