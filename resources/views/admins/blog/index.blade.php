@extends('layouts.seek')

@section('title','Emploi :: Admin Blog')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="container">
    <div class="single">  
       <div class="form-container">
        <h2>All Blogs</h2>
        <p  style="text-align: center;"><a href="/blog/create" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> New</a></p>
        <br>
        <div class="row">

        	@forelse($blogs as $blog)
        	<div class="row" style="padding: 0.5em; border-bottom: 0.1em solid black">
        		<img src="{{ $blog->imageUrl }} " class="col-md-3 col-md-offset-2">
        		<div class="col-md-7" style="text-align: center; ">
        			<br><br>
        			<h4>{{ $blog->title }}</h4>
        			<p>
        				{{ $blog->user->name }} || {{ $blog->category->name }}
        			</p>
        			<br><br>
        			<a href="#" class="btn btn-sm btn-info">Edit</a>
                    <a href="{{ url('/blog/'.$blog->slug) }}" class="btn btn-sm btn-success" target="_blank">View</a>
        		</div>
        	</div>
        	@empty
        	<p style="text-align: center;">
        		No blogs have been created
        	</p>
        	@endforelse
        	
        </div>
        
        {{ $blogs->links() }}
    
                
    </div>
 </div>
</div>

@endsection