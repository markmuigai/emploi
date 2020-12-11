<div class="row">
    <div class="col-md-12">
        <div class="card shadow my-3">
            <div class="card-body">
                <form class="form-inline">
                    <select class=" my-1 mr-sm-2">
                      <option selected>Select an action</option>
                      <option value="1">Send Assessment</option>
                      <option value="2">Shortlist</option>
                    </select>
                    <button type="submit" class="btn btn-primary my-1">Submit</button>
                  </form>
            </div>
        </div>
    </div>
</div>
<table id="allApplicants" class="table table-bordered shadow rounded-3" style="width:100%">
    <thead>
        <tr>
            <th>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
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
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                </div>
            </td>
            <td>
                <a href="/employers/browse/{{ $a->user->username }}" target="_blank">{{ $a->user->name }}</a>
            </td>
            <td>{{ $a->user->email }}</td>
            <td>{{ $a->user->seeker->getRsi($post) }}%</td>
            <td>{{$a->user->seeker->age}}</td>
            <?php $completed =  $a->user->seeker->calculateProfileCompletion(); ?>
            <td><strong>{{ $completed }}%</strong> complete</td>
            <td>
                @if ($a->user->assessed())
                    <a href="{{route('v2.assessment-results.show', ['email' => $a->user->email])}}" class="btn btn-primary rounded-pill">Assessments</a>
                @else
                    <a href="{{route('v2.employers.assessments.create', [$post->slug])}}" class="">Send Assessment</a>
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

@section('js')
<script>
    $('#allApplicants').DataTable();
</script>
@endsection