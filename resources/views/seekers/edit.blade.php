@extends('layouts.dashboard-layout')

@section('title','Edit Profile')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Edit Profile')

<script type="text/javascript">
  $().ready(function(){
    setTimeout(function(){
      $('.toSection3').trigger('click');
    },1000);
    
  });
</script>

<form method="POST" action="{{ url('profile/update') }}" enctype="multipart/form-data" id="update-form">
    @csrf

    <div class="edit-section" id="section1">
        <div class="card">
            <div class="card-body p-5">
                @error('resume')
                    <p style="color: red">Resume errors were detected</p>
                @enderror
                @error('resume')
                    <p style="color: red">Avatar errors were detected</p>
                @enderror
                <h3 style="text-align: center;">Step 1 of 3 : Personal Details</h3>
                <div class="form-group">
                    <label for="fullName">Full Name *</label>
                    <input type="text" required="" path="fullName" name="name" id="fullName" class="form-control input-sm" maxlength="50" value="{{ $user->name }}" />
                </div>
                <div class="form-group">
                    <label for="public_name">Public Name *</label>
                    <input type="text" required="" value="{{ $user->seeker->public_name }}" name="public_name" id="public_name" class="form-control input-sm" maxlength="50" />
                </div>
                <div class="form-group">
                    <label for="username">Username *</label>
                    <input type="text" required="" value="{{ $user->username }}" name="username" id="username" class="form-control input-sm" maxlength="50" />
                </div>
                <div class="form-group">
                    <label for="phone_number">Phone Number *</label>
                    <input type="number" required="" path="phone_number" value="{{ $user->seeker->phone_number }}" name="phone_number" id="phone_number" class="form-control input-sm" style="" placeholder="254712312313"
                      oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" />
                </div>
                <div class="form-group">
                    <label for="sex">Gender</label>
                    <div class="radios">
                        @foreach(["M" => 'Male','F'=>'Female','I'=>'Other'] as $key => $value)
                        <label for="radio-01" class="label_radio">
                            <input type="radio" name="gender" value="{{ $key }}" <?php
                            if($user->seeker->gender == $key)
                                    {
                                        echo "checked=''";
                                    }
                                    ?>> {{ $value }}
                        </label>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" required="" value="{{ $user->email }}" disabled="" path="email" id="email" class="form-control input-sm" maxlength="50" />
                </div>
                <div class="form-group">
                    <label for="country">Country *</label>
                    <select path="country" id="country" name="country" class="form-control input-sm">
                        @foreach($countries as $c)
                        <option value="{{ $c->id }}" @if($c->id == $user->seeker->country_id)
                            selected=""
                            @endif
                            >{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <select name="location" class="form-control input-sm">
                        @foreach($locations as $c)
                        <option value="{{ $c->id }}" @if($c->id == $user->seeker->location_id)
                            selected=""
                            @endif
                            >{{ $c->country->code }} {{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="date_of_birth">Date of Birth *</label>
                    <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ $user->seeker->date_of_birth }}">
                </div>
                <div class="form-group">
                    <label for="post_address">Address *</label>
                    <textarea class="form-control" name="post_address" id="address" rows="2">{{ $user->seeker->post_address }}</textarea>
                </div>

                <div class="form-group">
                  <label>
                        Update Profile Photo
                        @error('avatar')
                            <strong class="pull-right" style="color: red"> * Uploaded avatar was invalid *</strong>
                        @enderror
                    </label>
                  <div class="custom-file">
                    <input type="file" name="avatar" class="custom-file-input" value="" accept=".jpg, .png,.jpeg" />
                    <label class="custom-file-label" for="avatar">(png, jpg and jpeg Max 5MB)</label>
                  </div>
                </div>
                <div style="text-align: center;">
                    <a href="#" class="toSection2 btn btn-success">Next > </a>
                </div>
            </div>
        </div>
    </div>

    <div class="edit-section d-none" id="section2">
        <div class="card">
            <div class="card-body p-5">
              <h3>Step 2 of 3 : Education and Skills</h3>
              <div class="form-group">
                  <label for="education_level_id">Highest Education *</label>
                  <select id="education_level_id" name="education_level_id" class="form-control input-sm">
                      @foreach($educationLevels as $e)
                      <option value="{{ $e->id }}" @if($e->id == $user->seeker->education_level_id)
                          selected="selected"
                          @endif
                          >{{ $e->name }}</option>
                      @endforeach
                  </select>
              </div>
              <div class="form-group">
                  <label for="education_records">Education Records *</label>
                  <div class="col-md-9 row" id="education_records">
                      <?php $edu_counter = 100; ?>
                      @forelse($user->seeker->education() as $edu)
                      <div class="col-md-6 education_field" style="margin-bottom: 1em" education_id="{{ $edu_counter }}">
                          <input type="text" class="form-control edu_field" value="{{ $edu[0] }}" placeholder="Institution name" name="institution_name[]">
                          <input type="text" class="form-control edu_field" value="{{ $edu[1] }}" placeholder="Course Pursued" name="course_name[]">
                          <select class="form-control edu_field" name="course_duration[]">
                              @foreach(['1 month or less','3 months','6 months','1 year','2 years','3 years','4 years', '5 years', '6 years'] as $d)
                              <option value="{{ $d }}" @if($edu[2]==$d) selected="" @endif>{{ $d }}</option>
                              @endforeach
                          </select>

                      </div>
                      <?php $edu_counter++; ?>
                      @empty
                      <div class="col-md-6 education_field" style="margin-bottom: 1em" education_id="{{ $edu_counter }}">
                          <input type="text" class="form-control edu_field" value="" placeholder="Institution name" name="institution_name[]">
                          <input type="text" class="form-control edu_field" value="" placeholder="Course Pursued" name="course_name[]">
                          <select class="form-control edu_field" name="course_duration[]">
                              @foreach(['1 month or less','3 months','6 months','1 year','2 years','3 years','4 years', '5 years', '6 years'] as $d)
                              <option value="{{ $d }}">{{ $d }}</option>
                              @endforeach
                          </select>
                          <span class="btn btn-sm btn-danger removeEducation">X</span>
                      </div>
                      @endforelse
                      <div class="col-md-6">
                          <span id="add_education" class="btn btn-sm btn-primary">Add Education Records</span>
                      </div>


                  </div>
              </div>

                <hr>

                <div class="form-group">
                    <label for="education_level_id">My Skills *</label>
                      <div id="skills-pool" class="row mb-3">
                          @forelse($user->seeker->skills as $s)
                          <div class="col-lg-4 col-md-6 user-skill" skill_id="{{ $s->skill->id }}">
                              <strong>{{ $s->skill->name }}</strong>
                              <input type="hidden" name="skills[]" value="{{ $s->skill->id }}">
                              <span class="text-danger pull-right remove-skill" skill_id="{{ $s->skill->id }}"><strong>X</strong></span>
                          </div>
                          @empty
                          @endforelse
                      </div>

                      <div class="form-row">
                        <div class="col-11">
                          <select class="form-control" id="skill-select">
                              <option value="-1">Select a Skill</option>
                              @foreach($skills as $s)
                              <option value="{{ $s->id }}">{{ $s->name }}</option>
                              @endforeach
                          </select>  </div>
                        <div class="col-1 text-center">
                          <span class="btn btn-sm btn-success" id="add-new-skill">Add</span>
                        </div>
                      </div>
                </div>
            <div style="">

                <a href="#" class="toSection1 btn btn-primary">
                    < Previous </a> <a href="#" class="toSection3 pull-right btn btn-success">Next >
                </a>
            </div>
        </div>
    </div>
    </div>
    <div class="edit-section d-none" id="section3">
        <div class="card">
            <div class="card-body p-5">
                <h3 style="text-align: center;">Step 3 of 3 : Employment</h3>
                <div class="row">
                    <div class="form-group" style="width: 100%">
                        <label for="industry">Industry *</label>
                        <div class="col-md-9">
                            <select path="industry" id="industry" name="industry" class="form-control input-sm">
                                @foreach($industries as $c)
                                <option value="{{ $c->id }}" @if($c->id == $user->seeker->industry_id)
                                    selected=""
                                    @endif
                                    >{{ $c->name }}</option>
                                @endforeach

                            </select>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group" style="width: 100%">
                        <label for="resume">Industry Experience (in years) *</label>
                        <div class="col-md-9">
                            <input type="number" name="years_experience" value="{{ $user->seeker->years_experience }}" required="" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group" style="width: 100%">
                        <label for="resume">{{ isset($user->seeker->resume) ? 'Update Resume' : 'Attach Resume *'  }}</label>
                        <div class="col-md-9">
                            <input type="file" path="resume" name="resume" {{ isset($user->seeker->resume) ? '' : 'required=""'  }} id="resume" class="btn btn-sm" accept=".doc, .docx,.pdf" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group" style="width: 100%">
                        <label for="objective">Career Objective</label>
                        <div class="col-md-9">
                            <textarea rows="2" class="form-control" name="objective" placeholder="Briefly introduce yourself to employers, highlighting your strengths and skills">{{ $user->seeker->objective }}</textarea>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group" style="width: 100%">
                        <label for="current_position">Current Position</label>
                        <div class="col-md-9">
                            <input type="text" name="current_position" class="form-control" placeholder="e.g. Primary Teacher or N/A" value="{{ $user->seeker->current_position }}">

                        </div>
                    </div>
                </div>



                <hr>
                <hr>
                <div class="row">
                    <div class="form-group" style="width: 100%">
                        <label for="">Work Experience *</label>
                        <div class="col-md-9 row" id="employment_records">
                            <?php $exp=100;?>
                            @forelse($user->seeker->experience() as $emp)
                            <div class="row experience_field" style="margin-bottom: 1em" experience_id="{{ $exp }}">
                                <div class="col-md-6">
                                    <input type="text" class="form-control emp_field" value="{{ $emp[0] }}" placeholder="Organization name" name="organization_name[]">
                                    <input type="text" class="form-control emp_field" value="{{ $emp[1] }}" placeholder="Job Title" name="job_title[]">
                                    <input type="date" class="form-control emp_field" value="{{ $emp[2] }}" name="job_start[]" placeholder="e.g January 2018">
                                    <input type="date" class="form-control emp_field" value="{{ $emp[3] }}" name="job_end[]" placeholder="e.g April 2018 or current">
                                    <span class="btn btn-sm btn-danger removeExperience">X</span>
                                </div>
                                <div class="col-md-6">
                                    <textarea class="form-control emp_field" name="responsibilities[]" rows="5" placeholder="Duties and Responsibilities">{{ $emp[4] }}</textarea>
                                </div>
                            </div>
                            <?php $exp++;?>
                            @empty
                            <div class="row experience_field" style="margin-bottom: 1em" experience_id="{{ $exp }}">
                                <div class="col-md-6">
                                    <input type="text" class="form-control emp_field" value="" placeholder="Organization name" name="organization_name[]">
                                    <input type="text" class="form-control emp_field" value="" placeholder="Job Title" name="job_title[]">
                                    <input type="date" class="form-control emp_field" value="" name="job_start[]" placeholder="e.g January 2018">
                                    <input type="date" class="form-control emp_field" value="" name="job_end[]" placeholder="e.g April 2018 or current">
                                    <span class="btn btn-sm btn-danger removeExperience">X</span>
                                </div>
                                <div class="col-md-6">
                                    <textarea class="form-control emp_field" name="responsibilities[]" rows="5" placeholder="Duties and Responsibilities"></textarea>
                                </div>
                            </div>
                            @endforelse

                            <div class="col-md-6">
                                <span id="add_employment" class="btn btn-sm btn-primary">Add Employment Records</span>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="row">
                    <div style="">
                        <a href="#" class="toSection2 btn btn-primary">
                            < Previous </a> </div> <div class="form-actions floatRight">
                                <span class="btn btn-success pull-right updateProfile">Update</span>
                                <input style="display: none" type="submit" value="Update" class="btn btn-primary btn-sm">
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>
<div class="login-bottom">
    <p style="display: none;">With your social media account</p>
    <div class="social-icons">
        <div class="button" style="display: none;">
            <a class="tw" href="#"> <i class="fa fa-linkedin tw2"> </i><span>Linkedin</span>
                <div class="clearfix"> </div>
            </a>
            <a class="fa" href="#"> <i class="fa fa-facebook tw2"> </i><span>Facebook</span>
                <div class="clearfix"> </div>
            </a>
            <a class="go" href="#"><i class="fa fa-google tw2"> </i><span>Google</span>
                <div class="clearfix"> </div>
            </a>
            <div class="clearfix"> </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    <?php
    $sk = '';
    foreach($skills as $s) {
        $sk .= "[".$s->id.", '".$s->name."'],";
    }
    $sk = '['.$sk.']';
    echo 'var allSkills='.$sk.
    ';';
    ?>
</script>
<script type="text/javascript" src="{{ asset('js/edit-seeker.js') }}"></script>
@endsection
