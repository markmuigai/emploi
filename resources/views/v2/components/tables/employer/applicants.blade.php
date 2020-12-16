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
                            <option value="sendAssessment">Send Assessment</option>
                            <option value="interviewInvite">Invite to interview</option>
                            <option value="sendEmail">Send Email</option>
                        </select>
                        <button type="submit" class="btn btn-primary rounded-pill my-1">Submit</button>
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
                <th>Email</th>
                <th>Job Score</th>
                <th>Age</th>
                <th>Profile</th>
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
                <td>{{ $a->user->email }}</td>
                <td>{{ $a->user->seeker->getRsi($post) }}%</td>
                <td>{{ $a->user->seeker->age }}</td>
                <?php $completed =  $a->user->seeker->calculateProfileCompletion(); ?>
                <td><strong>{{ $completed }}%</strong> complete</td>
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

<!--     <div class="modal fade" id="sendAssessmentModal" tabindex="-1" role="dialog" aria-labelledby="sendAssessmentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-body">
                <h4>Send Email</h4>
                <div class="form-group">
                    <label>Subject</label>
                    <input type="text" class="form-control" placeholder="" value="Self assessment on emploi.co">
                  </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Email body</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">Dear applicant, Increase your chances of landing the job you applied for by showcasing your skills through our self assessment tool on http://emploi.co/
                    </textarea>
                </div>
                <div class="row m-2">
                    <button type="button" class="btn btn-secondary rounded-pill mr-2" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary rounded-pill">Submit</button>
                </div>
            </div>
            </div>
        </div>
    </div> -->
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

    // Show modal if send assessment action is selected
    // $("#actions").change(function(){
    //     let action = $("#actions").val();
        
    //     if(action == 'sendAssessment'){
    //         $('#sendAssessmentModal').modal()
    //     }
    // });

</script>
@endsection