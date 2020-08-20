@extends('layouts.dashboard-layout')

@section('title','Emploi :: Checkout')

@section('description')
Emploi is the Leading Platform for Talent Assessment and Matching for SME's in Africa.
@endsection

@section('content')
<h3>
@if(isset(Auth::user()->id) && Auth::user()->role == 'employer' && Auth::user()->employer->isOnPaas())
	Review Checkout
@else
	Professional Requisition
@endif

</h3><br>
<div class="container">
    <div class="single">
    	@if (Auth::check())
        <div class="row">
			<div class="col-md-5 order-md-2 mb-4">
				<h4 class="d-flex justify-content-between align-items-center mb-3">
					<span class="text-muted">Your cart</span>
				</h4>				
					
				
					<form class="card" method="POST" action="/employers/invoice">
					<div class='order'>   
						<ul><br>
						<h5 class="text-muted">Order: {{ $task->slug }}</h5><br>
							@csrf
							@if(isset(Auth::user()->id) && Auth::user()->role == 'employer' && Auth::user()->employer->isOnPaas())

							<h5>Salary: Ksh. {{ $task->salary }}</h5>
							<h5>Management Fee:  Ksh. {{ 0.135 * $task->salary }}</h5>
							<h5 class='total'>Total Monthly pay: <b>Ksh. {{ $task->salary + 0.135 * $task->salary }}</b></h5>

							@else

							<h5>Salary: Ksh. {{ $task->salary }}</h5>
							<h5>Management Fee:  Ksh. {{ 0.135 * $task->salary }}</h5>
							<h4 class='total'>Total: <b>Ksh. {{ $task->salary + 0.135 * $task->salary }}</b></h4>
							@endif
					    </ul>
					</div>
					
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

							<!-- <hr class="mb-4">	 -->						
							   @if(isset(Auth::user()->id) && Auth::user()->role == 'employer' && Auth::user()->employer->isOnPaas())
							   <p><a href="/employers/dashboard" class="btn btn-primary" id="complete" type="submit">Complete checkout</a>
							   To pay a total of <b>Ksh. {{ $task->salary + 0.135 * $task->salary }}</b> at the end of the month.</p>
                                @else
                               <button class="btn btn-primary" id="submitButton" type="submit">Continue to checkout</button>  Or   
							   <a href="/employers/paas?redirectToUrl={{ url()->current() }}" style="float: right" class="btn btn-orange" >Checkout with eClub</a>
                                @endif						
						</form>
						<p><button type="button" class="btn btn-orange-alt" style="float: right" data-toggle="modal" data-target="#eclub">Learn more</button></p>

				        <div class="modal fade" id="eclub" role="dialog">
			                <div class="modal-dialog">
			              
			                    <!-- Modal content-->
			                    <div class="modal-content">
			                        <div class="modal-header">
			                           <!--  <button type="button" style="background-color: #FF5733" class="close" data-dismiss="modal">&times;</button> -->
			                      
			                        <h4 class="orange">E-CLUB</h4>
			                        </div>
			                        <div class="modal-body">
			                            <h5 class="pt-2">Emploi’s E-club is a membership programme for employers looking to hire part-time professionals.</h5>
			                            <h6>What You Will Get;</h6> 
			                            <ul>
			                            	<li>Friendly and staggered monthly payments. Invoice sent on time.</li>
			                            	<li>Access to free on-demand HR advisory services and networking opportunities.</li>
			                            	<li>Access to other Emploi tools for recruitment and talent management.</li>
			                            	<li>Discounted rates on other Emploi services like job advertisements.</li>
			                            </ul>                           
			                     
			                        </div>
									<div class="modal-footer">
									    <button type="button" class="btn btn-orange-alt" data-dismiss="modal">Close</button>
									</div>      
			                    </div>
			                </div>
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

<!-- <script>
	$().ready(function(){
		var submit_clicked = false;

		$('#submitButton').click(function(){
		    submit_clicked = true;
		});

	    window.onbeforeunload = confirmExit;

	    function confirmExit() {
	    	if (submit_clicked === false) {
	    		return "Changes not saved. Are you sure?";
	    	}
	    }
	});
</script> -->
@endsection