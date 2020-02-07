@extends('layouts.dashboard-layout')

@section('title','Emploi Invoices :: Email Reminder Sent')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Email Reminder Sent')

<div class="card">
    <div class="card-body">
        <h4 class="orange">
            <a href="/admin/invoices/{{ $invoice->slug }}">
                <i class="fa fa-arrow-left"></i>
            </a>
            Email Reminder Sent
        </h4>

        <p>
            <b>{{ $invoice->first_name }}</b> has been sent an e-mail reminder for invoice <a href="/invoice/{{ $invoice->slug }}" target="_blank">{{ $invoice->slug }}</a>, totalling to Ksh {{ $invoice->total }}.
        </p>
        
    </div>
</div>

@endsection