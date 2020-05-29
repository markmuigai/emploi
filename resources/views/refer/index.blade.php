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
    	<div class="col-md-3">
    		<h5 class="orange">Refer for CV Editing</h5>
    		<form class="form-group" method="post" action="/cvreferrals" style="text-align: center;">
                @csrf
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <input type="text" name="name" class="form-control my-1" id="new_invitee_name" placeholder="John Doe" required="">
                    </div>
                    <div class="col-md-10 offset-md-1">
                        <input type="email" name="email" class="form-control my-1" id="new_invitee" placeholder="john@example.com" required="">
                    </div>
                </div>
                
                <button class="btn btn-sm btn-orange">Send Invite</button>
               
            </form>
    	</div>

             <div class="col-md-3">
            <h5 class="orange">Refer by Email</h5>
                <p>
                Invite your friends by their email addresses. We'll send them a link to register.
                @guest
                <a href="/join" class="orange">Create an Account</a> or <a href="/login" class="orange">Login</a> to be rewarded for your referrals
                @else
                You will be awarded once your referrals verify their accounts.
                @endguest
                <br>
                <a href="#" class="btn btn-orange-alt" id="showModalForInvite" data-toggle="modal" data-target="">Get Started</a>
            </p>
        </div>

    	<div class="col-md-3">
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
    	<div class="col-md-3">
    		<h5 class="orange">Create Invite Link</h5>
    		<p>
    			Create an easy-to-share invite link and share it for easy referrals on click.
    			<br>
    			<a href="/profile/invites/create" class="btn btn-orange">Create Invite Link</a>
    		</p>
    	</div>
    </div>
   <!--  <div>
        <br>
        <img src="/images/banners/cv-editing_refer_banner.jpeg" style="width: 100%" alt="Earn up to Ksh.500 by referring a friend" style="width: 90%; margin-left: 5%">
    </div> -->
       
    <div>
    	@include('components.featuredJobs')
    </div>
    <div>
    	@include('components.featuredEmployers')
    </div>
</div>

<script type="text/javascript">
	$().ready(function(){
		$('#showModalForInvite').click(function(){
            $('#inviteFriends').modal();
        });

        $('#showCsvModalForInvite').click(function(){
            $('#importCSVModal').modal();
        });        
	});
</script>


@endsection
