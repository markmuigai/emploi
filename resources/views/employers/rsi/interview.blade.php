@extends('layouts.dashboard-layout')

@section('title','Emploi :: Interview Scores')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Interview Score')
<div class="card">
    <div class="card-body">
        <h2>
            {{ $application->user->name }}
        </h2>
        <p>
            <a href="/employers/applications/{{ $application->post->slug }}/">
                {{ $application->post->title }}
            </a>
            ||
            <a href="/employers/applications/{{ $application->post->slug }}/{{ $application->id }}/rsi">
                RSI {{ $application->user->seeker->getRsi($application->post) }}%
            </a>
        </p>
        <form method="POST" action="/employers/applications/{{ $application->post->slug }}/{{ $application->id }}/rsi/interview">
            @csrf
            <div id="interview-pool">
                @forelse($application->interviewResults as $i)
                <div class="form-group">
                    <label>Edit Interview Score (0-100) <b style="color: red" title="Required">*</b></label>
                    <input type="number" name="score[]" class="form-control" value="{{ $i->score }}" step="0" min="0" max="100" required="required">
                    <span class="pull-right rm-interview-score"><i class="fas fa-times text-danger"></i></span>
                </div>
                @empty
                <div class="form-group">
                    <label>Interview Score (0-100) <b style="color: red" title="Required">*</b></label>
                    <span class="pull-right rm-interview-score"><i class="fas fa-times text-danger"></i></span>
                    <input type="number" name="score[]" class="form-control" value="" step="0" min="0" max="100" required="required">
                </div>
                @endforelse
            </div>

            <button type="submit" name="button" class="btn btn-orange pull-right">Submit</button>
            <button id="add-interview" class="btn btn-orange-alt mr-2 pull-right">Add Interview</button>
        </form>
    </div>
</div>

<script type="text/javascript">
    $().ready(function() {
        $('#add-interview').click(function() {
            var $i = '' +
                '<p>' +
                '<label>Interview Score (0-100) <b style="color: red" title="Required">*</b></label>' +
                '<span class="pull-right rm-interview-score"><i class="fas fa-times text-danger"></i></span>' +
                '<input type="number" name="score[]" class="form-control" value="" step="0" min="0" max="100" required="required">' +
                '</p>';
            $('#interview-pool').append($i);

            $('.rm-interview-score').click(function() {
                $(this).parent().remove();
            });
        });

        $('.rm-interview-score').click(function() {
            $(this).parent().remove();
        });
    });
</script>

@endsection