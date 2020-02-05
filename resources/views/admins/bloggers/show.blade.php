@extends('layouts.dashboard-layout')

@section('title','Emploi :: Blogger ')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Emploi Blogger')


<div class="card">
    <div class="card-body">
        
        <div class="row align-items-center">
            <div class="col-lg-2 col-md-3">
                <img src="{{ $blogger->user->avatarUrl }} " class="w-100">
            </div>
            <div class=" col-lg-7 col-md-6">
                <h4><a href="{{ url('/admin/bloggers/'.$blogger->id) }}" target="_blank">{{ $blogger->user->name }}</a></h4>
                <p>
                    {{ '@'.$blogger->user->username }}  <small class="badge badge-{{ $blogger->status == 'active' ? 'orange' : 'secondary' }}">{{ count($blogger->user->blogs) }} Blogs</small>
                </p>
                <p>
                    Status: {{ $blogger->status == 'active' ? 'Active' : 'Inactive' }}
                </p>
            </div>
            @include('components.ads.responsive')
            <div class="col-lg-3 col-md-3">
                @if(Auth::user()->role == 'admin')
                <a href="{{ url('/admin/bloggers/'.$blogger->id.'/edit') }}" class="btn btn-sm btn-orange-alt">Edit</a>
                @endif
                <a href="{{ url('/blog/create') }}" class="btn btn-sm btn-orange">Write Blog</a>
            </div>
        </div>
        <div class="row">
            @forelse($blogs as $blog)

            <div class="col-md-6">
                    <div class="card my-2">
                        <div class="card-body">
                            <div class="blog-image lazy mb-2" data-bg="url({{ asset($blog->imageUrl) }})"></div>
                            <h5><a href="{{ url('blog/'.$blog->slug) }}">{{ $blog->title }}</a></h5>
                            <div class="d-flex">
                                <p> {{ $blog->status }} | <i class="fas fa-calendar-check"></i> {{ $blog->postedOn }}</p>
                            </div>
                            <a href="/blog/{{ $blog->category->slug }}"><span class="badge badge-orange">{{ $blog->category->name }}</span></a>
                            <p>{!!html_entity_decode($blog->preview)!!}</p>
                            <a href="{{ url('blog/'.$blog->slug) }}" class="orange">Read More</a>
                            <a href="{{ url('blog/'.$blog->slug.'/edit') }}" class="btn btn-link btn-sm" style="float: right;">Edit</a>
                            <hr>
                            <button class="btn btn-orange-alt" data-toggle="modal" data-target="#socialModal"><i class="fas fa-share-alt"></i> Share</button>
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

            @empty

            @endforelse
        </div>
        <div>
            {{ $blogs->links() }}
        </div>
        <hr>
    </div>
</div>


@endsection