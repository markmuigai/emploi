@extends('layouts.dashboard-layout')

@section('title','Emploi :: Create Country')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Create Country')

<div class="card">
    <div class="card-body">
        <h2>
            New Country
            <small class="pull-right">
                <a href="/admin/countries" class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i> Back</a>
            </small>
        </h2>
        <br>
        <form method="post" action="/admin/countries" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>
                    Name:
                </label>
                <input type="text" name="name" placeholder="" value="" required="required" class="form-control" maxlength="50">
            </div>

            <div class="form-group">
                <label>
                    Phone Prefix:
                </label>
                <input type="number" name="prefix" placeholder="" value="" required="required" class="form-control" maxlength="5">
            </div>

            <div class="form-group">
                <label>
                    Code: e.g. KE
                </label>
                <input type="text" name="code" placeholder="" value="" required="required" class="form-control" maxlength="5">
            </div>

            <div class="form-group">
                <label>
                    Currency:
                </label>
                <input type="text" name="currency" placeholder="" value="" required="required" class="form-control" maxlength="10">
            </div>

            
            <button type="submit" name="button" class="btn btn-orange">Create Country</button>
        </form>
    </div>
</div>

@endsection
