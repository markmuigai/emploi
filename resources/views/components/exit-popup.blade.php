<style type="text/css">
    .blink_text {

    animation:1s blinker linear infinite;
    -webkit-animation:1s blinker linear infinite;
    -moz-animation:1s blinker linear infinite;

     color: #500095;
    }

    @-moz-keyframes blinker {  
     0% { opacity: 1.0; }
     50% { opacity: 0.0; }
     100% { opacity: 1.0; }
     }

    @-webkit-keyframes blinker {  
     0% { opacity: 1.0; }
     50% { opacity: 0.0; }
     100% { opacity: 1.0; }
     }

    @keyframes blinker {  
     0% { opacity: 1.0; }
     50% { opacity: 0.0; }
     100% { opacity: 1.0; }
     }
</style>

<div class="modal fade" id="seekerRegisterModal" role="dialog" aria-labelledby="seekerRegisterModal" aria-hidden="true">	
	<div class="modal-dialog modal-dialog-centered" role="document">
	    <!-- Modal content-->
		<div class="modal-content px-3 pt-3">
			<div class="modal-body">
				<div class="modal-header">					
					<h4 class="orange">
						Get Your Dream Job Today
					</h4>
					
				</div>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeSeekerRegisterModal">
	                <i class="fas fa-times" aria-hidden="true"></i>
	              </button>
				<div class="modal-body">
					<br>
					<form method="POST" id="seeker-register-modal" action="/create-account">
						@csrf
						<p>
							<label>Name:</label>
							<input type="text" name="name" class="form-control" required="" maxlength="50">
						</p>
						<p>
							<label>Email:</label>
							<input type="text" name="email" class="form-control" required="" maxlength="50">
						</p>
						<p style="text-align: center;">
							<br>
							<input type="submit" value="Create a job seeker account" class="btn btn-sm btn-orange">
							
						</p>
					</form>
				</div>
				<div class="modal-footer" style="text-align: center;">
					<a href="{{ url('/register') }}" class="btn btn-sm btn-orange-alt">Upload CV</a>
					<a href="{{ url('/job-seekers/summit') }}" class="btn btn-sm btn-orange-alt">CV Editing</a>
					<a href="{{ url('/employers/register') }}" class="btn btn-sm btn-orange-alt">Company Registration</a>
				</div>
			</div>
	    </div>
	</div>
</div>
    <div class="modal fade" id="seekerService" role="dialog" aria-labelledby="seekerService" aria-hidden="true" >	
		<div class="modal-dialog modal-dialog-centered" role="document" >
		    
			<div class="modal-content col-md-12" >
				<div class="modal-body" >
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeSeekerService">
	                <i class="fas fa-times" aria-hidden="true"></i>
	              </button>			
					<div class="row">
						<div class="col-md-6">	                    
		                    <div class="card">
		                            <h5 style="margin-left: 20%">Pro</h5>
		                            <ul>
		                            	<li>Get real-time notifications when you are shortlisted and when your profile is viewed. </li>                 
		                            </ul>
		                        <!--     <ul class="tick">
		                            	 <li>Activate at KES 49 per monthly subscription or KES 539 per annual subscription at a one-month discount.</li>
		                            </ul> -->
		                                              
		                        <div class="card-footer">
		                            <a href="/checkout?product=pro" target="_blank" class="btn btn-orange">Request for <b>annual subscription at KES 539<br>(one month discount of KES 49)</b></a>
		                        </div>
		                    </div>
                        </div>
                    
	                   <div class="col-md-6">
		                   	<div class="card">
		                            <h5 style="margin-left: 20%">Spotlight</h5>
		                            <ul>
		                            	<li>All PRO benefits in addition to appearing first in all search lists.	</li>
		                            </ul><br><br>		                                                
		                        <div class="card-footer">
		                            <small class="text-muted">
		                                <a href="/checkout?product=spotlight" target="_blank" class="btn btn-orange">Request for <b>annual subscription at KES 1749<br>(one month discount of KES 159)</b> </a>
		                            </small>
		                        </div>
		                    </div>
	                    </div> 
			        </div>              

				</div>
			</div>
		</div>
    </div>

    <div class="modal fade" id="seekerService" role="dialog" aria-labelledby="seekerService" aria-hidden="true" >	
		<div class="modal-dialog modal-dialog-centered" role="document" >
		    
			<div class="modal-content col-md-12" >
				<div class="modal-body" >
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeSeekerService">
	                <i class="fas fa-times" aria-hidden="true"></i>
	              </button>			
					<div class="row">
						<div class="col-md-6">	                    
		                    <div class="card">
		                            <h5 style="margin-left: 20%">Pro</h5>
		                            <ul>
		                            	<li>Get real-time notifications when you are shortlisted and when your profile is viewed. </li>                 
		                            </ul>
		                        <!--     <ul class="tick">
		                            	 <li>Activate at KES 49 per monthly subscription or KES 539 per annual subscription at a one-month discount.</li>
		                            </ul> -->
		                                              
		                        <div class="card-footer">
		                            <a href="/checkout?product=pro" target="_blank" class="btn btn-orange">Request for <b>annual subscription at KES 539<br>(one month discount of KES 49)</b></a>
		                        </div>
		                    </div>
                        </div>
                    
	                   <div class="col-md-6">
		                   	<div class="card">
		                            <h5 style="margin-left: 20%">Spotlight</h5>
		                            <ul>
		                            	<li>All PRO benefits in addition to appearing first in all search lists.	</li>
		                            </ul><br><br>		                                                
		                        <div class="card-footer">
		                            <small class="text-muted">
		                                <a href="/checkout?product=spotlight" target="_blank" class="btn btn-orange">Request for <b>annual subscription at KES 1749<br>(one month discount of KES 159)</b> </a>
		                            </small>
		                        </div>
		                    </div>
	                    </div> 
			        </div>              

				</div>
			</div>
		</div>
    </div>


