<form action="{{route('v2.bulk-actions.store')}}" method="post">
  @csrf
  <div class="row">
      <div class="col-md-12">
          <div class="card shadow my-3">
              <div class="card-body">
                  <form class="form-inline">
                      <select id="actions" class="my-1 mr-sm-2 rounded-pill" name="action">
                          <option selected>Select an action</option>
                          <option value="deleteInterview">Delete Interview</option>
                      </select>
                      <button type="submit" class="btn btn-primary rounded-pill my-1" id="submit">Submit</button>
              </div>
          </div>
      </div>
  </div>
  <table id="allInterviewees" class="table table-bordered shadow rounded-3" style="width:100%">
      <thead>
          <tr>
              <th>
                  <div class="form-group form-check">
                      <input type="checkbox" class="form-check-input" id="selectAll">
                  </div>
              </th>
              <th>Name</th>
              <th>Interview Mode</th>
              <th>Location</th>
              <th>Date</th>
              <th>Status</th>
              <th>Actions</th>
          </tr>
      </thead>
      <tbody>
          @forelse($pool as $a)
          <tr>
              <td>
                  <div class="form-group form-check">
                      <input name="interviews[]" type="checkbox" class="form-check-input" value="{{$a->interview->id}}">
                  </div>
              </td>
              <td>
                  <a href="/employers/browse/{{ $a->interview->user()->username }}" target="_blank">{{ $a->interview->user()->name }}</a>
              </td>
              <td>{{ $a->interview->interview_mode }}</td>
              <td>{{ $a->interview->location }}</td>
              <td>{{ $a->interview->date}}</td>
              <td>{{ $a->interview->status}}</td>
              <td>
                <a class="btn btn-primary rounded-pill pt-1" data-toggle="modal" data-target="#updateInterview-{{ $a->interview->id}}"><i class='bx bx-edit'></i></a>
                @if ($a->interview->evaluation()->exists())
                    <a href="{{route('v2.interview-evaluations.show', ['interview' => $a->interview, 'interview_evaluation' => $a->interview->evaluation])}}" class="btn btn-success rounded-pill pt-1" data-toggle="tooltip" data-placement="right" title="View Interview evaluation"><i class='bx bx-line-chart'></i></a>    
                @else
                    <a href="{{route('v2.interview-evaluations.create', ['interview' => $a->interview])}}" class="btn btn-success rounded-pill pt-1" data-toggle="tooltip" data-placement="right" title="Submit Interview evaluation"><i class='bx bx-clipboard'></i></a>
                @endif
                <a class="btn btn-danger rounded-pill pt-1" data-toggle="modal" data-target="#deleteInterview-{{ $a->interview->id}}"><i class='bx bxs-trash'></i></a>
              </td>
          </tr>
          @empty
          @endforelse
      </tbody>
      <tfoot>
        <tr>
          <th>
              <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="selectAll">
              </div>
          </th>
          <th>Name</th>
          <th>Interview Mode</th>
          <th>Location</th>
          <th>Date</th>
          <th>Other info</th>
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

@foreach($pool as $a)
    <div class="modal fade" id="updateInterview-{{$a->interview->id}}" tabindex="-1" role="dialog" aria-labelledby="updateInterviewLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h4 class="text-center pb-2">Update interview details</h4>
                    <form action="{{route('v2.interviews.update', ['post' => $post, 'interview' => $a->interview])}}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="date">Date and Time</label> 
                                <input class="form-control rounded-pill" name="date" type="datetime-local" id="meeting-time"
                                name="meeting-time" value="{{$a->interview->formattedDate()}}"
                                min="2020-06-07T00:00" max="2022-06-14T00:00">
                            </div>
                            <div class="col-md-6">
                                <label for="modeOfInterview">Mode of Interview</label>
                                <select id="modeOfInterview" name="modeOfInterview" class="interview-mode rounded-pill">
                                <option {{$a->interview->interview_mode == 'online' ? 'selected' : ''}} value="online">Online</option>
                                <option {{$a->interview->interview_mode == 'physical' ? 'selected' : ''}} value="physical">Physical</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="location">Location</label>
                                <input type="text" name="location" class="form-control rounded-pill" placeholder="Location"
                                value="{{$a->interview->location ?? ''}}">
                            </div>
                            <div class="col-md-6">
                                <label for="status">Status</label>
                                 <select id="status" name="status" class="status-mode rounded-pill">
                                    <option {{$a->interview->status == 'pending' ? 'selected' : ''}} value="pending">pending</option>
                                    <option {{$a->interview->status == 'complete' ? 'selected' : ''}} value="complete">complete</option>
                                    <option {{$a->interview->status == 'missed' ? 'selected' : ''}} value="missed">missed</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="form-group col-md-12">
                                <label for="interviewDescription">Description</label>
                                <textarea class="form-control" name="description" id="interviewDescription" rows="3">{{$a->interview->description ?? ''}}</textarea>
                            </div>
                        </div>
                        <div class="row m-2">
                            <button type="button" class="btn btn-secondary rounded-pill mr-2" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary rounded-pill">Update Interview</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteInterview-{{$a->interview->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteInterviewLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h4 class="text-center pb-2">Update interview details</h4>
                    <form action="{{route('v2.interviews.destroy', ['post' => $post, 'interview' => $a->interview])}}" method="post">
                        @method('DELETE')
                        @csrf
                        <P class="pl-3">Confirm deletion of this interview</P>
                        <div class="row m-2">
                            <button type="button" class="btn btn-secondary rounded-pill mr-2" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger rounded-pill">Delete Interview</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 
@endforeach

@section('js')
<script>
  $('#allInterviewees').DataTable();

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

//   Show modal if send assessment action is selected
//   $("#actions").change(function(){
//       let action = $("#actions").val();
      
//       if(action == 'sendAssessment'){
//           $('#sendAssessmentModal').modal()
//       }
//   });

</script>
@endsection