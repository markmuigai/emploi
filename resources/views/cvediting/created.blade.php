@extends('layouts.dashboard-layout')

@section('title','Emploi :: CV Editing Requested')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'CV Editing Requested')

<div class="card">
    <div class="card-body text-center">
        <p>
            Howdy {{ $name }}, <br>
            {{ $message }}
        </p>

        <a href="/home" class="btn btn-orange mt-3">Home</a>
    </div>
</div>

@endsection
