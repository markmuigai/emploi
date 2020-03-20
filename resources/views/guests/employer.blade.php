@extends('layouts.sign')

@section('title','Register a Company')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('user_title','Create Company Profile')

<form method="POST" action="/guests/i-am-an-employer">
    @csrf
    
    <div id="company">
        <div class="form-group">
            <label for="co_phone_number">Your Phone Number <b style="color: red">*</b></label>
            <div class="row pl-3">
                <select class="custom-select col-3" name="phone_prefix">
                    @foreach($countries as $c)
                    <option value="{{ $c->id }}" @if( old('prefix') && old('prefix')==$c->id)
                        selected="selected"
                        @endif
                        >
                        {{ $c->code }} {{ $c->prefix }}
                    </option>
                    @endforeach
                </select>
                <input type="number" required="" path="phone_number" value="{{ old('co_phone_number') }}" name="co_phone_number" id="co_phone_number" class="form-control col-8 ml-3" placeholder="7123123123"
                  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" />
                @error('co_phone_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <hr>
        <div class="form-group">
            <label for="co_name">Company Name <b style="color: red">*</b></label>
            <input type="text" required="" value="{{ old('co_name') }}" name="co_name" path="co_name" id="co_name" class="form-control input-sm" maxlength="50" />
            @error('co_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="co_email">Company Email <b style="color: red">*</b></label>
            <input type="email" required="" value="{{ old('co_email') }}" name="co_email" path="co_email" id="co_email" class="form-control input-sm" maxlength="50" />
            @error('co_email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="co_phone_number">Company Phone Number <b style="color: red">*</b></label>
            <div class="row pl-3">
                <select class="custom-select col-3" name="company_prefix">
                    @foreach($countries as $c)
                    <option value="{{ $c->id }}" @if( old('prefix') && old('prefix')==$c->id)
                        selected="selected"
                        @endif
                        >
                        {{ $c->code }} {{ $c->prefix }}
                    </option>
                    @endforeach
                </select>
                <input type="number" required="" path="co_phone_number" value="{{ old('co_phone_number') }}" name="co_phone_number" id="co_phone_number" class="form-control col-8 ml-3" placeholder="7123123123"
                  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" />
                @error('co_phone_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="country">Company Country <b style="color: red">*</b></label>
            <select path="country" id="country" name="country" class="form-control input-sm">
                @foreach($countries as $c)
                <option value="{{ $c->id }}" @if(old('country') && old('country')==$c->id)
                    selected=""
                    @endif
                    >{{ $c->name }}</option>
                @endforeach

            </select>
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
        <div class="form-group">
            <label for="resume">Company Address <b style="color: red">*</b></label>
            <textarea name="address" required="" class="form-control input-sm" rows="2" placeholder="e.g. P.O. Box 123 - 00100 Nairobi. KICC Floor 21 Room 232"></textarea>
        </div>

        <div class="d-flex justify-content-between">
            <input type="submit" value="Create Employer Profile" class="btn btn-orange-alt">
        </div>
    </div>
</form>
<hr>
<h5 class="mt-4">Are you a Job Seeker??
    <a href="/guests/i-am-a-job-seeker" class="btn btn-orange px-5">Create Job Seeker Profile</a>
</h5>



@endsection
