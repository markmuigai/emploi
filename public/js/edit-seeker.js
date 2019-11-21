$().ready(function(){
    var edu = 1;
    var emp = 1;
    $('.toSection1').click(function(){
        $('.edit-section').addClass('d-none');
        $('#section1').removeClass('d-none');
    });
    $('.toSection2').click(function(){
        var d = $('#date_of_birth').val();
        if(!d)
            return alert('Invalid date of Birth');
        //return alert(d);
        var a = $('#address').val();
        if(a.length < 2)
            return alert('Invalid address provided');
        $('.edit-section').addClass('d-none');
        $('#section2').removeClass('d-none');
    });
    $('.toSection3').click(function(){
        if(!checkEducation())
            return alert('Errors are present in education records');
        $('.edit-section').addClass('d-none');
        $('#section3').removeClass('d-none');
    });

    function addEducation(){
        var $edu = ''+
        '<div class="col-md-6 education_field" style="margin-bottom: 1em" education_id="'+edu+'">'+
            '<input type="text" class="form-control edu_field" placeholder="Institution name" name="institution_name[]">'+
            '<input type="text" class="form-control edu_field" placeholder="Course Pursued" name="course_name[]">'+
            '<select class="form-control edu_field" name="course_duration[]">';
        var lv = ['1 month or less','3 months','6 months','1 year','2 years','3 years','4 years', '5 years', '6 years'];
        for(var i=0; i<lv.length; i++)
        {
            $edu += '<option value="'+lv[i]+'">'+lv[i]+'</option>';
        }
        $edu +=  '</select>'+
            '<span class="btn btn-sm btn-danger removeEducation">X</span>'+
        '</div>';
        $('#education_records').prepend($edu);
        edu++;
        $('.removeEducation').click(function(){
            var id = $(this).parent().attr('education_id');
            removeEducation(id);
        });
    }

    function addEmployment(){
        var $emp = ''+
        '<div class="row experience_field" style="margin-bottom: 1em" experience_id="'+emp+'">'+
            '<div class="col-md-6">'+
                '<input type="text" class="form-control emp_field" placeholder="Organization name" name="organization_name[]">'+
                '<input type="text" class="form-control emp_field" placeholder="Job Title" name="job_title[]">'+
                '<input type="date" class="form-control emp_field" name="job_start[]" placeholder="e.g January 2018">'+
                '<input type="date" class="form-control emp_field" name="job_end[]" placeholder="e.g April 2018 or current">'+
                '<span class="btn btn-sm btn-danger removeExperience">X</span>'+
            '</div>'+
            '<div class="col-md-6">'+
                '<textarea class="form-control emp_field" name="responsibilities[]" rows="5" placeholder="Duties and Responsibilities"></textarea>'+
            '</div>'+
        '</div>';
        
        $('#employment_records').prepend($emp);
        emp++;
        $('.removeEmployment').click(function(){
            var id = $(this).parent().attr('experience_id');
            removeEmployment(id);
        });
    }

    function removeEmployment(ref){
        $('.experience_field').each(function(){
            if($(this).attr('experience_id') == ref)
                $(this).remove();
        });
    }

    $('.updateProfile').click(function(){
        if(!checkEmployment())
            return alert('Errors are present in employment records');
        $('#update-form').submit();
    });
    

    $('.removeEducation').click(function(){
        var id = $(this).parent().attr('education_id');
        removeEducation(id);
    });

    $('.removeExperience').click(function(){
        var id = $(this).parent().parent().attr('experience_id');
        removeEmployment(id);
    });

    function removeEducation(ref){
        $('.education_field').each(function(){
            if($(this).attr('education_id') == ref)
                $(this).remove();
        });
    }

    function checkEducation(){
        var br = true;
        $('.edu_field').each(function(){
            var t = $(this).val();
            if(t.length < 1)
            {
                br = false;
            }
        });
        return br;
    }

    function checkEmployment(){
        var br = true;
        $('.emp_field').each(function(){
            var t = $(this).val();
            if(t.length < 1)
            {
                br = false;
            }
        });
        return br;
    }


    $('#add_education').click(function(){
        if(!checkEducation())
            return alert('Errors are present in education records');
        addEducation();
    });

    $('#add_employment').click(function(){
        if(!checkEmployment())
            return alert('Errors are present in employment records');
        addEmployment();
    });

    $('#add-new-skill').click(function(){
        var skill_id = $('#skill-select').val();
        if(skill_id == -1)
            return;
        var added = false;
        $('.user-skill').each(function(){
            if($(this).attr('skill_id') == skill_id)
                added = true;
        });
        if(!added)
        {
            var name = 'Skill Name';
            for(var i=0; i<allSkills.length; i++)
            {
                if(allSkills[i][0] == skill_id)
                {
                    name = allSkills[i][1];
                    break;
                }
            }
            var $skill = ''+
            '<div class="col-md-6 user-skill" skill_id="'+skill_id+'">'+
                '</strong>'+name+'</strong>'+
                '<input type="hidden" name="skills[]" value="'+skill_id+'">'+
                '<span class="btn btn-sm btn-danger pull-right remove-new-skill" skill_id="'+skill_id+'">x</span>'+
            '</div>';
            $('#skills-pool').append($skill);
            $('.remove-new-skill').click(function(){
                $(this).parent().remove();
            });
        }
    });

    $('.remove-skill').click(function(){
        var skill_id = $(this).attr('skill_id');
        $('#skills-pool').children().each(function(){
            if($(this).attr('skill_id') == skill_id)
                $(this).remove();
        });
    });
});