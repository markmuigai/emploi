<form action="{{route('v2.bulk-actions.store')}}" method="post">
  @csrf
  <div class="row">
      <div class="col-md-12">
          <div class="card shadow my-3">
              <div class="card-body">
                  <form class="form-inline">
                      <select id="actions" class="my-1 mr-sm-2 rounded-pill" name="action">
                          <option selected>Select an action</option>
                          <option value="update">Update Interview Details</option>
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
              <th>Other info</th>
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
              <td>{{ $a->interview->description}}</td>
              <td>
                <a href="{{route('v2.interviews.edit',[$a->interview->id])}}" class="btn btn-primary rounded-pill pt-1" data-toggle="tooltip" data-placement="right" title="Update Interview Details"><i class='bx bx-edit'></i></a>
                <a href="#" class="btn btn-success rounded-pill pt-1" data-toggle="tooltip" data-placement="right" title="Submit Interview scoresheet"><i class='bx bx-clipboard'></i></a>
                <a href="#" class="btn btn-danger rounded-pill pt-1" data-toggle="tooltip" data-placement="right" title="Delete Interview"><i class='bx bxs-trash'></i></a>
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

  // Show modal if send assessment action is selected
  // $("#actions").change(function(){
  //     let action = $("#actions").val();
      
  //     if(action == 'sendAssessment'){
  //         $('#sendAssessmentModal').modal()
  //     }
  // });

</script>
@endsection