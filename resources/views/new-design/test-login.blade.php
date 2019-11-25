@extends('layouts.sign')

@section('title','Job Seeker Registration')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('user_title','Complete Registration')

{{--@include('seekers.search-input')--}}

<div class="accordion" id="accordionExample">
    <!-- EMPLOYER -->

    <div class="card">
        <div class="card-header" id="headingOne">
            <h4 class="accordion-heading" data-toggle="collapse" data-target="#collapseEmployer" aria-expanded="true" aria-controls="collapseEmployer">
                Employer
            </h4>
        </div>

        <div id="collapseEmployer" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                <h5>Employer Details</h5>
                <form method="POST" action="/employers/register">
                    @csrf
                    <div id="details">
                        <div class="form-group">
                            <label for="phone_number">Your Phone Number</label>
                            <div class="row pl-3">
                                <select class="custom-select col-3" name="contact_prefix">

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
                            <label for="password">Password</label>
                            <input type="password" required="" value="" name="password" path="password" id="password" class="form-control input-sm" maxlength="50" />
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" required="" value="" name="password_confirmation" path="password_confirmation" id="password_confirmation" class="form-control input-sm" maxlength="50" />
                        </div>
                        <div class="text-right">
                            <button class="btn btn-orange show-company">Next</button>
                        </div>

                    </div>
                    <div id="company" class="d-none">
                        <div class="form-group">
                            <label for="co_name">Company Name</label>
                            <input type="text" required="" value="{{ old('co_name') }}" name="co_name" path="co_name" id="co_name" class="form-control input-sm" maxlength="50" />
                            @error('co_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="co_email">Company Email</label>
                            <input type="email" required="" value="{{ old('co_email') }}" name="co_email" path="co_email" id="co_email" class="form-control input-sm" maxlength="50" />
                            @error('co_email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="co_phone_number">Company Phone Number</label>
                            <div class="row pl-3">
                                <select class="custom-select col-3" name="company_prefix">

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
                            <label for="country">Company Country</label>
                            <select path="country" id="country" name="country" class="form-control input-sm">

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="industry">Industry Specialization</label>
                            <select path="industry" id="industry" name="industry" class="form-control input-sm">

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="resume">Company Address</label>
                            <textarea name="address" required="" class="form-control input-sm" rows="2" placeholder="e.g. P.O. Box 123 - 00100 Nairobi. KICC Floor 21 Room 232"></textarea>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button class="show-details btn btn-orange"><i class="fas fa-chevron-left"></i> Back</button>
                            <button type="submit" name="button" class="btn btn-orange-alt">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JOBSEEKER -->

    <div class="card">
        <div class="card-header" id="headingTwo">
            <h4 class="accordion-heading" data-toggle="collapse" data-target="#collapseJobSeeker" aria-expanded="false" aria-controls="collapseJobSeeker">
                Job Seeker
            </h4>
        </div>
        <div id="collapseJobSeeker" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
                <h5>Job Seeker Details</h5>
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <div class="row pl-3">
                            <select class="custom-select col-3" name="prefix">

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
                        <label for="country">Country</label>
                        <select path="country" id="country" name="country" class="custom-select">

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="industry">Industry</label>

                        <select path="industry" id="industry" name="industry" class="custom-select">


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
                    <div class="text-center">
                        <button type="submit" name="button" class="btn btn-orange-alt">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $().ready(function() {
        var used = false;

        function showCompany() {
            var name = $('#fullName').val();
            if (name.length < 2)
                return alert('Invalid name');

            var phone_number = $('#phone_number').val();
            if (phone_number.length < 8)
                return alert('Invalid phone number');

            var email = $('#email').val();
            if (email.length < 8)
                return alert('Invalid e-mail address');

            var password = $('#password').val();
            if (password.length < 8)
                return alert('Password too short');

            var password_confirmation = $('#password_confirmation').val();
            if (password_confirmation.length < 8 || password != password_confirmation)
                return alert('Passwords do not match');

            $.ajax({
                type: 'GET',
                url: '/user/is/registered',
                data: {
                    email: $('#email').val()
                },
                success: function(response) {
                    console.log(response);
                    if (response == 'true') {
                        alert('E-mail address has been registered');

                    } else {
                        $('#details').addClass('d-none');
                        $('#company').removeClass('d-none');
                    }
                },
                error: function(e) {
                    alert('An error occurred while checking e-mail');
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