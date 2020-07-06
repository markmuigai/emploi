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
            <div class="form-row">
                <div class="col-md-9">
                    <input type="text" name="q" class="form-control " placeholder="Enter Job Title">
                </div>
                <div class="col-md-3 text-center mt-2 mt-md-0">
                    <button type="submit" name="button" class="btn btn-orange px-5">Search</button>
                </div>
            </div>
            <hr>
        </form>
        @include('components.ads.responsive')

        @forelse($posts as $p)

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <h3 class="orange">
                            <a href="/admin/posts/{{$p->slug}}" target="_blank">{{ $p->title }}</a>
                        </h3>
                        <h6>
                            <a href="/companies/{{$p->company->name }}" target="_blank">
                                {{ $p->company->name }}
                            </a>
                        </h6>
                    </div>
                    <div class="col-md-3 text-md-right text-left">
                        <p>Open for {{ $p->daysSince  }} days</p>
                        <p>{{ $p->status }}</p>
                    </div>
                </div>
                <hr>
                <form method="post" action="/admin/posts/{{$p->slug}}/update" id="" class="form-row align-items-center">
                    @csrf
                    <div class="col-lg-2 col-md-6 col-12">
                        <select name="status" class="custom-select" onchange="">
                            @foreach(['inactive','active','closed'] as $s)
                            <option value="{{ $s }}" {{ $p->status == $s ? 'selected="" ': "" }}>
                                {{ $s }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-6 col-12">
                        <select name="featured" class="custom-select" onchange="">
                            <option value="true" {{ $p->featured == 'true' ? 'selected="" ': "" }}>
                                Featured
                            </option>
                            <option value="false" {{ $p->featured == 'false' ? 'selected="" ': "" }}>
                                Not Featured
                            </option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <select name="easyapply" class="custom-select" onchange="">
                            <option value="true" {{ $p->easy_apply == 'true' ? 'selected="" ': "" }}>
                                Allow Easy Apply
                            </option>
                            <option value="false" {{ $p->easy_apply == 'false' ? 'selected="" ': "" }}>
                                Don't Allow Easy Apply
                            </option>
                        </select>
                    </div>
                 
                    @if(Request::server ("SERVER_NAME") == 'emploi.co')
                    <div class="col-lg-3 col-md-6 col-12">
                        <select name="notification" class="custom-select" onchange="">
                            <option value="false">
                                Don't send Notification
                            </option>
                            <option value="true" {{ $p->status == 'inactive' ? 'selected="" ': "" }}>
                                Send Notification
                            </option>
                        </select>
                    </div>
                    @else
                    <input type="hidden" name="notification" value="false">
                    @endif
                    
                    <div class="col-lg-2 col-md-6 col-12">
                        <?php 
                            $showSubmit = false; 
                            $comment = 'Unpaid Job';

                            if($p->status == 'inactive')
                            {
                                if($p->company->user->employer->canPostJob())
                                    $showSubmit = true;
                            }
                            else
                            {
                                $showSubmit = true;
                            }
                        ?>

                        @if($showSubmit)
                        <button type="submit" name="button" class="btn btn-sm btn-orange-alt">Update</button>
                        @else
                        <span class="badge badge-danger">{{ $comment }}</span>
                        @endif
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
