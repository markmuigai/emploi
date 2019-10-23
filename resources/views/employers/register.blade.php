@extends('layouts.seek')

@section('title','Register as Employer')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="container">
    <div class="single">  
       <div class="form-container">
        <h2>Employer Registration</h2>
        <form method="POST" action="/employers/register">
            @csrf
          <div class="row">
            <div class="form-group col-md-12">
                <label class="col-md-3 control-lable" for="fullName">Your Full Name</label>
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
                <label class="col-md-3 control-lable" for="phone_number">Your Phone Number</label>
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
                <label class="col-md-3 control-lable" for="email">Your Email</label>
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
        <hr>
        <div class="row">
            <div class="form-group col-md-12">
                <label class="col-md-3 control-lable" for="co_name">Company Name</label>
                <div class="col-md-9">
                    <input type="text" required="" value="{{ old('co_name') }}" name="co_name" path="co_name" id="co_name" class="form-control input-sm" maxlength="50" />
                </div>
                @error('co_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label class="col-md-3 control-lable" for="co_email">Company Email</label>
                <div class="col-md-9">
                    <input type="email" required="" value="{{ old('co_email') }}" name="co_email" path="co_email" id="co_email" class="form-control input-sm" maxlength="50" />
                </div>
                @error('co_email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label class="col-md-3 control-lable" for="co_phone_number">Company Phone Number</label>
                <div class="col-md-9 row">
                    <select class="input-sm col-md-2" style="float: left; margin-left: 1em" name="coPrefix">
                        @foreach($countries as $c)
                        <option value="{{ $c->id }}"
                            @if( old('coPrefix') && old('coPrefix') == $c->id)
                            selected="selected"
                            @endif
                            >
                            {{ $c->code }} {{ $c->prefix }}
                        </option>
                        @endforeach
                    </select>
                    <input type="number" required="" path="co_phone_number" value="{{ old('co_phone_number') }}" name="co_phone_number" id="co_phone_number" class="form-control input-sm col-md-10" style="float: right; width: 60%" placeholder="7123123123" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "15"/>
                </div>
                @error('co_phone_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label class="col-md-3 control-lable" for="country">Company Country</label>
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
                <label class="col-md-3 control-lable" for="industry">Industry Specialization</label>
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
                <label class="col-md-3 control-lable" for="resume">Company Address</label>
                <div class="col-md-9">
                	<textarea name="address" required="" class="form-control input-sm" rows="2" placeholder="e.g. P.O. Box 123 - 00100 Nairobi. KICC Floor 21 Room 232"></textarea>
                    
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

            <a href="/register" class="pull-right btn btn-sm btn-primary"> Job Seeker Registration</a>
        </h4>
        </div>
    </div>
                
    </div>
 </div>
</div>

@endsection