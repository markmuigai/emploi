@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Cv Editing Request '.$edit->name)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title', $edit->name)

@section('content')

<div class="card">
    <div class="card-body">
        <div class="row" style="text-align: right; border-bottom: 0.1em solid #ff5e00">
            <a href="/admin/cv-edit-requests" class="btn btn-default">
            <i class="fa fa-arrow-left"></i> Back
            </a>  
            <br><hr>
        </div>
        <div class="row">
            <div class="col-md-8">
                <h4>
                    {{ $edit->name }}
                    <small>{{ $edit->created_at->diffForHumans() }}</small>
                </h4>
                <p>
                    <b>{{ $edit->industry->name }}</b> <a href="/storage/resume-edits/{{ $edit->original_url }}">Initial CV</a><br>
                    {{ $edit->message }}
                </p>
                <p>
                    Phone: {{ $edit->phone_number }}<br>
                    Email: {{ $edit->email }}
                </p>
                
            </div>
            <div class="col-md-4 text-right">
                <p><strong>{{ $edit->status }}</strong> </p>
                @if(!isset($edit->cv_editor_id))
                    @if(count($editors) > 0)
                    <form method="POST" action="/admin/cv-edit-requests/{{ $edit->id }}/assign" id="assignCv">
                        @csrf
                        <label>Assign to</label>
                        <select class="form-control" onchange="" required="" name="editor_id">
                            @forelse($editors as $editor)
                            <option value="{{ $editor->id }}">{{ $editor->user->name }}</option>
                            @empty
                            @endforelse
                        </select>
                        <input type="submit" value="Assign" class="btn btn-primary">
                    </form>
                    @else
                    <p>
                        No Cv Editors match. <a href="/admin/cveditors" class="btn btn-sm btn-link">Manage CV Editors</a>
                    </p>

                    @endif
                @else
                Assignee: <a href="/admin/cveditors/{{ $edit->cvEditor->id }}" class="orange">{{ $edit->cvEditor->user->name }}</a> <br>
                Email: {{ $edit->cvEditor->user->email }}
                Assigned: {{ $edit->assigned_on }}
                @endif
            </div>
        </div>
        @if(isset($edit->cv_editor_id))
            <hr>
            <div class="row">
                @if($edit->submitted_on)
                <div class="col-md-8 offset-md-2">
                    Final Cv: <a href="/storage/resume-edits/{{ $edit->submitted_url }}">View CV</a> <br>
                    Last Submission: {{ $edit->submitted_on }}
                </div>
                @else
                <div class="col-md-8 offset-md-2">
                    <p>
                        Final edit has not been submitted yet.
                    </p>
                </div>
                @endif
            </div>
        @endif
        
    </div>
</div>



@endsection