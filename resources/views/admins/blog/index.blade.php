@extends('layouts.dashboard-layout')

@section('title','Emploi :: Admin Blog')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'All Blogs')


<div class="card">
    <div class="card-body">
        @forelse($blogs as $blog)
        <div class="row align-items-center">
            <div class="col-lg-2 col-md-3">
                <img src="{{ $blog->imageUrl }} " class="w-100">
            </div>
            <div class=" col-lg-7 col-md-6">
                <h4>{{ $blog->title }}</h4>
                <p>
                    {{ $blog->user->name }} || {{ $blog->category->name }}
                </p>
            </div>
            <div class="col-lg-3 col-md-3">
                <a href="{{ url('/blog/'.$blog->slug.'/edit') }}" class="btn btn-sm btn-info">Edit</a>
                <a href="{{ url('/blog/'.$blog->slug) }}" class="btn btn-sm btn-success" target="_blank">View</a>
            </div>
        </div>
        <hr>
        @empty
        <p class="text-center">No blogs have been created</p>
        @endforelse
    </div>
</div>

{{ $blogs->links() }}


@endsection
