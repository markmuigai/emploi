@extends('layouts.general-layout')

@section('title',$pageTitle)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
<div class="container py-5">
    <h2 class="text-center">{{ $pageTitle }}</h2>
    <div class="row justify-content-between">
        <div class="col-lg-6 col-md-6 text-right">
            <form action="/blog/search" class="form-row">
                <input type="text" name="q" required="" class="form-control col-9" placeholder="Search Blogs" value="{{ isset($q) ? $q : '' }}">
                <button type="submit" class="btn btn-orange col-3">Search</button>
            </form>
        </div>
        <div class="col-md-4 dropdown text-md-right text-left mt-2 mt-md-0">
            <button class="btn btn-orange dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Categories
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="/blog">All</a>
                @forelse(\App\BlogCategory::all() as $c)
                <a class="dropdown-item text-capitalize {{ isset($blogCategory) && $blogCategory == $c->id ? 'active' : '' }}" href="/blog/{{$c->slug}}">{{$c->name}}</a>
                @empty
                @endforelse
            </div>
        </div>
    </div>

    <div class="row pt-3">
        <?php $adsCounter=0; ?>
        <div class="col-lg-4 col-md-6">
            <div class="card my-2">
                @include('components.ads.responsive')
            </div>
        </div>
        @forelse($blogs as $blog)
        <div class="col-lg-4 col-md-6">
            <div class="card my-2">
                <div class="card-body">
                    <div class="blog-image lazy mb-2" data-bg="url({{ asset($blog->imageUrl) }})"></div>
                    <h5><a href="{{ url('blog/'.$blog->slug) }}">{{ $blog->title }}</a></h5>
                    <div class="d-flex">
                        <p><i class="fas fa-user"></i> {{ $blog->user->name }} | <i class="fas fa-calendar-check"></i> {{ $blog->postedOn }}</p>
                    </div>
                    <a href="/blog/{{ $blog->category->slug }}"><span class="badge badge-orange">{{ $blog->category->name }}</span></a>
                    <p class="truncate">{!!html_entity_decode($blog->preview)!!}</p>
                    <a href="{{ url('blog/'.$blog->slug) }}" class="orange">Read More</a>
                    <hr>
                    <button class="btn btn-orange-alt" data-toggle="modal" data-target="#socialModal{{ $blog->id }}"><i class="fas fa-share-alt"></i> Share</button>
                    <!-- SHARE MODAL -->
                    @include('components.share-modal')

                    <span style="float: right;">
                        <?php $likes = \App\Like::getCount('blog',$blog->id); ?>
                        @if($likes == 1)
                            1 Like
                        @else
                            {{ $likes }} Likes
                        @endif 

                        |
                        
                        @guest
                            <a href="/login" title="Login to Like">Login to Like</a>
                        @else
                            @if(Auth::user()->hasLiked('blog',$blog->id))

                                <a href="/likes/blog/{{ $blog->slug }}" style="color: #500095" title="Unlike Blog">
                                    <i class="fa fa-thumbs-up"></i> Unlike
                                </a>

                            @else

                                <a href="/likes/blog/{{ $blog->slug }}" title="Like Blog">
                                    <i class="fa fa-thumbs-up"></i> Like
                                </a>

                            @endif

                        

                        @endguest
                    </span>
                    <!-- END OF SHARE MODAL -->
                </div>
            </div>
        </div>
        <?php $adsCounter++; ?>
        @if($adsCounter %3 == 0)
        <div class="col-lg-4 col-md-6">
            <div class="card my-2">
                @include('components.ads.responsive')
            </div>
        </div>
        @endif
        @empty
        <div class="col-12">
          <div class="card">
            <div class="card-body text-center">
                <p>No blogs found</p>
            </div>
          </div>
        </div>
        @endforelse
    </div>
    <div>
        {{ $blogs->links() }}
    </div>

</div>

<!-- SEARCH BAR -->
<div class="position-relative ">
    @include('components.search-form')
</div>
<!-- END OF SEARCH BAR -->
@endsection
