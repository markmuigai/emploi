<form action="{{route('v2.bulk-actions.store')}}" method="post">
    @csrf
    <table id="allSeekers" class="table table-bordered shadow rounded-3" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Industry</th>
                <th>Education Level</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($seekers as $s)
            <tr>
                <td>
                    <a href="/employers/browse/{{ $s->user->username }}" target="_blank">{{ $s->user->name }}</a>
                </td>
                <td>
                    {{ $s->industry->name }}
                </td>
                <td>
                    @if(isset($s->educationLevel))
                        {{ $s->educationLevel->name }}
                    @else
                        Not Provided
                    @endif
                </td>
                <td>
                    @if(isset($s->location))
                    {{ $s->location->name.', '.$s->location->country->code }}
                    @else
                    {{ $s->country->name }}
                    @endif
                </td>
                <td>
                    <button class="btn btn-success rounded-pill" data-toggle="tooltip" data-placement="top" title="Shortlist">
                        <i class='bx bx-check'></i>
                    </button>
                    <button class="btn btn-success rounded-pill" data-toggle="tooltip" data-placement="top" title="Download CV">
                        <i class='bx bxs-download'></i>
                    </button>
                    <button class="btn btn-success rounded-pill" data-toggle="tooltip" data-placement="top" title="Save profile">
                        <i class='bx bxs-heart' ></i>
                    </button>
                </td>
            </tr>
            @empty
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Industry</th>
                <th>Education Level</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>
</form>

@section('js')
    <script>
        $('#allSeekers').DataTable({
            "paging": false,
            "bInfo" : false
        });
    </script>
@endsection