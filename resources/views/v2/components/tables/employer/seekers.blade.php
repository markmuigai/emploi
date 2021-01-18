<form action="{{route('v2.bulk-actions.store')}}" method="post">
    @csrf
    <table id="allSeekers" class="table table-bordered shadow rounded-3" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Industry</th>
                <th>Education Level</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($seekers as $s)
            <tr>
                <td>
                    <a href="/employers/browse/{{ $s->user->username }}" target="_blank">{{ $s->user->name }}</a>
                </td>
                <td>
                    {{ $s->industry->name }}
                </td>
                <td>
                    @if(isset($s->educationLevel))
                        {{ $s->educationLevel->name }}
                    @else
                        Not Provided
                    @endif
                </td>
                <td>
                    @if(isset($s->location))
                    {{ $s->location->name.', '.$s->location->country->code }}
                    @else
                    {{ $s->country->name }}
                    @endif
                </td>
                <td>
  
                    <a class="btn btn-success rounded-pill" type="button" data-toggle="modal" data-target="#shortlistSeekerModal-{{ $s->user->id }}" title="Shortlist">
                       <i class='bx bx-check'></i>
                    </a>     

                    @if($s->user->seeker->resume!=null)
                        <a href="{{ $s->user->seeker->resumeUrl }}" class="btn btn-success rounded-pill"  data-toggle="tooltip" data-placement="top"  title="Download CV">
                            <i class='bx bxs-download'></i>
                        </a>
                    @endif

                 <!--    <button class="btn btn-success rounded-pill" data-toggle="tooltip" data-placement="top" title="Save profile">
                        <i class='bx bxs-heart' ></i>
                    </button> -->

                    <a class="btn btn-success rounded-pill" type="button" data-toggle="modal" data-target="#saveSeekerModal-{{ $s->user->id }}" title="Save profile">
                       <i class='bx bxs-heart'></i>
                    </a>     

                </td>
            </tr>
            <!--SHORTLIST MODAL -->
            <div class="modal fade" id="shortlistSeekerModal-{{ $s->user->id }}" tabindex="-1" role="dialog" aria-labelledby="shortlistSeekerModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <h4 class="text-center mt-4">
                           Shortlist
                        </h4>
                            <div class="modal-body">
                            @if(count(Auth::user()->employer->shortlistingPosts) > 0)
                            <form method="post" action="/employers/shortlist" class="row">
                                @csrf  
                                <div class="job-filter-area pt-2">
                                    <div class="container">
                                        <form>
                                            <div class="row">                              
                                                <div class="col-sm-12 col-lg-12">
                                                    <div class="form-group">
                                                        <input type="hidden" name="seeker_id" value="{{ $s->id }}">                   
                                                        <select class="form-control" name="post_id">
                                                            @foreach(Auth::user()->employer->shortlistedPosts as $ap)
                                                            <option value="{{ $ap->id }}">{{ $ap->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>                              
                                                <div class="col-sm-6 col-lg-12">
                                                    <button type="submit" class="btn cmn-btn">
                                                        Shortlist
                                                        <i class='bx bx-search-alt'></i>
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
       <!--      END SHORTLIST SEEKER MODAL -->
            
    <!--         SAVE PROFILE MODAL -->
             <div class="modal fade" id="saveSeekerModal-{{ $s->user->id }}" tabindex="-1" role="dialog" aria-labelledby="saveSeekerModalLabel" aria-hidden="true">
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
            @empty
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Industry</th>
                <th>Education Level</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>
</form>
@section('js')
    <script>
        $('#allSeekers').DataTable({
            "paging": false,
            "bInfo" : false
        });
    </script>
@endsection