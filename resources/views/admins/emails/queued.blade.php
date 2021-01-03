@extends('layouts.dashboard-layout')

@section('title','Emploi :: Emails Queued')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Emails Queued')

<div class="card">
    <div class="card-body">
        <p> <a href="/admin/panel"><i class="fa fa-arrow-left"></i></a>
        </p>
        <hr>
        <p class="text-center">
            E-mails have been queued. <br><br>
            <a href="/admin/emails" class="btn btn-sm btn-orange-alt">Compose Emails</a>
        </p>
    </div>
</div>

@endsection