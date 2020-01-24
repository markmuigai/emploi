@extends('layouts.dashboard-layout')

@section('title','Emploi :: CV Editing Request')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'CV Editing Request')

<div class="card">
    <div class="card-body row">

        <div class="col-md-10 offset-md-1 row">
            <div class="col-md-6">
                <strong>
                    <a href="/cvediting"><i class="fa fa-arrow-left"></i></a>
                    {{ $edit->slug }}
                </strong>  <br>
                    Requested: {{ $edit->created_at->diffForHumans() }}
                <br>
                Status: {{ $edit->status }}
            </div>
            <div class="col-md-6">
                Industry: {{ $edit->industry->name }} <br>

                @if(Auth::user()->id == $edit->cvEditor->user->id)

                Requested by: {{ $edit->name }} <br>

                <a href="/cv-editing/{{ $edit->slug }}/edit" class="orange">edit request</a>
                <br>

                @endif

                Original CV: <a href="/storage/resumes/{{ $edit->original_url }}">view</a> <br>
                Edited CV: 
                @if($edit->submitted_url)
                <a href="/storage/resumes/{{ $edit->submitted_url }}" class="orange">view</a>
                @else
                -not submitted-
                @endif
                <br>
                Submitted on: {{ $edit->submitted_on }}
            </div>
        	
        </div>        
    </div>
</div>

@endsection
