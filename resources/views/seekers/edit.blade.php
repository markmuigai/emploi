@extends('layouts.dashboard-layout')

@section('title','Edit Profile')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Edit Profile')

<form method="POST" action="{{ url('profile/update') }}" enctype="multipart/form-data" id="update-form">
    @csrf

    <div class="edit-section" id="section1">
        <div class="card">
            <div class="card-body p-5">
                @error('resume')
                    <p class="text-danger">Resume errors were detected</p>
                @enderror
                @error('resume')
                    <p class="text-danger">Avatar errors were detected</p>
                @enderror
                <h3 class="text-center">Step 1 of 3 : Personal Details</h3>
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
                    <input type="number" required="" path="phone_number" value="{{ $user->seeker->phone_number }}" name="phone_number" id="phone_number" class="form-control input-sm" placeholder="254712312313"
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
                    <label for="avatar">Update Profile Photo(.png, .jpg or .jpeg) <small>(Max 5MB)</small></label>
                    @error('avatar')
                        <p class="text-danger"> * Uploaded avatar was invalid *</p>
                    @enderror
                    <input type="file" name="avatar" value="" accept=".jpg, .png,.jpeg" />
                </div>
                <div class="text-center">
                    <a href="#" class="toSection2 btn btn-orange">Next > </a>
                </div>
            </div>
        </div>
    </div>

    <div class="edit-section d-none" id="section2">
        <div class="card">
            <div class="card-body p-5">
              <h3 class="text-center">Step 2 of 3 : Education and Skills</h3>
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
                  <div id="education_records">
                      <?php $edu_counter = 100; ?>
                      @if($user->seeker->education() != null)
                      @forelse($user->seeker->education() as $edu)
                      <div class="form-row mb-3 align-items-center education_field" education_id="{{ $edu_counter }}">
                        <div class="col-md-4">
                          <input type="text" class="form-control edu_field" value="{{ $edu[0] }}" placeholder="Institution name" name="institution_name[]">
                        </div>
                        <div class="col-md-4">
                          <input type="text" class="form-control edu_field" value="{{ $edu[1] }}" placeholder="Course Pursued" name="course_name[]">
                        </div>
                        <div class="col-md-3">
                          <select class="form-control edu_field" name="course_duration[]">
                            @foreach(['1 month or less','3 months','6 months','1 year','2 years','3 years','4 years', '5 years', '6 years'] as $d)
                            <option value="{{ $d }}" @if($edu[2]==$d) selected="" @endif>{{ $d }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <?php $edu_counter++; ?>
                      @empty
                      <div class="form-row mb-3 align-items-center education_field" education_id="{{ $edu_counter }}">
                          <div class="col-md-4">
                            <input type="text" class="form-control edu_field" value="" placeholder="Institution name" name="institution_name[]">
                          </div>
                          <div class="col-md-4">
                            <input type="text" class="form-control edu_field" value="" placeholder="Course Pursued" name="course_name[]">
                          </div>
                          <div class="col-md-3">
                            <select class="form-control edu_field" name="course_duration[]">
                                @foreach(['1 month or less','3 months','6 months','1 year','2 years','3 years','4 years', '5 years', '6 years'] as $d)
                                <option value="{{ $d }}">{{ $d }}</option>
                                @endforeach
                            </select>
                          </div>
                          <span class="text-danger removeEducation pull-right">Remove</span>
                      </div>
                      @endforelse
                      @endif
                    </div>
                    <div class="text-right">
                        <span id="add_education" class="btn btn-orange-alt">Add Education Records</span>
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
                              <span class="text-danger pull-right remove-skill" skill_id="{{ $s->skill->id }}"><i class="fas fa-times"></i></span>
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
                          <span class="btn btn-sm btn-purple" id="add-new-skill">Add</span>
                        </div>
                      </div>
                </div>
                <hr>
                <a href="#" class="toSection1 btn btn-purple">< Previous </a>
                <a href="#" class="toSection3 btn btn-orange" style="float: right;">Next ></a>
        </div>
    </div>
    </div>
    <div class="edit-section d-none" id="section3">
        <div class="card">
            <div class="card-body p-5">
                <h3 class="text-center">Step 3 of 3 : Employment</h3>
                <div class="form-group">
                    <label for="searching">Actively Searching *</label>
                    <select path="searching" id="searching" name="searching" class="form-control input-sm">
                        <option value="true" {{ $user->seeker->searching ? 'selected=""' : '' }}>I'm actively Looking for a job</option>
                        <option value="false" {{ $user->seeker->searching ?  '' : 'selected=""' }}>NOT Looking for a job</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="industry">Industry *</label>
                    <select path="industry" id="industry" name="industry" class="form-control input-sm">
                        @foreach($industries as $c)
                        <option value="{{ $c->id }}" @if($c->id == $user->seeker->industry_id)
                            selected=""
                            @endif
                            >{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="resume">Industry Experience (in years) *</label>
                    <input type="number" name="years_experience" value="{{ $user->seeker->years_experience }}" required="" class="form-control" />
                </div>
                  <div class="form-group">
                      <label for="resume">{{ isset($user->seeker->resume) ? 'Update Resume' : 'Attach Resume *'  }}</label>
                      <input type="file" path="resume" name="resume" {{ isset($user->seeker->resume) ? '' : 'required=""'  }} id="resume" class="" accept=".doc, .docx,.pdf" />
                  </div>

                  <div class="form-group">
                      <label for="objective">Career Objective</label>
                      <textarea rows="2" class="form-control" name="objective" placeholder="Briefly introduce yourself to employers, highlighting your strengths and skills">{{ $user->seeker->objective }}</textarea>
                  </div>

                    <div class="form-group">
                        <label for="current_position">Current Position</label>
                        <input type="text" name="current_position" class="form-control" placeholder="e.g. Primary Teacher or N/A" value="{{ $user->seeker->current_position }}">
                    </div>
                <hr>
                  <div class="form-group">
                      <label for="">Work Experience *</label>
                      <div id="employment_records">
                          <?php $exp=100;?>
                          @if($user->seeker->experience() != null)
                          @forelse($user->seeker->experience() as $emp)
                          <div class="experience_field">
                              <div class="row" experience_id="{{ $exp }}">
                                  <div class="col-md-6">
                                      <input type="text" class="form-control emp_field" value="{{ $emp[0] }}" placeholder="Organization name" name="organization_name[]">
                                  </div>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control emp_field" value="{{ $emp[1] }}" placeholder="Job Title" name="job_title[]">
                                  </div>
                                  <div class="col-md-6">
                                      <input type="date" class="form-control emp_field" value="{{ $emp[2] }}" name="job_start[]" placeholder="e.g January 2018">
                                  </div>
                                  <div class="col-md-6">
                                      <input type="date" class="form-control emp_field" value="{{ $emp[3] }}" name="job_end[]" placeholder="e.g April 2018 or current">
                                  </div>
                                  <div class="col-md-12">
                                      <textarea class="form-control emp_field" name="responsibilities[]" rows="5" placeholder="Duties and Responsibilities">{{ $emp[4] }}</textarea>
                                  </div>
                              </div>
                              <span class="text-danger removeExperience">Remove</span>
                              <span style="float: right;">
                                <select name="is_current[]"> 
                                    <option value="true" {{ isset($emp[5]) && $emp[5] == 'true' ? 'selected=""' : '' }}>IS Current</option> 
                                    <option value="false" {{ isset($emp[5]) && $emp[5] == 'false' ? 'selected=""' : '' }}>Not Current</option> 
                                </select>
                              </span>
                              <br><hr>
                          </div>
                          <?php $exp++;?>
                          @empty
                          <div class="experience_field"  experience_id="{{ $exp }}">
                              <div class="row">
                                  <div class="col-md-6 form-group">
                                      <input type="text" class="form-control emp_field" value="" placeholder="Organization name" name="organization_name[]">
                                  </div>
                                  <div class="col-md-6 form-group">
                                      <input type="text" class="form-control emp_field" value="" placeholder="Job Title" name="job_title[]">
                                  </div>
                                  <div class="col-md-6 form-group">
                                      <input type="date" class="form-control emp_field" value="" name="job_start[]" placeholder="e.g January 2018">
                                  </div>
                                  <div class="col-md-6 form-group">
                                      <input type="date" class="form-control emp_field" value="" name="job_end[]" placeholder="e.g April 2018 or current">
                                  </div>
                                  <div class="col-md-12 form-group">
                                      <textarea class="form-control emp_field" name="responsibilities[]" rows="5" placeholder="Duties and Responsibilities"></textarea>
                                  </div>
                              </div>
                                <span class="btn btn-sm btn-danger removeExperience pull right">Remove</span>
                          </div>
                          @endforelse
                          @endif
                      </div>
                      <div class="text-right">
                          <span id="add_employment" class="btn btn-orange-alt">Add Employment Records</span>
                      </div>
                  </div>
                  <hr>
                  <div class="d-flex justify-content-between">
                      <a href="#" class="toSection2 btn btn-purple">< Previous </a>
                      <span class="btn btn-orange pull-right updateProfile">Update</span>
                      <input style="display: none" type="submit" value="Update" class="btn btn-purple btn-sm">
                </div>
            </div>
        </div>
    </div>
</form>
<div class="login-bottom">
    <p style="display: none;">With your social media account</p>
    <div class="social-icons">
        <div class="button" style="display: none;">
            <a class="tw" href="#"> <i class="fas fa-linkedin"> </i><span>Linkedin</span>
                <div class="clearfix"> </div>
            </a>
            <a class="fa" href="#"> <i class="fas fa-facebook"> </i><span>Facebook</span>
                <div class="clearfix"> </div>
            </a>
            <a class="go" href="#"><i class="fas fa-google"> </i><span>Google</span>
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
