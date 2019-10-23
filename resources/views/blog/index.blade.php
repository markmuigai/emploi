@extends('layouts.seek')

@section('title','Emploi :: Our Blog')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@include('seekers.search-input')

<div class="container">
    <div class="single">  
      <h2>Our Blog</h2>
      <div class="row">
		@forelse($blogs as $blog)
			<div class="col-md-4 co-sm-6" style="padding: 0.5em; overflow: hidden;">
				<a href="/blog/{{ $blog->slug }}">
			   	  <img src="{{ asset($blog->imageUrl) }}" class="img-responsive" style="width: 100%" alt=""/>
			   	  <h4>
			   	  	<br>
			   		{{ $blog->title }}
			   	</h4>
			   </a>
			   
			</div>
		@empty
		<p style="text-align: center;">No blogs found</p>
		@endforelse
      </div>

      @if(isset($links))
       {{ $blogs->links() }}
      @endif
      
    </div>
</div>

@endsection