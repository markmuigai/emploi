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
        <span>
            <?php
                $rsi=$s->user->seeker->getRsi($post)
            ?>
            <span class="text-success d-inline">
                Job Score 
                {{ $rsi }}%
            </span>       
        </span>
        <div class="row my-2">
            @if ($s->status == 'shortlisted')
                <a href="/v2/employers/shortlist/{{ $post->slug }}/{{ $s->user->username }}" class="btn btn-primary ml-2 rounded-pill">Remove from Shortlist</a>
            @else
                <a href="/v2/employers/shortlist/{{ $post->slug }}/{{ $s->user->username }}" class="btn btn-primary ml-2 rounded-pill">Shortlist</a>
            @endif
       <!--      @if ($s->user->assessed())
                <a href="{{route('v2.assessment-results.show', ['email' => $s->user->email])}}" class="btn btn-primary rounded-pill">Assessment Results</a>
            @else
                <a href="#" class="btn btn-success rounded-pill">Send Assessment</a>
            @endif -->
        </div>
        <a class="link" href="/employers/browse/{{ $a->user->username }}" target="_blank">
            <i class="flaticon-right-arrow"></i>
        </a>
    </div>
</div>