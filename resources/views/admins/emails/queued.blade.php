@extends('layouts.dashboard-layout')

@section('title','Emploi :: Emails Queued')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Emails Queued')

<div class="card">
    <div class="card-body">
        <p <i class="fa fa-arrow-left" onclick="window.location = '/admin/panel'"></i>
        </p>
        <hr>
        <p class="text-center">
            E-mails have been queued.
        </p>
    </div>
</div>

@endsection