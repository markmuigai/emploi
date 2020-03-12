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

            <div style="width: 100%">
                @include('components.ads.responsive')
            </div>

            @if(isset(Auth::user()->id))

                <p><?php echo $blog->contents; ?></p>
                @if($blog->image2)
                <br>
                <div class="blog-image" style="background-image: url('/storage/blogs/{{ $blog->image2 }}')"></div>
                @endif
            @else
                <p>
                    {!!html_entity_decode($blog->longPreview(500))!!}
                </p>
                <br><br>
                <p style="text-align: center;">
                    <a href="/login?redirectToUrl={{ url()->current() }}" class="btn btn-orange-alt">Login</a> or <a href="/join?redirectToUrl={{ url()->current() }}" class="btn btn-orange">Create Free Account</a> to view the full blog.
                </p>

            @endif
            <hr>
            <p>
                <button class="btn btn-orange-alt" data-toggle="modal" data-target="#socialModal{{ $blog->id }}" style="float: left;"><i class="fas fa-share-alt"></i> Share</button>
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
            </p>
            <div class="fb-comments" data-href="{{ url('/blog/'.$blog->title) }}" data-width="100%" data-numposts="6">
            </div>
        </div>
    </div>
</div>

       

            <?php
            $relatedBlogs = $blog->alsoLike(3);
             ?> 
                @if(count($relatedBlogs) > 0)
  <!--RELATED BLOGS -->
        <div class="container">
            <div class="col-md-12">
                <div class="card-related" >
                    <div class="card-body-related">
                        <h2 class="orange">You Might Also Like</h2>
                            @foreach($relatedBlogs as $rblog)                    
                            <div class="blog-image " data-bg="url({{ asset($rblog->imageUrl) }})">                             
                            </div>
                            <h5><a href="{{ url('blog/'.$rblog->slug) }}">{{ $rblog->title }}</a></h5>
                            <div class="text-center">
                            <p><i class="fas fa-user"></i> {{ $rblog->user->name }} | <i class="fas fa-calendar-check"></i> {{ $rblog->postedOn }}</p>
                            </div>
                            <a href="/blog/{{ $rblog->category->slug }}"><span class="badge badge-orange">{{ $rblog->category->name }}</span></a>
                            <p class="truncate">{!!html_entity_decode($rblog->preview)!!}</p>
                            <a href="{{ url('blog/'.$rblog->slug) }}" class="orange">Read More</a>

                            <button class="btn btn-orange-alt" data-toggle="modal" data-target="#socialModal{{ $rblog->id }}"><i class="fas fa-share-alt"></i> Share
                            </button>
                            @endforeach
                     </div>
                </div>
            </div>
       </div>
@endif 

<style type="text/css">  

    .card-related {
        display: grid;       
        
    }

    .card-body-related {
        grid-template-rows: 1fr 1fr 1fr;
        border: 1px solid #979797;
        background: white;
        padding: 30px 0 20px;
        text-align: center;
         
       }
</style>
<!--  END RELATED BLOGS -->        
@endsection