<!-- STATISTICS -->
<div class="statistics">
    <div>
        <div class="card mx-5" style="background-color: #510096; color:white;">
            <div class="card-body text-center py-3 py-lg-4">
                <div class="row" id="stats-container">
                    <div class="col-sm-6 col-sm-6 col-12">
                        <i class="fa fa-briefcase"></i><br>
                        <h5>{{ __('jobs.t_issues') }}</h5>
                        <h1 class="counter " id="total-jobs-stats"><span>5</span></h1>
                        <p>{{ __('jobs.find_nxt_job') }}</p>
                        <hr class="d-block d-md-none">
                    </div>
                    <div class="col-sm-6 col-sm-6 col-12">
                        <i class="fa fa-check-square"></i><br>
                        <h5>{{ __('jobs.t_hired') }}</h5>
                        <h1 class="counter" id="total-candidates-stats"><span>100</span></h1>
                        <p>{{ __('jobs.gt_hired') }}</p>
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
                    url: '/api//total-issues?csrf-token='+$('#csrf_token').attr('content'),
                    success: function(response) {
                        
                        $('#total-jobs-stats').empty();
                        $('#total-jobs-stats').append('<span>'+response+'</span>');
                    },
                    error: function(e) {

                        
                    },
                });

                $.ajax({
                    type: 'GET',
                    url: '/api/total-hired?csrf-token='+$('#csrf_token').attr('content'),
                    success: function(response) {
                        
                        $('#total-candidates-stats').empty();
                        $('#total-candidates-stats').append('<span>'+response+'</span>');
                        
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