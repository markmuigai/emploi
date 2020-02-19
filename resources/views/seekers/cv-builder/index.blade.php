@extends('layouts.dashboard-layout')

@section('title','Emploi :: CV-Builder')

@section('description')
Create a resume that will land you your dream job, for free, on Emploi or request for Professional CV Editing
@endsection

@section('content')
@section('page_title', 'Emploi CV Builder')

<?php
    $name = isset(Auth::user()->id) ? Auth::user()->name : '';
    $email = isset(Auth::user()->id) ? Auth::user()->email : '';
    $phone = '';
    $website = '';
    $summary = '';
    $address = '';
    $city = '';
    $countryCode = '';
    $region = '';

    if(isset(Auth::user()->id) && Auth::user()->role == 'seeker' ){
        $seeker = Auth::user()->seeker;

        $phone = $seeker->phone_number;
        $summary = $seeker->objective;
        $address = $seeker->post_address;
        $countryCode = $seeker->country->code;
        $region = isset($seeker->location_id) ? $seeker->location->name : \App\Location::where('country_id',$seeker->country_id)->first()->name;
    }

?>

<div class="card">
    <div class="card-body">


        
        <form method="POST" action="/job-seekers/cv-builder" enctype="multipart/form-data">
            @csrf
            <h4>Personal Details</h4>
            <p>
                <label>Your Name:</label>
                <input type="text" name="name" value="{{ $name }}" class="form-control" required="" maxlength="50">
            </p>
            <p>
                <label>Your Email:</label>
                <input type="email" name="email" value="{{ $email }}" class="form-control" required="" maxlength="50">
            </p>
            <p>
                <label>Your Phone:</label>
                <input type="text" name="phone" value="{{ $phone }}" class="form-control" required="" maxlength="20" placeholder="254712312312">
            </p>
            <p>
                <label>Your Website:</label>
                <input type="text" name="website" value="" class="form-control" maxlength="50">
            </p>
            <p>
                <label>Profile Summary:</label>
                <textarea class="form-control" name="summary" required="" maxlength="300" placeholder="Briefly state what you are looking for in your next position">{{ $summary }}</textarea>
            </p>
            <p>
                <label>Address:</label>
                <textarea class="form-control" name="address" required="" maxlength="300" placeholder="Home address, e.g. P.O. Box 123-00100 Nairobi GPO">{{ $address }}</textarea>
            </p>
            <p>
                <label>City:</label>
                <input type="text" name="city" value="{{ $city }}" class="form-control" maxlength="50">
            </p>
            <p>
                <label>Country Code:</label>
                <input type="text" name="countryCode" value="{{ $countryCode }}" class="form-control" maxlength="50">
            </p>
            <p>
                <label>Region:</label>
                <input type="text" name="region" value="{{ $region }}" class="form-control" maxlength="50">
            </p>
            
            <br>
            <hr>
            <h4>Education Records</h4>

            <br>
            <hr>
            <h4>Work Experience</h4>

            <br>
            <hr>
            <h4>Skills</h4>

            <br>
            <hr>
            <h4>Referees</h4>

            <p>
                <input type="submit" value="Create CV" class="btn btn-orange">
                <a href="/job-seekers/cv-editing" class="btn btn-orange-alt" style="float: right;">Get Help</a>
            </p>

        </form>
    </div>
</div>

@endsection
