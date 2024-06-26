@extends('layouts.dashboard-layout')

@section('title','Emploi :: Checkout')

@section('description')
Emploi is the Leading Platform for Talent Assessment and Matching for SME's in Africa.
@endsection

@section('content')
@section('page_title', 'Checkout')

<div class="container">
    <div class="single">
        <div class="row">
			<div class="col-md-5 order-md-2 mb-4">
				<h4 class="d-flex justify-content-between align-items-center mb-3">
					<span class="text-muted">Your cart</span>
					<span class="badge badge-secondary badge-pill">1</span>
				</h4>
				   @if($product->days_duration == 30)            
					    <h6 class="orange">Get 1 month free on annual subscription by:</h6>
					    <ul>
					    	<li><a href="" id="duration_yearly">Clicking here</a></li>
					    	<li>Selecting duration below as one year</li>
					    </ul>
					@endif
				<ul class="list-group mb-3">
					<li class="list-group-item d-flex justify-content-between lh-condensed">
						<div>
							<h6 class="my-0">{{ $product->title }}</h6>
							<small class="text-muted">{{ $product->tagline }}</small>
						</div>
						<span class="text-muted">{{ $product->getPrice() }}</span>
					</li>
					@if($product->days_duration == 30)
					<form class="list-group-item d-flex justify-content-between" method="POST" action="/checkout" id="days_duration_form">
						@csrf
						<input type="hidden" name="product" value="{{ $product->slug }}">
						<span>Duration </span>
						<select class="btn btn-sm btn-orange" id="days_duration" name="days_duration">
							<option value="30" {{ session('checkout_days_duration') && session('checkout_days_duration') == 30 ? 'selected=""' : '' }}>1 Month</option>
							<option value="365" {{ session('checkout_days_duration') && session('checkout_days_duration') == 365 ? 'selected=""' : '' }}>1 Year</option>
							@if(session('checkout_days_duration'))
								@if(session('checkout_days_duration') != 30 && session('checkout_days_duration') != 365)
								<option value="{{ session('checkout_days_duration') }}" selected="">Custom {{ session('checkout_days_duration') }} day(s)</option>
								@endif
							@endif
						</select>
					</form>
						
					@endif
					@guest
						<li class="list-group-item d-flex justify-content-between">
							<span>Total </span>
							<strong>Ksh {{ session('checkout_price') ?? $product->price }}</strong>
						</li>
					@else
						<li class="list-group-item d-flex justify-content-between bg-light">
							<div class="text-success">
								<h6 class="my-0">Referral Credits</h6>
								<small>Discount</small>
							</div>
							<span class="text-success">-Ksh {{ Auth::user()->getApplicableDiscount(session('checkout_price') ?? $product->price) }}</span>
						</li>
						<li class="list-group-item d-flex justify-content-between">
							<span>Total </span>
							<strong>
								Ksh 
								@if(session('checkout_price'))
									{{ session('checkout_price') - Auth::user()->getApplicableDiscount(session('checkout_price') ?? $product->price) }}
								@else
									{{ $product->price - Auth::user()->getApplicableDiscount(session('checkout_price') ?? $product->price) }}
								@endif
								
							</strong>
						</li>
					@endguest
					
				</ul>		 
						
			</div>
			<div class="col-md-7 order-md-1">
				<form method="POST" action="/checkout">
					@csrf
					<input type="hidden" name="createInvoice" value="true">
					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="firstName">First name</label>
							<?php
							$fname = '';
							$lname = '';
							$email = '';
							$phone = '';

							if(isset(Auth::user()->id))
							{
								$full_name = Auth::user()->name;
								$full_name = explode(" ", $full_name);
								$fname = $full_name[0];
								$lname = isset($full_name[1]) ? $full_name[1] : '';
								$email = Auth::user()->email;
							}

							?>
							<input type="text" class="form-control" id="firstName" name="first_name" placeholder="" value="{{ $fname }}" required="">
							<div class="invalid-feedback">
								Valid first name is required.
							</div>
						</div>
						<div class="col-md-6 mb-3">
							<label for="lastName">Last name</label>
							<input type="text" class="form-control" id="lastName" name="last_name" placeholder="" value="{{ $lname }}" required="">
							<div class="invalid-feedback">
								Valid last name is required.
							</div>
						</div>
					</div>

					<div class="mb-3">
						<label for="username">Phone Number <span class="text-muted">(Optional)</span></label>
						<div class="input-group">
							<select class="custom-select col-3" name="prefix">
				                @foreach(\App\Country::all() as $c)
				                <option value="{{ $c->prefix }}">
				                    {{ $c->code }} {{ $c->prefix }}
				                </option>
				                @endforeach
				            </select>
				            <input type="number"  path="phone_number" value="{{ old('phone_number') ? old('phone_number') : $phone }}" name="phone_number" id="phone_number" class="form-control col-8 ml-3" placeholder="712312312"
				              oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" />

						</div>
					</div>

					<div class="mb-3">
						<label for="email">Email </label>
						<input type="email" class="form-control" id="email" placeholder="you@example.com" required="" name="email" value="{{ $email }}">
						<div class="invalid-feedback">
							Please enter a valid email address for shipping updates.
						</div>
					</div>


					<hr class="mb-4">
					<button class="btn btn-primary btn-lg btn-block" id="submitButton" type="submit">Continue to checkout</button>
				</form>
				@if($product->days_duration == 30)  
				<hr>
				<p style="text-align: center;">
					<a href="#similar-products" class="btn btn-orange-alt">Go to other products</a>
				</p>
				@endif


				
			</div>
			
      	</div>
      	<div class="row">
      		<div class="col-md-10 offset-md-1">
      		 	<br>
				<h4>Benefits</h4>

				<?php echo $product->description; ?><br>
			</div>
			<br id="similar-products">

			@if($product->slug == 'pro')
				<?php $p2 = \App\Product::where('slug','spotlight')->first(); ?>
				@if(isset($p2->id))

					<div class="col-md-10 offset-md-1">
						<hr>
						<?php $p2 = \App\Product::where('slug','spotlight')->first(); ?>
		      			<br>
						<h4>
							{{ $p2->title }}
							<a href="/checkout?product=spotlight" class="btn btn-orange-alt" style="float: right;">Buy</a>
						</h4>

						<?php echo $p2->description; ?>
						<br>
						<a href="/checkout?product=spotlight" class="btn btn-orange">Buy Package</a>
					</div>

				@endif
			@endif

			@if($product->slug == 'spotlight')

				<?php $p2 = \App\Product::where('slug','pro')->first(); ?>
				@if(isset($p2->id))

					<div class="col-md-10 offset-md-1">
						<hr>
						<?php $p2 = \App\Product::where('slug','pro')->first(); ?>
		      			<br>
						<h4>
							{{ $p2->title }}
							<a href="/checkout?product=pro" class="btn btn-orange-alt" style="float: right;">Buy</a>
						</h4>

						<?php echo $p2->description; ?>
						<br>
						<a href="/checkout?product=pro" class="btn btn-orange">Buy Package</a>
					</div>

				@endif

			@endif

			@if($product->slug == 'solo')

				@foreach(['solo_plus','infinity','stawi'] as $pkg)

					<?php $p2 = \App\Product::where('slug',$pkg )->first(); ?>

					@if(isset($p2->id))

						<div class="col-md-10 offset-md-1">
							<hr>
			      			<br>
							<h4>
								{{ $p2->title }}
								<a href="/checkout?product={{$pkg}}" class="btn btn-orange-alt" style="float: right;">Buy</a>
							</h4>

							<?php echo $p2->description; ?>
							<br>
							<a href="/checkout?product={{$pkg}}" class="btn btn-orange">Buy Package</a>
							<span style="float: right;">{{ $p2->getPrice() }}</span>
						</div>

					@endif

				@endforeach

			@endif

			@if($product->slug == 'solo_plus')

				@foreach(['solo','infinity','stawi'] as $pkg)

				<?php $p2 = \App\Product::where('slug',$pkg )->first(); ?>

					@if(isset($p2->id))

						<div class="col-md-10 offset-md-1">
							<hr>
			      			<br>
							<h4>
								{{ $p2->title }}
								<a href="/checkout?product={{$pkg}}" class="btn btn-orange-alt" style="float: right;">Buy</a>
							</h4>

							<?php echo $p2->description; ?>
							<br>
							<a href="/checkout?product={{$pkg}}" class="btn btn-orange">Get Package</a>
							<span style="float: right;">{{ $p2->getPrice() }}</span>
						</div>

					@endif

				@endforeach

			@endif

			@if($product->slug == 'infinity')

				@foreach(['solo','solo_plus','stawi'] as $pkg)

				<?php $p2 = \App\Product::where('slug',$pkg )->first(); ?>

					@if(isset($p2->id))

						<div class="col-md-10 offset-md-1">
							<hr>
			      			<br>
							<h4>
								{{ $p2->title }}
								<a href="/checkout?product={{$pkg}}" class="btn btn-orange-alt" style="float: right;">Buy</a>
							</h4>

							<?php echo $p2->description; ?>
							<br>
							<a href="/checkout?product={{$pkg}}" class="btn btn-orange">Get Package</a>
							<span style="float: right;">{{ $p2->getPrice() }}</span>
						</div>

					@endif

				@endforeach

			@endif

			@if($product->slug == 'stawi')

				@foreach(['solo','solo_plus','infinity'] as $pkg)

				<?php $p2 = \App\Product::where('slug',$pkg )->first(); ?>

					@if(isset($p2->id))

						<div class="col-md-10 offset-md-1">
							<hr>
			      			<br>
							<h4>
								{{ $p2->title }}
								<a href="/checkout?product={{$pkg}}" class="btn btn-orange-alt" style="float: right;">Buy</a>
							</h4>

							<?php echo $p2->description; ?>
							<br>
							<a href="/checkout?product={{$pkg}}" class="btn btn-orange">Buy Package</a>
							<span style="float: right;">{{ $p2->getPrice() }}</span>
						</div>

					@endif

				@endforeach

			@endif
      	</div>
    </div>
</div>


<script>
	$().ready(function(){
		var submit_clicked = false;

		$('#days_duration').change(function(){
			submit_clicked = true;
			$('#days_duration_form').submit();
		});
          
		$('#duration_yearly').click(function(){
			$('#days_duration').val('365');		
		    	$('#days_duration_form').submit(); 
		});


		$('#submitButton').click(function(){
		    submit_clicked = true;
		});

	    window.onbeforeunload = confirmExit;

	    function confirmExit() {
	    	if (submit_clicked === false) {
	    		return "{{ $product->title }} is ready for checkout. Are you sure?";
	    	}
	    }
	});
</script>

@endsection