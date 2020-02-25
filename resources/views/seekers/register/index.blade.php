@extends('layouts.sign')

@section('title','Job Seeker Registration')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('user_title','Job Seeker Registration')


<form method="POST" action="/create-account">
    @csrf
    <div id="details">
        <div class="form-group">
            <label for="fullName">Your Full Name <b style="color: red">*</b></label>
            <input type="text" required="" path="fullName" name="name" id="fullName" class="form-control input-sm" maxlength="50" value="{{ old('name') }}" />
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="phone_number">Your Phone Number </label>
            <div class="row pl-3">
                <select class="custom-select col-3" name="contact_prefix">
                    @foreach($countries as $c)
                    <option value="{{ $c->id }}" @if( old('prefix') && old('prefix')==$c->id)
                        selected="selected"
                        @endif
                        >
                        {{ $c->code }} {{ $c->prefix }}
                    </option>
                    @endforeach
                </select>
                <input type="number" path="phone_number" value="{{ old('phone_number') }}" name="phone_number" id="phone_number" class="form-control col-8 ml-3" placeholder="7123123123"
                  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" />
                @error('phone_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="email">Your Email <b style="color: red">*</b></label>
            @error('email')
            <p class="text-danger"> * Email already registered *</p>
            @enderror
            <input type="email" required="" value="{{ old('email') }}" name="email" path="email" id="email" class="form-control input-sm" maxlength="50" />
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="industry">Industry Specialization <b style="color: red">*</b></label>
            <select path="industry" id="industry" name="industry" class="form-control input-sm">
                @foreach($industries as $c)
                <option value="{{ $c->id }}" @if(old('industry') && old('industry')==$c->id)
                    selected=""
                    @endif
                    >{{ $c->name }}</option>
                @endforeach

            </select>
        </div>
        <div class="form-check mb-4">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required="">
            <label class="form-check-label" for="defaultCheck1">
                I agree to the <a href="/terms-and-conditions" class="orange">Terms And Conditions</a>
            </label>
        </div>
        <div class="d-flex justify-content-between">
            <button type="submit" name="button" class="btn btn-orange">Register <i class="fas fa-chevron-right"></i></button>
        </div>
        

    </div>
</form>
<hr>
<h5 class="mt-4">
    Have an account?
    <a href="/login" class="btn btn-sm btn-orange-alt px-5">Login</a>
    or 
    <a href="/employers/register" class="btn btn-sm btn-orange-alt px-5">Company Registration</a>
</h5>


@endsection
