@extends('layouts.dashboard-layout')

@section('title','Emploi :: Advertisement Created')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="card">
    <div class="card-body">
    	<h4>
    		Advertisement Request Created
    		@guest
    		<a href="/join" class="btn btn-success" style="float: right;">Create Account</a>
    		@else

    		<a href="/home" class="btn btn-success" style="float: right;">My Dashboard</a>

    		@endguest
    		
    	</h4>
    	<p>
    		Hello {{ $advert->name }},<br>
    		<b>Your advertisment request has been received successfully.</b> 
            <?php
            $products = \App\Product::where('slug','infinity')->orWhere('slug','solo')->orWhere('slug','solo_plus')->orWhere('slug','stawi')->get();
            ?>  
            @if(count($products)>0 )
                Kindly confirm your package below to proceed.
                <br>
                <form method="POST" action="/checkout">
                    @csrf
                    
                    <p>
                        <label>Package</label>
                        <select name="product" class="form-control">
                            @foreach($products as $product)
                            <option value="{{ $product->slug }}">{{ $product->title }}</option>
                            @endforeach
                        </select>
                    </p>
                    <p>
                        <input type="submit" name="" value="Finish" class="btn btn-primary">
                    </p>
                </form>
            @else
                One of our representative will get in touch with you shortly.
                <br>
            @endif
    		Thank you for choosing Emploi.
    		<br><br>
    		<a href="/contact" class="btn btn-sm btn-success">Contact Us</a>
            <a href="mailto:info@emploi.co" class="btn btn-sm btn-default">Email Us</a>
    	</p>
	</div>

</div>

@endsection
