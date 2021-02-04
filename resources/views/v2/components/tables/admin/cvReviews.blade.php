<table id="cvReviewsTable" class="table table-hover table-bordered">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Email</th>
        <th scope="col">Converted</th>
        <th scope="col">Experience</th>
        <th scope="col">Score</th>
        <th scope="col">Created</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cvReviews as $key => $review)
        <tr>
            <td>{{$key+1}}</td>
            <td>
                {{$review->email}}
            </td>
            <td>
                @if ($convertedEmails->search($review->email) == false)
                    No
                @else
                    Yes
                @endif
            </td>
            @if(isset($review->user->seeker->id))
                    <td>{{ $review->user->seeker->years_experience }} years</td>
                @else
                    <td>Unavailable</td>
                @endif
                
            <td>{{$review->score}}%</td>
            <td>{{ $review->created_at->diffForHumans() }}</td>
            <td>
                 <a href="/v2/admin/cvReviews/{{ $review->id }}" class="btn btn-success rounded-pill" title="View detailed results">
                    <i class='bx bx-line-chart'></i>
                </a>
                @if($review->path!='')
                    <a href="/v2/admin/cv-review/download/{{ $review->id }}" class="btn btn-success rounded-pill" title="Download CV">
                        <i class='bx bxs-download' ></i>
                    </a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>