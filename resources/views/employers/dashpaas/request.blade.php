@extends('layouts.dashboard-layout')

@section('title','Emploi :: All Requests')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Request Management')


<!-- NAV-TABS -->

<section>
    <div class="container">
        <ul class="nav nav-tabs mt-4">
          <li class="active btn btn-orange mr-4"><a data-toggle="tab" href="#home">Requests</a></li>
          <li><a class="btn btn-orange-alt" style="color: black;" href="/employers/request-paas">Request for Part-Timer</a></li>
        </ul>
      
        <div class="tab-content">
          <div id="home" class="tab-pane active mt-2 pb-4">

                <div class="container mt-4">
                  <table class="table">
                    <div class="row">
                      <tr>
                        <th>Request Title</th>
                        <th>Request Status</th>

                      </tr>
                      @foreach ($tasks as $task)
                        <tbody>
                          <tr>
                          <td>{{ $task->slug }}</td>
                          <td>{{ $task->status }}</td>
                          <td><a href="/employers/edit-task/{{ $task->slug }}" style="color: blue">Edit</a></td>
                          <td><a href="/employers/delete-task/{{ $task->slug }}" style="color: blue" onclick="return confirm('Are you sure you want to cancel request {{ $task->title }}?')">Delete</a></td>
                          <td><a href="/employers/view-task/{{ $task->slug }}" style="color: blue">View</a></td>
                          </tr>                      
                        </tbody>
                          
                      @endforeach
                  </table>

                  {{ $tasks->links() }}

                </div>
                <br><br><br>

            
          </div>    
          
        </div>
      </div>
</section>


@endsection
