@extends('layouts.dashboard-layout')

@section('title','Emploi :: Invoice Preview')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Invoice Preview')

<div class="card">
    <div class="card-body">

        <h4 class="">
        @if(session()->has('message'))
            <div class="alert alert-success">
            {{ session()->get('message') }}
            </div>
        @endif
            @if(isset(Auth::user()->id) && Auth::user()->role == 'admin')
            <a href="/admin/invoices/" class="orange">
                <i class="fa fa-arrow-left"></i>
            </a>
            @endif
            <b>{{ $invoice->slug }} [ Ksh {{ $invoice->total }} ]</b>

            @if(isset(Auth::user()->id) && Auth::user()->role == 'admin')
                <a href="{{ url('/invoice/'.$invoice->slug) }}" class="btn btn-sm btn-success" style="float: right;" target="_blank" title="Public Invoice">link</a>
            @endif
            
        </h4>

        <h5>
            {{ $invoice->first_name }} {{ $invoice->last_name ? $invoice->last_name : '' }} 
            @guest
            <span style="float: right;">{{ $invoice->maskedEmail() }}</span>
            @else
             <span style="float: right;">{{ $invoice->email }}</span> <br>
            <span style="float: right;">{{ $invoice->phone_number }}</span> <br>

            @endguest

        </h5>

        <hr>
        @if($invoice->paid)
        Payment: Paid
            @guest
            @else
                @if(Auth::user()->email == $invoice->email || Auth::user()->role == 'admin')
                {{$invoice->paid}}
                @endif
            @endguest
        @else
        
            @if(isset(Auth::user()->id) && Auth::user()->role == 'admin')
                <form method="post" action="/admin/invoices/{{ $invoice->slug }}" class="row">
                    @csrf
                    {{ method_field('PUT') }}
                    <input type="text" name="alternative_payment_slug" class="form-control col-md-6" placeholder="payment reference code" required="" maxlength="100">
                    <div class="col-md-3">
                        <input type="submit" class="btn btn-orange" value="Mark Invoice Paid">
                    </div>
                    
                </form>

                <br>

                <form method="post" action="/admin/invoices/{{ $invoice->slug }}/remindViaEmail">
                    @csrf
                    <input type="submit" value="Send Email Reminder" class="btn btn-danger">
                </form>
            @else

                <form method="POST" action="/invoice/{{ $invoice->slug }}/pay">
                    @csrf
                    <input type="hidden" name="email" value="{{ $invoice->email }}">
                    <input type="submit" value="Make Payment" class="btn btn-success">
                </form>
                

            @endif
        @endif
        <hr>

        <div>
            <?php echo $invoice->description;  ?>
        </div>
        
    </div>
</div>



@endsection