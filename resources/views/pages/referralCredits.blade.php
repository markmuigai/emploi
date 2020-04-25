@extends('layouts.general-layout')

@section('title','Emploi :: Referral Credits')

@section('description')
Emploi is the Leading Platform for Talent Assessment and Matching for SME's in Africa.
@endsection

@section('content')
<div class="container py-4">
	<h2 class="orange text-center">Referral Credits</h2>
	<div class="row pb-3 align-items-center">
		<div class="col-md-4">
			<img src="/images/refer.png"class="w-100" alt="Mass Recruitment">
		</div>
		<div class="col-md-8">
			<p>
				Emploi offers a transparent referral and rewards program. When you refer your friends and they sign up, you are awarded 10 points for every job seeker and 20 points for employer sign up. <br> 
				Job seekers who refer more than 5 friends are <b>Featured for Free</b> on Emploi for 1 month. Other prices include <b>Free Airtime</b> and <b>Free Internet Bundles</b>.
				Redeem referrals can be redeemed on Emploi credits or airtime. Credits are only available to registered users.
			</p>
			@include('components.ads.responsive')
			<p>
				To get started, click <b>"Invite Friends" button</b> at the bottom right. Your invitees will be sent an e-mail invite. Once they verify their account, your referral credits will be credited to your account.<br>
				<br>
				@guest
				<a href="/login?redirectToUrl={{ url('/profile/invites/create') }}" class="orange">{{ __('auth.login') }}</a> to your account to create Referral Links.
				@else
				You can also <a href="/profile/invites/create" class="orange">Create Referral link</a> with a custom message, and share it.
				@endguest
			</p>
		</div>
	</div>
</div>

@endsection
