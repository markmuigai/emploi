@extends('layouts.general-layout')

@section('title','Emploi Referral')

@section('description')
Emploi is the Leading Platform for Talent Assessment and Matching for SME's in Africa.
@endsection

@section('content')

<div class="container">
	<br><br>
    <div class="single row">

	 <div class="row col-md-8 offset-md-2">
	 	<br><br>
	      <h3>
	      	<i class="fas fa-arrow-left" onclick="window.history.back()"></i>
	      	{{ $title }}
	      </h3>
	      <div class="row_1">
	      	<div class="clearfix"> </div>
	      </div>
	      <br>
	      @include('components.ads.responsive')
	      <div class="col-md-8 offset-md-2">
	      	{{ $message }}
	      </div>

	      <br>

	       <div class="col-md-8 offset-md-2">
	       	<br>
	       	@guest
	       	<br>
	       	<a href="/join" class="btn btn-sm btn-orange">{{ __('auth.register') }}</a>
	       	<a href="/login" class="btn btn-sm btn-primary">{{ __('auth.login') }}</a>
	       	@else
	       	You have {{ Auth::user()->totalCredits }} credits.
	       	<br>
	       	<a href="/profile" class="btn btn-sm btn-orange">My Profile</a>
	       	<a href="/home" class="btn btn-sm btn-primary">Dashboard</a>
	       	@endguest
	      	
	      </div>




	   </div>
	   <div class="clearfix"> </div>
	 </div>
</div>

@endsection
