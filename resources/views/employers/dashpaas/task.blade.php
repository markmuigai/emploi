@extends('layouts.dashboard-layout')

@section('title','Emploi :: All Jobs Listed')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Task Management')


<!-- NAV-TABS -->
<a href="{{ url()->previous() }}" class="btn btn-default">
    <i class="fa fa-arrow-left"></i>Back
</a>
<section>
    <div class="container">
        <ul class="nav nav-tabs mt-4">
          <li class="active btn btn-orange mr-4"><a data-toggle="tab" href="#home">Tasks</a></li>
          <li><a class="btn btn-orange-alt" style="color: black;" data-toggle="tab" href="#menu1">Issues Dashboard</a></li>
        </ul>
      
        <div class="tab-content">
          <div id="home" class="tab-pane active mt-2 pb-4">
            <div class="container mt-4 card">
                <table class="table">
                  <div class="row">
                    <tr>
                      <th>Task Name</th>
                      <th>Task Status</th>
                      <th>Task ID</th>

                    </tr>
                    @foreach ($tasks as $task)
                      <tbody>
                        <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->status }}</td>
                        <td> {{$task->id}} </td>
                        <td><a href="#" style="color: blue">view</a></td>
                        <td>
                          <a class="" href="#" data-toggle="collapse" data-target="#demo">Simple collapsible</a>
                          <div id="demo" class="collapse {{ $task->slug }}">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                          </div>
                        </td>
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
