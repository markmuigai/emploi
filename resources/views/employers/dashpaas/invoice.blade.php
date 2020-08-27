@extends('layouts.dashboard-layout')

@section('title','Emploi :: All Jobs Listed')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Invoice and Subscription Management')


<!-- NAV-TABS -->

<section>
    <div class="container">
        <ul class="nav nav-tabs mt-4">
          <li class="active btn btn-orange mr-4"><a data-toggle="tab" href="#home">Invoices</a></li>
          <li><a class="btn btn-orange-alt" style="color: black;" data-toggle="tab" href="#menu1">Subscription Status</a></li>
        </ul>
      
        <div class="tab-content">
          <div id="home" class="tab-pane active mt-2 pb-4">
            <div id="home" class="tab-pane active mt-2 pb-4">
            <div class="container mt-4">
              <table class="table">
                <div class="row">
                  <tr>
                    <th>Invoice Number</th>
                    <th>Amount</th>
                    <th>Subsciption</th>
                    <th>Status</th>


                  </tr>
                  @foreach ($invoices as $invoice)
                    <tbody>
                      <tr>
                      <td>{{ $invoice->slug }}</td>
                      <td>{{ $invoice->sub_total }}</td>
                      <td>{{ $invoice->alternative_payment_slug }}</td>

                      @if( $invoice->pesapal_transaction_tracking_id != NULL || $invoice->alternative_payment_slug != NULL )
                      <td><a style="color: blue">paid</a></td>
                      @else
                      <td><a href="/invoice/{{ $invoice->slug }}" style="color: blue">pay</a></td>
                      @endif

                      <td><a href="/employers/view-invoice/{{ $invoice->slug }}" style="color: blue">view</a></td>  

                      
                      </tr>                      
                    </tbody>
                      
                  @endforeach
                </table>

                {{ $invoices->links() }}

                </div>
            </div>
          </div>
          <div id="menu1" class="tab-pane fade mt-2 pb-4">
            <h3>Status</h3>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
          
          
        </div>
      </div>
</section>


@endsection