<div class="modal fade" id="employerServices" role="dialog" aria-labelledby="employerService" aria-hidden="true">	
		<div class="modal-dialog modal-dialog-centered" role="document">
		    <!-- Modal content-->
			<div class="modal-content px-3 pt-3">
				<div class="modal-body">
				<div class="modal-header">			
				</div>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeSeekerServices">
	                <i class="fas fa-times" aria-hidden="true"></i>
	              </button>
				<div class="modal-body">
					<div class="card-deck">
	                    <div class="card">
	                        <div class="card-body">
	                            <h6  style="text-align: center;">Benefits</h6>
	                            <ul>
	                            	<li>Advertise cheaply</li>
	                                <li>Get your job advertisement viewed by tens of thousands of job seekers</li>
	                                <li>Receive qualified applications from the first day</li>
	                                <li>Easily shortlist or reject applications with professional response templates</li>
	                            </ul>
	                        </div>
	                        <div class="footer" style="text-align: center">
	                            <a href="/employers/rate-card" class="btn btn-orange">Request</a>
	                        </div>
	                    </div>                

	                </div>
	          	</div>
			</div>
		</div>
	</div>
</div>

    <div class="modal fade" id="seekerService" role="dialog" aria-labelledby="seekerService" aria-hidden="true" >	
		<div class="modal-dialog modal-dialog-centered" role="document" >
		    
			<div class="modal-content col-md-12" >
				<div class="modal-body" >
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeSeekerService">
	                <i class="fas fa-times" aria-hidden="true"></i>
	              </button>			
					<div class="row">
						<div class="col-md-6">	                    
		                    <div class="card">
		                            <h5 style="margin-left: 20%">Pro</h5>
		                            <ul>
		                            	<li>Get real-time notifications when you are shortlisted and when your profile is viewed. </li>                 
		                            </ul>
		                        <!--     <ul class="tick">
		                            	 <li>Activate at KES 49 per monthly subscription or KES 539 per annual subscription at a one-month discount.</li>
		                            </ul> -->
		                                              
		                        <div class="card-footer">
		                            <a href="/checkout?product=pro" target="_blank" class="btn btn-orange">Request for <b>annual subscription at KES 539<br>(one month discount of KES 49)</b></a>
		                        </div>
		                    </div>
                        </div>
                    
	                   <div class="col-md-6">
		                   	<div class="card">
		                            <h5 style="margin-left: 20%">Spotlight</h5>
		                            <ul>
		                            	<li>All PRO benefits in addition to appearing first in all search lists.	</li>
		                            </ul><br><br>		                                                
		                        <div class="card-footer">
		                            <small class="text-muted">
		                                <a href="/checkout?product=spotlight" target="_blank" class="btn btn-orange">Request for <b>annual subscription at KES 1749<br>(one month discount of KES 159)</b> </a>
		                            </small>
		                        </div>
		                    </div>
	                    </div> 
			        </div>              

				</div>
			</div>
		</div>
    </div>


