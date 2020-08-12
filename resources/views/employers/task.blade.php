@extends('layouts.dashboard-layout')

@section('title','Emploi :: Checkout')

@section('description')
Emploi is the Leading Platform for Talent Assessment and Matching for SME's in Africa.
@endsection

@section('content')
@section('page_title', 'Professional Requisition Checkout')

<div class="container">
    <div class="single">
    	@if (Auth::check())
        <div class="row">
			<div class="col-md-5 order-md-2 mb-4">
				<h4 class="d-flex justify-content-between align-items-center mb-3">
					<span class="text-muted">Your cart</span>
				</h4>
				
			
					
				
					<form class="card" method="POST" action="/employers/invoice">
						@csrf
						@if(isset(Auth::user()->id) && Auth::user()->role == 'employer' && Auth::user()->employer->isOnPaas())
						Deposit: Ksh. {{ $task-> salary }}<br>
						eClub Membership: 100%<br>
						<b>Total: Ksh. {{ $task->salary - $task->salary }}</b>

						@else

						Deposit: Ksh. {{ $task->salary }}<br>
						Management Fee: Ksh. {{ 0.135 * $task->salary }}<br>
                        <b>Total: Ksh. {{ $task->salary + 0.135 * $task->salary }}</b>
						@endif
			        </div>
						
					<div class="col-md-7 order-md-1">
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
									<input type="text" class="form-control" name="firstname" placeholder="" value="{{ $fname }}" required="">
									<div class="invalid-feedback">
										Valid first name is required.
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<label for="lastName">Last name</label>
									<input type="text" class="form-control" name="lastname" placeholder="" value="{{ $lname }}" required="">
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
						            <input type="number"  path="phone_number" value="{{ old('phone_number') ? old('phone_number') : $phone }}" name="phone_number" class="form-control col-8 ml-3" placeholder="712312312"
						              oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" />

								</div>
							</div>

							<div class="mb-3">
								<label for="email">Email </label>
								<input type="email" class="form-control" name="email" placeholder="you@example.com" required="" name="email" value="{{ $email }}">
								<div class="invalid-feedback">
									Please enter a valid email address for shipping updates.
								</div>
							</div>

							<div class="mb-3">
								<label for="salary">Salary </label>
								<input type="text" class="form-control" name="salary" required="" value=" {{ $task->salary }}">
								<div class="invalid-feedback">
									Please enter a valid salary.
								</div>
							</div>

							<hr class="mb-4">							
							   @if(isset(Auth::user()->id) && Auth::user()->role == 'employer' && Auth::user()->employer->isOnPaas())
							   <button class="btn btn-primary" id="submitButton" type="submit">Complete checkout</button>
                                @else
                            <button class="btn btn-primary" id="submitButton" type="submit">Continue to checkout</button> Or    
							<a href="/employers/paas?redirectToUrl={{ url()->current() }}" class="btn btn-orange" id="">Checkout with eClub</a>
                                @endif						
						</form>
						<hr>
					</div>			
	      	   
		    
		</div>
		@else
			<p>
			<a href="/login?redirectToUrl={{ url()->current() }}" class="btn btn-orange">{{ __('auth.login') }}</a>  or  <a href="/register?redirectToUrl={{ url()->current() }}" class="btn btn-orange-alt">Check your Email for Login Credentials</a> to complete this request.
			</p>
		@endif
	</div>
</div>
@endsection