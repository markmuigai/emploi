@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Create CV Editor')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Create CV Editor')


<div class="card">
    <div class="card-body">
        <h5>
            <a href="/admins/cveditors" class="btn btn-default">
                <i class="fa fa-arrow-left"></i> 
            </a> 
            Create CvEditor
        </h5>
        <form method="post" action="{{ route('storenewcveditor') }}">
            @csrf
            <p>
                <label>Email:</label>
                <input type="email" name="email" required="" class="form-control">
            </p>

            <p>
                <label>Industry:</label>
                <select name="industry" class="custom-select">
                    <option value="">All Industries</option>
                    @forelse($industries as $ind)
                    <option value="{{ $ind->id }}">{{ $ind->name }}</option>
                    @empty
                    @endforelse
                </select>
            </p>
            <br>
            <p>
                <i>Only registered users can be editors</i>
                <input type="submit" value="Create Editor" class="btn btn-orange" style="float: right;">
            </p>
        </form>
    </div>
</div>


@endsection
