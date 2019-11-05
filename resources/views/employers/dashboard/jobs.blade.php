@extends('layouts.dashboard-sidebar')

@section('title','Emploi :: Jobs Listed')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-offset-2 col-md-10">
            <div class="single">
                <h2>Jobs Listed</h2>
                <a href="#" class="btn btn-secondary pull-right">Post A Job</a>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#allJobs" aria-controls="allJobs" role="tab" data-toggle="tab">All</a></li>
                    <li role="presentation"><a href="#activeJobs" aria-controls="activeJobs" role="tab" data-toggle="tab">Active</a></li>
                    <li role="presentation"><a href="#closedJobs" aria-controls="closedJobs" role="tab" data-toggle="tab">Closed</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="allJobs">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <span class="row">
                                                <span class="col-xs-1">
                                                    1.
                                                </span>
                                                <span class="col-xs-8">
                                                    Frontend Developer
                                                </span>
                                                <span class="col-xs-3">
                                                    Status: <span class="text-success">Active</span>
                                                </span>
                                            </span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <a href="#" class="btn btn-primary pull-right">More Actions</a>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>Uploaded on:</td>
                                                    <td>15th October 2019</td>
                                                </tr>
                                                <tr>
                                                    <td>N<sup>o</sup> of Applicants: </td>
                                                    <td>32</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                            <span class="row">
                                                <span class="col-xs-1">
                                                    2.
                                                </span>
                                                <span class="col-xs-8">
                                                    Backend Developer
                                                </span>
                                                <span class="col-xs-3">
                                                    Status: <span class="text-danger">Closed</span>
                                                </span>
                                            </span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>Uploaded on:</td>
                                                    <td>15th October 2019</td>
                                                </tr>
                                                <tr>
                                                    <td>N<sup>o</sup> of Applicants: </td>
                                                    <td>32</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="activeJobs">Active</div>
                    <div role="tabpanel" class="tab-pane" id="closedJobs">Closed</div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection