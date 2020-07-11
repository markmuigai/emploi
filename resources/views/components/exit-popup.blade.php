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
<div id="seekerRegisterModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
		    <!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header" style="background-color: #500095; color: white">
					
					<h4 class="modal-title">
						Get Your Dream Job Today
					</h4>
					
				</div>
				 <button type="button" style="background-color: #FF5733" class="close" data-dismiss="modal" aria-label="Close" id="closeSeekerRegisterModal">
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
					<a href="{{ url('/job-seekers/cv-editing') }}" class="btn btn-sm btn-orange-alt">CV Editing</a>
					<a href="{{ url('/employers/register') }}" class="btn btn-sm btn-orange-alt">Company Registration</a>
				</div>
			</div>
	    </div>
	</div>
</div>

<div id="seekerPackages" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
		    <!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header" style="background-color: #500095; color: white">
					
					<h4 class="modal-title" style="text-align: center">
						Get the Most out of Emploi
					</h4>
			
				</div>
				 <button type="button" style="background-color: #FF5733" class="close" data-dismiss="modal" aria-label="Close" id="closeSeekerPackages">
	                <i class="fas fa-times" aria-hidden="true"></i>
	              </button>
				<div class="modal-body">
					<div class="card-deck">
	                    <div class="card">
	                        <div class="card-body">
	                            <h5 class="card-title">Pro</h5>
	                            <p class="card-text">
                                	<ul class="tick">
                                		<li>Get notifications when an employer shortlists you or when your profile is viewed by a shortlisting recruiter</li>
                                	</ul>    
	                            </p>
	                        </div>
	                        <div class="card-footer">
	                            <a href="/checkout?product=pro" class="btn btn-orange">Get - Ksh 49 p.m.</a>
	                        </div>
	                    </div>
	                    <div class="card">
	                        <div class="card-body">
	                            <h5 class="card-title">Spotlight</h5>
	                            <p class="card-text">
	                            		<ul class="tick">            
									    <li>Have your profile rank first in applications and searches.</li>
										<li>Get real-time analytics.</li>
										<li>Get notifications when an employer shortlists you or when your profile is viewed.</li>
									</ul>
	                            </p>
	                        </div>
	                        <div class="card-footer">
	                            <small class="text-muted">
	                                <a href="/checkout?product=spotlight" class="btn btn-orange">Get - Ksh 159 p.m.</a>
	                            </small>
	                        </div>
	                    </div>

	                </div>
	                <div style="text-align: center;">
	                	<br>
	                	<a href="{{ url('/job-seekers/cv-editing') }}" class="btn btn-sm btn-orange-alt">Get Professional CV Editing</span></a> OR  <a class="btn btn-orange-alt" href="/job-seekers/free-cv-review">Free CV Review</a>
	                </div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="seekerServices" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
		    <!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header" style="background-color: #500095; color: white">
					
					<h4 class="modal-title" style="text-align: center">
						Get the Most out of Emploi
					</h4>
			
				</div>
				 <button type="button" style="background-color: #FF5733" class="close" data-dismiss="modal" aria-label="Close" id="closeSeekerServices">
	                <i class="fas fa-times" aria-hidden="true"></i>
	              </button>
				<div class="modal-body">
					<div class="card-deck">
	                    <div class="card">
	                        <div class="card-body">
	                            <h5 class="card-title">Pro</h5>
	                            <p class="card-text">
	                            	<li>Get notifications when an employer shortlists you or when your profile is viewed by a shortlisting recruiter</li>
	                            </p>
	                        </div>
	                        <div class="card-footer">
	                            <a href="/checkout?product=pro" target="_blank" class="btn btn-orange-alt">Get - Ksh 49 p.m.</a>
	                        </div>
	                    </div>
	                    <div class="card">
	                        <div class="card-body">
	                            <h5 class="card-title">Spotlight</h5>
	                            <p class="card-text">
	                            	<ul class="tick">            
										<li>Have your profile rank first in applications and searches.</li>
										<li>Get real-time analytics.</li>
										<li>Get notifications when an employer shortlists you or when your profile is viewed.</li>
									</ul>
	                            </p>
	                        </div>
	                        <div class="card-footer">
	                            <small class="text-muted">
	                                <a href="/checkout?product=spotlight" target="_blank" class="btn btn-orange-alt">Get - Ksh 159 p.m.</a>
	                            </small>
	                        </div>
	                    </div>

	                </div>
	                <div style="text-align: center;">
	                	<br>
	                	<a href="{{ url('/job-seekers/cv-editing') }}" target="_blank" >Get Professional CV Editing at <span class="blink_text">50% Discount</span></a>
	                </div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="employerServices" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
		    <!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header" style="background-color: #fff; color: #000">
					
					<h4 class="modal-title" style="text-align: center">
						Get a <span class="blink_text">20% Discount</span> on advertising
					</h4>
			
				</div>
				 <button type="button" style="background-color: #FF5733" class="close" data-dismiss="modal" aria-label="Close" id="closeEmployerServices">
	                <i class="fas fa-times" aria-hidden="true"></i>
	              </button>
				<div class="modal-body">
					<div class="card-deck">
	                    <div class="card">
	                        <div class="card-body">
	                            <p class="card-text">Your advertisement will be viewed by tens of thousands through our website and social media platforms.</p>
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

