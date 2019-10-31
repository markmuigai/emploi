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
            {{ $referee->seeker->public_name }} has invited you to provide an honest assessment while they worked as {{ $referee->seeker_job_title }} at {{ $referee->organization }}.
        </p>
        <br>
        <form method="POST" action="/referees/{{ $referee->slug }}/save">
            @csrf
            
            <div class="row">
                <div class="form-group col-md-12">
                    <label class="col-md-3 control-lable" for="fullName">Job Title</label>
                    <div class="col-md-9">
                        <input type="text" required="" name="job_title" class="form-control input-sm" maxlength="50" value="{{ $referee->ready? $referee->jobApplicationReferee->job_title : $referee->seeker_job_title }}" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label class="col-md-3 control-lable" for="phone_number">Start date</label>
                    <div class="col-md-9">
                        <input type="date" required="" placeholder="" name="start_date" class="form-control input-sm" maxlength="50" value="{{ $referee->ready? $referee->jobApplicationReferee->start_date : '' }}" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label class="col-md-3 control-lable" for="phone_number">End date</label>
                    <div class="col-md-9">
                        <input type="date" required="" placeholder="" name="end_date" class="form-control input-sm" maxlength="50" value="{{ $referee->ready? $referee->jobApplicationReferee->end_date : '' }}" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label class="col-md-3 control-lable" >Responsibilities</label>
                    <div class="col-md-9">
                        <textarea class="form-control" rows="4" name="responsibilities" required="" placeholder="State your duties">{{ $referee->ready? $referee->jobApplicationReferee->responsibilities : $referee->responsibilities }}</textarea>
                        
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
                    <label class="col-md-3 control-lable" >Rate Performance (0-100)</label>
                    <div class="col-md-9">
                        <input type="number" required="" placeholder="" name="performance" class="form-control input-sm" maxlength="50" value="{{ $referee->ready? $referee->jobApplicationReferee->performance : '' }}" min="0" max="100" />
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
                <div class="form-group col-md-12">
                    <label class="col-md-3 control-lable" >Discplinary Cases</label>
                    <div class="col-md-9">
                        <select class="form-control" name="discplinary_cases">
                            <option value="none"
                            <?php if($referee->ready){ print $referee->jobApplicationReferee->discplinary_cases == 'none' ? 'selected="selected"' : ''; } ?>
                            >None</option>
                            <option value="one"
                            <?php if($referee->ready){ print $referee->jobApplicationReferee->discplinary_cases == 'one' ? 'selected="selected"' : ''; } ?>
                            >Once</option>
                            <option value="multiple"
                            <?php if($referee->ready){ print $referee->jobApplicationReferee->discplinary_cases == 'none' ? 'selected="multiple"' : ''; } ?>
                            >Multiple</option>
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
                    <label class="col-md-3 control-lable" >On a scale of 0-100, Would you re-hire {{ $referee->seeker->public_name }}</label>
                    <div class="col-md-9">
                        <input type="number" required="" placeholder="" name="would_you_rehire" class="form-control input-sm" maxlength="50" value="{{ $referee->ready? $referee->jobApplicationReferee->would_you_rehire : '' }}" min="0" max="100" />
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
                <input type="submit" name="" class="btn-orange" value="Save Referee">
                
            </div>

            <p style="text-align: center;">
                <br><br>
                <i>
                    An one-time e-mail would be sent to your referee for verification.
                </i>
            </p>

            
            
            
        
        
        
    </form>
    
                
    </div>
 </div>
</div>

@endsection