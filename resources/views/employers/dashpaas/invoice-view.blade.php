@extends('layouts.dashboard-layout')

@section('title','Emploi :: View')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Invoice Details')


<!-- NAV-TABS -->


<section>

    <div class="container">

        <div class="card">
            <div class="card-header font-weight-bold">
                {{ $invoice->slug }}    
            </div>
            <div class="card-body">
                <div class="card-text">
                 {{ $invoice->description }}
                 <br><br>

                 <div class="row">
                    <div class="col-md-4 font-weight-bold">
                        {{ $invoice->alternative_payment_slug }}
                    </div>

                    <div class="col-md-4 font-weight-bold">
                        {{ $invoice->pesapal_transaction_tracking_id }}	
                    </div>
                 </div>


                </div>
            </div>
        
        </div>
    
    </div>
    

</section>


@endsection
