@if (auth()->user() == null)
    <div class="col-sm-6 col-lg-4 mix {{$recommendedJobs->has($post->id) ? 'recommended' : ''}}">
@else
    <div id ="append-save-{{$post->id}}" class="{{$post->location_id}} {{$post->industry_id}} {{$post->location->country}} col-sm-6 col-lg-4 mix {{$post->savedByUser(auth()->user()->id) ? 'saved' : ''}}
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
                @if (auth()->user() && $post->savedByUser(auth()->user()->id) == 1)
                    <span class="save-icon text-success" data-id="{{$post->id}}">
                        <i id="heart-icon-{{$post->id}}" class='bx bxs-heart'></i>
                        <span class="save-text" id="save-text-{{$post->id}}" data-toggle="tooltip"  title="remove from saved">
                            Unsave
                        </span>
                    </span>
                @else
                    @if (auth()->user())
                        <span class="save-icon" data-id="{{$post->id}}">
                            <i id="heart-icon-{{$post->id}}" class='bx bx-heart'></i>
                            <span class="save-text" id="save-text-{{$post->id}}" data-toggle="tooltip"  title="save for later">
                                Save
                            </span>
                        </span> 
                    @else
                        <span class="save-icon" data-id="{{$post->id}}">
                            <i id="heart-icon-{{$post->id}}" class='bx bx-heart'></i>
                            <span class="save-text" id="save-text-{{$post->id}}" data-toggle="tooltip"  title="login to save for later">
                                Save
                            </span>
                        </span> 
                    @endif   
                @endif
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
                let _token   = $('meta[name="csrf-token"]').attr('content');
                let postID = $(this).attr("data-id");

                $.ajax({
                    url: "/v2/favourite",
                    type:"POST",
                    data:{
                        _token: _token,
                        postId:postID
                    },
                    success:function(response){
                        // Toggle elements
                        if($('#append-save-'+postID).hasClass("saved")){
                            // append saved class
                            $('#append-save-'+postID).removeClass('saved')

                            // Change icon
                            $('#heart-icon-'+postID).attr('class','bx bx-heart')

                            // Change text
                            $('#save-text-'+postID).text("Save");
                        }else{
                            // append saved class
                            $('#append-save-'+postID).addClass('saved')

                            // Change icon
                            $('#heart-icon-'+postID).attr('class','bx bxs-heart')

                            // Change text
                            $('#save-text-'+postID).text("Unsave");
                        }   
                    },
                });
            });

            //toggle save vacancy message on hover
            $('[data-toggle="tooltip"]').tooltip();

        });
    </script>
@endsection  