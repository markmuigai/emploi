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
            Pending {{ count(\App\CvEditRequest::where('cv_editor_id',$editor->id)->where('submitted_on',null)->get()) }} | Assigned {{ count($editor->cvEditRequests) }} | Completed {{ count(\App\CvEditRequest::where('cv_editor_id',$editor->id)->where('submitted_on','!=',null)->get()) }} 
        </h5>
        <hr>
        @include('components.editorProfile')
        <hr>
        <div class="row">
            @forelse($editor->cvEditRequests as $er)
            <div class="col-md-10 offset-md-1">
                
            </div>
            @empty
            <div class="col-md-10 offset-md-1">
                No Cv Editing requests have  been assigned
            </div>
            @endforelse
        </div>
    </div>
</div>


@endsection
