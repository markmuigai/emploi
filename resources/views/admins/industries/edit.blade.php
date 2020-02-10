@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Edit '.$industry->name)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Edit '.$industry->name)


<div class="card">
    <div class="card-body ">
        <a href="/admin/industries/{{ $industry->slug }}" class=" orange"><i class="fa fa-arrow-left"></i> Back</a>
        <br>
        <hr>

        <form method="POST" action="/admin/industries/{{ $industry->slug }}">
            @csrf
            {{ method_field('PUT') }}
            <p>
                <label>Name</label>
                <input type="text" name="name" value="{{ $industry->name }}" placeholder="industry name" class="form-control" required="" maxlength="100">
            </p>
            <p>
                <label>Slug</label>
                <input type="text" name="slug" value="{{ $industry->slug }}" placeholder="short_name_without_spaces" class="form-control" required="" maxlength="20">
            </p>
            <p>
                <label>Status</label>
                <select class="form-control" name="status">
                    <option value="active" {{ $industry->status == 'active' ? 'selected=""' : '' }}>Active</option>
                    <option value="inactive" {{ $industry->status == 'inactive' ? 'selected=""' : '' }}>Inactive</option>
                </select>
                
            </p>
            <p>
                <input type="submit" value="Save" class="btn btn-sm btn-primary">
            </p>
        </form>
        
    </div>
</div>


@endsection