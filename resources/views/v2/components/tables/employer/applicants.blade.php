<form action="{{route('v2.bulk-actions.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow my-3">
                <div class="card-body">
                    <form class="form-inline">
                        <select id="actions" class="my-1 mr-sm-2 rounded-pill" name="action">
                            <option selected>Select an action</option>
                            <option value="shortlist">Shortlist</option>
                            <option value="downloadCV">Download CV</option>
                            <option value="interviewInvite">Invite to interview</option>
                        </select>
                        <button type="submit" class="btn btn-primary rounded-pill my-1" id="submit">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <table id="allApplicants" class="table table-bordered shadow rounded-3" style="width:100%">
        <thead>
            <tr>
                <th>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="selectAll">
                    </div>
                </th>
                <th>Name</th>
                <th>Uploaded CV?</th>
                <th>Job Score</th>
                <th>Age</th>
                <th>Applied</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pool as $a)
            <tr>
                <td>
                    <div class="form-group form-check">
                        <input name="applications[]" type="checkbox" class="form-check-input" value="{{$a->id}}">
                    </div>
                </td>
                <td>
                    <a href="/employers/browse/{{ $a->user->username }}" target="_blank">{{ $a->user->name }}</a>
                </td>
                <td>
                    @if($a->user->seeker->resume!=null)
                        <p>Yes</p>
                    @else
                        <p>No</p>
                    @endif
                </td>
                <td>{{ $a->user->seeker->getRsi($post) }}%</td>
                <td>{{ $a->user->seeker->age }}</td>
                <td>{{$a->created_at->diffForHumans()}}</td>
                <td>
                    @if ($a->status == 'shortlisted')
                        <a href="/v2/employers/shortlist/{{ $post->slug }}/{{ $a->user->username }}" class="btn btn-primary ml-2 rounded-pill disabled">Shortlisted</a>
                    @else
                        <a href="/v2/employers/shortlist/{{ $post->slug }}/{{ $a->user->username }}" class="btn btn-primary ml-2 rounded-pill">Shortlist</a>
                    @endif
                </td>
            </tr>
            @empty
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <th>Bulk Actions</th>
                <th>Name</th>
                <th>Job Score</th>
                <th>Age</th>
                <th>Time Applied</th>
                <th>Profile</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>

    <div class="modal fade" id="interviewInviteModal" tabindex="-1" role="dialog" aria-labelledby="interviewInviteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-body">
                <h4>Send Email</h4>
                @csrf
                <div class="form-row">
                    <div class="col-md-6">
                        <label for="date">Date and Time</label> 
                        <input class="form-control rounded-pill" name="date" type="datetime-local" id="meeting-time"
                        name="meeting-time" value="2020-12-01T14:30"
                        min="2020-06-07T00:00" max="2022-06-14T00:00">
                    </div>
                    <div class="col-md-6">
                        <label for="modeOfInterview">Mode of Interview</label>
                        <select id="modeOfInterview" name="modeOfInterview" class="interview-mode rounded-pill">
                            <option selected>Select...</option>
                            <option value="online">Online</option>
                            <option value="physical">Physical</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="form-group col-md-12">
                        <label for="location">Location</label>
                        <input type="text" name="location" class="form-control rounded-pill" placeholder="Location">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="form-group col-md-12">
                        <label for="interviewDescription">Other Information</label>
                        <textarea class="form-control" name="description" id="interviewDescription" rows="3"></textarea>
                        </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">
                    Schedule Interview
                </button>
            </div>
            </div>
        </div>
    </div> 
</form>

@section('js')
<script>
    $('#allApplicants').DataTable();

    // Listen for click on toggle checkbox
    $('#selectAll').click(function(event) {   
        if(this.checked) {
            // Iterate each checkbox
            $(':checkbox').each(function() {
                this.checked = true;                        
            });
        } else {
            $(':checkbox').each(function() {
                this.checked = false;                       
            });
        }
    });

//disable submit button when nothing is selected
$('#submit').prop("disabled", true);
    $('input:checkbox').click(function() {
        if ($(this).is(':checked')) {
            $('#submit').prop("disabled", false);
                }
        else{
            if ($('.checks').filter(':checked').length < 1)
                {
                    $('#submit').attr('disabled',true);
                }
    }
});

    // Show modal if send assessment action is selected
    $("#actions").change(function(){
        let action = $("#actions").val();
        
        if(action == 'interviewInvite'){
            $('#interviewInviteModal').modal()
        }
    });

</script>
@endsection