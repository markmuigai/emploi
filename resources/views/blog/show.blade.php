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

            

            @if(isset(Auth::user()->id) || $blog->is_public !== 0)

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
                    <a href="/login?redirectToUrl={{ url()->current() }}" class="btn btn-orange-alt">{{ __('auth.login') }}</a> or <a href="/join?redirectToUrl={{ url()->current() }}" class="btn btn-orange">Create Free Account</a> to view the full blog.
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
            <div style="width: 100%">
                @if($agent->isMobile())
                    @include('components.ads.mobile_400x350')
                @else            
                    @include('components.ads.flat_728x90')
                @endif
            </div>
            <br style="clear: both;">
            <div class="fb-comments" data-href="{{ url('/blog/'.$blog->slug) }}" data-numposts="6" >
            </div>
            <!--RELATED BLOGS -->
            <?php
                $relatedBlogs = $blog->alsoLike(3);
                $classSeparator = '4';
                if(count($relatedBlogs) == 2)
                    $classSeparator = '6';
                elseif(count($relatedBlogs) == 1)
                    $classSeparator = '12';
            ?> 
            @if(count($relatedBlogs) > 0)
            <div>
                <h2 class="orange" style="text-align: center;">You Might Also Like</h2>
                <div class="row">
                @foreach($relatedBlogs as $rblog)  
                    <div class="main-blog-image mb-4 d-none d-md-block col-md-{{ $classSeparator }}" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset($rblog->imageUrl) }}')">
                        <div class="d-flex flex-column justify-content-center align-items-center text-center h-100 px-lg-5 px-4 heading">
                            <a href="{{ url('/blog/'.$rblog->slug) }}">
                                <h2>{{ $rblog->title }}</h2>
                            </a>
                            <p>
                                <i class="fas fa-user"></i> {{ $rblog->user->name }} | <i class="fas fa-calendar-check"></i> {{ $rblog->postedOn }}
                            </p>
                            <a href="/blog/{{ $rblog->category->slug }}"><span class="badge badge-orange">{{ $rblog->category->name }}</span></a>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
            @endif
            <!--  END RELATED BLOGS -->   
        </div>
    </div>
</div>

          
@endsection