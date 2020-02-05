@extends('layouts.dashboard-layout')

@section('title','Emploi :: Admin Blog')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'All Blogs')


<div class="card">
    <div class="card-body">
        @include('components.ads.responsive')
        @if(count($blogs) > 0)
        <p class="row" style="text-align: center;">
            <form style="display: inline;" class=" col-md-10">
                <input type="text" name="q" placeholder="search blogs" class="form-control" required="">
            </form>
        </p>
        @endif
        @forelse($blogs as $blog)
        <div class="row align-items-center">
            <div class="col-lg-2 col-md-3">
                <img src="{{ $blog->imageUrl }} " class="w-100">
            </div>
            <div class=" col-lg-7 col-md-6">
                <h4><a href="{{ url('/blog/'.$blog->slug) }}" target="_blank">{{ $blog->title }}</a></h4>
                <p>
                    {{ $blog->user->name }} || {{ $blog->category->name }} <small class="badge badge-{{ $blog->status == 'active' ? 'orange' : 'secondary' }}">{{ $blog->status }}</small>
                </p>
            </div>
            <div class="col-lg-3 col-md-3">
                <a href="{{ url('/blog/'.$blog->slug.'/edit') }}" class="btn btn-sm btn-orange-alt">Edit</a>
            </div>
        </div>
        <hr>
        @empty
        <div class="text-center">
            <p>No blogs have been created</p>
            <p><a href="/blog/create" class="btn btn-orange">Create Blog</a></p>
        </div>
        @endforelse
    </div>
</div>

{{ $blogs->links() }}


@endsection