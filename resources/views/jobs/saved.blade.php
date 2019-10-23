@extends('layouts.seek')

@section('title','Emploi :: Create Advert')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="container">
    <div class="single">  
       <div class="form-container">
        <h2>{{ $title }}</h2>
        
        <div style="text-align: center;">
        	<?php 
        	echo $message;
        	?>
        </div>
        
    
                
    </div>
 </div>
</div>

@endsection