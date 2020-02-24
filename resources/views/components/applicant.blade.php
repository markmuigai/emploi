<div class="card mb-4">
    <div class="card-body">
        <p class="d-none">{{ $a->user->seeker->industry->name }}
            <a href="/employers/applications/{{ $post->slug }}/{{ $a->id }}/rsi" title="View Details">
                <span class="pull-right purple"><strong>RSI {{ $a->user->seeker->getRsi($post) }}%</strong></span>
            </a>
        </p>
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
                        <h5>RSI 0%</h5>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row justify-content-between align-items-center">
            <div class="col-12 col-md-6 col-lg-6">
                @if($a->status == 'rejected')
                <a href="/employers/reject-toggle/{{ $post->slug }}/{{ $a->user->username }}" class="text-danger"><strong>Cancel Reject</strong></a>
                @else

                    @if($a->status == 'selected')
                    <a href="#" class="text-success"> <i class="fas fa-check"></i> <strong>SELECTED</strong></a>
                    @else

                    @if($post->isShortlisted($a->user->seeker))
                    <a href="/employers/shortlist-toggle/{{$post->slug}}/{{$a->user->username}}" title="Remove from Shortlist">Remove from Shortlist</a>

                    @else
                    <a href="/employers/shortlist-toggle/{{$post->slug}}/{{$a->user->username}}" title="Add to Shortlist">Shortlist</a>
                    @endif
                    |
                    <a href="/employers/reject-toggle/{{ $post->slug }}/{{ $a->user->username }}" class="text-danger">Reject</a>
                    @endif
                @endif
            </div>
            <div class="col-12 col-md-6 col-lg-5 text-md-right">
                <a class="orange mr-2" href="/employers/applications/{{ $post->slug }}/{{ $a->id }}/rsi">Actions</a>
                <a href="/employers/browse/{{ $a->user->username }}" target="_blank" class=" btn btn-orange">View Profile</a>
            </div>
        </div>
    </div>
</div>