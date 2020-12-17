@extends('layouts.sign')

@section('title','Job Seeker Registration')

@section('description')
Emploi is the Leading Platform for Talent Assessment and Matching for SME's in Africa. Upload your resume here.
@endsection

@section('meta-include')
<meta property="og:image" content="/images/500g.png">
<meta property="og:image:width"   content="500" />
<meta property="og:image:height"  content="500" />

<meta property="og:url"           content="{{ url('/job-seekers') }}/" />
<meta property="og:title"         content="Let's wake up your dream" />
<meta property="og:description"   content="Create a free job seeker account and grow your career." />
@endsection

@section('content')
@section('user_title','Job Seeker Registration')


{!! htmlScriptTagJsApi() !!}

   <!--  <h5 class="orange">Ready to jumpstart,  change or advance your career path?  Sign up today and get started.
    Join a pool of <span style="color: black">48,000+ job seekers.</span></h5><br> -->
<div class="container text-center">
    <div class="sign-left ">
        <a href="https://emploi.co/auth-with/facebook" class="pr-2"><i class="fab fa-facebook-f"></i></a>
        <a href="https://emploi.co/auth-with/google" class="pr-2"><i class="fab fa-google"></i></a>
        <a href="https://emploi.co/auth-with/linkedin" class="pr-2"><i class="fab fa-linkedin"></i></a>
    </div><hr>
<form method="POST" action="/create-account">
    @csrf
    @honeypot
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
            <label for="phone_number">Your Phone Number  <b style="color: red">*</b> </label>
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
        <div class="g-recaptcha"  id="recaptcha"  data-sitekey="6LdLhckZAAAAAAw00q3_UyaksiGoo7hbyjNcQ1it" class="form-control"  data-callback="enableBtn">                      
        </div>
        <br>
        <div class="text-center">                   
            <input type="submit" name="button" class="btn btn-orange" id="button1" disabled="disabled" value="Submit">
        </div>       

    </div>
</form>
<hr>
<h5 class="mt-4">
    Have an account?
    <a href="/login" class="btn btn-sm btn-orange-alt px-5">{{ __('auth.login') }}</a>
    or 
    <a href="/employers/register" class="btn btn-sm btn-orange-alt px-5">Company Registration</a>
</h5>
</div>

{{-- @include('components.ads.responsive') --}}


@endsection

<script type="text/javascript">
   function enableBtn(){
   document.getElementById("button1").disabled = false;
 }
</script>
