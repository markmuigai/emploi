@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Paas Task Request '.$task->name)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title', $task->name)

@section('content')

<div class="card">
    <div class="card-body">
        <div class="row pb-4" style="text-align: right; border-bottom: 0.1em solid #ff5e00">
            <a href="/admin/paas-task" class="btn btn-default">
            <i class="fa fa-arrow-left"></i> Back
            </a>  
            <br><hr>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h5>
                    {{ $task->name }}
                    <small>{{ $task->created_at->diffForHumans() }}</small>
                </h5>
             
                <p>
                    Phone: {{ $task->phone_number }}<br>
                    Email: {{ $task->email }}
                </p>
                <h6>Task: {{ $task->title }}</h6>
                <p>Description: {{ $task->description }}</p>
                
            </div>

            <div class="col-md-4">
       
                @if(!isset($professionals->id))
                    @if(count($professionals) > 0)
                    <form method="POST" action="#" id="">
                        @csrf
                        <label>Industry Professionals</label>
                        <select class="form-control" onchange="" required="" name="editor_id">
                            @forelse($professionals as $p)
                            <option value="{{ $p->id }}">{{ $p->name }} : {{ $p->user->seeker->industry->name  }} 
                            <?php $rsi =  $p->user->seeker->findRsi(); ?>
                            <a class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="right"  title="Your Role Suitability Index is {{ $rsi }}%">RSI {{ $rsi }}%</a>
                            </option>
                            <a href="#">Shortlist</a>

                            @empty
                            @endforelse
                        </select>
                     <!--    <input type="submit" value="Shortlist" class="btn btn-primary"> -->
                    </form>
                    @else
                    <p>
                        No  Industry Professional Found.
                    </p>

                    @endif
                @else
               
                @endif
            </div>
            <div class="col-md-4">
       
                @if(!isset($allprofessionals->id))
                    @if(count($allprofessionals) > 0)
                    <form method="POST" action="#" id="">
                        @csrf
                        <label>Professionals</label>
                        <select class="form-control" onchange="" required="" name="editor_id">
                            @forelse($allprofessionals as $p)
                            <option value="{{ $p->id }}">{{ $p->name }} : {{ $p->user->seeker->industry->name  }} 
                            <?php $rsi =  $p->user->seeker->findRsi(); ?>
                            <a class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="right"  title="Your Role Suitability Index is {{ $rsi }}%">RSI {{ $rsi }}%</a>
                            </option>
                            @empty
                            @endforelse
                        </select>
                      <!--   <input type="submit" value="Shortlist" class="btn btn-primary"> -->
                    </form>
                    @else
                    <p>
                        No Professional Found.
                    </p>

                    @endif
                @else
               
                @endif
            </div>
     
        </div>
<!--         @if(isset($task->cv_taskor_id))
            <hr>
            <div class="row">
                @if($task->submitted_on)
                <div class="col-md-8 offset-md-2">
                    Final Cv: <a href="/storage/resume-tasks/{{ $task->submitted_url }}">View CV</a> <br>
                    Last Submission: {{ $task->submitted_on }}
                </div>
                @else
                <div class="col-md-8 offset-md-2">
                    <p>
                        Final task has not been submitted yet.
                    </p>
                </div>
                @endif
            </div>
        @endif -->
        
    </div>
</div>



@endsection