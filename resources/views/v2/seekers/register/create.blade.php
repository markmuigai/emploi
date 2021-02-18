@extends('layouts.sign')

@section('title','Job Seeker Registration')

@section('description')
Emploi is the Leading Platform for Talent Assessment and Matching for SME's in Africa.
@endsection

@section('content')
@section('user_title','Job Seeker Registration')

<form method="POST" action="/v2/register/store" enctype="multipart/form-data">
    @csrf

    <div class="form-group mb-3">
        <label for="resume">Upload Your CV (.doc, .docx or .pdf) <small>(Max 5MB)</small> <b style="color: red">*</b></label>
        <input type="file" required="" path="resume" name="resume" id="resume" accept=".doc, .docx,.pdf" />
    </div>
   
    <div class="text-center">
        <button type="submit" name="button" class="btn btn-orange-alt">Upload</button>
    </div>
</form>
<h5 class="mt-4">Have an account?
    <a href="/login" class="btn btn-orange px-5">{{ __('auth.login') }}</a>
</h5>

<div class="mt-5">
    {{-- @include('components.ads.responsive') --}}
</div>

@endsection