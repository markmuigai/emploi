@extends('layouts.seek')

@section('title','Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="container">
    <div class="single">
	   <div class="contact_top">
	   	 <h2 style="margin-bottom: 0">
	   	 	<i class="fa fa-arrow-left" title="View Applications" onclick="window.location='/employers/applications/{{ $post->slug }}'"></i>
	   	 	Invite for {{ $post->title }}
	   	 </h2>

	   	 <p class="col-md-8 col-md-offset-2" style="text-align: center; padding: 0.5em; border-bottom: 0.1em solid gray">
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
	   		<br>
	   	   	<h4 style="text-align: center;">Invite Candidates to Apply</h4>
	   	   	@if($post->status == 'active')
	   	   		<div style="text-align: center;">
	   	   			Share the link below to invite applications for this position.

	   	   			<br><br>
	   	   			<a href="{{ url('/vacancies/'.$post->slug.'/apply') }}">
	   	   				{{ url('/vacancies/'.$post->slug.'/apply') }}
	   	   			</a>
	   	   			<br><br>

	   	   			<div class="social">
	                    <a class="btn_1" href="http://www.facebook.com/sharer.php?u={{ url('/vacancies/'.$post->slug.'/apply') }}" target="_blank">
	                        <i class="fa fa-facebook fb"></i>
	                        <span class="share1 fb">Share</span>
	                    </a>
	                    <a class="btn_1" href="https://twitter.com/share?url={{ url('/vacancies/'.$post->slug.'/apply') }}&amp;text={{ urlencode($post->title) }}&amp;hashtags=Emploi{{ $post->location->country->code }}" target="_blank">
	                        <i class="fa fa-twitter tw"></i>
	                        <span class="share1">Tweet</span>
	                    </a>
	                    <a class="btn_1" href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ url('/vacancies/'.$post->slug) }}" target="_blank">
	                        <i class="fa fa-linkedin fb"></i>
	                        <span class="share1 fb">Share</span>
	                    </a>
	               </div>
	               <br>

	   	   			<i>All applicants <strong>must register a profile</strong> and update update their profile</i>
	   	   		</div>
	   	   	@else
	   	   	<p style="text-align: center;">
	   	   		This position has been closed and further applications cannot be received.
	   	   	</p>
	   	   	@endif
       	</div>

    </div>
</div>

@endsection
