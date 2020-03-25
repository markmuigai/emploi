@extends('layouts.dashboard-layout')

@section('title','Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="text-center my-5">
    <h2>Refer your Friends</h2>
    <p>
        When you refer your friends and they sign up, you are awarded <a href="/referral-credits" class="orange" >Referral Credits</a> which you can redeem on Emploi.
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
