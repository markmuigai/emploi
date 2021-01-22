<div class="col-sm-6 col-lg-4 mix saved">
    <div class="cat-item">
        <span id="vacancies-image">
            <a href="#">
                <img src="{{ asset($s->user->getPublicAvatarUrl()) }}" alt="{{ $s->user->name }}">
            </a>
        </span>
        <h3>
            <a href="/employers/browse/{{ $s->user->username }}" target="_blank">{{ $s->user->name }}</a>
        </h3>
        <div class="row">
            <div class="col-md-7">
                @if($s->user->seeker->featured > 0)
                <span class="badge badge-pill badge-success mx-1">
                    <i class="bx bx-star"> </i>Featured
                </span>
                @endif
            </div>
        </div>
        <div class="row my-4">
      <!--       @if ($s->user->assessed())
                <a href="{{route('v2.assessment-results.show', ['email' => $s->user->email])}}" class="btn btn-primary rounded-pill">Assessment Results</a>
            @else
                <a href="#" class="btn btn-success rounded-pill">Send Assessment</a>
            @endif  -->
        

            <a class="btn btn-success rounded-pill ml-1" type="button" data-toggle="modal" data-target="#shortlistSeekerCardModal-{{ $s->user->id }}" title="Shortlist">
               <i class='bx bx-check'></i>
            </a>     

  <!--           @if($s->user->seeker->resume!=null)
                <a href="{{ $s->user->seeker->resumeUrl }}" class="btn btn-success rounded-pill ml-1"  data-toggle="tooltip" data-placement="top"  title="Download CV">
                    <i class='bx bxs-download'></i>
                </a>
            @endif -->

            <a class="btn btn-success rounded-pill ml-1" type="button" data-toggle="modal" data-target="#saveSeekerCardModal-{{ $s->user->id }}" title="Save profile">
               <i class='bx bxs-heart'></i>
            </a>  
        </div>   

        <a class="link" href="#">
            <i class="flaticon-right-arrow"></i>
        </a>
    </div>
</div>

            <!--SHORTLIST MODAL -->
            <div class="modal fade" id="shortlistSeekerCardModal-{{ $s->user->id }}" tabindex="-1" role="dialog" aria-labelledby="shortlistSeekerCardModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <h4 class="text-center mt-4">
                           Shortlist
                        </h4>
                            <div class="modal-body">
                            @if(count(Auth::user()->employer->shortlistingPosts) > 0)
                            <form method="post" action="/employers/shortlist">
                                @csrf  
                                <div class="job-filter-area pt-2">
                                    <div class="container">
                                        <form>
                                            <div class="row">                              
                                                <div class="col-sm-12 col-lg-12">
                                                    <div class="form-group">
                                                        <input type="hidden" name="seeker_id" value="{{ $s->id }}">                   
                                                        <select class="form-control" name="post_id">
                                                            @foreach(Auth::user()->employer->shortlistingPosts as $ap)
                                                            <option value="{{ $ap->id }}">{{ $ap->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>                              
                                                <div class="col-sm-6 col-lg-12">
                                                    <button type="submit" class="btn cmn-btn">
                                                        Shortlist
                                                        <i class='bx bx-check'></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>                                
                                    </div>
                                </div>
                            </form>
                            @else
                            <h5 class="text-danger text-center">No job posted yet</h5>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
             <!--END SHORTLIST SEEKER MODAL -->
            
<!--         SAVE PROFILE MODAL -->
             <div class="modal fade" id="saveSeekerCardModal-{{ $s->user->id }}" tabindex="-1" role="dialog" aria-labelledby="saveSeekerCardModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <h4 class="text-center mt-4">
                           Save {{ $s->user->name }} profile?
                        </h4>
                            <div class="modal-body">
                            <form method="post" action="/employers/saved" class="row">
                                @csrf  
                                <div class="job-filter-area pt-2">
                                    <div class="container">
                                        <form>
                                            <div class="row">                              
                                                <div class="col-sm-12 col-lg-12">
                                                    <div class="form-group">
                                                        <input type="hidden" name="seeker_id" value="{{ $s->id }}">                
                                                    </div>
                                                </div>                              
                                                <div class="col-sm-6 col-lg-12">
                                                    <button type="submit" class="btn cmn-btn">
                                                        Save
                                                        <i class='bx bx-search-alt'></i>
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
         <!--    END SAVE PROFILE MODAL -->