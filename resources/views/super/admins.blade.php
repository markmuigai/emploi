@extends('layouts.dashboard-layout')

@section('title','Emploi :: Super Admin')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Emploi Administrators')
<div class="card">
    <div class="card-body">
<!-- <<<<<<< HEAD -->
         <div class="dropdown">
                        <a href="#" class="btn btn-green px-3" data-toggle="dropdown">Documentation<strong class="caret"></strong></a>
                        <ul class="dropdown-menu">
                            <li><a href="documentation/index">Index</a></li>
                            <li><a href="documentation/routes">Routes</a></li>
                            <li><a href="documentation/controllers">Controllers</a></li>
                            <li><a href="documentation/views" >Views</a></li>
                          </ul>
                      </div>
        <div class="text-right">            
            <a href="/desk/create-admin" class="btn btn-sm btn-orange pull-right">Create Administrators</a>
        </div>

                                 
               
<!-- ======= -->
        <h4>Active Administrators</h4>
<!-- >>>>>>> ebfb571be76bf8e6abdea45dadc3d1e2359eb244 -->

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