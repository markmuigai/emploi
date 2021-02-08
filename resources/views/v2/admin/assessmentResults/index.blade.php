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
                                            <h4 class="text-black">
                                                <p>Assessments Done:</p>
                                                {{$assessments_count}}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h4 class="text-black">
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

                                            <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%; display: none;">
                                                <i class="fa fa-calendar"></i>&nbsp;
                                                <span></span> <i class="fa fa-caret-down"></i>
                                            </div>

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

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script type="text/javascript">

        $(function() {

            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }

            $('#reportrange').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                   'Today': [moment(), moment()],
                   'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                   'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                   'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                   'This Month': [moment().startOf('month'), moment().endOf('month')],
                   'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);

            cb(start, end);

        });
    </script>

@endsection


