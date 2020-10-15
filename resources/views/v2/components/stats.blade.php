    <!-- STATISTICS -->
    <div class="col-sm-4 col-lg-4">
        <div class="register-item">
            <h3>
                <span class="odometer" data-count="1000">00</span>+ 
            </h3>
            <p>Companies</p>
        </div>
    </div>
    <div class="col-sm-4 col-lg-4">
        <div class="register-item">
            <h3>
                <span class="odometer" data-count="30000">00</span>+ 
            </h3>
            <p>Job Seekers</p>
        </div>
    </div>
    <div class="col-sm-4 col-lg-4">
        <div class="register-item">
            <h3>
                <span class="odometer" data-count="20000">00</span>+ 
            </h3>
            <p>Available Jobs</p>
        </div>
    </div>


    <script type="text/javascript">
        $().ready(function(){

            function loadStatistics(){
                $.ajax({
                    type: 'GET',
                    url: '/api/total-jobs?csrf-token='+$('#csrf_token').attr('content'),
                    success: function(response) {
                        
                        $('#total-jobs-stats').empty();
                        $('#total-jobs-stats').append('<span>'+response+'</span>');
                    },
                    error: function(e) {

                        
                    },
                });

                $.ajax({
                    type: 'GET',
                    url: '/api/total-candidates?csrf-token='+$('#csrf_token').attr('content'),
                    success: function(response) {
                        
                        $('#total-candidates-stats').empty();
                        $('#total-candidates-stats').append('<span>'+response+'</span>');
                        
                    },
                    error: function(e) {

                        
                    },
                });

                $.ajax({
                    type: 'GET',
                    url: '/api/total-companies?csrf-token='+$('#csrf_token').attr('content'),
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