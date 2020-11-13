@extends('layouts.dashboard-layout')

@section('title','Self Assessment :: Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Self-assessment Results')
<div class="container-fluid mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="row justify-content-end">
                <div class="col-md-4 my-2">
                    <a href="{{Route('assessments.index')}}" class="btn btn-success">
                        View All Assessment Questions
                    </a>
                </div>
            </div>
            <div class="card align-items-center px-2 shadow mb-5 bg-white rounded">
            </div>
        </div>
    </div>
</div>
@endsection
