@extends('layouts.seek')

@section('title','Emploi :: '.$post->title.' Applications')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="container">
    <div class="single">
	   <div class="form-container row">
        <h2 class="col-md-8 col-md-offset-2" >
        	{{ $shortlist==true ? 'Shortlist '.$post->title : $post->title.' Applications' }}
            <small>[{{ $post->status }}]</small>

        </h2>
        <p class="col-md-8 col-md-offset-2" style="text-align: center; padding: 0.5em; border-bottom: 0.1em solid black">
        	@if(!$shortlist)
        	<a href="/employers/applications/{{ $post->slug }}?shortlist=true" class="btn btn-sm btn-info">Shortlist ({{ count($post->shortlisted) }})</a>


        	@else
        	<a href="/employers/applications/{{ $post->slug }}" class="btn btn-sm btn-info">Applications ({{ count($post->applications) }})</a>


            @endif
            <a href="/employers/applications/{{ $post->slug }}/rsi" class="btn btn-sm btn-danger">

                @if(!$post->hasModelSeeker())
                <i class="fa fa-warning"  title="RSI Model Not Created"></i>
                @else
                <i class="fa fa-check" title=""></i>
                @endif
                RSI Model

            </a>
            <br class="go-mobile">

            @if($post->status == 'active')
            <a href="/employers/applications/{{ $post->slug }}/invite" class="btn btn-success btn-sm">Invite</a>
            <a href="/employers/applications/{{ $post->slug }}/close" class="btn btn-info btn-sm">Close Job</a>
            @else
            <a href="/employers/applications/{{ $post->slug }}/close" class="btn btn-info btn-sm">Selected <i class="fa {{ $post->positions == 1 ? 'fa-user' : 'fa-users'}}"></i></a>
            @endif

        </p>

        <div class="search_form1 row">
		    <?php $pool = $shortlist? $post->shortlisted: $post->applications; ?>

		    @forelse($pool as $a)
		    <div class="col-md-8 col-md-offset-2 row" style=" border-bottom: 0.1em solid grey; padding: 1em 0">
        		<a style="font-weight: bold" href="/employers/browse/{{ $a->user->username }}">
        			<img src="{{ asset($a->user->getPublicAvatarUrl()) }}" style="border-radius: 50%" class="col-md-2 col-md-offset-3 col-xs-3">
        		</a>
        		<div class="col-md-7 col-xs-9" style="padding: 1em; text-align: center;">
        			<p>
        				<a style="font-weight: bold; font-size: 110%; color: black" href="/employers/browse/{{ $a->user->username }}">
        					{{ $a->user->name }}
        				</a>

                         @if($post->hasModelSeeker())
                            <br>


                            <a href="/employers/applications/{{ $post->slug }}/{{ $a->id }}/rsi">
                                <b>RSI {{ $a->user->seeker->getRsi($post) }}% </b>
                            </a>
                         @else

                         @endif

                         <br>
        				<small>{{ $a->user->seeker->industry->name }}</small>
        			</p>

        			<p>
                        <a href="/employers/applications/{{ $post->slug }}/{{ $a->id }}/cover" class="btn btn-sm btn-danger"><i class="fa fa-file-o"></i> C. Letter</a>
                        @if($post->status == 'active')
        				@if(!$post->isShortlisted($a->user->seeker))
        				<a href="/employers/shortlist-toggle/{{ $post->slug }}/{{ $a->user->username }}" class="btn btn-sm btn-primary">Shortlist</a>
        				@else
        				<a href="/employers/shortlist-toggle/{{ $post->slug }}/{{ $a->user->username }}" class="btn btn-sm btn-info">Remove from Shortlist</a>
        				@endif
                        @endif
        				<a href="/employers/browse/{{ $a->user->username }}" class="btn btn-sm btn-success" style=""><i class="fa fa-user"></i> Profile</a>
        			</p>


        		</div>

        	</div>
		    @empty
		    <div class="col-md-8 col-md-offset-2" style="text-align: center;">
		    	<br>
		    	@if($shortlist)
		    		<p>No Applicants have been shortlisted for this position.<br>
		    		</p>
		    	@else
		    		<p>Applications are yet to be received yet</p>
		    	@endif

		    </div>
		    @endforelse


	    </div>
    </div>
 </div>
</div>

@endsection
