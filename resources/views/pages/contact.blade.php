@extends('layouts.general-layout')

@section('title','Emploi :: Contact Us')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
<div class="contact">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6 col-12 pt-5 pt-md-0 address">
				<h2 class="text-center">Find Us</h2>
				<div class="row">
						<div class="col-1">
								<i class="fas fa-map-marker-alt"></i>
						</div>
						<div class="col-10">
							<h5>Address</h5>
								<p>Syokimau Junction, along Mombasa road, Repen Complex. 4<sup>th</sup> Floor Room 414B</p>
						</div>
				</div>
				<br>
				<div class="row">
						<div class="col-1">
								<i class="fas fa-envelope"></i>
						</div>
						<div class="col-10">
							<h5>General Support</h5>
								<a href="mailto:info@emploi.co">info@emploi.co</a>
						</div>
				</div>
				<br>
				<div class="row">
						<div class="col-1">
								<i class="fas fa-phone"></i>
						</div>
						<div class="col-10">
							<h5>Let's Talk</h5>
								<a href="tel:+254702068282">+254 702 068 282</a>
						</div>
				</div>
			</div>
			<div class="col-md-6 col-12 py-5 pl-md-5">
				<h2 class="text-center orange">Send Us A Message</h2>
				<form method="post" action="/contact">
					@csrf
					<div class="form-group">
						<input type="text" class="form-control" name="name" placeholder="Name" onfocus="" onblur="" required="required">
					</div>
					<div class="form-group">

						<input type="text" class="form-control" name="email" placeholder="E-mail address" onfocus="" onblur="" required="required">
					</div>
					<div class="form-group">

						<input type="text" class="form-control" name="phone" placeholder="Phone number" required="" onfocus="" onblur="">
					</div>
					<div class="form-group">

						<textarea placeholder="Message" class="form-control" name="message" onfocus="" onblur="" required=""></textarea>
					</div>
					<button type="submit" class="btn btn-orange" name="button">Send</button>
				</form>
			</div>
		</div>
	</div>
</div>

@include('components.search-form')
@endsection
