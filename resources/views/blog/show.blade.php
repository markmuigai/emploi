@extends('layouts.general-layout')

@section('title','Emploi :: '.$blog->title)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('meta-include')
<meta property="og:url"           content="{{ url('/blog/'.$blog->slug) }}/" />
<meta property="og:title"         content="{{ $blog->title }}" />
<meta property="og:description"   content="Career Centre Blog on {{ $blog->category->name }}" />

<meta property="og:image" content="{{ asset($blog->imageUrl) }}">
<meta property="og:image:width"   content="900" />
<meta property="og:image:height"  content="600" />
@endsection

@section('content')

<div class="container">
    <div class="card my-5">
        <div class="card-body px-lg-5 px-4">
            <div class="main-blog-image mb-4 d-none d-md-block" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset($blog->imageUrl) }}')">
                <div class="d-flex flex-column justify-content-center align-items-center text-center h-100 px-lg-5 px-4 heading">
                    <h2>{{ $blog->title }}</h2>
                    <p>
                        <i class="fas fa-user"></i> {{ $blog->user->name }} | <i class="fas fa-calendar-check"></i> {{ $blog->postedOn }}
                    </p>
                    <a href="/blog/{{ $blog->category->slug }}"><span class="badge badge-orange">{{ $blog->category->name }}</span></a>
                </div>
            </div>
            <div class="d-block d-md-none">
              <img src="{{ asset($blog->imageUrl) }}" alt="{{ $blog->title }}" class="w-100">
              <h2>{{ $blog->title }}</h2>
              <p>
                  <i class="fas fa-user"></i> {{ $blog->user->name }} | <i class="fas fa-calendar-check"></i> {{ $blog->postedOn }}
              </p>
              <a href="/blog/{{ $blog->category->slug }}"><span class="badge badge-orange">{{ $blog->category->name }}</span></a>
            </div>

            <p><?php echo $blog->contents; ?></p>
            @if($blog->image2)
            <br>
            <div class="blog-image" style="background-image: url('/storage/blogs/{{ $blog->image2 }}')"></div>
            @endif
            <hr>
            <p>
                <i class="fas fa-share-alt"></i>
                Share:
                <a href="{{ $blog->shareFacebookLink }}" rel="noreferrer" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="{{ $blog->shareTwitterLink }}" rel="noreferrer" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="{{ $blog->shareLinkedinLink }}" rel="noreferrer" target="_blank"><i class="fab fa-linkedin"></i></a>
                <a href="{{ $blog->shareWhatsappLink }}" rel="noreferrer" data-action="share/whatsapp/share"><i class="fab fa-whatsapp"></i></a>
            </p>
        </div>
    </div>
</div>
<!-- SEARCH BAR -->
@include('components.search-form')
<!-- END OF SEARCH BAR -->
@endsection
