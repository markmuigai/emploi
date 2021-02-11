<div class="col-sm-6 col-lg-4 saved">
    <div class="cat-item">
        <span id="vacancies-image">
            <a href="/vacancies/{{ $a->slug }}">
                <img src="{{ asset($a->user->getPublicAvatarUrl()) }}" alt="{{ $a->user->name }}">
            </a>
        </span>
        <h3>
            <a href="/employers/browse/{{ $a->user->username }}" target="_blank">{{ $a->user->name }}</a>
        </h3>
        <div class="row">
            <div class="col-md-7">
                Applied {{ $a->created_at->diffForHumans() }}   
                @if($a->user->seeker->featured > 0)
                <span class="badge badge-pill badge-success mx-1">
                    <i class="bx bx-star"> </i>Featured
                </span>
                @endif
            </div>
        </div>
        <h5>
            Job suitability score: 
            {{ $a->user->seeker->calculateRsi($post) }}%
        </h5>
        <div class="row my-2">
            {{-- @if ($a->user->assessed())
                <a href="{{route('v2.assessment-results.show', ['email' => $a->user->email])}}" class="btn btn-primary rounded-pill">Assessment Results</a>
            @else
                <a href="{{route('v2.employers.assessments.create', [$post->slug])}}" class="btn btn-success rounded-pill">Send Assessment</a>
            @endif --}}
            @if ($a->status == 'shortlisted')
                <a href="/v2/employers/shortlist/{{ $post->slug }}/{{ $a->user->username }}" class="btn btn-primary ml-2 mt-1 rounded-pill">Remove from Shortlist</a>
            @else
                <a href="/v2/employers/shortlist/{{ $post->slug }}/{{ $a->user->username }}" class="btn btn-primary ml-2 mt-1 rounded-pill">Shortlist</a>
            @endif

            @if ($a->status != 'rejected')
                <a href="/v2/employers/reject/{{ $post->slug }}/{{ $a->user->username }}" class="btn btn-danger ml-2 mt-1 rounded-pill" onclick="return confirm('Are you sure to reject {{ $a->user->name }}?')">Reject</a>
            @else
                <a href="/v2/employers/reject/{{ $post->slug }}/{{ $a->user->username }}" class="btn btn-danger ml-2 mt-1 rounded-pill disabled">Rejected</a>
            @endif
        </div>
        <a class="link" href="/employers/browse/{{ $a->user->username }}" target="_blank">
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