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
    	<div class="row">
            <div class="col-md-12">
                <p>
        		    Hello {{ $advert->name }},<br>
        		    <b>Your advertisment request has been received successfully.</b>  Check your email for verification.
                </p>
                <hr>
            </div>
            <div class="row">
                <div class="col-md-6 offset-md-1">
                    <?php
                    $products = \App\Product::where('slug','infinity')->orWhere('slug','solo')->orWhere('slug','solo_plus')->orWhere('slug','stawi')->get();
                    ?>  
                    @if(count($products)>0 )
                        Select preferred your package below to proceed.
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
                                <input type="submit" name="" value="Continue" class="btn btn-orange">
                            </p>
                        </form>
                    @else
                        One of our representative will get in touch with you shortly.
                        <br>
                    @endif
                </div>
                <div class="col-md-4">


                        <img src="/images/promotions/free-job-posting.jpg" alt="Free Job Posting for Companies involved in the fight against Covid-19" style="width: 100%">

                        <form method="post" action="/covid-advert" style="text-align: center;">
                            @csrf
                            <input type="hidden" name="advert_id" value="{{ $advert->id }}">

                            <input type="submit" class="btn btn-orange-alt" value="Free COVID-19 POSTING">
                        </form>



                </div>
            </div>

            <div class="col-md-12" style="text-align: center;">
                <p >
                    <hr>

                    Reach 100k+ job seekers, superior shortlisting tools 
                </p>
                <p>
                    <br><br>
                    <a href="/contact" class="btn btn-sm btn-orange">Contact Us</a>
                    <a href="/employers/services" class="btn btn-sm btn-default">Employer Services</a>
                    
                </p>
            </div>



            
            
    		
    	</div>
	</div>

</div>

@include('components.employers.ratecard')

@endsection
