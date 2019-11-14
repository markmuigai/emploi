@extends('layouts.sign')

@section('title','Job Seeker Registration')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('user_title','Register')

{{--@include('seekers.search-input')--}}

<form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="fullName">Full Name</label>
        <input type="text" required="" path="fullName" name="name" id="fullName" class="form-control" maxlength="50" value="{{ old('name') }}" />
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="phone_number">Phone Number</label>
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
            @error('phone_number')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label for="sex">Gender</label>

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
        <label for="email">Email</label>
        <input type="email" required="" value="{{ old('email') }}" name="email" path="email" id="email" class="form-control" maxlength="50" />
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="country">Country</label>
        <select path="country" id="country" name="country" class="custom-select">
            @foreach($countries as $c)
            <option value="{{ $c->id }}" @if(old('country') && old('country')==$c->id)
                selected=""
                @endif
                >{{ $c->name }}</option>
            @endforeach

        </select>
    </div>
    <div class="form-group">
        <label for="industry">Industry</label>

        <select path="industry" id="industry" name="industry" class="custom-select">
            @foreach($industries as $c)
            <option value="{{ $c->id }}" @if(old('industry') && old('industry')==$c->id)
                selected=""
                @endif
                >{{ $c->name }}</option>
            @endforeach

        </select>
    </div>
    <label for="">Attach Your Resume</label>
    <div class="input-group mb-3">
        <input type="file" required="" path="resume" class="custom-file-input" name="resume" id="resume" accept=".doc, .docx,.pdf" />
        <label for="resume" class="custom-file-label">Attach Resume</label>
    </div>
    <div class="form-group">
        <label for="password">Password</label>

        <input type="password" required="" value="" name="password" id="password" class="form-control" maxlength="50" />

    </div>
    <div class="form-group">
        <label for="password_confirmation">Confirm Password</label>

        <input type="password" required="" value="" name="password_confirmation" id="password" class="form-control" maxlength="50" />

    </div>
    <div class="row">
        <div class="form-actions floatRight">
            <input type="submit" value="Register" class="btn btn-primary btn-sm">
        </div>
    </div>
</form>
<div class="login-bottom">
    <p style="display: none;">With your social media account</p>
    <div class="social-icons">
        <div class="button" style="display: none;">
            <a class="tw" href="#"> <i class="fa fa-linkedin tw2"> </i><span>Linkedin</span>
                <div class="clearfix"> </div>
            </a>
            <a class="fa" href="#"> <i class="fa fa-facebook tw2"> </i><span>Facebook</span>
                <div class="clearfix"> </div>
            </a>
            <a class="go" href="#"><i class="fa fa-google tw2"> </i><span>Google</span>
                <div class="clearfix"> </div>
            </a>
            <div class="clearfix"> </div>
        </div>
        <h4>
            Already have an account? <a href="{{ route('login') }}"> Login Here</a>

            <a href="/employers/register" class="pull-right btn btn-sm btn-primary"> Employer Registration</a>
        </h4>
    </div>
</div>

@endsection