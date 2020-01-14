@extends('layouts.dashboard-layout')

@section('title','Emploi :: Create Unregistered User')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Create Unregistered User')

<div class="card">
    <div class="card-body">
        <h2>
            <small class="pull-right">
                <a href="/admin/unregistered-users" class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i> Back</a>
            </small>
        </h2>
        <br>
        <form method="post" action="/admin/unregistered-users" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>
                    Name:
                </label>
                <input type="text" name="name" placeholder="" value="" required="required" class="form-control" maxlength="50">
            </div>

            <div class="form-group">
                <label>
                    Email
                </label>
                <input type="email" name="email" placeholder="" value="" required="required" class="form-control" maxlength="50">
            </div>

            
            <button type="submit" name="button" class="btn btn-orange">Create Record</button>
        </form>
    </div>
</div>

@endsection
