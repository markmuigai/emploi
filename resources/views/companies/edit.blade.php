@extends('layouts.dashboard-layout')

@section('title','Emploi :: Edit '.$company->name)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Edit Company Details')

<div class="card">
    <div class="card-body">
        <h2>
            {{ $company->name }}
            <small class="pull-right">
                <a href="/profile" class="btn btn-sm btn-orange">My Profile</a>
            </small>
        </h2>
        <br><br>
        {{-- @include('components.ads.responsive') --}}
        <form method="post" action="/companies/{{ $company->id }}" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}

            <div class="form-group">
                <label>
                    Name:
                    @error('name')
                        <strong class="text-danger"> * Invalid Company Name *</strong>
                    @enderror
                </label>
                <input type="text" name="name" placeholder="" value="{{ $company->name }}" required="required" class="form-control" maxlength="50">
            </div>

            <div class="form-group">
                <label>
                    {{ $company->logo == null ? 'Upload Logo: *' : 'Update Logo:' }} (png, jpg, jpeg Max 5MB)
                    @error('logo')
                        <strong class="text-danger"> * Uploaded logo was invalid *</strong>
                    @enderror
                </label>
                <input type="file" name="logo" placeholder="" {{ $company->logo == null ? 'required=""' : '' }}>
            </div>

            <div class="form-group">
                <label>
                    {{ $company->cover == null ? 'Upload Cover: ' : 'Update Cover:' }} (png, jpg, jpeg Max 5MB)
                    @error('cover')
                        <strong class="text-danger"> * Uploaded cover was invalid *</strong>
                    @enderror
                </label>
                <input type="file" name="cover" placeholder="">
            </div>

            <div class="form-group">
                <label>
                    Tagline: *
                    @error('tagline')
                        <strong class="text-danger"> * Invalid company Tagline *</strong>
                    @enderror
                </label>
                <input type="text" name="tagline" placeholder="" value="{{ $company->tagline }}" required="required" class="form-control" maxlength="255">
            </div>

            <div class="form-group">
                <label>
                    Description: *
                    @error('about')
                        <strong class="text-danger"> * Invalid company description *</strong>
                    @enderror
                </label>
                <textarea class="form-control" name="about" id="about" rows="4" maxlength="255">{{ $company->about }} </textarea>
            </div>

            <div class="form-group">
                <label>
                    Website Url:
                    @error('website')
                        <strong class="text-danger"> * Invalid Website Url *</strong>
                    @enderror
                </label>
                <input type="url" name="website" placeholder="" value="{{ $company->website }}"  maxlength="255" class="form-control">
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
                        >{{ $i->title }}</option>
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
<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    setTimeout(function() {
        CKEDITOR.replace('about');
    }, 3000);
</script>

@endsection
