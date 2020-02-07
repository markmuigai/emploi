@extends('layouts.dashboard-layout')

@section('title','Emploi :: Super Admin')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Emploi Administrators')
<div class="card">
    <div class="card-body">
        <div class="text-right">
            <a href="/desk/create-admin" class="btn btn-sm btn-orange pull-right">Create Administrators</a>
        </div>

         <div class="nav-item">
            <div class="text-right">
                    <a href="documentation" class="btn btn-green px-3">View Documentation</a>
                </div>
                </div>

        <h4>Active Administrators</h4>

        @forelse($admins as $admin)

        <div class="row mt-4">
            <div class="col-8">
                <p><strong>{{ $admin->name }}</strong> {{ '@'.$admin->username }}</p>
                <a href="/desk/disable-admin?id={{ $admin->id }}" class="btn btn-sm btn-danger"> Disable</a>
            </div>
            <div class="col-4 text-right">
                <p>
                    <span class="badge badge-secondary"> @foreach($admin->jurisdictions as $j)
                        {{ $j->country->name }}
                        @endforeach
                    </span>
                </p>
            </div>
        </div>

        @empty

        <p class="text-center">
            No administrators found in the database
        </p>

        @endforelse

        <hr>

        <h4>Inactive Administrators</h4>

        @forelse($oadmins as $admin)
        <div class="row mt-4">
            <div class="col-8">
                <p><strong>{{ $admin->name }}</strong> {{ '@'.$admin->username }}</p>
                <a href="/desk/enable-admin?id={{ $admin->id }}" class="btn btn-sm btn-success">Enable</a>
            </div>
            <div class="col-4 text-right">
                <p>
                    <span class="badge badge-secondary"> @foreach($admin->jurisdictions as $j)
                        {{ $j->country->name }}
                        @endforeach
                    </span>
                </p>
            </div>
        </div>

        @empty

        <p class="text-center">
            No Inactive administrators found in the database
        </p>

        @endforelse

    </div>
</div>

@endsection