@extends('layouts.sign')

@section('title','Job Seeker Registration')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('user_title','Job Seeker Registration')

<div class="sign-left text-center">
    <h5>- Continue With -</h5>
    <a href="/auth-with/facebook" class="pr-2"><i class="fab fa-facebook-f"></i></a>
    <a href="/auth-with/google" class="pr-2"><i class="fab fa-google"></i></a>
    <a href="/auth-with/linkedin" class="pr-2"><i class="fab fa-linkedin"></i></a>
</div>
<form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="fullName">Full Name</label>
        @error('name')
        <p class="text-danger">
          {{ $message }}
        </p>
        @enderror
        <input type="text" required="" path="fullName" name="name" id="fullName" class="form-control" maxlength="50" value="{{ old('name') }}" />
    </div>
    <div class="form-group">
        <label for="phone_number">Phone Number</label>
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
        <label for="email">
            Email
        </label>
        @error('email')
        <p class="text-danger"> * Email already registered *</p>
        @enderror
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
    @error('resume')
        <p class="text-danger"> * File uploaded is more than 5MB *</p>
    @enderror
    <div class="form-group mb-3">
        <label for="resume">Attach Your Resume (.doc, .docx or .pdf) <small>(Max 5MB)</small></label>
        <input type="file" required="" path="resume" name="resume" id="resume" accept=".doc, .docx,.pdf" />
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" required="" value="" name="password" id="password" class="form-control" maxlength="50" />

    </div>
    <div class="form-group">
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" required="" value="" name="password_confirmation" id="password" class="form-control" maxlength="50" />
    </div>
    <div class="text-center">
        <button type="submit" name="button" class="btn btn-orange-alt">Register</button>
    </div>
</form>
<h5 class="mt-4">Have an account?
    <a href="/login" class="btn btn-orange px-5">Login</a>
</h5>


@endsection
