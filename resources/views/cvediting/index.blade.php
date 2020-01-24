@extends('layouts.dashboard-layout')

@section('title','Emploi :: CV Editing Requests')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'CV Editing Requests')

<div class="card">
    <div class="card-body row">

    	@forelse($edits as $e)
        <div class="col-md-10 offset-md-1">
        	<p>
        		<strong>{{ $e->name }}</strong> 
	        	<span style="float: right;">
	        		Requested: {{ $e->created_at->diffForHumans() }}
	        	</span> 
	        	<br>
	        	<p>
	        		{{ $e->industry->name }} <a href="/cv-editing/{{ $e->slug }}" style="float: right;" class="orange">view request</a>
	        	</p>
        	</p>
        	
        </div>
        @empty
        <div class="col-md-10 offset-md-1" style="text-align: center;">
        	You have not been assigned a CV Edit job. Check back later. <br><br>
        	<a href="/home" class="btn btn-orange mt-3">Home</a>
        </div>
        @endforelse
        

        
    </div>
</div>

@endsection
