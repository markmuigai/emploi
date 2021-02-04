@extends('v2.layouts.app')

@section('title','CV Review :: Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
    @section('page_title', 'CV Reviews')
    
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
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h4 class="text-black">
                                                <p>CV Reviews done:</p>
                                                {{$count}}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h4 class="text-black">
                                                <p>Average score:</p>
                                                {{$avg}}%
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h4 class="text-black">
                                                <p>Converted to CV Editing</p>
                                                {{ $convertedEmails->count() }}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row justify-content-end">          
            
                                        <div class="col-md-6 pl-0 pr-3 my-2">
                                            <a href="/v2/admin/cvTests" class="btn btn-success float-right btn-lg">
                                                CV Review Tester
                                            </a>
                                            <a href="/v2/admin/CVKeywords" class="btn btn-success mr-2 float-right btn-lg">
                                                Manage Keywords 
                                            </a>
                                            <form class="float-right mr-2">
                                                <select id="inputRating" name="sortbydate" >
                                                    <option value="">Select Date Range</option>
                                                    <option value="today">Last 24 hours</option>
                                                    <option value="last7">Last 7 days</option>
                                                    <option value="thisMonth">This month</option>
                                                </select>
                                            </form>
                                        </div>
                                    </div>
                                    @if ($cvReviews->isEmpty())
                                        <h4 class="text-center m-5">
                                            No CV Reviews available
                                        </h4>
                                    @else
                                        @include('v2.components.tables.admin.cvReviews')
                                    @endif
                                    {{ $cvReviews->links() }}
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


