@extends('layouts.dashboard-layout')

@section('title','Emploi :: Create Job Post')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Add A Job')

<form method="post" action="/vacancies" enctype="multipart/form-data">
    @csrf

    <div id="section1" class="section-view ">
        <div class="card">
            <div class="card-body p-5">
                <h3>Step 1 of 3</h3>
                <p>
                    <label>Company *</label>
                    <select name="company" class="form-control">
                        @foreach($companies as $i)
                        <option value="{{ $i->id }}">{{ $i->name }}</option>
                        @endforeach
                    </select>
                </p>
                <br>

                <p>
                    <label>Job Title *</label>
                    <input type="text" name="title" id="job-title" class="form-control" style="width: 100%; color: black">
                </p>
                <br>

                <p>
                    <label>Job Industry *</label>
                    <select name="industry" class="form-control">
                        @foreach($industries as $i)
                        <option value="{{ $i->id }}">{{ $i->name }}</option>
                        @endforeach
                    </select>
                </p>
                <br>

                <p>
                    <label>Vacancy Type *</label>
                    <select name="vacancyType" class="form-control">
                        @foreach($vacancyTypes as $i)
                        <option value="{{ $i->id }}">{{ $i->name }}</option>
                        @endforeach
                    </select>
                </p>
                <br>

                <a href="#" class="btn btn-sm btn-primary pull-right toSection2">Next ></a>
            </div>
        </div>
    </div>
    <div id="section2" class="section-view d-none">
        <div class="card">
            <div class="card-body p-5">
                <h3>Step 2 of 3</h3>
                <p>
                    <label>Job Description *</label>
                    <textarea class="form-control" id="responsibilities" name="responsibilities" rows="5"></textarea>
                </p>
                <br>

                <p>
                    <label>Education *</label>
                    <select name="education" class="form-control">
                        @foreach($educationLevels as $i)
                        <option value="{{ $i->id }}">{{ $i->name }}</option>
                        @endforeach
                    </select>
                </p>
                <br>

                <p>
                    <label>Experience *</label>
                    <select name="experience" class="form-control">
                        <option value="0">No Experience Required</option>
                        <option value="6">6 month Experience</option>
                        <option value="12">1 year Experience</option>
                        <option value="24">2 years Experience</option>
                        <option value="36">3 years Experience</option>
                        <option value="60">5 years Experience</option>
                        <option value="120">10 years Experience</option>
                    </select>
                </p>
                <br>

                <p>
                    <label>Number of Positions Available*</label>
                    <select name="positions" class="form-control">
                        @for($i=1; $i<20;$i++ ) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </p>
                <br>

                <a href="#" class="btn btn-sm btn-danger toSection1">
                    < Previous</a> <a href="#" class="btn btn-sm btn-primary pull-right toSection3">Next >
                </a>
            </div>
        </div>
    </div>

    <div id="section3" class="section-view d-none">
        <div class="card">
            <div class="card-body p-5">
                <h3>Step 3 of 3</h3>


                <p>
                    <label>Job Location:</label>
                    <select name="location" class="form-control">
                        @foreach($locations as $i)
                        <option value="{{ $i->id }}">[{{ $i->country->name }}] {{ $i->name }}</option>
                        @endforeach
                    </select>
                </p>
                <br>

                <p>
                    <label>Monthly Salary *</label>
                    <input type="number" name="monthly_salary" class="form-control" required="" placeholder="enter 0 for non-disclosure">
                </p>
                <br>

                <p>
                    <label>How to apply:</label>
                    <textarea class="form-control" name="how_to_apply" rows="5" placeholder="Optionally, you can specify additional description to applicants"></textarea>
                </p>
                <br>

                <p>
                    <label>Optional Photo</label>
                    <input type="file" name="image" placeholder="" accept=".jpg, .png,.jpeg">
                </p>
                <br>

                <a href="#" class="btn btn-sm btn-danger toSection2">
                    < Previous Page</a> <input type="submit" value="Save" class="btn btn-sm btn-primary pull-right">
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
                return alert('job title too short');
            $('.section-view').addClass('d-none');
            $('#section2').removeClass('d-none');
        });
        $('.toSection3').click(function() {

            $('.section-view').addClass('d-none');
            $('#section3').removeClass('d-none');
        });
    });
</script>

<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    setTimeout(function() {

        CKEDITOR.replace('responsibilities');

    }, 3000);
</script>

@endsection
