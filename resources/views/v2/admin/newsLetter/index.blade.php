@extends('layouts.dashboard-layout')

@section('title', 'News Letter :: Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'News Letter')
<div class="container-fluid mb-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h4>
                        <p>Total Subscribers:</p>
                        {{ $count }}
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h4>
                        <p>Active Subscribers:</p>
                        {{ $active }}
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h4>
                        <p>Inactive Subscribers:</p>
                        {{ $inactive }}
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="/admin" class="btn btn-orange mb-3">
                <i class="fa fa-arrow-left"></i> Back
            </a>
   
            <div class="card px-2 shadow mb-5 bg-white rounded">
                @if ($subscribers->isEmpty())
                    <h4 class="text-center m-5">
                        No news letter subscribers available
                    </h4>
                @else
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>                      
                        <th scope="col">Created</th>
                        <th scope="col">Is registered?</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subscribers as $key => $subscriber)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $subscriber->name }}</td>
                            <td>{{ $subscriber->email }}</td>
                            <td>{{$subscriber->status}}</td>
                            <td>{{ $subscriber->created_at->diffForHumans() }}</td>
                             <?php
                                $user = App\User::where('email',$subscriber->email)->first();
                             ?>
                                @if(isset($user->id))
                            <td>yes</td>
                                @else
                            <td>no</td>
                                @endif                        
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
            {{ $subscribers->links() }}
        </div>
    </div>
</div>
@endsection