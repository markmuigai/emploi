@extends('layouts.seek')

@section('title','Emploi :: '.$blog->title)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@include('seekers.search-input')

<div class="container">
    <div class="single">  
      <h2>{{ $blog->title }}</h2>
      <p style="text-align: center;">
      	<a href="/blog/{{ $blog->category->slug }}">
      		{{ $blog->category->name }}
      	</a>
      	|| {{ $blog->user->name }}
      </p>
      <br>
      <div class="row">
		<img src="{{ asset($blog->imageUrl) }}" class="col-md-4">
		<div class="col-md-8">
			<?php echo $blog->contents; ?>
		</div>
      </div>
      
    </div>
</div>

@endsection