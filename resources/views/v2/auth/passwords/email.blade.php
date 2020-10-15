@extends('layouts.sign')

@section('title','Emploi :: Reset Password')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('user_title','Reset Password')


@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<form method="POST" action="{{ route('password.email') }}">
    @csrf

    <div class="form-group">
        <label for="email">{{ __('E-Mail Address') }}  <b style="color: red" title="Required">*</b></label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="text-right">
        <button type="submit" class="btn btn-orange">
            {{ __('Send Password Reset Link') }}
        </button>
    </div>
    @include('components.ads.responsive')
</form>

@endsection
