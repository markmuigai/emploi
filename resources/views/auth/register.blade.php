@extends('layouts.seek')

@section('title','Job Seeker Registration')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@include('seekers.search-input') 
<div class="container">
    <div class="single">  
       <div class="form-container">
        <h2>Register as a Job Seeker</h2>
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
          <div class="row">
            <div class="form-group col-md-12">
                <label class="col-md-3 control-lable" for="fullName">Full Name</label>
                <div class="col-md-9">
                    <input type="text" required="" path="fullName" name="name" id="fullName" class="form-control input-sm" maxlength="50" value="{{ old('name') }}" />
                </div>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
         </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label class="col-md-3 control-lable" for="phone_number">Phone Number</label>
                <div class="col-md-9 row">
                    <select class="input-sm col-md-2" style="float: left; margin-left: 1em" name="prefix">
                        @foreach($countries as $c)
                        <option value="{{ $c->id }}"
                            @if( old('prefix') && old('prefix') == $c->id)
                            selected="selected"
                            @endif
                            >
                            {{ $c->code }} {{ $c->prefix }}
                        </option>
                        @endforeach
                    </select>
                    <input type="number" required="" path="phone_number" value="{{ old('phone_number') }}" name="phone_number" id="phone_number" class="form-control input-sm col-md-10" style="float: right; width: 60%" placeholder="7123123123" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "15"/>
                </div>
                @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label class="col-md-3 control-lable" for="sex">Gender</label>
                <div class="col-md-9" class="form-control input-sm">
                    <div class="radios">
                        <label for="radio-01" class="label_radio">
                            <input type="radio" name="gender" value="M" 
                            @if(old('gender') && old('gender') == 'M')
                                checked=""
                            @endif
                            @if(!old('gender'))
                                checked=""
                            @endif
                            > Male
                        </label>
                        <label for="radio-02" class="label_radio">
                            <input type="radio" name="gender" value="F"
                            @if(old('gender') && old('gender') == 'F')
                                checked=""
                            @endif
                            > Female
                        </label>
                        <label for="radio-03" class="label_radio">
                            <input type="radio" name="gender" value="I"
                            @if(old('gender') && old('gender') == 'I')
                                checked=""
                            @endif
                            > Other
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label class="col-md-3 control-lable" for="email">Email</label>
                <div class="col-md-9">
                    <input type="email" required="" value="{{ old('email') }}" name="email" path="email" id="email" class="form-control input-sm" maxlength="50" />
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label class="col-md-3 control-lable" for="country">Country</label>
                <div class="col-md-9">
                    <select path="country" id="country" name="country" class="form-control input-sm">
                        @foreach($countries as $c)
                            <option value="{{ $c->id }}"
                            @if(old('country') && old('country') == $c->id)
                                selected=""
                            @endif
                            >{{ $c->name }}</option>
                        @endforeach
                        
                    </select>
                    
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12">
                <label class="col-md-3 control-lable" for="industry">Industry</label>
                <div class="col-md-9">
                    <select path="industry" id="industry" name="industry" class="form-control input-sm">
                        @foreach($industries as $c)
                            <option value="{{ $c->id }}"
                            @if(old('industry') && old('industry') == $c->id)
                                selected=""
                            @endif
                            >{{ $c->name }}</option>
                        @endforeach
                        
                    </select>
                    
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12">
                <label class="col-md-3 control-lable" for="resume">Attach Resume</label>
                <div class="col-md-9">
                    <input type="file" required="" path="resume" name="resume" id="resume" class="btn btn-sm" accept=".doc, .docx,.pdf"/>
                </div>
            </div>
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
        <div class="clearfix"> </div></a>
        <a class="fa" href="#"> <i class="fa fa-facebook tw2"> </i><span>Facebook</span>
        <div class="clearfix"> </div></a>
        <a class="go" href="#"><i class="fa fa-google tw2"> </i><span>Google</span>
        <div class="clearfix"> </div></a>
        <div class="clearfix"> </div>
        </div>
        <h4>
            Already have an account? <a href="{{ route('login') }}"> Login Here</a>

            <a href="/employers/register" class="pull-right btn btn-sm btn-primary"> Employer Registration</a>
        </h4>
        </div>
    </div>
                
    </div>
 </div>
</div>
@endsection