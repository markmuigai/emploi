@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Create Industry')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Create Industry')


<div class="card">
    <div class="card-body ">
        <a href="/admin/industries" class=" orange"><i class="fa fa-arrow-left"></i> Back</a>
        <br>
        <hr>

        <form method="POST" action="/admin/industries">
            @csrf
            <p>
                <label>Name</label>
                <input type="text" name="name" value="" placeholder="industry name" class="form-control" required="" maxlength="100">
            </p>
            <p>
                <label>Slug</label>
                <input type="text" name="slug" value="" placeholder="short_name_without_spaces" class="form-control" required="" maxlength="20">
            </p>
            <p>
                <label>Status</label>
                <select class="form-control" name="status">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
                
            </p>
            <p>
                <input type="submit" value="Save" class="btn btn-sm btn-primary">
            </p>
        </form>
        
    </div>
</div>


@endsection