@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Industries')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Industries')


<div class="card">
    <div class="card-body ">
        {{ count(\App\Industry::all()) }} Industries
        <a href="/admin/industries/create" class="btn btn-sm btn-success" style="float: right;">Create</a>
        <br>
        <hr>
        @forelse($industries as $ind)

        <div >
            <h4>
                <a href="/admin/industries/{{ $ind->slug }}" class="orange">
                    {{ $ind->name }}
                </a> 
                <small>{{ $ind->status }}</small>
                <a href="/admin/industries/{{ $ind->slug }}/edit" class="btn btn-sm btn-link" style="float: right;">edit</a>
            </h4>
            <p>
                {{ $ind->slug }} || {{ count($ind->seekers) }} Job Seekers || {{ count($ind->employers) }} Employers || {{ count($ind->cvEditors) }} CV Editors || <a href="/admin/industry-skills/{{ $ind->id }}">{{ count($ind->industrySkills) }} Skills </a>
            </p>
            <hr>
        </div>

        @empty

        <p>
            No industries have been found
        </p>

        @endforelse
    </div>
</div>
<div>
    {{ $industries->links() }}
</div>


@endsection