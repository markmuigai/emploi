@extends('layouts.dashboard-layout')

@section('title',$referee->seeker->user->name.' Assessment')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', $referee->seeker->user->name.' Assessment')

<form method="POST" action="/referees/{{ $referee->slug }}/save">
    @csrf
    <p>
        <strong>{{ $referee->seeker->public_name }}</strong> has invited you to provide an honest assessment while they worked as <strong>{{ $referee->seekerJobs[0]->job_title }}</strong> at <strong>{{ $referee->organization }}</strong>.
    </p>
    <p class="text-center">This form takes an average of five (5) minutes to complete.</p>

    <div class="section1">
        <div class="card">
            <div class="card-body p-5">
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Your Position at {{ $referee->organization }}  <b style="color: red" title="Required">*</b></label> <input type="text" required="" placeholder="e.g. direct-supervisor, lecturer, colleague" name="position" class="form-control input-sm" maxlength="50"
                              value="{{ $referee->position_held }}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Relationship with {{ $referee->seeker->public_name }}  <b style="color: red" title="Required">*</b></label>
                            <input type="text" required="" placeholder="e.g. direct-supervisor, lecturer, colleague" name="relationship" class="form-control input-sm" maxlength="50"
                              value="{{ $referee->relationship }}" />
                        </div>
                    </div>
                </div>

                <hr>

                <div id="seeker-jobs">
                    <?php $k=1; ?>
                    @forelse($referee->seekerJobs as $rs)
                    <div class="seeker-job">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fullName">Job Title {{ count($referee->seekerJobs) > 1 ? $k : '' }}  <b style="color: red" title="Required">*</b></label>
                                    <input type="text" required="" name="job_title[]" class="form-control input-sm" maxlength="50" value="{{ $rs->job_title }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fullName">Ability to meet Targets  <b style="color: red" title="Required">*</b></label>
                                    <select required="" name="targets[]" class="form-control">
                                        <option value="100">Excellent</option>
                                        <option value="80">Above Average</option>
                                        <option value="50" selected="">Average</option>
                                        <option value="30">Below Average</option>
                                        <option value="0">Poor</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 form-group"> 
                                <label for="fullName">Start Date</label>
                                <input type="date" required="" name="start_date[]" class="form-control input-sm" maxlength="50" value="{{ $rs->start_date }}" />
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="fullName">End Date</label>

                                <input type="date" required="" name="end_date[]" class="form-control input-sm" maxlength="50" value="{{ $rs->end_date }}" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 form-group"> 
                                <label for="">Performance  <b style="color: red" title="Required">*</b></label>
                                <select required="" name="performance[]" class="form-control">
                                    <option value="100">Excellent</option>
                                    <option value="80">Above Average</option>
                                    <option value="50" selected="">Average</option>
                                    <option value="30">Below Average</option>
                                    <option value="0">Poor</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group"> 
                                <label for="">Work Quality  <b style="color: red" title="Required">*</b></label>
                                <select required="" name="work_quality[]" class="form-control">
                                    <option value="100">Excellent</option>
                                    <option value="80">Above Average</option>
                                    <option value="50" selected="">Average</option>
                                    <option value="30">Below Average</option>
                                    <option value="0">Poor</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <?php $k++; ?>
                        @empty
                        @endforelse
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-8 offset-md-1 row">
                        <div class="col-md-8">
                            <label>Industry Skill  <b style="color: red" title="Required">*</b></label>
                            <select class="custom-select" id="industry-skill">
                                @forelse($skills as $skill)
                                <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Rating  <b style="color: red" title="Required">*</b></label>
                            <select class="custom-select" id="industry-skill-weight">
                                @foreach([10,9,8,7,6,5,4,3,2,1] as $w)
                                <option value="{{ $w }}">{{$w}}/10</option>
                                @endforeach
                            </select>
                        </div>
                        
                        
                    </div>
                    <div class="col-2" style="text-align: center;">
                        <br>
                        <span class="btn btn-success btn-sm" id="add-industry-skill" style="margin-top: 0.5em">Add Skill</span>
                    </div>
                </div>

                <div id="industry-skills-pool" class="row col"> 
                    @forelse($referee->seekerIndustrySkills as $skill)     
                    <div class="col-md-6 col-xs-6 industry-skill hover-bottom">                        
                        {{ $skill->industrySkill->name }} [{{ $skill->weight }}/10 ]
                        <input type="hidden" name="industry_skill_id[]" value="" >
                        <input type="hidden" name="industry_skill_weight[]" value="">
                        <span class="btn-sm btn btn-danger remove-industry-skill pull-right" style="border-radius: 50%">X</span>  
                    </div>
                    @empty
                    @endforelse   
                </div>
                <hr>

                <div class="form-group col row">                    

                    <div class="col-md-7  offset-md-1" style="text-align: center;">
                        <label>Other Skills</label>
                        <input type="text" id="skill-name" class=" form-control" name="">
                    </div>

                    <div class="col-md-3">
                        <br>
                        <span class="btn btn-sm btn-success" id="add-skill" style="margin-top: 0.5em">Add Other Skill</span>
                    </div>

                    

                    <div id="skill-pool" class="col-md-10 offset-md-1 row" style="">
                        @foreach($referee->otherSeekerSkills as $otherSkill)
                        <div class="col-md-6 col-xs-6 hover-bottom">
                            {{ $otherSkill->name }}
                            <span class="btn btn-sm btn-danger pull-right remove-skill" style="border-radius: 50%">X</span>
                            <input type="hidden" value="" name="skillName[]" >                            
                         </div>
                         @endforeach
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label>Discplinary Cases  <b style="color: red" title="Required">*</b></label>
                    <select class="custom-select" name="discplinary_cases">
                        <option value="none" <?php if($referee->ready){ print $referee->jobApplicationReferee->discplinary_cases == 'none' ? 'selected="selected"' : ''; } ?>>None</option>
                        <option value="minor" <?php if($referee->ready){ print $referee->jobApplicationReferee->discplinary_cases == 'minor' ? 'selected="selected"' : ''; } ?>>Minor</option>
                        <option value="some" <?php if($referee->ready){ print $referee->jobApplicationReferee->discplinary_cases == 'some' ? 'selected="selected"' : ''; } ?>>Some</option>
                        <option value="many" <?php if($referee->ready){ print $referee->jobApplicationReferee->discplinary_cases == 'none' ? 'selected="many"' : ''; } ?>>Many</option>
                    </select>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Would you re-hire {{ $referee->seeker->public_name }}  <b style="color: red" title="Required">*</b></label>
                        <select class="custom-select" name="rehire">
                            <option value="yes" <?php if($referee->ready){ print $referee->jobApplicationReferee->rehire == 'yes' ? 'selected="selected"' : ''; } ?>>Yes</option>
                            <option value="maybe" <?php if($referee->ready){ print $referee->jobApplicationReferee->rehire == 'maybe' ? 'selected="selected"' : ''; } ?>>Maybe</option>
                            <option value="no" <?php if($referee->ready){ print $referee->jobApplicationReferee->rehire == 'no' ? 'selected="selected"' : ''; } ?>>Not at all</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Rate Professionalism  <b style="color: red" title="Required">*</b></label>
                        <select name="professionalism" class="form-control">
                            <option value="100">Very Professional</option>
                            <option value="50">Professional</option>
                            <option value="0">Not Professional</option>
                        </select>
                    </div>
                </div>
                <hr>
                <h5>Personality Traits</h5>
                <div class="form-row">

                    <div class="form-group col-md-5">
                        <select class="custom-select" id="personalities">
                            @forelse($personalities as $pers)
                            <option value="{{ $pers->id }}">{{ $pers->name }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>

                    <div class="form-group col-md-5">
                        <select class="custom-select" id="personality-weight">
                            @foreach([10,9,8,7,6,5,4,3,2,1] as $w)
                            <option value="{{ $w }}">{{$w}}/10</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2">
                        <span class="btn btn-success btn-sm" id="add-personality">Add</span>
                    </div>
                    <div id="personalities-pool" class="row" style="padding: 1em">
                         @foreach($referee->seekerPersonalityTraits as $trait) 
                        <div class="col-md-6 col-xs-6 listed-personality hover-bottom" personality_id="">
                         {{ $trait->personalityTrait->name }} [{{ $trait->weight }}/10 ]        
                        <input type="hidden" name="personality_id[]" value="" >
                        <input type="hidden" name="personality_weight[]" value="">
                        <span class="btn-sm btn btn-danger remove-personality pull-right" style="border-radius: 50%">X</span>  
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section2">
        <div class="card">
            <div class="card-body p-5">
                <div class="form-group">
                    <label>Reason for leaving  <b style="color: red" title="Required">*</b></label>
                    <textarea class="form-control" rows="2" name="reason_for_leaving" required="" placeholder="">{{ $referee->ready? $referee->jobApplicationReferee->reason_for_leaving : '' }}</textarea>
                </div>
                <div class="form-group">
                    <label>Strengths</label>
                    <textarea class="form-control" rows="2" name="strengths" placeholder="">{{ $referee->ready? $referee->jobApplicationReferee->strengths : '' }}</textarea>
                </div>

                <div class="form-group">
                    <label>Weaknesses</label>
                    <textarea class="form-control" rows="2" name="weaknesses" placeholder="">{{ $referee->ready? $referee->jobApplicationReferee->weaknesses : '' }}</textarea>

                </div>

                <div class="form-group">
                    <label>Comments</label>
                    <textarea class="form-control" rows="2" name="comments" placeholder="optional comments">{{ $referee->ready? $referee->jobApplicationReferee->comments : '' }}</textarea>
                </div>
                <hr>
                <div class="d-flex justify-content-between">

                    <input type="submit" class="btn btn-orange" value="Save Assessment">

                </div>
            </div>
        </div>
    </div>
    
</form>

<script type="text/javascript">
    <?php
        $allInd = "";
        for($i=0; $i<count($skills); $i++)
        {
            $allInd = $allInd.'['.$skills[$i]->id.',"'.$skills[$i]->name.'"],';
        }
        $allInd = '['.$allInd.']';
        echo "var allSkills = ".$allInd.';';

        $allPers = "";
        for($i=0; $i<count($personalities); $i++)
        {
            $allPers = $allPers.'['.$personalities[$i]->id.',"'.$personalities[$i]->name.'"],';
        }
        $allPers = '['.$allPers.']';
        echo "var personalities = ".$allPers.';';

    ?>
    //console.log(personalities);
    $().ready(function(){

        $('.remove-industry-skill').click(function(){
            $(this).parent().remove();
        });
        $('.remove-skill').click(function(){
                $(this).parent().remove();
        });
        $('.remove-personality').click(function(){
                $(this).parent().remove();
        });


        $('#add-skill').click(function(){
            var skillName = $('#skill-name').val();
            if(skillName.length < 3)
                return;
            var $skill = ''+
            '<div class="col-md-6 col-xs-6 hover-bottom">'+
                skillName+
                '<span class="btn btn-sm btn-danger pull-right remove-skill" style="border-radius="50%">X</span>'+
                '<input type="hidden" value="'+skillName+'" name="skillName[]" >'+
            '</div>';
            $('#skill-pool').append($skill);
            $('.remove-skill').click(function(){
                $(this).parent().remove();
            });
            $('#skill-name').val('')
        });

        $('#add-industry-skill').click(function(){
            var sk = $('#industry-skill').val();
            var sn = '';
            var sw = $('#industry-skill-weight').val();
            for(var k=0; k<allSkills.length; k++)
            {
                if(sk == allSkills[k][0])
                {
                    sn = allSkills[k][1];
                    break;
                }
            }

            var added = false;
            $('.industry-skill').each(function(){
                if($(this).attr('industry_skill_id') == sk)
                    added = true;
            });

            if(added)
                return;

            var $skill = ''+
            '<div class="col-md-6 col-xs-6 industry-skill hover-bottom" industry_skill_id="'+sk+'">'+
                '<input type="hidden" name="industry_skill_id[]" value="'+sk+'" >'+
                '<input type="hidden" name="industry_skill_weight[]" value="'+sw+'" >'+
                sn + ' ['+sw+'/10]' + '<span class="btn-sm btn btn-danger remove-industry-skill pull-right" style="border-radius: 50%">X</span>'+
            '</div>';

            $('#industry-skills-pool').append($skill);

            $('.remove-industry-skill').click(function(){
                $(this).parent().remove();
            });

            //alert(sk + ' - '+sw);

        });

        $('#add-personality').click(function(){
            var sk = $('#personalities').val();
            var sn = '';
            var sw = $('#personality-weight').val();
            for(var k=0; k<personalities.length; k++)
            {
                if(sk == personalities[k][0])
                {
                    sn = personalities[k][1];
                    break;
                }
            }

            var added = false;
            $('.listed-personality').each(function(){
                if($(this).attr('personality_id') == sk)
                    added = true;
            });

            if(added)
                return;

            var $pers = ''+
            '<div class="col-md-6 col-xs-6 listed-personality hover-bottom" personality_id="'+sk+'">'+
                '<input type="hidden" name="personality_id[]" value="'+sk+'" >'+
                '<input type="hidden" name="personality_weight[]" value="'+sw+'" >'+
                sn + ' ['+sw+'/10]' + '<span class="btn-sm btn btn-danger remove-personality pull-right" style="border-radius: 50%">X</span>'+
            '</div>';

            $('#personalities-pool').append($pers);

            $('.remove-personality').click(function(){
                $(this).parent().remove();
            });

            //alert(sk + ' - '+sw);

        });

    });
</script>

@endsection
