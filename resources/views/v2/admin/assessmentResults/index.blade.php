@extends('v2.layouts.app')

@section('title','Self Assessment :: Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
    @section('page_title', 'Self Assessment Results ')
    
    <!-- Navbar -->
    @include('v2.components.jobseeker.navbar')
    <!-- End Navbar -->

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
                                                <p>Assessments Done:</p>
                                                {{$assessments_count}}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h4 class="primary-color">
                                                <p>Average score:</p>
                                                {{$avg}}%
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row justify-content-end">
                                       <div class="form-group col-md-2 pr-0 my-2">
                                            <form>
                                                <select id="inputRating" name="sortbydate">
                                                  <option value="">Select Date Range</option>
                                                  <option value="today">Today</option>
                                                  <option value="last7">Last 7 days</option>
                                                  <option value="thisMonth">This month</option>
                                                </select>
                                            </form>
                                        </div>
                                        <div class="col-md-3 my-2">
                                            <a href="{{Route('assessments.index')}}" class="btn btn-success">
                                                View All Assessment Questions
                                            </a>
                                        </div>
                                    </div>
                                    @if ($testResults->isEmpty())
                                        <h4 class="text-center m-5">
                                            No assessment results available
                                        </h4>
                                    @else
                                        @include('v2.components.tables.admin.assessmentResults')
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
    <script type="text/javascript">
        $("#inputRating").change(function() {
            this.form.submit();
        });
    </script>
@endsection


