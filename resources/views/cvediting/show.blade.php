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
                    <a href="/cv-editing"><i class="fa fa-arrow-left"></i></a>
                    {{ $edit->slug }}
                </strong>  <br>
                    Requested: {{ $edit->created_at->diffForHumans() }}
                <br>
                Status: {{ $edit->status }}
                <p>
                    Phone: {{ $edit->phone_number }}<br>
                    Email: {{ $edit->email }}
                </p>
            </div>
            <div class="col-md-6">
                Industry: {{ $edit->industry->name }} <br>

                @guest
                @else

                @if(isset($edit->cvEditor->user_id) && Auth::user()->id == $edit->cvEditor->user->id)

                Requested by: {{ $edit->name }} <br>

                <a href="/cv-editing/{{ $edit->slug }}/edit" class="orange">edit request</a>
                <br>

                @endif
                @endguest

                Original CV: <a href="/storage/resume-edits/{{ $edit->original_url }}" class="btn btn-default btn-sm">view</a> <br>
                Edited CV: 
                @if($edit->submitted_url)
                <a href="/storage/resume-edits/{{ $edit->submitted_url }}" class="btn btn-link btn-sm">view</a>
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
