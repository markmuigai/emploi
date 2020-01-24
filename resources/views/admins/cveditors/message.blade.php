@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: '.$title)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', $title)


<div class="card">
    <div class="card-body">
        <h5>
            <a href="/admin/cveditors" class="btn btn-default">
                <i class="fa fa-arrow-left"></i> 
            </a> 
            {{ $title }}
        </h5>
        <p>
            {{ $message }}
        </p>
    </div>
</div>


@endsection