<div id="seekerService" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
		    <!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header" style="background-color: #500095; color: white">
					
					<h4 class="modal-title" style="text-align: center">
						Get the Most out of Emploi
					</h4>
			
				</div>
				 <button type="button" style="background-color: #FF5733" class="close" data-dismiss="modal" aria-label="Close" id="closeSeekerService">
	                <i class="fas fa-times" aria-hidden="true"></i>
	              </button>
				<div class="modal-body">
					<div class="card-deck">
	                    <div class="card">
	                        <div class="card-body">
	                            <h5 class="card-title">Pro</h5>
	                            <p class="card-text">
	                            <ul class="tick"> 
	                            	<li>Get notifications when an employer shortlists you or when your profile is viewed by a shortlisting recruiter</li>
	                            </ul>
	                            </p>
	                        </div>
	                        <div class="card-footer">
	                            <a href="/checkout?product=pro" target="_blank" class="btn btn-orange-alt">Get - Ksh 49 p.m.</a>
	                        </div>
	                    </div>
	                    <div class="card">
	                        <div class="card-body">
	                            <h5 class="card-title">Spotlight</h5>
	                            <p class="card-text">
									<ul class="tick">            
										<li>Have your profile rank first in applications and searches.</li>
										<li>Get real-time analytics.</li>
										<li>Get notifications when an employer shortlists you or when your profile is viewed.</li>
									</ul> 
	                            </p>
	                        </div>
	                        <div class="card-footer">
	                            <small class="text-muted">
	                                <a href="/checkout?product=spotlight" target="_blank" class="btn btn-orange-alt">Get - Ksh 159 p.m.</a>
	                            </small>
	                        </div>
	                    </div>

	                </div>
	                <div style="text-align: center;">
	                	<br>
	                	<a href="{{ url('/job-seekers/cv-editing') }}" target="_blank">Get Professional CV Editing at <span class="blink_text">50% Discount</span></a>
	                </div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="cvEditing" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header" style="background-color: #500095; color: white">
					
					<h4 class="modal-title">
						CV EDITING OFFER!
					</h4>
				  <!--   <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">x</button>	 -->
				</div>
				 <button type="button" style="background-color: #FF5733" class="close" data-dismiss="modal" aria-label="Close" id="cvEditing">
	                <i class="fas fa-times" aria-hidden="true"></i>
	              </button>

				<div class="modal-body">
					<div class="card-deck">
	                    <div class="card">	                    	
	                        <div class="card-body">	                        	
	                            <p class="card-text">
	                             <p>Have you updated your CV? How good is it?</p>	
	                             <h6>At Emploi we give you a <span class="blink_text">50% Discount</span> on CV Editing Services.</h6>
	                             <a href="{{ url('/job-seekers/cv-editing') }}" target="_blank" class="btn btn-orange">Request Now</a>
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
    		if(Auth::user()->seeker->canGetNotifications())
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