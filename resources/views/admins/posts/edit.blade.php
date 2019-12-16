@extends('layouts.dashboard-layout')

@section('title','Emploi :: Create Job Post')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Create Job Post')

<form method="post" action="/vacancies" enctype="multipart/form-data">
    @csrf

    <div id="section1" class="section-view ">
        <h3>Step 1 of 3</h3>
        <div class="form-group">
            <label>Company *</label>
            <select name="company" class="custom-select">
                @foreach($companies as $i)
                <option value="{{ $i->id }}">{{ $i->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Job Title *</label>
            <input type="text" name="title" id="job-title" class="form-control">
        </div>

        <div class="form-group">
            <label>Job Industry *</label>
            <select name="industry" class="custom-select">
                @foreach($industries as $i)
                <option value="{{ $i->id }}">{{ $i->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Vacancy Type *</label>
            <select name="vacancyType" class="custom-select">
                @foreach($vacancyTypes as $i)
                <option value="{{ $i->id }}">{{ $i->name }}</option>
                @endforeach
            </select>
        </div>

        <a href="#" class="btn btn-sm btn-orange-alt pull-right toSection2">Next ></a>
    </div>

    <div id="section2" class="section-view d-none">
        <h3>Step 2 of 3</h3>
        <div class="form-group">
            <label>Summary *</label>
            <textarea class="form-control" id="responsibilities" name="responsibilities" rows="5"></textarea>
        </div>

        <div class="form-group">
            <label>Required Education *</label>
            <textarea class="form-control" id="education" name="education" rows="5"></textarea>
        </div>

        <div class="form-group">
            <label>Required Work Experience *</label>
            <textarea class="form-control" id="experience" name="experience" rows="5"></textarea>
        </div>

        <div class="form-group">
            <label>Additional Benefits:</label>
            <textarea class="form-control" id="benefits" name="benefits" rows="5"></textarea>
        </div>

        <a href="#" class="btn btn-sm btn-orange-alt toSection1">Previous</a>
        <a href="#" class="btn btn-sm btn-orange pull-right toSection3">Next >
        </a>
    </div>

    <div id="section3" class="section-view d-none">
        <h3>Step 3 of 3</h3>
        <div class="form-group">
            <label>Application deadline:</label>
            <input type="datetime-local" name="deadline" class="form-control">
        </div>

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
            <input type="number" name="monthly_salary" class="form-control" required="">
        </div>

        <div class="form-group">
            <label>How to apply:</label>
            <textarea class="form-control" name="how_to_apply" rows="5" placeholder="Optionally, you can specify additional description to applicants"></textarea>
        </div>

        <div class="form-group">
            <label>Photo</label>
            <input type="file" name="image" placeholder="" accept=".jpg, .png,.jpeg">
        </div>

        <a href="#" class="btn btn-sm btn-orange-alt toSection2">Previous</a>

        <button type="submit" name="button" class="btn btn-sm btn-orange pull-right">Savev Job Post</button>
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
            var responsibilities = $('#responsibilities').val();
            if (responsibilities.length < 10)
                return notify('Responsibilities is too short', 'error');
            $('.section-view').addClass('d-none');
            $('#section3').removeClass('d-none');
        });
    });
</script>

@endsection