@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Industry '.$industry->name)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Industry: '.$industry->name)


<div class="card">
    <div class="card-body ">

        <div >
            <h4>
                <a href="/admin/industries" class="fa fa-arrow-left"></a>
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

        <div>
            <h4>
                Industry Skills ({{ count($industry->industrySkills) }})
                <a href="/admin/industry-skills/create?industry={{ $industry->id }}" class="btn btn-orange " style="float: right;">Create Skill</a>
            </h4>
            <hr>
            <div class="row">
                @forelse($industry->industrySkills as $skill)
                    <div class="col-md-4">
                        <p>
                            <b>{{ $skill->name }} </b> 

                            
                            <a class="btn btn-info  btn-sm fa fa-edit" style="float: right;" href="/admin/industry-skills/{{ $skill->id }}/edit" title="Edit {{ $skill->name }}"></a>
                        </p>
                    </div>
                @empty
                <p>No industry skills found</p>
                @endforelse
            </div>
        </div>

    </div>
</div>


@endsection