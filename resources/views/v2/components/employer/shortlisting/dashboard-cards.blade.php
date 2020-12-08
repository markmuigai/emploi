<h3 class="text-center my-2">{{$post->title}} Shortlisting</h3>
<div class="row">
    <div class="col-md-6">
        <div class="card p-3 mb-2">
            <h4>Job score criteria</h4>
            <p>By creating an RSI Model, you will be able to rank applicants through different criteria e.g education, experience and skills</p>
            <div class="row">
                <div class="col-md-6">
                <a href="{{route('v2.employers.rsi.show', ['slug' => $post->slug])}}" class="btn btn-primary btn-sm rounded-pill">
                    Generate ranking criteria
                </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card p-3">
            <h4>Quick actions</h4>
            <p>Select candidates from our talent database or generate a link to share this vacancy</p>
            <div class="row px-3">
                <button class="btn btn-primary mr-2 mt-1 btn-sm rounded-pill">
                    Browse More Candidates
                </button>
                <button class="btn btn-success mr-2 mt-1 btn-sm rounded-pill" data-toggle="modal" data-target="#shareVacancy">
                    Share this vacancy
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="shareVacancy" tabindex="-1" role="dialog" aria-labelledby="shareVacancyLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="card">
            <div class="card-body text-center copyright-area">
                <h2>
                    Invitation for {{ $post->title }}
                </h2>
                <a href="/employers/applications/{{ $post->slug }}" class="btn btn-orange">Applications ({{ count($post->applications) }})</a>
        
                @if(!$post->hasModelSeeker())
                <a href="/employers/applications/{{ $post->slug }}/rsi" class="btn btn-danger"><i class="fas fa-warning"></i> RSI Model Not Created</a>
                @else
                <a href="/employers/applications/{{ $post->slug }}/rsi" class="btn btn-purple"><i class="fas fa-check"></i> RSI Model</a>
                @endif
        
                <hr>
        
                @if($post->status == 'active')
                <p>
                    Share the link below to invite applications for this position.
                </p>
                <h4 class="orange my-3"><a href="{{ url('/vacancies/'.$post->slug.'/apply') }}">
                        {{ url('/vacancies/'.$post->slug.'/apply') }}
                    </a></h4>
        
                    <div class="copyright-item">
                        <ul>
                            <li>
                                <a href="http://www.facebook.com/sharer.php?u={{ url('/vacancies/'.$post->slug.'/apply') }}" target="_blank">
                                    <i class='bx bxl-facebook'></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/share?url={{ url('/vacancies/'.$post->slug.'/apply') }}&amp;text={{ urlencode($post->title) }}&amp;hashtags=Emploi{{ $post->location->country->code }}" target="_blank">
                                    <i class='bx bxl-twitter'></i>
                                </a>
                            </li>
                            <li>
                                <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ url('/vacancies/'.$post->slug) }}" target="_blank">
                                    <i class='bx bxl-linkedin-square'></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                <p>
                    All applicants <strong>must register a profile</strong> and update their profile
                </p>
                @else
                <p>
                    This position has been closed and further applications cannot be received.
                </p>
                @endif
                <button type="button" class="btn btn-secondary rounded-pill" data-dismiss="modal">Close</button>
            </div>
        </div>
      </div>
    </div>
  </div>