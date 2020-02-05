@extends('layouts.dashboard-layout')

@section('title','Emploi :: Edit Blogger')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Edit Blogger')


<div class="card">
    <div class="card-body">
        @include('components.ads.responsive')
        <div class="row align-items-center">
            <div class=" col-lg-7 col-md-8 offset-md-2">
                <form method="POST" action="/admin/bloggers/{{ $blogger->id }}">
                    @csrf
                    {{ method_field('PUT') }}
                    <p>
                        <label>Email:</label>
                        <input type="email" name="email" class="form-control" required="" value="{{ $blogger->user->email }}" disabled="">
                    </p>
                    <p>
                        <label>Status: </label>
                        <select name="status" class="form-control">
                            <option value="active" {{ $blogger->status == 'active' ? 'selected=""' : '' }}>Active</option>
                            <option value="inactive" {{ $blogger->status == 'inactive' ? 'selected=""' : '' }}>Not Active</option>
                        </select>
                    </p>
                    <p>
                        <input type="submit" value="Save Blogger" class="btn btn-primary btn-sm">
                    </p>
                </form>
            </div>
        </div>
        <hr>
    </div>
</div>



@endsection