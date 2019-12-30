@extends('layouts.dashboard-layout')

@section('title','Emploi :: Admin Panel')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Job Posts')
@section('admin_country', $admin->jurisdictions[0]->country->name)

<div class="container">
    <div class="single">
        <form method="get" class="form-group">
            <hr>
            <label>Search Job Posts</label>
            <input type="text" name="q" class="form-control" placeholder="Search">
            <hr>
        </form>

        @forelse($posts as $p)

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <h3 class="orange">
                            <a href="/admin/posts/{{$p->slug}}">{{ $p->title }}</a>
                        </h3>
                        <h6><a href="/admin/posts/{{$p->slug}}">
                                {{ $p->company->name }}</a>
                        </h6>
                    </div>
                    <div class="col-md-3 text-md-right text-left">
                        <p>Open for {{ $p->daysSince  }} days</p>
                        <p><em>{{ $p->status }}</em></p>
                    </div>
                </div>
                <hr>
                <form method="post" action="/admin/posts/{{$p->slug}}/update" id="" class="form-row align-items-center">
                    @csrf
                    <div class="col-lg-3 col-7">
                        <select name="status" class="custom-select" onchange="">
                            @foreach(['inactive','active','closed'] as $s)
                            <option value="{{ $s }}" {{ $p->status == $s ? 'selected="" ': "" }}>
                                {{ $s }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-3 col-7">
                        <select name="featured" class="custom-select" onchange="">
                            <option value="true" {{ $p->featured == 'true' ? 'selected="" ': "" }}>
                                Featured
                            </option>
                            <option value="false" {{ $p->featured == 'false' ? 'selected="" ': "" }}>
                                Not Featured
                            </option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-4">
                        <button type="submit" name="button" class="btn btn-sm btn-orange-alt">Update</button>
                    </div>
                </form>
            </div>
        </div>

        @empty
        <div class="card">
            <div class="card-body text-center">
                <p>No job adverts have been found!</p>
            </div>
        </div>
        @endforelse
        <p>
            {{ $posts->links() }}
        </p>
    </div>
</div>


@endsection
