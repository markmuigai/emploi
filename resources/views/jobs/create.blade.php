@extends('layouts.dashboard-layout')

@section('title','Emploi :: Create Job Post')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Create Job Post')

<form method="post" action="/vacancies" enctype="multipart/form-data" id="create-post-form">
    @csrf

    <div id="section1" class="section-view ">
        <div class="card">
            <div class="card-body p-5">
                @error('image')
                    <script type="text/javascript">
                        $().ready(function(){
                            setTimeout(function(){
                                $('.toSection3').trigger('click');
                            },2000);
                        });
                    </script>
                    <p class="text-danger">Errors were detected</div>
                @enderror
                <h3>Step 1 of 3</h3>
                <div class="form-group">
                  <div class="d-flex justify-content-between align-items-center pb-2">
                    <label>Company *</label>
                    <a href="/companies/create" class="btn btn-sm btn-primary">Create New</a>
                  </div>
                    <select name="company" class="form-control">
                        @foreach($companies as $i)
                        <option value="{{ $i->id }}">{{ $i->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Job Title *</label>
                    <input type="text" name="title" id="job-title" class="form-control" value="{{ old('title') }}">
                </div>

                <div class="form-group">
                    <label>Job Industry *</label>
                    <select name="industry" class="form-control" id="industry">
                        @foreach($industries as $i)
                        <option value="{{ $i->id }}">{{ $i->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <label>Required Skills</label>
                        <div class="row selected-skills">
                            
                        </div>
                    </div>
                    <div class="col-md-12 row">
                        
                        <div class="col-md-7">
                            <select class="form-control" id="skill-select">
                                <option value="-1">Select Skill</option>
                                @forelse($skills as $s)
                                    @if($industries[0]->id == $s->industry_id )
                                        <option value="{{ $s->id }}">{{ $s->name }}</option>
                                    @endif
                                @empty
                                @endforelse
                            </select>  
                        </div>
                        <div class="col-md-3 col-12">
                            <select id="skill-weight" class="custom-select">
                                <option value="3">Necessary</option>
                                <option value="2">Desired</option>
                                <option value="1">Bonus</option>
                            </select>
                        </div>
                        <div class="col-md-2 text-center">
                            <span class="btn btn-sm btn-purple" id="add-skill">Add</span>
                        </div>
                        
                    </div>

                    
                    <div class="col-md-12">
                        <label>Other Skills</label>
                        <div class="row other-skills-pool mb-3">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <input type="text" name="" id="other-skill-name" class="form-control" placeholder="Enter Skill Name">
                    </div>
                    <div class="col-md-3">
                        <select class="custom-select" id="other-skill-weight">
                            <option value="3">Very Important</option>
                            <option value="2">Important</option>
                            <option value="1">Bonus</option>
                        </select>
                    </div>
                    <div class="col-md-2 text-right mt-md-auto mt-3">
                        <span id="add-other-skill" class="btn btn-success btn-sm">Add</span>
                    </div>
                </div>

                

                <div class="form-group">
                    <label>Vacancy Type *</label>
                    <select name="vacancyType" class="form-control">
                        @foreach($vacancyTypes as $i)
                        <option value="{{ $i->id }}">{{ $i->name }}</option>
                        @endforeach
                    </select>
                </div>

                <a href="#" class="btn btn-sm btn-orange pull-right toSection2">Next ></a>
            </div>
        </div>
    </div>
    <div id="section2" class="section-view d-none">
        <div class="card">
            <div class="card-body p-5">
                <h3>Step 2 of 3</h3>
                <div class="form-group">
                    <label>Job Description *</label>
                    <textarea class="form-control" id="responsibilities" name="responsibilities" rows="5">{{ old('responsibilities') }}</textarea>
                </div>

                <div class="form-group">
                    <label>Education *</label>
                    <select name="education" class="form-control">
                        @foreach($educationLevels as $i)
                        <option value="{{ $i->id }}">{{ $i->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Experience *</label>
                    <select name="experience" class="form-control">
                        <option value="0">No Experience Required</option>
                        <option value="6">6 month Experience</option>
                        <option value="12">1 year Experience</option>
                        <option value="24">2 years Experience</option>
                        <option value="36">3 years Experience</option>
                        <option value="48">4 years Experience</option>
                        <option value="60">5 years Experience</option>
                        <option value="72">6 years Experience</option>
                        <option value="84">7 years Experience</option>
                        <option value="96">8 years Experience</option>
                        <option value="108">9 years Experience</option>
                        <option value="120">10 years Experience</option>
                        <option value="180">15 years Experience</option>
                        <option value="240">20 years Experience</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Number of Positions Available*</label>
                    <select name="positions" class="form-control">
                        @for($i=1; $i<100;$i++ ) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </div>
                <div class="d-flex justify-content-between">
                  <a href="#" class="btn btn-sm btn-purple toSection1">< Previous</a>
                  <a href="#" class="btn btn-sm btn-orange pull-right toSection3">Next ></a>
                </div>
            </div>
        </div>
    </div>

    <div id="section3" class="section-view d-none">
        <div class="card">
            <div class="card-body p-5">
                <h3>Step 3 of 3</h3>


                <div class="form-group">
                    <label>Job Location:</label>
                    <select name="location" class="form-control">
                        @foreach($locations as $i)
                        <option value="{{ $i->id }}">[{{ $i->country->name }}] {{ $i->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Monthly Salary *</label>
                    <input type="number" name="monthly_salary" class="form-control" required="" placeholder="enter 0 for non-disclosure or minimum salary" id="monthly_salary" min="0" value="{{ old('monthly_salary') }}">
                </div>

                <div class="form-group">
                    <label>Maximum Salary Limit</label>
                    <input type="number" name="max_salary" class="form-control" placeholder="only fill if salary has a range" id="max_salary" min="1" value="{{ old('max_salary') }}">
                </div>

                <div class="form-group">
                    <label>How to apply: <i>Optional if you want to direct applications elsewhere.</i></label>
                    <textarea class="form-control" name="how_to_apply" rows="5" placeholder="Optionally, you can specify additional description to applicants">{{ old('how_to_apply') }}</textarea>
                </div>

                <div class="form-group">
                    <label>
                        Optional Photo
                        (png, jpg and jpeg Max 5MB)
                        @error('image')
                            <strong class="text-danger"> * Uploaded image was invalid *</strong>
                        @enderror
                    </label>
                    <input type="file" name="image" placeholder="" accept=".jpg, .png,.jpeg">
                </div>

                <a href="#" class="btn btn-sm btn-purple toSection2">Previous</a>
                    <a class="btn btn-orange pull-right" id="save-job-post" href="#">Save Job Post</a>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    <?php
    $sk = '';
    foreach($skills as $s) {
        $sk .= "[".$s->id.", '".$s->name."', ".$s->industry_id."],";
    }
    $sk = '['.$sk.']';
    echo 'var allSkills='.$sk.
    ';';
    ?>
    $().ready(function(){
        $('#industry').change(function(){
            var new_ing = $(this).val();
            
            var $skills = '';
            for(var k=0; k<allSkills.length;k++)
            {
                if(allSkills[k][2] == new_ing)
                {
                    $skills +=  '<option value="'+allSkills[k][0]+'">'+allSkills[k][1]+'</option>';

                }
            }
            $('#skill-select').children().remove();
            $('#skill-select').append($skills);
            notify('Industry updated','info');
          
        });
        $('#add-skill').click(function() {
            var s = $('#skill-select').val();
            if (s == -1)
                return;
            var added = false;

            $('.ms-skill').each(function() {
                if ($(this).attr('skill_id') == s)
                    added = true;

            });
            if (!added) {
                var t = 'Skill Name';
                for (var i = 0; i < allSkills.length; i++) {
                    if (allSkills[i][0] == s) {
                        t = allSkills[i][1];
                        break;
                    }
                }
                var w = $('#skill-weight').val();
                var wn = 'Bonus';
                var top5SkillsCounter = 0;
                $('.skill-weight').each(function() {
                    if ($(this).val() == 3)
                        top5SkillsCounter++;
                });
                if (top5SkillsCounter > 4 && w == 3)
                    w = 2;
                if (w == 3)
                    wn = 'Necessary';
                if (w == 2)
                    wn = 'Desired';


                var $s = '' +
                    '<div class="col-md-6 ms-skill" skill_id="' + s + '">' +
                    '<p class="d-flex justify-content-between"><span><strong>' +
                    t + '</strong> || ' + wn +
                    '<input type="hidden" name="skill_id[]" value="' + s + '">' +
                    '<input type="hidden"  class="skill-weight" name="skill_weight[]" value="' + w + '"></span>' +
                    '<span class="pull-right text-danger remove-new-skill" skill_id="' + s + '"><i class="fas fa-times"></i></span>' +
                    '</p>' +
                    '</div>';
                $('.selected-skills').append($s);
                $('.remove-new-skill').click(function() {
                    //var s = $(this).attr('skill_id');
                    $(this).parent().parent().remove();
                });
            }
            else
            {
                $('#add-skill').notify("Skill already added");
            }
        });
        $('#add-other-skill').click(function() {
            var name = $('#other-skill-name').val();
            if (name.length < 3)
                return;
            var weight = $('#other-skill-weight').val();
            addOtherSkill(name, weight);
        });

        function addOtherSkill(name, weight) {
            var added = false;
            $('.other-skill').each(function() {
                if ($(this).attr('skill_name') == name)
                    added = true;
            });
            if (added)
                return;


            var weightName = 'Bonus';
            if (weight == 2)
                weightName = 'Important';
            if (weight == 3)
                weightName = 'Very Important';
            $o = '' +
                '<div class="col-md-4 col-6 other-skill d-flex justify-content-between" skill_name="' + name + '">' +
                '<p><input type="hidden" name="other_skill_name[]" class="other-skill" value="' + name + '">' +
                '<input type="hidden" name="other_skill_weight[]" value="' + weight + '">' +
                name + ' || ' + weightName +
                '</p><span class="text-danger pull-right remove-other-skill"><i class="fas fa-times"></i></span>' +
                '</div>';
            $('.other-skills-pool').append($o);
            $('.remove-other-skill').click(function() {
                $(this).parent().remove();
            });
            $('#other-skill-name').val('');
        }

        $('.remove-skill').click(function() {
            //var s = $(this).attr('skill_id');
            $(this).parent().parent().remove();
        });

        $('.remove-other-skill').click(function() {
            $(this).parent().remove();
        });
    });
</script>


<script type="text/javascript">
    $().ready(function() {
        $('.toSection1').click(function() {
            $('.section-view').addClass('d-none');
            $('#section1').removeClass('d-none');
        });
        $('.toSection2').click(function() {
            var title = $('#job-title').val();
            if (title.length < 5)
                return notify('Job Title too short', 'error');
            $('.section-view').addClass('d-none');
            $('#section2').removeClass('d-none');
        });
        $('.toSection3').click(function() {
            var desc = CKEDITOR.instances['responsibilities'].getData().replace(/<[^>]*>/gi, '').length;
            if(desc < 10)
                return notify('Invalid Job Description provided', 'error');
            $('.section-view').addClass('d-none');
            $('#section3').removeClass('d-none');
        });
    });
</script>

<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    setTimeout(function() {
        CKEDITOR.replace('responsibilities');
        CKEDITOR.replace('how_to_apply');

    }, 3000);
</script>

<script type="text/javascript">
    $().ready(function(){
        $('#save-job-post').click(function(){
            var salary = $('#monthly_salary').val();
            var max_salary = $('#max_salary').val();
            if(!salary)
                return notify('Invalid Monthly Salary', 'error');
            //return notify(salary + ' ' + max_salary);
            // if(salary != 0)
            // {
            //     //notify('Defining salary');
            //     console.log(max_salary);
            //     if(max_salary != '')
            //     {
            //         if(max_salary <= salary)
            //             return notify('Maximum salary must be greater than minimum salary', 'error');
            //     }
            // }
            // return notify(salary + ' ' + max_salary);
            $('#create-post-form').submit();
        });
    });
</script>


@endsection
