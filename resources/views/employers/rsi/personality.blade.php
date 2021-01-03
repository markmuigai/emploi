@extends('layouts.dashboard-layout')

@section('title','Emploi :: Candidate Personality')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Candidate Personality')

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
        <form method="POST" action="/employers/applications/{{ $application->post->slug }}/{{ $application->id }}/rsi/personality">
            @csrf
            <div class="form-group">
                <label>Select Personality Traits</label>
                <select required="" name="personality" class="custom-select">
                    <option value="">Select</option>
                    @foreach($personalities as $p)
                    <option value="{{ $p->id }}" @if(isset($application->seekerPersonality->id) && $application->seekerPersonality->personality_id == $p->id)
                        selected=""
                        @endif
                        >{{ $p->name }}</option>
                    @endforeach
                </select>
            </div>
            <hr>
            <button type="submit" name="button" class="btn btn-orange">Submit</button>
        </form>
    </div>
</div>

@endsection