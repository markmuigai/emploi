@extends('layouts.dashboard-layout')

@section('title','Emploi :: Create Job Post')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Create Job Post')

<form method="post" action="/vacancies" enctype="multipart/form-data" id="create-post-form">
    @csrf
    @include('components.ads.responsive')

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
                    <select name="industry" class="form-control">
                        @foreach($industries as $i)
                        <option value="{{ $i->id }}">{{ $i->name }}</option>
                        @endforeach
                    </select>
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

<?php
    if(Auth::user()->email !== 'jobs@emploi.co')
    {
        $code = 'STARTED-POSTING';
        $url = url()->current();
        $user = isset(Auth::user()->id) ? '['.Auth::user()->name.' - '.Auth::user()->email.']' : '[Unauthenticated user]';
        $message = $code.' '.$user.' '.$url.' Started Posting a job';
        \App\Employer::first()->notify(new \App\Notifications\TriedAdvertising($message));
    }
    
?>

@endsection
