<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<!-- STATISTICS -->
<div class="statistics">
    <div class="container">
        <div class="card mx-5" style="background-color: #510096; color:white;">
            <div class="card-body text-center py-3 py-lg-4">
                <div class="row" id="stats-container">
                    <div class="col-md-4 col-sm-4 col-12">
                        <i class="fa fa-briefcase"></i><br>
                        <h5>{{ __('jobs.t_jobs') }}</h5>
                        <h1 class="counter " id="total-jobs-stats"><span>5</span></h1>
                        <p>{{ __('jobs.find_nxt_job') }}</p>
                        <hr class="d-block d-md-none">
                    </div>
                    <div class="col-md-4 col-sm-4 col-12">
                        <i class="fa fa-check-square"></i><br>
                        <h5>{{ __('jobs.t_cand') }}</h5>
                        <h1 class="counter" id="total-candidates-stats"><span>100</span></h1>
                        <p>{{ __('jobs.gt_hired') }}</p>
                        <hr class="d-block d-md-none">
                    </div>
                    <div class="col-md-4 col-sm-4 col-12">
                        <i class="fa fa-building"></i><br>
                        <h5>{{ __('jobs.t_comp') }}</h5>
                        <h1 class="counter" id="total-companies-stats"><span>40</span></h1>
                        <p>{{ __('jobs.comp_hirin') }}</p>
                        <hr class="d-block d-md-none">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $().ready(function(){

            function loadStatistics(){
                $.ajax({
                    type: 'GET',
                    url: '/api/total-paas-tasks?csrf-token='+$('#csrf_token').attr('content'),
                    success: function(response) {
                        
                        $('#total-jobs-stats').empty();
                        $('#total-jobs-stats').append('<span>'+response+'</span>');
                    },
                    error: function(e) {

                        
                    },
                });

                $.ajax({
                    type: 'GET',
                    url: '/api/total-seeker-paas?csrf-token='+$('#csrf_token').attr('content'),
                    success: function(response) {
                        
                        $('#total-candidates-stats').empty();
                        $('#total-candidates-stats').append('<span>'+response+'</span>');
                        
                    },
                    error: function(e) {

                        
                    },
                });

                $.ajax({
                    type: 'GET',
                    url: '/api/total-employer-paas?csrf-token='+$('#csrf_token').attr('content'),
                    success: function(response) {
                        
                        $('#total-companies-stats').empty();
                        $('#total-companies-stats').append('<span>'+response+'</span>');
                        
                    },
                    error: function(e) {

                        
                    },
                });

                $.ajax({
                    type: 'GET',
                    url: '/api/total-hiring-companies?csrf-token='+$('#csrf_token').attr('content'),
                    success: function(response) {
                        
                        $('#total-hiring-companies-stats').empty();
                        $('#total-hiring-companies-stats').append('<span>'+response+'</span>');
                    },
                    error: function(e) {

                        
                    },
                });
            }
            loadStatistics();
            setInterval(loadStatistics,10000);
            
        });
    </script>
</div>
<!-- END OF STATISTICS -->