@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Invoices')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Invoices')
<?php
$title=isset($title) ? $title : 'Emploi Invoices';
?>

<div class="card">
    <div class="card-body">
        <h4>
            <a href="/admin"><i class="fa fa-arrow-left"></i></a>
            {{ $title }}
                <a href="/admin/invoices/create" style="float: right;" class="btn btn-default ">New</a>


            @if($title == 'Pending Invoices')

                <a href="/admin/invoices" class="btn btn-orange" style="float: right;">View All</a>
                <a href="/admin/invoices/completed" class="btn btn-orange-alt" style="float: right;">View Completed</a>

            @elseif($title == 'Completed Invoices')
                <a href="/admin/invoices" class="btn btn-orange" style="float: right;">View All</a>
                <a href="/admin/invoices/pending" class="btn btn-orange-alt" style="float: right;">View Pending</a>

            @else
                <a href="/admin/invoices/completed" class="btn btn-orange" style="float: right;">View Completed</a>
                <a href="/admin/invoices/pending" class="btn btn-orange-alt" style="float: right;">View Pending</a>
            @endif
            
        </h4>
        <hr>
        <div>
        <br>
        <form>
            <input type="text" placeholder="Search here" name="q" required="" class="form-control">
        </form>
        <br>
            @forelse($invoices as $invoice)
                <div class="row">
                    <div class="col-8">
                        <b><a href="/admin/invoices/{{ $invoice->slug }}">{{ $invoice->slug }}</a> <small>[ Ksh {{ $invoice->total }} ]</small></b>
                        <br>
                        {{ $invoice->email }} | {{ $invoice->phone_number }}
                        <br>
                        {{ $invoice->created_at }}
                        <br>
                        {{ $invoice->created_at->diffForHumans() }}
                    </div>
                    <div class="col-4 text-right">
                        <p>
                            Payment: {{ $invoice->paid ? $invoice->paid : '-not-paid-' }}<br>
                            <a href="/admin/invoices/{{ $invoice->slug }}" class="btn btn-sm btn-default">show</a>
                        </p>
                    </div>
                </div>
                <hr>
            @empty
                <div class="text-center">
                    <p>No Invoices have been created. <br><br> <a href="/admin/invoices/create" class="btn btn-sm btn-orange">New Invoice</a></p>
                </div>
            @endforelse
        </div>
        
    </div>
</div>
<div>
    {{ $invoices->links() }}
</div>

@endsection