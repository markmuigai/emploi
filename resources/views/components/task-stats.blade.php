<!-- STATISTICS -->
<div>
    <div>
        <div class="h4 text-center pt-1">Numbers Don't Lie</div>
        <div class="card" style="background-color: #510096; color:white;">
            <div class="card-body text-center">
                <div class="row">
                    <div class="col-sm-6">
                        <i class="fa fa-briefcase"></i><br>
                        <h5>{{ __('jobs.t_issues') }}</h5>
                        <h1 class="counter " id="total-jobs-stats"><span>5</span></h1>
                        <p>{{ __('jobs.text_job') }}</p>
                        <hr class="d-block d-md-none">
                    </div>
                    <div class="col-sm-6">
                        <i class="fa fa-check-square"></i><br>
                        <h5>{{ __('jobs.t_hired') }}</h5>
                        <h1 class="counter" id="total-candidates-stats"><span>5</span></h1>
                        <p>{{ __('jobs.text_hired') }}</p>
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