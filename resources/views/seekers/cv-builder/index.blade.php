@extends('layouts.dashboard-layout')

@section('title','Emploi :: CV-Builder')

@section('description')
Create a resume that will land you your dream job, for free, on Emploi or request for Professional CV Editing
@endsection

@section('content')
@section('page_title', 'Emploi CV Builder')

<?php
    $name = isset(Auth::user()->id) ? Auth::user()->name : '';
    $email = isset(Auth::user()->id) ? Auth::user()->email : '';
    $phone = '';
    $summary = '';
    $address = '';
    $city = '';
    $countryCode = '';
    $region = '';
    $seeker_skills = [];
    $industry = 1;
    $industries = App\Industry::orderBy('name')->get();

    $industrySkills = App\IndustrySkill::orderBy('name')->get();
    $education = $experience = null;

    $current_position = '';

    if(isset(Auth::user()->id) && Auth::user()->role == 'seeker' ){
        $seeker = Auth::user()->seeker;

        $phone = $seeker->phone_number;
        $summary = $seeker->objective;
        $address = $seeker->post_address;
        $countryCode = $seeker->country->code;
        $city = $region = isset($seeker->location_id) ? $seeker->location->name : \App\Location::where('country_id',$seeker->country_id)->first()->name;
        if(isset($seeker->industry_id))
            $industry = $seeker->industry_id;
        $seeker_skills = $seeker->skills;
        $education = $seeker->education();
        $educationRecords = $seeker->education();
        $experience = $seeker->experience();
        $experienceRecords = $seeker->experience();

        $current_position = $seeker->current_position;
    }

?>

<div class="card">
    <div class="card-body">

        <p style="text-align: right;">
          Emploi CV-editing masterclass: <a href="https://emploi.co/blog/emplois-annual-cv-writing-masterclass--and-this-time-its-online" class="btn btn-orange-alt">Learn more</a>
          <hr>
        </p>
        
        <form method="POST" action="/job-seekers/cv-builder/download" enctype="multipart/form-data">
            @csrf
            <h4>Personal Details</h4>
            <p>
                <label>Your Name:</label>
                <input type="text" name="name" value="{{ $name }}" class="form-control" required="" maxlength="50">
            </p>
            <p>
                <label>Your Email:</label>
                <input type="email" name="email" value="{{ $email }}" class="form-control" required="" maxlength="50">
            </p>
            <p>
                <label>Your Phone:</label>
                <input type="text" name="phone" value="{{ $phone }}" class="form-control" required="" maxlength="20" placeholder="254712312312">
            </p>
            <p>
                <label>Profile Summary:</label>
                <textarea class="form-control" name="summary" required="" maxlength="300" placeholder="Briefly state what you are looking for in your next position">{{ $summary }}</textarea>
            </p>
            <p>
                <label>Profile Picture: <small>(.jpg, .png, .jpeg ) Max 5 mb</small></label>
                <input type="file" name="avatar" value="" class="" maxlength="50" accept=".jpg,.png,.jpeg">
            </p>
            <p>
                <label>Address:</label>
                <textarea class="form-control" name="address" required="" maxlength="300" placeholder="Home address, e.g. P.O. Box 123-00100 Nairobi GPO">{{ $address }}</textarea>
            </p>
            <p>
                <label>City:</label>
                <input type="text" name="city" value="{{ $city }}" class="form-control" maxlength="50">
            </p>
            <p>
                <label>Country Code:</label>
                <input type="text" name="countryCode" value="{{ $countryCode }}" class="form-control" maxlength="50">
            </p>
            <p>
                <label>Region:</label>
                <input type="text" name="region" value="{{ $region }}" class="form-control" maxlength="50">
            </p>
            
            <br>
            <hr>
            <h4>Education Records</h4>

            <div id="education_records">
              <?php $edu_counter = 100; ?>
              @if($education != null)
                  @forelse($educationRecords as $edu)
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
                        <span class="text-danger removeEducation col-md-1">X</span>
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

            <br>
            <hr>
            <h4>Work Experience</h4>

            <p>
                <label>Current Position:</label>
                <input type="text" name="current_position" required="" value="{{ $current_position }}" class="form-control" maxlength="50">
            </p>

            <div class="form-group">
                <label for="industry">Industry *</label>
                <select path="industry" id="industry" name="industry" class="form-control input-sm">
                    @foreach($industries as $c)
                    <option value="{{ $c->id }}" @if($industry == $c->id)
                        selected=""
                        @endif
                        >{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>

            <div id="employment_records">
                <?php $exp=100;?>
                @if($experience != null)
                    @forelse($experienceRecords as $emp)
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

            <br>
            <hr>
            <h4>Skills</h4>

            <div id="skills-pool" class="row mb-3">
                  @forelse($seeker_skills as $s)
                  
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
                  <select class="form-control"  id="skill-select">
                      <option value="-1">Select a Skill</option>
                      @foreach($industrySkills as $s)
                      <?php
                        if($s->industry_id != $industry)
                            continue;
                      ?>
                      <option value="{{ $s->id }}">{{ $s->name }}</option>
                      @endforeach
                  </select>  </div>
                <div class="col-1 text-center">
                  <span class="btn btn-sm btn-purple" id="add-new-skill">Add</span>
                </div>
            </div>

            <br><br>


            <p>
                <input type="submit" value="Build CV" class="btn btn-sm btn-orange">
                <i>
                @guest

                    <a href="/login?redirectToUrl={{ url('/job-seekers/cv-builder') }}" class="orange">Log in</a> or <a href="/register?redirectToUrl={{ url('/job-seekers/cv-builder') }}" class="orange">Register</a> to add referees

                @else

                    @if(Auth::user()->role == 'seeker')
                        @if(count(Auth::user()->seeker->referees) == 0)
                            Add your referees <a href="/profile/add-referee" class="orange">here</a>.
                        @else
                            Your referees will be added automatically 

                        @endif

                    @else
                       Job Seekers referees will be added automatically

                    @endif



                @endguest
                </i>
                <a href="/job-seekers/cv-editing" class="btn btn-orange-alt" style="float: right;">Get Professional Help</a>
            </p>

        </form>
        <div>
            @include('components.employers.covid19')
            @include('components.featuredJobs')
        </div>
    </div>
</div>

<script type="text/javascript">
    <?php
    $sk = '';
    foreach($industrySkills as $s) {
        $sk .= "[".$s->id.", '".$s->name."',".$s->industry_id."],";
    }
    $sk = '['.$sk.']';
    echo 'var allSkills='.$sk.';';

    $inds = '';
    foreach($industries as $s) {
        $inds .= "[".$s->id.", '".$s->name."'],";
    }
    $inds = '['.$inds.']';
    echo 'var industries='.$inds.';';
    ?>
</script>
<script type="text/javascript" src="{{ asset('js/cv-builder.js') }}"></script>

@endsection
