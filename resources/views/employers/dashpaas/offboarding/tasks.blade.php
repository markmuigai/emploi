@extends('layouts.dashboard-layout')

@section('title','Emploi :: All Jobs Listed')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Offboarding - all Jobs')


<!-- NAV-TABS -->
<a href="/employers/admin-paas" class="btn btn-orange-alt ml-2">
    <i class="fa fa-arrow-left"></i>  Back Home
</a>
<section>
    <div class="container">        
        <div class="tab-content">         
          <div id="home" class="tab-pane active mt-2 pb-4">
             <h5>To continue with this process a task must be marked as completed.</h5>
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
                        <td><a href="/employers/task/complete/{{ $task->id }}" class="btn btn-orange-alt btn-sm" onclick="return confirm('Are you sure to mark {{ $task->title }} as complete?')" >Mark as completed</a></td>

                        @if($task->status == 'completed')
                        <td><a href="/employers/offboarding/create/{{ $task->slug }}" class="btn btn-orange-alt btn-sm">Create Offboarding Task</a></td>
                        @endif
                      
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
