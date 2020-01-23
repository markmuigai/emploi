@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: CV Editors')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'CV Editors')


<div class="card">
    <div class="card-body">
        <a href="/admin/panel" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</a>
        @if(count($editors)>0)

        <a href="/admin/cveditors/create" class="btn btn-orange">Add Editor</a>
        <hr>
        @endif
        @forelse($editors as $editor)
        @include('components.editorProfile')
        @empty
        <p class="text-center">
            <a href="/admin/cveditors/create" class="btn btn-default">
                <i class="fa fa-arrow-left"></i> Back
            </a>
            No CV Editors have been found! <br>
            <a href="/admin/cveditors/create" class="btn btn-orange">Create</a>
        </p>
        @endforelse
        <hr>
        <div class="text-center">
            {{ $editors->links() }}
        </div>
    </div>
</div>


@endsection
