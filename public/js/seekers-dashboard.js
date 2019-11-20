var djobs = [];
var dblogs = [];

function loadMoreFeed(){
	$.ajax({
        type: 'GET',
        url: '/job-seekers/feed',
        data: {
        	jobs: djobs,
        	blogs: dblogs
        },
        success: function(response) {
        	alert('success');
        	console.log(response);
                
        },
        error: function(e) {
        	alert('An error occurred while loading feed');
        },
    });
}
$().ready(function(){
		

	$.ajax({
        type: 'GET',
        url: '/job-seekers/feed',
        data: {
        	initial: true
        },
        success: function(response) {
        	var $feeds ='';

        	for(var i=0; i<response.length; i++)
        	{
        		var feed = response[i];
        		
        		if(feed[0] == 'job')
        		{
        			
        			var job = feed[1];
        			var company = feed[2];
        			var industry = feed[3];
        			var location = feed[4];
        			var country = feed[5];
        			var vacancyType = feed[6];
        			var educationLevel = feed[7];

        			$feeds += ''+
	        		'<div class="col-md-8 col-md-offset-2 row hover-bottom" style="margin-bottom: 0.5em">'+
	        			'<div class="col-md-5 col-xs-5">'+
	        				'<img src="/images/500g.png" style="width: 100%">'+
	        				'<p>'+country.currency+' '+job.monthly_salary+' p.m.</p>'+
	        			'</div>'+
	        			'<div class="col-md-7 col-xs-7" style="text-align: center">'+
	        				'<br class="no-mobile">'+
	        				'<br class="no-mobile">'+
	        				'<h4 style="font-weight: bold">'+job.title+'</h4>'+
	        				'<p>'+
	        					'</strong>'+
	        						'<a href="/companies/'+company.name+'">'+
	        							company.name+
	        						'</a>'+
	        					'</strong>'+
	        					'<br>'+
	        					vacancyType.name+' in '+
	        					location.name + ', '+ country.code +
	        					'<br>'+'<br>'+
	        					
	        					'<a href="/vacancies/'+job.slug+'" class="btn btn-sm btn-primary">view listing</a>'+
	        				'</p>'+
	        			'</div>'+
	        		'</div>';
	        		djobs.push(job.id);
        		}
        		else
        		{
        			var blog = feed[1];
        			var user = feed[2];
        			var category = feed[3];

        			$feeds += ''+
	        		'<div class="col-md-8 col-md-offset-2 hover-bottom">'+
	        			'<div class="col-md-7 col-xs-7">'+
	        				'<br class="no-mobile">'+
	        				'<br class="no-mobile">'+
	        				'<h4>'+blog.title+'</h4>'+
	        				'<p>'+
	        					'</strong>'+ user.name +'</strong><br>'+ 
	        					'<a href="/blog/'+category.slug+'" style="text-decoration: none">'+
	        						category.name +
	        					'</a>'+
	        					'<br>'+
	        				'</p>'+
	        				'<p style="text-align: center">'+
	        					'<a href="/blogs/'+blog.slug+'" class="btn btn-sm btn-success">Read Blog</a>'+
	        				'</p>'+
	        			'</div>'+
	        			'<div class="col-md-5 col-xs-5">'+
	        				'<img src="/images/500g.png" style="width: 100%">'+
	        			'</div>'+

	        			
	        		'</div>';
	        		dblogs.push(blog.id);
        		}
        		
        	}
        	$feeds += '<div class="col-md-8 col-xs-8 col-md-offset-2 col-xs-offset-2" style="text-align: center;" id="load-more-feed"><hr><br><span class="btn btn-danger">LOAD MORE</span><br></div>';
        	$('#loading-feed').remove();
        	$('#feeds').append($feeds);

        	$('#load-more-feed').click(function(){
        		loadMoreFeed();
        	});
        	
                
        },
        error: function(e) {
        	var $p = ''+
        	'<br> Error connecting network <br> <a href="/job-seekers/dashboard" class="">Refresh</a>';
            $('#loading-feed').append($p);
            console.log('Network Error');
        },
    });



});
$(window).scroll(function(){
    if ($(window).scrollTop() == $(document).height()-$(window).height()){
       loadMoreFeed();
    }
});