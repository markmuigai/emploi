@extends('layouts.dashboard-layout')

@section('title','Emploi :: Edit '.$company->name)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="card">
    <div class="card-body">
        <h2>
            Edit <b>{{ $company->name }}</b>
            <small class="pull-right">
                <a href="/profile" class="btn btn-sm btn-danger">My Profile</a>
            </small>
            
        </h2>
        <br><br>
        <form method="post" action="/companies/{{ $company->id }}" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}

            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" placeholder="" value="{{ $company->name }}" required="required" class="form-control">
            </div>

            <div class="form-group">
                <label>{{ $company->logo == null ? 'Upload Logo: *' : 'Update Logo:' }}</label>
                <input type="file" name="logo" placeholder="" class="form-control" {{ $company->logo == null ? 'required=""' : '' }}>
            </div>

            <div class="form-group">
                <label>{{ $company->cover == null ? 'Upload Cover: *' : 'Update Cover:' }}</label>
                <input type="file" name="cover" placeholder="" class="form-control" {{ $company->cover == null ? 'required=""' : '' }}>
            </div>

            <div class="form-group">
                <label>Tagline: *</label>
                <input type="text" name="tagline" placeholder="" value="{{ $company->tagline }}" required="required" class="form-control">
            </div>

            <div class="form-group">
                <label>Description: *</label>
                <textarea class="form-control" name="about" rows="4">{{ $company->about }} </textarea>
            </div>

            <div class="form-group">
                <label>Website:</label>
                <input type="url" name="website" placeholder="" value="{{ $company->website }}" class="form-control">
            </div>

            <div class="form-group">
                <label>Industry:</label>
                <select name="industry_id" class="custom-select">
                    @foreach($industries as $i)
                    <option value="{{ $i->id }}" @if($company->industry_id == $i->id)
                        selected=""
                        @endif
                        >{{ $i->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Company Size:</label>
                <select name="company_size_id" class="custom-select">
                    @foreach($sizes as $i)
                    <option value="{{ $i->id }}" @if($company->company_size_id == $i->id)
                        selected=""
                        @endif
                        >{{ $i->lower_limit.' - '.$i->upper_limit }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Location:</label>
                <select name="location_id" class="custom-select">
                    @foreach($locations as $i)
                    <option value="{{ $i->id }}" @if($company->location_id == $i->id)
                        selected=""
                        @endif
                        >
                        [ {{ strtoupper($i->country->name) }} ]
                        {{ $i->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" name="button" class="btn btn-orange">Save Company Details</button>
        </form>
    </div>
</div>

@endsection