@extends('layouts.seek')

@section('title',$referee->seeker->user->name.' Assessment')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="container">
    <div class="single">  
       <div class="form-container">
        <h2> {{ $referee->seeker->user->name.' Assessment'}} </h2>
        <p style="text-align: center;">
            {{ $referee->seeker->public_name }} has invited you to provide an honest assessment while they worked as {{ $referee->seekerJobs[0]->job_title }} at {{ $referee->organization }}.  <br>
            This form takes an average of two (2) minutes to complete. 
        </p>
        <br>
        <hr>
        <form method="POST" action="/referees/{{ $referee->slug }}/save">
            @csrf
            <div class="section1">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-lable" >Your Position at {{ $referee->organization }}</label>
                        <div class="col-md-9">
                            <input type="text" required="" placeholder="e.g. direct-supervisor, lecturer, colleague" name="position" class="form-control input-sm" maxlength="50" value="{{ $referee->position_held }}" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-lable" >Relationship with {{ $referee->seeker->public_name }}</label>
                        <div class="col-md-9">
                            <input type="text" required="" placeholder="e.g. direct-supervisor, lecturer, colleague" name="relationship" class="form-control input-sm" maxlength="50" value="{{ $referee->ready? $referee->jobApplicationReferee->relationship : $referee->relationship }}" />
                        </div>
                    </div>
                </div>
                <hr>

                <div id="seeker-jobs">
                    <?php $k=1; ?>
                    @forelse($referee->seekerJobs as $rs)
                    <div class="seeker-job">
                        <div class="row">
                            <div class="form-group col-md-6 col-xs-6">
                                <label class="col-md-3 control-lable" for="fullName">Job Title {{ count($referee->seekerJobs) > 1 ? $k : '' }}</label>
                                <div class="col-md-9">
                                    <input type="text" required="" name="job_title[]" class="form-control input-sm" maxlength="50" value="{{ $rs->job_title }}" />
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-xs-6">
                                <label class="col-md-3 control-lable" for="fullName">Ability to meet Targets</label>
                                <div class="col-md-9">
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
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-xs-6">
                            <label class="col-md-3 control-lable" for="fullName">Start Date</label>
                            <div class="col-md-9">
                                <input type="date" required="" name="start_date[]" class="form-control input-sm" maxlength="50" value="{{ $rs->start_date }}" />
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-xs-6">
                            <label class="col-md-3 control-lable" for="fullName">End Date</label>
                            <div class="col-md-9">
                                <input type="date" required="" name="end_date[]" class="form-control input-sm" maxlength="50" value="{{ $rs->end_date }}" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-xs-6">
                            <label class="col-md-3 control-lable" for="fullName">Performance</label>
                            <div class="col-md-9">
                                <select required="" name="performance[]" class="form-control">
                                    <option value="100">Excellent</option>
                                    <option value="80">Above Average</option>
                                    <option value="50" selected="">Average</option>
                                    <option value="30">Below Average</option>
                                    <option value="0">Poor</option>
                                </select>
                                
                            </div>
                        </div>

                        <div class="form-group col-md-6 col-xs-6">
                            <label class="col-md-3 control-lable" for="fullName">Work Quality</label>
                            <div class="col-md-9">
                                <select required="" name="work_quality[]" class="form-control">
                                    <option value="100">Excellent</option>
                                    <option value="80">Above Average</option>
                                    <option value="50" selected="">Average</option>
                                    <option value="30">Below Average</option>
                                    <option value="0">Poor</option>
                                </select>
                                
                            </div>
                        </div>
                        
                    </div>
                    <hr>
                    <?php $k++; ?>
                    @empty
                    @endforelse
                    
                </div>
                
                
                <div class="row">
                    <div class="form-group col-md-6 col-xs-6">
                        <label class="col-md-2 control-lable" >Industry Skills</label>
                        
                        <div class="col-md-5">
                            <select class="form-control" id="industry-skill">
                                @forelse($skills as $skill)
                                <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                                @empty
                                @endforelse
                            </select>
                            
                        </div>
                        <div class="col-md-3">
                            <select class="form-control" id="industry-skill-weight">
                                @foreach([10,9,8,7,6,5,4,3,2,1] as $w)
                                <option value="{{ $w }}">{{$w}}/10</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <span class="btn btn-success btn-sm" id="add-industry-skill">Add</span>
                        </div>
                        <br>

                        <div id="industry-skills-pool" class="row" style="padding: 1em"></div>
                        
                        
                    </div>
                    <div class="form-group col-md-6 col-xs-6">
                        <label class="col-md-3 control-lable" >Other Skills</label>
                        
                        <div class="col-md-7">
                            
                            <input type="text" id="skill-name" class=" form-control" name="">
                        </div>
                        
                        <span class="btn btn-sm btn-success" id="add-skill">Add Skill</span>

                        <div id="skill-pool" class=" " style="padding: 0.5em ">
                                
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 col-xs-6">
                        <label class="col-md-3 control-lable" >Discplinary Cases</label>
                        <div class="col-md-9">
                            <select class="form-control" name="discplinary_cases">
                                <option value="none"
                                <?php if($referee->ready){ print $referee->jobApplicationReferee->discplinary_cases == 'none' ? 'selected="selected"' : ''; } ?>
                                >None</option>
                                <option value="minor"
                                <?php if($referee->ready){ print $referee->jobApplicationReferee->discplinary_cases == 'minor' ? 'selected="selected"' : ''; } ?>
                                >Minor</option>
                                <option value="some"
                                <?php if($referee->ready){ print $referee->jobApplicationReferee->discplinary_cases == 'some' ? 'selected="selected"' : ''; } ?>
                                >Some</option>
                                <option value="many"
                                <?php if($referee->ready){ print $referee->jobApplicationReferee->discplinary_cases == 'none' ? 'selected="many"' : ''; } ?>
                                >Many</option>
                            </select>
                            
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-xs-6">
                        <label class="col-md-3 control-lable" >Would you re-hire {{ $referee->seeker->public_name }}</label>
                        <div class="col-md-9">
                            <select class="form-control" name="rehire">
                                <option value="yes"
                                <?php if($referee->ready){ print $referee->jobApplicationReferee->rehire == 'yes' ? 'selected="selected"' : ''; } ?>
                                >Yes</option>
                                <option value="maybe"
                                <?php if($referee->ready){ print $referee->jobApplicationReferee->rehire == 'maybe' ? 'selected="selected"' : ''; } ?>
                                >Maybe</option>
                                <option value="no"
                                <?php if($referee->ready){ print $referee->jobApplicationReferee->rehire == 'no' ? 'selected="selected"' : ''; } ?>
                                >Not at all</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 col-xs-6">
                        <label class="col-md-3 control-lable" >Rate Professionalism</label>
                        <div class="col-md-9">
                            <select name="professionalism" class="form-control">
                                <option value="100">Very Professional</option>
                                <option value="50">Professional</option>
                                <option value="0">Not Professional</option>
                            </select>
                            
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-xs-6">
                        <label class="col-md-2 control-lable" >Personality Traits</label>
                        
                        <div class="col-md-5">
                            <select class="form-control" id="personalities">
                                @forelse($personalities as $pers)
                                <option value="{{ $pers->id }}">{{ $pers->name }}</option>
                                @empty
                                @endforelse
                            </select>
                            
                        </div>
                        <div class="col-md-3">
                            <select class="form-control" id="personality-weight">
                                @foreach([10,9,8,7,6,5,4,3,2,1] as $w)
                                <option value="{{ $w }}">{{$w}}/10</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <span class="btn btn-success btn-sm" id="add-personality">Add</span>
                        </div>
                        <br>

                        <div id="personalities-pool" class="row" style="padding: 1em"></div>
                        
                        
                    </div>

                </div>

                <p style="text-align: center;">
                    <a href="#" id="page2" class="btn btn-primary">Next</a>
                </p>
            </div>
            <div class="section2 hidden">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-lable" >Reason for leaving</label>
                        <div class="col-md-9">
                            <textarea class="form-control" rows="2" name="reason_for_leaving" required="" placeholder="">{{ $referee->ready? $referee->jobApplicationReferee->reason_for_leaving : '' }}</textarea>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-lable" >Strengths</label>
                        <div class="col-md-9">
                            <textarea class="form-control" rows="2" name="strengths" placeholder="">{{ $referee->ready? $referee->jobApplicationReferee->strengths : '' }}</textarea>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-lable" >Weaknesses</label>
                        <div class="col-md-9">
                            <textarea class="form-control" rows="2" name="weaknesses" placeholder="">{{ $referee->ready? $referee->jobApplicationReferee->weaknesses : '' }}</textarea>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-lable" >Comments</label>
                        <div class="col-md-9">
                            <textarea class="form-control" rows="2" name="comments" placeholder="optional comments">{{ $referee->ready? $referee->jobApplicationReferee->comments : '' }}</textarea>
                            
                        </div>
                    </div>
                </div>
                <div style="text-align: center;">
                    <span id="page1">Go to Previous page</span>
                    <br><br>
                    <input type="submit" name="" class="btn-orange" value="Save Assessment">
                    
                </div>
            </div>
            
    </form>
    
                
    </div>
 </div>
</div>

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

        $('#page2').click(function(){
            $('.section1').addClass('hidden');
            $('.section2').removeClass('hidden');
        });

        $('#page1').click(function(){
            $('.section2').addClass('hidden');
            $('.section1').removeClass('hidden');
        });

    });
</script>

@endsection