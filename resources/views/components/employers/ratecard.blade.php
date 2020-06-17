@extends('layouts.dashboard-layout')

@section('title','Emploi :: Dashboard')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Our Packages')
<style type="text/css">
    .blink_text {

    animation:1s blinker linear infinite;
    -webkit-animation:1s blinker linear infinite;
    -moz-animation:1s blinker linear infinite;

     color: #500095;
    }

    @-moz-keyframes blinker {  
     0% { opacity: 1.0; }
     50% { opacity: 0.0; }
     100% { opacity: 1.0; }
     }

    @-webkit-keyframes blinker {  
     0% { opacity: 1.0; }
     50% { opacity: 0.0; }
     100% { opacity: 1.0; }
     }

    @keyframes blinker {  
     0% { opacity: 1.0; }
     50% { opacity: 0.0; }
     100% { opacity: 1.0; }
     }
</style>
<div class="card-deck text-center card flex-column">
    <div class="col-md-12">
        <h3 class="orange pt-2 text-center" id="charges">Our Packages, <span class="blink_text">Now 20% Off</span></h3>
    </div>
    <div class="card">
        <div class="card-body d-flex flex-column justify-content-center">            
            <h1><del>Kshs <br>2,500</del></h1>
            <p>SOLO</p>
            <div class="orange">20%  Discount</div>
                    <h1>Kshs 2,000</h1>
            <ul class="tick">
                <li>1 Job Advert posted for 30 days</li>
                <li>Shared to social media pages</li>
                <li>Job AD sent out to our entire database</li>
            </ul>
             <form method="POST" action="/checkout">
                @csrf
                <input type="hidden" name="product" value="solo">
                <br><br><p>
                    <input type="submit" name="" value="Request Now" class="btn btn-orange-alt">
                </p>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body d-flex flex-column justify-content-center">
            <h1><del>Kshs <br>4,750</del></h1>
            <p>SOLO PLUS</p>
            <div class="orange">20%  Discount</div>
                    <h1>Kshs 3,800</h1>
            <ul class="tick">
                <li>2-4 Job Adverts posted for 30 days</li>
                <li>Shared to Social media pages</li>
                <li>Job AD sent out to our entire database</li>
            </ul>
             <form method="POST" action="/checkout">
                @csrf
                <input type="hidden" name="product" value="solo_plus">
               <br><br><p>
                    <input type="submit" name="" value="Request Now" class="btn btn-orange-alt">
                </p>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body d-flex flex-column justify-content-center">
            <h1><del>Kshs 9,025</del></h1>
            <p>INFINITY</p>
            <div class="orange">20%  Discount</div>
                    <h1>Kshs 7,220</h1>
            <ul class="tick">
                <li>More than 4 job Adverts posted for 30 days</li>
                <li>Shared to Social media pages</li>
                <li>Job AD sent out to entire database</li>
            </ul>
            <form method="POST" action="/checkout">
                @csrf
                <input type="hidden" name="product" value="infinity">
                <br><p>
                    <input type="submit" name="" value="Request Now" class="btn btn-orange-alt">
                </p>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body d-flex flex-column justify-content-center">
            <h1><del>Kshs 7,000</del></h1>
            <p>STAWI</p>
            <div class="orange">20%  Discount</div>
                    <h1>Kshs 5,600</h1>
            <ul class="tick">
                <li>All   in Solo</li>
                <li>Search talent database</li>
                <li>Unlimited searches in 1 job category</li>
                <li>Get up to 50 CVs</li>
                <li>Referee reports</li>
            </ul>
            <form method="POST" action="/checkout">
                @csrf
                <input type="hidden" name="product" value="stawi">
                <p>
                    <input type="submit" name="" value="Request Now" class="btn btn-orange-alt">
                </p>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body d-flex flex-column justify-content-center">
            <h1><del>Kshs 1,000</del></h1>
            <p>FEATURED COMPANY</p>
            <div class="orange">20%  Discount</div>
                    <h1>Kshs 800</h1>
            <ul class="tick">
               <li>Featured on our main page</li>
               <li>Featured on one vacancy notification email</li>
               <li>Vacancies rank top of the list</li>
            </ul>
            <form method="POST" action="/checkout">
                @csrf
                <input type="hidden" name="product" value="featured_company">
                <p>
                    <input type="submit" name="" value="Request Now" class="btn btn-orange-alt">
                </p>
            </form>
        </div>
    </div>
</div>
@endsection