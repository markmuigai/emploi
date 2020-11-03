@if (auth()->user() == null)
    <div class="col-sm-6 col-lg-4 mix {{$recommendedJobs->has($post->id) ? 'recommended' : ''}}">
@else
    <div class="col-sm-6 col-lg-4 mix {{$post->savedByUser(auth()->user()->id) ? 'saved' : ''}}
{{$recommendedJobs->has($post->id) ? 'recommended' : ''}}">
@endif
    <div class="cat-item">
        <span id="vacancies-image">
            <a href="/vacancies/{{ $post->slug }}">
                <img src="{{ asset($post->imageUrl) }}" alt="{{ $post->title }}">
            </a>
        </span>
        <h3>
            <a href="/vacancies/{{$post->slug}}/">{{  $post->getTitle() }}</a>
        </h3>
        <div class="row">
            <div class="col-md-6">
                @if($post->featured == 'true')
                <span class="badge badge-pill badge-success mx-1">
                    <i class="bx bx-star"> </i>Featured
                </span>
                @endif
            </div>
            <div class="col-md-5">
                <form id="save-post-{{$post->id}}" action="{{ route('v2.favourite.store',['postId' => $post->id]) }}" method="post">
                    @csrf
                    @if (auth()->user() && $post->savedByUser(auth()->user()->id) == 1)
                        <span class="save-icon text-success" data-id="{{$post->id}}">
                            <i class='bx bxs-heart'></i>
                            Unsave
                        </span>
                    @else
                        <span class="save-icon" data-id="{{$post->id}}">
                            <i class='bx bx-heart'></i>
                            Save
                        </span>    
                    @endif
                </form>
            </div>
        </div>
        <span>{{ $post->positions }} Position{{ $post->positions == 1 ? '' : 's' }} | 
            Posted {{ $post->since }}
        </span>
        <a class="link" href="index-2.html#">
            <i class="flaticon-right-arrow"></i>
        </a>
    </div>
</div>

@section('js') 
    <script>
        $( document ).ready(function(e) {
            console.log( "ready!" );
            
            $(".save-icon").click(function() {
                postID = $(this).attr("data-id");

                console.log(postID)
                $('#save-post-'+postID).submit()
            });
        });
    </script>
@endsection  