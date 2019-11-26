@extends('layouts.general-layout')

@section('title','Emploi :: Our Blog')

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
                        <p><i class="fas fa-user"></i> {{ $blog->user->name }} | <i class="fas fa-calendar-check"></i> 12 Aug 2019</p>
                    </div>
                    <a href="/blog/{{ $blog->category->slug }}"><span class="badge badge-orange">{{ $blog->category->name }}</span></a>
                    <p class="truncate"><?php echo $blog->contents; ?></p>
                    <a href="{{ url('blog/'.$blog->slug) }}" class="orange">Read More</a>
                    <hr>
                    <p>
                        <i class="fas fa-share-alt"></i>
                        Share:
                        <a href="{{ $blog->shareFacebookLink }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{ $blog->shareTwitterLink }}" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="{{ $blog->shareLinkedinLink }}" target="_blank"><i class="fab fa-linkedin"></i></a>
                    </p>
                </div>
            </div>
        </div>
        @empty
        <p style="text-align: center;">No blogs found</p>
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