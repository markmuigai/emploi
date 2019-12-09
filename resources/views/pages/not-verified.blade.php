@extends('layouts.general-layout')

@section('title','Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="card">
    <div class="card-body text-center">
      <h2>Account Not Verified</h2>
        <p>
            We value our users which is why we require all accounts to be verified.
        </p>
        <p><em>
                A confirmation e-mail has been re-sent to your e-mail address.
            </em></p>
        <a href="/login" class="btn btn-orange">Login</a>
    </div>
</div>


@endsection
