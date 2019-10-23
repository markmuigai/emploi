@extends('layouts.seek')

@section('title','Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="container">
    <div class="single">  
	   <div class="contact_top">
	   	 <h2 style="margin-bottom: 0">Invite for {{ $post->title }}</h2>

	   	 <p class="col-md-8 col-md-offset-2" style="text-align: center; padding: 0.5em; border-bottom: 0.1em solid black">
        	<a href="/employers/applications/{{ $post->slug }}" class="btn btn-sm btn-info">Applications ({{ count($post->applications) }})</a>
            <a href="/employers/applications/{{ $post->slug }}/rsi" class="btn btn-sm btn-danger">
                
                @if(!$post->hasModelSeeker())
                <i class="fa fa-warning"  title="RSI Model Not Created"></i>
                @else
                <i class="fa fa-check" title=""></i>
                @endif
                RSI Model
                
            </a>

        </p>
	     
          
          <div class="clearfix"> </div>
	   </div>

	   	<div class="row">
	   	   	<h4 style="text-align: center;">Invite Candidates to Apply</h4>
	   	   	@if($post->status == 'active')
	   	   		<p style="text-align: center;">
	   	   			Share the link below to invite applications for this position. 

	   	   			<br><br>
	   	   			<a href="{{ url('/vacancies/'.$post->slug.'/apply') }}">
	   	   				{{ url('/vacancies/'.$post->slug.'/apply') }}
	   	   			</a>
	   	   			<br><br>

	   	   			<i>All applicants <b>must register a profile</b> and update update their profile</i>
	   	   		</p>
	   	   	@else
	   	   	<p style="text-align: center;">
	   	   		This position has been closed and further applications cannot be received.
	   	   	</p>
	   	   	@endif
       	</div>
	   
    </div>
</div>

@endsection