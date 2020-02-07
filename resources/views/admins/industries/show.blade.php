@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Industry '.$industry->name)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Industry '.$industry->name)


<div class="card">
    <div class="card-body ">

        <div >
            <h4>
                <a href="/admin/industries/{{ $industry->slug }}" class="orange">
                    {{ $industry->name }}
                </a> 
                <small>{{ $industry->status }}</small>
                <a href="/admin/industries/{{ $industry->slug }}/edit" class="btn btn-sm btn-link" style="float: right;">edit</a>
            </h4>
            <p>
                {{ $industry->slug }} || {{ count($industry->seekers) }} Job Seekers || {{ count($industry->employers) }} Employers || {{ count($industry->cvEditors) }} CV Editors
            </p>
            <hr>
        </div>

    </div>
</div>


@endsection