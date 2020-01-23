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
            @include('components.editorStats')
        </h5>
        <hr>
        @include('components.editorProfile')
        <hr>
        <div class="row">
            @forelse($editor->cvEditRequests as $er)
            <div class="col-md-10 offset-md-1">
                <strong>{{ $er->name }}</strong> <i style="float: right;">{{ $er->status }}</i>
                <br> <small>{{ $er->industry->name }}</small> <a href="/admin/cv-edit-requests/{{ $er->id }}" class="orange" style="float: right;">view request</a>
                <br>
                Assigned: {{ $er->assigned_on }} | Submitted: {{ $er->submitted_on }} 
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
