@extends('layouts.dashboard-layout')

@section('title','Emploi :: Admin Panel')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Companies')

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-8">

            </div>
            <div class="col-4 text-right">
                <p>[{{ $admin->jurisdictions[0]->country->name }}]</p>
            </div>
        </div>
        <div class="text-center">
            <p></p>
        </div>
    </div>
</div>

@endsection