@extends('layouts.dashboard-layout')

@section('title','Emploi :: Requests')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Request Management')


<!-- NAV-TABS -->
<a href="/employers/paas-dash" class="btn btn-orange-alt">
    <i class="fa fa-arrow-left"></i> Back Home
</a>
<section>
    <div class="container">
        <ul class="nav nav-tabs mt-4">
          <li class="active btn btn-orange mr-4"><a data-toggle="tab" href="#home">Requests</a></li>
          <li><a class="btn btn-orange-alt" href="/employers/request-paas">Request for Part-Timer</a></li>
        </ul>
      
        <div class="tab-content">
          <div id="home" class="tab-pane active mt-2 pb-4">

                <div class="container mt-4 card">
                  <table class="table">
                    <div class="row">
                      <tr>
                        <th>Request Title</th>
                        <th>Request Status</th>

                      </tr>
                      @foreach ($tasks as $task)
                        <tbody class="mt-2">
                          <tr>
                          <td>{{ $task->title }}</td>
                          <td>{{ $task->status }}</td> 
                          @if($task->status == 'pending')
                          <td><a href="/employers/edit-task/{{ $task->slug }}" style="color: blue; text-decoration:none">Edit <i class="far fa-edit"></i></a></td>
                          @else
                          <td><a style="color: blue; text-decoration:none">Activated</a></td>
                          @endif  
                          <!-- <td><a href="/employers/view-task/{{ $task->slug }}" style="color: blue; text-decoration:none;">View <i class="far fa-eye"></i></a></td> -->
                          <!-- <td><a href="/employers/edit-task/{{ $task->slug }}" style="color: blue; text-decoration:none">Edit <i class="far fa-edit"></i></a></td> -->
                          @if($task->status == 'pending')
                          <td><a href="/employers/delete-task/{{ $task->slug }}" style="color: blue; text-decoration:none;" onclick="return confirm('This action is irreversible. Once you delete this request:{{ $task->title }} there is no going back. Please be certain?')">Delete <i class="far fa-trash-alt"></i></a></td>
                          @else
                          <td><a style="color: blue; text-decoration:none" onclick="return confirm('This request is active. It cannot be deleted.')">Active Request</a></td>
                          @endif

                          @if($task->status != 'pending')
                          <td><a href="/employers/shortlist/{{ $task->slug }}" style="color: blue; text-decoration:none">Shortlist <i class="fas fa-user-circle"></i></a></td>
                          @else
                          <td><a style="color: blue; text-decoration:none">Not Activated</a></td>
                          @endif
                          
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
