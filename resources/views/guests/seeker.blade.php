@extends('layouts.sign')

@section('title','Job Seeker Account')

@section('description')
Emploi is the Leading Platform for Talent Assessment and Matching for SME's in Africa.
@endsection

@section('content')
@section('user_title','Job Seeker Account')


<form method="POST" action="/guests/i-am-a-job-seeker" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="phone_number">Phone Number <b style="color: red">*</b></label>
        @error('phone_number')
        <p class="text-danger">
            <strong>{{ $message }}</strong>
        </p>
        @enderror
        <div class="row pl-3">
            <select class="custom-select col-3" name="prefix">
                @foreach($countries as $c)
                <option value="{{ $c->id }}" @if( old('prefix') && old('prefix')==$c->id)
                    selected="selected"
                    @endif
                    >
                    {{ $c->code }} {{ $c->prefix }}
                </option>
                @endforeach
            </select>
            <input type="number" required="" path="phone_number" value="{{ old('phone_number') }}" name="phone_number" id="phone_number" class="form-control col-8 ml-3" placeholder="7123123123"
              oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" />
        </div>
    </div>
    <div class="form-group">
        <label for="sex">Gender <b style="color: red">*</b></label>
        <div class="radios">
            <label for="radio-01" class="label_radio">
                <input type="radio" name="gender" value="M" @if(old('gender') && old('gender')=='M' ) checked="" @endif @if(!old('gender')) checked="" @endif> Male
            </label>
            <label for="radio-02" class="label_radio">
                <input type="radio" name="gender" value="F" @if(old('gender') && old('gender')=='F' ) checked="" @endif> Female
            </label>
            <label for="radio-03" class="label_radio">
                <input type="radio" name="gender" value="I" @if(old('gender') && old('gender')=='I' ) checked="" @endif> Other
            </label>
        </div>
    </div>
    <div class="form-group">
        <label for="location">Location <b style="color: red">*</b></label>
        <select path="location" id="location" name="location" class="custom-select">
            @foreach($locations as $location)
            <option value="{{ $location->id }}" @if(old('location') && old('location')==$location->id)
                selected=""
                @endif
                >{{ $location->country->name.', '.$location->name }}</option>
            @endforeach

        </select>
    </div>
    <div class="form-group">
        <label for="industry">Industry <b style="color: red">*</b></label>

        <select path="industry" id="industry" name="industry" class="custom-select">
            @foreach($industries as $c)
            <option value="{{ $c->id }}" @if(old('industry') && old('industry')==$c->id)
                selected=""
                @endif
                >{{ $c->name }}</option>
            @endforeach

        </select>
    </div>
    @error('resume')
    <p class="text-danger"> <b style="color: red">*</b> File uploaded is more than 5MB <b style="color: red">*</b></p>
    @enderror
    <div class="form-group mb-3">
        <label for="resume">Attach Your Resume (.doc, .docx or .pdf) <small>(Max 5MB)</small> <b style="color: red">*</b></label>
        <input type="file" required="" path="resume" name="resume" id="resume" accept=".doc, .docx,.pdf" />
    </div>
    

    <div class="text-center">
        <button type="submit" name="button" class="btn btn-orange-alt">Create Job Seeker Profile</button>
    </div>
</form>
<hr>
<h5 class="mt-4">Are you an Employer?
    <a href="/guests/i-am-an-employer" class="btn btn-orange px-5">Create Employer Profile</a>
</h5>

{{-- @include('components.ads.responsive') --}}


@endsection