@extends('layouts.dashboard-layout')

@section('title','Emploi :: Job Seeker '. __('other.faqs') )

@section('description')
Do you have questions? Here are frequently asked questions by Job Seekers.
@endsection

@section('content')
@section('page_title', 'Job Seeker '. __('other.faqs') )
<style type="text/css">
	.panel-title:hover{
	    color: #554695;
  }
</style>
<div class="card">
    <div class="card-body">
        <div class="container">
        	<div class="panel-group" id="faqAccordion">
        		@forelse($faqs as $faq)
        		<div class="panel panel-default " id="faq{{$faq->id}}">
		            <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question{{$faq->id}}">
		                 <h4 class="panel-title">
		                 	<span class="ing" style="cursor: pointer">Q: {{ $faq->title }}</span>
		             	 </h4>

		            </div>
		            <div id="question{{$faq->id}}" class="panel-collapse collapse" style="height: 0px;">
		                <div class="panel-body">
		                     <h5><span class="label label-primary" style="color: #500095">Answer</span></h5>

		                    <p style="font-style: italic;">
		                    	<?php echo $faq->description; ?>
		                    </p>
		                </div>
		            </div>
		        </div>
		        @empty
		        <p>
		        	Nothing here. Check back later or <a href="/contact" class="orange">Contact Us</a>
		        </p>
				@endforelse
				<h3 class="text-center mt-5">If you don't find your questions or need help</h3>
				<center>
					<a href="/contact" class="btn btn-primary">
						Contact Us
					</a>
				</center>
        	</div>
        </div>
        
    </div>
</div>



@endsection