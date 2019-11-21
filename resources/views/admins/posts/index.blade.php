@extends('layouts.seek')

@section('title','Emploi :: Admin Panel')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="container">
    <div class="single">

	 <div class="">
	    <h3 style="text-align: center;">
	    	Job Posts
	    	<small>
	    		[{{ $admin->jurisdictions[0]->country->name }}]
	    	</small>

	   	</h3>


	   	<div class="row">


	   			<form method="get" class="col-md-8 col-md-offset-2" style="margin-bottom: 1em" >
	   				<input type="text" name="q" class="form-control" placeholder="search" style="width: 100%">
	   			</form>


	   		@forelse($posts as $p)

	   		<div class="col-md-8 col-md-offset-2" style="margin-bottom: 1em; border-top: 0.1em solid black">
	   			<a href="/admin/posts/{{$p->slug}}" style="text-decoration: none;"><strong>{{ $p->title }}</strong></a>

	   			<span class="pull-right">{{ $p->daysSince  }} days</span>
	   			<br>
	   			{{ $p->company->name }}
	   			<i class="pull-right">{{ $p->status }}</i>
	   			<br>
	   			<form method="post" action="/admin/posts/{{$p->slug}}/update" id="">
	   				@csrf
	   				<select name="status" class="btn btn-sm" onchange="">
	   					@foreach(['inactive','active','closed'] as $s)
	   					<option value="{{ $s }}" {{ $p->status == $s ? 'selected="" ': "" }}>
	   						{{ $s }}
	   					</option>
	   					@endforeach
	   				</select>
	   				<input type="submit" value="update status" class="btn btn-sm btn-success" name="">
	   			</form>

	   		</div>
	   		@empty
	   		<div class="col-md-8 col-md-offset-2">
	   			No job adverts have been found!
	   		</div>
	   		@endforelse


	   		<div class="col-md-8 col-md-offset-2">
	   			{{ $posts->links() }}
	   		</div>



	   	</div>

	   	<p style="text-align: center;">
	   		<br><br>
	   		<a href="/home" class="btn btn-sm btn-link">Admin Panel</a>
	   	</p>



     </div>
     <div class="clearfix"> </div>
 </div>
</div>

@endsection
