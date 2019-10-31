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
            <div id="details">
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
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-lable" for="password">Password</label>
                        <div class="col-md-9">
                            <input type="password" required="" value="" name="password" path="password" id="password" class="form-control input-sm" maxlength="50" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-lable" for="password_confirmation">Confirm Password</label>
                        <div class="col-md-9">
                            <input type="password" required="" value="" name="password_confirmation" path="password_confirmation" id="password_confirmation" class="form-control input-sm" maxlength="50" />
                        </div>
                    </div>
                </div>

                <div style="text-align: center;">
                    <br>
                    <span class="btn-orange show-company" style="text-decoration: none; cursor: pointer">Next</span>
                </div>

            </div>
            <div id="company" class="hidden">
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
                        <span style="float: left" class="show-details btn btn-success btn-sm"> < Edit Personal details </span>
                        <input type="submit" value="Register" class="btn btn-primary btn-sm pull-right">
                    </div>
                </div>
                
            </div>
            
        
        
        <hr>
        
        
    </form>
    <script type="text/javascript">
        $().ready(function(){
            var used = false;
            function showCompany(){
                var name = $('#fullName').val();
                if(name.length <2)
                    return alert('Invalid name');

                var phone_number = $('#phone_number').val();
                if(phone_number.length <8)
                    return alert('Invalid phone number');

                var email = $('#email').val();
                if(email.length <8)
                    return alert('Invalid e-mail address');

                var password = $('#password').val();
                if(password.length <8)
                    return alert('Password too short');

                var password_confirmation = $('#password_confirmation').val();
                if(password_confirmation.length <8 || password != password_confirmation)
                    return alert('Passwords do not match');

                $.ajax({
                    type: 'GET',
                    url: '/user/is/registered',
                    data: {
                        email: $('#email').val()
                    },
                    success: function(response) {
                        console.log(response);
                        if(response == 'true'){
                            alert('E-mail address has been registered');

                        }
                        else
                        {
                            $('#details').addClass('hidden');
                            $('#company').removeClass('hidden');
                        }

                            
                    },
                    error: function(e) {
                        alert('An error occurred while checking e-mail');
                    },
                });


                

                
            }
            function showDetails(){
                $('#company').addClass('hidden');
                $('#details').removeClass('hidden');
            }
            $('.show-company').click(function(){
                showCompany();
            });
            $('.show-details').click(function(){
                showDetails();
            });
        });
    </script>
                
    </div>
 </div>
</div>

@endsection