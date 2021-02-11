@extends('v2.layouts.app')

@section('title','Job Suitability :: Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
    @section('page_title', 'Self Assessment Results ')
    
    <!-- Navbar -->
    @include('v2.components.jobseeker.navbar')
    <!-- End Navbar -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- Jobs -->
    <div class="job-area-list dashboard-area mt-1 ptb-100">
        <div class="container-fluid px-2">
            <div class="row">
                <div class="col-lg-2 pt-3">
                    @include('v2.components.sidebar.admin')               
                </div>           
                 <div class="col-lg-10 jobs-form">
                    <!-- Jobs -->
                    <div class="categories-area pb-70">
                        <div class="container-fluid mb-5">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h4 class="primary-color">
                                                <p>All applications:</p>
                                                {{$assessments_count}}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h4 class="primary-color">
                                                <p>Average rsi score:</p>
                                                80%
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row justify-content-end">
                                        <div class="form-group col-md-4 pr-0 my-2">
                                            <form id='formId'  name="sortbydate">
                                                <div id="assessmentResultsRange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%;">
                                                    <i class='bx bx-calendar'></i>&nbsp;
                                                    <span></span><i class='bx bx-caret-down'></i></i>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-3 my-2">
                                            <a href="#" class="btn btn-success">
                                                Manaage rsi metrics
                                            </a>
                                        </div>
                                    </div>
                                    @if ($applications->isEmpty())
                                        <h4 class="text-center m-5">
                                            No assessment results available
                                        </h4>
                                    @else
                                        @include('v2.components.tables.admin.jobApplications')
                                    @endif
                                    {{ $testResults->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Jobs -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Jobs -->
@endsection

@section('js')
@endsection


