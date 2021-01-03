@extends('layouts.dashboard-layout')

@section('title','Emploi :: Edit '.$country->name)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Edit '.$country->name)

<div class="card">
    <div class="card-body">
        <h2>
            {{ $country->name }}
            <small class="pull-right">
                <a href="/admin/countries/{{ $country->id }}" class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i> Back</a>
            </small>
        </h2>
        <br>
        <form method="post" action="/admin/countries/{{ $country->id }}" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}

            <div class="form-group">
                <label>
                    Name:
                    @error('name')
                        <strong class="text-danger"> * Invalid Country Name *</strong>
                    @enderror
                </label>
                <input type="text" name="name" placeholder="" value="{{ $country->name }}" required="required" class="form-control" maxlength="50">
            </div>

            <div class="form-group">
                <label>
                    Phone Prefix:
                    @error('prefix')
                        <strong class="text-danger"> * Invalid Country Prefix *</strong>
                    @enderror
                </label>
                <input type="number" name="prefix" placeholder="" value="{{ $country->prefix }}" required="required" class="form-control" maxlength="5">
            </div>

            <div class="form-group">
                <label>
                    Code: e.g. KE
                    @error('code')
                        <strong class="text-danger"> * Invalid Country Code *</strong>
                    @enderror
                </label>
                <input type="text" name="code" placeholder="" value="{{ $country->code }}" required="required" class="form-control" maxlength="5">
            </div>

            <div class="form-group">
                <label>
                    Currency:
                    @error('currency')
                        <strong class="text-danger"> * Invalid Country Currency *</strong>
                    @enderror
                </label>
                <input type="text" name="currency" placeholder="" value="{{ $country->currency }}" required="required" class="form-control" maxlength="5">
            </div>

            
            <button type="submit" name="button" class="btn btn-orange">Update Country</button>
        </form>
    </div>
</div>

@endsection
