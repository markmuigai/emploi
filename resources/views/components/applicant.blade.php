<div class="card mb-4">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-lg-2 col-4">
                <img src="{{ asset($a->user->getPublicAvatarUrl()) }}" class="avatar-small" alt="{{ $a->user->name }}">
            </div>
            <div class="col-8 col-md-8 col-lg-10">
                <div class="row align-items-center">
                    <div class="col-12 col-md-8 col-lg-8">
                        <h4>{{ $a->user->name }} <small  class="badge badge-purple">{{ $a->created_at->diffForHumans() }}</small></h4>
                        <p class="text-success">{{ $a->user->seeker->industry->name }}</p>
                        @if(isset($a->user->seeker->location_id))
                        <p><i class="fas fa-map-marker-alt orange"></i> {{ $a->user->seeker->location->name }},
                            {{ $a->user->seeker->location->country->name }}</p>
                        @endif
                    </div>
                    <div class="col-12 col-md-4 col-lg-4 pt-md-2 text-md-center">
                        <h5>
                            RSI 
                            <?php
                                if(!isset($last_rsi))
                                    $last_rsi = [];
                                if(!array_key_exists('seeker_'.$a->user->seeker->id, $last_rsi))
                                    $last_rsi['seeker_'.$a->user->seeker->id] = $a->user->seeker->getRsi($post);
                            ?>
                            {{ $last_rsi['seeker_'.$a->user->seeker->id] }}%
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row justify-content-between align-items-center">
            <div class="col-12 col-md-6 col-lg-6">
                @if($a->status == 'rejected')
                    <strong style="color: red"  data-toggle="tooltip" data-placement="right" title="NO ACTIONS AVAILABLE">REJECTED</strong>
                @else

                    @if($a->status == 'selected')
                        <a href="#" class="text-success"  data-toggle="tooltip" data-placement="bottom" title="Candidate was selected"> <i class="fas fa-check"></i> <strong>SELECTED</strong></a>
                    @else

                        @if($post->isShortlisted($a->user->seeker))
                            <a href="/employers/shortlist-toggle/{{$post->slug}}/{{$a->user->username}}"  data-toggle="tooltip" data-placement="bottom"  title="Remove {{ $a->user->getName() }} from Shortlist">Remove from Shortlist</a>

                        @else
                            <a href="/employers/shortlist-toggle/{{$post->slug}}/{{$a->user->username}}"  data-toggle="tooltip" data-placement="bottom"  title="Click to shortlist {{ $a->user->getName() }}">Shortlist</a>
                        @endif
                        |
                        <a href="/employers/reject-toggle/{{ $post->slug }}/{{ $a->user->username }}"  data-toggle="tooltip" data-placement="bottom" title="Reject Application" class="text-danger">Reject</a>
                    @endif
                @endif
            </div>
            <div class="col-12 col-md-6 col-lg-5 text-md-right">
                <a class="orange mr-2" href="/employers/applications/{{ $post->slug }}/{{ $a->id }}/rsi"  data-toggle="tooltip" data-placement="bottom" title="Additional Candidate Information">Actions</a>
                <a href="/employers/browse/{{ $a->user->username }}" target="_blank" class=" btn btn-orange"  data-toggle="tooltip" data-placement="bottom" title="View Profile, CV, about and Skills">View Profile</a>
            </div>
        </div>
    </div>
</div>