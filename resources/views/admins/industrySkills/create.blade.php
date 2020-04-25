@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Create Industry Skill')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Create Industry Skill')


<div class="card">
    <div class="card-body ">
        <br>
        <hr>

        <form method="POST" action="/admin/industry-skills">
            @csrf
            <p>
                <label>Skill Name</label>
                <input type="text" name="name" value="" placeholder="skill name" class="form-control" required="" maxlength="100">
            </p>
            @if(isset($request->industry))
                <input type="hidden" name="industry_id" value="{{ $request->industry_id }}">
                <p>
                    <br>
                    Industry: {{ \App\Industry::findOrFail($request->industry)->name }}
                </p>

            @else
            <p>
                <label>Industry</label>
                <select class="form-control" name="industry_id">
                    @forelse(\App\Industry::orderBy('name')->get() as $ind)
                    <option value="{{$ind->id}}">{{ $ind->name }}</option>
                    @empty

                    @endforelse
                    
                </select>
                
            </p>
            @endif
            <p>
                <input type="submit" value="Save Skill" class="btn btn-sm btn-primary">
            </p>
        </form>
        
    </div>
</div>


@endsection