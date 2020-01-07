@extends('layouts.dashboard-layout')

@section('title','Emploi :: Referee Exists')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Error: Referee Exists')

<div class="card">
    <div class="card-body text-center">
        <p>
            <strong>{{ $name }}</strong> has already been added as one of your referees with the e-mail address <strong>{{ $email }}</strong>. Kindly add another referee to prevent duplication.
        </p>
        <p class="purple">Thank you for your co-operation in the recruitment process.</p>
        <a href="/profile/add-referee" class="btn btn-orange mt-4">Add Referee</a>
    </div>
</div>

@endsection
