<div class="col-sm-6 col-lg-4 mix saved">
    <div class="cat-item">
        <span id="vacancies-image">
            <a href="/vacancies/{{ $a->slug }}">
                <img src="{{ asset($a->user->getPublicAvatarUrl()) }}" alt="{{ $a->user->name }}">
            </a>
        </span>
        <h3>
            <a href="/employers/browse/{{ $a->user->username }}" target="_blank">{{ $a->user->name }}</a>
        </h3>
        <p>

        </p>
        <div class="row">
            <div class="col-md-7">
                @if($a->user->seeker->featured > 0)
                <span class="badge badge-pill badge-success mx-1">
                    <i class="bx bx-star"> </i>Featured
                </span>
                @endif
            </div>
        </div>
        <span>
            <?php
                $rsi=$a->user->seeker->getRsi($post)
            ?>
            <span class="text-success d-inline">
                Job Score 
                {{ $rsi }}%
            </span> |
            Applied {{ $a->created_at->diffForHumans() }}           
        </span>
        <div class="row my-2">
            <a href="/v2/employers/shortlist/{{ $post->slug }}/{{ $a->user->username }}" class="btn btn-primary ml-2 mt-1 rounded-pill">Remove from Shortlist</a>
            @if ($a->interview()->exists())
                <a href="{{route('v2.interviews.edit' , ['post' => $post, 'interview' => $a->interview])}}" class="btn btn-success ml-2 mt-1 rounded-pill">Update Interview Details</a>
            @else
                <a href="{{route('v2.interviews.create' , ['post' => $post, 'application' => $a])}}" class="btn btn-primary ml-2 rounded-pill">Invite to Interview</a>
            @endif
        </div>
        <a class="link" href="#">
            <i class="flaticon-right-arrow"></i>
        </a>
    </div>
</div>

@section('js') 
    <script>
        $( document ).ready(function(e) {
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