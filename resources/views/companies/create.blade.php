@extends('layouts.dashboard-layout')

@section('title','Emploi :: Create a Company')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Add Company')

<div class="card">
    <div class="card-body">
        <h2>
            Create Company Profile
        </h2>
        <div class="search_form1 ">
            <form method="post" action="/companies" id="companyForm">
                @csrf

                <div class="form-group">
                    <label>Logo: *</label>
                    <input type="file" name="logo" placeholder="" required="required" accept=".png,.jpg,.jpeg" class="">
                </div>

                <div class="form-group">
                    <label>Name: *</label>
                    <input type="text" name="name" placeholder="" required="required" class="form-control" class="form-control">
                </div>

                <div class="form-group">
                    <label>Description: *</label>
                    <textarea class="form-control" id="about" name="about" rows="4"></textarea>
                </div>

                <div class="form-group">
                    <label>Website: *</label>
                    <input type="url" name="website" placeholder="" class="form-control">
                </div>

                <div class="form-group">
                    <label>Contact Phone Number: <i>optional</i></label>
                    <input type="text" name="phone_number" placeholder="2547xxxxxxxx" class="form-control" class="form-control">
                </div>

                <div class="form-group">
                    <label>Contact E-mail Address: <i>optional</i></label>
                    <input type="email" name="email" placeholder="someone@yourcompany.com" class="form-control">
                </div>

                <div class="form-group">
                    <label>Industry: *</label>
                    <select name="industry" class="custom-select">
                        @foreach($industries as $i)
                        <option value="{{ $i->id }}">{{ $i->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Company Size: *</label>
                    <select name="company_size" class="custom-select">
                        @foreach($sizes as $i)
                        <option value="{{ $i->id }}">{{ $i->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Location: *</label>
                    <select name="location" class="custom-select">
                        @foreach($locations as $i)
                        <option value="{{ $i->id }}">
                            [ {{ strtoupper($i->country->name) }} ]
                            {{ $i->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Cover Image: </label>
                    <input type="file" name="cover" placeholder="" required="required" accept=".png,.jpg,.jpeg">
                </div>
                <button type="submit" name="button" class="btn btn-orange">Create Company</button>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    setTimeout(function() {
        CKEDITOR.replace('about');
        // $('#submit_btn').click(function(e){
        // 	e.preventDefault();
        // 	var desc = CKEDITOR.instances['about'].getData().replace(/<[^>]*>/gi, '').length;
        //     if(desc < 10)
        //         return alert('Invalid company about');
        //     $('#companyForm').submit();
        // });

    }, 3000);
</script>

@endsection
