@extends('layouts.general-layout')

@section('title','Emploi :: Career Centre')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
<div class="container py-5">
    <h2 class="text-center">Blogs and News</h2>
    <div class="row pt-3">
        @forelse($blogs as $blog)
        <div class="col-lg-4 col-md-6">
            <div class="card my-2">
                <div class="card-body">
                    <div class="latest-blog-image" style="background-image: url('{{ asset($blog->imageUrl) }}')"></div>
                    <h5><a href="{{ url('blog/'.$blog->slug) }}">{{ $blog->title }}</a></h5>
                    <div class="d-flex">
                        <p><i class="fas fa-user"></i> {{ $blog->user->name }} | <i class="fas fa-calendar-check"></i> {{ $blog->postedOn }}</p>
                    </div>
                    <a href="/blog/{{ $blog->category->slug }}"><span class="badge badge-orange">{{ $blog->category->name }}</span></a>
                    <p class="truncate">{!!html_entity_decode($blog->preview)!!}</p>
                    <a href="{{ url('blog/'.$blog->slug) }}" class="orange">Read More</a>
                    <hr>
                    <button class="btn btn-orange-alt" data-toggle="modal" data-target="#socialModal"><i class="fas fa-share-alt"></i> Share</button>
                    <!-- SHARE MODAL -->
                    @include('components.share-modal')
                    <!-- END OF SHARE MODAL -->
                </div>
            </div>
        </div>
        @empty
        <div class="card">
            <div class="card-body text-center">
                <p>No blogs found</p>
            </div>
        </div>
        @endforelse
    </div>
    @if(isset($links))
    {{ $blogs->links() }}
    @endif
</div>

<!-- SEARCH BAR -->
@include('components.search-form')
<!-- END OF SEARCH BAR -->
@endsection
