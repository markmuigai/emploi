@extends('layouts.dashboard-layout')

@section('title','Emploi :: Edit '.$post->title)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Edit')


<form method="post" action="/vacancies/{{ $post->slug }}" class="" enctype="multipart/form-data"  id="edit-post-form">
    @csrf
    {{ method_field('PUT') }}
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
                      <!-- <a href="/companies/create" class="btn btn-sm btn-orange-alt">Create New</a> -->
                    </div>
                    <select name="company" class="form-control" disabled="">
                        @foreach($companies as $i)
                        <option value="{{ $i->id }}" @if($post->company_id == $i->id)
                            selected=""
                            @endif
                            >{{ $i->name }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <label>Job Title *</label>
                    <input type="text" name="title" id="job-title" class="form-control" value="{{ $post->title }}">
                </div>


                <div class="form-group">
                    <label>Job Industry *</label>
                    <select name="industry" class="form-control">
                        @foreach($industries as $i)
                        <option value="{{ $i->id }}" @if($post->industry_id == $i->id)
                            selected=""
                            @endif
                            >{{ $i->name }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <label>Vacancy Type *</label>
                    <select name="vacancyType" class="form-control">
                        @foreach($vacancyTypes as $i)
                        <option value="{{ $i->id }}" @if($post->vacancy_type_id == $i->id)
                            selected=""
                            @endif
                            >{{ $i->name }}</option>
                        @endforeach
                    </select>
                </div>


                <a href="#" class="btn btn-sm btn-orange-alt pull-right toSection2">Next ></a>
            </div>
        </div>
    </div>
    <div id="section2" class="section-view d-none">
        <div class="card">
            <div class="card-body p-5">
                <h3>Step 2 of 3</h3>
                <div class="form-group">
                    <label>Job Description *</label>
                    <textarea class="form-control" id="responsibilities" name="responsibilities" rows="5">{{ $post->responsibilities }}</textarea>
                </div>

                <div class="form-group">
                    <label>Education *</label>
                    <select name="education" class="form-control">
                        @foreach($educationLevels as $i)
                        <option value="{{ $i->id }}" @if($post->education_requirements == $i->id)
                            selected=""
                            @endif
                            >{{ $i->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Experience *</label>
                    <select name="experience" class="form-control">
                        <option value="0" {{ $post->experience_requirements == 0 ? 'selected="selected"' : '' }}>No Experience Required</option>
                        <option value="6" {{ $post->experience_requirements == 6 ? 'selected="selected"' : '' }}>6 month Experience</option>
                        <option value="12" {{ $post->experience_requirements == 12 ? 'selected="selected"' : '' }}>1 year Experience</option>
                        <option value="24" {{ $post->experience_requirements == 24 ? 'selected="selected"' : '' }}>2 years Experience</option>
                        <option value="36" {{ $post->experience_requirements == 36 ? 'selected="selected"' : '' }}>3 years Experience</option>
                        <option value="48" {{ $post->experience_requirements == 48 ? 'selected="selected"' : '' }}>4 years Experience</option>
                        <option value="60" {{ $post->experience_requirements == 60 ? 'selected="selected"' : '' }}>5 years Experience</option>
                        <option value="72" {{ $post->experience_requirements == 72 ? 'selected="selected"' : '' }}>6 years Experience</option>
                        <option value="84" {{ $post->experience_requirements == 84 ? 'selected="selected"' : '' }}>7 years Experience</option>
                        <option value="96" {{ $post->experience_requirements == 96 ? 'selected="selected"' : '' }}>8 years Experience</option>
                        <option value="108" {{ $post->experience_requirements == 108 ? 'selected="selected"' : '' }}>9 years Experience</option>
                        <option value="120" {{ $post->experience_requirements == 120 ? 'selected="selected"' : '' }}>10 years Experience</option>

                        <option value="132" {{ $post->experience_requirements == 132 ? 'selected="selected"' : '' }}>11 years Experience</option>
                        <option value="144" {{ $post->experience_requirements == 144 ? 'selected="selected"' : '' }}>12 years Experience</option>
                        <option value="156" {{ $post->experience_requirements == 156 ? 'selected="selected"' : '' }}>13 years Experience</option>
                        <option value="168" {{ $post->experience_requirements == 168 ? 'selected="selected"' : '' }}>14 years Experience</option>
                        <option value="180" {{ $post->experience_requirements == 180 ? 'selected="selected"' : '' }}>15 years Experience</option>
                        <option value="192" {{ $post->experience_requirements == 192 ? 'selected="selected"' : '' }}>16 years Experience</option>
                        <option value="204" {{ $post->experience_requirements == 204 ? 'selected="selected"' : '' }}>17 years Experience</option>
                        <option value="216" {{ $post->experience_requirements == 216 ? 'selected="selected"' : '' }}>18 years Experience</option>
                        <option value="228" {{ $post->experience_requirements == 228 ? 'selected="selected"' : '' }}>19 years Experience</option>

                        <option value="240" {{ $post->experience_requirements == 240 ? 'selected="selected"' : '' }}>20 years Experience</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Number of Positions Available*</label>
                    <select name="positions" class="form-control">
                        @for($i=1; $i<100;$i++ ) <option value="{{ $i }}" {{ $i == $post->positions ? 'selected="selected"' : '' }}>{{ $i }}</option>
                            @endfor
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                  <a href="#" class="btn btn-sm btn-orange-alt toSection1">< Previous</a>
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
                        <option value="{{ $i->id }}" @if($post->location_id == $i->id)
                            selected=""
                            @endif
                            >[{{ $i->country->name }}] {{ $i->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Monthly Salary *</label>
                    <input type="number" name="monthly_salary" class="form-control" required="" placeholder="enter 0 for non-disclosure" value="{{ $post->monthly_salary }}" id="monthly_salary" min="0">
                </div>

                <div class="form-group">
                    <label>Maximum Salary Limit</label>
                    <input type="number" name="max_salary" class="form-control" value="{{ $post->max_salary }}" placeholder="only fill if salary has a range"  id="max_salary" min="1">
                </div>

                <div class="form-group">
                    <label>Application Deadline *</label>
                    <input type="datetime-local" name="deadline" class="form-control" required="" value="{{ \Carbon\Carbon::parse($post->deadline)->format('Y-m-d\TH:i') }}" required="">
                </div>

                <div class="form-group">
                    <label>How to apply:</label>
                    <textarea class="form-control" name="how_to_apply" rows="5" placeholder="Optionally, you can specify additional description to applicants">{{ $post->how_to_apply ? $post->how_to_apply : '' }}</textarea>
                </div>

                <div class="form-group">
                    <label>
                        Optional Photo
                        (png, jpg and jpeg Max 5MB)
                        @error('image')
                            <strong class="pull-right text-danger"> * Uploaded image was invalid *</strong>
                        @enderror
                    </label>
                    <input type="file" name="image" placeholder="" accept=".jpg, .png,.jpeg">
                </div>

                <div class="d-flex justify-content-between">
                  <a href="#" class="btn btn-sm btn-orange-alt toSection2">< Previous Page</a>
                  <a class="btn btn-sm btn-orange pull-right" id="save-job-post" href="#">Save Job Post</a>
                </div>
            </div>
        </div>
    </div>
</form>

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
                return notify('Invalid Monthly Salary','error');

            // if(salary != 0)
            // {
            //     //notify('Defining salary');
            //     if($('#max_salary').val())
            //     {
            //         if(max_salary <= salary)
            //             return notify('Maximum salary must be greater than minimum salary', 'error');
            //     }

            // }
            //return notify(salary + ' ' + max_salary);
            $('#edit-post-form').submit();
        });
    });
</script>


@endsection
