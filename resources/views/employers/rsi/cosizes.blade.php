@extends('layouts.seek')

@section('title','Emploi :: Previous Company Sizes')

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
		    
		    <form method="POST" class="col-md-8 col-md-offset-2" action="/employers/applications/{{ $application->post->slug }}/{{ $application->id }}/rsi/company-sizes">
		    	@csrf
		    	<div id="company-sizes-pool">
		    		@forelse($application->seekerPreviousCompanySizes as $i)
		    		<p style="margin-bottom: 0.5em; border-bottom:0.1em solid black; padding: 1em">
		    			<label>Company Name</label>
		    			<span class="btn btn-sm btn-danger pull-right rm-company-size">x</span>
		    			<input type="text" name="company_name[]" required="" value="{{ $i->name }}" class="form-control" style="width: 100%">
		    			<select required="" name="company_size[]" class="form-control">
		    				<option value="">- Select -</option>
		    				@foreach($sizes as $s)
		    				<option value="{{ $s->id }}"
		    					@if($i->company_size_id == $s->id)
		    					selected="selected"
		    					@endif
		    					>{{ $s->title }}</option>
		    				@endforeach
		    			</select>
		    		</p>
		    		@empty
		    		<p style="margin-bottom: 0.5em; border-bottom:0.1em solid black; padding: 1em">
		    			<label>Company Name</label>
		    			<span class="btn btn-sm btn-danger pull-right rm-company-size">x</span>
		    			<input type="text" name="company_name[]" required="" class="form-control" style="width: 100%">
		    			<select required="" name="company_size[]" class="form-control">
		    				<option value="">- Select -</option>
		    				@foreach($sizes as $s)
		    				<option value="{{ $s->id }}">{{ $s->title }} people</option>
		    				@endforeach
		    			</select>
		    		</p>
		    		@endforelse
		    	</div>
		    	
				<span id="add-company" class="btn btn-success btn-sm pull-right">Add Company</span>

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
	<?php
		$sz = '';
		foreach($sizes as $s)
		{
			$sz .= "[".$s->id.", $s->lower_limit, $s->upper_limit],"; 
		}
		$sz = '['.$sz.']';
		echo 'var sizes='.$sz.';';
	?>
	//console.log(sizes);
	$().ready(function(){
		$('#add-company').click(function(){
			var $i = ''+
			'<p style="margin-bottom: 0.5em; border-bottom:0.1em solid black; padding: 1em">'+
				'<label>Company Name</label>'+
				'<span class="btn btn-sm btn-danger pull-right rm-company-size">x</span>'+
				'<input type="text" name="company_name[]" required="" class="form-control" style="width: 100%">'+
				'<select required="" name="company_size[]" class="form-control">'+
					'<option value="">- Select -</option>';
			for(var i=0; i<sizes.length; i++)
			{
				$i += ''+
					'<option value="'+sizes[i][0]+'">'+sizes[i][1]+' - '+sizes[i][2]+' people</option>';

			}
			$i += ''+
				'</select>'+
			'</p>';
			$('#company-sizes-pool').append($i);

			$('.rm-company-size').click(function(){
				$(this).parent().remove();
			});
		});

		$('.rm-company-size').click(function(){
			$(this).parent().remove();
		});
	});
</script>

@endsection