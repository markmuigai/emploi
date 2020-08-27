@extends('layouts.dashboard-layout')

@section('title','Emploi :: All Jobs Listed')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Task Management')


<!-- NAV-TABS -->

<section>
    <div class="container">
        <ul class="nav nav-tabs mt-4">
          <li class="active btn btn-orange mr-4"><a data-toggle="tab" href="#home">Tasks</a></li>
          <li><a class="btn btn-orange-alt" style="color: black;" data-toggle="tab" href="#menu1">Issues Dashboard</a></li>
        </ul>
      
        <div class="tab-content">
          <div id="home" class="tab-pane active mt-2 pb-4">
            <div class="container mt-4">
                <table class="table">
                  <div class="row">
                    <tr>
                      <th>TasK Name</th>
                      <th>TasK Status</th>
                      <th>TasK ID</th>

                    </tr>
                    @foreach ($tasks as $task)
                      <tbody>
                        <tr>
                        <td>{{ $task->slug }}</td>
                        <td>{{ $task->status }}</td>
                        <td> {{$task->id}} </td>
                        <td><a href="#" style="color: blue">view</a></td>
                        </tr>                      
                      </tbody>
                        
                    @endforeach
                </table>

                {{ $tasks->links() }}

              </div>
            </div>
          </div>

          
        </div>
      </div>
</section>


@endsection
