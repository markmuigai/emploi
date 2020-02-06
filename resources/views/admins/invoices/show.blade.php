@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Invoice Preview')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Invoice Preview')

<div class="card">
    <div class="card-body">
        <h4 class="">
            <a href="/admin/invoices/" class="orange">
                <i class="fa fa-arrow-left"></i>
            </a>
            <b>{{ $invoice->slug }} [ Ksh {{ $invoice->total }} ]</b>
        </h4>

        <h5>
            {{ $invoice->first_name }} {{ $invoice->last_name ? $invoice->last_name : '' }} <span style="float: right;">{{ $invoice->email }}</span>
        </h5>

        <hr>
        Payment: {{ $invoice->paid ? $invoice->paid : '-not-paid-' }}
        <hr>

        <div>
            <?php echo $invoice->description;  ?>
        </div>
        
    </div>
</div>

@endsection