<div class="modal fade" id="cvEditing" role="dialog" aria-labelledby="cvEditing" aria-hidden="true">	
		<div class="modal-dialog modal-dialog-centered" role="document">
		    <!-- Modal content-->
			<div class="modal-content px-3 pt-3">
				<div class="modal-body">
				<div class="modal-header">					
					<h5 class="orange" style="text-align: center">
						CV EDITING OFFER!
					</h5>
			
				</div>
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeSeekerService">
	                <i class="fas fa-times" aria-hidden="true"></i>
	              </button>
				<div class="modal-body">
					<div class="card-deck">
	                    <div class="card">	                    	
	                        <div class="card-body">	                        	
	                            <p class="card-text">
	                             <p>Have you updated your CV? How good is it?</p>	
	                             <h6>At Emploi we give you a <span class="blink_text">50% Discount</span> on CV Editing Services.</h6>
	                             <a href="{{ url('/job-seekers/summit') }}" target="_blank" class="btn btn-orange">Request Now</a>
	                        </div>
	                    </div>                    
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
    var exit_trials = 0;
    var role = 'guest';
    var seekerPopup = true;

    var seekerFeatured = false;
    var seekerBasic = false;
    <?php 
    	$path = url()->current();
    	$path = explode("/", $path);
    	array_shift($path);
    	array_shift($path);
    	array_shift($path);

    	if(isset(Auth::user()->id) && Auth::user()->role == 'seeker')
    	{
    		if(Auth::user()->seeker->canGetNotification())
    			print 'seekerBasic = true;';
    		if(Auth::user()->seeker->featured == 1)
    			print 'seekerFeatured = true;';
    	}

    	if(session()->has('disable-seeker-register-popup'))
    		print 'seekerPopup = false;';

    	print 'path = '.json_encode($path).';';
    	if(isset(Auth::user()->id)) 
    	{
    		if(Auth::user()->role == 'employer')
    			print 'role = "employer";';
    		if(Auth::user()->role == 'seeker')
    			print 'role = "seeker";';
    		if(Auth::user()->role == 'admin')
    			print 'role = "admin";';
    	}
    ?>
    $().ready(function(){
    	
    	document.body.addEventListener('mouseout', function(e) {
	        if (!e.relatedTarget && !e.toElement) {
	        	//console.log(path);
	        	//console.log(path[0]);
	            if(exit_trials == 1)
	            {
	            	if( path[0] == 'login' || path[0] == 'employers')
	            		return;

	            	if(!seekerPopup)
	            		return console.log('Seeker Signup Notifications Already disabled for this session');

	            	var registerPopupDisabled = localStorage.getItem("disable-seeker-register-popup");
	            	var registerPopupLastShown = localStorage.getItem("register-popup-last-shown");

	            	if(registerPopupDisabled != null)
	            		return console.log('Register popup disabled, last shown: ' + registerPopupLastShown);

	            	if(role == 'guest')
	            	{
	            		// $('#seekerRegisterModal').modal();

	            		// localStorage.setItem("disable-seeker-register-popup", "true");
	            		// localStorage.setItem("register-popup-last-shown", new Date());

	           //  		$.ajax({
				        //     type: 'GET',
				        //     url: '/browser-sessions/disable-seeker-register-popup?csrf-token='+$('#csrf_token').attr('content'),
				        //     success: function(response) {

				        //     	console.log('Seeker Signup Notifications disabled for this session');
				        //     },
				        //     error: function(e) {

				        //         //notify('Failed to add course', 'error');
				        //     },
				        // });
	            	}
	            }
	            // if(exit_trials == 1)
	            // {
	            // 	// if(role == 'guest')
	            // 	// 	$('#seekerRegisterModal').modal();
	            // }
	            exit_trials++;
	        }
	    });
	    if(path.length == 3)
	    {
	    	if(path[0] == 'vacancies' && path[2] == 'apply')
	    	{
	    		var seekerPopupCounter = localStorage.getItem("seekerPopupCounter");
	    		if(seekerPopupCounter == null)
	    		{
	    			seekerPopupCounter = 1;
	    			localStorage.setItem("seekerPopupCounter", seekerPopupCounter);
	    		}
	    		else
	    		{
	    			localStorage.setItem("seekerPopupCounter", ++seekerPopupCounter);
	    		}
	    		if(seekerPopupCounter % 3 == 0 || seekerPopupCounter == 1)
	    		{
	    			console.log([seekerBasic,seekerFeatured]);
	    			if(!seekerFeatured)
	    				$('#seekerPackages').modal();
	    		}
	    	}

	    }

			    if(path[0] == 'profile' && role == 'seeker')
			{
			    	var seekerServices = localStorage.getItem("seekerServices");
			         if(seekerServices == null)
			    {    	
			    	$('#seekerServices').modal();
			    	localStorage.setItem("seekerServices", new Date());
			    }
			}

		  if(path[0] == 'profile' && role == 'employer')
		{
		   var employerServices = localStorage.getItem("employerServices");
		    if(employerServices == null)
	       {    	
	    	$('#employerServices').modal();
	    	localStorage.setItem("employerServices", new Date());
	       }
	    }


			    if(path[0] == 'vacancies')
			{
			    	var seekerService = localStorage.getItem("seekerService");
			         if(seekerService == null)
			    {    	
			    	$('#seekerService').modal();
			    	localStorage.setItem("seekerService", new Date());
			    }
			}
        if(role == 'seeker')
      {
		var cvEditing = localStorage.getItem("cvEditing");
	    if(cvEditing == null)
	    {
	    	
	    	$('#cvEditing').modal();
	    	localStorage.setItem("cvEditing", new Date());
	    }
	 }

});
    
</script>