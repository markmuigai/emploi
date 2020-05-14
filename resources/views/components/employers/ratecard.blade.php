@extends('layouts.dashboard-layout')

@section('title','Emploi :: Dashboard')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Our Packages')

<div class="card-deck text-center card flex-column">
    <div class="col-md-12">
        <h3 class="orange pt-2 text-center" id="charges">Our Packages</h3>
    </div>
    <div class="card">
        <div class="card-body d-flex flex-column justify-content-center">            
            <h1>Kshs <br>2,500</h1>
            <p>SOLO</p>
            <ul class="tick">
                <li>1 Job Advert posted for 30 days</li>
                <li>Shared to social media pages</li>
                <li>Job AD sent out to our entire database</li>
            </ul>
             <form method="POST" action="/checkout">
                @csrf
                <input type="hidden" name="product" value="solo">
                <br><br><p>
                    <input type="submit" name="" value="Get Package" class="btn btn-orange-alt">
                </p>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body d-flex flex-column justify-content-center">
            <h1>Kshs <br>4,750</h1>
            <p>SOLO PLUS</p>
            <ul class="tick">
                <li>2-4 Job Adverts posted for 30 days</li>
                <li>Shared to Social media pages</li>
                <li>Job AD sent out to our entire database</li>
            </ul>
             <form method="POST" action="/checkout">
                @csrf
                <input type="hidden" name="product" value="solo_plus">
               <br><br><p>
                    <input type="submit" name="" value="Get Package" class="btn btn-orange-alt">
                </p>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body d-flex flex-column justify-content-center">
            <h1>Kshs 9,025</h1>
            <p>INFINITY</p>
            <ul class="tick">
                <li>More than 4 job Adverts posted for 30 days</li>
                <li>Shared to Social media pages</li>
                <li>Job AD sent out to entire database</li>
            </ul>
            <form method="POST" action="/checkout">
                @csrf
                <input type="hidden" name="product" value="infinity">
                <br><p>
                    <input type="submit" name="" value="Get Package" class="btn btn-orange-alt">
                </p>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body d-flex flex-column justify-content-center">
            <h1>Kshs 7,000</h1>
            <p>STAWI</p>
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
                    <input type="submit" name="" value="Get Package" class="btn btn-orange-alt">
                </p>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body d-flex flex-column justify-content-center">
            <h1>Kshs 1,000</h1>
            <p>FEATURED COMPANY</p>
            <ul class="tick">
               <li>Featured on our main page</li>
               <li>Featured on one vacancy notification email</li>
               <li>Vacancies rank top of the list</li>
            </ul>
            <form method="POST" action="/checkout">
                @csrf
                <input type="hidden" name="product" value="featured_company">
                <p>
                    <input type="submit" name="" value="Get Package" class="btn btn-orange-alt">
                </p>
            </form>
        </div>
    </div>
</div>
@endsection