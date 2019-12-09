@extends('layouts.dashboard-layout')

@section('title','Emploi :: Contact Failed')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Contact Failed')

<div class="card">
    <div class="card-body text-center">
        <p>
            An error occured that resulted in failure while submitting your message.
        </p>
        <p><em>
                Please try again later or contact us through other chanels.
            </em></p>

        <a href="/contact" class="btn btn-sm btn-orange">Contact Us</a>
        <a href="mailto:info@emploi.co" class="btn btn-sm btn-orange-alt">Email us</a>
    </div>
</div>


@endsection
