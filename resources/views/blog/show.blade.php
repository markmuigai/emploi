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
      		{{ $blog->category->name }} Blog
      	</a>
      	|| {{ $blog->user->name }}
      </p>
      <br>
      <div class="row">
        <div class="col-md-4">
          <img src="{{ asset($blog->imageUrl) }}" style="width: 100%">
        </div>
		
		<div class="col-md-8">
			<?php echo $blog->contents; ?>
      <hr>
      <h5 id="share-links">
            Share this blog
          </h5>
          <div class="social">    
                <a class="btn_1" href="http://www.facebook.com/sharer.php?u={{ url('/blog/'.$blog->slug) }}" target="_blank">
                    <i class="fa fa-facebook fb"></i>
                    <span class="share1 fb">Share</span>                                
                </a>
                <a class="btn_1" href="https://twitter.com/share?url={{ url('/blog/'.$blog->slug) }}&amp;text={{ urlencode($blog->title) }}&amp;hashtags=EmploiBlog" target="_blank">
                    <i class="fa fa-twitter tw"></i>
                    <span class="share1">Tweet</span>                               
                </a>
                <a class="btn_1" href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ url('/blog/'.$blog->slug) }}" target="_blank">
                    <i class="fa fa-linkedin fb"></i>
                    <span class="share1 fb">Share</span>
                </a>
           </div>
		</div>
      </div>
      
    </div>
</div>

@endsection