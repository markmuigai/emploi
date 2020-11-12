@extends('layouts.zip')

@section('title','Emploi :: Advertisement Created')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<!-- index-block2 -->
<section class="w3l-index-block2 py-5">
  <div class="container py-md-3">
    <div class="heading text-center mx-auto">
      <br>
      <h3 class="head">Advertisement Created</h3>
      <p class="my-3 head"> 
        Hello {{ $advert->name }},<br>
        <b>Your advertisment has been created successfully.</b></p>
    </div>
    <div class="row bottom_grids pt-md-3">
      <div class="col-lg-6 col-md-6 mt-5">
        <div class="s-block">
          <a href="/employers/rate-card" class="d-block p-lg-4 p-3">
            <h3 class="my-3">Make Payment</h3>
            <p class="">Our recruitment tools are solid and your organization will recoup this investment in time savings and efficiency in the long run</p>
          </a>
          <?php
            $products = \App\Product::where('slug','infinity')->orWhere('slug','solo')->orWhere('slug','solo_plus')->orWhere('slug','stawi')->get();
            ?>  
            @if(count($products)>0 )
                <form method="POST" action="/checkout" class="d-block p-lg-4 p-3" style="padding-top: 0; margin-top: 0">
                    @csrf
                    
                        <label>Package</label>
                        <select name="product" class="form-control">
                            @foreach($products as $product)
                            <option value="{{ $product->slug }}">{{ $product->title }}</option>
                            @endforeach
                        </select>
                        <br>
                        <input type="submit" name="" value="Continue" class="btn btn-primary btn-demo">
                </form>
            @else
            <p class="d-block p-lg-4 p-3">
                One of our representative will get in touch with you shortly.
            </p>
                
            @endif
        </div>
      </div>
<!--       <div class="col-lg-4 col-md-6 mt-5">
        <div class="s-block">
          <a href="#blog-single.html" class="d-block p-lg-4 p-3">
            <h3 class="my-3">Free Covid-19 Listing</h3>
            <p class="">
                Emploi offers free advertisement for companies and organizations fighting Covid-19.
            </p>
          </a>
            <form method="post" action="/covid-advert" class="d-block p-lg-4 p-3">
                @csrf
                <input type="hidden" name="advert_id" value="{{ $advert->id }}">

                <input type="submit" class="btn btn-primary btn-demo" value="Free Posting">
            </form>
          
        </div>
      </div> -->
      <div class="col-lg-6 mt-5">
        <div class="s-block">
          <a href="#blog-single.html" class="d-block p-lg-4 p-3">
            <h3 class="my-3">Contact Us</h3>
            <p class="">One of our representative will get in touch with you shortly to discuss more on this position and how we can help you get quality candidates.</p>
          </a>
          <span class="d-block p-lg-4 p-3">
              <a href="/contact" class="btn btn-outline-primary mr-2 btn-demo">Contact</a>
              <a href="tel:+254702068282" class="btn btn-primary btn-demo"><i class="fa fa-phone"></i> Call Us</a>
          </span>
          
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /index-block2 -->


@endsection
