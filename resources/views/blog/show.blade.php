@extends('layouts.general-layout')

@section('title','Emploi :: '.$blog->title)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="container">
    <div class="card my-5">
        <div class="card-body px-5">
            <div class="latest-blog-image" style="background-image: url('{{ asset($blog->imageUrl) }}')"></div>
            <h2 class="pt-4">{{ $blog->title }}</h2>
            <div class="d-flex">
                <p><i class="fas fa-user"></i> {{ $blog->user->name }} | <i class="fas fa-calendar-check"></i> {{ $blog->postedOn }}</p>
            </div>
            <a href="/blog/{{ $blog->category->slug }}"><span class="badge badge-orange">{{ $blog->category->name }}</span></a>
            <p><?php echo $blog->contents; ?></p>
            @if($blog->image2)
            <br>
            <div class="latest-blog-image" style="background-image: url('/storage/blogs/{{ $blog->image2 }}')"></div>
            @endif
            <hr>
            <p>
                <i class="fas fa-share-alt"></i>
                Share:
                <a href="http://www.facebook.com/sharer.php?u={{ url('/blog/'.$blog->slug) }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://twitter.com/share?url={{ url('/blog/'.$blog->slug) }}&amp;text={{ urlencode($blog->title) }}&amp;hashtags=EmploiBlog" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ url('/blog/'.$blog->slug) }}" target="_blank"><i class="fab fa-linkedin"></i></a>
            </p>
        </div>
    </div>
</div>
<!-- SEARCH BAR -->
@include('components.search-form')
<!-- END OF SEARCH BAR -->
@endsection
