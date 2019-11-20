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
			var top5SkillsCounter = 0;
			$('.skill-weight').each(function(){
				if($(this).val() == 3)
					top5SkillsCounter++;
			});
			if(top5SkillsCounter > 4 && w ==3)
				w = 2;
			if(w == 3)
				wn = 'Necessary';
			if(w == 2)
				wn = 'Desired';


			var $s = ''+
			'<div class="col-md-6 ms-skill" skill_id="'+s+'">'+
				'<p></strong>'+
					t+'</strong> || <i>'+wn+'</i>'+
					'<input type="hidden" name="skill_id[]" value="'+s+'">'+
					'<input type="hidden"  class="skill-weight" name="skill_weight[]" value="'+w+'">'+
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

	$('#add-trait').click(function(){
		var s = $('#select-trait').val();
		if(s == -1)
			return;
		var added = false;
		
		$('.ms-trait').each(function(){
			if($(this).attr('trait_id') == s)
				added = true;

		});
		if(!added)
		{
			var t = 'Trait Name';
			for(var i=0; i<allTraits.length; i++)
			{
				if(allTraits[i][0] == s)
				{
					t = allTraits[i][1];
					break;
				}
			}
			var w = $('#trait-weight').val();
			var wn = 'Bonus';
			if(w == 3)
				wn = 'Very Important';
			if(w == 2)
				wn = 'Important';


			var $trait = ''+
			'<div class="col-md-6 ms-trait" trait_id="'+s+'">'+
				'<p></strong>'+
					t+'</strong> || <i>'+wn+'</i>'+
					'<input type="hidden" name="trait_id[]" value="'+s+'">'+
					'<input type="hidden"  class="trait-weight" name="trait_weight[]" value="'+w+'">'+
					'<span class="pull-right btn btn-sm btn-danger remove-new-trait" trait_id="'+s+'">x</span>'+
				'</p>'+
			'</div>';
			$('.selected-traits').append($trait);
			$('.remove-new-trait').click(function(){
				$(this).parent().parent().remove();
			});
		}
	});

	$('.remove-trait').click(function(){
		//var s = $(this).attr('skill_id');
		$(this).parent().parent().remove();
	});

	$('#add-other-skill').click(function(){
		var name = $('#other-skill-name').val();
		if(name.length < 3)
			return;
		var weight = $('#other-skill-weight').val();
		addOtherSkill(name,weight);
		
		
	});

	$('.remove-course').click(function(){
		$(this).parent().remove();
	});

	$('#course-add').click(function(){
		var id = $('#course-select').val();
		var added = false;
		$('.listed-course').each(function(){
			if($(this).val() == id)
				added = true;
		});
		if(added)
			return;

		$.ajax({
	        type: 'GET',
	        url: '/courses/'+id,
	        success: function(response) {

	        	var name = response.name;

	        	if(response.education_level_id == 3)
	        		name = 'Certificate in ' + name;

	        	if(response.education_level_id == 4)
	        		name = 'Diploma in ' + name;


	        	var $c = ''+
	        	'<div class="col-md-4 col-xs-6 hover-bottom">'+
					name +
					'<input type="hidden" name="modelSeekerCourses[]" class="listed-course" value="'+response.id+'">'+
					'<span class="pull-right btn btn-sm btn-danger remove-course">x</span>'+
				'</div>';

				$('.accepted-courses').append($c);

				$('.remove-course').click(function(){
					$(this).parent().remove();
				});

	        		                
	        },
	        error: function(e) {
	            
	            alert('Failed to add course');
	        },
	    });

	});

	function addOtherSkill(name,weight){
		var added = false;
		$('.other-skill').each(function(){
			if($(this).attr('skill_name') == name)
				added = true;
		});
		if(added)
			return;
		
		
		var weightName = 'Bonus';
		if(weight == 2)
			weightName = 'Important';
		if(weight == 3)
			weightName = 'Very Important';
		$o = ''+
		'<div class="col-md-4 col-xs-6 hover-bottom other-skill" skill_name="'+name+'">'+
			'<input type="hidden" name="other_skill_name[]" class="other-skill" value="'+name+'">'+
			'<input type="hidden" name="other_skill_weight[]" value="'+weight+'">'+
			name +' || <i>'+weightName+'</i>'+
			'<span style="border-radius: 50%" class="btn btn-sm btn-danger pull-right remove-other-skill">x</span>'+
		'</div>';
		$('.other-skills-pool').append($o);
		$('.remove-other-skill').click(function(){
			$(this).parent().remove();
		});
		$('#other-skill-name').val('');
	}

	$('.remove-other-skill').click(function(){
		$(this).parent().remove();
	});

	if(other_skills.length > 0)
	{
		for(var i=0; i<other_skills.length; i++)
		{
			addOtherSkill(other_skills[i],other_skills_weight[i]);
		}
	}
});
