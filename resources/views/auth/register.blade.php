@extends('layouts.sign')

@section('title','Job Seeker Registration')

@section('description')
Emploi is the Leading Platform for Talent Assessment and Matching for SME's in Africa.
@endsection

@section('content')
@section('user_title','Job Seeker Registration')

@include('components.social-auth')

<form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="fullName">Full Name <b style="color: red">*</b></label>
        @error('name')
        <p class="text-danger">
            {{ $message }}
        </p>
        @enderror
        <input type="text" required="" path="fullName" name="name" id="fullName" class="form-control" maxlength="50" value="{{ $name ? $name : old('name') }}" />
    </div>
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
        <label for="email">
            Email <b style="color: red">*</b>
        </label>
        @error('email')
        <p class="text-danger"> * Email already registered *</p>
        @enderror
        <input type="email" required="" value="{{ $email ? $email : old('email') }}" name="email" path="email" id="email" class="form-control" maxlength="50" />
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="country">Country <b style="color: red">*</b></label>
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
    <div class="form-group">
        <label for="password">Password <b style="color: red">*</b><small> (Min 8 Characters)</small> <b> </b></label>
        <input type="password" required="" value="" name="password" id="password" class="form-control" maxlength="50" />

    </div>
    <div class="form-group">
        <label for="password_confirmation">Confirm Password <b style="color: red">*</b></label>
        <input type="password" required="" value="" name="password_confirmation" id="password" class="form-control" maxlength="50" />
    </div>

    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required="">
        <label class="form-check-label" for="defaultCheck1">
            I agree to the <a href="/terms-and-conditions" class="orange">Terms And Conditions</a>  <b style="color: red" title="Required">*</b>
        </label>
    </div>

    <div class="text-center">
        <button type="submit" name="button" class="btn btn-orange-alt">{{ __('auth.register') }}</button>
    </div>
</form>
<h5 class="mt-4">Have an account?
    <a href="/login" class="btn btn-orange px-5">{{ __('auth.login') }}</a>
</h5>

@include('components.ads.responsive')


@endsection