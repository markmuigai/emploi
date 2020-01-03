@extends('layouts.sign')

@section('title','Register as Employer')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('user_title','Employer Registration')

<div class="sign-left text-center">
    <h5>- Continue With -</h5>
    <a href="/auth-with/facebook" class="pr-2"><i class="fab fa-facebook-f"></i></a>
    <a href="/auth-with/google" class="pr-2"><i class="fab fa-google"></i></a>
    <a href="/auth-with/linkedin" class="pr-2"><i class="fab fa-linkedin"></i></a>
</div>

<form method="POST" action="/employers/register">
    @csrf
    <div id="details">
        <div class="form-group">
            <label for="fullName">Your Full Name <b style="color: red">*</b></label>
            <input type="text" required="" path="fullName" name="name" id="fullName" class="form-control input-sm" maxlength="50" value="{{ $name ? $name : old('name') }}" />
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="phone_number">Your Phone Number <b style="color: red">*</b></label>
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
            <input type="email" required="" value="{{ $email ? $email : old('email') }}" name="email" path="email" id="email" class="form-control input-sm" maxlength="50" />
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password <b style="color: red">*</b></label>
            <input type="password" required="" value="" name="password" path="password" id="password" class="form-control input-sm" maxlength="50" />
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password <b style="color: red">*</b></label>
            <input type="password" required="" value="" name="password_confirmation" path="password_confirmation" id="password_confirmation" class="form-control input-sm" maxlength="50" />
        </div>
        <div class="text-right">
            <button class="btn btn-orange show-company">Next</button>
        </div>

    </div>
    <div id="company" class="d-none">
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
            <button class="show-details btn btn-orange"><i class="fas fa-chevron-left"></i> Back</button>
            <button type="submit" name="button" class="btn btn-orange-alt">Register</button>
        </div>
    </div>
</form>
<h5 class="mt-4">Have an account?
    <a href="/login" class="btn btn-orange px-5">Login</a>
</h5>
<script type="text/javascript">
    $().ready(function() {
        var used = false;

        function showCompany() {
            var name = $('#fullName').val();
            if (name.length < 2)
                return notify('Invalid name', 'error');

            var phone_number = $('#phone_number').val();
            if (phone_number.length < 8)
                return notify('Invalid phone number', 'error');

            var email = $('#email').val();
            if (email.length < 8)
                return notify('Invalid e-mail address', 'error');

            var password = $('#password').val();
            if (password.length < 8)
                return notify('Password too short', 'error');

            var password_confirmation = $('#password_confirmation').val();
            if (password_confirmation.length < 8 || password != password_confirmation)
                return notify('Passwords do not match', 'error');

            $.ajax({
                type: 'GET',
                url: '/user/is/registered',
                data: {
                    email: $('#email').val()
                },
                success: function(response) {
                    console.log(response);
                    if (response == 'true') {
                        notify('E-mail address has been registered', 'error');

                    } else {
                        $('#details').addClass('d-none');
                        $('#company').removeClass('d-none');
                    }
                },
                error: function(e) {
                    notify('An error occurred while checking e-mail', 'error');
                },
            });
        }

        function showDetails() {
            $('#company').addClass('d-none');
            $('#details').removeClass('d-none');
        }
        $('.show-company').click(function() {
            showCompany();
        });
        $('.show-details').click(function() {
            showDetails();
        });
    });
</script>


@endsection
