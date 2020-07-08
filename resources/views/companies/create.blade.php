@extends('layouts.dashboard-layout')

@section('title','Emploi :: Create a Company')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Add Company')

<div class="card">
    <div class="card-body">
        <h2>
            Create Company Profile
        </h2>
        @include('components.ads.responsive')
        <div class="search_form1 ">
            <form method="post" action="/companies" id="companyForm" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>
                        Logo: <b style="color: red">*</b> (png, jpg and jpeg Max 5MB)
                        @error('logo')
                            <strong class="pull-right text-danger"> * Uploaded logo was invalid *</strong>
                        @enderror
                    </label>
                    <input type="file" name="logo" placeholder="" required="required" accept=".png,.jpg,.jpeg" class="">
                </div>

                <div class="form-group">
                    <label>
                        Name: <b style="color: red">*</b>
                        @error('name')
                            <strong class="pull-right text-danger"> * A company with this name has been registered *</strong>
                        @enderror
                    </label>
                    <input type="text" name="name" placeholder="" value="{{ old('name') }}" required="required" class="form-control" class="form-control" maxlength="50">
                </div>

                <div class="form-group">
                    <label>
                        Description: *
                        @error('about')
                            <strong class="pull-right text-danger"> * Invalid company description *</strong>
                        @enderror
                    </label>
                    <textarea class="form-control" id="about" name="about" rows="4" maxlength="255" required="">{{ old('about') }}</textarea>
                </div>

                <div class="form-group">
                    <label>
                        Website url:
                        @error('website')
                            <strong class="pull-right text-danger"> * Invalid Website Url *</strong>
                        @enderror
                    </label>
                    <input type="url" name="website" placeholder="" class="form-control" maxlength="255" value="{{ old('website') }}">
                </div>

                <div class="form-group">
                    <label>
                        Contact Phone Number:
                        @error('phone_number')
                            <strong class="pull-right text-danger"> * Invalid Phone Number *</strong>
                        @enderror
                    </label>
                    <input type="text" name="phone_number" placeholder="2547xxxxxxxx" class="form-control" class="form-control" maxlength="20" value="{{ old('phone_number') }}">
                </div>

                <div class="form-group">
                    <label>
                        Contact E-mail Address: <b style="color: red">*</b>
                        @error('email')
                            <strong class="pull-right text-danger"> * Invalid E-mail address *</strong>
                        @enderror
                    </label>
                    <input type="email" name="email" placeholder="someone@yourcompany.com" class="form-control" maxlength="50" value="{{ old('email') }}" required="required" >
                </div>

                <div class="form-group">
                    <label>Industry: *</label>
                    <select name="industry" class="custom-select">
                        @foreach($industries as $i)
                        <option value="{{ $i->id }}">{{ $i->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Company Size: *</label>
                    <select name="company_size" class="custom-select">
                        @foreach($sizes as $i)
                        <option value="{{ $i->id }}">{{ $i->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Location: *</label>
                    <select name="location" class="custom-select">
                        @foreach($locations as $i)
                        <option value="{{ $i->id }}">
                            [ {{ strtoupper($i->country->name) }} ]
                            {{ $i->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>
                        Cover Image: (png, jpg and jpeg)
                        @error('cover')
                            <strong class="pull-right text-danger"> * Uploaded cover image was invalid *</strong>
                        @enderror
                    </label>
                    <input type="file" name="cover" placeholder="" accept=".png,.jpg,.jpeg">
                </div>
                <button type="submit" name="button" class="btn btn-orange">Create Company</button>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    setTimeout(function() {
        CKEDITOR.replace('about');
    }, 3000);
</script>

@endsection
