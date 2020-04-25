@extends('layouts.dashboard-layout')

@section('title','Refer your Friends')

@section('description')
Emploi offers a transparent referral and rewards program. Job seekers who refer more than 5 friends are Featured for Free on Emploi for 1 month. Other prices include Free Airtime and Free Internet Bundles.
@endsection

@section('content')

<div class="text-center my-5">
    <h2>Refer your Friends</h2>
    <p>
        Emploi offers a transparent referral and rewards program. Job seekers who refer more than 5 friends are Featured for Free on Emploi for 1 month. Other prices include Free Airtime and Free Internet Bundles.
        
    </p>
    <br>
    <div class="row">
    	<div class="col-md-4">
    		<h5 class="orange">Refer by Email</h5>
    		<form class="form-group" method="post" action="/referrals" style="text-align: center;">
                @csrf
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <input type="text" name="name" class="form-control my-1" id="new_invitee_name" placeholder="John Doe" required="">
                    </div>
                    <div class="col-md-10 offset-md-1">
                        <input type="email" name="email" class="form-control my-1" id="new_invitee" placeholder="john@example.com" required="">
                    </div>
                </div>
                
                <button class="btn btn-sm btn-orange">Send Email Invite</button>
               
            </form>
    	</div>
    	<div class="col-md-4">
    		<h5 class="orange">Upload CSV Emails</h5>
    		<p>
    			Attach a CSV file containing your referrals. We'll send them a link to register.
    			@guest
    			<a href="/join" class="orange">Create an Account</a> or <a href="/login" class="orange">Login</a> to be rewarded for your referrals
    			@else
    			You will be awarded once your referrals verify their accounts.
    			@endguest
    			<br>
    			<a href="#" class="btn btn-orange-alt" id="showCsvModalForInvite" data-toggle="modal" data-target="">Get Started</a>
    		</p>
    	</div>
    	<div class="col-md-4">
    		<h5 class="orange">Create Invite Link</h5>
    		<p>
    			Create an easy-to-share invite link and share it for easy referrals on click.
    			<br>
    			<a href="/profile/invites/create" class="btn btn-orange">Create Invite Link</a>
    		</p>
    	</div>
    </div>
    <div>
        <br>
        <img src="/images/promotions/refer-friends-win-huawei-y9.jpg" alt="Refer your Friends and Win a Huawei Y9" style="width: 90%; margin-left: 5%">
    </div>
    
    <div>
    	@include('components.featuredJobs')
    </div>
    <div>
    	@include('components.featuredEmployers')
    </div>
</div>

<script type="text/javascript">
	$().ready(function(){
		$('#showCsvModalForInvite').click(function(){
            $('#importCSVModal').modal();
        });
	});
</script>


@endsection
