@extends('layouts.dashboard-layout')

@section('title','Emploi :: All Jobs Listed')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Task Management')


<!-- NAV-TABS -->
<a href="/employers/paas-dash" class="btn btn-orange-alt ml-2">
    <i class="fa fa-arrow-left"></i>  Back Home
</a>
<section>
    <div class="container">
        <ul class="nav nav-tabs mt-4">
          <li class="active btn btn-orange mr-4"><a data-toggle="tab" href="#home">Jobs</a></li>
          <li><a class="btn btn-orange-alt" style="color: #E1573A;" href="/issues">Issues</a></li>
        </ul>
      
        <div class="tab-content">         
          <div id="home" class="tab-pane active mt-2 pb-4">
             <h5>Manage leave requests and view tasks per professional.</h5>
            <div class="container mt-4 card">
                <table class="table">
                  <div class="row">
                    <tr>
                      <th>Job Title</th>
                      <th>Job Status</th>

                    </tr>
                    @foreach ($tasks as $task)
                      <tbody>
                        <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->status }}</td>
                        <td><a href="/employers/leaves/{{ $task->slug }}" class="btn btn-orange-alt btn-sm">leave requests</a></td>
                        <td><a href="/issues/show/{{ $task->slug }}" class="btn btn-orange-alt btn-sm">view Issues</a></td>
                        </tr>                      
                      </tbody>
                                                  
                    @endforeach
                </table>

                {{ $tasks->links() }}

              </div>
            </div>
            <br><br><br>

          </div>

          
        </div>
      </div>
</section>


@endsection
