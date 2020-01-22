@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Editor '.$editor->user->name)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Editor '.$editor->user->name)


<div class="card">
    <div class="card-body">
        <h5>
            <a href="/admin/cveditors" class="btn btn-default">
                <i class="fa fa-arrow-left"></i> 
            </a> 
            Pending 0 | Assigned 0 | Completed 0
        </h5>
        <hr>
        @include('components.editorProfile')
        <hr>
        <div class="row">

        </div>
    </div>
</div>


@endsection
