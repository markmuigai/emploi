@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: CV Editors')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'CV Editors')


<div class="card">
    <div class="card-body">
        @forelse($editors as $editor)
        <div class="row">
            <div class="col-md-3">
                <img src="{{ asset($editor->user->getPublicAvatarUrl()) }}" style="width: 100%; border-radius: 50%">
            </div>
            <div class="col-md-5 col-12">
                <h4>
                    <a href="#" class="orange">
                        {{ $editor->user->name }}
                    </a>
                </h4>
                <p>
                    Role: {{ $editor->user->role }} <br>
                    Industry: {{ $editor->industry_id ? \App\Industry::find($editor->industry_id)->name : 'All Industries' }} <br>
                    Registered: {{ $editor->created_at }}
                </p>
            </div>
            <div class="col-md-4 col-12 text-md-right text-left">
                <p><a href="mailto:{{ $editor->user->email }}" class="orange">{{ $editor->user->email }}</a></p>
                <a href="{{ route('showcveditor',$editor->id) }}" class="btn btn-link btn-sm">View</a>
            </div>
        </div>
        @empty
        <p class="text-center">
            <a href="{{ route('adminpanel') }}" class="btn btn-default">
                <i class="fa fa-arrow-left"></i> Back
            </a>
            No CV Editors have been found! <br>
            <a href="{{ route('newcveditor') }}" class="btn btn-orange">Create</a>
        </p>
        @endforelse
        <hr>
        <div class="text-center">
            {{ $editors->links() }}
        </div>
    </div>
</div>


@endsection
