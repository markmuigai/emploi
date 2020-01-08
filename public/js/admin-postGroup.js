$().ready(function(){
	var $contents;
	var title = '';
	$('.remove-select-job').click(function(){
		$(this).parent().remove();
		notify('Job Post removed');
	});
	$('#save-selected-post').click(function(){
		var id = $('#select-posts').val();
		var match = false;
		$('.accepted_job').each(function(){
			if($(this).attr('post_id') == id)
				match = true;
		});
		if(!match)
		{
			for(var i=0; i<posts.length; i++)
			{
				if(posts[i][0] == id)
				{
					title = posts[i][1];
					break;
				}

			}
			$contents = ''+
			'<div class="accepted_job col-xs-6 col-md-4" post_id="'+id+'">'+
				title + '<span class="remove-select-job btn btn-sm btn-danger" style="float: right">x</span><input type="hidden" name="post_ids[]" value="'+id+'">'+
			'</div>';
			$('#accepted_jobs').append($contents);

			$('.remove-select-job').click(function(){
				$(this).parent().remove();
				notify('Job Post removed');
			});
		}
	});
});