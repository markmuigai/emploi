@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Update Industry Skill')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Update Industry Skill')


<div class="card">
    <div class="card-body ">
        <br>
        <hr>

        <form method="POST" action="/admin/industry-skills/{{ $skill->id }}">
            @csrf
            @method('PUT')
            <p>
                <label>Skill Name</label>
                <input type="text" name="name" value="{{ $skill->name }}" placeholder="skill name" class="form-control" required="" maxlength="100">
            </p>
            
            <p>
                <input type="submit" value="Update Skill" class="btn btn-sm btn-primary">
            </p>
        </form>
        
    </div>
</div>


@endsection