@extends('layouts.dashboard-layout')

@section('title','Emploi')

@section('description')
Emploi is the Leading Platform for Talent Assessment and Matching for SME's in Africa.
@endsection

@section('content')

<div class="card">
    <div class="card-body text-center">
        <h2>{{ $title }}</h2>
        @include('components.ads.responsive')
      	<p>
        	{{ $message }}
        </p>
      	<a href="/profile" class="btn btn-purple">View Profile</a>
      	<a href="/home" class="btn btn-orange">
      		<?php
      		if(session('redirectToUrl'))
      		{
            if(strpos(session('redirectToUrl'), '/blog/'))
            {
              print 'Continue to Blog';
            }
            elseif(strpos(session('redirectToUrl'), '/vacancies/'))
            {
      			 print 'Continue to Apply Job';      			
            }
            else
            {
              print 'Return to Intial Page';
            }
      		}
      		else
      			print 'Dashboard';
      		?>
      		
      	</a>
    </div>
</div>

@endsection
