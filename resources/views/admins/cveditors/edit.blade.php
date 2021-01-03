@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Edit CV Editor')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Edit CV Editor')


<div class="card">
    <div class="card-body">
        <h5>
            <a href="/admin/cveditors/{{ $editor->id }}" class="btn btn-default">
                <i class="fa fa-arrow-left"></i> 
            </a> 
            Edit CvEditor
        </h5>
        <form method="post" action="/admin/cveditors/{{ $editor->id }}">
            @csrf
            {{ method_field('PUT') }}
            <p>
                <label>Name:</label>
                <input type="name" name="name" required="" class="form-control" disabled="" value="{{ $editor->user->name }}">
            </p>

            <p>
                <label>Email:</label>
                <input type="email" name="email" required="" class="form-control" disabled="" value="{{ $editor->user->email }}">
            </p>

            <p>
                <label>Industry:</label>
                <select name="industry" class="custom-select">
                    <option value="">All Industries</option>
                    @forelse($industries as $ind)
                    <option value="{{ $ind->id }}" {{ $ind->id == $editor->industry_id ? 'selected=""' : '' }}>{{ $ind->name }}</option>
                    @empty
                    @endforelse
                </select>
            </p>
            <p>
                <label>Status:</label>
                <select name="status" class="custom-select">
                    <option value="active" {{ $editor->status == 'active' ? 'selected=""' : '' }}>Active</option>
                    <option value="inactive" {{ $editor->status == 'inactive' ? 'selected=""' : '' }}>Inactive</option>
                </select>
            </p>
            <br>
            <p>
                <i>Inactive editors can't access cv requests platform</i>
                <input type="submit" value="Update Editor" class="btn btn-orange" style="float: right;">
            </p>
        </form>
    </div>
</div>


@endsection
