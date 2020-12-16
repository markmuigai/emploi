@extends('v2.layouts.app')

@section('title','Help Center :: Emploi')

@section('description')
Do you have questions? Here are frequently asked questions by Job Seekers.
@endsection

@section('content')
    <!-- Navbar -->
    @include('v2.components.jobseeker.navbar')    
    <!-- End Navbar -->

	<!-- FAQ -->
	<div class="pt-5">
		<div class="container mt-5">
			<h3 class="text-center my-4">Frequently Asked Questions</h3>
			<div class="row justify-content-center">
				<div class="col-lg-12">
					<div class="faq-content">
						<ul class="accordion">
							@forelse($faqs as $faq)
								<li>
									<a data-toggle="collapse" href="#collapseDescription-{{$faq->id}}" role="button" aria-expanded="false" aria-controls="collapseDescription-{{$faq->id}}">
										{{ $faq->title }}
									</a>
									<div class="collapse" id="collapseDescription-{{$faq->id}}">
										<?php echo $faq->description; ?>
									</div>
								</li>
							@empty
							@endforelse
						</ul>
					</div>
				</div>
			</div>
			<div class="faq-bottom mb-5">
				<h3>If you don't find your questions or need help</h3>
				<a href="faq.html#">Contact Us</a>
			</div>
		</div>
	</div>
	<!-- End FAQ -->

@endsection