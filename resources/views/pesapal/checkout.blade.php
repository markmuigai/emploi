@extends('layouts.dashboard-layout')

@section('title','Emploi :: Checkout')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
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
				<ul class="list-group mb-3">
					<li class="list-group-item d-flex justify-content-between lh-condensed">
						<div>
							<h6 class="my-0">{{ $product->title }}</h6>
							<small class="text-muted">{{ $product->tagline }}</small>
						</div>
						<span class="text-muted">{{ $product->getPrice() }}</span>
					</li>
					@guest
					<li class="list-group-item d-flex justify-content-between">
						<span>Total </span>
						<strong>Ksh {{ $product->price }}</strong>
					</li>
					@else
					<li class="list-group-item d-flex justify-content-between bg-light">
						<div class="text-success">
							<h6 class="my-0">Discount</h6>
							<small>Referral Credits</small>
						</div>
						<span class="text-success">-Ksh {{ $product->applicableDiscountFor(Auth::user()) }}</span>
					</li>
					<li class="list-group-item d-flex justify-content-between">
						<span>Total </span>
						<strong>Ksh {{ $product->price - $product->applicableDiscountFor(Auth::user()) }}</strong>
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
				                <option value="{{ $c->id }}" @if( old('prefix') && old('prefix')==$c->id)
				                    selected="selected"
				                    @endif
				                    >
				                    {{ $c->code }} {{ $c->prefix }}
				                </option>
				                @endforeach
				            </select>
				            <input type="number"  path="phone_number" value="{{ old('phone_number') ? old('phone_number') : $phone }}" name="phone_number" id="phone_number" class="form-control col-8 ml-3" placeholder="7123123123"
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
					<button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
				</form>

				
			</div>
			
      	</div>
      	<div class="row">
      		<div class="col-md-10 offset-md-1">
      			<br>
				<h4>Product Description</h4>

				<?php echo $product->description; ?>
			</div>
      	</div>
    </div>
</div>

@endsection