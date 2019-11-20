@extends('layouts.general-layout')

@section('title','Emploi :: Contact Us')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@include('components.search-form')
<div class="contact">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6 col-12 py-3 text-center address">
				<h2>Our Address</h2>
				<p>Syokimau Junction along, Mombasa road</p>
				<p>Repen Complex. 4th Floor Room 414B</p>
				<p>
					<strong>Tel:</strong> +254 702 068 282
				</p>
				<p>
					<strong>E-mail:</strong> <a href="malito:info@emploi.co">info@emploi.co</a>
				</p>
			</div>
			<div class="col-md-6 col-12 py-5 pl-md-5">
				<h2 class="text-center orange">Contact Us</h2>
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

@endsection