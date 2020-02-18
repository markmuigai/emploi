
<script type="text/javascript">
    var exit_trials = 0;
    var role = 'guest';
    <?php 
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
    document.body.addEventListener('mouseout', function(e) {
        if (!e.relatedTarget && !e.toElement) {
            if(exit_trials == 0)
            {
            	
            }
            exit_trials++;
        }
    });
</script>