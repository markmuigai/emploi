$().ready(function() {
    var edu = 1;
    var emp = 1;
    $('.toSection1').click(function() {
        $('.edit-section').addClass('d-none');
        $('#section1').removeClass('d-none');
    });
    $('.toSection2').click(function() {
        var d = $('#date_of_birth').val();
        if (!d)
            return notify('Invalid date of Birth', 'error');
        //return notify(d);
        var a = $('#address').val();
        if (a.length < 2)
            return notify('Invalid address provided', 'error');
        $('.edit-section').addClass('d-none');
        $('#section2').removeClass('d-none');
    });
    $('.toSection3').click(function() {
        if (!checkEducation())
            return notify('Errors are present in education records', 'error');
        $('.edit-section').addClass('d-none');
        $('#section3').removeClass('d-none');
    });

    function addEducation() {
        var $edu = '' +
            '<div class="form-row mb-3 align-items-center education_field" education_id="' + edu + '">' +
            '<div class="col-md-4">' +
            '<input type="text" class="form-control edu_field" placeholder="Institution name" name="institution_name[]">' +
            '</div>' +
            '<div class="col-md-4">' +
            '<input type="text" class="form-control edu_field" placeholder="Course Pursued" name="course_name[]">' +
            '</div>' +
            '<div class="col-md-3">' +
            '<select class="form-control edu_field" name="course_duration[]">';
        var lv = ['1 month or less', '3 months', '6 months', '1 year', '2 years', '3 years', '4 years', '5 years', '6 years'];
        for (var i = 0; i < lv.length; i++) {
            $edu += '<option value="' + lv[i] + '">' + lv[i] + '</option>';
        }
        $edu += '</select>' +
            '</div>' +
            '<span class="text-danger removeEducation">Remove</span>' +
            '</div>';
        $('#education_records').append($edu);
        edu++;
        $('.removeEducation').click(function() {
            var id = $(this).parent().attr('education_id');
            removeEducation(id);
        });
    }

    function addEmployment() {
        var $emp = '' +
            '<div class="experience_field" experience_id="' + emp + '">' + '<div class="row">' + '<div class="col-md-6 form-group">' + '<input type="text" class="form-control emp_field" value="" placeholder="Organization name" name="organization_name[]">' + '</div>' + '<div class="col-md-6 form-group">' + '<input type="text" class="form-control emp_field" value="" placeholder="Job Title" name="job_title[]">' + '</div>' + '<div class="col-md-6 form-group">' + '<input type="date" class="form-control emp_field" value="" name="job_start[]" placeholder="e.g January 2018">' + '</div>' + '<div class="col-md-6 form-group">' + '<input type="date" class="form-control emp_field" value="" name="job_end[]" placeholder="e.g April 2018 or current">' + '</div>' + '<div class="col-md-12 form-group">' + '<textarea class="form-control emp_field" name="responsibilities[]" rows="5" placeholder="Duties and Responsibilities"></textarea>' + '</div>' + '</div>' + '<span class="btn btn-sm btn-danger removeExperience pull right">Remove</span>' + '</div>';

        $('#employment_records').append($emp);
        emp++;
        $('.removeEmployment').click(function() {
            var id = $(this).parent().attr('experience_id');
            removeEmployment(id);
        });
    }

    function removeEmployment(ref) {
        $('.experience_field').each(function() {
            if ($(this).attr('experience_id') == ref)
                $(this).remove();
        });
    }

    $('.updateProfile').click(function() {
        if (!checkEmployment())
            return notify('Errors are present in employment records', 'error');
        $('#update-form').submit();
    });


    $('.removeEducation').click(function() {
        var id = $(this).parent().attr('education_id');
        removeEducation(id);
    });

    $('.removeExperience').click(function() {
        var id = $(this).parent().attr('experience_id');
        removeEmployment(id);
    });

    function removeEducation(ref) {
        $('.education_field').each(function() {
            if ($(this).attr('education_id') == ref)
                $(this).remove();
        });
    }

    function checkEducation() {
        var br = true;
        $('.edu_field').each(function() {
            var t = $(this).val();
            if (t.length < 1) {
                br = false;
            }
        });
        return br;
    }

    function checkEmployment() {
        var br = true;
        $('.emp_field').each(function() {
            var t = $(this).val();
            if (t.length < 1) {
                br = false;
            }
        });
        return br;
    }


    $('#add_education').click(function() {
        if (!checkEducation())
            return notify('Errors are present in education records', 'error');
        addEducation();
    });

    $('#add_employment').click(function() {
        if (!checkEmployment())
            return notify('Errors are present in employment records', 'error');
        addEmployment();
    });

    $('#add-new-skill').click(function() {
        var skill_id = $('#skill-select').val();
        if (skill_id == -1)
            return;
        var added = false;
        $('.user-skill').each(function() {
            if ($(this).attr('skill_id') == skill_id)
                added = true;
        });
        if (!added) {
            var name = 'Skill Name';
            for (var i = 0; i < allSkills.length; i++) {
                if (allSkills[i][0] == skill_id) {
                    name = allSkills[i][1];
                    break;
                }
            }
            var $skill = '' +
                '<div class="col-lg-4 col-md-6 user-skill" skill_id="' + skill_id + '">' +
                '<strong>' + name + '</strong>' +
                '<input type="hidden" name="skills[]" value="' + skill_id + '">' +
                '<span class="text-danger pull-right remove-new-skill" skill_id="' + skill_id + '"><i class="fas fa-times"></i></span>' +
                '</div>';
            $('#skills-pool').append($skill);
            $('.remove-new-skill').click(function() {
                $(this).parent().remove();
            });
        }
    });

    $('.remove-skill').click(function() {
        var skill_id = $(this).attr('skill_id');
        $('#skills-pool').children().each(function() {
            if ($(this).attr('skill_id') == skill_id)
                $(this).remove();
        });
    });
});