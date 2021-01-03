@extends('layouts.dashboard-layout')

@section('title','Emploi :: Edit Issue')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Edit Issue')

<h2>
    <a href="#" class="btn btn-sm btn-orange-alt" onclick="window.history.back()"><i class="fa fa-arrow-left"></i> Back</a>
</h2>

<div class="card">
    <div class="card-body">
       
        <br>
        <form method="post" action="/issues/update/{{ $issue->id }}" enctype="multipart/form-data">
           @csrf

            <div class="form-group">
                <label>
                    Title:
                </label>
                <input type="text" name="title" placeholder="" value="{{ $issue->title }}" required="required" class="form-control" maxlength="500">
            </div>

            <div class="form-group">
                <label>
                    Description:
                </label>
                <textarea name="description" class="form-control" required="" id="description">{{ $issue->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="location">Assignee:</label>
                <select name="assignee" class="form-control input-sm">
                    @foreach($prof as $p)
                    <option value="{{ $p->user->name }}">{{ $p->user->name }}</option>
                    @endforeach
                </select>
            </div>
           

            
            <button type="submit" name="button" class="btn btn-orange">Save</button>
        </form>
    </div>
</div>
<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    setTimeout(function() {
        CKEDITOR.replace('description');
    }, 3000);
</script>

@endsection
