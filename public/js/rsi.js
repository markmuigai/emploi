$().ready(function(){

	$('#add-skill').click(function(){
		var s = $('#select-skill').val();
		if(s == -1)
			return;
		var added = false;
		$('.ms-skill').each(function(){
			if($(this).attr('skill_id') == s)
				added = true;
		});
		if(!added)
		{
			var t = 'Skill Name';
			for(var i=0; i<skills.length; i++)
			{
				if(skills[i][0] == s)
				{
					t = skills[i][1];
					break;
				}
			}
			var w = $('#skill-weight').val();
			var wn = 'Bonus';
			if(w == 3)
				wn = 'Necessary';
			if(w == 2)
				wn = 'Desired';


			var $s = ''+
			'<div class="col-md-6 ms-skill" skill_id="'+s+'">'+
				'<p><b>'+
					t+'</b> || <i>'+wn+'</i>'+
					'<input type="hidden" name="skill_id[]" value="'+s+'">'+
					'<input type="hidden" name="skill_weight[]" value="'+w+'">'+
					'<span class="pull-right btn btn-sm btn-danger remove-new-skill" skill_id="'+s+'">x</span>'+
				'</p>'+
			'</div>';
			$('.selected-skills').append($s);
			$('.remove-new-skill').click(function(){
			//var s = $(this).attr('skill_id');
			$(this).parent().parent().remove();
		});
		}
	});

	$('.remove-skill').click(function(){
		//var s = $(this).attr('skill_id');
		$(this).parent().parent().remove();
	});
});

rsi = new Vue({
    el: '#rsi-container',
    data: {
    	education: false,
    	experience: false,
    	iq: false,
    	interview: false,
    	personalities: false,
    	skills: false,
    	psychometric: false,
    	company_size: false
    },
    computed: {
    	total(){
    		return parseFloat(this.education) + parseFloat(this.experience) + parseFloat(this.iq) + parseFloat(this.interview) + parseFloat(this.personalities) + parseFloat(this.skills) + parseFloat(this.psychometric) + parseFloat(this.company_size);
    	}
    }
});