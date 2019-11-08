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
            {{ $referee->seeker->public_name }} has invited you to provide an honest assessment while they worked as {{ $referee->seeker_job_title }} at {{ $referee->organization }}.  <br>
            This form takes an average of two (2) minutes to complete. 
        </p>
        <br>
        <hr>
        <form method="POST" action="/referees/{{ $referee->slug }}/save">
            @csrf
            <div class="row">
                <div class="form-group col-md-12">
                    <label class="col-md-3 control-lable" >Your Position at {{ $referee->position_held }}</label>
                    <div class="col-md-9">
                        <input type="text" required="" placeholder="e.g. direct-supervisor, lecturer, colleague" name="relationship" class="form-control input-sm" maxlength="50" value="{{ $referee->position_held }}" />
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
                                <input type="text" required="" name="job_title" class="form-control input-sm" maxlength="50" value="{{ $rs->job_title }}" />
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-xs-6">
                            <label class="col-md-3 control-lable" for="fullName">Ability to meet Targets</label>
                            <div class="col-md-9">
                                <select required="" name="" class="form-control">
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
                            <input type="date" required="" name="job_title" class="form-control input-sm" maxlength="50" value="{{ $rs->start_date }}" />
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-xs-6">
                        <label class="col-md-3 control-lable" for="fullName">End Date</label>
                        <div class="col-md-9">
                            <input type="date" required="" name="job_title" class="form-control input-sm" maxlength="50" value="{{ $rs->end_date }}" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 col-xs-6">
                        <label class="col-md-3 control-lable" for="fullName">Performance</label>
                        <div class="col-md-9">
                            <select required="" name="" class="form-control">
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
                            <select required="" name="" class="form-control">
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
                        <textarea class="form-control" rows="2" name="strengths" required="" placeholder="">{{ $referee->ready? $referee->jobApplicationReferee->strengths : '' }}</textarea>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label class="col-md-3 control-lable" >Weaknesses</label>
                    <div class="col-md-9">
                        <textarea class="form-control" rows="2" name="weaknesses" required="" placeholder="">{{ $referee->ready? $referee->jobApplicationReferee->weaknesses : '' }}</textarea>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label class="col-md-3 control-lable" >Industry Skills</label>
                    
                    <div class="col-md-7">
                        
                        
                    </div>
                    
                    
                </div>
                <div class="form-group col-md-6">
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
                <div class="form-group col-md-12">
                    <label class="col-md-3 control-lable" >Rate Professionalism (0-100)</label>
                    <div class="col-md-9">
                        <input type="number" required="" placeholder="" name="professionalism" class="form-control input-sm" maxlength="50" value="{{ $referee->ready? $referee->jobApplicationReferee->professionalism : '' }}" min="0" max="100" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label class="col-md-3 control-lable" >Comments</label>
                    <div class="col-md-9">
                        <textarea class="form-control" rows="2" name="comments" required="" placeholder="optional comments">{{ $referee->ready? $referee->jobApplicationReferee->comments : '' }}</textarea>
                        
                    </div>
                </div>
            </div>

            

            <div style="text-align: center;">
                <br>
                <input type="submit" name="" class="btn-orange" value="Save Assessment">
                
            </div>

            
            
            
        
        
        
    </form>
    
                
    </div>
 </div>
</div>

<script type="text/javascript">
    $().ready(function(){
        $('#add-skill').click(function(){
            var skillName = $('#skill-name').val();
            if(skillName.length < 3)
                return;
            var $skill = ''+
            '<div class="col-md-6 col-xs-6 hover-bottom">'+
                skillName+
                '<span class="btn btn-sm btn-danger pull-right remove-skill" style="border-radius="50%">X</span>'+
                '<input type="hidden" value="" name="skillName[]" >'+
            '</div>';
            $('#skill-pool').append($skill);
            $('.remove-skill').click(function(){
                $(this).parent().remove();
            });
            $('#skill-name').val('')
        });
    });
</script>

@endsection