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
            Applied {{ $a->created_at->diffForHumans() }}
        </span>
        <div class="row my-2">
<!--             <a href="/v2/employers/applications/{{ $a->post->slug }}/close/{{ $a->user->username }}" class="btn btn-success rounded-pill">Give Job Offer</a> -->
           <!--  <a href="/v2/employers/applications/{{ $a->post->slug }}/close/{{ $a->user->username }}" class="btn btn-success rounded-pill">Give Job Offer</a> -->
            @if($a->status == 'selected')
            <button class="btn btn-primary rounded-pill"><a href="#"><span style="color: #fff">Selected</span></a></button>
            @else
            <button class="btn btn-success rounded-pill"><a href="#" data-toggle="modal" data-target="#selectCandidateModal-{{ $a->user->id }}"><span style="color: #fff">Give Job Offer</span></a></button>
            @endif
        </div>
        <a class="link" href="/employers/browse/{{ $a->user->username }}" target="_blank">
            <i class="flaticon-right-arrow"></i>
        </a>
    </div>
</div>

<div class="modal fade" id="selectCandidateModal-{{ $a->user->id }}" tabindex="-1" role="dialog" aria-labelledby="selfAssessmentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <h4 class="text-center mt-4">
                Select Candidate
            </h4>
                <div class="modal-body">
                <form method="POST" action="/v2/employers/applications/{{$a->post->slug}}/close/{{$a->user->username}}">
                @csrf
                <div class="job-filter-area pt-2">
                    <div class="container">
                        <form>
                            <div class="row">
                                <div class="col-sm-12 col-lg-12" style="display: none">
                                    <div class="form-group">
                                      <label>Candidate Name</label>
                                        <input type="text" class="custom-select" value="{{ $a->user->seeker->id }}" name="seeker_id">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                    <label>Monthly Salary</label>
                                    <input type="number" name="monthly_salary" class="form-control" value="{{ $post->monthly_salary }}" required="">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-12">
                                    <button type="submit" class="btn cmn-btn">
                                        Confirm Candidate
                                        <i class='bx bx-check' ></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </form>
            </div>
        </div>
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