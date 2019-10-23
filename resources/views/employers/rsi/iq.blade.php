@extends('layouts.seek')

@section('title','Emploi :: IQ Score')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
<div class="container">
    <div class="single">  
	   <div class="form-container row">
        <h2 class="col-md-8 col-md-offset-2" >
        	 {{ $application->user->name }} <br>
        	
        </h2>
        <p class="col-md-8 col-md-offset-2" style="text-align: center;">
        	<a href="/employers/applications/{{ $application->post->slug }}/">
        	{{ $application->post->title }}
        	</a>
        	||
        	<a href="/employers/applications/{{ $application->post->slug }}/{{ $application->id }}/rsi">
        		RSI {{ $application->user->seeker->getRsi($application->post) }}%
        	</a>
        </p>
        <div class="search_form1 row">

        	<br>
		    
		    <form method="POST" class="col-md-8 col-md-offset-2" action="/employers/applications/{{ $application->post->slug }}/{{ $application->id }}/rsi/iq">
		    	@csrf
		    	<div id="interview-pool">
		    		@forelse($application->iqTests as $i)
			    	<p>
						<label>Edit IQ Score (0-100) </label><span class="btn btn-sm btn-danger pull-right rm-interview-score">x</span>
						<input type="number" name="score[]" class="form-control" value="{{ $i->score }}" step="0" min="0" max="100" required="required">
					</p>
					@empty
					<p>
						<label>IQ Score (0-100) </label>
						<span class="btn btn-sm btn-danger pull-right rm-interview-score">x</span>
						<input type="number" name="score[]" class="form-control" value="" step="0" min="0" max="100" required="required">
					</p>
					@endforelse
					<br>
		    	</div>
		    	
				<span id="add-interview" class="btn btn-success btn-sm pull-right">Add IQ Score</span>

				<br>
				<hr>
				<p>
					<input type="submit" name="" >
				</p>
		    </form>
        	
	    	
		    
	    </div>
    </div>
 </div>
</div>

<script type="text/javascript">
	$().ready(function(){
		$('#add-interview').click(function(){
			var $i = ''+
			'<p>'+
				'<label>IQ Score (0-100)</label>'+
				'<span class="btn btn-sm btn-danger pull-right rm-interview-score">x</span>'+
				'<input type="number" name="score[]" class="form-control" value="" step="0" min="0" max="100" required="required">'+
			'</p>';
			$('#interview-pool').append($i);

			$('.rm-interview-score').click(function(){
				$(this).parent().remove();
			});
		});

		$('.rm-interview-score').click(function(){
			$(this).parent().remove();
		});
	});
</script>

@endsection