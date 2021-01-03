@extends('layouts.dashboard-layout')

@section('title','Emploi :: Issue')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Task Issue Management')


<!-- NAV-TABS -->

<section>
    <div class="container">
      <h5>Assign Duties and Manage Task Perfomance.</h5>
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
                      <th>Issue Title</th>
                      <th>Description</th>
                      <th>Status</th>
                      <th>Due</th>
                      <th>assignee</th>


                    </tr>
                    @foreach ($issues as $i)
                      <tbody>
                        <tr>
                        <td>{{ $i->title }}</td>
                        <td> {{$i->description}} </td>
                        <td>{{ $i->status }}</td>
                        <td> {{$i->due_date->format('d/m/Y')}} </td>
                        <td> {{$i->assignee}} </td>

                        </tr>                      
                      </tbody>
                                                  
                    @endforeach
                </table>


              </div>
            </div>
            <br><br><br>

          </div>

          
        </div>
      </div>
</section>


@endsection
