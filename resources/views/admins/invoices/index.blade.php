@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Invoices')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Invoices')

<div class="card">
    <div class="card-body">
        <h4>
            <a href="/admin"><i class="fa fa-arrow-left"></i></a>
            Emploi Invoices
            @if(count($invoices) > 0)
                <a href="/admin/invoices/create" style="float: right;" class="btn btn-link ">New Invoice</a>
            @endif
        </h4>
        <hr>
        <div>
            @forelse($invoices as $invoice)
                <div class="row">
                    <div class="col-8">
                        <b><a href="/admin/invoices/{{ $invoice->slug }}">{{ $invoice->slug }}</a></b>
                        <br>
                        {{ $invoice->email }}
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